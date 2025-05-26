@extends('layouts.front.app')

@section('content')

<section id="galeri-index" class="section py-5" style="
    background: url('{{ asset('front/assets/img/SMP 2.png') }}') no-repeat center center fixed;
    background-size: cover;
">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-heading text-uppercase" style="color: black; font-weight: 700; font-size: 3rem;">Galeri Kegiatan</h2>
        </div>

        <div class="card-visi-misi">
            <div class="card-block">
                @if ($galeri->isEmpty())
                    <p class="isi text-muted text-center"><em>Data Galeri belum tersedia.</em></p>
                @else
                    <div class="row">
                        @foreach ($galeri as $row)
                        <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="fasilitas">
                                <a href="#" class="popup-img" 
                                   data-foto="{{ asset('storage/' . $row->foto) }}" 
                                   data-judul="{{ $row->judul_kegiatan }}" 
                                   data-deskripsi="{{ $row->deskripsi_kegiatan }}" 
                                   data-tanggal="{{ \Carbon\Carbon::parse($row->tanggal)->format('d M Y') }}">
                                    <img src="{{ asset('storage/' . $row->foto) }}" class="img-fluid" alt="{{ $row->judul_kegiatan }}">
                                </a>
                                <div class="fasilitas-content">
                                    <h4>{{ $row->judul_kegiatan }}</h4>
                                    <small style="color:#555;">{{ \Carbon\Carbon::parse($row->tanggal)->format('d M Y') }}</small>
                                    <p>{{ Str::limit($row->deskripsi_kegiatan, 80) }}</p>

                                    <!-- Tombol dimasukkan ke dalam kotak -->
                                    <a href="{{ route('home.galeri.tampilkan', $row->id_galeri) }}" class="btn btn-sm btn-primary mt-2">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

    </div>
</section>

@endsection


@section('styles')
<style>
    .card-visi-misi {
        background-color: rgba(240, 248, 255, 0.9); /* Transparansi untuk card */
        border: none;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .card-block .isi {
        font-size: 1rem;
        color: #333;
        line-height: 1.8;
        margin: 0 auto;
        max-width: 600px;
    }

    .section-heading {
        font-size: 2.5rem;
    }

    .fasilitas {
        border: 1px solid #ddd;
        border-radius: 10px;
        background-color: #f4f9ff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        transition: transform 0.3s ease-in-out;
        cursor: pointer;
    }

    .fasilitas:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .fasilitas img {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }

    .fasilitas-content {
        padding: 15px;
        text-align: center;
    }

    .fasilitas-content h4 {
        font-size: 1.2rem;
        font-weight: bold;
        color: #2a2a2a;
        margin-bottom: 5px;
    }

    .fasilitas-content p, .fasilitas-content small {
        color: #555;
    }
</style>
@endsection
