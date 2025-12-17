<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createjabatanModal">
    Tambah Jabatan
</button>

<div class="modal fade" id="createjabatanModal" tabindex="-1" role="dialog" aria-labelledby="createjabatanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <form action="{{ route('admin.jabatan.store') }}" method="POST">
                @csrf

                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="jabatanModalLabel">
                        Tambah Jabatan
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-dark">Nama Jabatan</label>
                        <input type="text" name="nama_jabatan" class="form-control" placeholder="Masukkan nama jabatan" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary bg-danger" data-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
