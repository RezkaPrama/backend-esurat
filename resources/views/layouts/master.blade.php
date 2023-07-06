<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | E-Surat - Dashboard E-Surat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
    @include('layouts.head-css')
</head>

<body data-layout="vertical" data-sidebar="dark">
    {{--

    <body data-layout-scrollable="true" data-layout="horizontal"> --}}
        <div id="layout-wrapper">
            @include('layouts.topbar')
            @include('layouts.sidebar')
            {{-- @include('layouts.horizontal') --}}

            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
                @include('layouts.footer')
            </div>
        </div>
        {{-- @include('layouts.right-sidebar') --}}
        @include('layouts.vendor-scripts')
       
    </body>

</html>