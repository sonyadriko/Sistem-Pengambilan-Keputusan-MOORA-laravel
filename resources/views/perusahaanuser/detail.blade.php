
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
                            <h3 class="mb-0">Data Perusahaan User</h3>
                        </div>
                        <!-- <div class="col-4 text-right">
                            <a href="{{URL::to('/')}}/perusahaanuser/create" class="btn btn-sm btn-primary">Add perusahaanuser</a>
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
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-2-tab" data-toggle="tab" href="#tabs-text-2" role="tab" aria-controls="tabs-text-2" aria-selected="false">Potensi</a>
                                    </li>
                                </ul>
                                <div class="card-body">
                                @foreach($perusahaanuser as $row)
                                    <form action="{{URL::to('/')}}/perusahaanuser/{{$row->id}}" method="POST" class="needs-validation" novalidate="" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="tab-content">
                                        <div id="tabs-text-1" class="tab-pane fade show active">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control" value="{{$row->name}}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" name="alamat" class="form-control"value="{{$row->alamat}}"   disabled>
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control" value="{{$row->email}}"  disabled>
                                            </div>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" name="telpon" class="form-control" value="{{$row->telpon}}"  disabled>
                                            </div>
                                        </div>
                                        <div id="tabs-text-2" class="tab-pane fade">
                                            <div class="form-group">
                                                <label>Potensi Debit Air Tanah</label>
                                                <select class="form-control" id="potensi" name="potensi" disabled>
                                                    <option value="Langka" {{$row->potensi == 'Langka' ? 'selected' : ''}}>Langka</option>
                                                    <option value="<5 Lt/Dtk" {{$row->potensi == '<5 Lt/Dtk' ? 'selected' : ''}}> <5 Lt/Dtk </option>
                                                    <option value="5 Lt/Dtk" {{$row->potensi == '5 Lt/Dtk' ? 'selected' : ''}}> 5 Lt/Dtk </option>
                                                    <option value=">10 Lt/Dtk" {{$row->potensi == '>10 Lt/Dtk' ? 'selected' : ''}}> >10 Lt/Dtk </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Kebutuhan Pemakaian Air Tanah</label>
                                                <select class="form-control" id="kebutuhan" name="kebutuhan" disabled>
                                                    <option value="Kebutuhan Operasional" {{$row->kebutuhan == 'Kebutuhan Operasional' ? 'selected' : ''}}>Kebutuhan Operasional</option>
                                                    <option value="Kebutuhan Produksi" {{$row->kebutuhan == 'Kebutuhan Produksi' ? 'selected' : ''}}>Kebutuhan Produksi</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <!-- <button type="submit" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Changes</button> -->
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