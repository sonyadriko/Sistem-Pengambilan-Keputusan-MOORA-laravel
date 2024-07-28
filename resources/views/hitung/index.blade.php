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
                        </div>
                    </div>

                    <div class="table-responsive">
                        <form id="karyawanForm" method="POST" action="{{ route('karyawan.submit') }}">
                            @csrf
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Checklist</th>
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
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input karyawan-checkbox"
                                                        id="customCheck{{ $key }}" type="checkbox"
                                                        value="{{ $row->id }}">
                                                    <label class="custom-control-label"
                                                        for="customCheck{{ $key }}"></label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <input type="hidden" name="selected_karyawan" id="selected_karyawan">
                            <div class="card-footer py-4">
                                <nav class="d-flex justify-content-end" aria-label="...">
                                    <input type="submit" name="submit" value="Hitung" class="btn btn-primary">
                                </nav>
                            </div>
                        </form>
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
    <script>
        document.getElementById('karyawanForm').addEventListener('submit', function(event) {
            let selected = [];
            document.querySelectorAll('.karyawan-checkbox:checked').forEach(function(checkbox) {
                selected.push(checkbox.value);
            });
            document.getElementById('selected_karyawan').value = selected.join(',');
        });
    </script>
@endpush
