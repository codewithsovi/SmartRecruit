<button type="button" class="btn btn-warning btn-icon-split" data-toggle="modal"
    data-target="#editkandidatModal-{{ $kandidat->id }}">
    <span class="icon text-white-50">
        <i class="fas fa-edit"></i>
    </span>
</button>

<div class="modal fade" id="editkandidatModal-{{ $kandidat->id }}" tabindex="-1" role="dialog"
    aria-labelledby="editkandidatModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <form action="{{ route('admin.kandidat.update.byJabatan', $kandidat->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="jabatan_id" value="{{ $jabatan_id }}">
                        <label class="text-dark">Nama Kandidat</label>
                        <input type="text" name="nama_kandidat" class="form-control"
                            value="{{ $kandidat->nama_kandidat }}" required>
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
