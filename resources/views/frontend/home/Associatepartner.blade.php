
<div class="mt-10 max-w-6xl mx-auto">
    <h2 class="text-4xl text-center mb-8">Associate Partner</h2>
    <div class="overflow-hidden relative">
        <div class="flex animate-scroll">
            @forelse ($data['assopartner'] as $associate)
                <div class="group mx-4 text-center">
                    <a href="{{ $associate->url ?? '#' }}" target="_blank" class="block relative">
                        <img src="{{ $associate->image_path_withAsset() }}" alt="{{ $associate->title }}"
                            class="w-40 h-40 md:w-60 md:h-60 object-contain">
                        <div class="absolute bottom-0 left-0 right-0  bg-opacity-70 text-white p-2 
                                opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <h5 class="font-medium truncate" style="background-color: #1b3d78;">{{ $associate->title }}</h5>
                        </div>
                    </a>
                </div>
            @empty
                <p class="w-full text-center">No Data Found</p>
            @endforelse
        </div>
    </div>
</div>