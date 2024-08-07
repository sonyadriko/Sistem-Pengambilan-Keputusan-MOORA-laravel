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
                                <h3 class="mb-0">Tambah Kriteria</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-12"></div>

                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('karyawan.store_criteria') }}" method="POST"
                                            class="needs-validation" novalidate="" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="employee_id" value="{{ $employee_id }}">
                                            <div class="tab-content">
                                                <div id="tabs-text-2" class="tab-pane fade show active">
                                                    <div class="form-group">
                                                        <label>Jenjang Pendidikan</label>
                                                        <input type="number" name="jenjang_pendidikan" class="form-control"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Pengalaman</label>
                                                        <input type="number" name="pengalaman" class="form-control"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Absensi</label>
                                                        <input type="number" name="absensi" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Loyalitas</label>
                                                        <input type="number" name="loyalitas" class="form-control"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Wawancara</label>
                                                        <input type="number" name="wawancara" class="form-control"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-icon icon-left btn-primary">
                                                        <i class="fa fa-plus"></i> Add Criteria
                                                    </button>
                                                </div>
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
        </footer>
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
