@extends('layout.main')

@section('content')
     <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Table Kandidat </h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
 <a href="{{ route('admin.jabatan.index') }}">Jabatan - {{ $jabatan->nama_jabatan }}</a>

                <a href="#" class="btn btn-primary btn-icon-split d-flex align-items-center float-right">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    @include('kandidat.modal-create')
                </a>


            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kandidat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kandidats as $kandidat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kandidat->nama_kandidat }}</td>
                                    <td>
                                        <div class="d-flex gap-5">
                                            @include('kandidat.modal-edit')

                                            <form action="{{ route('admin.kandidat.delete.byJabatan', $kandidat->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus kandidat ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-icon-split">
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
