@extends('layouts.app')
 
@section('title', 'Edit Sarana dan Prasarana')
 
@section('contents')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">EDIT DATA SARANA DAN PRASARANA</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('sarana.update', $sarana->id_sarana) }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama Sarana dan Prasarana</label>
                        <input type="text" name="nama_sarana" class="form-control" value="{{ $sarana->nama_sarana }}">
                        @error('nama_sarana')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label class="font-weight-bold text-black">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" value="{{ $sarana->jumlah }}" required>
                        @error('jumlah')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
            
                    <div class="form-group mt-3">
                        <label class="font-weight-bold text-black">Kondisi</label>
                        <select name="kondisi" class="form-control" required>
                            <option value="">Pilih Kondisi</option>
                            <option value="Sangat Baik" {{ $sarana->kondisi == 'Sangat Baik' ? 'selected' : '' }}>Sangat Baik</option>
                            <option value="Baik" {{ $sarana->kondisi == 'Baik' ? 'selected' : '' }}>Baik</option>
                            <option value="Cukup" {{ $sarana->kondisi == 'Cukup' ? 'selected' : '' }}>Cukup</option>
                            <option value="Rusak Ringan" {{ $sarana->kondisi == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                            <option value="Rusak Berat" {{ $sarana->kondisi == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                        </select>
                        @error('kondisi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label> Sarana (Foto)</label>
                        <div class="input-group mb-3">
                            <input type="file" name="foto" class="form-control"id="inputGroupFile02" accept="image/*" required>
                            @error('foto')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    <!-- PREVIEW FOTO -->
                    <img id="preview-image" class="img-thumbnail mt-3" style="max-width: 150px; display: none;" />

                    <!-- TAMPIL FOTO LAMA HANYA JIKA BELUM ADA FOTO BARU -->
                    @if($sarana->foto)
                        <img id="old-image" src="{{ asset('storage/'.$sarana->foto) }}?timestamp={{ time() }}" 
                            width="150px" class="img-thumbnail mt-3">
                    @endif
                </div>

                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>     
                </form>        
                <script>
                    extends('layouts.app')
                </script>
            </div>
        </div>
    </div>
</div>
@endsection
