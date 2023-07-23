<div class="card">
    <div class="row row-bordered g-0">
        <div class="col-md-8">
            <h5 class="card-header m-0 me-2 pb-3 text-primary fw-semibold">Ringkasan Level Maturitas Self Assesment</h5>
            <div id="ringkasanskor" class="px-2"></div>
            <div id="skordimensi" skord1="{{ round($skord1, 2) }}" skord2="{{ round($skord2, 2) }}" skord3="{{ round($skord3, 2) }}" skord4="{{ round($skord4, 2) }}" skord5="{{ round($skord5, 2) }}"></div>

        </div>
        <div class="col-md-4">
            <div class="card-body">
                <div class="text-center text-primary fw-semibold">
                    @if (floor($skorAkhirMitra) == 1)
                        <div class="text-center fw-semibold mb-3 text-danger">
                            <i class='bx bxs-award fs-1'></i>
                            <span class="badge bg-label-danger"> Niave</span>
                            <i class='bx bxs-award fs-1'></i>
                        </div>
                    @elseif(floor($skorAkhirMitra) == 2)
                        <div class="text-center fw-semibold mb-3 text-warning">
                            <i class='bx bxs-award fs-1'></i>
                            <span class="badge bg-label-warning"> Aware</span>
                            <i class='bx bxs-award fs-1'></i>
                        </div>
                    @elseif(floor($skorAkhirMitra) == 3)
                        <div class="text-center fw-semibold mb-3 text-success">
                            <i class='bx bxs-award fs-1'></i>
                            <span class="badge bg-label-success"> Defined</span>
                            <i class='bx bxs-award fs-1'></i>
                        </div>
                    @elseif(floor($skorAkhirMitra) == 4)
                        <div class="text-center fw-semibold mb-3 text-info">
                            <i class='bx bxs-award fs-1'></i>
                            <span class="badge bg-label-info"> Managed</span>
                            <i class='bx bxs-award fs-1'></i>
                        </div>
                    @elseif(floor($skorAkhirMitra) == 5)
                        <div class="text-center fw-semibold mb-3 text-primary">
                            <i class='bx bxs-award fs-1'></i>
                            <span class="badge bg-label-primary"> Enabled</span>
                            <i class='bx bxs-award fs-1'></i>
                        </div>
                    @endif

                </div>
            </div>

            {{-- <div id="growthChart"></div> --}}
            <div id="salesStats" data-skor="{{ round($skorAkhirMitra, 2) }}"></div>
            <div class="my-3">
                <div class="d-flex justify-content-around">
                    <div class="d-flex align-items-center lh-1 mb-3 mb-sm-0">
                        <span class="badge badge-dot bg-success me-2"></span> Level Maturitas
                    </div>
                    <div class="d-flex align-items-center lh-1 mb-3 mb-sm-0">
                        <span class="badge badge-dot bg-label-secondary me-2"></span> Total Level Maturitas
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
