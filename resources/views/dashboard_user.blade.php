@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--9">
        <div class="row">
            <div class="col-xl-8 ">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Data Potensi Air Tanah</h2>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <iframe width="750" height="350" frameborder="0" scrolling="no" allowfullscreen src="https://arcg.is/1LGu190"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Pemilihan Perusahaan Pengeboran</h6>
                                <ul class="nav nav-pills nav-fill flex-column flex-sm-row" id="tabs-text" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-text-1-tab" data-toggle="tab" href="#tabs-text-1" role="tab" aria-controls="tabs-text-1" aria-selected="true">Main</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-2-tab" data-toggle="tab" href="#tabs-text-2" role="tab" aria-controls="tabs-text-2" aria-selected="false">Potensi</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <!-- <div class="row">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="card"> -->
                                        
                                        <div class="card-body">
                                        
                                            <form action="{{URL::to('/')}}/perusahaanuser" method="POST" class="needs-validation" novalidate="" enctype="multipart/form-data">
                                            @csrf
                                            <div class="tab-content">
                                                <div id="tabs-text-1" class="tab-pane fade show active">
                                                    <!-- <div class="form-group">
                                                        <input type="text" name="nama" placeholder="Masukan Nama Anda" class="form-control" required>
                                                    </div>-->
                                                    <div class="form-group"> 
                                                        <input type="text" name="name" placeholder="Nama Perusahaan" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="alamat" placeholder="Alamat Perusahaan" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" name="email" placeholder="Email Perusahaan" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="telpon" placeholder="No. Telpon" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div id="tabs-text-2" class="tab-pane fade">
                                                    <div class="form-group">
                                                        <label>Potensi Debit Air Tanah</label>
                                                        <select class="form-control" id="potensi" name="potensi">
                                                            <option value="Langka">Langka</option>
                                                            <option value="<5 Lt/Dtk"> <5 Lt/Dtk </option>
                                                            <option value="5-10 Lt/Dtk"> 5-10 Lt/Dtk </option>
                                                            <option value=">10 Lt/Dtk"> >10 Lt/Dtk </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Kebutuhan Pemakaian Air Tanah</label>
                                                        <select class="form-control" id="kebutuhan" name="kebutuhan">
                                                            <option value="Kebutuhan Operasional">Kebutuhan Operasional</option>
                                                            <option value="Kebutuhan Produksi">Kebutuhan Produksi</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Add</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    <!-- </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush