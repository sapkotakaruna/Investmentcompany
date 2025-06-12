 <script src="https://cdn.tailwindcss.com"></script>
 <!-- Header (Will scroll away) -->
 <div id="header" class="bg-blue-900">
     <div
         class="max-w-6xl mx-auto hidden md:flex flex-col lg:flex-row gap-4 text-white w-full h-18 items-center p-4 justify-between font-semibold">
         <div class="flex flex-row gap-6">
             <div class="flex items-center gap-2">
                 <i class="fas fa-phone"></i>
                 <p>{{ $_site_profile->phone }}</p>
             </div>
             <div class="flex items-center gap-2">
                 <i class="fas fa-envelope"></i>
                 <p>{{ $_site_profile->email }}</p>
             </div>
             <div class="flex items-center gap-2">
                 <i class="fa-solid fa-location-dot"></i>
                 <p>{{ $_site_profile->location }}</p>
             </div>
         </div>
         <div class="flex flex-row gap-4">
             <a href="{{ route('faq') }}">FAQ</a>
             <a href="{{ route('events') }}">Events</a>
             <a href="{{ route('career') }}">Career</a>
             <div class="flex items-center gap-6">
                 <a href="{{ $_site_profile->facebook_link }}" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                 <a href="{{ $_site_profile->twitter_link }}" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                 <a href="{{ $_site_profile->viber_link }}" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                 <a href="{{ $_site_profile->instagram_link }}" target="_blank"><i
                         class="fa-brands fa-linkedin"></i></a>

             </div>
         </div>
     </div>
 </div>
