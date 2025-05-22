@extends('layouts.app')
 
@section('title', 'edit profil_sekolah')
 
@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">EDIT DATA PROFIL SEKOLAH</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('profil.profil_sekolah.update', $profilsekolah->id_profil) }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    @method('PUT')
                    <div class="form-group">
                            <label>Visi Sekolah</label>
                            <input type="text" name="visi" class="form-control" value="{{ $profilsekolah->visi }}">
                            @error('visi')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Misi Sekolah</label>
                            <textarea name="misi" class="form-control" rows="3">{{ $profilsekolah->misi }}</textarea>
                            @error('misi')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-4">
                            <label class="fw-bold">Tujuan Sekolah</label>
                            <textarea name="tujuan" class="form-control" rows="3">{{ $profilsekolah->tujuan }}</textarea>
                            @error('tujuan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>Simpan</button>     
                    </form>          
                 </div>
                 </div>

        </div>
    </div>
@endsection