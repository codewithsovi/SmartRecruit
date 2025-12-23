@extends('layout.main')

@section('content')
        <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tabel Himpunan</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('admin.kriteria.index') }}">Kriteria - {{ $kriteria->nama_kriteria }}</a>
                
                <a href="#" class="btn btn-primary btn-icon-split d-flex align-items-center float-right">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    @include('himpunan.modal-create')
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Himpunan</th>
                                <th>Kurva</th>
                                <th>Domain</th>
                                <th>Aksi</th>              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($himpunans as $himpunan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $himpunan->nama_himpunan }}</td>
                                    <td>{{ $himpunan->kurva }}</td>
                                    <td>
                                        @if ($himpunan->kurva == 'naik' || $himpunan->kurva == 'turun')
                                            [{{ $himpunan->a }}] [{{ $himpunan->b }}]
                                        @elseif ($himpunan->kurva == 'segitiga')
                                            [{{ $himpunan->a }}] [{{ $himpunan->b }}] [{{ $himpunan->c }}]
                                        @elseif ($himpunan->kurva == 'trapesium')
                                            [{{ $himpunan->a }}] [{{ $himpunan->b }}] [{{ $himpunan->c }}] [{{ $himpunan->d }}]
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                                 @include('himpunan.modal-edit')
                                            </div>

                                            <form action="{{ route('admin.himpunan.delete.byKriteria', $himpunan->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus himpunan ini?')">
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
    <!-- /.container-fluid -->

@endsection
