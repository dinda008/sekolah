@extends('layouts.app')
 
@section('title', 'edit galeri')
 
@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">TAMBAH DATA GALERI</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('galeri.update', $galeri->id_galeri) }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    @method('PUT')
                    <div class="form-group">
                            <label>Judul Kegiatan</label>
                            <input type="text" name="judul_kegiatan" class="form-control" value="{{ $galeri->judul_kegiatan }}">
                            @error('judul_kegiatan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" value="{{ $galeri->tanggal }}">
                        @error('tanggal')
                        {{$message}} 
                        @enderror
                        </div> 
    
                        <div class="form-group">
                            <label>Deskripsi Kegiatan</label>
                            <textarea name="deskripsi_kegiatan" class="form-control" rows="10">{{ $galeri->deskripsi_kegiatan }}</textarea>
                        @error('deskripsi_kegiatan')
                        {{$message}} 
                        @enderror   
                        </div> 

                        <div class="form-group">
                            <label>Galeri</label>
                            <input type="file" name="foto" class="form-control" id="inputGroupFile02" accept="image/*">
                            @error('foto') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Tampilkan Foto Lama Jika Ada -->
                        <!-- Foto Lama -->
                        @if($galeri->foto)
                        <div class="form-group">
                            <img id="old-image" src="{{ asset('storage/' . $galeri->foto) }}" width="100" class="img-thumbnail">
                        </div>
                        @endif

                        <!-- Preview Foto Baru -->
                        <div class="form-group text-center">
                            <img id="preview-image" class="img-thumbnail" style="max-width: 150px; display: none;" />
                        </div>
 

                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>Simpan</button>     
                    </form>   
                    <script>
                        extends('layouts.app')
                        </script>       
                 </div>
                 </div>

        </div>
    </div>
@endsection