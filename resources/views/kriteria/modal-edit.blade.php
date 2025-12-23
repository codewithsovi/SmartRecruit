<button type="button" class="btn btn-warning btn-icon-split" data-toggle="modal"
    data-target="#editkriteriaModal-{{ $kriteria->id }}">
    <span class="icon text-white-50">
        <i class="fas fa-edit"></i>
    </span>
</button>

<div class="modal fade" id="editkriteriaModal-{{ $kriteria->id }}" tabindex="-1" role="dialog"
    aria-labelledby="editkriteriaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <form action="{{ route('admin.kriteria.update', $kriteria->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-dark">Nama Kriteria</label>
                        <input type="text" name="nama_kriteria" class="form-control"
                            value="{{ $kriteria->nama_kriteria }}" required>

                        <label class="text-dark">Min</label>
                        <input type="number" name="min" class="form-control"
                            value="{{ $kriteria->min }}" required>
                            
                        <label class="text-dark">Max</label>
                        <input type="number" name="max" class="form-control"
                            value="{{ $kriteria->max }}" required>
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
