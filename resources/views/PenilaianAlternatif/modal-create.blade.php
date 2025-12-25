<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createalternatifModal">
    Tambah Alternatif Fuzzy
</button>

<div class="modal fade" id="createalternatifModal" tabindex="-1" role="dialog" aria-labelledby="createalternatifModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <form action="{{ route('admin.alternatif.store.byJabatan') }}" method="POST">
                @csrf

                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="alternatifModalLabel">
                        Tambah Alternatif
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                   <div class="form-group">
                        <label class="text-dark">Kandidat</label>

                        <select name="kandidat_id" class="form-control" required>
                            <option value="" disabled selected>
                                Pilih Kandidat - {{ $jabatan->nama_jabatan }}
                            </option>

                            @foreach ($kandidats as $kandidat)
                                <option value="{{ $kandidat->id }}">
                                    {{ $kandidat->nama_kandidat }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    @foreach ($kriterias as $kriteria)
                        <div class="form-group">
                            <label class="text-dark">{{ $kriteria->nama_kriteria }}</label>
                            <input type="hidden" name="kriteria_id[]" value="{{ $kriteria->id }}">
                            <input type="number" name="bobot[]" class="form-control" placeholder="{{$kriteria->min}} - {{$kriteria->max}}" required>
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


