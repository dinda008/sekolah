<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function profil_sekolah () {
        $profilsekolah = ProfilSekolah::all();
        return view('profil.profil_sekolah.index', compact('profilsekolah'));
    }

    public function add_profil () {       // Controller untuk tombol tambah data profil sekolah
        return view('profil.profil_sekolah.insert');
    }

    public function insert (Request $request) {
        $request->validate([
            'visi' => 'required',
            'misi' => 'required',
            'tujuan' => 'required',
        ]);

        ProfilSekolah::create([
            'visi' => $request->visi,
            'misi' => $request->misi,
            'tujuan' => $request->tujuan,
        ]);

        return redirect()->route('profil.profil_sekolah')->with('message', 'Tambah Data Profil Sekolah berhasil ditambahkan');
    }

    // Method untuk menapilkan fitur edit
    public function edit ($id_profil) {
        $profilsekolah= ProfilSekolah::findOrFail($id_profil);
        return view('profil.profil_sekolah.edit', compact('profilsekolah'));
    }

    public function update (Request $request, $id_profil) {
        $request->validate(
            [
                'visi'=>'required',
                'misi'=>'required',
                'tujuan'=>'required'
            ]);

        $profilsekolah = [
            'visi'=> $request->visi,
            'misi'=> $request->misi,
            'tujuan'=> $request->tujuan,
        ];

        ProfilSekolah::where('id_profil', $id_profil)->update($profilsekolah);
        return redirect()->route('profil.profil_sekolah')->with('success', 'Data berhasil diupdate');
    }

        public function delete($id_profil)
    {
        $profilsekolah = ProfilSekolah::findOrFail($id_profil);
        $profilsekolah->delete();

        return redirect()->route('profil.profil_sekolah')->with('message', 'Data Profil Sekolah berhasil dihapus');
    }

    
}
