@extends('layouts.app')
 
@section('title', 'Ekstrakulikuler')
 
@section('contents')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Ekstrakulikuler</h1>

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
                            <a href="{{ route('ekstra.insert') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Tambah Data Ekstrakulikuler</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Ekstrakulikuler</th>
                                            <th>Logo</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;?>
                                        @foreach ($ekstra as $row)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->nama_ekstra }}</td>
                                            <td>
                                                @if($row->logo)
                                                    <img src="{{ asset('storage/' . $row->logo) }}" width="60px" alt="Logo {{ $row->nama_ekstra }}">
                                                @endif
                                            </td>
                                            <td>
                                                <div class="mb-3">
                                                    <a href="{{ route('ekstra.edit', $row->id_ekstra) }}" class="btn btn-warning btn-sm" style="margin-right: 8px;">
                                                        <i class="fas fa-edit"></i> Ubah
                                                    </a>
                                                
                                                    <form action="{{ route('ekstra.delete', $row->id_ekstra) }}" method="post" style="display: inline-block;">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
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