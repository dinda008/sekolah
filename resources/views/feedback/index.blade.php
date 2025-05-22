{{-- @extends('layouts.app')
@section('title', 'Feedback')
@section('contents')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Kritik dan Saran</h1>
@if(session('message'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{session('message')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <form action="{{ route('feedback.export') }}" method="GET" class="form-inline">
                            <div class="form-group mx-sm-2 mb-2">
                            <input type="month" name="month_year" class="form-control" placeholder="Pilih Bulan dan Tahun" required>
                            </div>
                            <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-download"></i> Export</button>
                        </form>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Pengirim</th>
                                            <th>Saran</th>
                                            <th>Kritik</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;?>
                                        @foreach ($feedback as $row)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$row->nama_pengirim}}</td>
                                            <td>{{$row->saran}}</td>
                                            <td>{{$row->kritik}}</td>
                                            <td>
                                            {{ \Carbon\Carbon::parse($row->created_at)->format('d M Y') }}
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endsection --}}
