@extends('layouts.app')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                @if (!$isValidBobot)
                    <div class="alert alert-warning" role="alert">
                        Total bobot harus sama dengan 100!
                    </div>
                @else
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Data Karyawan</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <button id="selectAll" class="btn btn-sm btn-primary">Select All</button>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <form id="karyawanForm" method="POST" action="{{ route('hitung.submit') }}">
                                @csrf
                                <table class="table align-items-center table-flush" id="karyawanTable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">No</th>
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
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->alamat }}</td>
                                                <td>
                                                    <a href="mailto:{{ $row->email }}">{{ $row->email }}</a>
                                                </td>
                                                <td>{{ $row->telpon }}</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-2">
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
                @endif
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

    <script>
        $(document).ready(function() {
            var selected = [];

            // Initialize DataTable
            var table = $('#karyawanTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true
            });

            // Handle checkbox change event across all pages
            $('#karyawanTable').on('change', '.karyawan-checkbox', function() {
                var id = $(this).val();
                if ($(this).is(':checked')) {
                    // Add to array if checked
                    if (!selected.includes(id)) {
                        selected.push(id);
                    }
                } else {
                    // Remove from array if unchecked
                    selected = selected.filter(function(value) {
                        return value !== id;
                    });
                }
            });

            // Handle select/deselect all
            document.getElementById('selectAll').addEventListener('click', function() {
                let checkboxes = table.$('.karyawan-checkbox'); // Target checkboxes across pages
                let allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);

                checkboxes.each(function() {
                    $(this).prop('checked', !allChecked); // Toggle all checkboxes
                    $(this).trigger('change'); // Trigger change event for each
                });

                document.getElementById('selectAll').innerText = allChecked ? 'Select All' : 'Deselect All';
            });

            // On form submit, pass selected IDs
            document.getElementById('karyawanForm').addEventListener('submit', function(event) {
                if (selected.length < 2) {
                    alert('Pilih minimal dua karyawan.');
                    event.preventDefault(); // Prevent form submission
                } else {
                    document.getElementById('selected_karyawan').value = selected.join(',');
                }
            });
        });
    </script>
@endpush
