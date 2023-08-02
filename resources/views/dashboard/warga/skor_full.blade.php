<div class="card shadow-lg" style="background-color:rgba(255,255,255,0.9);">
    <div class="row row-bordered g-0">
        <div class="col-lg-8 col-md-7">
            <h5 class="card-header m-0 me-2 pb-3 fw-semibold text-primary">Ringkasan Level Maturitas Self Assesment</h5>
            <div id="ringkasanskor" class="px-2"></div>
            <div id="skordimensi" skord1sa="{{ round($skord1sa, 2) }}" skord2sa="{{ round($skord2sa, 2) }}" skord3sa="{{ round($skord3sa, 2) }}" skord4sa="{{ round($skord4sa, 2) }}" skord5sa="{{ round($skord5sa, 2) }}" skord1qa="{{ round($skord1qa, 2) }}" skord2qa="{{ round($skord2qa, 2) }}" skord3qa="{{ round($skord3qa, 2) }}" skord4qa="{{ round($skord4qa, 2) }}" skord5qa="{{ round($skord5qa, 2) }}"></div>

        </div>
        <div class="col-lg-4 col-md-5">
            <h5 class="card-header m-0 me-2 pb-3 fw-semibold text-primary">Perbandingan Level</h5>
            <div id="performanceChart" class="px-2"></div>

        </div>
    </div>
</div>
