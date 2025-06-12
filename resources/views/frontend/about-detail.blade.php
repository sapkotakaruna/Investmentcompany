@extends('common.layout')
@section('content')
    <div class="max-w-6xl mx-auto p-4 mt-8">
        <div class="bg-white rounded-xl shadow-2xl p-8">
            @if ($about)
                <!-- Title -->
                <div class="border-l-4 border-blue-900 pl-6 mb-6">
                    <h2 class="text-4xl md:text-5xl font-bold text-[#1a3c77] leading-tight">
                        {{ $about->title }}
                    </h2>
                </div>

                <!-- Content -->
               <div class="space-y-6">
    <blockquote class="border-l-4 border-blue-500 pl-6 italic text-gray-700 text-lg leading-relaxed">
        {!! $about->excerpt !!}
    </blockquote>
</div>
            @else
                <p class="text-gray-500">About content not available.</p>
            @endif
        </div>
    </div>
@endsection
