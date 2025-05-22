@extends('layouts.app')

@section('title', 'add ektra')

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">TAMBAH DATA PROFIL SEKOLAH</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('ekstra.tambah_ekstra.insert') }}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="form-group">
                        <label>Nama Ekstrakulikuler</label>
                        <input type="text" name="nama_ekstra" class="form-control">
                        @error('nama_ekstra')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>Logo</label>
                        <div class="input-group mb-3">
                            <input type="file" name="logo" class="form-control" id="logoPreviewInput" accept="image/*" required>
                            @error('logo')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tempat preview gambar -->
                        <div class="mt-2">
                            <img id="logoPreview" src="#" alt="Preview Logo" style="display: none; max-height: 150px;">
                        </div>
                    </div>                        

                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>     
                </form>          
            </div>
        </div>
    </div>
</div>
@endsection

{{-- SCRIPT KHUSUS UNTUK PREVIEW --}}
@section('scripts')
<script>
    document.getElementById("logoPreviewInput").addEventListener("change", function(event) {
        const [file] = event.target.files;
        if (file) {
            const preview = document.getElementById("logoPreview");
            preview.src = URL.createObjectURL(file);
            preview.style.display = "block";
        }
    });
</script>
@endsection
