@extends('layouts.app')
 
@section('title', 'add galeri')
 
@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">TAMBAH DATA GALERI</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('galeri.tambah_galeri.insert') }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group">
                            <label>Judul Kegiatan</label>
                            <input type="text" name="judul_kegiatan" class="form-control">
                            @error('judul_kegiatan')
                                <div class="text-danger">{{ $message }}</div>
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
                            <label>Deskripsi Kegiatan</label>
                            <textarea name="deskripsi_kegiatan" class="form-control" rows="10"></textarea>
                        @error('deskripsi_kegiatan')
                        {{$message}} 
                        @enderror   
                        </div> 

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