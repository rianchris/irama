@extends('layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item me-3">
                <a class="nav-link active" href="{{ route('setparam.index') }}"><i class='bx bx-left-arrow-alt'></i> Data Parameter</a>
            </li>
        </ul>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if (session()->has('success'))
                        <div class="alert alert-primary my-3 mx-3 alert-dismissible" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session()->has('deleted'))
                        <div class="alert alert-danger my-3 mx-3 alert-dismissible" role="alert">
                            {{ session('deleted') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="post" action="{{ route('setparam.update', $param->id) }}">
                            @csrf
                            @method('put')
                            <h5 class="">Rincian Parameter : {{ $param->id }}</h5>

                            <div class="row g-3 mt-3">
                                <label class="col-sm-2 col-form-label" for="dimensi">Dimensi</label>
                                <div class="col-lg-6 col-md-8 col-sm-12">
                                    <select id="dimensi" class="form-select" name="dimensi">
                                        <option>Pilih Dimensi</option>
                                        @foreach ($dimensi as $dimensi)
                                            <option value="{{ $dimensi->id }}" @if ($param->dimensi_id == $dimensi->id) selected @endif>{{ $dimensi->deskripsi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label class="col-sm-2 col-form-label" for="tujuan">Tujuan</label>
                                <div class="col-lg-6 col-md-8 col-sm-12">
                                    <textarea id="tujuan" class="form-control" name="tujuan" rows="2">{{ $param->tujuan }}</textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label class="col-sm-2 col-form-label" for="deskripsi">Deskripsi</label>
                                <div class="col-lg-6 col-md-8 col-sm-12">
                                    <textarea id="deskripsi" class="form-control" name="deskripsi" rows="2">{{ $param->deskripsi }}</textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label class="col-sm-2 col-form-label" for="referensi">Referensi</label>
                                <div class="col-lg-6 col-md-8 col-sm-12">
                                    <textarea id="referensi" class="form-control" name="ref" rows="2">{{ $param->ref }}</textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label class="col-sm-2 col-form-label" for="pertanyaan">Pertanyaan</label>
                                <div class="col-lg-6 col-md-8 col-sm-12">
                                    <textarea id="pertanyaan" class="form-control" name="pertanyaan" rows="2">{{ $param->pertanyaan }}</textarea>
                                </div>
                            </div>
                            <hr class="my-4 mx-n4" />
                            <h5>Deskripsi Skor Parameter : {{ $param->id }}</h5>
                            <div class="row mt-2">
                                <label class="col-sm-2 col-form-label" for="skor0">Skor 0</label>
                                <div class="col-lg-6 col-md-8 col-sm-12">
                                    <textarea id="skor0" class="form-control" name="skor0" rows="2">{{ $param->deskripsiskor->first()->skor0 }}</textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label class="col-sm-2 col-form-label" for="skor1">Skor 1</label>
                                <div class="col-lg-6 col-md-8 col-sm-12">
                                    <textarea id="skor1" class="form-control" name="skor1" rows="2">{{ $param->deskripsiskor->first()->skor1 }}</textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label class="col-sm-2 col-form-label" for="skor2">Skor 2</label>
                                <div class="col-lg-6 col-md-8 col-sm-12">
                                    <textarea id="skor2" class="form-control" name="skor2" rows="2">{{ $param->deskripsiskor->first()->skor2 }}</textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label class="col-sm-2 col-form-label" for="skor3">Skor 3</label>
                                <div class="col-lg-6 col-md-8 col-sm-12">
                                    <textarea id="skor3" class="form-control" name="skor3" rows="2">{{ $param->deskripsiskor->first()->skor3 }}</textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label class="col-sm-2 col-form-label" for="skor4">Skor 4</label>
                                <div class="col-lg-6 col-md-8 col-sm-12">
                                    <textarea id="skor4" class="form-control" name="skor4" rows="2">{{ $param->deskripsiskor->first()->skor4 }}</textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label class="col-sm-2 col-form-label" for="skor5">Skor 5</label>
                                <div class="col-lg-6 col-md-8 col-sm-12">
                                    <textarea id="skor5" class="form-control" name="skor5" rows="2">{{ $param->deskripsiskor->first()->skor5 }}</textarea>
                                </div>
                            </div>

                            <div class="pt-4 text-center">
                                <button type="submit" class="btn btn-primary me-sm-3 me-1">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->

    @push('vendorcss')
    @endpush

    @push('vendorjs')
        <script src="{{ asset('assets/vendor/libs/autosize/autosize.js') }}"></script>
    @endpush

    @push('pagejs')
    @endpush
    <!-- Ineline JS-->.
    @push('inlinejs')
        <script>
            $(document).ready(function() {
                $('#set_param').DataTable();
            });
            const textarea = document.querySelectorAll('textarea');
            if (textarea) {
                autosize(textarea);
            }
        </script>
    @endpush
@endsection
