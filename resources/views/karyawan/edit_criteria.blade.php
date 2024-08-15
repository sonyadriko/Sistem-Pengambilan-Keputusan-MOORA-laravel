@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <h3 class="mb-0">Edit Data Kriteria untuk {{ $karyawan->name }}</h3>
                    </div>

                    <div class="card-body">
                        <!-- Edit Criteria Form -->
                        <form action="{{ route('karyawan.update_criteria', $karyawan->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="jenjang_pendidikan">Jenjang Pendidikan</label>
                                <input type="number" name="jenjang_pendidikan" id="jenjang_pendidikan" class="form-control"
                                    value="{{ $criteria[9]->nilai ?? '' }}" min="1" max="3"
                                    placeholder="Enter value for Jenjang Pendidikan">
                            </div>
                            <div class="form-group">
                                <label for="pengalaman">Pengalaman</label>
                                <input type="number" name="pengalaman" id="pengalaman" class="form-control"
                                    value="{{ $criteria[10]->nilai ?? '' }}" min="1" max="5"
                                    placeholder="Enter value for Pengalaman">
                            </div>
                            <div class="form-group">
                                <label for="absensi">Absensi</label>
                                <input type="number" name="absensi" id="absensi" class="form-control"
                                    value="{{ $criteria[11]->nilai ?? '' }}" min="1" max="5"
                                    placeholder="Enter value for Absensi">
                            </div>
                            <div class="form-group">
                                <label for="loyalitas">Loyalitas</label>
                                <input type="number" name="loyalitas" id="loyalitas" class="form-control"
                                    value="{{ $criteria[12]->nilai ?? '' }}" min="1" max="5"
                                    placeholder="Enter value for Loyalitas">
                            </div>
                            <div class="form-group">
                                <label for="wawancara">Wawancara</label>
                                <input type="number" name="wawancara" id="wawancara" class="form-control"
                                    value="{{ $criteria[13]->nilai ?? '' }}" min="1" max="5"
                                    placeholder="Enter value for Wawancara">
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
                                        <h4 class="mb3">Pengalaman</h4>
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
                                        <h4 class="mb3">Absensi</h4>
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
                                        <h4 class="mb3">Loyalitas</h4>
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
                                        <h4 class="mb3">Wawancara</h4>
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
                                                    <td>Kurang</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Cukup</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Baik</td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Sangat Baik</td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Istimewa</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Note for Filling Values -->
                    </div>


                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
