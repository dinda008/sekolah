@extends('layouts.front.app')

@section('content')

<section id="galeri-index" class="section py-5" style="
    background: url('{{ asset('front/assets/img/SMP 2.png') }}') no-repeat center center fixed;
    background-size: cover;
">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-heading text-uppercase" style="color: black; font-weight: 700;">Pegawai dan Staff</h2>
        </div>

        <div class="row">
            @foreach ($pegawai as $row)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4 d-flex justify-content-center">
                <div class="member">
                    <a href="{{ asset('storage/' . $row->foto) }}" data-lightbox="pegawai-gallery" data-title="{{ $row->nama }}">
                        <img src="{{ asset('storage/' . $row->foto) }}" alt="{{ $row->nama }}" class="img-fluid">
                    </a>
                    <div class="member-content text-center">
                        <h4>{{ $row->nama }}</h4>
                        <p><strong>NIP</strong> {{ $row->nip }}</p>
                        <span class="jabatan">{{ $row->jabatan->nama_jabatan ?? 'Tidak Diketahui' }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

@section('styles')
<style>
    .member {
    max-width: 220px;
    margin: 20px auto;
    position: relative;
    border: 1px solid #ddd;
    border-radius: 10px;
    overflow: hidden;
    background-color: #fff;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    padding: 10px; /* tambah padding supaya ada jarak di dalam */
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.member:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0,0,0,0.15);
}

.member img {
    width: 100%;
    height: 350px;
    object-fit: cover;
    border-radius: 10px;
    display: block;
    margin: 0 auto; /* hapus margin top supaya foto berada tepat di atas */
    cursor: pointer;
}

.member-content {
    padding: 15px 10px 10px 10px; /* beri padding bawah & atas cukup */
    text-align: center;
}

    .member-content h4 {
        font-size: 1.8rem;
        font-weight: 700;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #2c3e50;
        margin-bottom: 8px;
        text-transform: capitalize;
    }

    .member-content p {
        color: #555;
        margin-bottom: 0.5rem;
        font-weight: 500;
    }

    .member-content .jabatan {
        font-size: 1.2rem;
        font-weight: 600;
        color: #2980b9;
        display: block;
    }

    .row {
        gap: 30px;
    }
</style>
@endsection
