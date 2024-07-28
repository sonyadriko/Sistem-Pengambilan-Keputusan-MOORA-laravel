
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
                            <h3 class="mb-0">Data Detail Klasifikasi</h3>
                        </div>
                        <!-- <div class="col-4 text-right">
                            <a href="{{URL::to('/')}}/klasifikasi/create" class="btn btn-sm btn-primary">Add klasifikasi</a>
                        </div> -->
                    </div>
                </div>
                
                

                <div class="section-body">

                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{URL::to('/')}}/detailklasifikasi" method="POST" class="needs-validation" novalidate="" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Klasifikasi</label>
                                        <input type="text" name="name" class="form-control" value="{{$klasifikasi->name}}" disabled>
                                        <input type="hidden" name="id_klasifikasi" class="form-control" value="{{$klasifikasi->id}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Kriteria</label>
                                        <select name="id_karyawan" class="form-control">
                                            @foreach($karyawan as $key => $row)
                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nilai</label>
                                        <input type="number" name="nilai" class="form-control" value="0">
                                    </div>
                                    
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Add</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Note Pengisian Nilai</h3>
                        </div>
                        <div class="col-12">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Nilai</th>
                                        <th scope="col">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Kedua elemen sama pentingnya</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Elemen yang satu sedikit lebih penting daripada elemen lainnya</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Elemen yang satu lebih penting daripada elemen lainnya</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Satu elemen jelas lebih mutlak penting daripada elemen lainnya</td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Satu elemen mutlak penting daripada elemen lainnya</td>
                                    </tr>
                                    <tr>
                                        <td>2, 4, 6, 8</td>
                                        <td>Nilai-nilai antara dua nilai pertimbangan yang berdekatan</td>
                                    </tr>
                                </tbody>
                            </table>
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