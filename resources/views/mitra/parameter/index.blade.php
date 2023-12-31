@extends('layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card" style="background-color:rgba(255,255,255,0.9);">
            <div class="container-xl">
                <span class="text-capitalize text-wrap lh-sm badge bg-primary fs-6  text-start d-flex justify-content-start align-items-center mt-3 ps-3">
                    Self Assessment <i class='bx bx-chevrons-right fs-3'></i> Dimensi <i class='bx bx-chevrons-right fs-3'></i>
                    <span class="fw-bold"> {{ $dimensi->deskripsi }}</span>
                </span>
                <div class="row">
                    {{-- ambil data pivot parameter --}}
                    @php
                        $role = auth()->user()->myprofile->role;
                        if ($role == 'mitra') {
                            $tes = $pengguna->buMitra->param->where('id', request('param'))->isNotEmpty();
                            if ($tes) {
                                $pivot = $pengguna->buMitra->param->where('id', request('param'))->first()->pivot;
                                $buparams = $buparam;
                            }
                        } elseif ($role == 'warga') {
                            $tes = $pengguna->buWarga->param->where('id', request('param'))->isNotEmpty();
                            if ($tes) {
                                $pivot = $pengguna->buWarga->param->where('id', request('param'))->first()->pivot;
                                $buparams = $buparam;
                            }
                        }
                        $deskripsiskor = $param
                            ->where('id', request('param'))
                            ->first()
                            ->deskripsiskor->first();
                        // dd($tes);
                    @endphp

                    <div class="demo-vertical-spacing m-0">
                        @foreach ($param as $p)
                            @can('mitra')
                                @php
                                    $url = route('parameter.index') . '?dimensi=' . $p->dimensi_id . '&param=' . $p->id;
                                @endphp
                                <a href="{{ $url }}" type="button" class="btn border-secondary text-secondary px-3 py-1 me-1
                                   @if (Request::is('parameter') && Request::query('dimensi') == $p->dimensi_id && Request::query('param') == $p->id) bg-primary text-white border-primary px-4 py-2
                                   @else text-secondary btn-outline-secondary @endif">
                                    {{ $p->id }}
                                </a>
                            @endcan
                            @can('warga')
                                @php
                                    $url = route('qa.index') . '?dimensi=' . $p->dimensi_id . '&param=' . $p->id;
                                @endphp
                                <a href="{{ $url }}" type="button" class="btn border-secondary text-secondary px-3 py-1 me-1
                                   @if (Request::is('qa') && Request::query('dimensi') == $p->dimensi_id && Request::query('param') == $p->id) bg-primary text-white border-primary px-4 py-2
                                   @else text-secondary btn-outline-secondary @endif">
                                    {{ $p->id }}
                                </a>
                            @endcan
                        @endforeach
                        {{-- <hr class="my-1 pb-3"> --}}
                    </div>
                </div>

                @if (session()->has('success'))
                    <div class="mt-2 alert alert-success alert-dismissible" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif (session()->has('error'))
                    <div class="mt-2 alert alert-danger alert-dismissible" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- Form Input Parameter --}}

                <form action="{{ route('parameter.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="bu_param_id" value="@if (isset($buparams->id)) {{ $buparams->id }} @endif">
                    @if ($role == 'mitra')
                        <input type="hidden" name="bu_id" value="{{ auth()->user()->myprofile->buMitra->id }}">
                    @endif
                    <input type="hidden" name="dimensi_id" value="{{ request('dimensi') }}">
                    <input type="hidden" name="param_id" value="{{ request('param') }}">
                    <div class="card-body border rounded my-3">
                        <div class="row  pt-2 g-5">
                            <div class="col-lg-7  col-md-6 me-auto">
                                <div class="card-body p-0">
                                    <figure class="text-start">
                                        <blockquote class="blockquote">
                                            <h4 class="card-title text-dark">
                                                {{ $param->where('id', request('param'))->first()->id . '. ' }}

                                                {{ $param->where('id', request('param'))->first()->deskripsi }}
                                            </h4>
                                        </blockquote>
                                        <figcaption class="blockquote-footer">
                                            <h6 class="mb-3 lh-3">Tujuan: {{ $param->where('id', request('param'))->first()->tujuan }}</h6>
                                            <h6 class="mb-3 lh-3">Referensi: {{ $param->where('id', request('param'))->first()->ref }}</h6>
                                            <h6 class="mb-3 lh-3">Pertanyaan: {{ $param->where('id', request('param'))->first()->pertanyaan }}</h6>
                                        </figcaption>
                                    </figure>
                                    <div class="text-center">
                                        <span class="mt-3 badge rounded-pill bg-warning">Skor:
                                            @if (isset($pivot))
                                                {{ $pivot->skor_mitra }}
                                            @endif
                                        </span>
                                    </div>
                                    <div class="demo-inline-spacing d-flex justify-content-between align-items-center mb-2">
                                        <p class="fw-semibold">Data Umum:</p>
                                    </div>
                                    <div class="row">

                                        @php
                                            if (isset($buparam)) {
                                                $buparam = [$buparam->du1, $buparam->du2, $buparam->du3, $buparam->du4, $buparam->du5, $buparam->du6, $buparam->du7, $buparam->du8, $buparam->du9, $buparam->du10, $buparam->du11, $buparam->du12];
                                            }
                                        @endphp
                                        @foreach ($dataumum as $datas)
                                            <div class="col-lg-6 col-md-12 col-sm-6 mb-md-2 mb-2">
                                                <div class="form-check custom-option custom-option-basic">
                                                    <label class="form-check-label custom-option-content py-2" for="{{ $datas->deskripsi }}">
                                                        <input class="form-check-input" name="{{ 'du' . $loop->iteration }}" type="checkbox" value="1" id="{{ $datas->deskripsi }}" @if ($pengguna->role == 'warga') disabled @endif @if (isset($buparam[$loop->iteration - 1])) @if ($buparam[$loop->iteration - 1] == 1) checked @endif @endif />
                                                        <span class="custom-option-header">
                                                            <small> <span class="fw-semibold mb-0">{{ $datas->deskripsi }}</span></small>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6 me-auto">
                                <div class="card-body p-0">
                                    <p class="fw-semibold mb-2">Skor:</p>
                                    <div class="form-check custom-option custom-option-basic">
                                        <label class="form-check-label custom-option-content py-2" for="{{ $deskripsiskor->id . 'a' }}">
                                            <input name="skor" class="form-check-input" type="radio" value="1" id="{{ $deskripsiskor->id . 'a' }}" @if (isset($pivot->skor_mitra)) @if ($pivot->skor_mitra == 1) checked @endif @endif @can('warga') disabled @endcan @can('warga') disabled @endcan />
                                            <span class="custom-option-body">
                                                <span class="custom-option-header">
                                                    <span class="align-self-start me-2 text-start">1.</span> {{ $deskripsiskor->skor1 }}</span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class=" form-check custom-option custom-option-basic mt-2">
                                        <label class="form-check-label custom-option-content py-2" for="{{ $deskripsiskor->id . 'b' }}">
                                            <input name="skor" class="form-check-input" type="radio" value="2" id="{{ $deskripsiskor->id . 'b' }}" @if (isset($pivot->skor_mitra)) @if ($pivot->skor_mitra == 2) checked @endif @endif @can('warga') disabled @endcan/>
                                            <span class="custom-option-body">
                                                <span class="custom-option-header">
                                                    <span class="align-self-start me-2">2.</span> {{ $deskripsiskor->skor2 }}</span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check custom-option custom-option-basic mt-2">
                                        <label class="form-check-label custom-option-content py-2" for="{{ $deskripsiskor->id . 'c' }}">
                                            <input name="skor" class="form-check-input" type="radio" value="3" id="{{ $deskripsiskor->id . 'c' }}" @if (isset($pivot->skor_mitra)) @if ($pivot->skor_mitra == 3) checked @endif @endif @can('warga') disabled @endcan/>
                                            <span class="custom-option-body">
                                                <span class="custom-option-header">
                                                    <span class="align-self-start me-2">3.</span> {{ $deskripsiskor->skor3 }}</span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check custom-option custom-option-basic mt-2">
                                        <label class="form-check-label custom-option-content py-2" for="{{ $deskripsiskor->id . 'd' }}">
                                            <input name="skor" class="form-check-input" type="radio" value="4" id="{{ $deskripsiskor->id . 'd' }}" @if (isset($pivot->skor_mitra)) @if ($pivot->skor_mitra == 4) checked @endif @endif @can('warga') disabled @endcan/>
                                            <span class="custom-option-body">
                                                <span class="custom-option-header">
                                                    <span class="align-self-start me-2">4.</span> {{ $deskripsiskor->skor4 }}</span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check custom-option custom-option-basic mt-2">
                                        <label class="form-check-label custom-option-content py-2" for="{{ $deskripsiskor->id . 'e' }}">
                                            <input name="skor" class="form-check-input" type="radio" value="5" id="{{ $deskripsiskor->id . 'e' }}" @if (isset($pivot->skor_mitra)) @if ($pivot->skor_mitra == 5) checked @endif @endif @can('warga') disabled @endcan/>
                                            <span class="custom-option-body">
                                                <span class="custom-option-header">
                                                    <span class="align-self-start me-2">5.</span> {{ $deskripsiskor->skor5 }}</span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-12 col-form-label  text-capitalize fs-6" for="catatan">Catatan: </label>
                                    <div class="col-12">
                                        <textarea id="catatan" class="form-control" name="catatan" rows="3" @can('warga')readonly @endcan>{{ isset($pivot->catatan) ? $pivot->catatan : '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row mt-5">
                            @can('mitra')
                                <div class="col text-center">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </div>
                            @endcan
                        </div>
                    </div>
                </form>
                {{-- End Form Input Parameter --}}

                {{-- Quality Assurance --}}
                @can('warga')
                    <form action="{{ route('qa.update', isset($buparams->id) ? $buparams->id : '') }}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="bu_param_id" value="@if (isset($buparams->id)) {{ $buparams->id }} @endif">
                        @can('mitra')
                            <input type="hidden" name="bu_id" value="{{ auth()->user()->myprofile->buMitra->id }}">
                        @endcan
                        @can('warga')
                            <input type="hidden" name="bu_id" value="{{ auth()->user()->myprofile->buWarga->id }}">
                        @endcan
                        <input type="hidden" name="param_id" value="{{ request('param') }}">
                        <hr class="m-0">
                        <div class="row">
                            <div class="col">
                                <div class="card-body px-0">
                                    <h5 class="card-title text-center text-primary"><i class='bx bx-check-shield bx-sm me-2'></i>Quality Assurance</h5>
                                    <div class="row mt-2">
                                        <div class="col-lg-6 mt-3">
                                            <div class="row">
                                                <label class="col-lg-3 col-md-2 col-sm-3 col-form-label" for="hasilReviu">Hasil Reviu</label>
                                                <div class="col-lg-9 col-md-10 col-sm-9">
                                                    <textarea id="hasilReviu" class="form-control" name="hasilreviu" rows="3">{{ isset($pivot->hasilreviu) ? $pivot->hasilreviu : '' }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mt-3">
                                            <div class="form-check custom-option custom-option-basic border-0">
                                                <div class="row g-2 d-flex justify-content-between">
                                                    <div class="col-lg-2 col-md-4 col-6 px-1">
                                                        <div class="form-check custom-option custom-option-icon">
                                                            <label class="form-check-label custom-option-content" for="skorwarga0">
                                                                <span class="custom-option-body">
                                                                    <span class="custom-option-title">N/A</span>
                                                                </span>
                                                                <input name="skor_warga" class="form-check-input" type="radio" value="0" id="skorwarga0" @if (isset($pivot->skor_warga)) @if ($pivot->skor_warga == 0) checked @endif @endif />
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col-md-4 col-6 px-1">
                                                        <div class="form-check custom-option custom-option-icon">
                                                            <label class="form-check-label custom-option-content" for="skorwarga1">
                                                                <span class="custom-option-body">
                                                                    <span class="custom-option-title">1</span>
                                                                </span>
                                                                <input name="skor_warga" class="form-check-input" type="radio" value="1" id="skorwarga1" @if (isset($pivot->skor_warga)) @if ($pivot->skor_warga == 1) checked @endif @endif />
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col-md-4 col-6 px-1">
                                                        <div class="form-check custom-option custom-option-icon">
                                                            <label class="form-check-label custom-option-content" for="skorwarga2">
                                                                <span class="custom-option-body">
                                                                    <span class="custom-option-title">2</span>
                                                                </span>
                                                                <input name="skor_warga" class="form-check-input" type="radio" value="2" id="skorwarga2" @if (isset($pivot->skor_warga)) @if ($pivot->skor_warga == 2) checked @endif @endif />
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col-md-4 col-6 px-1">
                                                        <div class="form-check custom-option custom-option-icon">
                                                            <label class="form-check-label custom-option-content" for="skorwarga3">
                                                                <span class="custom-option-body">
                                                                    <span class="custom-option-title">3</span>
                                                                </span>
                                                                <input name="skor_warga" class="form-check-input" type="radio" value="3" id="skorwarga3" @if (isset($pivot->skor_warga)) @if ($pivot->skor_warga == 3) checked @endif @endif />
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col-md-4 col-6 px-1">
                                                        <div class="form-check custom-option custom-option-icon">
                                                            <label class="form-check-label custom-option-content" for="skorwarga4">
                                                                <span class="custom-option-body">
                                                                    <span class="custom-option-title">4</span>
                                                                </span>
                                                                <input name="skor_warga" class="form-check-input" type="radio" value="4" id="skorwarga4" @if (isset($pivot->skor_warga)) @if ($pivot->skor_warga == 4) checked @endif @endif />
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col-md-4 col-6 px-1">
                                                        <div class="form-check custom-option custom-option-icon">
                                                            <label class="form-check-label custom-option-content" for="skorwarga5">
                                                                <span class="custom-option-body">
                                                                    <span class="custom-option-title">5</span>
                                                                </span>
                                                                <input name="skor_warga" class="form-check-input" type="radio" value="5" id="skorwarga5" @if (isset($pivot->skor_warga)) @if ($pivot->skor_warga == 5) checked @endif @endif />
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col d-flex justify-content-center">
                                            <button class="btn btn-primary" type="submit">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @endcan
                {{-- End Quality Asssurance  --}}
            </div>
        </div>
    </div>

    @push('vendorcss')
    @endpush

    @push('vendorjs')
        <script src="{{ asset('assets/vendor/libs/autosize/autosize.js') }}"></script>
    @endpush

    @push('pagejs')
        {{-- <script src="{{ asset('assets/js/app-user-list.js') }}"></script> --}}
    @endpush
    @push('inlinejs')
        <script>
            const textarea = document.querySelectorAll('textarea');
            if (textarea) {
                autosize(textarea);
            }

            // Check selected custom option
            window.Helpers.initCustomOptionCheck();
        </script>
    @endpush
@endsection
