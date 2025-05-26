@extends('layouts.app')
 
@section('title', 'Edit Pegawai')
 
@section('contents')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">EDIT DATA PEGAWAI</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('pegawai.update', $pegawai->id_pegawai) }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    @method('PUT')

                    <!-- Nama -->
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ $pegawai->nama }}">
                        @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
                    </div> 

                    <!-- NIP -->
                    <div class="form-group">
                        <label>NIP</label>
                        <input type="text" name="nip" class="form-control" value="{{ $pegawai->nip }}" maxlength="18" minlength="18" pattern="\d{18}" title="NIP harus terdiri dari 18 angka" required>
                        @error('nip') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    
                    <!-- Jabatan -->
                    <div class="form-group">
                        <label>Jabatan</label>
                        <select name="id_jabatan" class="form-control" id="jabatan-select">
                            <option value="">Pilih Jabatan</option>
                            @foreach($jabatan as $j)
                                <option value="{{ $j->id_jabatan }}"
                                    {{ $pegawai->id_jabatan == $j->id_jabatan ? 'selected' : '' }}>
                                    {{ $j->nama_jabatan }}
                                </option>
                            @endforeach
                        </select>
                    </div>                    

                    <!-- Sambutan Kepala Sekolah -->
                    <div class="form-group" id="sambutan-group"
                        style="{{ $pegawai->jabatan->nama_jabatan == 'Kepala Sekolah' ? '' : 'display: none;' }}">
                        <label>Sambutan Kepala Sekolah</label>
                        <textarea name="sambutan" class="form-control" rows="4">{{ $pegawai->sambutan }}</textarea>
                        @error('sambutan') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Foto Pegawai -->
                    <div class="form-group">
                        <label>Foto Pegawai</label>
                        <input type="file" name="foto" class="form-control" id="inputGroupFile02" accept="image/*">
                        @error('foto') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Foto Lama -->
                    @if($pegawai->foto)
                    <div class="form-group">
                        <img id="old-image" src="{{ asset('storage/' . $pegawai->foto) }}" width="100" class="img-thumbnail">
                    </div>
                    @endif

                    <!-- Preview Foto Baru -->
                    <div class="form-group text-center">
                        <img id="preview-image" class="img-thumbnail" style="max-width: 150px; display: none;" />
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </div>

                </form>                    

                    <!-- Script untuk preview gambar dan toggle sambutan -->
                    <script>
                        extends('layouts.app')
                    </script>

                </div>
            </div>
        </div>
    </div>
@endsection
