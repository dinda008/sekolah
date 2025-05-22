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
            'nip' => 'required|unique:pegawai,nip',
            'id_jabatan' => 'required|exists:jabatan,id_jabatan',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'sambutan' => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {
            $filePath = $request->file('foto')->store('pegawai', 'public');
        } else {
            $filePath = null;
        }

        Pegawai::create([
    'nama' => $request->nama,
    'nip' => $request->nip,
    'id_jabatan' => $request->id_jabatan,  // Pastikan ini sesuai pilihan user
    'foto' => $filePath,
    'sambutan' => $request->sambutan ?? null,
]);

        return redirect()->route('pegawai')->with('message', 'Pegawai berhasil ditambahkan!');
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
            'nip' => 'required|string|max:255|unique:pegawai,nip,' . $id_pegawai . ',id_pegawai',
            'id_jabatan' => 'required|exists:jabatan,id_jabatan',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'sambutan' => 'nullable|string',
        ]);

        // Simpan field biasa
        $pegawai->nama = $request->nama;
        $pegawai->nip = $request->nip;
        $pegawai->id_jabatan = $request->id_jabatan;

        // Cek jabatan untuk sambutan
        $jabatan = Jabatan::find($request->id_jabatan);
        $pegawai->sambutan = ($jabatan && $jabatan->nama_jabatan === 'Kepala Sekolah') ? $request->sambutan : null;

        // Kalau ada file baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($pegawai->foto && Storage::disk('public')->exists($pegawai->foto)) {
                Storage::disk('public')->delete($pegawai->foto);
            }

            // Simpan foto baru
            $path = $request->file('foto')->store('pegawai', 'public');
            $pegawai->foto = $path;
        }

        $pegawai->save(); // <-- PENTING: simpan semua perubahan!

        return redirect()->route('pegawai')->with('success', 'Data pegawai berhasil diperbarui.');
    }

    public function delete($id_pegawai)
    {
        $pegawai = Pegawai::findOrFail($id_pegawai);
        $pegawai->delete();

        return redirect()->route('pegawai')->with('message', 'Data Pegawai berhasil dihapus');
    }
}
