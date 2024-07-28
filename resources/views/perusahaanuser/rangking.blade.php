<@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
<div class="container-fluid mt--7">
    <div class="row">
    @foreach($klasifikasi as $key => $row)
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Data Rangking {{$row->name}}</h3>
                        </div>
                        <div class="col-4 text-right">
                           
                        </div>
                    </div>
                </div>
                
                <div class="col-12">
                                        </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID Perusahaan</th>
                                <th scope="col">Name Perusahaan</th>
                                <!-- <th scope="col">Klasifikasi</th> -->
                                <th scope="col">Nilai</th>
                                <th scope="col">Persentase</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $perhitungan = DB::table('rangking')
                                ->join('klasifikasi','klasifikasi.id','rangking.id_klasifikasi')
                                ->join('perusahaan','perusahaan.id','rangking.id_perusahaan')
                                ->where('rangking.id_klasifikasi',$row->id)
                                ->orderby('rangking.nilai','desc')
                                ->get(array(
                                    'rangking.nilai',
                                    'klasifikasi.name as klasifikasi',
                                    'perusahaan.name as perusahaan',
                                    'perusahaan.id_perusahaan as id_perusahaan',
                                    'perusahaan.id as id_per',
                                ));
                            @endphp
                            @foreach($perhitungan as $key => $row2)
                                <tr>
                                    <td>{{$row2->id_perusahaan}}</td>
                                    <td>{{$row2->perusahaan}}</td>
                                    <!-- <td>{{$row2->klasifikasi}}</td> -->
                                    <td>{{$row2->nilai}}</td>
                                    <td>{{number_format($row2->nilai/1*100,2)}} %</td>
                                    <td>
                                        <a class="dropdown-item" href="/perusahaan/detail/{{$row2->id_per}}">Detail Perusahaan</a>
                                        
                                    </td>
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
    @endforeach
    </div>
        
    <footer class="footer">
    @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush