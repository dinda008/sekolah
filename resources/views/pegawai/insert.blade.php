@extends('layouts.app')

@section('title', 'Tambah Pegawai')

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">TAMBAH DATA PEGAWAI</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('pegawai.add.insert') }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    
                    <!-- Nama -->
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control">
                        @error('nama') 
                            <small class="text-danger">{{ $message }}</small> 
                        @enderror
                    </div> 

                    <!-- NIP -->
                   <div class="form-group">
                    <label>NIP</label>
                    <input type="text" name="nip" class="form-control" maxlength="18" minlength="18" pattern="\d{18}" title="NIP harus terdiri dari 18 angka" required>
                    @error('nip') 
                        <small class="text-danger">{{ $message }}</small> 
                    @enderror
                </div>

                    <!-- Jabatan -->
                    <div class="form-group">
                        <label>Jabatan</label>
                        <select name="id_jabatan" id="jabatan-select" class="form-control">
                            <option value="">Pilih Jabatan</option>
                            @foreach($jabatan as $j)
                                <option value="{{ $j->id_jabatan }}">{{ $j->nama_jabatan }}</option>
                            @endforeach
                        </select>
                        @error('id_jabatan') 
                            <small class="text-danger">{{ $message }}</small> 
                        @enderror
                    </div>

                    <!-- Sambutan (Hanya untuk Kepala Sekolah) -->
                    <div class="form-group" id="sambutan-group" style="display: none;">
                        <label>Sambutan Kepala Sekolah</label>
                        <textarea name="sambutan" class="form-control" rows="4"></textarea>
                        @error('sambutan') 
                            <small class="text-danger">{{ $message }}</small> 
                        @enderror
                    </div>

                    <!-- Foto -->
                    <div class="form-group">
                        <label>Foto</label>
                        <div class="input-group mb-3">
                            <input type="file" name="foto" id="inputGroupFile02" class="form-control" accept="image/*" required>
                        </div>
                        @error('foto') 
                            <small class="text-danger">{{ $message }}</small> 
                        @enderror
                        <!-- PREVIEW FOTO -->
                        <img id="preview-image" class="img-thumbnail mt-3" style="max-width: 200px; display: none;" />
                    </div> 
                    
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>     
                </form>    
            </div>
        </div>
    </div>
</div>

<!-- SCRIPT UNTUK MENAMPILKAN SAMBUTAN DAN PREVIEW FOTO -->
<script>
    extends('layouts.app')
</script>

@endsection
