@extends('common.layout')
@section('css')
@endsection
@section('content')
    <!-- video -->
    @include('frontend.home.slider')

    @include('frontend.home.intro')

    <!-- ChairMan's Message -->
    @include('frontend.home.message')
    <!-- service -->
    @include('frontend.home.Associatepartner')
    @include('frontend.home.partner')
    @include('frontend.home.video')
@endsection

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

</body>

</html>
