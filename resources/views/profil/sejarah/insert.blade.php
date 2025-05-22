@extends('layouts.app')
 
@section('title', 'add sejarah_sekolah')
 
@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">TAMBAH DATA SEJARAH SEKOLAH</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('profil.sejarah.tambah_sejarah.insert') }}" method="POST" enctype="multipart/form-data"> 
                    @csrf 
                    <div class="form-group">
                            <label>Sejarah Sekolah</label>
                            <textarea name="sejarah" class="form-control" rows="10"></textarea>
                            @error('sejarah')
                                <div class="text-danger">{{ $message }}</div>
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
                        <img id="preview-image" class="img-thumbnail mt-3" style="max-width: 250px; display: none;" />
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fas fa-save"></i> Simpan
                    </button>     
                </form>  

                <!-- LANGSUNG TARUH SCRIPT DI SINI -->
                <script>
                    extends('layouts.app')
                </script>

            </div>
        </div>
    </div>
</div>
@endsection
