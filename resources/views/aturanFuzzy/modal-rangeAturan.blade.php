<button type="button" class="btn btn-warning btn-icon-split" data-toggle="modal"
    data-target="#rangeAturanModal">
    <span class="icon text-white-70">
        Lihat Range
    </span>
</button>

<div class="modal fade" id="rangeAturanModal" tabindex="-1" role="dialog"
    aria-labelledby="editkriteriaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Range Nilai Aturan Fuzzy</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Range Nilai</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>                           
                            <tr>                                
                                <td>70 - 100</td>
                                <td><span class="badge bg-success text-white">Sangat Tinggi</span></td>                                
                            </tr> 
                            <tr>                                
                                <td>50 - 69.99</td>
                                <td><span class="badge bg-primary text-white">Tinggi</span></td>                                
                            </tr> 
                            <tr>                                
                                <td>30 - 49.99</td>
                                <td><span class="badge bg-warning text-white">Rendah</span></td>                                
                            </tr> 
                            <tr>                                
                                <td>0 - 29.99</td>
                                <td><span class="badge bg-danger text-white">Sangat Rendah</span></td>                                
                            </tr>                            
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary bg-danger" data-dismiss="modal">
                    Tutup
                </button>                
            </div>
        </div>
    </div>
</div>
