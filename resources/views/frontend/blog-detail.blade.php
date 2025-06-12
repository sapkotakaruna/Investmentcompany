<!-- {{-- @extends('common.layout')
@section('content')
    <div class="max-w-6xl mx-auto p-4 mt-8">

        <div class="flex flex-col lg:flex-row gap-12 items-start bg-white rounded-xl shadow-2xl p-8">

            @if ($_blogs)
                <div class="lg:w-1/2">
                    <div class="relative overflow-hidden rounded-xl">
                        <img src="{{ $_blogs->image_path() }}" alt="{{ $_blogs->title }}"
                            class="w-full h-[500px] object-cover transform hover:scale-105 transition-transform duration-500 ease-in-out">
                        <div class="absolute top-4 left-4 bg-blue-900 text-white px-4 py-2 rounded-full">
                            Featured Story
                        </div>
                    </div>
                </div>

                <div class="lg:w-1/2 space-y-8">
                    <div class="border-l-4 border-blue-900 pl-6">
                        <h2 class="text-4xl md:text-5xl font-bold text-[#1a3c77] leading-tight">
                            {{ $_blogs->title }}
                        </h2>
                        <p class="text-gray-500 mt-4">Published on {{ $_blogs->created_at }}</p>
                    </div>

                    <div class="space-y-6">
                        <p class="text-gray-700 leading-relaxed text-lg">
                            {!! $_blogs->excerpt !!}
                        </p>


                    </div>
                </div>
            @endif




        </div>
    </div>
@endsection --}} -->
@extends('common.layout')
@section('content')
<div class="max-w-6xl mx-auto p-4 mt-8">
    <div class="bg-white rounded-xl shadow-2xl p-8">
        @if ($_blogs)
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Image floated left -->
            <div class="md:float-left md:mr-8 md:mb-4 w-full md:w-1/3">
                <div class="relative overflow-hidden rounded-xl">
                    <img src="{{ $_blogs->image_path() }}" alt="{{ $_blogs->title }}"
                        class="w-full h-48 md:h-64 object-cover transform hover:scale-105 transition-transform duration-500 ease-in-out">
                    <div class="absolute top-4 left-4 bg-blue-900 text-white px-4 py-2 rounded-full">
                        Featured Story
                    </div>
                </div>
            </div>

            <!-- Content area -->
            <div class="flex-1">
                <!-- Title and Date -->
                <div class="border-l-4 border-blue-900 pl-6">
                    <h2 class="text-4xl md:text-5xl font-bold text-[#1a3c77] leading-tight">
                        {{ $_blogs->title }}
                    </h2>
                    <p class="text-gray-500 mt-4">Published on {{ $_blogs->created_at }}</p>
                </div>

                <!-- Excerpt as Blockquote -->
                <blockquote class="mt-6 border-l-4 border-blue-400 italic bg-gray-50 py-4 px-6 rounded-r-lg text-gray-700 leading-relaxed text-lg">
                    {!! $_blogs->excerpt !!}
                </blockquote>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection