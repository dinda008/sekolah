@extends('layouts.app')

@section('title', 'Edit PPDB')

@section('contents')
<h1 class="h3 mb-2 text-gray-800">Edit Dokumen dan Poster PPDB</h1>

@if(session('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('message') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Form Edit Dokumen dan Poster</h6>
  </div>
  <div class="card-body">
    <form action="{{ route('ppdb.update', $ppdb->id_ppdb) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      {{-- Dokumen Lama --}}
      <div class="mb-3">
        <label>Dokumen Saat Ini:</label>
        <p>
          @if($ppdb->formulir)
            <a href="{{ asset('storage/' . $ppdb->formulir) }}" target="_blank" rel="noopener noreferrer">
              {{ $ppdb->nama_dokumen }}
            </a>
          @else
            <span class="text-muted">Tidak ada dokumen</span>
          @endif
        </p>
      </div>

      {{-- Upload Dokumen Baru --}}
      <div class="form-group border p-3 mb-3 rounded">
        <label for="dokumen">Upload Dokumen Baru (PDF, DOC, DOCX) - kosongkan jika tidak ganti</label>
        <input 
          type="file" 
          class="form-control-file @error('dokumen') is-invalid @enderror" 
          id="dokumen" 
          name="dokumen" 
          accept=".pdf,.doc,.docx"
        >
        @error('dokumen')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      {{-- Poster Lama --}}
      <div class="mb-3">
        <label>Poster Saat Ini:</label>
        <div>
          @if($ppdb->poster)
            <img 
              id="posterPreview"
              src="{{ asset('storage/' . $ppdb->poster) }}" 
              alt="Poster PPDB" 
              style="max-width: 200px; max-height: 250px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.2);"
            >
          @else
            <span class="text-muted">Tidak ada poster</span>
          @endif
        </div>
      </div>

      {{-- Upload Poster Baru --}}
      <div class="form-group border p-3 mb-3 rounded">
        <label for="poster">Upload Poster Baru (JPG, PNG) - kosongkan jika tidak ganti</label>
        <input 
          type="file" 
          class="form-control-file @error('poster') is-invalid @enderror" 
          id="poster" 
          name="poster" 
          accept=".jpg,.jpeg,.png"
        >
        @error('poster')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Update</button>
      <a href="{{ route('ppdb') }}" class="btn btn-secondary ms-2">Batal</a>
    </form>
  </div>
</div>

<script>
  document.getElementById('poster').addEventListener('change', function(event) {
    const [file] = event.target.files;
    if (file) {
      const preview = document.getElementById('posterPreview');
      preview.src = URL.createObjectURL(file);
    }
  });
</script>
@endsection
