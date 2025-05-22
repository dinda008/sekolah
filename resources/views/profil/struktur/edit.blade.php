@extends('layouts.app')

@section('title', 'Edit Struktur Sekolah')

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">EDIT DATA STRUKTUR ORGANISASI SEKOLAH</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('profil.struktur.update', $strukturorganisasi->id_struktur) }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    @method('PUT')

                    <div class="form-group">
                        <label>Struktur Sekolah (Foto)</label>
                        <div class="input-group mb-3">
                            <input type="file" name="foto" class="form-control" id="inputGroupFile02" accept="image/*">
                            @error('foto')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- PREVIEW FOTO BARU -->
                        <img id="preview-image" class="img-thumbnail mt-3" style="max-width: 200px; display: none;" />

                        <!-- TAMPIL FOTO LAMA HANYA JIKA BELUM ADA FOTO BARU -->
                        @if($strukturorganisasi->foto)
                            <img id="old-image" src="{{ asset('storage/'.$strukturorganisasi->foto) }}?timestamp={{ time() }}" 
                                width="200px" class="img-thumbnail mt-3">
                        @endif

                    </div>
                    
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="5">{{ $strukturorganisasi->keterangan }}</textarea>
                        @error('keterangan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fas fa-save"></i> Simpan
                    </button>     
                </form>  
            </div>
        </div>
    </div>
</div>

<!-- SCRIPT PREVIEW FOTO BARU -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const input = document.getElementById('inputGroupFile02');
        const preview = document.getElementById('preview-image');
        const oldImage = document.getElementById('old-image');

        input.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.setAttribute('src', e.target.result);
                    preview.style.display = 'block';

                    // Hapus tampilan foto lama jika ada
                    if (oldImage) {
                        oldImage.style.display = 'none';
                    }
                }
                reader.readAsDataURL(file);
            }
        });
    });
</script>
@endsection
