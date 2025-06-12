@extends('common.layout')
@section('content')
    <div id="data-container" class="flex flex-col">
        <div class="relative h-60 mb-10">
            <div class="absolute inset-0 bg-[url('/image/newAndEventBg.jpg')] bg-cover bg-center"></div>
            <div class="absolute inset-0 bg-black opacity-50"></div>
            <div class="relative flex items-center justify-center h-full">
                <h1 class="font-bold text-[50px] text-white tracking-wider uppercase">Our Partner</h1>
            </div>
        </div>
        <div class="grid grid-cols-1 mx-6 p-2 md:grid-cols-1 lg:grid-cols-2 lg:mx-20 lg:p-10 xl:grid-cols-3 xl:p-4">
            @forelse ($_partner as $partners)
                <a href="#">

                    <div
                        class="card w-[300px] h-[400px] my-10 shadow-lg border-1 mx-auto md:w-[300px] md:h-[350px] lg:w-[360px]">
                        <img src="{{ $partners->image_path() }}" alt="{{ $partners->title }}" />
                        <div class="mx-4">
                            <h2 class="font-semibold text-left text-xl">
                                <br>
                                {{ $partners->title }}<br />

                            </h2>
                        </div>
                    </div>
                </a>
            @empty
                <p> No Blog Found</p>
            @endforelse


        </div>

        {{-- <div id="pagination" class="flex justify-center w-screen mb-4">
            <a class="page-link text-center border border-gray-400 text-blue-600 w-6 md:w-8 h-8" id="prev"
                href="#"><span>‹</span></a>
            @for ($i = 1; $i <= $partners->lastPage(); $i++)
                <a class="page-link text-center border border-gray-500 text-blue-600 w-8"
                    href="{{ route('partner', ['page' => $i]) }}"
                    data-page="{{ $i }}"><span>{{ $i }}</span></a>
            @endfor
            <a class="text-center border border-gray-500 text-blue-600 w-8" href="#" id="next"><span>›</span></a>
        </div> --}}
    </div>
    <script src="./navigation/pages/pagesForAbout/script.js"></script>
@endsection
