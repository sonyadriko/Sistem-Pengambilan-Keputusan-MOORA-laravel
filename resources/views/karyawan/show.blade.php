<!-- resources/views/karyawan/show.blade.php -->
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
                                <h3 class="mb-0">Detail Karyawan</h3>
                            </div>
                            <div class="col-4 text-right">

                                <a href="{{ route('karyawan.edit_criteria', $karyawan->id) }}" class="btn btn-primary">Edit
                                    Kriteria</a>


                                {{-- <a href="{{ URL::to('/') }}/karyawan" class="btn btn-sm btn-primary">Back to List</a> --}}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <h5>Name: {{ $employee->name }}</h5>
                        <p>Alamat: {{ $employee->alamat }}</p>
                        <p>Email: <a href="mailto:{{ $employee->email }}">{{ $employee->email }}</a></p>
                        <p>Phone: {{ $employee->telpon }}</p>

                        <h4>Kriteria</h4>
                        @if ($criteria->isEmpty())
                            <p>Tidak ada data kriteria.</p>
                            <a href="{{ route('karyawan.add_criteria', $employee->id) }}" class="btn btn-primary">Add
                                Kriteria</a>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Kriteria</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($criteria as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->nilai }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
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
