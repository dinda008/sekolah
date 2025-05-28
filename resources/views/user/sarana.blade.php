@extends('layouts.front.app')

@section('content')

<section id="sarana-index" class="section siswa-index py-5" style="
    background: url('{{ asset('front/assets/img/SMP 2.png') }}') no-repeat center center fixed;
    background-size: cover;
">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-heading text-uppercase" style="color: black; font-weight: 700;">Sarana dan Prasarana</h2>
        </div>

        @if ($sarana->isEmpty())
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card-visi-misi text-center">
                        <p class="isi text-muted">
                            <em>Belum ada data sarana dan prasarana yang tersedia.</em>
                        </p>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                @foreach ($sarana as $row)
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="fasilitas">
                        <a href="{{ asset('storage/'.$row->foto) }}" class="popup-img">
                            <img src="{{ asset('storage/'.$row->foto) }}" class="img-fluid" alt="Foto Sarana">
                        </a>
                        <div class="fasilitas-content">
                            <h4>{{ $row->nama_sarana }}</h4>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

<!-- Modal for Image -->
<div id="imageModal" class="modal">
    <div class="modal-wrapper">
        <span class="close">&times;</span>
        <img class="modal-content" id="imgPreview">
    </div>
</div>

@endsection

@section('styles')
<style>
    .sarana-index {
        background: linear-gradient(135deg, #d9e7ff 0%, #f4f9ff 100%);
    }

    .section-heading {
        font-size: 2.5rem;
        color: black !important;
    }

    .fasilitas {
        border: 1px solid #ddd;
        border-radius: 10px;
        background-color: #f4f9ff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        transition: transform 0.3s ease-in-out;
    }

    .fasilitas:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .fasilitas img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        cursor: pointer;
    }

    .fasilitas-content {
        padding: 15px;
        text-align: center;
    }

    .fasilitas-content h4 {
        font-size: 1.2rem;
        font-weight: bold;
        color: #2a2a2a;
        margin-bottom: 10px;
    }

    .card-visi-misi {
        background-color: rgba(240, 248, 255, 0.9);
        border: none;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .card-visi-misi .isi {
        font-size: 1rem;
        color: #555;
        line-height: 1.8;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1050;
        inset: 0;
        background-color: rgba(0, 0, 0, 0.9);
        align-items: center;
        justify-content: center;
        padding: 0;
    }

    .modal-wrapper {
        position: relative;
        max-width: 90%;
        max-height: 90%;
    }

    .modal-content {
        display: block;
        width: 100%;
        height: auto;
        max-height: 90vh;
        background: transparent;
        border-radius: 6px;
        box-shadow: 0 0 20px rgba(0,0,0,0.5);
    }

    .close {
        position: fixed;
        top: 30px;
        right: 45px;
        color: #fff;
        font-size: 40px;
        font-weight: bold;
        cursor: pointer;
        z-index: 1100;
        display: none;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
    }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById("imageModal");
        const modalImg = document.getElementById("imgPreview");
        const closeBtn = document.querySelector(".close");

        document.querySelectorAll(".popup-img").forEach(function (imgLink) {
            imgLink.addEventListener("click", function (e) {
                e.preventDefault();
                modalImg.src = this.getAttribute("href");
                modal.style.display = "flex";
                closeBtn.style.display = "block";
            });
        });

        closeBtn.onclick = function () {
            modal.style.display = "none";
            modalImg.src = "";
            closeBtn.style.display = "none";
        };

        window.onclick = function (event) {
            if (event.target === modal) {
                modal.style.display = "none";
                modalImg.src = "";
                closeBtn.style.display = "none";
            }
        };
    });
</script>
@endsection
