<button type="button" class="btn btn-warning btn-icon-split" data-toggle="modal" data-target="#edituserModal-{{ $user->id }}">
    <span class="icon text-white-50">
        <i class="fas fa-edit"></i>
    </span>
</button>

<div class="modal fade" id="edituserModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="edituserModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <form action="{{ route('admin.manajemenUser.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="userModalLabel">
                        Edit User
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-dark">Username</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="text-dark">Email</label>
                        <input type="text" name="email" value="{{ $user->email }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="text-dark">Role</label>
                        <select name="role" id="role" class="form-control" require>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="hrd" {{ $user->role == 'hrd' ? 'selected' : '' }}>HRD</option>
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
