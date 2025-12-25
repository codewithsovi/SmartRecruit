<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createaturanModal">
    Tambah Aturan Fuzzy
</button>

<div class="modal fade" id="createaturanModal" tabindex="-1" role="dialog" aria-labelledby="createaturanModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <form action="{{ route('admin.aturan.store') }}" method="POST">
                @csrf

                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="aturanModalLabel">
                        Tambah Aturan
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    @foreach ($kriterias as $kriteria)
                        <div class="form-group">
                            <label class="text-dark">
                                {{ $kriteria->nama_kriteria }}
                            </label>

                            <select 
                                name="himpunan[{{ $kriteria->id }}]" 
                                class="form-control" 
                                required >
                                <option value="" disabled selected>
                                    Pilih {{ $kriteria->nama_kriteria }}
                                </option>

                                @foreach ($kriteria->himpunanFuzzies as $himpunan)
                                    <option value="{{ $himpunan->id }}">
                                        {{ $himpunan->nama_himpunan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endforeach

                    <div  class="mt-2">
                            <label class="text-dark">Nilai</label>
                            <input type="number" name="nilai" class="form-control">
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


