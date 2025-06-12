  @extends('common.layout')
  @section('content')
      <style>
          .tab-link.active h3 {
              color: #152e59;
              border-bottom: 2px solid #152e59;
          }
      </style>
      <div class="bg-slate-300 h-[70%]">

          <div class="h-[70%] relative">
              <div class="min-h-[100vh] bg-cover bg-center bg-[url('../../image/about_page.png')] bg-fixed">
                  <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-black/40"></div>
                  <div class="absolute insert-0 border w-[100%] items-center justify-center h-screen flex">
                      <h1
                          class="text-opacity-20 text-white lg:text-[180px]  md:text-[150px] text-[70px] lg:tracking-[20px] ">
                          GAUTHALI
                      </h1>
                  </div>

                  <div
                      class="p-2 w-[60vw] flex flex-col justify-center h-screen lg:px-[100px] md:px-[30px] px-[10px] gap-5 absolute ">
                      <h1 class="font-bold lg:text-5xl md:text-3xl text-xl text-[#ffffff]">{{ $data['about']->title }}</h1>
                      <p class=" lg:text-2xl md:text-xl text-sm text-[#ffffff]">
                          {!! Str::limit(strip_tags($data['about']->excerpt), 1000) !!}

                      </p>
                  </div>
              </div>
          </div>
          <section class="h-[100px]"></section>
          <div class="max-w-6xl mx-auto lg:flex gap-10">
              <div class="lg:w-[50%] p-2">
                  <img src="{{ isset($data['about']) ? $data['about']->image_path() : 'https://www.chaudharygroup.com/img/heroes1-657c0e4f.webp' }}"
                      alt="{{ $data['about']->title }}" />
              </div>
              <!-- Include Alpine.js once in your layout or main file -->
              <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

              <div class="lg:w-[50%] p-2">
                  <h2 class="text-[50px] p-2 text-[#152e59] lg:w-[300px] leading-[60px]">
                      Vision Mission Philosophy
                  </h2>

                  {{-- Tab Buttons --}}
                  <ul class="flex gap-10 border-b-2 p-2">
                      @foreach ($about_list as $item)
                          <li>
                              <a href="javascript:void(0)" class="tabable tab-link text-[15px] font-bold"
                                  data-tab="tab-{{ $item->id }}" onclick="tabChange('{{ $item->id }}')">
                                  <h3>{{ strtoupper($item->title) }}</h3>
                              </a>
                          </li>
                      @endforeach
                  </ul>

                  {{-- Tab Contents --}}
                  @foreach ($about_list as $item)
                      <div id="tab-{{ $item->id }}" class="tab-content {{ $loop->first ? '' : 'hidden' }}">
                         <a href="{{ route('aboutDetail', $item->slug) }}" >  <h1 class="text-[#152e59] text-2xl py-2">{{ $item->title }}</h1></a>
                          <p class="py-2 px-1 text-[#5a5454]">{!! $item->excerpt !!}</p>
                      </div>
                  @endforeach
              </div>
          </div>



      </div>
      <section class="h-[100px]"></section>
      <div class="bg-[#f2f3f4]">
          <div class="max-w-6xl mx-auto flex flex-col items-center py-5">
              <h1 class="py-5 text-5xl">CORE VALUES</h1>
              <img src="{{ isset($data['about2']) ? $data['about2']->image_path() : '' }}"
                  alt="{{ $data['about2']->title }}" class="py-5 w-full" />
          </div>
      </div>

      <div class="lg:h-[70%] relative">
          <div class="min-h-[100vh] bg-cover bg-center bg-[url('../../image/about_history.webp')] bg-fixed">
              <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-black/40"></div>

              <div class="absolute insert-0 p-5 w-[50%] items-center justify-center h-full flex flex-col ">
                  <h1 class="font-medium text-[50px] flex items-start w-full text-white">{{ $data['about3']->title }}</h1>
                  <p class=" text-[20px] text-white">
                      {{!! Str::limit(strip_tags($data['about']->excerpt), 1000) !!}}
                  </p>
              </div>
          </div>

      </div>
    
    <h1 class="text-6xl text-center py-5">TIMELINE</h1>
 <div class="max-w-6xl mx-auto p-5 relative">
    <!-- Vertical line -->
    <div class="absolute left-1/2 transform -translate-x-1/2 top-0 bottom-0 w-1 bg-black z-0"></div>

    <div class="space-y-10 relative z-10">
        @foreach ($data['_news'] as $index => $news)
            @php
                $isLeft = $index % 2 === 0;
            @endphp

            <div class="flex justify-between items-center w-full">
                @if ($isLeft)
                    <!-- Left Card -->
                    <div class="w-1/2 pr-6 flex justify-end">
                        <div class="lg:w-[500px] bg-[#132a53] text-white px-5 rounded-2xl">
                            <h1 class="py-5 text-2xl flex flex-col items-center">
                                {{ \Carbon\Carbon::parse($news->date)->format('Y') }}
                            </h1>
                            <div class="flex flex-col items-center py-5">
                                <img src="{{ $news->image_path() }}" alt="{{ $news->title }}" />
                            </div>
                            <div>
                                <a href="{{ route('timelineDetail', $news->slug) }}"><p class="text-2xl py-5 font-bold">{{ $news->title }}</p></a>
                                <p class="pb-5 text-[#d6dae1]">
                                    {!! Str::limit($news->excerpt ?? '', 100) !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/2"></div>
                @else
                    <!-- Right Card -->
                    <div class="w-1/2"></div>
                    <div class="w-1/2 pl-6 flex justify-start">
                        <div class="lg:w-[500px] bg-[#132a53] text-white px-5 rounded-2xl">
                            <h1 class="py-5 text-2xl flex flex-col items-center">
                                {{ \Carbon\Carbon::parse($news->date)->format('Y') }}
                            </h1>
                            <div class="flex flex-col items-center py-5">
                                <img src="{{ $news->image_path() }}" alt="{{ $news->title }}" />
                            </div>
                            <div>
                                <p class="text-2xl py-5 font-bold">{{ $news->title }}</p>
                                <p class="pb-5 text-[#d6dae1]">
                                    {!! Str::limit($news->excerpt ?? '', 100) !!}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-10 flex justify-center">
        {{ $data['_news']->links() }}
    </div>
</div>


      <section class="h-[100px]"></section>
  @endsection
  @section('scripts')
      <script>
          // Function to change tab
          function tabChange(tabId) {
              // Hide all tab contents
              document.querySelectorAll('.tab-content').forEach(function(content) {
                  content.classList.add('hidden');
              });

              // Remove active class from all tab links
              document.querySelectorAll('.tab-link').forEach(function(link) {
                  link.classList.remove('active');
              });

              // Show selected tab content
              const selectedTab = document.getElementById('tab-' + tabId);
              if (selectedTab) {
                  selectedTab.classList.remove('hidden');
              }

              // Add active class to clicked tab link
              const activeLink = document.querySelector(`[data-tab="tab-${tabId}"]`);
              if (activeLink) {
                  activeLink.classList.add('active');
              }
          }

          // Document ready
          document.addEventListener('DOMContentLoaded', function() {
              // Trigger tabChange for first tab
              const firstTab = document.querySelector('.tab-link');
              if (firstTab) {
                  const tabId = firstTab.getAttribute('data-tab').replace('tab-', '');
                  tabChange(tabId);
              }
          });


          // document.querySelectorAll(".tab-link").forEach((tab) => {

          // tab.addEventListener("click", (event) => {
          // event.preventDefault(); // Prevent page reload

          // // Hide all tab contents
          // document.getElementById("tab1").style.display = "none";
          // document.getElementById("tab2").style.display = "none";
          // document.getElementById("tab3").style.display = "none";


          // // Add active class to clicked tab
          // tab.classList.remove("border-transparent", "text-black");
          // tab.classList.add("border-[#1b3d78]", "text-[#1b3d78]");
          // });


          // });
      </script>
  @endsection
