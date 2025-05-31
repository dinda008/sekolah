@extends('layouts.front.app')

@section('content')

<section id="sejarah-sekolah" class="section py-5" style="
    background: url('{{ asset('front/assets/img/SMP 2.png') }}') no-repeat center center fixed;
    background-size: cover;
">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-heading text-uppercase" style="color: black; font-weight: 700; font-size: 3rem;">Sejarah Singkat Sekolah</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                @forelse ($sejarah as $row)
                    <div class="card-sejarah mb-5" data-aos="fade-up">
                        <div class="row align-items-center">
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
                    </div>
                @empty
                    <div class="card-sejarah text-center p-5">
                        <p class="text-muted mb-0" style="font-size: 1.2rem;">
                            <em>Belum ada data sejarah sekolah yang tersedia.</em>
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>

@endsection

@section('styles')
<style>
    .card-sejarah {
        background-color: rgba(240, 248, 255, 0.9); /* Transparan seperti visi-misi */
        border: none;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .sejarah-content p {
        font-size: 1.1rem;
        color: #333;
        line-height: 1.8;
    }

    .sejarah-img {
        max-width: 100%;
        height: auto;
        border-radius: 12px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        max-height: 400px;
        object-fit: cover;
    }

    .section-heading {
        font-size: 2.5rem;
        font-weight: bold;
        color: #333;
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
