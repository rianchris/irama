<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <div class="navbar-nav align-items-center">
            <div class="nav-item navbar-search-wrapper mb-0 d-flex flex-row align-items-center">
                @if (isset($pegawai->buMitra->sima_klpbu))
                    <a href="{{ route('profilebu.index') }}" class="fs-md-5 fw-semibold text-primary ms-1 m-0">
                        {{ Str::limit($pegawai->buMitra->sima_klpbu->nama_klpbu, 50, ' ...') }}
                    </a>
                @elseif(isset($pegawai->buWarga->sima_klpbu))
                    <a href="{{ route('profilebu.index') }}" class="fs-6 fw-semibold text-secondary ms-1 m-0">
                        {{ Str::limit($pegawai->buWarga->sima_klpbu->nama_klpbu, 50, ' ...') }}
                    </a>
                @endif
            </div>
        </div>
        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center ms-auto">

            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-md avatar-online">
                        <span class="avatar-initial rounded-circle bg-label-primary">{{ Str::limit($pegawai->name, 2, '') }}</span>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="pages-account-settings-account.html">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-md avatar-online">
                                        <span class="avatar-initial rounded-circle bg-label-primary">{{ Str::limit($pegawai->name, 2, '') }}</span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">{{ $pegawai->name }}</span>
                                    <small class="text-muted">role: {{ $pegawai->role }}</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('myprofile.index') }}">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">My Profile</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <form action="{{ route('logout.post') }}" method="post">
                            @csrf
                            <button type=submit class="dropdown-item">
                                <i class="bx bx-power-off me-2"></i>
                                <span class="align-middle">Log Out</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>

</nav>
