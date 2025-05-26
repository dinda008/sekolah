@extends('layouts.front.app')

@section('content')

{{-- Wrapper untuk seluruh konten --}}
<div style="
    background: url('{{ asset('front/assets/img/SMP 2.png') }}') no-repeat center center fixed;
    background-size: cover;
    padding: 0;
    margin: 0;
">

    {{-- Hero Section --}}
<section id="hero" class="hero section" style="position: relative; background: url('{{ asset('front/assets/img/SMP 2.png') }}') center center / cover no-repeat; margin-bottom: 0 !important; margin-top: 50px;">
    <!-- Overlay dihapus supaya foto terang -->

    <div class="container text-center mt-4 py-5" style="position: relative; z-index: 1;">
        <h2 style="color: black; font-weight: bold;">SMP NEGERI 2 PRAJEKAN</h2>
        <p style="color: black; font-weight: bold;">Di Website Resmi SMP Negeri 2 Prajekan</p>
    </div>
</section>

{{-- SAMBUTAN KEPALA SEKOLAH --}}
@if($kepalaSekolah)
<section style="background-color: #ffffff; color: #111; padding: 60px 0; margin-top: -20px;">
    <div class="container">
        <div class="row align-items-center gy-4">
            {{-- Foto Kepala Sekolah --}}
            <div class="col-lg-5 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <div class="kepsek-foto-container" 
                     style="width: 100%; max-width: 320px; aspect-ratio: 3/4; overflow: hidden; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.3);">
                    <img 
                        src="{{ asset('storage/' . $kepalaSekolah->foto) }}" 
                        alt="{{ $kepalaSekolah->nama }}" 
                        style="width: 100%; height: 100%; object-fit: cover;"
                    >
                </div>
            </div>

            {{-- Teks Sambutan --}}
            <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
                <h2 class="fw-bold mb-3">Sambutan Kepala Sekolah</h2>
                <h5 class="mb-1" style="color: #2c3e50; font-size: 2rem; font-weight: 700;">{{ $kepalaSekolah->nama }}</h5>
                <p class="mb-3" style="font-size: 1.25rem; color: #2980b9; font-weight: 600;">
                    NIP: {{ $kepalaSekolah->nip ?? '-' }}
                </p>
                <p style="text-align: justify; font-size: 1.1rem; color: #444;">
                    {{ $kepalaSekolah->sambutan ?? 'Belum ada sambutan yang ditulis.' }}
                </p>
            </div>
        </div>
    </div>
</section>

<style>
    @media (max-width: 768px) {
        .kepsek-foto-container {
            max-width: 280px !important;
        }
    }
</style>
@else
<section style="background-color: #ffffff; color: #111; padding: 60px 0; margin-top: -20px;">
    <div class="container text-center">
        <p>Sambutan kepala sekolah belum tersedia.</p>
    </div>
</section>
@endif

    {{-- Stats Section --}}
<section id="counts" class="section counts">
    <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
        <div class="row gx-6 gy-8 justify-content-center">
            {{-- Siswa --}}
            <div class="col-lg-3 col-md-6">
                <div class="stats-item text-center w-100 h-100">
                    <i class="bi bi-people-fill" style="font-size: 1.8rem; color: #2c3e50;"></i>
                    <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahSiswa }}" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Siswa</p>
                </div>
            </div>

            {{-- Guru --}}
            <div class="col-lg-3 col-md-6">
                <div class="stats-item text-center w-100 h-100">
                    <i class="bi bi-person-badge" style="font-size: 1.8rem; color: #2c3e50;"></i>
                    <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahGuru }}" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Guru</p>
                </div>
            </div>

            {{-- Staff --}}
            <div class="col-lg-3 col-md-6">
                <div class="stats-item text-center w-100 h-100">
                    <i class="bi bi-person-check" style="font-size: 1.8rem; color: #2c3e50;"></i>
                    <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahStaff }}" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Staff</p>
                </div>
            </div>

            {{-- Sarana & Prasarana --}}
            <div class="col-lg-3 col-md-6">
                <div class="stats-item text-center w-100 h-100">
                    <i class="bi bi-building" style="font-size: 1.8rem; color: #2c3e50;"></i>
                    <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahSarana }}" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Sarana & Prasarana</p>
                </div>
            </div>
        </div>
    </div>
</section>

    {{-- Team Section --}}
<section class="trainers-index py-5 mb-5">
    <div class="container">
        <div class="row">
            @forelse ($wakilKepalaSekolah as $wakil)
                <div class="col-lg-3 col-md-4 col-sm-6 d-flex mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="member w-100 text-center" 
                         style="background-color: #f9f9f9; 
                                box-shadow: 0 2px 8px rgba(0,0,0,0.1); 
                                padding: 15px; 
                                border: 1px solid #ddd; 
                                border-radius: 8px;">
                        
                        <a href="{{ asset('storage/' . $wakil->foto) }}" data-lightbox="wakil-gallery" data-title="{{ $wakil->nama }}">
                            <img 
                                src="{{ asset('storage/' . $wakil->foto) }}" 
                                class="img-fluid"
                                alt="{{ $wakil->nama }}"
                                style="object-fit: cover; width: 100%; height: 280px; border-radius: 6px;">
                        </a>

                        <div class="member-content" style="padding-top: 0.8rem; padding-bottom: 0.8rem;">
                            <h4 style="font-size: 1.5rem; margin-bottom: 0.4rem;">{{ $wakil->nama }}</h4>
                            <p style="font-size: 1rem; margin-bottom: 0.4rem; color: #333; font-weight: 600;">NIP: {{ $wakil->nip ?? '-' }}</p>
                            <span style="font-size: 1.1rem; display: block; color: #2980b9; font-weight: 600;">
                                {{ $wakil->jabatan->nama_jabatan }}
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center p-5" 
                         style="background-color: #f9f9f9; 
                                border: 1px solid #ddd; 
                                border-radius: 8px; 
                                box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                        <p style="font-size: 1.25rem; color: #888;">Belum ada data Wakil Kepala Sekolah yang ditampilkan.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- Berita Terbaru --}}
<section id="berita-home" class="section py-5" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-heading text-uppercase" style="color: #2c3e50; font-weight: 700;">Berita Sekolah</h2>
            <p style="color: #555;">Informasi dan kegiatan terbaru dari SMP Negeri 2 Prajekan</p>
        </div>

        <div class="row">
            @foreach ($berita as $row)
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                <div class="card h-100 border-0 rounded-4 shadow" style="background-color: #2c3e50; color: #ffffff; transition: transform 0.3s ease;">
                    <a href="{{ route('home.berita.show', $row->id_berita) }}">
                        <div class="ratio ratio-16x9 rounded-top overflow-hidden" style="background-color: #e9ecef;">
                            <img 
                                src="{{ asset('storage/' . $row->foto) }}" 
                                alt="{{ $row->judul_berita }}" 
                                style="object-fit: contain; width: 100%; height: 100%;"
                            >
                        </div>
                    </a>
                    <div class="card-body d-flex flex-column p-4">
                        <h5 class="card-title mb-2" style="font-weight: bold; font-size: 1.1rem;">
                            <a href="{{ route('home.berita.show', $row->id_berita) }}" class="text-white text-decoration-none">
                                {{ $row->judul_berita }}
                            </a>
                        </h5>
                        <small class="text-light mb-2 d-block">
                            {{ \Carbon\Carbon::parse($row->tanggal)->format('d M Y') }}
                        </small>
                        <p class="card-text" style="font-size: 0.95rem; color: #ecf0f1;">
                            {{ Str::limit(strip_tags($row->deskripsi_berita), 100) }}
                        </p>
                        <a href="{{ route('home.berita.show', $row->id_berita) }}" class="btn btn-sm btn-outline-light mt-auto w-fit" style="align-self: flex-start;">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('home.berita') }}" class="btn btn-primary px-4 py-2 rounded-pill">
                Lihat Semua Berita
            </a>
        </div>
    </div>
</section>

    {{-- Features Section --}}
  <section id="counts" class="section counts">
    <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
            @if ($ekstrakurikuler->count() > 0)
                @foreach ($ekstrakurikuler as $ekstra)
                <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                    <div 
                        class="features-item text-center p-4" 
                        style="background-color: rgba(255, 255, 255, 0.7); border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                        
                        <img 
                            src="{{ asset('storage/' . $ekstra->logo) }}" 
                            alt="{{ $ekstra->nama_ekstra }}" 
                            class="img-fluid mb-3" 
                            style="max-height: 80px;">
                        
                        <h3>{{ $ekstra->nama_ekstra }}</h3>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                    <div 
                        class="features-item text-center p-5" 
                        style="background-color: rgba(255, 255, 255, 0.7); border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); max-width: 400px;">
                        <p class="fs-5 mb-0" style="color: #555;"><em>Data ekstrakurikuler belum tersedia.</em></p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
</div>
@endsection
