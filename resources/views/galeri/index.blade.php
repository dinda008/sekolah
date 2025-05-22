@extends('layouts.app')
 
@section('title', 'Ekstrakulikuler')
 
@section('contents')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Galeri Kegiatan</h1>

@if(session('message'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{session('message')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="{{ route('galeri.insert') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Tambah Data Galeri</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul Kegiatan</th>
                                            <th>Tanggal</th>
                                            <th>Deskripsi Kegiatan</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @foreach ($galeri as $row)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $row->judul_kegiatan }}</td>
                                                <td>{{ $row->tanggal }}</td>
                                                <td>{{ $row->deskripsi_kegiatan }}</td>
                                                <td>
                                                    <img src="{{ asset('storage/' . $row->foto) }}" alt="Foto Kegiatan" width="80">
                                                </td>
                                                <td>
                                                    <a href="{{ route('galeri.edit', $row->id_galeri) }}" class="btn btn-warning btn-sm" style="margin-right: 5px;">
                                                        <i class="fas fa-edit"></i> Ubah
                                                    </a>

                                                    <form action="{{ route('galeri.delete', $row->id_galeri) }}" method="post" style="display: inline-block;">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                                                            <i class="fas fa-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                    @endsection