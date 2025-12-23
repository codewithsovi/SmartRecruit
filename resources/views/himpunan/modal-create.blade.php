<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createhimpunanModal">
    Tambah Himpunan
</button>

<div class="modal fade" id="createhimpunanModal" tabindex="-1" role="dialog" aria-labelledby="createhimpunanModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <form action="{{ route('admin.himpunan.store.byKriteria') }}" method="POST">
                @csrf

                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="himpunanModalLabel">
                        Tambah Himpunan
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-dark">Nama Himpunan</label>
                         <select name="nama_himpunan" id="nama_himpunan" class="form-control" required>
                            <option value="" disabled selected>Pilih nama himpunan</option>
                            <option value="rendah">Rendah</option>
                            <option value="sedang">Sedang</option>
                            <option value="tinggi">Tinggi</option>
                        </select>

                        <label class="text-dark">Kurva</label>
                        <select name="kurva" id="kurva" class="form-control" required>
                            <option value="" disabled selected>Pilih kurva</option>
                            <option value="naik">Naik</option>
                            <option value="turun">Turun</option>
                            <option value="segitiga">Segitiga</option>
                            <option value="trapesium">Trapesium</option>
                        </select>

                        <div id="input-a" class="mt-2" style="display:none;">
                            <label class="text-dark">Nilai A</label>
                            <input type="number" name="a" class="form-control">
                        </div>

                        <div id="input-b" class="mt-2" style="display:none;">
                            <label class="text-dark">Nilai B</label>
                            <input type="number" name="b" class="form-control">
                        </div>

                        <div id="input-c" class="mt-2" style="display:none;">
                            <label class="text-dark">Nilai C</label>
                            <input type="number" name="c" class="form-control">
                        </div>

                        <div id="input-d" class="mt-2" style="display:none;">
                            <label class="text-dark">Nilai D</label>
                            <input type="number" name="d" class="form-control">
                        </div>

                        <input type="hidden" name="kriteria_id" value="{{ $kriteria_id }}">
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

<script>
document.addEventListener('DOMContentLoaded', () => {
    const show = ids => ids.forEach(id => document.getElementById(id).style.display = 'block');
    const hideAll = () => ['input-a','input-b','input-c','input-d']
        .forEach(id => document.getElementById(id).style.display = 'none');

    document.getElementById('kurva')?.addEventListener('change', function () {
        hideAll();

        if (this.value === 'naik' || this.value === 'turun') show(['input-a','input-b']);
        if (this.value === 'segitiga') show(['input-a','input-b','input-c']);
        if (this.value === 'trapesium') show(['input-a','input-b','input-c','input-d']);
    });
});
</script>

