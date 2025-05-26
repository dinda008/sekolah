<?php

namespace App\Http\Controllers;

use App\Models\PpdbInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PpdbController extends Controller
{
     public function index()
    {
        $ppdb = PpdbInfo::all();
        return view('ppdb.index', compact('ppdb'));
    }

    public function tambah_ppdb()
    {
        return view('ppdb.insert');
    }

    public function insert(Request $request)
    {
        // Validasi input upload dokumen dan poster
        $request->validate([
            'dokumen' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'poster' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $dokumenFile = $request->file('dokumen');
        $posterFile = $request->file('poster');

        // Ambil nama asli file
        $originalDokumenName = $dokumenFile->getClientOriginalName();
        $originalPosterName = $posterFile->getClientOriginalName();

        // Buat nama file unik dengan timestamp
        $dokumenName = time() . '_' . preg_replace('/\s+/', '_', $originalDokumenName);
        $posterName = time() . '_' . preg_replace('/\s+/', '_', $originalPosterName);

        // Simpan file ke storage
        $dokumenPath = $dokumenFile->storeAs('ppdb/dokumen', $dokumenName, 'public');
        $posterPath = $posterFile->storeAs('ppdb/poster', $posterName, 'public');

        // Simpan data ke database
        PpdbInfo::create([
            'formulir' => $dokumenPath,
            'poster' => $posterPath,
            'nama_dokumen' => $originalDokumenName,
            'nama_poster' => $originalPosterName,
        ]);

        return redirect()->route('ppdb')->with('message', 'Data PPDB berhasil ditambahkan!');
    }

    // Tampilkan form edit data PPDB
    public function edit($id_ppdb)
    {
        $ppdb = PpdbInfo::findOrFail($id_ppdb);
        return view('ppdb.edit', compact('ppdb'));
    }

    // Proses update data PPDB
    public function update(Request $request, $id_ppdb)
{
    $ppdb = PpdbInfo::findOrFail($id_ppdb);

    $request->validate([
        'dokumen' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        'poster' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('dokumen')) {
        if ($ppdb->formulir && Storage::disk('public')->exists($ppdb->formulir)) {
            Storage::disk('public')->delete($ppdb->formulir);
        }

        $dokumenFile = $request->file('dokumen');
        $dokumenName = time() . '_' . preg_replace('/\s+/', '_', $dokumenFile->getClientOriginalName());
        $dokumenPath = $dokumenFile->storeAs('ppdb/dokumen', $dokumenName, 'public');

        $ppdb->formulir = $dokumenPath;
        // HAPUS $ppdb->nama_dokumen = ...
    }

    if ($request->hasFile('poster')) {
        if ($ppdb->poster && Storage::disk('public')->exists($ppdb->poster)) {
            Storage::disk('public')->delete($ppdb->poster);
        }

        $posterFile = $request->file('poster');
        $posterName = time() . '_' . preg_replace('/\s+/', '_', $posterFile->getClientOriginalName());
        $posterPath = $posterFile->storeAs('ppdb/poster', $posterName, 'public');

        $ppdb->poster = $posterPath;
        // HAPUS $ppdb->nama_poster = ...
    }

    $ppdb->save();

    return redirect()->route('ppdb')->with('message', 'Data PPDB berhasil diperbarui!');
}


    public function delete($id_ppdb)
{
    $ppdb = PpdbInfo::findOrFail($id_ppdb);

    // Hapus file dari storage
    if ($ppdb->formulir && Storage::disk('public')->exists($ppdb->formulir)) {
        Storage::disk('public')->delete($ppdb->formulir);
    }

    if ($ppdb->poster && Storage::disk('public')->exists($ppdb->poster)) {
        Storage::disk('public')->delete($ppdb->poster);
    }

    // Hapus dari database
    $ppdb->delete();

    return redirect()->route('ppdb')->with('message', 'Data PPDB berhasil dihapus!');
}

}
