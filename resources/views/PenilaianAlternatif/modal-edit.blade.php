<button type="button" class="btn btn-warning btn-icon-split" data-toggle="modal"
    data-target="#editalternatifModal-{{ $kandidat->id }}">
    <span class="icon text-white-50">
        <i class="fas fa-edit"></i>
    </span>
</button>

<div class="modal fade" id="editalternatifModal-{{ $kandidat->id }}" tabindex="-1" role="dialog" aria-labelledby="editalternatifModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <form action="{{ route('admin.alternatif.update.byJabatan', $kandidat->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="alternatifModalLabel">
                        Edit Alternatif
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                   <div class="form-group">
                        <label class="text-dark">Kandidat</label>

                        <select name="kandidat_id" class="form-control" disabled>
                            <option value="{{ $kandidat->id }}" selected>
                                {{ $kandidat->nama_kandidat }}
                            </option>
                        </select>

                        <input type="hidden" name="kandidat_id" value="{{ $kandidat->id }}">

                    </div>

                   @foreach ($kriterias as $kriteria)
                        @php
                            $nilai = $kandidat->alternatif
                                ->where('kriteria_id', $kriteria->id)
                                ->first();
                        @endphp

                        <div class="form-group">
                            <label class="text-dark">{{ $kriteria->nama_kriteria }}</label>

                            <input type="hidden" 
                                name="kriteria_id[]" 
                                value="{{ $kriteria->id }}">

                            <input type="number" name="bobot[]" class="form-control" value="{{ $nilai ? $nilai->bobot : '' }}" placeholder="{{$kriteria->min}} - {{$kriteria->max}}" required>
                        </div>
                    @endforeach

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