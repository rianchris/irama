<div class="modal fade" id="tambah-pengguna" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <form class="modal-content" action="{{ route('setpengguna.store') }}" method="post">
            <input type="hidden" name="role" id="role" class="form-control" value="mitra" />
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Tambah Data PIC (Mitra)</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-2">
                    <div class="col-md-6 mb-3">
                        <label for="username" class="form-label">Username <i class='bx bx-error-circle' title="wajib, karakter lebih dari enam dan tidak boleh sama"></i></label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" required />

                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Kontak</label>
                        <div class="input-group mt-0">
                            <span class="input-group-text">+62</span>
                            <input type="number" name="phone" id="phone" class="form-control" placeholder="8123456789" />
                        </div>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-md-6 mb-3">
                        <label for="organization" class="form-label">Kode SIMA KLPBU <i class='bx bx-error-circle' title="wajib, lihat referensi kode pada menu Setting->Sima KLPBU"></i></label>
                        <input type="text" name="kode_klpbu_id" id="organization" class="form-control" placeholder="Enter Kode Sima KLPBU" required />
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="klaster" class="form-label">Klaster BU <i class='bx bx-error-circle' title="wajib"></i></label>
                        <select class="form-select" id="klaster" name="klaster_id" required>
                            <option selected>Pilih klaster</option>
                            @foreach ($klaster as $klaster)
                                <option value="{{ $klaster->id }}">{{ $klaster->nama_klaster }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Tutup
                </button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
