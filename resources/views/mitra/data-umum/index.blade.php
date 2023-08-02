@extends('layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Data Umum Perusahaan -->
        <div class="row g-3">
            <div class="col-xl-4 col-lg-5 col-md-5 ">
                <!-- Tentang Perusahaan  -->
                <div class="card mb-4 sticky-top" style="top:84px; right:900px; left:285px; bottom:30px; background-color:rgba(255,255,255,0.8)">
                    <div class="card-body">
                        <h5><small class="text-primary fw-bold text-uppercase">
                                Profil Perusahaan
                            </small></h5>
                        <ul class="list-unstyled mb-4 mt-3 text-primary">
                            <li class="d-flex align-items-center mb-3">
                                <i class='bx bx-rename'></i> <span class="fw-semibold mx-2">{{ $bu->sima_klpbu->nama_klpbu }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class='bx bx-rename'></i> <span class="fw-semibold mx-2">{{ $bu->klaster->nama_klaster }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class='bx bx-globe'></i><span class="fw-semibold mx-2">{{ $bu->website }} </span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class='bx bxs-business'></i></i><span class="fw-semibold mx-2">{{ $bu->alamat }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class='bx bx-building'></i></i><span class="fw-semibold mx-2">{{ $bu->kodepos }}</span>
                            </li>
                        </ul>
                        <hr>
                        <h5><small class="text-primary fw-bold text-uppercase">Kontak Perusahaan</small></h5>
                        <ul class="list-unstyled mb-4 mt-3 text-primary">
                            <li class="d-flex align-items-center mb-3">
                                <i class="bx bx-phone"></i><span class="fw-semibold mx-2">{{ $bu->phone }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="bx bx-envelope"></i><span class="fw-semibold mx-2">{{ $bu->email }}</span>
                            </li>
                        </ul>
                        <hr>
                        <h5><small class="text-primary fw-bold text-uppercase">PIC assessor</small></h5>
                        <ul class="list-unstyled mb-4 mt-3 text-primary">
                            <li class="d-flex align-items-center mb-3">
                                <i class="bx bx-user"></i><span class="fw-semibold mx-2">{{ $bu->myprofileMitra->name }}
                                    <small class="text-secondary">-Self Assessment</small>
                                </span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="bx bx-user"></i><span class="fw-semibold mx-2"?>{{ $bu->myprofileWarga->name }}
                                    <small class="text-secondary">-Quality Assurance</small>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--/ Tentang Perusahaan -->
            </div>
            <div class="col-xl-8 col-lg-7 col-md-7">
                <div class="card shadow-none" style="background-color:transparent !important">
                    {{-- <div class="card-body shadow-lg"> --}}
                    @if (session()->has('success'))
                        <div class="mt-2 alert alert-success alert-dismissible" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="row g-3">
                        @foreach ($datas as $datas)
                            @php
                                $update = 'update' . $datas->id;
                                $link = '';
                                $link = $bu->data[$datas->id - 1]->pivot->link ?? 'Tessa';
                                
                                $catatan = '';
                                $catatan = $bu->data[$datas->id - 1]->pivot->catatan ?? '';
                                $budatas_id = $budatas->where('data_id', $datas->id)->first();
                                // dd($loop->iteration - 1);
                            @endphp

                            <div class="col-lg-6">
                                <div class="card" style="background-color:rgba(255,255,255,0.9)">
                                    <div class="card-body">
                                        @if (session()->has($update))
                                            <div class="mt-2 alert alert-success alert-dismissible" role="alert">
                                                {{ session($update) }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @endif
                                        {{-- Form action jika sudah ada data maka update jika belum maka store --}}
                                        <form @if (isset($budatas_id)) action="{{ route('dataumum.update', $budatas_id->id) }}" @else action="{{ route('dataumum.store') }}" @endif method="post">
                                            @if (isset($budatas_id))
                                                @method('put')
                                            @endif
                                            @csrf
                                            @if ($myprofile->role == 'mitra')
                                                <input type="hidden" name="bu_id" value="{{ $bu->id }}">
                                            @endif
                                            <input type="hidden" name="data_id" value="{{ $datas->id }}">
                                            <div class="mb-4">
                                                {{-- {{ dd($budatas->where('data_id', $datas->id)->first()) }} --}}
                                                <small class="fw-bold mb-1">
                                                    {{ $datas->deskripsi }}
                                                </small>
                                                <div class="input-group input-group-merge mb-2">
                                                    <span id="{{ $datas->deskripsi }}" class="input-group-text">
                                                        <a href="{{ $link }}" target="blank"><i class="bx bx-link-alt"></i></a>
                                                    </span>
                                                    <input type="text" name="link" class="form-control" value="@if (isset($budatas->where('data_id', $datas->id)->first()->link)) {{ $budatas->where('data_id', $datas->id)->first()->link }} @endif" aria-describedby="{{ $datas->deskripsi }}" name="link" @if ($myprofile->role == 'warga') readonly @endif />
                                                </div>

                                                <div class="input-group input-group-merge mb-2">
                                                    <span id="{{ $datas->deskripsi . 'catatan' }}" class="input-group-text"><i class="bx bx-comment"></i></span>
                                                    <textarea rows="2" name="catatan" class="form-control" @if ($myprofile->role == 'warga') readonly @endif> @if (isset($budatas->where('data_id', $datas->id)->first()->catatan))
{{ $budatas->where('data_id', $datas->id)->first()->catatan }}
@endif </textarea>
                                                </div>
                                                <button type="submit" class="btn btn-sm btn-primary" @if ($myprofile->role == 'warga') disabled @endif>Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{-- </div> --}}

                    {{-- <div class="card-body">



                                    <div class="mb-3">
                                        <label for="du1" class="form-label">1. AD/ART Perusahaan</label>
                                        <div class="d-flex">
                                            <input type="text" class="form-control" id="du1" name="du1" />
                                            <button type="submit" class="ms-1 btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="du2" class="form-label">2. Annual Report Perusahaan</label>
                                        <div class="d-flex">
                                            <input type="text" class="form-control" id="du2" name="du2" />
                                            <button type="submit" class="ms-1 btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="du3" class="form-label">3. Risk Profile Perusahaan</label>
                                        <div class="d-flex">
                                            <input type="text" class="form-control" id="du3" name="du3" />
                                            <button type="submit" class="ms-1 btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="du4" class="form-label">4. Pedoman Manajemen Risiko</label>
                                        <div class="d-flex">
                                            <input type="text" class="form-control" id="du4" name="du4" />
                                            <button type="submit" class="ms-1 btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="du5" class="form-label">5. Laporan Pelaksanaan Manajemen Risiko</label>
                                        <div class="d-flex">
                                            <input type="text" class="form-control" id="du5" name="du5" />
                                            <button type="submit" class="ms-1 btn btn-primary">Simpan</button>
                                        </div>
                                        <div id="defaultFormControlHelp" class="form-text">
                                            Termasuk risk register yang telah disusun
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="du6" class="form-label">6. Lost Event Database</label>
                                        <div class="d-flex">
                                            <input type="text" class="form-control" id="du6" name="du6" />
                                            <button type="submit" class="ms-1 btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="du7" class="form-label">7. Kertas Kerja Proses Manajemen Risiko</label>
                                        <div class="d-flex">
                                            <input type="text" class="form-control" id="du7" name="du7" />
                                            <button type="submit" class="ms-1 btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="du8" class="form-label">8. Laporan Monitoring Kegiatan Manajemen Risiko</label>
                                        <div class="d-flex">
                                            <input type="text" class="form-control" id="du8" name="du8" />
                                            <button type="submit" class="ms-1 btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="du9" class="form-label">9. Catatan Akuntansi dan Keuangan</label>
                                        <div class="d-flex">
                                            <input type="text" class="form-control" id="anual" name="du9" />
                                            <button type="submit" class="ms-1 btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="du10" class="form-label">10. Laporan Hasil Audit SPI dan Tindak Lanjutnya</label>
                                        <div class="d-flex">
                                            <input type="text" class="form-control" id="du10" name="du10" />
                                            <button type="submit" class="ms-1 btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="du11" class="form-label">11. Kebijakan Sistem Pengendalian Intern</label>
                                        <div class="d-flex">
                                            <input type="text" class="form-control" id="du11" name="du11" />
                                            <button type="submit" class="ms-1 btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="du12" class="form-label">12. SOP Intern</label>
                                        <div class="d-flex">
                                            <input type="text" class="form-control" id="du12" />
                                            <button type="submit" class="ms-1 btn btn-primary">Simpan</button>
                                        </div>
                                        <div id="defaultFormControlHelp" class="form-text">
                                            Terkait kebijakan manajemen risiko di masing-masing unit perusahaan
                                        </div>
                                    </div>
                                </div> --}}
                    {{-- </div> --}}
                    {{-- </div> --}}

                </div>

                <!--/ Projects table -->
                <div class="row g-2">
                    <!-- Connections -->
                    <div class="col-lg-12 col-xl-6">

                    </div>
                    <!--/ Connections -->
                    <!-- Teams -->
                    <div class="col-lg-12 col-xl-6">

                    </div>
                    <!--/ Teams -->
                </div>
                <!-- Projects table -->

            </div>
        </div>
        <!--/ Data Umum Perusahaan -->
    </div>

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
            const textarea = document.querySelectorAll('textarea');
            if (textarea) {
                autosize(textarea);
            }
        </script>
    @endpush
@endsection
