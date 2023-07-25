@extends('layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y ">
        <div class="card overflow-hidden pb-4">
            <div class="container-xl">
                <span class="text-capitalize text-wrap lh-sm badge bg-linkedin fs-6  text-start d-flex justify-content-start align-items-center my-3 ps-3">
                    Self Assessment <i class='bx bx-chevrons-right fs-3'></i> Dimensi <i class='bx bx-chevrons-right fs-3'></i>
                    <span class="fw-bold"> {{ $dimensi->deskripsi }}</span>
                </span>
                <div class="row g-5">
                    <div class="col-lg-6 mx-auto align-self-start">
                        <div class="card-body text-center">
                            @if (request('dimensi') == 1)
                                <h3 class="mb-5 fw-bold card-title">{{ $dimensi->deskripsi }}</h3>
                                <i class='bx bx-donate-heart text-linkedin' style="font-size:200px"></i>
                                <figure class="text-center mt-2">
                                    <blockquote class="blockquote">
                                        <p class="mb-0">Mengukur seberapa komprehensif program peningkatan skill manajemen risiko, kekuatan budaya manajemen risiko, serta relavansi RMA dengan praktik manajemen risiko secara keseluruhan</p>
                                    </blockquote>
                                    <figcaption class="blockquote-footer">
                                        <h6> Total Parameter : <cite>{{ $total = $dimensi->param->count() }}</cite></h6>
                                    </figcaption>
                                </figure>
                            @elseif (request('dimensi') == 2)
                                <h3 class="mb-5 fw-bold card-title">{{ $dimensi->deskripsi }}</h3>
                                <i class='bx bx-universal-access text-linkedin' style="font-size:200px"></i>
                                <figure class="text-center mt-2">
                                    <blockquote class="blockquote">
                                        <p class="mb-0">
                                            Mengukur kelengkapan organ, fungsi serta tugas dan tanggung jawab beserta kapasitas dari pengelola risiko sesuai dengan karakter perusahaan, serta tata kelola penerapan manajemen risiko
                                        </p>
                                    </blockquote>
                                    <figcaption class="blockquote-footer">
                                        <h6>Total Parameter : <cite>{{ $dimensi->param->count() }}</cite> </h6>
                                    </figcaption>
                                </figure>
                            @elseif (request('dimensi') == 3)
                                <h3 class="mb-5 fw-bold card-title">{{ $dimensi->deskripsi }}</h3>
                                <i class='bx bx-shape-circle text-linkedin' style="font-size:200px"></i>
                                <figure class="text-center mt-2">
                                    <blockquote class="blockquote">
                                        <p class="mb-0">
                                            Mengukur efektifitas praktik manajemen risiko, kerangka kerja ERM dan kepatuhan serta relevansi ERM dengan perencanaan strategis
                                        </p>
                                    </blockquote>
                                    <figcaption class="blockquote-footer">
                                        <h6>Total Parameter : <cite>{{ $dimensi->param->count() }}</cite> </h6>
                                    </figcaption>
                                </figure>
                            @elseif (request('dimensi') == 4)
                                <h3 class="mb-5 fw-bold card-title">{{ $dimensi->deskripsi }}</h3>
                                <i class='bx bx-shield-quarter text-linkedin' style="font-size:200px"></i>
                                <figure class="text-center mt-2">
                                    <blockquote class="blockquote">
                                        <p class="mb-0">
                                            Mengukur tingkat efektifitas dan formalisasi prosedur penerapan dan kontrol manajemen risiko
                                        </p>
                                    </blockquote>
                                    <figcaption class="blockquote-footer">
                                        <h6>Total Parameter : <cite>{{ $dimensi->param->count() }}</cite> </h6>
                                    </figcaption>
                                </figure>
                            @elseif (request('dimensi') == 5)
                                <h3 class="mb-5 fw-bold card-title">{{ $dimensi->deskripsi }}</h3>
                                <i class='bx bx-code-alt text-linkedin' style="font-size:200px"></i>
                                <figure class="text-center mt-2">
                                    <blockquote class="blockquote">
                                        <p class="mb-0">
                                            Mengukur kesiapan dan ketersediaan data, teknologi, dan model dalam penerapan manajemen risiko
                                        </p>
                                    </blockquote>
                                    <figcaption class="blockquote-footer">
                                        <h6>Total Parameter : <cite>{{ $dimensi->param->count() }}</cite> </h6>
                                    </figcaption>
                                </figure>
                            @endif
                            @if (auth()->user()->myprofile->role == 'mitra')
                                <a class="mt-2 btn btn-linkedin" href="{{ route('parameter.index') . '?dimensi=' . $dimensi->id . '&param=' . $dimensi->param->first()->id }}">Mulai</a>
                            @elseif (auth()->user()->myprofile->role == 'warga')
                                <a class="mt-2 btn btn-linkedin" href="{{ route('qa.index') . '?dimensi=' . $dimensi->id . '&param=' . $dimensi->param->first()->id }}">Mulai</a>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-5 border-start border-secondary">
                        <div class="card shadow-none bg-danger text-center text-white">
                            <div class="card-header pb-1 pt-2">
                                <p class="p-0 m-0 fw-bold fs-6 ">Level 1 - Fase Awal (Initial Phase)</p>
                            </div>
                            <hr class="p-0 m-0">
                            <div class="card-body py-2">
                                <small>Mencerminkan kondisi penerapan manajemen risiko masih sangat terbatas sehingga tidak diketahui keterkaitan antara sistem pengendalian yang ada terhadap risiko-risiko yang mempengaruhi kinerja organisasi</small>
                            </div>
                        </div>
                        <div class="card shadow-none bg-linkedin text-center text-white mt-3">
                            <div class="card-header pb-1 pt-2">
                                <p class="p-0 m-0 fw-bold fs-6 ">Level 2 - Fase Berkembang (Emerging Phase)</p>
                            </div>
                            <hr class="p-0 m-0">
                            <div class="card-body py-2">
                                <small>Mencerminkan kondisi bahwa perusahaan memiliki sistem pengendalian yang cukup tetapi belum seluruhnya</small>
                            </div>
                        </div>
                        <div class="card shadow-none bg-success text-center text-white mt-3">
                            <div class="card-header pb-1 pt-2">
                                <p class="p-0 m-0 fw-bold fs-6 ">Level 3 - Fase Praktik yang Baik (Good Practice Phase)</p>
                            </div>
                            <hr class="p-0 m-0">
                            <div class="card-body py-2">
                                <small>Mencerminkan kondisi bahwa perusahaan memiliki sistem pengendalian yang cukup baik</small>
                            </div>
                        </div>
                        <div class="card shadow-none bg-info text-center text-white mt-3">
                            <div class="card-header pb-1 pt-2">
                                <p class="card-title p-0 m-0 fw-bold fs-6 ">Level 4 - Fase Praktik Lebih Baik (Strong Practice Phase)</p>
                            </div>
                            <hr class="p-0 m-0">
                            <div class="card-body py-2">
                                <small>Mencerminkan kondisi di mana perusahaan telah menerapkan manajemen risiko dengan perbaikan terus-menerus sebagai bukti perusahaan telah proaktif dalam penerapan manajemen risiko</small>
                            </div>
                        </div>
                        <div class="card shadow-none bg-primary text-center text-white mt-3">
                            <div class="card-header pb-1 pt-2">
                                <p class="card-title p-0 m-0 fw-bold fs-6 ">Level 5 - Fase Praktik Terbaik (Best Practice Phase)</p>
                            </div>
                            <hr class="p-0 m-0">
                            <div class="card-body py-2">
                                <small>Mencerminkan kondisi di mana perusahaan telah menempatkan manajemen risiko sebagai pendorong untuk menjadi nilai tambah bagi perusahaan dan menjadi dasar setiap pengambilan keputusan dengan memperhitungkan setiap peluang yang ada</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
