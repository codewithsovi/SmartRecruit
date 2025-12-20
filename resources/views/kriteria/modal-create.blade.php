<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createkriteriaModal">
    Tambah Kriteria
</button>

<div class="modal fade" id="createkriteriaModal" tabindex="-1" role="dialog" aria-labelledby="createkriteriaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <form action="{{ route('admin.kriteria.store') }}" method="POST">
                @csrf

                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="kriteriaModalLabel">
                        Tambah Kriteria
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-dark">Nama Kriteria</label>
                        <input type="text" name="nama_kriteria" class="form-control" placeholder="Masukkan nama kriteria" required>
                        <label class="text-dark">Min</label>
                        <input type="number" name="min" class="form-control" placeholder="Masukkan nilai min" required>
                        <label class="text-dark">Max</label>
                        <input type="number" name="max" class="form-control" placeholder="Masukkan nilai max" required>
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
