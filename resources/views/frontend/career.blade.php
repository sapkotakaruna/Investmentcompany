  @extends('common.layout')
  @section('content')
      <!-- Hero Section -->
      <div class="bg-[url('/image/careerPageHeaderImage.svg')] bg-cover bg-center h-40">
          <div class="max-w-7xl mx-auto">
              <div class="flex items-center gap-4 text-white p-10">
                  <i class="fas fa-briefcase text-5xl"></i>
                  <div>
                      <h2
                          class="text-2xl font-bold bg-blue-500 text-white font-medium py-2 px-4 rounded-lg flex items-center gap-2 ">
                          Open Positions</h2>

                  </div>
              </div>
          </div>
      </div>

      <!-- Filter Section -->
      {{-- <div class="max-w-6xl mx-auto p-4 bg-white shadow-sm rounded-lg mt-4">
          <form method="GET" action="{{ route('career') }}">
              <div class="flex flex-wrap items-center gap-4">

                  <div class="relative flex-1 min-w-[250px]">
                      <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                      <input type="text" name="search" value="{{ request('search') }}" placeholder="Search for Jobs"
                          class="pl-10 pr-4 py-2 border rounded-md w-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                  </div>

                  <div class="relative min-w-[200px]">
                      <select name="sort"
                          class="w-full px-4 py-2 border rounded-md appearance-none bg-white cursor-pointer hover:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors">
                          <option value="">Sort By...</option>
                          <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest Posts</option>
                          <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest Posts</option>
                          <option value="az" {{ request('sort') == 'az' ? 'selected' : '' }}>Job Title (A-Z)</option>
                          <option value="za" {{ request('sort') == 'za' ? 'selected' : '' }}>Job Title (Z-A)</option>
                      </select>
                      <i class="fas fa-chevron-down absolute right-3 top-3 text-gray-400 pointer-events-none"></i>
                  </div>

                  <div class="relative min-w-[150px]">
                      <select name="location"
                          class="w-full px-4 py-2 border rounded-md appearance-none bg-white cursor-pointer hover:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                          <option value="">Location</option>
                          @foreach ($locations as $location)
                              <option value="{{ $location }}" {{ request('location') == $location ? 'selected' : '' }}>
                                  {{ $location }}</option>
                          @endforeach
                      </select>
                      <i class="fas fa-chevron-down absolute right-3 top-3 text-gray-400 pointer-events-none"></i>
                  </div>

                  <div class="relative min-w-[150px]">
                      <select name="department"
                          class="w-full px-4 py-2 border rounded-md appearance-none bg-white cursor-pointer hover:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                          <option value="">Department</option>
                          @foreach ($departments as $department)
                              <option value="{{ $department }}"
                                  {{ request('department') == $department ? 'selected' : '' }}>{{ $department }}
                              </option>
                          @endforeach
                      </select>
                      <i class="fas fa-chevron-down absolute right-3 top-3 text-gray-400 pointer-events-none"></i>
                  </div>

                  <button type="submit"
                      class="flex items-center gap-2 px-4 py-2 text-blue-600 hover:bg-blue-50 rounded-md transition-colors">
                      <i class="fas fa-filter"></i>
                      <span>Apply</span>
                  </button>
              </div>
          </form>
      </div> --}}

      <!-- Job Cards -->
      @foreach ($careers as $career)
          <div class="max-w-6xl mx-auto bg-white shadow-md rounded-lg p-6 flex flex-col gap-4 mt-4">
              <div class="flex items-start sm:items-center justify-between flex-wrap gap-4">
                  <div class="flex items-center gap-4">
                      <div
                          class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center text-white text-xl font-bold">
                          {{ strtoupper(substr($career->title, 0, 1)) }}
                      </div>
                      <div>
                          <h2 class="text-lg sm:text-xl font-semibold text-gray-800">
                              {{ $career->title }}
                          </h2>
                          <div class="flex items-center text-sm text-gray-500 flex-wrap gap-4 mt-1">
                              <span># {{ $career->id }}</span>
                              <span class="flex items-center gap-1">
                                  <i class="fas fa-map-marker-alt"></i>
                                  {{ $career->location }}
                              </span>
                              <span>{{ $career->job_type ?? 'Full Time' }}</span>
                          </div>
                      </div>
                  </div>
                  <a href="{{ route('careerDetails', $career->slug) }}" class="ml-auto text-gray-400 hover:text-gray-600">
                      <i class="fas fa-share text-xl"></i>
                  </a>
              </div>

              <p class="text-gray-600 text-sm">
                  {!! Str::limit(strip_tags($career->excerpt), 200) !!}
                  <a href="{{ route('careerDetails', $career->slug) }}" class="text-blue-600 hover:underline">Show
                      More</a>
              </p>

              @if ($career->skills)
                  <div>
                      <p class="text-xs text-gray-400 mb-1">Skills Required</p>
                      @foreach (explode(',', $career->skills) as $skill)
                          <span
                              class="bg-blue-100 text-blue-700 text-xs font-medium px-3 py-1 rounded-full">{{ trim($skill) }}</span>
                      @endforeach
                  </div>
              @endif

              <div class="flex justify-between items-center text-sm text-gray-500 flex-wrap gap-2">
                  <span>Posted on <strong class="text-gray-800">{{ $career->created_at->format('d M Y') }}</strong></span>
                  <span>Expires on <strong
                          class="text-gray-800">{{ \Carbon\Carbon::parse($career->deadline)->format('d M Y') }}</strong></span>
              </div>
          </div>
      @endforeach

      <!-- Footer -->
      <div class="bg-gray-100">
          <div class="max-w-6xl mx-auto mt-8 flex justify-between items-center p-4 rounded-lg">
              <p class="text-gray-500 text-sm">
                  &copy; {{ now()->year }} {{ $_site_profile->title }}. All rights reserved.
              </p>
              <a href="{{ route('index') }}"
                  class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg flex items-center gap-2">
                  <i class="fas fa-home"></i>
                  Back to Home
              </a>
          </div>
      </div>
  @endsection
