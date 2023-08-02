<div class="card h-100" style="background-color:rgba(255,255,255,0.9);">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center text-primary fw-semibold">
            <i class='bx bxs-award fs-1'></i>
            <span class="badge bg-label-primary fw-bold"> Level Maturitas</span>
            <i class='bx bxs-award fs-1'></i>
            @if (floor($skorAkhirWarga) == 1)
                <div id="level_warga" hidden data-level_warga="Naive"></div>
            @elseif(floor($skorAkhirWarga) == 2)
                <div id="level_warga" hidden data-level_warga="Aware"></div>
            @elseif(floor($skorAkhirWarga) == 3)
                <div id="level_warga" hidden data-level_warga="Defined"></div>
            @elseif(floor($skorAkhirWarga) == 4)
                <div id="level_warga" hidden data-level_warga="Managed"></div>
            @elseif(floor($skorAkhirWarga) == 5)
                <div id="level_warga" hidden data-level_warga="Enabled"></div>
            @endif
        </div>
        <div id="skor_akhir_warga" data-skor="{{ round($skorAkhirWarga, 2) }}"></div>
    </div>
</div>
