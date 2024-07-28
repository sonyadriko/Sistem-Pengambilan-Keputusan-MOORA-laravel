
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
                            <h3 class="mb-0">Data Klasifikasi</h3>
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
                            @foreach($klasifikasi as $row)
                            <form action="{{URL::to('/')}}/klasifikasi/{{$row->id}}" method="POST" class="needs-validation" novalidate="" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>klasifikasi</label>
                                <input type="text" name="name" class="form-control" value="{{$row->name}}" required>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Changes</button>
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