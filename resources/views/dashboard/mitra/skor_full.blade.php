<div class="card shadow-lg">
    <div class="row row-bordered g-0">
        <div class="col-lg-8 col-md-7">
            <h5 class="card-header m-0 me-2 pb-3 fw-semibold text-primary">Ringkasan Level Maturitas Self Assesment</h5>
            <div id="ringkasanskor" class="px-2"></div>
            <div id="skordimensi" skord1="{{ round($skord1, 2) }}" skord2="{{ round($skord2, 2) }}" skord3="{{ round($skord3, 2) }}" skord4="{{ round($skord4, 2) }}" skord5="{{ round($skord5, 2) }}"></div>

        </div>
        <div class="col-lg-4 col-md-5">
            <h5 class="card-header m-0 me-2 pb-3 fw-semibold text-primary">Perbandingan Level</h5>
            <div id="performanceChart" class="px-2"></div>

        </div>
    </div>
</div>
