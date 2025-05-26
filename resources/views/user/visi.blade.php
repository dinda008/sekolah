@extends('layouts.front.app')

@section('content')

<section id="galeri-index" class="section py-5" style="
    background: url('{{ asset('front/assets/img/SMP 2.png') }}') no-repeat center center fixed;
    background-size: cover;
">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-heading text-uppercase" style="color: black; font-weight: 700; font-size: 3rem;">Visi Misi dan Tujuan</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card-visi-misi">
                    <div class="card-block">
                        @if ($profilsekolah)
                            <h4 class="judul text-primary">Visi Sekolah</h4>
                            <p class="isi">{{ $profilsekolah->visi }}</p>

                            <h4 class="judul text-success mt-4">Misi Sekolah</h4>
                            <p class="isi">{{ $profilsekolah->misi }}</p>

                            <h4 class="judul text-danger mt-4">Tujuan Sekolah</h4>
                            <p class="isi">{{ $profilsekolah->tujuan }}</p>
                        @else
                            <p class="isi text-muted"><em>Data Visi Misi dan Tujuan Sekolah belum tersedia.</em></p>
                        @endif
                    </div>
                </div>
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

    .card-block .judul {
        font-weight: 700;
        font-size: 1.4rem;
        color: #004085;
    }

    .card-block .isi {
        font-size: 1rem;
        color: #333;
        line-height: 1.8;
    }

    .section-heading {
        font-size: 2.5rem;
    }

    .section-subheading {
        font-size: 1.25rem;
    }
</style>
@endsection
