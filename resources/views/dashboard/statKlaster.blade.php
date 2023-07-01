 @can('admin')
     @foreach ($klaster as $klaster)
         <div class="col-md-6 col-lg-4 mb-4">
             <div class="card h-100">
                 <div class="card-header d-flex align-items-center justify-content-between">
                     <h5 class="card-title m-0 me-2">{{ $klaster->nama_klaster }}</h5>
                 </div>
                 <div class="card-body">
                     <ul class="p-0 m-0">
                         @foreach ($klaster->bu as $bu)
                             @if (isset($klaster->bu))
                                 <li class="d-flex mb-4 pb-1">
                                     @if ($bu->avatar)
                                         <img src="{{ asset('assets/img/avatars/1.png') }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                                     @else
                                         <div class="avatar avatar-sm me-2">
                                             <span class="avatar-initial rounded-circle bg-danger">
                                                 {{ Str::limit(Str::after($bu->sima_klpbu->nama_klpbu, 'PT '), 2, '') }}
                                             </span>
                                         </div>
                                     @endif
                                     <div class="d-flex w-100 align-items-start gap-2">
                                         <div class="d-flex justify-content-between flex-grow-1 flex-wrap">
                                             <div>
                                                 {{-- {{ dd($bu->id) }} --}}
                                                 <h6 class="mb-0">{{ $bu->sima_klpbu->nama_klpbu }}</h6>
                                                 <small class="text-muted">Pic: {{ $bu->myprofile->name }}</small>
                                             </div>

                                             <div class="user-progress d-flex align-items-center gap-2">
                                                 <h6 class="mb-0">Progress:</h6>
                                                 <span class="text-muted">{{ $bu->param->count() }} / 100</span>
                                             </div>
                                         </div>

                                         <div class="chart-progress" data-color="secondary" data-series="85"></div>
                                     </div>
                                 </li>
                             @else
                                 <li class="d-flex">
                                     <h6>Tidka ada Data</h6>
                                 </li>
                             @endif
                         @endforeach
                     </ul>
                 </div>
             </div>
         </div>
     @endforeach
 @endcan
