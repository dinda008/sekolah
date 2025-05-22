@extends('layouts.app')

@section('title', 'Dashboard')

@section('contents')
<div class="row">
    <div class="col-md-12">
        <h4>Selamat datang, {{ Auth::user()->name }}</h4>
        <p>Silakan pilih menu di sebelah kiri untuk mengelola data.</p>
    </div>
</div>
@endsection

