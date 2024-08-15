@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow-sm border-light mb-4">
                    <div class="card-header border-0 text-white">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Selected Karyawan</h3>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush" id="selectedKaryawanTable">
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

        <div class="row">
            <div class="col">
                <div class="card shadow-sm border-light mb-4">
                    <div class="card-header border-0 bg-secondary text-white">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Normalisasi Matriks Keputusan</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush" id="normalisasiMatriksKeputusanTable">
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

        <div class="row">
            <div class="col">
                <div class="card shadow-sm border-light mb-4">
                    <div class="card-header border-0 text-white">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Nilai Normalisasi</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush" id="nilaiNormalisasiTable">
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

        <div class="row">
            <div class="col">
                <div class="card shadow-sm border-light mb-4">
                    <div class="card-header border-0 text-dark">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Nilai Optimasi</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush" id="nilaiOptimasiTable">
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

        <div class="row">
            <div class="col">
                <div class="card shadow-sm border-light mb-4">
                    <div class="card-header border-0 text-white">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Hasil Optimasi dan Ranking</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush" id="hasilOptimasiRankingTable">
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
                    <div class="card-footer py-4 ">
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

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
@endpush

@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js">
    </script>
    <script>
        $(document).ready(function() {
            $('#selectedKaryawanTable').DataTable({
                "pagingType": "simple_numbers",
                "language": {
                    "paginate": {
                        "previous": "&laquo;",
                        "next": "&raquo;"
                    }
                }
            });
            $('#normalisasiMatriksKeputusanTable').DataTable({
                "pagingType": "simple_numbers",
                "language": {
                    "paginate": {
                        "previous": "&laquo;",
                        "next": "&raquo;"
                    }
                }
            });
            $('#nilaiNormalisasiTable').DataTable({
                "pagingType": "simple_numbers",
                "language": {
                    "paginate": {
                        "previous": "&laquo;",
                        "next": "&raquo;"
                    }
                }
            });
            $('#nilaiOptimasiTable').DataTable({
                "pagingType": "simple_numbers",
                "language": {
                    "paginate": {
                        "previous": "&laquo;",
                        "next": "&raquo;"
                    }
                }
            });
            $('#hasilOptimasiRankingTable').DataTable({
                "pagingType": "simple_numbers",
                "language": {
                    "paginate": {
                        "previous": "&laquo;",
                        "next": "&raquo;"
                    }
                }
            });
        });
    </script>
@endpush
