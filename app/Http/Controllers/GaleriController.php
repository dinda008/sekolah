<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index () {
        $galeri = Galeri::all();
        return view('galeri.index', compact('galeri'));
    }

    public function tambah_galeri() {
        return view('galeri.insert');
    }

    public function insert(Request $request)
{
    $request->validate([
        'judul_kegiatan' => 'required|string',
        'tanggal' => 'required|date',
        'deskripsi_kegiatan' => 'required|string',
        'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
    ]);

    $foto = null;
    if ($request->hasFile('foto')) {
        $foto = $request->file('foto')->store('galeri', 'public');
    }

    Galeri::create([
        'judul_kegiatan' => $request->judul_kegiatan,
        'tanggal' => $request->tanggal,
        'deskripsi_kegiatan' => $request->deskripsi_kegiatan,
        'foto' => $foto
    ]);

    return redirect()->route('galeri')->with('message', 'Data Galeri Kegiatan berhasil ditambahkan');
}

    public function edit($id_galeri)
    {
        $galeri = Galeri::findOrFail($id_galeri);
        return view('galeri.edit', compact('galeri'));
    }

   public function update(Request $request, $id_galeri)
{
    $galeri = Galeri::findOrFail($id_galeri);

    // validasi lain...

    if ($request->hasFile('foto')) {
        // hapus foto lama kalau ada
        if ($galeri->foto && Storage::disk('public')->exists($galeri->foto)) {
            Storage::disk('public')->delete($galeri->foto);
        }
        // simpan foto baru
        $path = $request->file('foto')->store('galeri', 'public');
        $galeri->foto = $path;
    }
    // kalau gak ada foto baru, jangan update kolom foto, biarkan tetap file lama

    // update field lain
    $galeri->judul_kegiatan = $request->judul_kegiatan;
    $galeri->tanggal = $request->tanggal;
    $galeri->deskripsi_kegiatan = $request->deskripsi_kegiatan;

    $galeri->save();

    return redirect()->route('galeri')->with('message', 'Data Galeri Berhasil Diperbarui');
}


    public function delete($id_galeri)
    {
        $galeri = Galeri::findOrFail($id_galeri);

        // Hapus file foto dari storage jika ada
        if ($galeri->foto && Storage::exists($galeri->foto)) {
            Storage::delete($galeri->foto);
        }

        // Hapus data galeri
        $galeri->delete();

        return redirect()->route('galeri')->with('message', 'Data galeri berhasil dihapus.');
    }
}
