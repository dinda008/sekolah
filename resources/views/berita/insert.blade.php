@extends('layouts.app')
 
@section('title', 'add berita')
 
@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">TAMBAH DATA BERITA</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('berita.tambah_berita.insert') }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group">
                        <label>Judul Berita</label>
                        <input type="text" name="judul_berita" class="form-control" >
                    @error('judul_berita')
                    {{$message}}
                    @enderror
                    </div> 

                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" >
                    @error('tanggal')
                    {{$message}} 
                    @enderror
                    </div> 

                    <div class="form-group">
                        <label>Deskripsi Berita</label>
                        <textarea name="deskripsi_berita" class="form-control" rows="5"></textarea>
                    @error('deskripsi_berita')
                    {{$message}} 
                    @enderror   
                    </div> 

                    <div class="form-group">
                        <label>Foto</label>
                        <div class="input-group mb-3">
                            <input type="file" name="foto" class="form-control"id="inputGroupFile02" accept="image/*" required>
                            @error('foto')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    <!-- PREVIEW FOTO -->
                    <img id="preview-image" class="img-thumbnail mt-3" style="max-width: 150px; display: none;" />
                </div>

                    <div class="form-group">
                        <label>Nama Penulis</label>
                        <select name="id_pegawai" class="form-control">
                            <option value="">Pilih Penulis</option>
                            @foreach ($pegawai as $p)
                                <option value="{{ $p->id_pegawai }}">{{ $p->nama }}</option>
                            @endforeach
                        </select>
                        @error('id_pegawai')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div> 
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>Simpan</button>      
                    </form> 
                    
                    <!-- LANGSUNG TARUH SCRIPT DI SINI -->
                <script>
                   extends ('layouts.app')
                </script>
                 </div>
                </div>
        </div>
    </div>
@endsection