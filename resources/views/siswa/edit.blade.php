@extends('layouts.app')

@section('title', 'Edit Siswa')

@section('contents')
<div class="row">
    <div class="col-10">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">EDIT DATA SISWA</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('siswa.update', $siswa->id_siswa) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text" name="nama_siswa" class="form-control" value="{{ $siswa->nama_siswa }}">
                        @error('nama_siswa') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label>NISN</label>
                        <input type="text" name="nisn" class="form-control" value="{{ $siswa->nisn }}">
                        @error('nisn') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label>NIS</label>
                        <input type="text" name="nis" class="form-control" value="{{ $siswa->nis }}">
                        @error('nis') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" value="{{ $siswa->tanggal_lahir }}">
                        @error('tanggal_lahir') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label>Kelas</label>
                        <select name="id_kelas" class="form-control">
                            <option value="">-- Pilih Kelas --</option>
                            @foreach($kelas as $k)
                                <option value="{{ $k->id_kelas }}" {{ $siswa->id_kelas == $k->id_kelas ? 'selected' : '' }}>
                                    {{ $k->nama_kelas }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_kelas') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label>Tahun Ajaran</label>
                        <select name="id_tahun_ajaran" class="form-control">
                            <option value="">-- Pilih Tahun Ajaran --</option>
                            @foreach($tahunAjaran as $tahun)
                                <option value="{{ $tahun->id_tahun_ajaran }}" {{ $siswa->id_tahun_ajaran == $tahun->id_tahun_ajaran ? 'selected' : '' }}>
                                    {{ $tahun->nama_tahun }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_tahun_ajaran') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
