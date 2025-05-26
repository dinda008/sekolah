@extends('layouts.app')
 
@section('title', 'Struktur Organisai Sekolah')
 
@section('contents')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Struktur Organisasi Sekolah</h1>

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
                            <a href="{{ route('profil.struktur.insert') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Tambah Struktur Organisasi</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Struktur Organisasi</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;?>
                                        @foreach ($strukturorganisasi as $row)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>
                                                <img src="{{ asset('storage/'.$row->foto) }}" width="60px">
                                            </td>
                                            <td>{{ $row->keterangan }}</td>

                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('profil.struktur.edit', $row->id_struktur) }}" class="btn btn-warning btn-sm" style="margin-right: 15px;">
                                                        <i class="fas fa-edit"></i> Ubah
                                                    </a>
                                                    <form action="{{ route('profil.struktur.delete', $row->id_struktur) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus?')">
                                                            <i class="fas fa-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>                                        
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endsection