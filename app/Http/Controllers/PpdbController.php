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
        // Validasi input upload dokumen, poster, dan syarat ketentuan
        $request->validate([
            'dokumen' => 'required|file|mimes:pdf,doc,docx,xls,xlsx',
            'poster' => 'required|image|mimes:jpg,jpeg,png',
            'syarat_ketentuan' => 'required|string',
        ]);

        $dokumenFile = $request->file('dokumen');
        $posterFile = $request->file('poster');

        $originalDokumenName = $dokumenFile->getClientOriginalName();
        $originalPosterName = $posterFile->getClientOriginalName();

        $dokumenName = time() . '_' . preg_replace('/\s+/', '_', $originalDokumenName);
        $posterName = time() . '_' . preg_replace('/\s+/', '_', $originalPosterName);

        $dokumenPath = $dokumenFile->storeAs('ppdb/dokumen', $dokumenName, 'public');
        $posterPath = $posterFile->storeAs('ppdb/poster', $posterName, 'public');

        PpdbInfo::create([
            'formulir' => $dokumenPath,
            'poster' => $posterPath,
            'nama_dokumen' => $originalDokumenName,
            'nama_poster' => $originalPosterName,
            'syarat_ketentuan' => $request->syarat_ketentuan,
        ]);

        return redirect()->route('ppdb')->with('message', 'Data PPDB berhasil ditambahkan!');
    }

    public function edit($id_ppdb)
    {
        $ppdb = PpdbInfo::findOrFail($id_ppdb);
        return view('ppdb.edit', compact('ppdb'));
    }

    public function update(Request $request, $id_ppdb)
    {
        $ppdb = PpdbInfo::findOrFail($id_ppdb);

        $request->validate([
            'dokumen' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png',
            'syarat_ketentuan' => 'required|string',
        ]);

        if ($request->hasFile('dokumen')) {
            if ($ppdb->formulir && Storage::disk('public')->exists($ppdb->formulir)) {
                Storage::disk('public')->delete($ppdb->formulir);
            }

            $dokumenFile = $request->file('dokumen');
            $originalDokumenName = $dokumenFile->getClientOriginalName();
            $dokumenName = time() . '_' . preg_replace('/\s+/', '_', $originalDokumenName);
            $dokumenPath = $dokumenFile->storeAs('ppdb/dokumen', $dokumenName, 'public');

            $ppdb->formulir = $dokumenPath;
            $ppdb->nama_dokumen = $originalDokumenName;
        }

        if ($request->hasFile('poster')) {
            if ($ppdb->poster && Storage::disk('public')->exists($ppdb->poster)) {
                Storage::disk('public')->delete($ppdb->poster);
            }

            $posterFile = $request->file('poster');
            $originalPosterName = $posterFile->getClientOriginalName();
            $posterName = time() . '_' . preg_replace('/\s+/', '_', $originalPosterName);
            $posterPath = $posterFile->storeAs('ppdb/poster', $posterName, 'public');

            $ppdb->poster = $posterPath;
            $ppdb->nama_poster = $originalPosterName;
        }

        // Update syarat ketentuan
        $ppdb->syarat_ketentuan = $request->syarat_ketentuan;

        $ppdb->save();

        return redirect()->route('ppdb')->with('message', 'Data PPDB berhasil diperbarui!');
    }

    public function delete($id_ppdb)
    {
        $ppdb = PpdbInfo::findOrFail($id_ppdb);

        if ($ppdb->formulir && Storage::disk('public')->exists($ppdb->formulir)) {
            Storage::disk('public')->delete($ppdb->formulir);
        }

        if ($ppdb->poster && Storage::disk('public')->exists($ppdb->poster)) {
            Storage::disk('public')->delete($ppdb->poster);
        }

        $ppdb->delete();

        return redirect()->route('ppdb')->with('message', 'Data PPDB berhasil dihapus!');
    }

}
