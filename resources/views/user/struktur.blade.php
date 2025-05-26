@extends('layouts.front.app')

@section('content')

<section id="struktur-organisasi" class="section py-5" style="
    background: url('{{ asset('front/assets/img/SMP 2.png') }}') no-repeat center center fixed;
    background-size: cover;
">
    <div class="container text-center mb-5">
        <h2 class="section-heading text-uppercase" style="color: black; font-weight: 700; font-size: 3rem;">Struktur Organisasi</h2>
    </div>

    <div class="struktur-wrapper d-flex flex-wrap align-items-stretch" style="max-width: 1200px; margin: auto; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); overflow: hidden; background-color: #f4f9ff; padding: 20px;">
        @forelse ($strukturorganisasi as $row)
            <div class="struktur-img-wrapper" style="flex: 1 1 50%; max-width: 50%; padding: 10px;">
                <img src="{{ asset('storage/' . $row->foto) }}" alt="Foto Struktur Organisasi" style="width: 100%; height: auto; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); object-fit: cover;">
            </div>

            <div class="struktur-deskripsi-wrapper" style="flex: 1 1 50%; max-width: 50%; padding: 10px; display: flex; align-items: center;">
                <div class="struktur-deskripsi" style="width: 100%; font-size: 1.1rem; line-height: 1.8; color: #333;">
                    {!! nl2br(e($row->keterangan)) !!}
                </div>
            </div>
        @empty
            <div class="w-100 text-center py-5">
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
        font-size: 2rem;
        font-weight: 700;
        color: black !important;
    }

    @media (max-width: 1199.98px) {
        .struktur-wrapper {
            flex-direction: column !important;
        }
        .struktur-img-wrapper,
        .struktur-deskripsi-wrapper {
            max-width: 100% !important;
            flex: 1 1 100% !important;
            padding: 10px 0 !important;
        }
        .struktur-img-wrapper img {
            height: auto !important;
            max-height: 400px;
        }
    }
</style>
@endsection
