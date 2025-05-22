@extends('layouts.app')
 
@section('title', 'add sarana dan prasana')
 
@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">TAMBAH DATA SARANA DAN PRASANA</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('sarana.tambah_sarana.insert') }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group">
                            <label>Nama Sarana dan Prasana</label>
                            <input type="text" name="nama_sarana" class="form-control">
                            @error('nama_sarana')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label class="font-weight-bold text-black">Jumlah</label>
                            <input type="number" name="jumlah" class="form-control" placeholder="Masukkan jumlah" required>
                        </div>
                
                        <div class="form-group mt-3">
                            <label class="font-weight-bold text-black">Kondisi</label>
                            <select name="kondisi" class="form-control" required>
                                <option value="">Pilih Kondisi</option>
                                <option value="Sangat Baik">Sangat Baik</option>
                                <option value="Baik">Baik</option>
                                <option value="Cukup">Cukup</option>
                                <option value="Rusak Ringan">Rusak Ringan</option>
                                <option value="Rusak Berat">Rusak Berat</option>
                            </select>
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