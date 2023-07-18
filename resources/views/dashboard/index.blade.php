@extends('layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-8 mb-4 order-0">
                @can('admin')
                    @include('dashboard.welcome.welcomeAdmin')
                @endcan
                @can('mitra')
                    @include('dashboard.welcome.welcomeMitra')
                @endcan
                @can('warga')
                    @include('dashboard.welcome.welcomeWarga')
                @endcan
            </div>
            <div class="col-lg-4 col-md-4 order-1">
                <div class="col-lg-8 col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            @can('mitra')
                                <div class="card-title text-warning fs-4 fw-semibold">
                                    Skor Sementara
                                </div>
                                <p class="text-white fs-2 fw-bold bg-primary rounded-1 d-inline  py-2 px-3">
                                    {{ round($skorAkhirMitra, 2) }}
                                </p>
                            @endcan
                            @can('warga')
                                <div class="card-title text-warning fs-4 fw-semibold">
                                    Skor Sementara
                                </div>
                                <p class="text-white fs-2 fw-bold bg-primary rounded-1 d-inline py-2 px-3">
                                    {{ round($skorAkhirWarga, 2) }}
                                </p>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
    @push('vendorcss')
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    @endpush
    @push('vendorjs')
        <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    @endpush
    @push('pagejs')
        <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
    @endpush
@endsection
