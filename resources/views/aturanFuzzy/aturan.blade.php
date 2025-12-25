@extends('layout.main')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tabel Aturan Fuzzy</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                
                <a href="#" class="btn btn-primary btn-icon-split d-flex align-items-center float-right">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    @include('aturanFuzzy.modal-create')
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Aturan</th>
                                <th>THEN/NILAI</th>
                                <th>Aksi</th>              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($aturans as $index => $aturan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        IF
                                        @foreach ($aturan->details as $detail)
                                            ({{ $detail->kriteria->nama_kriteria }} = {{ $detail->himpunan->nama_himpunan }})
                                            @if (!$loop->last)
                                                AND
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $aturan->nilai }}</td>

                                    <td class="d-flex align-items-center gap-2">
                                            <div class="d-flex">
                                                 @include('aturanFuzzy.modal-edit')
                                            </div>

                                            <form action="{{ route('admin.aturan.delete', $aturan->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus aturan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-icon-split me-2">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </button>
                                            </form>
                                        </div>
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
        <!-- Begin Page Content -->