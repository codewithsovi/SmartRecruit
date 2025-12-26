<button type="button" class="btn btn-warning btn-icon-split" data-toggle="modal"
    data-target="#editaturanModal-{{ $aturan->id }}">
    <span class="icon text-white-50">
        <i class="fas fa-edit"></i>
    </span>
</button>

<div class="modal fade" id="editaturanModal-{{ $aturan->id }}" tabindex="-1" role="dialog" aria-labelledby="editaturanModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <form action="{{ route('admin.aturan.update', $aturan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="aturanModalLabel">
                        Edit Aturan
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
    @foreach ($kriterias as $kriteria)
        @php
            $detail = $aturan->details->firstWhere('kriteria_id', $kriteria->id);
        @endphp

        <div class="form-group">
            <label class="text-dark">
                {{ $kriteria->nama_kriteria }}
            </label>

            <select 
                name="himpunan[{{ $kriteria->id }}]" 
                class="form-control"
            >
                @foreach ($kriteria->himpunanFuzzies as $himpunan)
                    <option 
                        value="{{ $himpunan->id }}"
                        {{ $detail && $detail->himpunan_fuzzy_id == $himpunan->id ? 'selected' : '' }}
                    >
                        {{ $himpunan->nama_himpunan }}
                    </option>
                @endforeach
            </select>
        </div>
    @endforeach

    <div class="mt-2">
        <label class="text-dark">Nilai</label>
        <input 
            type="number" 
            name="nilai" 
            class="form-control" 
            value="{{ $aturan->nilai }}"
        >
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


