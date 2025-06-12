  @forelse ($data['intro'] as $intro)
    <div class="max-w-6xl mx-auto p-4 lg:p-8">
        <div class="flex flex-col  items-center bg-white overflow-hidden transition-transform transform hover:scale-105">
            <div class="w-full h-54 lg:h-auto" >
                <img src="{{ $intro->image_path() }}" alt="{{ $intro['title'] }}" class="object-cover w-full h-full">
            </div>
            <div class="w-full p-6 flex flex-col justify-center text-center lg:text-left">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4 flex justify-center">{{ $intro->title }}</h2>
                <p class="text-base lg:text-lg text-gray-600 leading-relaxed" >
                    {!! Str::limit(strip_tags($intro->excerpt), 500) !!}
                </p>
            </div>
        </div>
    </div>
@empty
    <p class="text-center text-gray-500 text-lg my-10">No Data Found</p>
@endforelse
