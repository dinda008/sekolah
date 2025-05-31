@extends('layouts.app')
 
@section('title', 'Sejarah Sekolah')
 
@section('contents')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Sejarah Sekolah</h1>

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
                            <a href="{{ route('profil.sejarah.insert') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Tambah Data Sejarah Sekolah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Sejarah Sekolah</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;?>
                                        @foreach ($sejarah as $row)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$row->sejarah}}</td>
                                            <td><img src="{{ asset('storage/' . $row->foto) }}" alt="Foto Sejarah" width="250px">
                                            </td>
                                            <td>
                                                <div class="d-flex gap-6">
                                                    <a href="{{ route('profil.sejarah.edit', $row->id_sejarah) }}" class="btn btn-warning btn-sm" style="margin-right: 15px;">
                                                        <i class="fas fa-edit"></i> Ubah
                                                    </a>
                                                    <form action="{{ route('profil.sejarah.delete', $row->id_sejarah) }}" method="POST">
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