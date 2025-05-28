@extends('layouts.app')

@section('title', 'PPDB')

@section('contents')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data PPDB</h1>

@if(session('message'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{ session('message') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<!-- DataTables Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('ppdb.insert') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Data PPDB
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Dokumen (Formulir)</th>
                        <th>Poster</th>
                        <th>Syarat & Ketentuan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($ppdb as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                            @if($row->formulir)
                            <a href="{{ asset('storage/' . $row->formulir) }}" target="_blank" rel="noopener noreferrer">
                                {{ basename($row->formulir) }}
                            </a>
                            @else
                            <span class="text-muted">Tidak ada dokumen</span>
                            @endif
                        </td>
                        <td>
                            @if($row->poster)
                            <img src="{{ asset('storage/' . $row->poster) }}" alt="Poster PPDB" width="60" style="border-radius: 4px;">
                            @else
                            <span class="text-muted">Tidak ada poster</span>
                            @endif
                        </td>
                        <td style="max-width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            {{ $row->syarat_ketentuan }}
                        </td>
                        <td>
                            <div class="d-flex" style="gap: 8px;">
                                <a href="{{ route('ppdb.edit', $row->id_ppdb) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Ubah
                                </a>

                                <form action="{{ route('ppdb.delete', $row->id_ppdb) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus?')">
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
                    
                    @if($ppdb->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center">Data PPDB belum tersedia.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
