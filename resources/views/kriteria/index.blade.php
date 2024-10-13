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
                                <h3 class="mb-0">Data Kriteria</h3>
                            </div>
                            {{-- <div class="col-4 text-right">
                                <a href="{{ URL::to('/') }}/kriteria/create" class="btn btn-sm btn-primary">Add kriteria</a>
                            </div> --}}
                        </div>
                    </div>

                    <div class="col-12">
                        <div id="warning" class="alert alert-warning" role="alert" style="display: none;">
                            Total bobot harus sama dengan 100!
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Bobot (%)</th>
                                    <th scope="col">Jenis</th>
                                    {{-- <th scope="col">Creation Date</th> --}}
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="kriteria-body">
                                @foreach ($kriteria as $key => $row)
                                    <tr>
                                        <td>{{ $row->name }}</td>
                                        <td class="bobot">{{ $row->bobot }}</td>
                                        <td>{{ $row->jenis }}</td>
                                        {{-- <td>{{ $row->created_at }}</td> --}}
                                        <td>
                                            <a class="btn btn-warning" href="kriteria/{{ $row->id }}">Edit</a>
                                            <a href="{{ URL::to('/') }}/detailkriteria/detail/{{ $row->id }}"
                                                class="btn btn-info">Detail</a>
                                            {{-- <form method="POST" action="/kriteria/{{ $row->id }}">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <div class="form-group">
                                                            <input type="submit" class="dropdown-item" value="Delete">
                                                        </div>
                                                    </form> --}}

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const bobotElements = document.querySelectorAll(".bobot");
            let totalBobot = 0;

            bobotElements.forEach(function(element) {
                totalBobot += parseFloat(element.textContent);
            });

            const warning = document.getElementById("warning");

            if (totalBobot !== 100) {
                warning.style.display = "block";
            } else {
                warning.style.display = "none";
            }
        });
    </script>
@endpush
