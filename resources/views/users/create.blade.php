
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
                            <h3 class="mb-0">Users</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{URL::to('/')}}/user/create" class="btn btn-sm btn-primary">Add user</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-12">
                                        </div>

                <div class="section-body">

                    <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                        <div class="card-body">
                            <form action="{{URL::to('/')}}/user" method="POST" class="needs-validation" novalidate="" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Akses Role</label>
                                <select class="form-control" name="akses">
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                                </select>
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