@extends('layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12">
                {{-- Deskrpsi Dimensi --}}
                <h4>Dimensi: {{ $dimensi->deskripsi }}</h4>
            </div>
            <div class="col-12 mb-4">
                <small class="text-light fw-semibold">Basic</small>
                <div class="bs-stepper wizard-numbered mt-2">
                    <div class="bs-stepper-header">
                        @foreach ($dimensi->param as $param)
                            <div class="step" data-target="{{ '#param' . $param->id }}">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label mt-1">
                        @endforeach
                        <span class="bs-stepper-title">Account Details</span>
                        <span class="bs-stepper-subtitle">Setup Account Details</span>
                        </span>
                        </button>
                    </div>
                    {{-- <div class="step" data-target="#personal-info">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle">2</span>
                                <span class="bs-stepper-label mt-1">
                                    <span class="bs-stepper-title">Personal Info</span>
                                    <span class="bs-stepper-subtitle">Add personal info</span>
                                </span>
                            </button>
                        </div> --}}
                </div>
                <div class="bs-stepper-content">
                    @foreach ($dimensi->param as $param)
                        <form onSubmit="return false">
                            <!-- Account Details -->
                            <div id="{{ 'param' . $param->id }}" class="content">
                                <div class="content-header mb-3">
                                    <h6 class="mb-0">Account Details</h6>
                                    <small>Enter Your Account Details.</small>
                                </div>
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="text" id="username" class="form-control" placeholder="johndoe" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" id="email" class="form-control" placeholder="john.doe@email.com" aria-label="john.doe" />
                                    </div>
                                    <div class="col-sm-6 form-password-toggle">
                                        <label class="form-label" for="password">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password2" />
                                            <span class="input-group-text cursor-pointer" id="password2"><i class="bx bx-hide"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 form-password-toggle">
                                        <label class="form-label" for="confirm-password">Confirm Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="confirm-password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="confirm-password2" />
                                            <span class="input-group-text cursor-pointer" id="confirm-password2"><i class="bx bx-hide"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-between">
                                        <button class="btn btn-label-secondary btn-prev" disabled>
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
                        </form>
                    @endforeach
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
