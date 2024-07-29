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
                                <h3 class="mb-0">RRI Surabaya</h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <h4>Informasi Pengangkatan</h4>
                        <p>
                            Perusahaan berhak menetapkan ketentuan dalam pengangkatan karyawan kontrak menjadi karyawan
                            tetap. Karyawan kontrak harus menjalani masa percobaan 3 bulan sebelum bisa
                            diangkat menjadi karyawan tetap dengan upah minimal regional. Perusahaan wajib membuat
                            perjanjian kerja untuk perpanjangan kontrak jika disepakati bersama. Karyawan bisa langsung
                            diangkat menjadi karyawan tetap jika tidak ada kontrak PKWT tertulis. Karyawan kontrak yang
                            telah bekerja selama 2 tahun atau lebih juga berhak diangkat menjadi karyawan tetap sesuai
                            ketentuan perusahaan. Setiap perusahaan memiliki aturan sendiri untuk menetapkan pengangkatan
                            karyawan tetap.
                        </p>

                        {{-- <h4>Total Pegawai</h4>
                        <p>
                            Hingga saat ini, RRI Surabaya memiliki total pegawai sebanyak 150 orang. Jumlah ini mencakup
                            berbagai divisi yang berperan penting dalam operasional stasiun radio, termasuk produksi,
                            teknik, administrasi, dan layanan publik.
                        </p> --}}

                        <h4>Profil Perusahaan</h4>
                        <p>
                            Radio Republik Indonesia di Surabaya (RRI) adalah radio berplat merah yang beralamat di Jl.
                            Pemuda No.82-90, Embong Kaliasin, Surabaya. RRI berstatus sebagai Perusahaan Jawatan (Perjan),
                            yaitu BUMN yang tidak mencari untung, menjalankan prinsip radio publik yang independen.
                        </p>
                        <p>
                            Status Perusahaan Jawatan merupakan transisi dari Lembaga Penyiaran Pemerintah ke Lembaga
                            Penyiaran Publik pada masa reformasi (Suri et al, 2020). RRI didirikan pada 11 September 1945
                            oleh para tokoh yang sebelumnya mengoperasikan stasiun radio Jepang di enam kota.
                        </p>
                        <p>
                            Keputusan mendirikan RRI diambil dalam rapat di rumah Adang Kadarusman, Jakarta. Dokter
                            Abdulrahman Saleh dipilih sebagai pemimpin umum pertama RRI. Rapat ini juga menghasilkan Piagam
                            11 September 1945, yang berisi Tri Prasetya RRI.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
