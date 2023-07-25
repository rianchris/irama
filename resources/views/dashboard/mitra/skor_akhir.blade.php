<div class="card h-100">
    <div class="card-body">
        <div class="text-center text-primary fw-semibold">
            @if (floor($skorAkhirMitra) == 1)
                <div class="fw-semibold">
                    <i class='bx bxs-award fs-1'></i>
                    <span class="badge bg-label-primary"> Niave</span>
                    <i class='bx bxs-award fs-1'></i>
                </div>
            @elseif(floor($skorAkhirMitra) == 2)
                <div class="fw-semibold">
                    <i class='bx bxs-award fs-1'></i>
                    <span class="badge bg-label-primary"> Aware</span>
                    <i class='bx bxs-award fs-1'></i>
                </div>
            @elseif(floor($skorAkhirMitra) == 3)
                <div class="fw-semibold">
                    <i class='bx bxs-award fs-1'></i>
                    <span class="badge bg-label-primary"> Defined</span>
                    <i class='bx bxs-award fs-1'></i>
                </div>
            @elseif(floor($skorAkhirMitra) == 4)
                <div class="fw-semibold">
                    <i class='bx bxs-award fs-1'></i>
                    <span class="badge bg-label-primary"> Managed</span>
                    <i class='bx bxs-award fs-1'></i>
                </div>
            @elseif(floor($skorAkhirMitra) == 5)
                <div class="fw-semibold">
                    <i class='bx bxs-award fs-1'></i>
                    <span class="badge bg-label-primary"> Enabled</span>
                    <i class='bx bxs-award fs-1'></i>
                </div>
            @endif

        </div>


        <div id="salesStats" data-skor="{{ round($skorAkhirMitra, 2) }}"></div>
        <div class="mt-">
            <div class="d-flex justify-content-around">
                <div class="d-flex align-items-center lh-1 mb-sm-0">
                    <span class="badge badge-dot bg-primary me-2"></span> Level Maturitas
                </div>
                <div class="d-flex align-items-center lh-1 mb-sm-0">
                    <span class="badge badge-dot bg-label-secondary me-2"></span> Total Level Maturitas
                </div>
            </div>
        </div>
    </div>
</div>
