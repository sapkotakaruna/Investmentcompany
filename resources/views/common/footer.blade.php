  <footer class="bg-gradient-to-r from-[#1b3d78] to-[#2b5eb9] py-16 text-white">
      <div class="max-w-6xl mx-auto">
          <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 ">
              <!-- About Us Section -->
              <div class="transform hover:scale-105 transition duration-300 p-6 rounded-lg bg-white/5">
                  <h2 class="text-2xl font-bold text-white mb-6 border-b border-blue-400 pb-2">
                      {{ $_site_profile->title }}</h2>

                  <ul class="flex flex-col gap-4">
                      <!-- <li class="flex items-center gap-4 hover:text-blue-300 transition duration-300 group">
                          <i class="fas fa-home text-blue-300 group-hover:scale-110"></i>
                          <a href="#" class="hover:underline">www.chaudharygroup.com</a>
                      </li> -->
                      <li class="flex items-center gap-4 hover:text-blue-300 transition duration-300 group">
                          <i class="fas fa-envelope text-blue-300 group-hover:scale-110"></i>
                          <a href="#" class="hover:underline">{{ $_site_profile->email }}</a>
                      </li>
                      <li class="flex items-center gap-4 hover:text-blue-300 transition duration-300 group">
                          <i class="fas fa-map-marker-alt text-blue-300 group-hover:scale-110"></i>
                          <span>{{ $_site_profile->location }}</span>
                      </li>
                      <li class="flex items-center gap-4 hover:text-blue-300 transition duration-300 group">
                          <i class="fas fa-phone text-blue-300 group-hover:scale-110"></i>
                          <a href="#" class="hover:underline">{{ $_site_profile->phone }}</a>
                      </li>



                      </li>
                  </ul>
              </div>

              <!-- Recent Posts Section -->
              <div class="transform hover:scale-105 transition duration-300 p-6 rounded-lg bg-white/5">
                  <h2 class="text-2xl font-bold mb-6 border-b border-blue-400 pb-2">Other Links</h2>
                  <div>
                      <ul>
                          @php
                              $footer_titles = [
                                  'footer_menu_first_title',
                                  'footer_menu_second_title',
                                  'footer_menu_third_title',
                                  'footer_menu_fourth_title',
                                  'footer_menu_five_title',
                                  'footer_menu_six_title',
                                  'footer_menu_seven_title',
                                  'footer_menu_eight_title',
                              ];

                              $footer_links = [
                                  'footer_menu_first_link',
                                  'footer_menu_second_link',
                                  'footer_menu_third_link',
                                  'footer_menu_fourth_link',
                                  'footer_menu_five_link',
                                  'footer_menu_six_link',
                                  'footer_menu_seven_link',
                                  'footer_menu_eight_link',
                              ];
                          @endphp

                          @foreach ($footer_titles as $index => $title)
                              @if (isset($_site_profile->$title))
                                  <li class="flex items-center gap-4 hover:text-blue-300 transition duration-300 group">
                                      <i class="fa fa-angle-right text-blue-300 group-hover:scale-110"></i>
                                      <a
                                          href="{{ $_site_profile->{$footer_links[$index]} }}"target="_blank">{{ $_site_profile->$title }}</i></a>
                                  </li>
                              @endif
                          @endforeach

                      </ul>

                  </div>

              </div>

              <!-- By Gauthali Group Section -->
              <div class="transform hover:scale-105 transition duration-300 p-6 rounded-lg bg-white/5">
                  <h2 class="text-2xl font-bold mb-6 border-b border-blue-400 pb-2">Get in touch</h2>
                 <p> Hours </p>
                  <ul class="space-y-3">
                       @forelse($opening_times as $time)
                   
                          <li class="flex items-center gap-4 hover:text-blue-300 transition duration-300 group">
                              <i class="fa fa-angle-right text-blue-300 group-hover:scale-110"></i>
                              {{ $time }}
                               
                          </li>
                           @empty
            <li class="text-white">No opening hours available.</li>
        @endforelse
                    
                  </ul>
              </div>

          </div>
      </div>
      </div>
      <div class="max-w-6xl mx-auto mt-8 text-center">
          <div class="border-t border-white/20 pt-8">
              <p class="text-gray-300 hover:text-white transition duration-300"> &copy; {{ now()->year }}
                  {{ $_site_profile->title }}. All rights reserved.
              </p>
          </div>
      </div>
  </footer>
