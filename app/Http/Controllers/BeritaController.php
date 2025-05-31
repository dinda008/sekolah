<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    // Menampilkan daftar berita
    public function index()
    {
        $berita = Berita::with('penulis')->get(); // Ambil data berita beserta penulis
        return view('berita.index', compact('berita'));
    }

    // Menampilkan form tambah berita
    public function tambah_berita()
    {
        $pegawai = Pegawai::all(); // Ambil daftar pegawai untuk dropdown
        return view('berita.insert', compact('pegawai'));
    }

    // Proses tambah data berita
    public function insert(Request $request)
    {
        $request->validate([
            'judul_berita' => 'required|string|max:255', 
            'tanggal' => 'required|date',
            'deskripsi_berita' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'id_pegawai' => 'required|exists:pegawai,id_pegawai',
        ]);

        // Upload foto jika ada
        $foto = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('berita', 'public');
        }

        // Simpan ke database
        Berita::create([
            'judul_berita' => $request->judul_berita, // Pastikan judul masuk ke database
            'tanggal' => $request->tanggal,
            'deskripsi_berita' => $request->deskripsi_berita,
            'foto' => $foto,
            'id_pegawai' => $request->id_pegawai,
        ]);        

        return redirect()->route('berita')->with('message', 'Data berita berhasil ditambahkan');
    }

    // Menampilkan form edit berita
    public function edit($id_berita)
    {
        $berita = Berita::findOrFail($id_berita);
        $pegawai = Pegawai::all(); 
        return view('berita.edit', compact('berita', 'pegawai'));
    }

    // // Proses update berita
    public function update(Request $request, $id)
{
    $berita = Berita::findOrFail($id);

    // Validasi
    $request->validate([
        'judul_berita' => 'required',
        'tanggal' => 'required|date',
        'deskripsi_berita' => 'required',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'id_pegawai' => 'required',
    ]);

    // Update data berita
    $berita->judul_berita = $request->judul_berita;
    $berita->tanggal = $request->tanggal;
    $berita->deskripsi_berita = $request->deskripsi_berita;
    $berita->id_pegawai = $request->id_pegawai;

    // Cek jika ada file baru
    if ($request->hasFile('foto')) {
        // Hapus foto lama jika ada
        if ($berita->foto && Storage::exists($berita->foto)) {
            Storage::delete($berita->foto);
        }

        // Simpan foto baru
        $file = $request->file('foto')->store('berita', 'public');
        $berita->foto = $file;
    }

    $berita->save();

    return redirect()->route('berita')->with('message', 'Data berita berhasil diperbarui.');
}

    public function delete($id_berita)
    {
        $berita = Berita::findOrFail($id_berita);
        $berita->delete();

        return redirect()->route('berita')->with('message', 'Data berita berhasil dihapus');
    }
}
