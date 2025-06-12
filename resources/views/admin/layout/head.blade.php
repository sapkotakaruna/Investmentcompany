<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | {{ env('APP_NAME') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/assets/dist/css/adminlte.min.css') }}">
    @yield('css')
    <!-- SweetAlert2 -->
    <link rel="stylesheet"
        href="{{ asset('backend/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- Favicon -->
    {{--    <link rel="icon" href="{{ \App\Facades\ViewHelper::getImagePath('siteProfile',@$_site_profile->favicon) }}" type="image/x-icon"> --}}
    {{--    <link rel="shortcut icon" href="{{ \App\Facades\ViewHelper::getImagePath('siteProfile',@$_site_profile->favicon) }}" type="image/x-icon"> --}}
    {{--    <link rel="apple-touch-icon" href="{{ \App\Facades\ViewHelper::getImagePath('siteProfile',@$_site_profile->favicon) }}"> --}}
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/style.css') }}">
    {{--    <meta http-equiv="refresh" content="20"> --}}
    <link href="{{ asset('backend/nepali-date-picker/css/nepali.datepicker.v3.7.min.css') }}" rel="stylesheet"
        type="text/css" />
</head>
