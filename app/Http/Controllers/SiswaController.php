<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request) {
    $tahun_ajaran_id = $request->input('tahun_ajaran');
    $kelas_id = $request->input('kelas');

    $kelas = Kelas::all();

    $tingkatan = [
        'VII' => 7,
        'VIII' => 8,
        'IX' => 9,
    ];
    $kelas = $kelas->sortBy(function($item) use ($tingkatan) {
        $parts = explode(' ', $item->nama_kelas);
        $tingkat = $tingkatan[$parts[0]] ?? 99;
        $subkelas = $parts[1] ?? '';
        return $tingkat . $subkelas;
    });

    $query = Siswa::query();

    if ($tahun_ajaran_id) {
        $query->where('id_tahun_ajaran', $tahun_ajaran_id);
    }
    if ($kelas_id) {
        $query->where('id_kelas', $kelas_id);
    }

    // Data siswa untuk tabel utama
    $siswa = $query->get();

    // Ambil 5 data terbaru siswa berdasarkan filter yg sama
    $recentSiswa = (clone $query)->orderBy('created_at', 'desc')->limit(5)->get();

    // Ambil semua tahun ajaran untuk dropdown filter
    $tahunAjaran = TahunAjaran::orderByDesc('nama_tahun')->get();

    return view('siswa.index', compact('siswa', 'kelas', 'tahunAjaran', 'recentSiswa', 'tahun_ajaran_id', 'kelas_id'));
}

    public function tambah_siswa() {
        // Ambil semua kelas
        $kelas = Kelas::all();
        $tahunAjaran = TahunAjaran::orderByDesc('nama_tahun')->get();

        // Sorting kelas biar urut sesuai tingkatan
        $tingkatan = [
            'VII' => 7,
            'VIII' => 8,
            'IX' => 9,
        ];
        $kelas = $kelas->sortBy(function($item) use ($tingkatan) {
            $parts = explode(' ', $item->nama_kelas);
            $tingkat = $tingkatan[$parts[0]] ?? 99;
            $subkelas = $parts[1] ?? '';
            return $tingkat . $subkelas;
        });

        return view('siswa.insert', compact('kelas', 'tahunAjaran'));
    }

    public function insert(Request $request)
{
    $request->validate([
        'nama_siswa' => 'required',
        'nisn' => 'required|unique:siswa,nisn',
        'nis' => 'required',
        'tanggal_lahir' => 'required|date',
        'id_kelas' => 'required|exists:kelas,id_kelas',
        'id_tahun_ajaran' => 'required|exists:tahun_ajaran,id_tahun_ajaran',
    ]);

    Siswa::create([
        'nama_siswa' => $request->nama_siswa,
        'nisn' => $request->nisn,
        'nis' => $request->nis,
        'tanggal_lahir' => $request->tanggal_lahir,
        'id_kelas' => $request->id_kelas,
        'id_tahun_ajaran' => $request->id_tahun_ajaran,
    ]);

    return redirect()->route('siswa')->with('message', 'Tambah Data Siswa berhasil ditambahkan');
}

    public function edit($id_siswa) {
    $siswa = Siswa::findOrFail($id_siswa);
    $kelas = Kelas::all();
    $tahunAjaran = TahunAjaran::orderByDesc('nama_tahun')->get();

    return view('siswa.edit', compact('siswa', 'kelas', 'tahunAjaran'));
}

    public function update(Request $request, $id_siswa) {
    $request->validate([
        'nama_siswa' => 'required',
        'nisn' => 'required',
        'nis' => 'required',
        'tanggal_lahir' => 'required',
        'id_kelas' => 'required',
        'id_tahun_ajaran' => 'required',
    ]);

    $siswa = [
        'nama_siswa' => $request->nama_siswa,
        'nisn' => $request->nisn,
        'nis' => $request->nis,
        'tanggal_lahir' => $request->tanggal_lahir,
        'id_kelas' => $request->id_kelas,
        'id_tahun_ajaran' => $request->id_tahun_ajaran,
    ];

    Siswa::where('id_siswa', $id_siswa)->update($siswa);

    return redirect('/siswa')->with('message', 'Data berhasil diperbarui');
}

    public function delete($id_siswa) {
        $siswa = Siswa::findOrFail($id_siswa);
        $siswa->delete();

        return redirect()->route('siswa')->with('message', 'Data Siswa berhasil dihapus');
    }

    // Tambahkan method exportPerKelas ini di bawah method-method di atas
    public function exportPDF($id_kelas) {
        $kelas = Kelas::findOrFail($id_kelas);
        $siswa = Siswa::where('id_kelas', $id_kelas)->get();

        $pdf = Pdf::loadView('siswa.pdf', compact('siswa', 'kelas'));
        return $pdf->download('data_siswa_kelas_'.$kelas->nama_kelas.'.pdf');
    }

    public function exportFilter(Request $request)
{
    $tahun = $request->input('tahun');
    $kelas = $request->input('kelas');

    // Query siswa sesuai filter tahun dan kelas
    $query = Siswa::query();

    if ($tahun) {
        $query->where('id_tahun_ajaran', $tahun);
    }
    if ($kelas) {
        $query->where('id_kelas', $kelas);
    }

    $siswa = $query->get();

    // Generate PDF dengan data $siswa, misalnya pakai dompdf atau package lain
    $pdf = PDF::loadView('siswa.export', compact('siswa'));

    return $pdf->download('siswa-filter.pdf');
}


}
