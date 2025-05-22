@extends('layouts.app')

@section('title', 'Berita')

@section('contents')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Berita</h1>

@if(session('message'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{ session('message') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('berita.insert') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Berita
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul Berita</th>
                        <th>Tanggal</th>
                        <th>Deskripsi Berita</th>
                        <th>Foto</th>
                        <th>Penulis</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;?>
                    @foreach ($berita as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->judul_berita }}</td>
                        <td>{{ $row->tanggal }}</td>
                        <td>{{ $row->deskripsi_berita }}</td>
                        <td>
                            <img src="{{ asset('storage/'.$row->foto) }}" width="60px">
                        </td>
                        <td>{{ $row->penulis->nama ?? 'Tidak diketahui' }}</td>
                        <td>
                            <div class="d-flex align-items-center" style="gap: 10px;">
                                <a href="{{ route('berita.edit', $row->id_berita) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Ubah
                                </a>
                                <form action="{{ route('berita.delete', $row->id_berita) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
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
