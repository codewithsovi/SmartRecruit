@extends('layout.main')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Table Jabatan</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="#" class="btn btn-primary btn-icon-split d-flex align-items-center float-right">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    {{-- <span class="text">Tambah Jabatan</span> --}}

                    @include('jabatan.modal-create')
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jabatans as $jabatan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $jabatan->nama_jabatan }}</td>
                                    {{-- <td>{{ $jabatan->id }}</td> --}}
                                    <td>
                                        <div class="d-flex">
                                            <div class="me-2">
                                                 @include('jabatan.modal-edit')
                                            </div>

                                            <form action="{{ route('admin.jabatan.delete', $jabatan->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus jabatan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-icon-split me-2">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </button>
                                            </form>

                                            {{-- button show --}}
                                            <a href="{{ route('admin.kandidat.index.byJabatan', $jabatan->id) }}" class="btn btn-info btn-icon-split me-2">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-eye"></i>
                                                </span>
                                            </a>
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
