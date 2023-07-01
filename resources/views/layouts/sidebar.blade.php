<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu" style="display: block;" >
    {{-- <body data-layout="horizontal" data-sidebar="dark"> --}}
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('assets/images/logo-sm.svg') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                {{-- <img src="{{ URL::asset('assets/images/logo-sm.svg') }}" alt="" height="22"> <span class="logo-txt">@lang('translation.Symox')</span> --}}
                <img src="{{ URL::asset('assets/images/logo-sm.svg') }}" alt="" height="22"> <span class="logo-txt">E-Surat</span>
            </span>
        </a>

        <a href="{{ url('/') }}" class="logo logo-light">
            <span class="logo-lg">
                {{-- <img src="{{ URL::asset('assets/images/logo-sm.svg') }}" alt="" height="22"> <span class="logo-txt">@lang('translation.Symox')</span> --}}
                <img src="{{ URL::asset('assets/images/logo-sm.svg') }}" alt="" height="22"> <span class="logo-txt">E-Surat</span>
            </span>
            <span class="logo-sm">
                <img src="{{ URL::asset('assets/images/logo-sm.svg') }}" alt="" height="22">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <li>
                    <a href="{{ route('admin.dashboard.index') }}">
                        <i class="bx bx-tachometer icon nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboards">Dashboard</span>
                        {{-- <span class="badge rounded-pill bg-success">@lang('translation.5+')</span> --}}
                    </a>
                </li>

                {{-- Penambahan menu baru --}}
                <li class="menu-title" data-key="t-menu">Manajemen</li>

                <li>
                    <a href="{{ route('admin.user.index') }}">
                        <i class="bx bx-user-circle icon nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboards">Manajemen User</span>
                    </a>
                </li>

                <li class="menu-title" data-key="t-applications">Surat</li>

                <li>
                    <a href="{{ route('admin.suratmasuk.index') }}">
                        <i class="bx  bx-mail-send icon nav-icon"></i>
                        <span class="menu-item" data-key="t-calendar">Surat Masuk</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.suratkeluar.index') }}">
                        <i class="bx bx-envelope icon nav-icon"></i>
                        <span class="menu-item" data-key="t-chat">Surat Keluar</span>
                    </a>
                </li>
                {{-- Penambahan menu baru --}}
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
