
@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Data Detail Perusahaan</h3>
                        </div>
                        <!-- <div class="col-4 text-right">
                            <a href="{{URL::to('/')}}/klasifikasi/create" class="btn btn-sm btn-primary">Add klasifikasi</a>
                        </div> -->
                    </div>
                </div>
                
                <div class="col-12">
                                        </div>

                <div class="section-body">

                    <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                        <div class="card-body">
                            @foreach($detailkriteria as $row)
                            <form action="{{URL::to('/')}}/detailkriteria/{{$row->id}}" method="POST" class="needs-validation" novalidate="" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Kriteria</label>
                                <input type="text" name="kriteria" class="form-control" value="{{$kriteria->name}}" disabled>
                                <input type="hidden" name="id_kriteria" class="form-control" value="{{$kriteria->id}}" required>
                            </div>
                            <div class="form-group">
                                <label>Karyawan</label>
                                <select name="id_karyawan" class="form-control" disabled>
                                    @foreach($karyawan as $key => $row2)
                                        <option value="{{$row2->id}}" {{$row->id_karyawan == $row2->id ? 'selected' : ''}}>{{$row2->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nilai</label>
                                <input type="number" name="nilai" class="form-control" value="{{$row->nilai}}">
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Add</button>
                            </div>
                            </form>
                            @endforeach
                        </div>
                        </div>
                    </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>
        
    <footer class="footer">
    @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush