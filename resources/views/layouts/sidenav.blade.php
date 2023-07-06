<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/img/branding/logo-forsa-irama.png') }}" alt="" width="150px">
            </span>
            {{-- <span class="app-brand-text demo menu-text fw-bolder ms-2">Irama </span> --}}
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item  @if (Request::is('/')) active open @endif">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboards">Dashboards</div>
            </a>
        </li>

        <!-- Mitra BPKP -->
        @can('mitra')
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Mitra BPKP</span></li>
            <!-- Cards -->
            <li class="menu-item @if (Request::is('profilebu')) active @endif">
                <a href="{{ route('profilebu.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-server"></i>
                    <div data-i18n="Profile">Profil</div>
                </a>
            </li>
            <!-- Self Assessment -->
            <li class="menu-item @if (Request::is('parameter*')) active open @endif">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-add-to-queue"></i>
                    <div data-i18n="Self Assessment">Self Assessment</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item @if (Request::is('parameter') && Request::query('dimensi') == 1) active open @endif">
                        <a href="{{ route('parameter.index') . '?dimensi=1' }}" class="menu-link">
                            <div data-i18n="Dimensi 1">Dimensi 1</div>
                        </a>
                    </li>
                    <li class="menu-item @if (Request::is('parameter') && Request::query('dimensi') == 2) active open @endif">
                        <a href="{{ route('parameter.index') . '?dimensi=2' }}" class="menu-link">
                            <div data-i18n="Dimensi 2">Dimensi 2</div>
                        </a>
                    </li>
                    <li class="menu-item @if (Request::is('parameter') && Request::query('dimensi') == 3) active open @endif">
                        <a href="{{ route('parameter.index') . '?dimensi=3' }}" class="menu-link">
                            <div data-i18n="Dimensi 3">Dimensi 3</div>
                        </a>
                    </li>
                    <li class="menu-item @if (Request::is('parameter') && Request::query('dimensi') == 4) active open @endif">
                        <a href="{{ route('parameter.index') . '?dimensi=4' }}" class="menu-link">
                            <div data-i18n="Dimensi 4">Dimensi 4</div>
                        </a>
                    </li>
                    <li class="menu-item @if (Request::is('parameter') && Request::query('dimensi') == 5) active open @endif">
                        <a href="{{ route('parameter.index') . '?dimensi=5' }}" class="menu-link">
                            <div data-i18n="Dimensi 5">Dimensi 5</div>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan

        <!-- Warga -->
        @can('warga')
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Warga</span></li>
            <li class="menu-item @if (Request::is('qa*')) active open @endif">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class='menu-icon tf-icons bx bx-check-shield'></i>
                    <div data-i18n="Quality Assurance">Quality Assurance</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item @if (Request::is('qa') && Request::query('dimensi') == 1) active open @endif">
                        <a href="{{ route('qa.index') . '?dimensi=1' }}" class="menu-link">
                            <div data-i18n="Dimensi 1">Dimensi 1</div>
                        </a>
                    </li>
                    <li class="menu-item @if (Request::is('qa') && Request::query('dimensi') == 2) active open @endif">
                        <a href="{{ route('qa.index') . '?dimensi=2' }}" class="menu-link">
                            <div data-i18n="Dimensi 2">Dimensi 2</div>
                        </a>
                    </li>
                    <li class="menu-item @if (Request::is('qa') && Request::query('dimensi') == 3) active open @endif">
                        <a href="{{ route('qa.index') . '?dimensi=3' }}" class="menu-link">
                            <div data-i18n="Dimensi 3">Dimensi 3</div>
                        </a>
                    </li>
                    <li class="menu-item @if (Request::is('qa') && Request::query('dimensi') == 4) active open @endif">
                        <a href="{{ route('qa.index') . '?dimensi=4' }}" class="menu-link">
                            <div data-i18n="Dimensi 4">Dimensi 4</div>
                        </a>
                    </li>
                    <li class="menu-item @if (Request::is('qa') && Request::query('dimensi') == 5) active open @endif">
                        <a href="{{ route('qa.index') . '?dimensi=5' }}" class="menu-link">
                            <div data-i18n="Dimensi 5">Dimensi 5</div>
                        </a>
                    </li>
            </li>
        </ul>
        </li>
    @endcan

    <!-- Administrator -->
    @can('admin')
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Administrator</span></li>
        <!-- Forms -->
        <li class="menu-item @if (Request::is('set*')) active open @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Setting">Setting</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item @if (Request::is('setpengguna')) active open @endif">
                    <a href="{{ route('setpengguna.index') }}" class="menu-link">
                        <div data-i18n="Pengguna Aplikasi">Pengguna Aplikasi</div>
                    </a>
                </li>
                <li class="menu-item @if (Request::is('setparam*')) active open @endif">
                    <a href="{{ route('setparam.index') }}" class="menu-link">
                        <div data-i18n="Parameter">Parameter</div>
                    </a>
                </li>
                <li class="menu-item @if (Request::is('setting/sima_klpbu')) active open @endif">
                    <a href="{{ route('set_simaklpbu') }}" class="menu-link">
                        <div data-i18n="Sima KLPBU">Sima KLPBU</div>
                    </a>
                </li>
            </ul>
        </li>
    @endcan


    <!-- Misc -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>

    <li class="menu-item @if (Request::is('myprofile')) active @endif">
        <a href="{{ route('myprofile.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div data-i18n="My Profile">My Profile</div>
        </a>
    </li>
    <li class="menu-item">
        <a href="{{ kontak() }}" target="_blank" class="menu-link">
            <i class="menu-icon tf-icons bx bx-support"></i>
            <div data-i18n="Support">Support</div>
        </a>
    </li>
    </ul>
</aside>
