@extends('layouts.front.app')

@section('content')

<section id="galeri-index" class="section py-5" style="
    background: url('{{ asset('front/assets/img/SMP 2.png') }}') no-repeat center center fixed;
    background-size: cover;
">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-heading text-uppercase" style="color: black; font-weight: 700;">Galeri Kegiatan</h2>
        </div>

        <div class="row">
            @foreach ($galeri as $row)
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="fasilitas">
                    <a href="#" class="popup-img" 
                       data-foto="{{ asset('storage/' . $row->foto) }}" 
                       data-judul="{{ $row->judul_kegiatan }}" 
                       data-deskripsi="{{ $row->deskripsi_kegiatan }}" 
                       data-tanggal="{{ \Carbon\Carbon::parse($row->tanggal)->format('d M Y') }}">
                        <img src="{{ asset('storage/' . $row->foto) }}" class="img-fluid" alt="{{ $row->judul_kegiatan }}">
                    </a>
                    <div class="fasilitas-content">
                        <h4>{{ $row->judul_kegiatan }}</h4>
                        <small style="color:#555;">{{ \Carbon\Carbon::parse($row->tanggal)->format('d M Y') }}</small>
                        <p>{{ Str::limit($row->deskripsi_kegiatan, 80) }}</p>

                        <!-- Tombol dimasukkan ke dalam kotak -->
                        <a href="{{ route('home.galeri.tampilkan', $row->id_galeri) }}" class="btn btn-sm btn-primary mt-2">Baca Selengkapnya</a>
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
    .fasilitas {
        border: 1px solid #ddd;
        border-radius: 10px;
        background-color: #f4f9ff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        transition: transform 0.3s ease-in-out;
        cursor: pointer;
    }

    .fasilitas:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .fasilitas img {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }

    .fasilitas-content {
        padding: 15px;
        text-align: center;
    }

    .fasilitas-content h4 {
        font-size: 1.2rem;
        font-weight: bold;
        color: #2a2a2a;
        margin-bottom: 5px;
    }

    .fasilitas-content p, .fasilitas-content small {
        color: #555;
    }

    /* Modal styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 1050;
        inset: 0;
        background-color: rgba(0, 0, 0, 0.9);
        align-items: center;
        justify-content: center;
        padding: 0 20px;
        overflow-y: auto;
    }

    .modal-wrapper {
        position: relative;
        max-width: 700px;
        width: 100%;
        max-height: 90vh;
        overflow-y: auto;
        background: transparent;
        text-align: center;
    }

    .modal-content {
        width: 100%;
        max-height: 400px;
        object-fit: contain;
        border-radius: 6px;
        box-shadow: 0 0 20px rgba(0,0,0,0.5);
        margin-bottom: 15px;
    }

    .modal-text h3 {
        margin-bottom: 5px;
        /* color putih sudah inline style */
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
    }

    .close:hover,
    .close:focus {
        color: #bbb;
    }
</style>
@endsection

{{-- @section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById("imageModal");
    const modalImg = document.getElementById("imgPreview");
    const modalTitle = document.getElementById("modalTitle");
    const modalDate = document.getElementById("modalDate");
    const modalDescShort = document.getElementById("modalDescShort");
    const modalDescFull = document.getElementById("modalDescFull");
    const readMoreBtn = document.getElementById("readMoreBtn");
    const closeBtn = document.querySelector(".close");

    document.querySelectorAll(".popup-img").forEach(function (el) {
        el.addEventListener("click", function (e) {
            e.preventDefault();
            modalImg.src = this.dataset.foto;
            modalTitle.textContent = this.dataset.judul;
            modalDate.textContent = this.dataset.tanggal;

            let fullDesc = this.dataset.deskripsi;
            if (fullDesc.length > 150) {
                modalDescShort.textContent = fullDesc.substring(0, 150) + "...";
                modalDescFull.textContent = fullDesc;
                readMoreBtn.style.display = "inline-block";
                modalDescFull.style.display = "none";
                modalDescShort.style.display = "block";
                readMoreBtn.textContent = "Baca Selengkapnya";
            } else {
                modalDescShort.textContent = fullDesc;
                modalDescFull.textContent = "";
                readMoreBtn.style.display = "none";
                modalDescFull.style.display = "none";
                modalDescShort.style.display = "block";
            }

            modal.style.display = "flex";
        });
    });

    readMoreBtn.addEventListener("click", function () {
        if (modalDescFull.style.display === "none") {
            modalDescFull.style.display = "block";
            modalDescShort.style.display = "none";
            this.textContent = "Tutup";
        } else {
            modalDescFull.style.display = "none";
            modalDescShort.style.display = "block";
            this.textContent = "Baca Selengkapnya";
        }
    });

    closeBtn.onclick = function () {
        modal.style.display = "none";
        modalImg.src = "";
        modalTitle.textContent = "";
        modalDescShort.textContent = "";
        modalDescFull.textContent = "";
        modalDate.textContent = "";
    };

    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
            modalImg.src = "";
            modalTitle.textContent = "";
            modalDescShort.textContent = "";
            modalDescFull.textContent = "";
            modalDate.textContent = "";
        }
    };
});
</script>
@endsection --}}
