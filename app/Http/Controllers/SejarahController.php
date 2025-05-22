<?php

namespace App\Http\Controllers;

use App\Models\Sejarah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SejarahController extends Controller
{
    public function sejarah () {
        $sejarah = Sejarah::all();
        return view('profil.sejarah.index', compact('sejarah'));
    }

    public function tambah_sejarah () {
        return view('profil.sejarah.insert'); // Controller untuk tombol tambah data sejarah sekolah
    }

    public function insert (Request $request) {
        $request->validate([
            'sejarah' => 'required',
            'foto.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if($request->hasFile('foto')){
            $foto = $request->file('foto')->store('sejarah', 'public');
        }
        
        Sejarah::create([
            'sejarah' => $request->sejarah,
            'foto' => $foto ?? null
        ]);
        

        return redirect()->route('profil.sejarah')->with('message', 'Tambah Data Sejarah berhasil ditambahkan');

    }

    // Tampilkan form edit data
    public function edit($id_sejarah)
    {
        $sejarah = Sejarah::findOrFail($id_sejarah);
        return view('profil.sejarah.edit', compact('sejarah'));
    }

     // Proses update data
     public function update(Request $request, $id_sejarah)
     {
         $sejarah = Sejarah::findOrFail($id_sejarah);
     
         $request->validate([
             'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
             'sejarah' => 'nullable|string',
         ]);
     
         // Kalau ada upload file baru
         if ($request->hasFile('foto')) {
             // Hapus foto lama dari storage
             if ($sejarah->foto && Storage::disk('public')->exists($sejarah->foto)) {
                 Storage::disk('public')->delete($sejarah->foto);
             }
     
             // Upload dan simpan foto baru
             $sejarah->foto = $request->file('foto')->store('sejarah', 'public');
         }
     
         // Update keterangan
         $sejarah->sejarah = $request->sejarah;
         $sejarah->save();
     
         return redirect()->route('profil.sejarah')->with('success', 'Data berhasil diupdate');
     }

     public function delete($id_sejarah)
     {
         $sejarah = Sejarah::findOrFail($id_sejarah);
         $sejarah->delete();
 
         return redirect()->route('profil.sejarah')->with('message', 'Data Profil Sekolah berhasil dihapus');
     }
     
}
