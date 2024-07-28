<@extends('layouts.app') @section('content') @include('layouts.headers.cards') <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Data Perhitungan</h3>
                            </div>
                            <div class="col-4 text-right">
                                <!-- <a href="{{ URL::to('/') }}/kriteria/create" class="btn btn-sm btn-primary">Add kriteria</a> -->
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Kriteria</th>
                                    @foreach ($perhitungan as $key => $row)
                                        <th scope="col">{{ $row->name }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < $count; $i++)
                                    <tr>
                                        @for ($j = 0; $j < $count; $j++)
                                            @if ($j == 0)
                                                <td>{{ $perhitungan[$i]->name }}</td>
                                            @endif

                                            @if ($j == $i)
                                                @php $arrayData[$i][$j] = 1 @endphp
                                                <td>1</td>
                                            @else
                                                @if ($i == 0 && $j > 0)
                                                    @php $arrayData[$i][$j] = $perhitungan[$j]->nilai @endphp
                                                    <td>{{ $perhitungan[$j]->nilai }}</td>
                                                @elseif($i == 1 && $j > 1)
                                                    @php $arrayData[$i][$j] = $perhitungan[$j-1]->nilai @endphp
                                                    <td>{{ $perhitungan[$j - 1]->nilai }}</td>
                                                @elseif($i == 2 && $j > 2)
                                                    @php $arrayData[$i][$j] = $perhitungan[$j-2]->nilai @endphp
                                                    <td>{{ $perhitungan[$j - 2]->nilai }}</td>
                                                @elseif($i == 3 && $j > 3)
                                                    @php $arrayData[$i][$j] = $perhitungan[$j-3]->nilai @endphp
                                                    <td>{{ $perhitungan[$j - 3]->nilai }}</td>
                                                @elseif($i == 4 && $j > 4)
                                                    @php $arrayData[$i][$j] =$perhitungan[$j-4]->nilai @endphp
                                                    <td>{{ $perhitungan[$j - 4]->nilai }}</td>
                                                @elseif($i == 5 && $j > 5)
                                                    @php $arrayData[$i][$j] =$perhitungan[$j-5]->nilai @endphp
                                                    <td>{{ $perhitungan[$j - 5]->nilai }}</td>
                                                @elseif($i == 6 && $j > 6)
                                                    @php $arrayData[$i][$j] =$perhitungan[$j-6]->nilai @endphp
                                                    <td>{{ $perhitungan[$j - 6]->nilai }}</td>
                                                @elseif($i == 7 && $j > 7)
                                                    @php $arrayData[$i][$j] =$perhitungan[$j-7]->nilai @endphp
                                                    <td>{{ $perhitungan[$j - 7]->nilai }}</td>
                                                @elseif($i == 8 && $j > 8)
                                                    @php $arrayData[$i][$j] =$perhitungan[$j-8]->nilai @endphp
                                                    <td>{{ $perhitungan[$j - 8]->nilai }}</td>
                                                @elseif($i == 9 && $j > 9)
                                                    @php $arrayData[$i][$j] =$perhitungan[$j-9]->nilai @endphp
                                                    <td>{{ $perhitungan[$j - 9]->nilai }}</td>
                                                @elseif($i == 10 && $j > 10)
                                                    @php $arrayData[$i][$j] =$perhitungan[$j-10]->nilai @endphp
                                                    <td>{{ $perhitungan[$j - 10]->nilai }}</td>
                                                @elseif($i == 11 && $j > 11)
                                                    @php $arrayData[$i][$j] =$perhitungan[$j-11]->nilai @endphp
                                                    <td>{{ $perhitungan[$j - 11]->nilai }}</td>
                                                @elseif($i == 12 && $j > 12)
                                                    @php $arrayData[$i][$j] =$perhitungan[$j-12]->nilai @endphp
                                                    <td>{{ $perhitungan[$j - 12]->nilai }}</td>
                                                @elseif($i == 13 && $j > 13)
                                                    @php $arrayData[$i][$j] =$perhitungan[$j-13]->nilai @endphp
                                                    <td>{{ $perhitungan[$j - 13]->nilai }}</td>
                                                @elseif($i == 14 && $j > 14)
                                                    @php $arrayData[$i][$j] =$perhitungan[$j-14]->nilai @endphp
                                                    <td>{{ $perhitungan[$j - 14]->nilai }}</td>
                                                @elseif($i > 0 && $j == 0)
                                                    @php $arrayData[$i][$j] = 1/$perhitungan[$i]->nilai @endphp
                                                    <td>{{ 1 / $perhitungan[$i]->nilai }}</td>
                                                @elseif($i > 0 && $j == 1)
                                                    @php $arrayData[$i][$j] = 1/$perhitungan[$i-1]->nilai @endphp
                                                    <td>{{ 1 / $perhitungan[$i - 1]->nilai }}</td>
                                                @elseif($i > 0 && $j == 2)
                                                    @php $arrayData[$i][$j] = 1/$perhitungan[$i-2]->nilai @endphp
                                                    <td>{{ 1 / $perhitungan[$i - 2]->nilai }}</td>
                                                @elseif($i > 0 && $j == 3)
                                                    @php $arrayData[$i][$j] = 1/$perhitungan[$i-3]->nilai @endphp
                                                    <td>{{ 1 / $perhitungan[$i - 3]->nilai }}</td>
                                                @elseif($i > 0 && $j == 4)
                                                    @php $arrayData[$i][$j] = 1/$perhitungan[$i-4]->nilai @endphp
                                                    <td>{{ 1 / $perhitungan[$i - 4]->nilai }}</td>
                                                @elseif($i > 0 && $j == 5)
                                                    @php $arrayData[$i][$j] = 1/$perhitungan[$i-5]->nilai @endphp
                                                    <td>{{ 1 / $perhitungan[$i - 5]->nilai }}</td>
                                                @elseif($i > 0 && $j == 6)
                                                    @php $arrayData[$i][$j] = 1/$perhitungan[$i-6]->nilai @endphp
                                                    <td>{{ 1 / $perhitungan[$i - 6]->nilai }}</td>
                                                @elseif($i > 0 && $j == 7)
                                                    @php $arrayData[$i][$j] = 1/$perhitungan[$i-7]->nilai @endphp
                                                    <td>{{ 1 / $perhitungan[$i - 7]->nilai }}</td>
                                                @elseif($i > 0 && $j == 8)
                                                    @php $arrayData[$i][$j] = 1/$perhitungan[$i-8]->nilai @endphp
                                                    <td>{{ 1 / $perhitungan[$i - 8]->nilai }}</td>
                                                @elseif($i > 0 && $j == 9)
                                                    @php $arrayData[$i][$j] = 1/$perhitungan[$i-9]->nilai @endphp
                                                    <td>{{ 1 / $perhitungan[$i - 9]->nilai }}</td>
                                                @elseif($i > 0 && $j == 10)
                                                    @php $arrayData[$i][$j] = 1/$perhitungan[$i-10]->nilai @endphp
                                                    <td>{{ 1 / $perhitungan[$i - 10]->nilai }}</td>
                                                @elseif($i > 0 && $j == 11)
                                                    @php $arrayData[$i][$j] = 1/$perhitungan[$i-11]->nilai @endphp
                                                    <td>{{ 1 / $perhitungan[$i - 11]->nilai }}</td>
                                                @elseif($i > 0 && $j == 12)
                                                    @php $arrayData[$i][$j] = 1/$perhitungan[$i-12]->nilai @endphp
                                                    <td>{{ 1 / $perhitungan[$i - 12]->nilai }}</td>
                                                @elseif($i > 0 && $j == 13)
                                                    @php $arrayData[$i][$j] = 1/$perhitungan[$i-13]->nilai @endphp
                                                    <td>{{ 1 / $perhitungan[$i - 13]->nilai }}</td>
                                                @elseif($i > 0 && $j == 14)
                                                    @php $arrayData[$i][$j] = 1/$perhitungan[$i-14]->nilai @endphp
                                                    <td>{{ 1 / $perhitungan[$i - 14]->nilai }}</td>
                                                @else
                                                    <td>0</td>
                                                @endif
                                            @endif
                                        @endfor
                                    </tr>
                                @endfor

                                <tr>
                                    <td>Jumlah</td>


                                    <!-- <td>{{ $arrayData[1][0] }}</td> -->
                                    @for ($mp = 0; $mp < $count; $mp++)
                                        @for ($jp = 0; $jp < $count; $jp++)
                                            @php $total1[$jp] = $arrayData[$jp][$mp] @endphp
                                        @endfor
                                        @php $total[$mp] = array_sum($total1) @endphp
                                        <td>{{ array_sum($total) }}</td>
                                    @endfor

                                </tr>



                            </tbody>
                        </table>
                    </div>
                    </br>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" colspan='{{ $count }}' align="center">Nilai Eigen</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Rata-Rata</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                    </br>

                    <!-- Perhitungan untuk perusahan di setiap kriteria -->

                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">

                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            @include('layouts.footers.auth')
            </div>
        @endsection

        @push('js')
            <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
            <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
        @endpush
