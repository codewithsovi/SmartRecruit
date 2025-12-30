@extends('layout.main')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Ranking   - {{ $jabatan->nama_jabatan }}</h1>
        <!-- DataTales Example -->
       <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-start align-items-center gap-2">
               <a href="{{ route('admin.hasil.jabatan') }}" class="btn btn-secondary btn-icon-split d-flex align-items-center float-right mr-2">
                    <span class="icon text-white-50">
                        <i class="fas fa-arrow-left"></i>
                    </span>
                    <span class="text">Tabel Jabatan</span>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>                              
                                <th>Ranking</th>                               
                                <th>Nama Kandidat</th>
                                <th>Weight Avarange (WA)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hasils as $hasil)
                                <tr>
                                    <td>
                                        @if ($loop->iteration == 1)
                                            <span class="badge bg-warning text-dark">🥇 1</span>
                                        @elseif ($loop->iteration == 2)
                                            <span class="badge bg-secondary text-white">🥈 2</span>
                                        @elseif ($loop->iteration == 3)
                                            <span class="badge bg-danger text-white">🥉 3</span>
                                        @else
                                            <span class="badge bg-light text-dark">{{ $loop->iteration }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $hasil->kandidat->nama_kandidat }}
                                        @if ($loop->iteration == 1)
                                            <span class="badge bg-success ms-2 text-white">Terbaik</span>
                                        @endif
                                    </td>
                                   
                                    <td>
                                        @php
                                            $alpha = number_format($hasil->nilai_akhir) ?? 0;
                                        @endphp
                                            {{ $alpha == floor($alpha) ? number_format($alpha, 0, '.', '') : number_format($alpha, 3, '.', '') }}
                                    </td>    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
