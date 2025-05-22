<?php

namespace App\Http\Controllers;

use App\Models\Ekstra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EkstraController extends Controller
{
    public function index () {
        $ekstra = Ekstra::all();
        return view('ekstra.index', compact('ekstra'));
    }

    public function tambah_ekstra () {
        return view('ekstra.insert');
    }

    public function insert(Request $request)
    {
        $request->validate([
            'nama_ekstra' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $logoPath = $request->file('logo')->store('ekstrakulikuler', 'public');
    
        Ekstra::create([
            'nama_ekstra' => $request->nama_ekstra,
            'logo' => $logoPath
        ]);
    
        return redirect()->route('ekstra')->with('message', 'Data berhasil ditambahkan.');
    }
    
    public function edit ($id_ekstra) 
     {
        $ekstra= Ekstra::findOrfail($id_ekstra);
        return view('ekstra.edit', compact('ekstra'));
    }

    public function update(Request $request, $id_ekstra)
{
    $request->validate([
        'nama_ekstra' => 'required|string|max:255',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    $ekstra = Ekstra::findOrFail($id_ekstra);
    $ekstra->nama_ekstra = $request->nama_ekstra;

    if ($request->hasFile('logo')) {
        // Hapus logo lama kalau ada
        if ($ekstra->logo && Storage::disk('public')->exists($ekstra->logo)) {
            Storage::disk('public')->delete($ekstra->logo);
        }

        // Upload logo baru
        $path = $request->file('logo')->store('logo-ekstra', 'public');
        $ekstra->logo = $path;
    }

    $ekstra->save();

    return redirect()->route('ekstra')->with('message', 'Data Ekstrakurikuler berhasil diperbarui');
}

    public function delete($id_ekstra)
    {
        $ekstra = Ekstra::findOrFail($id_ekstra);
        $ekstra->delete();

        return redirect()->route('ekstra')->with('message', 'Data Ekstrakurikuler berhasil dihapus');
    }
}
