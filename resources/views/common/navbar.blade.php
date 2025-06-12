  <div id="navbar" class="shadow bg-white transition-all duration-300">
        <div class="max-w-6xl mx-auto p-2 px-2.5">

      <div class="flex items-center justify-between gap-6 w-full">
  
    <!-- Logo on the left -->
    <div id="logo" class="flex-shrink-0">
        <a href="{{ route('index') }}">
            <img class="logo-default" src="{{ $_site_profile->logo() }}" 
                 style="height: 50px; margin: 5px;" alt="{{ $_site_profile->title }}" />
        </a>
    </div>

    <!-- Menu button on the right (visible on small screens) -->
    <div id="menu-Btn" class="lg:hidden cursor-pointer flex justify-end mr-4">
        <i class="fa fa-bars text-[30px]"></i>
    </div>

 <ul class="hidden lg:flex flex-row items-center space-x-6">
              <li class="relative group" onmouseenter="showDropdown()" onmouseleave="hideDropdown()">
                  <div class="flex items-center gap-1">
                      <a href="{{ route('index') }}" class="text-[#1a3c77] font-bold">HOME</a>
                      {{-- <i class="fas fa-chevron-down text-sm"></i> --}}
                  </div>
                  {{-- <ul id="dropdown" class="absolute hidden bg-white shadow-lg mt-2 py-2 w-48">
                      <li><a href="./index.html" class="block px-4 py-2 hover:bg-gray-100 text-[#1a3c77]">Home 1</a>
                      </li>
                      <li><a href="#" class="block px-4 py-2 hover:bg-gray-100 text-[#1a3c77]">Home 2</a>
                      </li>
                      <li><a href="#" class="block px-4 py-2 hover:bg-gray-100 text-[#1a3c77]">Home 3</a>
                      </li>
                  </ul> --}}
              </li>

              <li class="relative group">
                  <a href="#" class="text-[#1a3c77] font-bold inline-flex items-center py-2 cursor-pointer">
                      ABOUT US
                      <svg class="ml-2 w-4 h-4 text-[#1a3c77] group-hover:text-blue-700 transition" fill="none"
                          stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                      </svg>
                  </a>

                  <!-- Dropdown menu -->
                  <ul
                      class="absolute left-0 top-full mt-1 hidden group-hover:block bg-white shadow-lg rounded-md min-w-[180px] z-50">
                      @foreach ($_about_us as $about)
                          <li>
                              <a href="{{ route('aboutDetail', $about->slug) }}"
                                  class="block px-4 py-2 text-[#1a3c77] font-semibold hover:bg-blue-100 hover:text-blue-700 transition">
                                  {{ \Illuminate\Support\Str::limit($about->title, 15) }}
                              </a>
                          </li>
                      @endforeach
                  </ul>
              </li>


              <li class="relative group">
                  <a href="#" class="text-[#1a3c77] font-bold inline-flex items-center py-2  cursor-pointer ">
                      SERVICES
                      <svg class="ml-2 w-4 h-4 text-[#1a3c77] group-hover:text-blue-700 transition" fill="none"
                          stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                      </svg>
                  </a>

                  <!-- Dropdown menu -->
                  <ul
                      class="absolute left-0 top-full mt-1 hidden group-hover:block bg-white shadow-lg rounded-md min-w-[180px] z-50">
                      @foreach ($_service_category as $category)
                          <li>
                              <a href="{{ route('service', $category->slug) }}"
                                  class="block px-4 py-2 text-[#1a3c77] font-semibold hover:bg-blue-100 hover:text-blue-700 transition">

                                  {{ \Illuminate\Support\Str::limit($category->name, 15) }}
                              </a>
                          </li>
                      @endforeach
                  </ul>
              </li>
              <li><a href="{{ route('blog') }}" class="text-[#1a3c77] font-bold">BLOG</a></li>
              <li><a href="{{ route('gallery') }}" class="text-[#1a3c77] font-bold">GALLERY</a></li>
              <li><a href="{{ route('notice') }}" class="text-[#1a3c77] font-bold">NOTICE</a></li>
              <li><a href="{{ route('contact') }}" class="text-[#1a3c77] font-bold">CONTACT</a></li>
  </ul>
</div>
</div>




      <!-- Mobile Menu (Hidden by default) -->
    <ul id="mobile-menu"
        class="lg:hidden hidden flex-col bg-white absolute right-0 w-64 text-center py-4 space-y-4 shadow-lg z-50">
        <li class="relative">
            <div class="flex items-center justify-center gap-1">
                <a href="{{ route('index') }}" class="text-[#1a3c77] font-bold">HOME</a>
            </div>
        </li>

        <li class="relative">
            <div class="flex items-center justify-center gap-1 cursor-pointer" onclick="aboutToggleMobileDropdown()">
                <a href="#" class="text-[#1a3c77] font-bold">ABOUT US</a>
                <i class="fas fa-chevron-down text-sm"></i>
            </div>
            <ul id="about-dropdown" class="hidden bg-gray-50 w-full py-2">
                @foreach ($_about_us as $about)
                    <li>
                        <a href="{{ route('aboutDetail', $about->slug) }}" 
                           class="block py-2 hover:bg-gray-100 text-[#1a3c77]">
                            {{ \Illuminate\Support\Str::limit($about->title, 15) }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>

        <li class="relative">
            <div class="flex items-center justify-center gap-1 cursor-pointer" onclick="serviceToggleMobileDropdown()">
                <a href="#" class="text-[#1a3c77] font-bold">SERVICES</a>
                <i class="fas fa-chevron-down text-sm"></i>
            </div>
            <ul id="service-dropdown" class="hidden bg-gray-50 w-full py-2">
                @foreach ($_service_category as $category)
                    <li>
                        <a href="{{ route('service', $category->slug) }}" 
                           class="block py-2 hover:bg-gray-100 text-[#1a3c77]">
                            {{ \Illuminate\Support\Str::limit($category->name, 15) }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>

        <li><a href="{{ route('blog') }}" class="text-[#1a3c77] font-bold">BLOG</a></li>
        <li><a href="{{ route('gallery') }}" class="text-[#1a3c77] font-bold">GALLERY</a></li>
        <li><a href="{{ route('notice') }}" class="text-[#1a3c77] font-bold">NOTICE</a></li>
        <li><a href="{{ route('contact') }}" class="text-[#1a3c77] font-bold">CONTACT</a></li>
    </ul>
  </div>
