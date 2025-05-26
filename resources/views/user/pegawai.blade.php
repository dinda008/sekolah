@extends('layouts.front.app')

@section('content')

<section id="pegawai-index" class="section py-5" style="
    background: url('{{ asset('front/assets/img/SMP 2.png') }}') no-repeat center center fixed;
    background-size: cover;
">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-heading text-uppercase" style="color: black; font-weight: 700; font-size: 3rem;">Pegawai dan Staff</h2>
        </div>

        <div class="row justify-content-center">
            @if ($pegawai->isEmpty())
                <div class="col-12">
                    <div class="text-center p-4" 
                         style="background-color: #f9f9f9; 
                                border: 1px solid #ddd; 
                                border-radius: 8px; 
                                box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                        <p style="font-size: 1.1rem; color: #888;"><em>Data Pegawai dan Staff belum tersedia.</em></p>
                    </div>
                </div>
            @else
                @foreach ($pegawai as $row)
                <div class="col-lg-3 col-md-4 col-sm-6 d-flex mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="member w-100 text-center" 
                         style="background-color: #f9f9f9; 
                                box-shadow: 0 2px 8px rgba(0,0,0,0.1); 
                                padding: 15px; 
                                border: 1px solid #ddd; 
                                border-radius: 8px;">
                        
                        <a href="{{ asset('storage/' . $row->foto) }}" data-lightbox="pegawai-gallery" data-title="{{ $row->nama }}">
                            <img 
                                src="{{ asset('storage/' . $row->foto) }}" 
                                class="img-fluid"
                                alt="{{ $row->nama }}"
                                style="object-fit: cover; width: 100%; height: 240px; border-radius: 6px;">
                        </a>

                        <div class="member-content" style="padding-top: 0.8rem; padding-bottom: 0.8rem;">
                            <h4 style="font-size: 1.3rem; margin-bottom: 0.3rem; color: #2c3e50;">{{ $row->nama }}</h4>
                            <p style="font-size: 0.95rem; margin-bottom: 0.4rem; color: #333; font-weight: 600;">
                                NIP: {{ $row->nip ?? '-' }}
                            </p>
                            <span style="font-size: 1rem; display: block; color: #2980b9; font-weight: 600;">
                                {{ $row->jabatan->nama_jabatan ?? 'Tidak Diketahui' }}
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

@endsection

@section('styles')
<style>
    .section-heading {
        font-size: 3rem;
        font-weight: 700;
    }

    /* Optional: jika mau styling tambahan */
    @media (max-width: 768px) {
        .member img {
            height: 180px !important;
        }
    }
</style>
@endsection
