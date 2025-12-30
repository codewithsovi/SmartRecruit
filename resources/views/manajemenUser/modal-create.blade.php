<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createuserModal">
    Tambah User
</button>

<div class="modal fade" id="createuserModal" tabindex="-1" role="dialog" aria-labelledby="createuserModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <form action="{{ route('admin.manajemenUser.store') }}" method="POST">
                @csrf

                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="userModalLabel">
                        Tambah User
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-dark">Username</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="text-dark">Email</label>
                        <input type="text" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="text-dark">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Min 5 karakter" required>
                    </div>
                    <div class="form-group">
                        <label class="text-dark">Role</label>
                        <select name="role" id="role" class="form-control" require>
                            <option value="" disabled selected>Pilih role user</option>
                            <option value="admin">Admin</option>
                            <option value="hrd">HRD</option>
                        </select>
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
