<?php

namespace App\Http\Controllers;

use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturOrganisasiController extends Controller
{
    // Menampilkan data struktur
    public function Struktur()
    {
        $strukturorganisasi = StrukturOrganisasi::all();
        return view('profil.struktur.index', compact('strukturorganisasi'));
    }

    // Tampilkan form tambah
    public function tambah_struktur()
    {
        return view('profil.struktur.insert');
    }

    // Proses tambah data
    public function insert(Request $request)
    {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'keterangan' => 'nullable|string',
        ]);

        $foto = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('struktur', 'public');
        }

        StrukturOrganisasi::create([
            'foto' => $foto,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('profil.struktur')->with('message', 'Data berhasil ditambahkan');
    }

    // Tampilkan form edit data
    public function edit($id_struktur)
    {
        $strukturorganisasi = StrukturOrganisasi::findOrFail($id_struktur);
        return view('profil.struktur.edit', compact('strukturorganisasi'));
    }

    // Proses update data
    public function update(Request $request, $id_struktur)
{
    $strukturorganisasi = StrukturOrganisasi::findOrFail($id_struktur);

    $request->validate([
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'keterangan' => 'nullable|string',
    ]);

    // Kalau ada upload file baru
    if ($request->hasFile('foto')) {
        // Hapus foto lama dari storage
        if ($strukturorganisasi->foto && Storage::disk('public')->exists($strukturorganisasi->foto)) {
            Storage::disk('public')->delete($strukturorganisasi->foto);
        }

        // Upload dan simpan foto baru
        $strukturorganisasi->foto = $request->file('foto')->store('struktur', 'public');
    }

    // Update keterangan
    $strukturorganisasi->keterangan = $request->keterangan;
    $strukturorganisasi->save();

    return redirect()->route('profil.struktur')->with('message', 'Struktur Organisasi berhasil diperbarui');
}

    public function delete($id_struktur)
    {
        $strukturorganisasi = StrukturOrganisasi::findOrFail($id_struktur);
        $strukturorganisasi->delete();

        return redirect()->route('profil.struktur')->with('message', 'Data Profil Sekolah berhasil dihapus');
    }
}
