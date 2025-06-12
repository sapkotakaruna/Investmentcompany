@forelse ($data['_message'] as $message)
    <div class="max-w-6xl mx-auto mt-10 px-4 lg:px-0">
        <div class="group flex flex-col lg:flex-row items-center gap-8 bg-white shadow shadow-gray-100 overflow-hidden  border border-gray-100 px-1">
            
            <div class="lg:w-1/2 w-full relative overflow-hidden" >
                <img src="{{ $message->image_path() }}" 
                     alt="{{ $message['name'] }}" 
                     class="w-full h-full lg:h-[500px] object-cover transition-transform duration-500 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>

            <div class="flex flex-col justify-center gap-6 p-8 lg:w-1/2 w-full" >
                <h2 class="text-3xl lg:text-4xl xl:text-5xl font-bold text-blue-900 group-hover:text-blue-700 transition-colors duration-300">
                    {{ $message->name }}
                </h2>
                <p class="text-lg text-gray-600 leading-relaxed">
                    {!! Str::limit(strip_tags($message->excerpt), 1000) !!}
                </p>
                
            </div>
            
        </div>
    </div>
@empty
    <div class="text-center py-16">
        <p class="text-xl text-gray-500">No message found.</p>
    </div>
@endforelse
