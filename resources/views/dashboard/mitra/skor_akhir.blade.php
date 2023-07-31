<div class="card h-100">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center text-primary fw-semibold">
            @if (floor($skorAkhirMitra) == 1)
                <i class='bx bxs-award fs-1'></i>
                <span class="badge bg-label-primary"> Niave</span>
                <i class='bx bxs-award fs-1'></i>
            @elseif(floor($skorAkhirMitra) == 2)
                <i class='bx bxs-award fs-1'></i>
                <span class="badge bg-label-primary"> Aware</span>
                <i class='bx bxs-award fs-1'></i>
            @elseif(floor($skorAkhirMitra) == 3)
                <i class='bx bxs-award fs-1'></i>
                <span class="badge bg-label-primary"> Defined</span>
                <i class='bx bxs-award fs-1'></i>
            @elseif(floor($skorAkhirMitra) == 4)
                <i class='bx bxs-award fs-1'></i>
                <span class="badge bg-label-primary"> Managed</span>
                <i class='bx bxs-award fs-1'></i>
            @elseif(floor($skorAkhirMitra) == 5)
                <i class='bx bxs-award fs-1'></i>
                <span class="badge bg-label-primary"> Enabled</span>
                <i class='bx bxs-award fs-1'></i>
            @endif

        </div>
        <div id="salesStats" data-skor="{{ round($skorAkhirMitra, 2) }}"></div>
        <div class="d-flex justify-content-between bottom-0">
            <div class="d-flex align-items-center lh-1 mb-sm-0">
                <span class="badge badge-dot bg-primary me-2"></span> Level Maturitas
            </div>
            <div class="d-flex align-items-center lh-1 mb-sm-0">
                <span class="badge badge-dot bg-label-secondary me-2"></span> Total Level Maturitas
            </div>
        </div>
    </div>
</div>
