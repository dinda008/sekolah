@extends('layouts.front.app')

@section('content')

<section id="struktur-organisasi" class="section py-5" style="
    background: url('{{ asset('front/assets/img/SMP 2.png') }}') no-repeat center center fixed;
    background-size: cover;
">
    <div class="container text-center mb-5">
        <h2 class="section-heading text-uppercase" style="color: black; font-weight: 700; font-size: 3rem;">
            Struktur Organisasi
        </h2>
    </div>

    <div class="container">
        @forelse ($strukturorganisasi as $row)
            <div class="struktur-wrapper mb-5 p-4 rounded shadow" style="background-color: #f4f9ff;">
                
                {{-- Gambar Struktur --}}
                <div class="struktur-img-wrapper text-center mb-4">
                    <img 
                        src="{{ asset('storage/' . $row->foto) }}" 
                        alt="Struktur Organisasi" 
                        style="width: 100%; max-width: 800px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);">
                </div>

                {{-- Deskripsi --}}
                <div class="struktur-deskripsi" style="font-size: 1.1rem; line-height: 1.8; color: #333;">
                    {!! nl2br(e($row->keterangan)) !!}
                </div>

            </div>
        @empty
            <div class="text-center py-5">
                <p style="font-size: 1.2rem; color: #666;">
                    Belum ada data struktur organisasi sekolah yang tersedia.
                </p>
            </div>
        @endforelse
    </div>
</section>

@endsection

@section('styles')
<style>
    .section-heading {
        font-size: 2.5rem;
        font-weight: 700;
        color: black !important;
    }

    .struktur-wrapper {
        background-color: rgba(240, 248, 255, 0.95);
        border-radius: 12px;
    }

    .struktur-img-wrapper img {
        max-height: 500px;
        object-fit: contain;
        width: 100%;
    }

    @media (max-width: 768px) {
        .section-heading {
            font-size: 2rem;
        }
    }
</style>
@endsection
