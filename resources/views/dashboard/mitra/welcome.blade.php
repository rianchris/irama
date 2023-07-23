  <div class="card h-100">
      <div class="d-flex align-items-end row">
          <div class="col-lg-8">
              <div class="card-body">
                  <h5 class="card-title fs-5 fw-semibold text-primary">Selamat Datang {{ auth()->user()->myprofile->name }} 🎉</h5>
                  @if (auth()->user()->myprofile->buMitra->param->count() == 0)
                      <p class="mb-4">
                          Silahkan mengisi kertas kerja pada menu "Self Assessment" atau menu dimensi dibawah ini.
                      </p>
                  @elseif(auth()->user()->myprofile->buMitra->param->count() == 106)
                      <p class="mb-4">
                          Selamat anda telah menginput seluruh skor parameter!
                      </p>
                  @else
                      <p class="mb-4">
                          Anda telah menyelesaikan <span class="fw-bold">{{ auth()->user()->myprofile->buMitra->param->count() }} </span> isian paramater. Periksa dan lengkapi isian parameter pada menu "Self Assessment" atau menu dibawah ini.
                      </p>
                  @endif
                  <a href="{{ route('parameter.index', 'dimensi=1') }}" class="me-2 fw-semibold m-1 btn btn-sm btn-label-warning">
                      <i class='bx bx-donate-heart fs-3 me-2'></i>{{ $dimensi->find(1)->deskripsi }}
                  </a>
                  <a href="{{ route('parameter.index', 'dimensi=2') }}" class="me-2 fw-semibold m-1 btn btn-sm btn-label-info">
                      <i class='bx bx-universal-access fs-3 me-2'></i>{{ $dimensi->find(2)->deskripsi }}
                  </a>
                  <a href="{{ route('parameter.index', 'dimensi=3') }}" class="me-2 fw-semibold m-1 btn btn-sm btn-label-danger">
                      <i class='bx bx-shape-circle fs-3 me-2'></i>{{ $dimensi->find(3)->deskripsi }}
                  </a>
                  <a href="{{ route('parameter.index', 'dimensi=4') }}" class="me-2 fw-semibold m-1 btn btn-sm btn-label-success">
                      <i class='bx bx-shield-quarter fs-3 me-2'></i>{{ $dimensi->find(4)->deskripsi }}
                  </a>
                  <a href="{{ route('parameter.index', 'dimensi=5') }}" class="me-2 fw-semibold m-1 btn btn-sm btn-label-secondary">
                      <i class='bx bx-code-alt fs-3 me-2'></i>{{ $dimensi->find(5)->deskripsi }}
                  </a>
              </div>
          </div>
          <div class="col-lg-4 text-center text-sm-left d-none d-lg-block">
              <div class="card-body pb-0 px-0 px-md-4">
                  <img src="{{ asset('assets/img/illustrations/man-with-laptop-light.png') }}" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
              </div>
          </div>
      </div>
  </div>
