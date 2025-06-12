@extends('common.layout')
@section('content')
    <div class="relative h-60 mb-10">
        <div class="absolute inset-0 bg-[url('/image/10.jpg')] bg-cover bg-center"></div>
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative flex items-center justify-center h-full">
            <h1 class="font-bold text-[50px] text-white tracking-wider uppercase">Gallery</h1>
        </div>
    </div>
    <div class=" max-w-6xl mx-auto mt-16 p-4 flex flex-wrap gap-10">
        @if (isset($_gallery) && $_gallery->count() > 0)
            @foreach ($_gallery as $key => $gallery)
                <div class="w-full md:w-[calc(33.33%-1.5rem)] xl:w-[calc(25%-1.5rem)] mb-10">
                    <h3 class="text-2xl font-bold text-[#1a3c77] mb-6">{{ $gallery->title }}</h3>
                    <div>
                        <a href="{{ route('gallery.detail', $gallery->slug) }}">
                            <img src="{{ ViewHelper::getImagePath('gallery', $gallery->cover_photo) }}"
                                alt="{{ $gallery->title }}" class="w-full h-80 object-cover cursor-pointer"
                                onclick="openSlider(0)">
                        </a>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <p class="card-text red text-center">{{ 'No photo gallery to display' }}
                        </p>
                    </div>
                </div>
            </div>
        @endif


    </div>
@endsection
