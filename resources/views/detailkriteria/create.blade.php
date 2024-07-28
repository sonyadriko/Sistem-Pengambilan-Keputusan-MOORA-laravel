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
                                <h3 class="mb-0">Data Detail Perusahaan</h3>
                            </div>
                            <!-- <div class="col-4 text-right">
                                                                                <a href="{{ URL::to('/') }}/klasifikasi/create" class="btn btn-sm btn-primary">Add klasifikasi</a>
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
                                        <form action="{{ URL::to('/') }}/detailkriteria" method="POST"
                                            class="needs-validation" novalidate="" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label>Kriteria</label>
                                                <input type="text" name="kriteria" class="form-control"
                                                    value="{{ $kriteria->name }}" disabled>
                                                <input type="hidden" name="id_kriteria" class="form-control"
                                                    value="{{ $kriteria->id }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Karyawan</label>
                                                <select name="id_karyawan" class="form-control">
                                                    @foreach ($perusahaan as $key => $row)
                                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Nilai</label>
                                                <input type="number" name="nilai" class="form-control" value="0">
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-icon icon-left btn-primary"><i
                                                        class="fa fa-plus"></i> Add</button>
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
                            <div class="col-6">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Nilai</th>
                                            <th scope="col">Kriteria Jenjang Pendidikan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>SMA atau setingkat di bawahnya</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Diploma</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>S1</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-6">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Nilai</th>
                                            <th scope="col">Kriteria Pengalaman</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>1 Sertifikat</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>2 Sertifikat</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>3 Sertifikat</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>4 Sertifikat lainnya</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>5 Atau lebih Sertifikat</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-6">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Nilai</th>
                                            <th scope="col">Kriteria Absensi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>dibawah 50%</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>50-60%</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>61-70%</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>71-80%</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>lebih dari 80%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-6">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Nilai</th>
                                            <th scope="col">Kriteria Loyalitas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>1 Tahun</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>2 Tahun</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>3 Tahun</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>4 Tahun</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>5 Tahun atau lebih</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-6">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Nilai</th>
                                            <th scope="col">Kriteria Wawancara</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>40% atau dibawahnya</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>41-50%</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>51-60%</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>61-70%</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>70% atau lebih</td>
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
