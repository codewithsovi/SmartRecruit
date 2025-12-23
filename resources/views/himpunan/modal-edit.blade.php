<button type="button" class="btn btn-warning btn-icon-split" data-toggle="modal"
    data-target="#edithimpunanModal-{{ $himpunan->id }}">
    <span class="icon text-white-50">
        <i class="fas fa-edit"></i>
    </span>
</button>

<div class="modal fade" id="edithimpunanModal-{{ $himpunan->id }}" tabindex="-1" role="dialog" aria-labelledby="edithimpunanModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <form action="{{ route('admin.himpunan.update.byKriteria', $himpunan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">
                        Edit Himpunan
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">

                        <label class="text-dark">Nama Himpunan</label>
                        <select name="nama_himpunan" class="form-control" required>
                            <option value="rendah" {{ $himpunan->nama_himpunan == 'rendah' ? 'selected' : '' }}>Rendah</option>
                            <option value="sedang" {{ $himpunan->nama_himpunan == 'sedang' ? 'selected' : '' }}>Sedang</option>
                            <option value="tinggi" {{ $himpunan->nama_himpunan == 'tinggi' ? 'selected' : '' }}>Tinggi</option>
                        </select>

                        <label class="text-dark mt-2">Kurva</label>
                        <select name="kurva" class="form-control kurva-select" required>
                            <option value="naik" {{ $himpunan->kurva == 'naik' ? 'selected' : '' }}>Naik</option>
                            <option value="turun" {{ $himpunan->kurva == 'turun' ? 'selected' : '' }}>Turun</option>
                            <option value="segitiga" {{ $himpunan->kurva == 'segitiga' ? 'selected' : '' }}>Segitiga</option>
                            <option value="trapesium" {{ $himpunan->kurva == 'trapesium' ? 'selected' : '' }}>Trapesium</option>
                        </select>

                        <div id="input-a" class="mt-2 input-a" style="display:none;">
                            <label class="text-dark">Nilai A</label>
                            <input type="number" name="a" class="form-control" value="{{ $himpunan->a }}">
                        </div>

                        <div id="input-b" class="mt-2 input-b" style="display:none;">
                            <label class="text-dark">Nilai B</label>
                            <input type="number" name="b" class="form-control" value="{{ $himpunan->b }}">
                        </div>

                        <div id="input-c" class="mt-2 input-c" style="display:none;">
                            <label class="text-dark">Nilai C</label>
                            <input type="number" name="c" class="form-control" value="{{ $himpunan->c }}">
                        </div>

                        <div id="input-d" class="mt-2 input-d" style="display:none;">
                            <label class="text-dark">Nilai D</label>
                            <input type="number" name="d" class="form-control" value="{{ $himpunan->d }}">
                        </div>

                        <input type="hidden" name="kriteria_id" value="{{ $himpunan->kriteria_id }}">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {

    document.querySelectorAll('.kurva-select').forEach(select => {

        const modalBody = select.closest('.modal-body');

        const inputA = modalBody.querySelector('.input-a');
        const inputB = modalBody.querySelector('.input-b');
        const inputC = modalBody.querySelector('.input-c');
        const inputD = modalBody.querySelector('.input-d');

        const hideAll = () => {
            inputA.style.display = 'none';
            inputB.style.display = 'none';
            inputC.style.display = 'none';
            inputD.style.display = 'none';
        };

        const showByKurva = (kurva) => {
            hideAll();
            if (kurva === 'naik' || kurva === 'turun') {
                inputA.style.display = 'block';
                inputB.style.display = 'block';
            }
            if (kurva === 'segitiga') {
                inputA.style.display = 'block';
                inputB.style.display = 'block';
                inputC.style.display = 'block';
            }
            if (kurva === 'trapesium') {
                inputA.style.display = 'block';
                inputB.style.display = 'block';
                inputC.style.display = 'block';
                inputD.style.display = 'block';
            }
        };

        // 🔥 tampilkan saat edit pertama kali dibuka
        showByKurva(select.value);

        // 🔥 ganti kurva
        select.addEventListener('change', function () {
            showByKurva(this.value);
        });
    });

});
</script>


