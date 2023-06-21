@extends('layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12">
                {{-- Deskrpsi Dimensi --}}
                <h4>Dimensi: {{ $dimensi->deskripsi }}</h4>
            </div>

            <!-- Default Wizard -->
            <div class="col-12 mb-4">
                {{-- <small class="text-light fw-semibold">Basic</small> --}}
                <div class="bs-stepper wizard-numbered">
                    <div class="bs-stepper-header" role="tablist">
                        {{-- Tab Paramater --}}
                        @foreach ($dimensi->param as $param)
                            <div class="step" data-target="{{ '#parameter' . $param->id }}">
                                <button type="button" class="step-trigger  p-0">
                                    <span class="bs-stepper-circle">{{ $param->id }}</span>
                                </button>
                            </div>
                        @endforeach
                    </div>
                    <div class="bs-stepper-content">
                        {{-- Form Paramater --}}
                        @foreach ($dimensi->param as $param)
                            <form id="form{{ $param->id }}" action="{{ route('parameter.update', $param->id) }}" method="post">
                                @csrf
                                @method('put')
                                {{-- @csrf --}}
                                <!-- Detail Paramater -->
                                <div id="{{ 'parameter' . $param->id }}" class="content">
                                    <div class="content-header mb-3">
                                        <h4 class="mb-2">Parameter: {{ $param->deskripsi }}</h4>
                                        {{ $param->pertanyaan }}
                                    </div>
                                    <!--  Radios Skor Parameter-->
                                    <div class="col-xl-12 mb-4">
                                        <div class="card shadow">
                                            <h5 class="card-header">Skor Parameter: </h5>
                                            <div class="card-body">
                                                <div class="row">
                                                    @foreach ($param->deskripsiskor->take(5) as $deskripsiskor)
                                                        <div class="col-md mb-md-0 mb-2">
                                                            <div class="form-check custom-option custom-option-icon">
                                                                <label class="form-check-label custom-option-content" for="{{ $deskripsiskor->id }}">
                                                                    <span class="custom-option-body">
                                                                        <span class="custom-option-title">{{ $loop->iteration }}</span>
                                                                        <small> {{ $deskripsiskor->deskripsi }}</small>
                                                                    </span>
                                                                    <input name="skor" class="form-check-input" type="radio" value="{{ $loop->iteration }}" id="{{ $deskripsiskor->id }}" @if ($deskripsiskor->param->skor == $loop->iteration) selected @endif />
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <!-- Perolehan Informasi -->
                                            {{-- @include('mitra.parameter.perolehan_informasi') --}}
                                            <!-- Custom Icon Checkbox -->
                                            <button type="submit" class="btn btn-success">
                                                <span class="align-middle d-sm-inline-block d-none me-sm-1">Save</span>
                                                <i class='bx bx-save'></i>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        @endforeach
                        <!-- /Custom Icon Radios -->
                        <div class="row g-3">
                            <div class="col-12 d-flex justify-content-between">
                                <button class="btn btn-label-secondary btn-prev">
                                    <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>

                                <button class="btn btn-primary btn-next">
                                    <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                    <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                                </button>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <!-- /Default Wizard -->

        </div>
        <hr class="container-m-nx mb-5" />
    </div>
    <!-- /Vertical Wizard -->
    </div>

    @push('vendorjs')
        <script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
    @endpush

    @push('pagejs')
        <script src="{{ asset('assets/js/form-wizard-numbered.js') }}"></script>
        <script src="{{ asset('assets/js/form-wizard-validation.js') }}"></script>
    @endpush

    @push('vendorcss')
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
    @endpush

    @push('inlinejs')
        {{-- <script>
            $(document).ready(function() {
                // Event listener for submit buttons
                $('button[type="submit"]').on('click', function(e) {
                    e.preventDefault(); // Prevent  default form submission

                    var form = $(this).closest('form'); // Find the parent form of the clicked button
                    var formId = form.attr('id'); // Get the ID of the form

                    // Perform additional validation or operations if needed

                    // Submit the corresponding form
                    form.submit();
                });
            });
        </script> --}}
    @endpush
@endsection
