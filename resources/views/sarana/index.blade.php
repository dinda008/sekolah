@extends('layouts.app')

@section('title', 'Sarana dan Prasarana')

@section('contents')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Sarana dan Prasarana Sekolah</h1>

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
        <a href="{{ route('sarana.insert') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Data Sarana dan Prasarana
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Sarana dan Prasarana</th>
                        <th>Jumlah</th>
                        <th>Kondisi</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($sarana as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->nama_sarana }}</td>
                        <td>{{ $row->jumlah }}</td>
                        <td>{{ $row->kondisi }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $row->foto) }}" alt="Foto Sarana" width="60px">
                        </td>
                        <td>
                            <div class="d-flex" style="gap: 8px;">
                                <a href="{{ route('sarana.edit', $row->id_sarana) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Ubah
                                </a>
                                <form action="{{ route('sarana.delete', $row->id_sarana) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
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
