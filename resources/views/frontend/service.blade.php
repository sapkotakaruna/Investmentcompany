@extends('common.layout')

@section('content')
    <div id="data-container" class="flex flex-col">
        <!-- Hero Section -->
        <div class="relative h-60 mb-10">
            <div class="absolute inset-0 bg-[url('/image/newAndEventBg.jpg')] bg-cover bg-center"></div>
            <div class="absolute inset-0 bg-black opacity-60"></div>
            <div class="relative flex items-center justify-center h-full">
                <h1 class="font-bold text-4xl md:text-5xl text-white tracking-wide uppercase">
                    {{ $serviceCategory->name }}
                </h1>
            </div>
        </div>

        <!-- Services Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @forelse ($_service as $product)
                <a href="{{ route('serviceDetail', $product->slug) }}" class="group">
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition duration-300">
                        @if (isset($product->photo))
                            <img src="{{ $product->image_path_withAsset() }}" alt="{{ $product->name }}"
                                class="w-full h-56 object-cover">
                        @endif

                        <div class="p-4">
                            <h2 class="text-lg font-semibold text-[#1a3c77] group-hover:text-blue-700">
                                {{ \Illuminate\Support\Str::limit($product->name, 50) }}
                            </h2>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-full text-center text-gray-500 py-20 text-xl">
                    Services Not Available.
                </div>
            @endforelse
        </div>

        <div class="mb-16"></div>
    </div>

    <script src="./navigation/pages/pagesForAbout/script.js"></script>
@endsection
