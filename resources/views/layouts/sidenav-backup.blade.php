<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Irama APP</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item @if (Request::is('/')) active @endif">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Warga BPKP -->
        <li class="menu-header small text-uppercase ">
            <span class="menu-header-text">Warga BPKP</span>
        </li>
        <li class="menu-item  ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Quality Assurance</div>
            </a>
            <ul class="menu-sub ">
                <li class="menu-item ">
                    <a href="pages-account-settings-account.html" class="menu-link ">
                        <div data-i18n="Account">Badan Usaha</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Mitra BPKP -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Mitra BPKP</span></li>
        <!-- Forms -->
        <li class="menu-item @if (Request::is('profile*')) active open @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-server"></i>
                <div data-i18n="Form Elements">Profile </div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item @if (Request::is('profilebu')) active open @endif">
                    <a href="{{ route('profilebu.index') }}" class="menu-link">
                        <div data-i18n="Basic Inputs"> Badan Usaha</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="forms-input-groups.html" class="menu-link">
                        <div data-i18n="Input groups">Struktur Organisasi</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-add-to-queue"></i>
                <div data-i18n="Form Layouts">Input Paramater</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="form-layouts-vertical.html" class="menu-link">
                        <div data-i18n="Vertical Form">Vertical Form</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="form-layouts-horizontal.html" class="menu-link">
                        <div data-i18n="Horizontal Form">Horizontal Form</div>
                    </a>
                </li>
            </ul>
        </li>



        <!-- Administrator -->
        <li class="menu-header small text-uppercase ">
            <span class="menu-header-text">Administrator</span>
        </li>
        <li class="menu-item @if (Request::is('set*')) active open @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Account Settings">Setting</div>
            </a>
            <ul class="menu-sub ">
                <li class="menu-item @if (Request::is('setpengguna')) active open @endif">
                    <a href="{{ route('setpengguna.index') }}" class="menu-link ">
                        <div data-i18n="Account">Pengguna Aplikasi</div>
                    </a>
                </li>
            </ul>
            <ul class="menu-sub ">
                <li class="menu-item @if (Request::is('setklaster')) active open @endif">
                    <a href="{{ route('setklaster.index') }}" class="menu-link ">
                        <div data-i18n="Account">Klaster Badan Usaha</div>
                    </a>
                </li>
            </ul>
        </li>


        <!-- Misc -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>

        <li class="menu-item @if (Request::is('myprofile')) active @endif">
            <a href="{{ route('myprofile.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Support">My Profile</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ kontak() }}" target="_blank" class="menu-link">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div data-i18n="Support">Support</div>
            </a>
        </li>

        {{-- <li class="menu-item">
            <a href="#" target="_blank" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Documentation">Documentation</div>
            </a>
        </li> --}}
    </ul>
</aside>
