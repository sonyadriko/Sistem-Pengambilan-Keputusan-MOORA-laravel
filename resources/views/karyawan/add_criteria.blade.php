<!-- resources/views/karyawan/add_criteria.blade.php -->
@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <h3 class="mb-0">Tambah Data Kriteria untuk {{ $karyawan->name }}</h3>
                    </div>

                    <div class="card-body">
                        <!-- Criteria Form -->
                        <form action="{{ route('karyawan.store_criteria') }}" method="POST">
                            @csrf
                            <input type="hidden" name="employee_id" value="{{ $employee_id }}">

                            <div class="form-group">
                                <label for="jenjang_pendidikan">Jenjang Pendidikan</label>
                                <input type="number" name="jenjang_pendidikan" id="jenjang_pendidikan" class="form-control"
                                    min="1" max="3" placeholder="Enter value for Jenjang Pendidikan">
                            </div>
                            <div class="form-group">
                                <label for="pengalaman">Pengalaman</label>
                                <input type="number" name="pengalaman" id="pengalaman" class="form-control" min="1"
                                    max="5" placeholder="Enter value for Pengalaman">
                            </div>
                            <div class="form-group">
                                <label for="absensi">Absensi</label>
                                <input type="number" name="absensi" id="absensi" class="form-control" min="1"
                                    max="5" placeholder="Enter value for Absensi">
                            </div>
                            <div class="form-group">
                                <label for="loyalitas">Loyalitas</label>
                                <input type="number" name="loyalitas" id="loyalitas" class="form-control" min="1"
                                    max="5" placeholder="Enter value for Loyalitas">
                            </div>
                            <div class="form-group">
                                <label for="wawancara">Wawancara</label>
                                <input type="number" name="wawancara" id="wawancara" class="form-control" min="1"
                                    max="5" placeholder="Enter value for Wawancara">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                        <!-- Note for Filling Values -->
                        <div class="mt-5">
                            <div class="card-header border-0">
                                <h3 class="mb-0">Note Pengisian Nilai</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="mb-3">Jenjang Pendidikan</h4>
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">Nilai</th>
                                                    <th scope="col">Kriteria</th>
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
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="mb-3">Pengalaman</h4>
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">Nilai</th>
                                                    <th scope="col">Kriteria</th>
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
                                    <div class="col-md-6">
                                        <h4 class="mb-3">Absensi</h4>
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">Nilai</th>
                                                    <th scope="col">Kriteria</th>
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
                                    <div class="col-md-6">
                                        <h4 class="mb-3">Loyalitas</h4>
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">Nilai</th>
                                                    <th scope="col">Kriteria</th>
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
                                    <div class="col-md-6">
                                        <h4 class="mb-3">Wawancara</h4>
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">Nilai</th>
                                                    <th scope="col">Kriteria</th>
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
