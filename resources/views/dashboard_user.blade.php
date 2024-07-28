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
                                {{-- <h3 class="mb-0">Welcome HRD {{ Auth::user()->name }}</h3> --}}
                                <h3 class="mb-0 mt-2">RRI Surabaya</h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <h4>Informasi Pengangkatan</h4>
                        <p>
                            RRI Surabaya baru-baru ini mengumumkan pengangkatan beberapa pegawai baru dalam upaya untuk
                            meningkatkan kinerja dan pelayanan. Pengangkatan ini dilakukan dengan seleksi ketat untuk
                            memastikan bahwa setiap individu yang dipilih memiliki kompetensi dan dedikasi yang tinggi.
                        </p>

                        <h4>Total Pegawai</h4>
                        <p>
                            Hingga saat ini, RRI Surabaya memiliki total pegawai sebanyak 150 orang. Jumlah ini mencakup
                            berbagai divisi yang berperan penting dalam operasional stasiun radio, termasuk produksi,
                            teknik, administrasi, dan layanan publik.
                        </p>

                        <h4>Profil Perusahaan</h4>
                        <p>
                            RRI Surabaya adalah salah satu stasiun radio milik pemerintah Indonesia yang berlokasi di kota
                            Surabaya. Didirikan pada tahun 1945, RRI Surabaya memiliki sejarah panjang dalam penyiaran
                            berita dan program hiburan kepada masyarakat.
                        </p>
                        <p>
                            Dengan visi untuk menjadi media terdepan dalam penyampaian informasi yang akurat dan terpercaya,
                            RRI Surabaya terus berinovasi dalam setiap program yang disiarkan. Beberapa program unggulan
                            mencakup berita lokal dan nasional, acara musik, program budaya, serta berbagai program edukasi.
                        </p>
                        <p>
                            RRI Surabaya juga aktif dalam mengadakan acara-acara khusus dan siaran langsung yang melibatkan
                            partisipasi masyarakat. Dengan demikian, RRI Surabaya tidak hanya menjadi sumber informasi,
                            tetapi juga menjadi wadah interaksi dan hiburan bagi pendengarnya.
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
