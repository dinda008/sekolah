@extends('layouts.front.app')

@section('content')
<section style="
    background: url('{{ asset('front/assets/img/SMP 2.png') }}') no-repeat center center fixed;
    background-size: cover;
    padding: 60px 0;
">
    <div class="detail-berita-container bg-white bg-opacity-75 p-4 rounded shadow">
        <div class="row align-items-start">
            <!-- Foto di sebelah kiri -->
            <div class="col-md-5 mb-3 mb-md-0">
                <img src="{{ asset('storage/'.$berita->foto) }}" 
                     alt="{{ $berita->judul_berita }}" 
                     class="detail-berita-img">
            </div>

            <!-- Konten di sebelah kanan -->
            <div class="col-md-7">
                <h2 class="detail-berita-title">{{ $berita->judul_berita }}</h2>
                <p class="detail-berita-date">
                    {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
                </p>
                <p class="detail-berita-author">Oleh: {{ $berita->penulis->nama ?? 'Tidak diketahui' }}</p>
                <div class="detail-berita-content">
                    {!! $berita->deskripsi_berita !!}
                </div>
                
                <div class="mt-4">
                    <a href="{{ route('home') }}" class="btn btn-secondary me-2">
                        ← Kembali ke Beranda
                    </a>
                    <a href="{{ route('home.berita') }}" class="btn btn-primary">
                        ← Kembali ke Berita
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('styles')
<style>
    .detail-berita-container {
        max-width: 1100px;
        margin: 0 auto;
    }

    .detail-berita-img {
        width: 100%;
        max-height: 400px;
        object-fit: cover;
        border-radius: 12px;
        box-shadow: 0 4px 16px rgba(0,0,0,0.1);
    }

    .detail-berita-title {
        font-size: 2rem;
        font-weight: bold;
        color: #222;
        margin-bottom: 10px;
    }

    .detail-berita-date,
    .detail-berita-author {
        font-size: 0.95rem;
        color: #777;
        margin-bottom: 5px;
        font-style: italic;
    }

    .detail-berita-content {
        font-size: 1.1rem;
        line-height: 1.7;
        color: #333;
        margin-top: 15px;
        text-align: justify;
    }

    @media screen and (max-width: 768px) {
        .row {
            flex-direction: column;
        }

        .detail-berita-img {
            margin-bottom: 20px;
        }
    }
</style>
@endsection
