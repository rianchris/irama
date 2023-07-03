  <div class="card">
      <div class="d-flex align-items-end row">
          <div class="col-sm-7">
              <div class="card-body">
                  <h5 class="card-title text-primary">Selamat Datang {{ auth()->user()->myprofile->name }} 🎉</h5>
                  @if (auth()->user()->myprofile->bu->param->count() == 0)
                      <p class="mb-4">
                          Silahkan mengisi kertas kerja pada menu "Input Parameter" atau menu dibawah ini.
                      </p>
                  @elseif(auth()->user()->myprofile->bu->param->count() == 100)
                      <p class="mb-4">
                          Selamat anda telah menginput seluruh skor parameter!
                      </p>
                  @else
                      <p class="mb-4">
                          Kamu telah menyelesaikan <span class="fw-bold">{{ auth()->user()->myprofile->bu->param->count() }} dari 100</span> isian paramater. Periksa dan lengkapi isian parameter pada menu "Input Parameter" atau menu dibawah ini.
                      </p>
                  @endif
                  <a href="{{ route('parameter.index', 'dimensi=1') }}" class="m-1 btn btn-sm btn-label-primary">Dimensi 1</a>
                  <a href="{{ route('parameter.index', 'dimensi=2') }}" class="m-1 btn btn-sm btn-label-primary">Dimensi 2</a>
                  <a href="{{ route('parameter.index', 'dimensi=3') }}" class="m-1 btn btn-sm btn-label-primary">Dimensi 3</a>
                  <a href="{{ route('parameter.index', 'dimensi=4') }}" class="m-1 btn btn-sm btn-label-primary">Dimensi 4</a>
                  <a href="{{ route('parameter.index', 'dimensi=5') }}" class="m-1 btn btn-sm btn-label-primary">Dimensi 5</a>
              </div>
          </div>
          <div class="col-sm-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4">
                  <img src="../../assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
              </div>
          </div>
      </div>
  </div>
