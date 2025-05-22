@extends('layouts.app')

@section('title', 'Pegawai')

@section('contents')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Pegawai</h1>

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
        <a href="{{ route('pegawai.insert') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Data Pegawai dan Staff
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Jabatan</th>
                        <th>Foto</th>
                        <th>Sambutan</th> <!-- Tambahkan kolom sambutan -->
                        <th>Aksi</th>
                    </tr>
                </thead>                                    
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($pegawai as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->nip }}</td>
                        <td>{{ isset($row->jabatan->nama_jabatan) ? $row->jabatan->nama_jabatan : 'Tidak Diketahui' }}</td>
                        <td>
                            @if($row->foto)
                                <img src="{{ asset('storage/'.$row->foto) }}" width="60px">
                            @else
                                -
                            @endif
                        </td> 
                        <td>
                            @if(isset($row->jabatan->nama_jabatan) && $row->jabatan->nama_jabatan === 'Kepala Sekolah')
                                {{ $row->sambutan ?? '-' }}
                            @else
                                -
                            @endif
                        </td> <!-- Kolom sambutan (Hanya untuk kepala sekolah) -->
                        <td>
                            <div class="d-flex align-items-center" style="gap: 10px;">
                                <a href="{{ route('pegawai.edit', $row->id_pegawai) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Ubah
                                </a>
                                <form action="{{ route('pegawai.delete', $row->id_pegawai) }}" method="POST">
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
