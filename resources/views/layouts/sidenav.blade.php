<aside id="layout-menu" class="layout-menu menu-vertical menu accent shadow bg-primary" style="background-color:rgb(38,60,146) !imprtant;">
    <!-- Logo -->
    <div class="app-brand demo ps-3">
        <a href="{{ route('dashboard.index') }}" class="app-brand-link">
            <span class="app-brand-logo demo fw-bolder text-white">
                FORSA
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">
                <img src="{{ asset('assets/img/branding/logo-irama-white.png') }}" alt="" width="60px" class="img-fluid">
            </span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left bx-sm align-middle "></i>
        </a>
    </div>
    <!--End Logo -->

    <!--Menu -->
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <!-- Dashboards -->

        <!-- Dashboards Mitra, Warga -->
        <li class="menu-item  @if (Request::is('dashboard*')) @canany(['warga', 'mitra']) bg-label-secondary @endcan @endif">
            <a href="{{ route('dashboard.index') }}" class="menu-link @can('admin') @endcan @if (Request::is('dashboard*')) @canany(['warga', 'mitra']) text-dark fw-semibold @endcan @else text-white @endif">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboards">Dashboards</div>
            </a>
        </li>
        <!-- End Dashboards Mitra, Warga -->

        <!-- Dashboards SuperAdmin, Admin -->
        @canany(['superadmin', 'admin'])
            <li class="menu-item  @if (Request::is('dashboard*')) open @endif">
                <a href="{{ route('dashboard.index') }}" class="menu-link @can('admin') menu-toggle @endcan">
                    <i class="menu-icon tf-icons bx bx-search-alt"></i>
                    <div data-i18n="Monitoring">Monitoring</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item @if (Request::is('dashboard/progres')) active open @endif">
                        <a href="{{ route('dashboard.progres') }}" class="menu-link">
                            <div data-18n="Progres">Progres</div>
                        </a>
                    </li>
                    <li class="menu-item @if (Request::is('dashboard/rincian')) active open @endif">
                        <a href="{{ route('dashboard.rincian') }}" class="menu-link">
                            <div data-18n="Rincian">Rincian</div>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan
        <!-- End Dashboards SuperAdmin, Admin -->


        <!--Self & Data Assesment -->
        @canany(['mitra', 'warga'])
            <!-- Data Assesment-->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Data Assessment</span></li>
            <li class="menu-item @if (Request::is('dataumum')) bg-label-secondary @endif">
                <a href="{{ route('dataumum.index') }}" class="menu-link  @if (Request::is('dataumum')) text-primary fw-semibold @else text-white @endif">
                    <i class="menu-icon tf-icons bx bx-server"></i>
                    <div data-i18n="Data Umum">Data Umum</div>
                </a>
            </li>
            {{-- <li class="menu-item @if (Request::is('tes')) fw-semibold bg-label-secondary @endif">
                <a href="{{ route('profilebu.index') }}" class="menu-link text-white @if (Request::is('tes')) text-primary @else text-white @endif">
                    <i class="menu-icon tf-icons bx bxs-server"></i>
                    <div data-i18n="Data Pendukung">Data Pendukung</div>
                </a>
            </li> --}}
            <!-- End Data Assesment-->


            <!-- Self Assesment-->
            @php
                function role()
                {
                    if (auth()->user()->myprofile->role == 'mitra') {
                        return 'parameter';
                    } elseif (auth()->user()->myprofile->role == 'warga') {
                        return 'qa';
                    }
                }
            @endphp
            @can('mitra')
                <li class="menu-header small text-uppercase"><span class="menu-header-text">Self Assessment</span></li>
            @endcan
            @can('warga')
                <li class="menu-header small text-uppercase"><span class="menu-header-text">Quality Assurance</span></li>
            @endcan
            <li class="menu-item @if (Request::is(role()) && Request::query('dimensi') == 1) fw-bold bg-label-secondary @endif">
                <a href="{{ route(role() . '.index') . '?dimensi=1' }}" class="menu-link @if (Request::is(role()) && Request::query('dimensi') == 1) text-primary @else text-white @endif">
                    <i class="menu-icon tf-icons bx bxs-donate-heart"></i>
                    <div data-i18n="Budaya dan Kapabilitas Risiko">Budaya dan Kapabilitas Risiko</div>
                </a>
            </li>
            <li class="menu-item @if (Request::is(role()) && Request::query('dimensi') == 2) fw-bold bg-label-secondary @endif">
                <a href="{{ route(role() . '.index') . '?dimensi=2' }}" class="menu-link @if (Request::is(role()) && Request::query('dimensi') == 2) text-primary @else text-white @endif">
                    <i class="menu-icon tf-icons bx bxs-universal-access"></i>
                    <div data-i18n="Organisasi dan Tata Kelola Risiko">Organisasi dan Tata Kelola Risiko</div>
                </a>
            </li>
            <li class="menu-item @if (Request::is(role()) && Request::query('dimensi') == 3) fw-bold bg-label-secondary @endif">
                <a href="{{ route(role() . '.index') . '?dimensi=3' }}" class="menu-link @if (Request::is(role()) && Request::query('dimensi') == 3) text-primary @else text-white @endif">
                    <i class="menu-icon tf-icons bx bx-shape-circle"></i>
                    <div data-i18n="Kerangka Risiko dan Kepatuhan">Kerangka Risiko dan Kepatuhan</div>
                </a>
            </li>
            <li class="menu-item @if (Request::is(role()) && Request::query('dimensi') == 4) fw-bold bg-label-secondary @endif">
                <a href="{{ route(role() . '.index') . '?dimensi=4' }}" class="menu-link @if (Request::is(role()) && Request::query('dimensi') == 4) text-primary @else text-white @endif">
                    <i class="menu-icon tf-icons bx bx-shield-quarter"></i>
                    <div data-i18n="Proses dan Kontrol Risiko">Proses dan Kontrol Risiko</div>

                </a>
            </li>
            <li class="menu-item @if (Request::is(role()) && Request::query('dimensi') == 5) fw-bold bg-label-secondary @endif">
                <a href="{{ route(role() . '.index') . '?dimensi=5' }}" class="menu-link @if (Request::is(role()) && Request::query('dimensi') == 5) text-primary @else text-white @endif">
                    <i class="menu-icon tf-icons bx bx-code-alt"></i>
                    <div data-i18n="Model, Data dan Teknologi Risiko">Model, Data dan Teknologi Risiko </div>

                </a>
            </li>
            {{-- </li> --}}
            <!--End Self Assesment-->
        @endcan
        <!--Self & Data Assesment -->

        <!-- Setting Admin dan SuperAdmin -->
        @canany(['superadmin', 'admin'])
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Administrator</span></li>
            <!-- Forms -->
            <li class="menu-item @if (Request::is('set*')) open @endif">
                <a href="javascript:void(0);" class="menu-link text-white menu-toggle">
                    <i class="menu-icon tf-icons bx bx-cog"></i>
                    <div data-i18n="Setting">Setting</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item @if (Request::is('setpengguna')) active open @endif">
                        <a href="{{ route('setpengguna.index') }}" class="menu-link">
                            <div data-i18n="Pengguna Aplikasi">Pengguna Aplikasi</div>
                        </a>
                    </li>
                    <li class="menu-item @if (Request::is('setting/sima_klpbu')) active open @endif">
                        <a href="{{ route('set_simaklpbu') }}" class="menu-link">
                            <div data-i18n="Sima KLPBU">Sima KLPBU</div>
                        </a>
                    </li>
                    <li class="menu-item @if (Request::is('setparam*')) active open @endif">
                        <a href="{{ route('setparam.index') }}" class="menu-link">
                            <div data-i18n="Parameter">Parameter</div>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan
        <!-- End Setting Admin dan SuperAdmin -->

    </ul>
    <!--End Menu -->
</aside>
