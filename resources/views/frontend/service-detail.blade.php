
@extends('common.layout')

@section('content')
    <!-- Header Section -->
    <div class="relative h-60 mb-10">
        <div class="absolute inset-0 bg-[url('/image/10.jpg')] bg-cover bg-center"></div>
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative flex items-center justify-center h-full">
            <h1 class="font-bold text-[50px] text-white tracking-wider uppercase">{{ $_service->name }}</h1>
        </div>
    </div>

    <!-- Content Section -->
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Left Column - Service Content -->
            <div class="lg:w-2/3">
                <!-- Service Header -->
                <div class="border-l-4 border-blue-900 pl-6 mb-6">
                    <h2 class="text-4xl font-bold text-[#1a3c77] leading-tight">{{ $_service->name }}</h2>
                </div>

                <!-- Image floated right with text flowing around -->
                @if (isset($_service->photo))
                    <div class="float-right ml-6 mb-6 w-full sm:w-1/2 lg:w-1/3">
                        <div class="relative w-full h-[250px] overflow-hidden rounded-xl shadow-lg">
                            <img src="{{ $_service->image_path_withAsset() }}" alt="{{ $_service->name }}"
                                class="w-full h-full object-cover">
                            <div class="absolute top-2 left-2 bg-blue-900 text-white text-xs px-3 py-1 rounded-full shadow">
                                Featured
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Text content that flows around the image -->
                <div class="text-gray-700 text-lg leading-relaxed">
                    @if (!empty($_service->excerpt))
                        <blockquote class="border-l-4 border-blue-400 pl-6 italic bg-gray-50 py-4 pr-4 rounded-r" style="text-align: justify">
                            {!! $_service->excerpt !!}
                        </blockquote>
                    @else
                        <blockquote class="border-l-4 border-gray-300 pl-6 italic bg-gray-50 py-4 pr-4 rounded-r text-gray-500">
                            No description available.
                        </blockquote>
                    @endif
                </div>

                <!-- Clear float for any content that should go below -->
                <div class="clear-both"></div>
            </div>

            <!-- Right Column - Related Services -->
            <div class="lg:w-1/3 bg-white rounded-xl shadow-md p-6 h-fit">
                <h2 class="text-2xl font-bold text-[#1a3c77] mb-4 border-b-2 border-blue-900 pb-2">
                    Related Services
                </h2>
                <ul class="list-disc pl-5 space-y-2 text-[#1a3c77]">
                    @forelse ($all_service as $service)
                        <li>
                            <a href="{{ route('serviceDetail', $service->slug) }}" class="hover:underline">
                                {{ \Illuminate\Support\Str::limit($service->name, 50) }}
                            </a>
                        </li>
                    @empty
                        <li class="text-gray-500">No related services found.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection