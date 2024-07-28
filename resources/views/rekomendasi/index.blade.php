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
                            <h3 class="mb-0">Data Perusahaan</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{URL::to('/')}}/perusahaan/create" class="btn btn-sm btn-primary">Add perusahaan</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-12">
                                        </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">No Anggota</th>
                                <th scope="col">Name</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Website</th>
                                <th scope="col">Instagram</th>
                                <th scope="col">Facebook</th>
                                <th scope="col">Creation Date</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($perusahaan as $key => $row)
                                <tr>
                                    <td>{{$row->id_perusahaan}}</td>
                                    <td>{{$row->no_anggota}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->alamat}}</td>
                                    <td>
                                        <a href="mailto:{{$row->email}}">{{$row->email}}</a>
                                    </td>
                                    <td>
                                        {{$row->telpon}}
                                    </td>
                                    <td>
                                        {{$row->website}}
                                    </td>
                                    <td>
                                        {{$row->instagram}}
                                    </td>
                                    <td>
                                        {{$row->facebook}}
                                    </td>
                                    <td>{{$row->created_at}}</td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="perusahaan/{{$row->id}}">Edit</a>
                                                    <a class="dropdown-item" href="perusahaan/detail/{{$row->id}}">Detail</a>
                                                    <form method="POST" action="/perusahaan/{{$row->id}}">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}

                                                        <div class="form-group">
                                                            <input type="submit" class="dropdown-item" value="Delete">
                                                        </div>
                                                    </form>
                                            </div>
                                        </div>
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
    </div>
        
    <footer class="footer">
    @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush