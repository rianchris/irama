@extends('layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card overflow-hidden">
            <!-- Popular Articles -->
            <div class="help-center-popular-articles py-5">
                <div class="container-xl">
                    <h3 class="text-center mt-2 mb-4">Dimensi : {{ $dimensi->deskripsi }}</h3>
                    <div class="row">
                        <div class="col-lg-10 mx-auto">
                            <div class="row mb-3 d-flex justify-content-center">
                                <div class="col-md-4 mb-md-0 mb-4 ">
                                    <div class="card border shadow-none">
                                        <div class="card-body text-center">
                                            <img class="mb-3" src="../../assets/img/icons/unicons/rocket.png" height="60" alt="Help center articles" />
                                            <h5>Getting Started</h5>
                                            <p>Whether you're new or you're a power user, this article will…</p>

                                            <a class="btn btn-label-primary" href="{{ route('parameter.index') . '?dimensi=' . $dimensi->id . '&param=' . $dimensi->param->first()->id }}">Mulai</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Popular Articles -->
        </div>
    </div>
@endsection
