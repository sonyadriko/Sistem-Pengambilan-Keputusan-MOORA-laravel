
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
                            <h3 class="mb-0">Data Perusahaan</h3>
                        </div>
                        <!-- <div class="col-4 text-right">
                            <a href="{{URL::to('/')}}/perusahaan/create" class="btn btn-sm btn-primary">Add perusahaan</a>
                        </div> -->
                    </div>
                </div>
                
                <div class="col-12">
                                        </div>

                <div class="section-body">

                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <ul class="nav nav-pills nav-fill flex-column flex-sm-row" id="tabs-text" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-text-1-tab" data-toggle="tab" href="#tabs-text-1" role="tab" aria-controls="tabs-text-1" aria-selected="true">Main</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-2-tab" data-toggle="tab" href="#tabs-text-2" role="tab" aria-controls="tabs-text-2" aria-selected="false">Performance</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-3-tab" data-toggle="tab" href="#tabs-text-3" role="tab" aria-controls="tabs-text-3" aria-selected="false">Information</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-4-tab" data-toggle="tab" href="#tabs-text-4" role="tab" aria-controls="tabs-text-4" aria-selected="false">Economy</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-5-tab" data-toggle="tab" href="#tabs-text-5" role="tab" aria-controls="tabs-text-5" aria-selected="false">Control</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-6-tab" data-toggle="tab" href="#tabs-text-6" role="tab" aria-controls="tabs-text-6" aria-selected="false">Efficiency</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-7-tab" data-toggle="tab" href="#tabs-text-7" role="tab" aria-controls="tabs-text-7" aria-selected="false">Service</a>
                                    </li>
                                </ul>
                                <div class="card-body">
                                @foreach($perusahaan as $row)
                                    <form action="{{URL::to('/')}}/perusahaan/{{$row->id}}" method="POST" class="needs-validation" novalidate="" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="tab-content">
                                        <div id="tabs-text-1" class="tab-pane fade show active">
                                            <div class="form-group">
                                                <label>ID Perusahan</label>
                                                <input type="text" name="id_perusahaan" class="form-control" value="{{$row->id_perusahaan}}">
                                            </div>
                                            <div class="form-group">
                                                <label>No Anggota</label>
                                                <input type="text" name="no_anggota" class="form-control" value="{{$row->no_anggota}}" >
                                            </div>
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control" value="{{$row->name}}" >
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" name="alamat" class="form-control"value="{{$row->alamat}}"  >
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control" value="{{$row->email}}" >
                                            </div>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" name="telpon" class="form-control" value="{{$row->telpon}}" >
                                            </div>
                                            <div class="form-group">
                                                <label>Website</label>
                                                <input type="text" name="website" class="form-control" value="{{$row->website}}" >
                                            </div>
                                            <div class="form-group">
                                                <label>Instagram</label>
                                                <input type="text" name="instagram" class="form-control" value="{{$row->instagram}}" >
                                            </div>
                                            <div class="form-group">
                                                <label>Facebook</label>
                                                <input type="text" name="facebook" class="form-control" value="{{$row->facebook}}" >
                                            </div>
                                            
                                        </div>
                                        <div id="tabs-text-2" class="tab-pane fade">
                                            <div class="form-group">
                                                <label>Jumlah Mesin Bor</label>
                                                <input type="number" name="bor" class="form-control" value="{{$row->bor}}" >
                                            </div>
                                            <div class="form-group">
                                                <label>Kemampuan Kedalaman Mesin Bor (M)</label>
                                                <input type="number" name="kedalaman" class="form-control" value="{{$row->kedalaman}}" >
                                            </div>
                                            <div class="form-group">
                                                <label>Geolistrik</label>
                                                <select class="form-control" id="geolistrik" name="geolistrik">
                                                    <option value="YA" {{$row->geolistrik == 'YA' ? 'selected' : ''}}>YA</option>
                                                    <option value="TIDAK" {{$row->geolistrik == 'TIDAK' ? 'selected' : ''}}>TIDAK</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Bore Hole Kamera</label>
                                                <select class="form-control" id="kamera" name="kamera">
                                                    <option value="YA" {{$row->kamera == 'YA' ? 'selected' : ''}}>YA</option>
                                                    <option value="TIDAK" {{$row->kamera == 'TIDAK' ? 'selected' : ''}}>TIDAK</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="tabs-text-3" class="tab-pane fade">
                                            <div class="form-group">
                                                <label>Kontak</label>
                                                <input type="text" name="kontak" class="form-control" value="{{$row->kontak}}" >
                                            </div>
                                            <div class="form-group">
                                                <label>Layanan 24 Jam</label>
                                                <select class="form-control" id="layanan" name="layanan">
                                                    <option value="YA" {{$row->layanan == 'YA' ? 'selected' : ''}}>YA</option>
                                                    <option value="TIDAK" {{$row->layanan == 'TIDAK' ? 'selected' : ''}}>TIDAK</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Respon Pelanggan</label>
                                                <select class="form-control" id="pelanggan" name="pelanggan">
                                                    <option value="Fast Response" {{$row->pelanggan == 'Fast Response' ? 'selected' : ''}}>Fast Response</option>
                                                    <option value="Slow Response" {{$row->pelanggan == 'Slow Response' ? 'selected' : ''}}>Slow Response</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="tabs-text-4" class="tab-pane fade">
                                            <div class="form-group">
                                                <label>Lokasi Debit Air Tinggi</label>
                                                <input type="number" name="air_tinggi" class="form-control" value="{{$row->air_tinggi}}" >
                                            </div>
                                            <div class="form-group">
                                                <label>Lokasi Debit Air Rendah</label>
                                                <input type="number" name="air_rendah" class="form-control" value="{{$row->air_rendah}}" >
                                            </div>
                                        </div>
                                        <div id="tabs-text-5" class="tab-pane fade">
                                             <div class="form-group">
                                                <label>Lama Perusahaan Berdiri</label>
                                                <input type="text" name="lama" class="form-control" value="{{$row->lama}}" >
                                            </div>
                                            <div class="form-group">
                                                <label>Jenis Perusahaan</label>
                                                <input type="text" name="jenis" class="form-control" value="{{$row->jenis}}" >
                                            </div>
                                        </div>
                                        <div id="tabs-text-6" class="tab-pane fade">
                                            <div class="form-group">
                                                <label>Durasi Penyusunan Alat Konstruksi (Hari)</label>
                                                <input type="text" name="hari" class="form-control" value="{{$row->hari}}" >
                                            </div>
                                        </div>
                                        <div id="tabs-text-7" class="tab-pane fade">
                                            <div class="form-group">
                                                <label>Layanan Informasi Yang Diberikan</label>
                                                <select class="form-control" id="layanan_informasi" name="layanan_informasi">
                                                    <option value="YA" {{$row->layanan_informasi == 'YA' ? 'selected' : ''}}>YA</option>
                                                    <option value="TIDAK" {{$row->layanan_informasi == 'TIDAK' ? 'selected' : ''}}>TIDAK</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Pengurusan Ijin SIPA</label>
                                                <select class="form-control" id="sipa" name="sipa">
                                                    <option value="YA" {{$row->sipa == 'YA' ? 'selected' : ''}}>YA</option>
                                                    <option value="TIDAK" {{$row->sipa == 'TIDAK' ? 'selected' : ''}}>TIDAK</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Changes</button>
                                        </div>
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