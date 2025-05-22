@extends('layouts.app')

@section('title', 'Edit Ekstrakurikuler')

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">EDIT DATA PROFIL SEKOLAH</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('ekstra.update', $ekstra->id_ekstra) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama Ekstrakurikuler</label>
                        <input type="text" name="nama_ekstra" class="form-control" value="{{ $ekstra->nama_ekstra }}">
                        @error('nama_ekstra')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Upload Logo Baru -->
                    <div class="form-group">
                        <label>Logo</label>
                        <div class="input-group mb-3">
                            <input type="file" name="logo" class="form-control" id="logoPreviewInput" accept="image/*">
                            @error('logo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tampilkan logo lama -->
                        @if($ekstra->logo)
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $ekstra->logo) }}" alt="Logo Lama" style="max-height: 150px;" id="oldLogo">
                            </div>
                        @endif

                        <!-- Preview logo baru -->
                        <div class="mt-2">
                            <img id="logoPreview" src="#" alt="Preview Logo" style="display: none; max-height: 150px;">
                        </div>
                    </div>

                    <!-- Tombol Simpan -->
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Preview gambar logo baru
    document.getElementById("logoPreviewInput").addEventListener("change", function(event) {
        const [file] = event.target.files;
        if (file) {
            const preview = document.getElementById("logoPreview");
            preview.src = URL.createObjectURL(file);
            preview.style.display = "block";

            // Sembunyikan logo lama kalau ada
            const oldLogo = document.getElementById("oldLogo");
            if (oldLogo) {
                oldLogo.style.display = "none";
            }
        }
    });
</script>
@endsection
