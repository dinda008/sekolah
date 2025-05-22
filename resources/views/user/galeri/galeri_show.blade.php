@extends('layouts.front.app')

@section('content')
<section style="
    background: url('{{ asset('front/assets/img/SMP 2.png') }}') no-repeat center center fixed;
    background-size: cover;
    padding: 60px 0;
">
    <div class="detail-galeri-container bg-white bg-opacity-75 p-4 rounded shadow">
        <div class="row align-items-start">
            <!-- Foto di sebelah kiri -->
            <div class="col-md-5 mb-3 mb-md-0">
                <img src="{{ asset('storage/'.$galeri->foto) }}" 
                     alt="{{ $galeri->judul_kegiatan }}" 
                     class="detail-galeri-img">
            </div>

            <!-- Konten di sebelah kanan -->
            <div class="col-md-7">
                <h2 class="detail-galeri-title">{{ $galeri->judul_kegiatan }}</h2>
                <p class="detail-galeri-date">
                    {{ \Carbon\Carbon::parse($galeri->tanggal)->translatedFormat('d F Y') }}
                </p>
                <div class="detail-galeri-content">
                    {!! $galeri->deskripsi_kegiatan !!}
                </div>
                <a href="{{ route('home.galeri') }}" class="btn btn-sm btn-primary mt-3">← Kembali ke Galeri</a>
            </div>
        </div>
    </div>
</section>
@endsection

@section('styles')
<style>
    .detail-galeri-container {
        max-width: 1100px;
        margin: 0 auto;
    }

    .detail-galeri-img {
        width: 100%;
        max-height: 400px;
        object-fit: cover;
        border-radius: 12px;
        box-shadow: 0 4px 16px rgba(0,0,0,0.1);
    }

    .detail-galeri-title {
        font-size: 2rem;
        font-weight: bold;
        color: #222;
        margin-bottom: 10px;
    }

    .detail-galeri-date {
        font-size: 0.95rem;
        color: #777;
        margin-bottom: 10px;
        font-style: italic;
    }

    .detail-galeri-content {
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

        .detail-galeri-img {
            margin-bottom: 20px;
        }
    }
</style>
@endsection
