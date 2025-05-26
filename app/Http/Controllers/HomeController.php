<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ekstra;
use App\Models\Galeri;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Pegawai; // <-- Pakai model Pegawai, bukan SambutanKepalaSekolah
use App\Models\PpdbInfo;
use App\Models\ProfilSekolah;
use App\Models\SaranaPrasarana;
use App\Models\Sejarah;
use App\Models\Siswa;
use App\Models\StrukturOrganisasi;
use App\Models\TahunAjaran;

class HomeController extends Controller
{

public function home()
{
    // Ambil kepala sekolah untuk sambutan
    $kepalaSekolah = Pegawai::whereHas('jabatan', function ($query) {
        $query->where('nama_jabatan', 'Kepala Sekolah');
    })->first();

    // Ambil semua wakasek (menggunakan LIKE 'Wakasek%' atau nama pasti)
    $wakilKepalaSekolah = Pegawai::whereHas('jabatan', function ($query) {
        $query->where('nama_jabatan', 'like', 'Wakasek%');
    })->get();

    // Hitung siswa
    $jumlahSiswa = Siswa::count();

    // Hitung guru (karena di seeder pakai "Guru Sekolah")
    $jumlahGuru = Pegawai::whereHas('jabatan', function ($q) {
        $q->where('nama_jabatan', 'Guru Sekolah');
    })->count();

    // Hitung semua staff: Kepala Sekolah, semua Wakasek, Bendahara, dan STAFF TU
    $jumlahStaff = Pegawai::whereHas('jabatan', function ($q) {
        $q->whereIn('nama_jabatan', [
            'Kepala Sekolah',
            'Wakasek Kurikulum',
            'Wakasek Kesiswaan',
            'Wakasek Humas',
            'Waka Sarpras',
            'Bendahara',
            'STAFF TU',
        ]);
    })->count();

    $jumlahSarana = SaranaPrasarana::count();
    $ekstrakurikuler = Ekstra::all();
    $berita = Berita::latest()->take(3)->get();

    return view('user.home', compact(
        'kepalaSekolah',
        'wakilKepalaSekolah',
        'jumlahSiswa',
        'jumlahGuru',
        'jumlahStaff',
        'jumlahSarana',
        'ekstrakurikuler',
        'berita'
    ));
}

   public function pegawai()
{
    // Join tabel jabatan agar bisa orderBy kolom prioritas
    $pegawai = Pegawai::join('jabatan', 'pegawai.id_jabatan', '=', 'jabatan.id_jabatan')
        ->orderBy('jabatan.prioritas', 'asc')
        ->select('pegawai.*') // penting: ambil hanya kolom pegawai agar tidak bentrok
        ->with('jabatan')
        ->get();

    return view('user.pegawai', compact('pegawai'));
}


      public function siswa(Request $request)
    {
        // Ambil semua data tahun ajaran untuk dropdown
        $listTahun = TahunAjaran::orderBy('nama_tahun', 'desc')->get();

        // Ambil tahun yang dipilih user, null kalau belum pilih
        $tahunTerpilih = $request->tahun ?? null;

        // Ambil data kelas dengan relasi siswa yang sesuai tahun ajaran terpilih
        if ($tahunTerpilih) {
            $kelas = Kelas::with(['siswa' => function($query) use ($tahunTerpilih) {
                $query->whereHas('tahunAjaran', function($q) use ($tahunTerpilih) {
                    $q->where('nama_tahun', $tahunTerpilih);
                });
            }])->get();
        } else {
            // Kalau belum pilih tahun, jangan tampilkan data siswa sama sekali
            $kelas = collect();
        }

        // Kirim data ke view
        return view('user.siswa', compact('listTahun', 'kelas', 'tahunTerpilih'));
    }

    public function visi_misi_tujuan()
    {
        $profilsekolah = ProfilSekolah::first(); // pastikan hanya satu record
        return view('user.visi', compact('profilsekolah'));
    }

    public function sejarah()
    {
        $sejarah = Sejarah::all();
        return view('user.sejarah', compact('sejarah'));
    }

    public function struktur_organisasi()
    {
        $strukturorganisasi = StrukturOrganisasi::all();
        return view('user.struktur', compact('strukturorganisasi'));
    }

    public function sarana_prasarana ()
    {
        $sarana = SaranaPrasarana::all();
        return view('user.sarana', compact('sarana'));
    }

    public function berita () 
    {
        $berita = Berita::with('penulis')->orderBy('tanggal', 'desc')->get(); // ambil data penulis dari relasi
        return view('user.berita.berita', compact('berita'));
    }

    public function show($id_berita)
    {
       $berita = Berita::with('penulis')->findOrFail($id_berita);
       return view('user.berita.berita_show', compact('berita'));
    }

    public function kontak()
    {
        return view('user.kontak');
    }

     public function galeri()
    {
        // Ambil semua data galeri, bisa tambahkan paginate jika perlu
        $galeri = Galeri::orderBy('tanggal', 'desc')->get();
        return view('user.galeri.galeri', compact('galeri'));
    }

    public function tampilkan($id_galeri)
    {
        // Ambil data galeri berdasarkan id, 404 jika tidak ada
        $galeri = Galeri::findOrFail($id_galeri);
        return view('user.galeri.galeri_show', compact('galeri'));
    }

    public function ppdb()
{
    $ppdb = PpdbInfo::all(); // ambil semua data PPDB
    return view('user.ppdb', compact('ppdb'));
}
}
