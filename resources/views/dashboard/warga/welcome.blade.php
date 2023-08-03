  <div class="card" style="background-color:rgba(255,255,255,0.9)">
      <div class="d-flex align-items-end row">
          <div class="col-sm-7">
              <div class="card-body">
                  <h5 class="card-title text-primary">Selamat Datang {{ auth()->user()->myprofile->name }} 🎉</h5>
                  @if (isset(auth()->user()->myprofile->buWarga->param))
                      @if (auth()->user()->myprofile->buWarga->param->count() == 0)
                          <p class="mb-4">
                              Silahkan mengisi kertas kerja pada menu "Self Assessment" atau menu dimensi dibawah ini.
                          </p>
                      @elseif(auth()->user()->myprofile->buWarga->param->count() == 106)
                          <p class="mb-4">
                              Selamat anda telah menginput seluruh skor parameter!
                          </p>
                      @else
                          <p class="mb-4">
                              Mitra telah menyelesaikan <span class="fw-bold">{{ auth()->user()->myprofile->buWarga->param->count() }} </span> isian paramater. Periksa dan lengkapi isian parameter pada menu "QA"
                          </p>
                      @endif
                  @endif

                  @foreach ($dimensi as $dimensi)
                      <a href="{{ route('qa.index', 'dimensi=' . $loop->iteration) }}" class="mb-1 fw-semibold btn btn-sm btn-label-linkedin">
                          {{ $dimensi->deskripsi }}
                      </a>
                  @endforeach
              </div>
          </div>
          <div class="col-sm-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4">
                  <img src="{{ asset('assets/img/illustrations/man-with-laptop-light.png') }}" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
              </div>
          </div>
      </div>
  </div>
