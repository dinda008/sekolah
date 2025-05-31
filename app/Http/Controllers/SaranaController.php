<?php

namespace App\Http\Controllers;

use App\Models\SaranaPrasarana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SaranaController extends Controller
{
    public function index () {
        $sarana = SaranaPrasarana::all();
        return view('sarana.index', compact('sarana'));
    }

    public function  tambah_sarana () {
        return view('sarana.insert');
    }

    public function insert (Request $request) {
        $request->validate([
            'nama_sarana' => 'required|string|max:255',
            'jumlah' => 'nullable|integer',
            'kondisi' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('sarana', 'public');
        }

        SaranaPrasarana::create([
            'nama_sarana' => $request->nama_sarana,
            'jumlah' => $request->jumlah,
            'kondisi' => $request->kondisi,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('sarana')->with('message', 'Data Sarana dan Prasarana berhasil ditambahkan');
    }

    public function edit($id_sarana)
    {
        $sarana = SaranaPrasarana::findOrFail($id_sarana);
        return view('sarana.edit', compact('sarana'));
    }

    public function update(Request $request, $id_sarana)
{
    $sarana = SaranaPrasarana::findOrFail($id_sarana);

    $data = $request->validate([
        'nama_sarana' => 'required|string',
        'jumlah' => 'nullable|integer',
        'kondisi' => 'required|string',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Jika ada file foto baru
    if ($request->hasFile('foto')) {
        // Hapus foto lama kalau ada
        if ($sarana->foto && Storage::disk('public')->exists($sarana->foto)) {
            Storage::disk('public')->delete($sarana->foto);
        }

        // Simpan foto baru
        $data['foto'] = $request->file('foto')->store('sarana', 'public');
    }

    $sarana->update($data);

    return redirect()->route('sarana')->with('message', 'Data Sarana dan Prasarana berhasil diperbarui');
}

    public function delete($id_sarana)
    {
        $sarana = SaranaPrasarana::findOrFail($id_sarana);
        $sarana->delete();

        return redirect()->route('sarana')->with('message', 'Data Sarana dan Prasarana berhasil dihapus');
    }
}
