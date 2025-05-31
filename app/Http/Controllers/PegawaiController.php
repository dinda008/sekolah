<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    public function index()
    {
       $pegawai = Pegawai::with('jabatan')  // PASTIKAN RELASI DILoad
        ->orderBy('id_pegawai', 'desc')  // Bisa diurutkan sesuai id atau prioritas jabatan
        ->get()
        ->sortBy(function($item) {
            return $item->jabatan->prioritas;
        });

    return view('pegawai.index', compact('pegawai'));
    }

    public function add()
{
    // Ambil semua jabatan berdasarkan urutan prioritas
    $jabatan = Jabatan::orderBy('prioritas')->get();
    return view('pegawai.insert', compact('jabatan'));
}
    public function insert(Request $request)
{
    $request->validate([
        'nama' => 'required|string',
        'nip' => 'nullable|digits:18|unique:pegawai,nip',
        'id_jabatan' => 'required|exists:jabatan,id_jabatan',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'sambutan' => 'nullable|string',
    ]);

    $nip = $request->nip;
    if (empty($nip)) {
        $nip = '-';
    }

    $filePath = $request->hasFile('foto')
        ? $request->file('foto')->store('pegawai', 'public')
        : null;

    Pegawai::create([
        'nama' => $request->nama,
        'nip' => $nip,
        'id_jabatan' => $request->id_jabatan,
        'foto' => $filePath,
        'sambutan' => $request->sambutan ?? null,
    ]);

    return redirect()->route('pegawai')->with('message', 'Data Pegawai berhasil ditambahkan!');
}

    // Tampilkan form edit data
   public function edit($id_pegawai)
{
    $pegawai = Pegawai::findOrFail($id_pegawai);

    // Ambil jabatan urut berdasarkan prioritas
    $jabatan = Jabatan::orderBy('prioritas')->get();
    return view('pegawai.edit', compact('pegawai', 'jabatan'));
}

    public function update(Request $request, $id_pegawai)
{
    $pegawai = Pegawai::findOrFail($id_pegawai);

    $request->validate([
        'nama' => 'required|string|max:255',
        'nip' => 'nullable|digits:18|unique:pegawai,nip,' . $id_pegawai . ',id_pegawai',
        'id_jabatan' => 'required|exists:jabatan,id_jabatan',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'sambutan' => 'nullable|string',
    ]);

    $nip = $request->nip;
    if (empty($nip)) {
        $nip = '-';
    }

    $pegawai->nama = $request->nama;
    $pegawai->nip = $nip;
    $pegawai->id_jabatan = $request->id_jabatan;

    $jabatan = Jabatan::find($request->id_jabatan);
    $pegawai->sambutan = ($jabatan && $jabatan->nama_jabatan === 'Kepala Sekolah') ? $request->sambutan : null;

    if ($request->hasFile('foto')) {
        if ($pegawai->foto && Storage::disk('public')->exists($pegawai->foto)) {
            Storage::disk('public')->delete($pegawai->foto);
        }
        $path = $request->file('foto')->store('pegawai', 'public');
        $pegawai->foto = $path;
    }

    $pegawai->save();

    return redirect()->route('pegawai')->with('message', 'Data pegawai berhasil diperbarui.');
}

    public function delete($id_pegawai)
    {
        $pegawai = Pegawai::findOrFail($id_pegawai);
        $pegawai->delete();

        return redirect()->route('pegawai')->with('message', 'Data Pegawai berhasil dihapus');
    }
}
