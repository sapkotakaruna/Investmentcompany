
<div class="relative w-full h-[300px] md:h-[400px] lg:h-full overflow-hidden rounded-lg">
    <div id="slider" class="w-full h-full flex transition-transform duration-700">
        @forelse ($data['_slider'] as $sliders)
            <div class="w-full flex-shrink-0 relative">
                <img src="{{ $sliders->image_path() }}" class="w-full h-full object-cover" alt="{{ $sliders->title }}">

                <div class="absolute inset-0 flex items-center text-white p-2 md:p-4">
                    <div class="bg-black/60 p-2 md:p-4 rounded-md max-w-[90%] md:max-w-xl text-left">
                        <h2 class="text-xl md:text-3xl lg:text-4xl font-bold mb-1 md:mb-2">{{ $sliders->title }}</h2>
                        <p class="text-sm md:text-base lg:text-lg">{{ $sliders->excerpt }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="w-full text-center p-4 md:p-20 bg-gray-100">No sliders found.</div>
        @endforelse
    </div>

    <button onclick="prevSlide()"
        class="absolute left-1 md:left-2 top-1/2 transform -translate-y-1/2 bg-black/50 text-white p-1 md:p-2 rounded-full z-10 text-sm md:text-base">
        &#10094;
    </button>
    <button onclick="nextSlide()"
        class="absolute right-1 md:right-2 top-1/2 transform -translate-y-1/2 bg-black/50 text-white p-1 md:p-2 rounded-full z-10 text-sm md:text-base">
        &#10095;
    </button>
</div>

<!-- JavaScript -->
<script>
    let slider = document.getElementById('slider');
    let slides = slider.children;
    let index = 0;

    function showSlide(i) {
        slider.style.transform = `translateX(-${i * 100}%)`;
    }

    function nextSlide() {
        index = (index + 1) % slides.length;
        showSlide(index);
    }

    function prevSlide() {
        index = (index - 1 + slides.length) % slides.length;
        showSlide(index);
    }

    setInterval(() => {
        nextSlide();
    }, 5000);

    showSlide(index);
</script>

