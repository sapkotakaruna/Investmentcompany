<!DOCTYPE html>
<html dir="ltr" lang="en-US">

@include('common.head')

<body>
    <!-- Header (Will scroll away) -->
    @include('common.header')

    <!-- Navbar (Will stick to the top when scrolling) -->
    @include('common.navbar')

    @yield('content')


    @include('common.footer')


    @include('common.js')

    <style>
        @keyframes scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .animate-scroll {
            animation: scroll 20s linear infinite;
        }
    </style>
</body>

</html>
