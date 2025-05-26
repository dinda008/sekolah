@extends('layouts.front.app')

@section('content')

<section id="ppdb-index" class="section py-5" style="
    background: url('{{ asset('front/assets/img/SMP 2.png') }}') no-repeat center center fixed;
    background-size: cover;
">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-heading text-uppercase" style="color: black; font-weight: 700; font-size: 3rem;">
                Informasi PPDB
            </h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card-ppdb">
                    <div class="card-block">
                        @if($ppdb->isEmpty())
                            <p class="isi text-muted text-center"><em>Belum ada informasi PPDB saat ini.</em></p>
                        @else
                            @foreach($ppdb as $item)
                                {{-- Poster --}}
                                @if($item->poster)
                                    <div class="text-center mb-4">
                                        <img 
                                            src="{{ asset('storage/' . $item->poster) }}" 
                                            alt="Poster PPDB" 
                                            class="img-fluid rounded"
                                            style="max-height: 400px; object-fit: cover;"
                                        >
                                    </div>
                                @endif

                                {{-- Formulir --}}
                                <div class="text-center mt-3">
                                    @if($item->formulir)
                                        <a 
                                            href="{{ asset('storage/' . $item->formulir) }}" 
                                            target="_blank" 
                                            class="btn btn-primary"
                                        >
                                            Unduh Formulir PPDB
                                        </a>
                                    @else
                                        <p class="text-muted">Formulir belum tersedia.</p>
                                    @endif
                                </div>

                                @if (!$loop->last)
                                    <hr class="my-4">
                                @endif
                            @endforeach
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
    .card-ppdb {
        background-color: rgba(240, 248, 255, 0.9); /* Transparansi */
        border: none;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .card-block .isi {
        font-size: 1rem;
        color: #333;
        line-height: 1.8;
    }

    .section-heading {
        font-size: 2.5rem;
    }
</style>
@endsection
