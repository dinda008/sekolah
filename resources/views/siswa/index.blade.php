@extends('layouts.app')

@section('title', 'Siswa')

@section('contents')
<h1 class="h3 mb-2 text-gray-800">Data Siswa</h1>

@if(session('message'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{ session('message') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex justify-content-between align-items-center">
    <a href="{{ route('siswa.insert') }}" class="btn btn-primary btn-sm">
      <i class="fas fa-plus"></i> Tambah Data Siswa
    </a>
  </div>

  <div class="card-body">
    <!-- Filter Form -->
    <form method="GET" action="{{ route('siswa') }}" class="mb-4 row">
      <div class="col-md-4">
        <label for="tahun">Pilih Tahun Ajaran</label>
        <select name="tahun" id="tahun" class="form-control">
          <option value="">-- Pilih Tahun --</option>
          @foreach($tahunAjaran as $ta)
            <option value="{{ $ta->id_tahun_ajaran }}" {{ request('tahun') == $ta->id_tahun_ajaran ? 'selected' : '' }}>
              {{ $ta->nama_tahun }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="col-md-4">
        <label for="kelas">Pilih Kelas</label>
        <select name="kelas" id="kelas" class="form-control">
          <option value="">-- Pilih Kelas --</option>
          @foreach($kelas as $k)
            <option value="{{ $k->id_kelas }}" {{ request('kelas') == $k->id_kelas ? 'selected' : '' }}>
              {{ $k->nama_kelas }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="col-md-4 d-flex align-items-end">
        <button type="submit" class="btn btn-success mr-2">
          <i class="fas fa-filter"></i> Tampilkan
        </button>

        <a href="{{ route('siswa.export.filter', ['tahun' => request('name_tahun'), 'kelas' => request('kelas')]) }}" 
           target="_blank" 
           class="btn btn-danger">
          <i class="fas fa-file-pdf"></i> Export PDF
        </a>
      </div>
    </form>

    @if($siswa->isEmpty())
      <div class="alert alert-info">Silakan pilih tahun ajaran dan kelas untuk melihat data siswa.</div>
    @else
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama Siswa</th>
            <th>NISN</th>
            <th>NIS</th>
            <th>Tanggal Lahir</th>
            <th>Kelas</th>
            <th>Tahun Ajaran</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @php $no = 1; @endphp
          @foreach ($siswa as $row)
          <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $row->nama_siswa }}</td>
            <td>{{ $row->nisn }}</td>
            <td>{{ $row->nis }}</td>
            <td>{{ $row->tanggal_lahir }}</td>
            <td>{{ $row->kelas->nama_kelas ?? '-' }}</td>
            <td>{{ $row->tahunAjaran->nama_tahun ?? '-' }}</td>
            <td>
              <div class="mb-3">
                <a href="{{ route('siswa.edit', $row->id_siswa) }}" class="btn btn-warning btn-sm mb-1">
                  <i class="fas fa-edit"></i> Ubah
                </a>
                <form action="{{ route('siswa.delete', $row->id_siswa) }}" method="post" style="display: inline-block;">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
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
    @endif
  </div>
</div>
@endsection
