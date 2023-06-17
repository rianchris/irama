<div class="modal fade" id="tambah-pengguna" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" action="{{ route('setpengguna.store') }}" method="post">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Tambah Data Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-2">
                    <div class="col mb-3">
                        <label for="username" class="form-label">Username (*) </label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" />
                    </div>
                    <div class="col mb-3">
                        <label for="password" class="form-label">Password (*)</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" />
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" />
                    </div>
                    <div class="col mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email" />
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-3">
                        <label for="organization" class="form-label">Organization</label>
                        <input type="text" name="organization" id="organization" class="form-control" placeholder="Enter Organization" />
                    </div>
                    <div class="col mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="number" name="phone" id="phone" class="form-control" placeholder="Enter Phone Number" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
