@extends('layouts.front.app')

@section('content')

<section id="pegawai-staff" class="section py-5" style="
    background: url('{{ asset('front/assets/img/SMP 2.png') }}') no-repeat center center fixed;
    background-size: cover;
">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-heading text-uppercase" style="color: black; font-weight: 700;">Berita Sekolah</h2>
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
    </div>
</section>

@endsection

@section('styles')
<style>
    /* Style sudah disesuaikan inline pada card agar sesuai dengan home */
    /* Jika ingin styling tambahan, bisa ditambah di sini */
</style>
@endsection
