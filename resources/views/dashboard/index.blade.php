@extends('layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-8 mb-4 order-0">
                @can('admin')
                    @include('dashboard.welcomeAdmin')
                @endcan
                @can('mitra')
                    @include('dashboard.welcomeMitra')
                @endcan
            </div>
            <div class="col-lg-4 col-md-4 order-1">
                {{-- @include('dashboard.stat1') --}}
            </div>
        </div>
        <div class="row">
            @include('dashboard.statKlaster')
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
