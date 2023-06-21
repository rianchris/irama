<div class="modal fade" id="edit-klaster" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" action="{{ route('setklaster.store') }}" method="post">
            @method('put')
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Edit Data klaster</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-2">
                    <div class="col mb-3">
                        <label for="klaster" class="form-label">Nama Klaster </label>
                        <input type="text" name="klaster" id="klaster" class="form-control" placeholder="Enter Klaster" value="123" />
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
