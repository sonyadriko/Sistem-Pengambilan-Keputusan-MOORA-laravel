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
                                <h3 class="mb-0">Selected Karyawan</h3>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">K1</th>
                                    <th scope="col">K2</th>
                                    <th scope="col">K3</th>
                                    <th scope="col">K4</th>
                                    <th scope="col">K5</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($karyawan as $row)
                                    <tr>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->jenjang_pendidikan }}</td>
                                        <td>{{ $row->pengalaman }}</td>
                                        <td>{{ $row->absensi }}</td>
                                        <td>{{ $row->loyalitas }}</td>
                                        <td>{{ $row->wawancara }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-2">
                <p>K1: {{ $k1 }}</p>
            </div>
            <div class="col-2">
                <p>K2: {{ $k2 }}</p>
            </div>
            <div class="col-2">
                <p>K3: {{ $k3 }}</p>
            </div>
            <div class="col-2">
                <p>K4: {{ $k4 }}</p>
            </div>
            <div class="col-2">
                <p>K5: {{ $k5 }}</p>
            </div>
        </div> --}}
        <div class="row mt-5">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Normalisasi Matriks Keputusan</h3>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">K1</th>
                                    <th scope="col">K2</th>
                                    <th scope="col">K3</th>
                                    <th scope="col">K4</th>
                                    <th scope="col">K5</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $k1 }}</td>
                                    <td>{{ $k2 }}</td>
                                    <td>{{ $k3 }}</td>
                                    <td>{{ $k4 }}</td>
                                    <td>{{ $k5 }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Nilai Normalisasi</h3>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">K1</th>
                                    <th scope="col">K2</th>
                                    <th scope="col">K3</th>
                                    <th scope="col">K4</th>
                                    <th scope="col">K5</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($normalisasi as $row)
                                    <tr>
                                        <td>{{ $row['name'] }}</td>
                                        <td>{{ $row['jenjang_pendidikan'] }}</td>
                                        <td>{{ $row['pengalaman'] }}</td>
                                        <td>{{ $row['absensi'] }}</td>
                                        <td>{{ $row['loyalitas'] }}</td>
                                        <td>{{ $row['wawancara'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Nilai Optimasi</h3>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">K1</th>
                                    <th scope="col">K2</th>
                                    <th scope="col">K3</th>
                                    <th scope="col">K4</th>
                                    <th scope="col">K5</th>
                                    <th scope="col">Total Optimasi</th>
                                    <th scope="col">Ranking</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($optimasi as $index => $row)
                                    <tr>
                                        <td>{{ $row['name'] }}</td>
                                        <td>{{ $row['jenjang_pendidikan'] }}</td>
                                        <td>{{ $row['pengalaman'] }}</td>
                                        <td>{{ $row['absensi'] }}</td>
                                        <td>{{ $row['loyalitas'] }}</td>
                                        <td>{{ $row['wawancara'] }}</td>
                                        <td>{{ $row['total_optimasi'] }}</td>
                                        <td>{{ $index + 1 }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Hasil Optimasi dan Ranking</h3>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Total Optimasi</th>
                                    <th scope="col">Ranking</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($optimasi as $index => $opt)
                                    <tr>
                                        <td>{{ $opt['name'] }}</td>
                                        <td>{{ $opt['total_optimasi'] }}</td>
                                        <td>{{ $index + 1 }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            <form action="{{ route('save.ranking') }}" method="POST">
                                @csrf
                                <input type="hidden" name="rankings" value="{{ json_encode($optimasi) }}">
                                <input type="submit" name="submit" value="Save Data" class="btn btn-primary">
                            </form>
                        </nav>
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
