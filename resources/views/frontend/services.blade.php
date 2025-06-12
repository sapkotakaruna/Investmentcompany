 @extends('common.layout')
 @section('content')
     <div id="data-container" class="flex flex-col">
         <div class="relative h-60 mb-10">
             <div class="absolute inset-0 bg-[url('/image/newAndEventBg.jpg')] bg-cover bg-center"></div>
             <div class="absolute inset-0 bg-black opacity-50"></div>
             <div class="relative flex items-center justify-center h-full">
                 <h1 class="font-bold text-[50px] text-white tracking-wider uppercase">Our Services</h1>
             </div>
         </div>
         <div class="grid grid-cols-1 mx-6 p-2 md:grid-cols-1 lg:grid-cols-2 lg:mx-20 lg:p-10 xl:grid-cols-3 xl:p-4">
             @forelse ($services as $Service_cat)
                 <a href="{{ route('service', $Service_cat->slug) }}">

                     <div
                         class="card w-[300px] h-[400px] my-10 shadow-lg border-1 mx-auto md:w-[300px] md:h-[350px] lg:w-[360px]">
                         <img src="{{ $Service_cat->image_path() }}" alt="{{ $Service_cat->name }}" />
                         <div class="mx-4">
                             <h2 class="font-semibold text-left text-xl">
                                 <br>
                                 {{ $Service_cat->name }}<br />

                             </h2>
                         </div>
                     </div>
                 </a>
             @empty
                 <p> Services Not Avilable.</p>
             @endforelse

             <div class="mb-16"></div>

         </div>


     </div>
     <script src="./navigation/pages/pagesForAbout/script.js"></script>
 @endsection
