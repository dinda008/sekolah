<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\EkstraController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KepalaSekolahController;
use App\Http\Controllers\Pegawai;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SaranaController;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\WakilController;
use Illuminate\Support\Facades\Route;


// Login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginAction'])->name('login.post');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Dashboard (hanya bisa diakses kalau sudah login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::controller(PegawaiController::class)->prefix('pegawai')->group(function() {
    Route::get('', 'index')->name('pegawai');
    Route::get('/insert', 'add')->name('pegawai.insert');
    Route::post('/insert', 'insert')->name('pegawai.add.insert');
    Route::get('edit/{id_pegawai}', 'edit')->name('pegawai.edit');
    Route::put('/update/{id_pegawai}', 'update')->name('pegawai.update');
    Route::delete('/delete/{id_pegawai}', 'delete')->name('pegawai.delete');
});

Route::controller(BeritaController::class)->prefix('berita')->group(function() {
    Route::get('', 'index')->name('berita');
    Route::get('/tambah_berita', 'tambah_berita')->name('berita.insert');
    Route::post('/tambah_berita', 'insert')->name('berita.tambah_berita.insert');
    Route::get('/edit/{id_berita}', 'edit')->name('berita.edit');
    Route::put('/update/{id_berita}', 'update')->name('berita.update');
    Route::delete('/delete/{id_berita}', 'delete')->name('berita.delete');
});

Route::controller(ProfilController::class)->prefix('profil')->group(function() {
    Route::get('', 'profil_sekolah')->name('profil.profil_sekolah'); 
    Route::get('/tambah_profil_sekolah', 'add_profil')->name('profil.profil_sekolah.insert'); // Tambah Data Profil Sekolah
    Route::post('/tambah_profil_sekolah', 'insert')->name('profil.profil_sekolah.add_profil.insert'); // Untuk mengirimkan penyimpanan data
    Route::get('/edit/{id_profil}', 'edit')->name('profil.profil_sekolah.edit'); // Untuk menampilkan form edit
    Route::put('/update/{id_profil}', 'update')->name('profil.profil_sekolah.update');
    Route::delete('/delete/{id_profil}', 'delete')->name('profil.profil_sekolah.delete');
});

Route::controller(SejarahController::class)->prefix('sejarah')->group(function () {
    Route::get('', 'sejarah')->name('profil.sejarah'); // Route untuk sejarah
    Route::get('/tambah_sejarah_Sekolah', 'tambah_sejarah')->name('profil.sejarah.insert'); // Tambah Data Sejarah Sekolah
    Route::post('/tambah_sejarah', 'insert')->name('profil.sejarah.tambah_sejarah.insert'); // Untuk menyimpan data 
    Route::get('edit/{id_sejarah}', 'edit')->name('profil.sejarah.edit');
    Route::put('update/{id_sejarah}', 'update')->name('profil.sejarah.update');
    Route::delete('/delete/{id_sejarah}', 'delete')->name('profil.sejarah.delete');
});

Route::controller(StrukturOrganisasiController::class)->prefix('struktur')->group(function () {
    Route::get('', 'struktur')->name('profil.struktur'); // Route untuk struktur organisasi
    Route::get('/tambah_struktur_sekolah', 'tambah_struktur')->name('profil.struktur.insert'); // Tambah data struktur organisasi
    Route::post('/tambah_struktur_sekolah', 'insert')->name('profil.struktur.tambah_struktur.insert'); // Untuk tombol simpan setelah menambahkan 
    Route::get('/edit/{id_struktur}', 'edit')->name('profil.struktur.edit');
    Route::put('/update/{id_struktur}', 'update')->name('profil.struktur.update');
    Route::delete('/delete/{id_struktur}', 'delete')->name('profil.struktur.delete');
});
    
Route::controller(SiswaController::class)->prefix('siswa')->group(function() {
    Route::get('', 'index')->name('siswa');
    Route::get('/tambah_siswa', 'tambah_siswa')->name('siswa.insert');
    Route::post('tambah_siswa', 'insert')->name('siswa.tambah_siswa.insert');
    Route::get('/edit/{id_siswa}', 'edit')->name('siswa.edit');
    Route::put('update/{id_siswa}', 'update')->name('siswa.update');
    Route::delete('/delete/{id_siswa}', 'delete')->name('siswa.delete');
    Route::get('/export-pdf/{id_kelas}', 'exportPDF')->name('siswa.export');
     Route::get('/export-filter', 'exportFilter')->name('siswa.export.filter');
});

Route::controller(SaranaController::class)->prefix('sarana')->group(function () {
    Route::get('', 'index')->name('sarana');
    Route::get('/tambah_sarana', 'tambah_sarana')->name('sarana.insert');
    Route::post('/tambah_sarana', 'insert')->name('sarana.tambah_sarana.insert');
    Route::get('/edit{id_sarana}', 'edit')->name('sarana.edit');
    Route::put('/update/{id_sarana}', 'update')->name('sarana.update');
    Route::delete('/delete/{id_sarana}', 'delete')->name('sarana.delete');
});

Route::controller(EkstraController::class)->prefix('ekstra')->group(function() {
    Route::get('', 'index')->name('ekstra');
    Route::get('/tambah_ekstra', 'tambah_ekstra')->name('ekstra.insert');
    Route::post('/tambah_ekstra', 'insert')->name('ekstra.tambah_ekstra.insert');
    Route::get('/edit/{id_ekstra}', 'edit')->name('ekstra.edit');
    Route::put('/update/{id_ekstra}', 'update')->name('ekstra.update');
    Route::delete('/delete/{id_ekstra}', 'delete')->name('ekstra.delete');
});

Route::controller(GaleriController::class)->prefix('galeri')->group(function() {
    Route::get('', 'index')->name('galeri');
    Route::get('/tambah_galeri', 'tambah_galeri')->name('galeri.insert');
    Route::post('/tambah_galeri', 'insert')->name('galeri.tambah_galeri.insert');
    Route::get('/edit{id_galeri}', 'edit')->name('galeri.edit');
    Route::put('/update{id_galeri}', 'update')->name('galeri.update');
    Route::delete('/delete{id_galeri}', 'delete')->name('galeri.delete');
});


// Route untuk halaman home (landing page)
    Route::get('/', [HomeController::class, 'home'])->name('home');

    Route::controller(HomeController::class)->prefix('home')->group(function(){
        Route::get('/kepalasekolah', 'kepalasekolah')->name('home.kepalasekolah');
        Route::get('/pegawai', 'pegawai')->name('home.pegawai');
        Route::get('/siswa', 'siswa')->name('home.siswa');
        Route::get('/visi_misi_tujuan', 'visi_misi_tujuan')->name('home.visi_misi_tujuan');
        Route::get('/sejarah', 'sejarah')->name('home.sejarah');
        Route::get('/struktur_organisasi', 'struktur_organisasi')->name('home.struktur_organisasi');
        Route::get('/sarana_prasarana', 'sarana_prasarana')->name('home.sarana_prasarana');
        Route::get('/berita', 'berita')->name('home.berita');
        Route::get('/berita/{id_berita}', 'show')->name('home.berita.show');
        Route::get('/kontak', 'kontak')->name('home.kontak');
        Route::get('/galeri', 'galeri')->name('home.galeri');
        Route::get('/galeri/{id_galeri}', 'tampilkan')->name('home.galeri.tampilkan');
});
    
