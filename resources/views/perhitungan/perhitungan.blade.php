@extends('layout.main')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h2 mb-2 text-gray-900">Perhitungan Fuzzy - Jabatan {{ $jabatan->nama_jabatan }}</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-strat align-items-center gap-2">
               <h1 class="h4 mb-2 text-gray-800">Matriks Keputusan</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Alternatif</th>
                               @foreach ($kriterias as $kriteria)
                                   <th>{{ $kriteria->nama_kriteria }}</th>
                               @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kandidats as $kandidat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kandidat->nama_kandidat }}</td>
                                    @foreach ($kriterias as $kriteria)
                                        <td>
                                            {{ $kandidat->alternatif->where('kriteria_id', $kriteria->id)->first()->bobot?? 'N/A' }}
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            @foreach ($kriterias as $kriteria)
             <div class="card-header py-3 d-flex justify-content-strat align-items-center gap-2">
                <h1 class="h4 mb-2 text-gray-800">Derajat Keanggotaan Variabel {{ $kriteria->nama_kriteria }}</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Alternatif</th>
                                <th>{{ $kriteria->nama_kriteria }}</th>

                                @foreach ($kriteria->himpunanFuzzies as $himpunan)
                                    <th>{{ $himpunan->nama_himpunan }}</th>
                                @endforeach
                            </tr>
                        </thead>

                         <tbody>
                            @foreach ($kandidats as $index => $kandidat)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $kandidat->nama_kandidat }}</td>

                                    {{-- nilai asli --}}
                                    <td>
                                        {{ $kandidat->alternatif
                                            ->where('kriteria_id', $kriteria->id)
                                            ->first()
                                            ->bobot ?? '-' }}
                                    </td>

                                    {{-- derajat keanggotaan --}}
                                    @foreach ($kriteria->himpunanFuzzies as $himpunan)
                                        <td>
                                            {{ number_format($derajat[$kandidat->id][$kriteria->id][$himpunan->id] ?? 0,3) }}
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
        </div>

         <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-strat align-items-center gap-2">
               <h1 class="h4 mb-2 text-gray-800">Implementasi Aturan Fuzzy</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                               @foreach ($kriterias as $kriteria)
                                   <th>{{ $kriteria->nama_kriteria }}</th>
                               @endforeach
                               <th>Output</th>
                               @foreach ($kandidats as $kandidat)
                               <th>
                                    {{ $kandidat->nama_kandidat }}
                               </th>
                               @endforeach
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($ruleResult as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                {{-- Kolom Kriteria --}}
                                @foreach ($kriterias as $kriteria)
                                    @php
                                        $detail = $data['aturan']->details
                                            ->where('kriteria_id', $kriteria->id)
                                            ->first();
                                    @endphp

                                    <td>
                                        {{ $detail ? ucfirst($detail->himpunan->nama_himpunan) : '-' }}
                                    </td>
                                @endforeach

                                <td>
                                        @if ($data['aturan']->nilai == 1)
                                            <span class="badge bg-success text-white">1</span>
                                        @else
                                            <span class="badge bg-danger text-white">0</span>
                                        @endif
                                    </td>  

                                {{-- Nilai tiap Kandidat --}}
                                @foreach ($kandidats as $kandidat)
                                    <td>
                                        {{ number_format($data['kandidat'][$kandidat->id] ?? 0, 3) }}
                                    </td>
                                @endforeach
                            </tr>

                            
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-strat align-items-center gap-2">
               <h1 class="h4 mb-2 text-gray-800">Defuzzification dan Perangkingan</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Rangking</th>
                                <th>Nama Alternatif</th>
                                <th>Perhitungan Defuzzification</th>
                                <th>Weight Avarange (WA)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kandidats as $kandidat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{ $kandidat->nama_kandidat }}</td>
                                    <td class="text-center">
                                        @if ($defuzzifikasi[$kandidat->id]['atas'] !== '-')
                                            <div style="line-height:1.2">
                                                <div>
                                                    {{ $defuzzifikasi[$kandidat->id]['atas'] }}
                                                </div>
                                                <hr class="my-1">
                                                <div>
                                                    {{ $defuzzifikasi[$kandidat->id]['bawah'] }}
                                                </div>
                                            </div>
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td>
                                        {{ number_format($defuzzifikasi[$kandidat->id]['wa'], 3) }}
                                    </td>                                  
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
