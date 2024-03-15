<!DOCTYPE html>
<html lang="en">

<head>
    @include('page-admin.components.meta')
    @include('page-admin.components.style')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake " src="{{ asset('assets/data-katalog/logo/mobil88-logo-circle.png') }}"
                alt="Mobil88Logo" height="60" width="60">
        </div>
        @include('page-admin.partials.navbar')
        @include('page-admin.partials.sidebar')
        @yield('content')
        @include('page-admin.partials.footer')
    </div>
    @include('page-admin.components.javascript')
</body>
</html>
