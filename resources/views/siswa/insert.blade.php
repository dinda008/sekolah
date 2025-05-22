@extends('layouts.app')
 
@section('title', 'add siswa')
 
@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">TAMBAH DATA SISWA</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('siswa.tambah_siswa.insert') }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group">
                            <label>Nama Siswa</label>
                            <input type="text" name="nama_siswa" class="form-control">
                            @error('nama_siswa')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>NISN</label>
                            <input type="text" name="nisn" class="form-control">
                            @error('nisn')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                        <div class="form-group mt-4">
                            <label>NIS</label>
                            <input type="text" name="nis" class="form-control">
                            @error('nis')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group mt-4">
                            <label class="fw-bold">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control">
                            @error('tanggal_lahir')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <label>Kelas</label>
                            <select name="id_kelas" class="form-control">
                                <option value="">-- Pilih Kelas --</option>
                                @foreach($kelas as $k)
                                    <option value="{{ $k->id_kelas }}">{{ $k->nama_kelas }}</option>
                                @endforeach
                            </select>
                            @error('id_kelas')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                        <label>Tahun Ajaran</label>
                        <select name="id_tahun_ajaran" class="form-control">
                            <option value="">-- Pilih Tahun Ajaran --</option>
                            @foreach($tahunAjaran as $tahun)
                                <option value="{{ $tahun->id_tahun_ajaran }}">{{ $tahun->nama_tahun }}</option>
                            @endforeach
                        </select>
                        @error('id_tahun_ajaran')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>Simpan</button>     
                    </form>          
                 </div>
                 </div>
        </div>
    </div>
@endsection