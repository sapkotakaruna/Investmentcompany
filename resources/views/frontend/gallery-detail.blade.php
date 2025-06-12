@extends('common.layout')

@section('content')
    <!-- Hero Banner -->
    <div class="relative h-60 mb-10">
        <div class="absolute inset-0 bg-[url('/image/10.jpg')] bg-cover bg-center"></div>
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative flex items-center justify-center h-full">
            <h1 class="font-bold text-[50px] text-white tracking-wider uppercase">
                {{ $_gallery->title }}
            </h1>
        </div>
    </div>

    <!-- Gallery Images -->
    <div class="max-w-6xl mx-auto mt-8 p-4">
        <div class="mb-12">
            <h3 class="text-2xl font-bold text-[#1a3c77] mb-6">{{ $_gallery->title }}</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @forelse ($_gallery->images as $image)
                    <img src="{{ asset('images/gallery/' . $image->image) }}" alt="{{ $image->alt_text ?? 'Gallery Image' }}"
                        class="w-full h-64 object-cover cursor-pointer" onclick="openSlider({{ $loop->index }})">
                        
                @empty
                    <p class="text-gray-500 col-span-3 text-center">No images available for this gallery.</p>
                @endforelse
            </div>
        </div>

        <!-- Modal Slider -->
        <div id="sliderModal" class="fixed inset-0 bg-black bg-opacity-90 hidden z-50">
            <!-- Close Button -->
            <button id="closeSliderBtn" class="absolute top-4 right-4 text-white text-xl p-2 z-50">
                <i class="fas fa-times"></i>
            </button>

            <div class="relative h-full flex items-center justify-center">
                <div id="modalSlider" class="flex transition-transform duration-500 ease-in-out">
                    @foreach ($_gallery->images as $image)
                        <div class="min-w-full px-4">
                            <img src="{{ asset('images/gallery/' . $image->image) }}"
                                alt="{{ $image->alt_text ?? 'Gallery Image' }}" class="max-h-[80vh] mx-auto">
                        </div>
                    @endforeach
                </div>

                <!-- Navigation Arrows -->
                <button onclick="moveModalSlide(-1)" class="absolute left-4 text-white p-4 hover:bg-opacity-75">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button onclick="moveModalSlide(1)" class="absolute right-4 text-white p-4 hover:bg-opacity-75">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let currentSlide = 0;
        const sliderModal = document.getElementById('sliderModal');
        const modalSlider = document.getElementById('modalSlider');

        function openSlider(index) {
            currentSlide = index;
            sliderModal.classList.remove('hidden');
            updateSliderPosition();
        }

        function closeSlider() {
            sliderModal.classList.add('hidden');
        }

        function moveModalSlide(step) {
            const slides = modalSlider.children.length;
            currentSlide = (currentSlide + step + slides) % slides;
            updateSliderPosition();
        }

        function updateSliderPosition() {
            modalSlider.style.transform = `translateX(-${currentSlide * 100}%)`;
        }

        document.getElementById('closeSliderBtn').addEventListener('click', closeSlider);
    </script>
@endpush
