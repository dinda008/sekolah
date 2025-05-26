@extends('layouts.app')
 
@section('title', 'Profil Sekolah')
 
@section('contents')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Visi Misi dan Tujuan</h1>

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
                            <a href="{{ route('profil.profil_sekolah.insert') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Tambah Data Profil Sekolah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Visi Sekolah</th>
                                            <th>Misi Sekolah</th>
                                            <th>Tujuan Sekolah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;?>
                                        @foreach ($profilsekolah as $row)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$row->visi}}</td>
                                            <td>{{$row->misi}}</td>
                                            <td>{{$row->tujuan}}</td>
                                           
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('profil.profil_sekolah.edit', $row->id_profil) }}" class="btn btn-warning btn-sm" style="margin-right: 10px;">
                                                        <i class="fas fa-edit"></i> Ubah
                                                    </a>
                                            
                                                    <form action="{{ route('profil.profil_sekolah.delete', $row->id_profil) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                                                            <i class="fas fa-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                             
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endsection