@extends('layouts.front.app')

@section('content')

<section id="siswa-index" class="section siswa-index py-5" style="
    background: url('{{ asset('front/assets/img/SMP 2.png') }}') no-repeat center center fixed;
    background-size: cover;
    ">
    <div class="container" style="background-color: rgba(255, 255, 255, 0.85); padding: 30px; border-radius: 12px;">
        <div class="text-center mb-5">
            <h2 class="section-heading text-uppercase" style="color: black; font-weight: 700;">Daftar Siswa</h2>
        </div>

        <!-- Filter Tahun Ajaran -->
        <form method="GET" action="{{ route('home.siswa') }}" class="mb-4 text-center">
            <select name="tahun" onchange="this.form.submit()" class="form-select w-auto d-inline-block" style="display: inline-block;">
                <option value="">-- Pilih Tahun Ajaran --</option>
                @foreach ($listTahun as $item)
                    <option value="{{ $item->nama_tahun }}" {{ request('tahun') == $item->nama_tahun ? 'selected' : '' }}>
                        {{ $item->nama_tahun }}
                    </option>
                @endforeach
            </select>
        </form>

        <!-- Daftar Kelas dan Siswa -->
        @forelse ($kelas as $k)
            @if($k->siswa->count())
                <h4 class="mt-4" style="color: #333; font-weight: 600;">{{ $k->nama_kelas }}</h4>
                <div class="row">
                    @foreach ($k->siswa as $s)
                        <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="card-siswa">
                                <div class="card-content">
                                    <h4>{{ $s->nama_siswa }}</h4>
                                    <p><strong>NISN:</strong> {{ $s->nisn }}</p>
                                    <p><strong>NIS:</strong> {{ $s->nis }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @empty
            <p class="text-center" style="color: #555;">Tidak ada data siswa untuk tahun ajaran ini.</p>
        @endforelse

    </div>
</section>

@endsection

@section('styles')
<style>
    .card-siswa {
        border: 1px solid #ddd;
        border-radius: 10px;
        background-color: #f4f9ff; /* biru muda yang tidak terlalu terang */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease-in-out;
        padding: 20px;
        text-align: center;
        height: 100%;
    }

    .card-siswa:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    .card-content h4 {
        font-size: 1.3rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }

    .card-content p {
        font-size: 1rem;
        color: #555;
        margin-bottom: 5px;
    }
</style>
@endsection
