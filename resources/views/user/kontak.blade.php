@extends('layouts.front.app')

@section('content')

<!-- Section Header dengan Background fixed tanpa overlay -->
<section style="
    background: url('{{ asset('front/assets/img/SMP 2.png') }}') no-repeat center center fixed;
    background-size: cover;
    position: relative;
    padding: 200px 0; /* Tinggi foto diperbesar */
    text-align: center;
    color: white;
    margin-bottom: 0;
    /* shadow agar teks tetap terbaca di atas background */
    text-shadow: 0 0 10px rgba(0,0,0,0.7);
">
   <div class="container" style="position: relative; z-index: 2;">
    <h1 class="fw-bold display-4 text-white">Hubungi Kami</h1>
</div>
</section>

<!-- Section Info Kontak -->
<section style="background-color: #111; color: #fff; padding: 60px 0; margin: 0;">
    <div class="container text-center">
        <div class="row justify-content-center">
            <!-- Telepon -->
            <div class="col-md-4 mb-4">
                <i class="fas fa-phone fa-3x mb-3"></i>
                <h4 class="fw-bold fs-4">Telepon</h4>
                <p class="fs-5">(0338) 671618</p>
            </div>

            <!-- Email -->
            <div class="col-md-4 mb-4">
                <i class="fas fa-envelope fa-3x mb-3"></i>
                <h4 class="fw-bold fs-4">Email</h4>
                <p class="fs-5">smadasit@yahoo.com</p>
            </div>

            <!-- Alamat -->
            <div class="col-md-4 mb-4">
                <i class="fas fa-location-arrow fa-3x mb-3"></i>
                <h4 class="fw-bold fs-4">Alamat</h4>
                <p class="fs-5">
                    Jl. Anggrek No. 1 Patokan,<br>
                    Kab. Situbondo - Indonesia
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Google Map -->
<section style="margin: 0; padding: 0;"> <!-- Map nempel ke kotak hitam -->
    <div style="width: 100%; height: 450px;">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3422.8419624887492!2d113.97994267432249!3d-7.7902011773093385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6d7bcbd14815d%3A0x350eee52b5e89854!2sUPTD%20SPF%20SMP%20NEGERI%202%20PRAJEKAN!5e1!3m2!1sid!2sid!4v1747406872653!5m2!1sid!2sid" 
            width="100%" 
            height="100%" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</section>

@endsection
