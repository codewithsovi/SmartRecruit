@extends('layout.main')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tabel Aturan Fuzzy</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center gap-2">
                <div class="py-3 d-flex justify-content-start align-items-center gap-2">
                    <a href="">Rentang Aturan</a>
                </div>

                <div class="py-3 d-flex justify-content-end align-items-center gap-2">
                    <a href="#" class="btn btn-primary btn-icon-split d-flex align-items-center float-right">
                        <form action="{{ route('admin.aturan.generate') }}" method="POST">
                            @csrf
                            <button class="btn btn-primary">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i> 
                                </span>
                                Generate
                            </button>
                        </form>
                    </a>
                </div>
            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Aturan</th>
                                <th>THEN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($aturans as $index => $aturan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        IF
                                            @foreach ($aturan->details as $detail)
                                                <strong>{{ $detail->kriteria->nama_kriteria }}</strong>
                                                =
                                                <em>{{ ucfirst($detail->himpunan->nama_himpunan) }}</em>
                                                @if (!$loop->last)
                                                    AND
                                                @endif
                                            @endforeach
                                    </td>
                                    <td>
                                        <span class="badge 
                                            @if ($aturan->nilai >= 70) bg-success
                                            @elseif ($aturan->nilai >= 50) bg-primary
                                            @elseif ($aturan->nilai >= 30) bg-warning
                                            @else bg-danger
                                            @endif
                                            text-white">
                                            {{ $aturan->nilai == floor($aturan->nilai) ? number_format($aturan->nilai, 0, '.', '') : number_format($aturan->nilai, 3, '.', '') }}
                                        </span>
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
