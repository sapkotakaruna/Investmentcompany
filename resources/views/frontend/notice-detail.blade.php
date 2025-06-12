@extends('common.layout')
@section('content')
    <div class="max-w-6xl mx-auto p-4 mt-8">

        <div class="flex flex-col lg:flex-row gap-12 items-start bg-white rounded-xl shadow-2xl p-8">

            @if ($_notice)
                <div class="lg:w-1/2">
                    <div class="relative overflow-hidden rounded-xl">
                        <img src="{{ $_notice->image_path() }}" alt="{{ $_notice->title }}"
                            class="w-full h-[500px] object-cover transform hover:scale-105 transition-transform duration-500 ease-in-out">
                        <div class="absolute top-4 left-4 bg-blue-900 text-white px-4 py-2 rounded-full">
                            Featured Story
                        </div>
                    </div>
                </div>

                <div class="lg:w-1/2 space-y-8">
                    <div class="border-l-4 border-blue-900 pl-6">
                        <h2 class="text-4xl md:text-5xl font-bold text-[#1a3c77] leading-tight">
                            {{ $_notice->title }}
                        </h2>
                        <p class="text-gray-500 mt-4">Published on {{ $_notice->start_date }}</p>
                        <p class="text-gray-500 mt-4">End on {{ $_notice->end_date }}</p>
                    </div>

                    <div class="space-y-6">
                        <p class="text-gray-700 leading-relaxed text-lg">
                            {!! $_notice->excerpt !!}
                        </p>


                    </div>
                </div>
            @endif




        </div>
    </div>
@endsection
