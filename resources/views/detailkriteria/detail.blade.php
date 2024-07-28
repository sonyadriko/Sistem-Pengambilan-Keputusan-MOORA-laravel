<@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Data Detail Karyawan</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{URL::to('/')}}/detailkriteria/create/{{$id_kriteria}}" class="btn btn-sm btn-primary">Add Kriteria Penilaian</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-12">
                                        </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Karyawan</th>
                                <th scope="col">Nilai</th>
                                <!-- <th scope="col"></th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detailkriteria as $key => $row)
                                <tr>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->nama_karyawan}}</td>
                                    <td>{{$row->nilai}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        
                    </nav>
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