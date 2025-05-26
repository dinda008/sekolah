@extends('layouts.front.app')

@section('content')

<section id="sejarah-sekolah" class="section sejarah-sekolah" style="
    background: url('{{ asset('front/assets/img/SMP 2.png') }}') no-repeat center top fixed;
    background-size: cover;
    color: white;
    text-shadow: 0 0 10px rgba(0,0,0,0.7);
    height: 200px;
    position: relative;
">
    <div class="container text-center" style="z-index: 2; padding-top: 50px;">
        <h2 class="section-heading text-uppercase" style="color: black; font-weight: 700; font-size: 3rem;">Sejarah Singkat Sekolah</h2>
    </div>
</section>

<section class="section">
    <div class="container">
        @forelse ($sejarah as $row)
            <div class="row align-items-center mb-5" data-aos="fade-up">
                <!-- Deskripsi -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="sejarah-content">
                        <p style="text-align: justify;">{!! nl2br(e($row->sejarah)) !!}</p>
                    </div>
                </div>

                <!-- Foto -->
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('storage/' . $row->foto) }}" class="img-fluid sejarah-img" alt="Foto Sejarah Sekolah">
                </div>
            </div>
        @empty
            <div class="text-center p-5 bg-light rounded shadow-sm">
                <p class="mb-0" style="font-size: 1.2rem; color: #666;">
                    Belum ada data sejarah sekolah yang tersedia.
                </p>
            </div>
        @endforelse
    </div>
</section>

@endsection

@section('styles')
<style>
    .sejarah-content {
        background-color: #f4f5ff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .sejarah-content p {
        font-size: 1.1rem;
        color: #333;
        line-height: 1.8;
    }

    .sejarah-content h4 {
        font-size: 1.5rem;
        font-weight: bold;
        color: #2c3e50;
    }

    .section-heading {
        font-size: 2rem;
        font-weight: bold;
        color: #333;
    }

    .sejarah-img {
        max-width: 100%;
        height: auto;
        border-radius: 12px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        max-height: 400px;
        object-fit: cover;
    }

    @media (max-width: 768px) {
        .row.align-items-center {
            flex-direction: column-reverse;
        }
        .sejarah-img {
            max-height: 300px;
            margin-bottom: 20px;
        }
    }
</style>
@endsection
