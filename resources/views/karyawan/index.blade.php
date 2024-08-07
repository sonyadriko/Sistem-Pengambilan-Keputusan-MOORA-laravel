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
                                <h3 class="mb-0">Data Karyawan</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ URL::to('/') }}/karyawan/create" class="btn btn-sm btn-primary">Add karyawan</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12"></div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="karyawanTable">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($karyawan as $key => $row)
                                    <tr>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->alamat }}</td>
                                        <td>
                                            <a href="mailto:{{ $row->email }}">{{ $row->email }}</a>
                                        </td>
                                        <td>{{ $row->telpon }}</td>
                                        <td>
                                            <a href="karyawan/{{ $row->id }}" class="btn btn-warning">Edit</a>
                                            {{-- <a href="karyawan/detail/{{ $row->id }}" class="btn btn-info">Detail</a> --}}
                                            <a href="{{ route('karyawan.show', $row->id) }}" class="btn btn-info">Detail</a>

                                            <form method="POST" action="/karyawan/{{ $row->id }}"
                                                style="display:inline-block;">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <input type="submit" class="btn btn-danger" value="Delete">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="..."></nav>
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
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    {{-- <script>
        $(document).ready(function() {
            $('#karyawanTable').DataTable();
        });
    </script> --}}
@endpush
