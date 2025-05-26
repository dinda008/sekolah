@extends('layouts.app')

@section('title', 'PPDB - Upload Dokumen dan Poster')

@section('contents')
<h1 class="h3 mb-2 text-gray-800">Upload Dokumen dan Poster PPDB</h1>

@if(session('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('message') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

{{-- Tampilkan error validasi --}}
@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Upload Dokumen dan Poster</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('ppdb.tambah_ppdb.insert') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group border p-3 mb-3 rounded">
                <label for="dokumen">Upload Dokumen (PDF, DOC, DOCX)</label>
                <input type="file" 
                       class="form-control-file @error('dokumen') is-invalid @enderror" 
                       id="dokumen" name="dokumen" 
                       accept=".pdf,.doc,.docx" 
                       required>
                @error('dokumen')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group border p-3 mb-3 rounded">
                <label for="poster">Upload Poster (JPG, JPEG, PNG)</label>
                <input type="file" 
                       class="form-control-file @error('poster') is-invalid @enderror" 
                       id="poster" name="poster" 
                       accept="image/jpeg,image/jpg,image/png" 
                       required>
                @error('poster')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                {{-- Preview gambar --}}
                <div class="mt-3">
                    <img id="imagePreview" src="#" alt="Preview Poster" 
                         style="display:none; max-width: 300px; max-height: 200px; width: auto; height: auto; border: 1px solid #ddd; border-radius: 8px;">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
</div>

{{-- Script preview gambar --}}
<script>
    document.getElementById('poster').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('imagePreview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    });
</script>
@endsection
