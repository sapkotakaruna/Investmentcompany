<!DOCTYPE html>
<html lang="en">
@include('admin.layout.head')

<body class="hold-transition text-sm sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        {{--    <div class="preloader flex-column justify-content-center align-items-center"> --}}
        {{--        <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60"> --}}
        {{--    </div> --}}

        <!-- Navbar -->
        @include('admin.layout.nav')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('admin.layout.sidebar')

        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        @yield('code')
        @include('admin.layout.footer')
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        @include('admin.layout.control-sidebar')
        <!-- /.control-sidebar -->

    </div>
    <!-- ./wrapper -->
    @include('admin.layout.script')
</body>

</html>
