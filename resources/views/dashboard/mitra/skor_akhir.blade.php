<div class="card h-100" style="background-color:rgba(255,255,255,0.7);">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center text-primary fw-semibold">
            <i class='bx bxs-award fs-1'></i>
            <span class="badge bg-label-primary fw-bold"> Level Maturitas</span>
            <i class='bx bxs-award fs-1'></i>
            @if (floor($skorAkhirMitra) == 1)
                <div id="level_mitra" hidden data-level_mitra="Naive"></div>
            @elseif(floor($skorAkhirMitra) == 2)
                <div id="level_mitra" hidden data-level_mitra="Aware"></div>
            @elseif(floor($skorAkhirMitra) == 3)
                <div id="level_mitra" hidden data-level_mitra="Defined"></div>
            @elseif(floor($skorAkhirMitra) == 4)
                <div id="level_mitra" hidden data-level_mitra="Managed"></div>
            @elseif(floor($skorAkhirMitra) == 5)
                <div id="level_mitra" hidden data-level_mitra="Enabled"></div>
            @endif

        </div>
        <div id="skor_akhir_mitra" data-skor="{{ round($skorAkhirMitra, 2) }}"></div>
        {{-- <div class="d-flex justify-content-between bottom-0">
            <div class="d-flex align-items-center lh-1 mb-sm-0">
                <span class="badge badge-dot bg-primary me-2"></span> Level Maturitas
            </div>
            <div class="d-flex align-items-center lh-1 mb-sm-0">
                <span class="badge badge-dot bg-label-secondary me-2"></span> Total Level Maturitas
            </div>
        </div> --}}
    </div>
</div>
