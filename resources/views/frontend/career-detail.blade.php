  @extends('common.layout')
  @section('content')
      <div
          class="bg-[url('/image/2ndbackimgcareer.png')] bg-cover bg-center min-h-[300px] lg:min-h-[190px] md:min-h-[240px] p-4">
          <div class="max-w-7xl mx-auto">
              <!-- Back Link -->
              <a href="{{ route('career') }}" class="text-sm mb-4 inline-block text-white hover:underline">
                  <i class="fas fa-arrow-left mr-2"></i> Back To All Jobs </a>

              <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                  <!-- Left Side -->
                  <div class="flex flex-col lg:flex-row lg:items-center gap-4">
                      <!-- Logo -->
                      <div class="bg-white rounded-md px-4 py-2 w-fit text-blue-600">
                          {{-- {{ $_site_profile->title }} --}}
                      </div>

                      <!-- Job Info -->
                      <div class="space-y-2">
                          <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-black">{{ $career->title }}</h1>
                          <p class="text-sm text-black  ">Job Code: <span class="font-medium">{{ $career->id }}</span></p>

                          <div class="flex flex-wrap items-center gap-4 mt-2 text-sm text-black/90">
                              <span class="flex items-center gap-1">
                                  📍 {{ $career->location }}
                              </span>
                              <span class="flex items-center gap-1">
                                  💼 {{ $career->job_post }}
                              </span>
                              <span class="flex items-center gap-1">
                                  🗓️ {{ $career->deadline }}
                              </span>
                          </div>
                      </div>

                      <!-- Full Time Badge -->
                      <div class="mt-4 lg:mt-0">
                          <span class="bg-yellow-100 text-yellow-800 text-sm font-semibold px-3 py-1 rounded-full">
                              {{ $career->job_type }}
                          </span>
                      </div>
                  </div>


              </div>
          </div>
      </div>



      <div class="bg-gray-100 p-6">
          <div class="max-w-7xl mx-auto">
              <div class="flex flex-col md:flex-row gap-4">
                  <!-- Experience Card -->
                  <div class="bg-white rounded-lg shadow p-4 flex-1">
                      <div class="flex items-center gap-3">
                          <div class="bg-orange-100 p-2 rounded-full">
                              <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" stroke-width="2"
                                  viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M16 7V5a3 3 0 00-6 0v2M5 11h14M5 11a2 2 0 012-2h10a2 2 0 012 2M5 11v10a2 2 0 002 2h10a2 2 0 002-2V11" />
                              </svg>
                          </div>
                          <div>
                              <p class="text-sm text-gray-500">Required Experience</p>
                              <p class="font-bold text-lg">{{ $career->experience }}</p>
                          </div>
                      </div>
                  </div>

                  <!-- Skills Card -->
                  <div class="bg-white rounded-lg shadow p-4 flex-1">
                      <div class="flex items-center gap-3">
                          <div class="bg-teal-100 p-2 rounded-full">
                              <svg class="w-6 h-6 text-teal-500" fill="none" stroke="currentColor" stroke-width="2"
                                  viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.91c.969 0 1.371 1.24.588 1.81l-3.976 2.89a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.538 1.118l-3.976-2.89a1 1 0 00-1.176 0l-3.976 2.89c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.364-1.118l-3.976-2.89c-.783-.57-.38-1.81.588-1.81h4.91a1 1 0 00.95-.69l1.518-4.674z" />
                              </svg>
                          </div>
                          <div>
                              <p class="text-sm text-gray-500">Skills</p>
                              <p class="font-bold text-base">
                                  {{ $career->skill }}

                              </p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>


      <div class="max-w-7xl mx-auto px-4 py-8">


          <!-- Job Responsibilities Section -->
          <div class="bg-white rounded-lg shadow-md p-6 mb-8">
              <h2 class="text-2xl font-bold mb-4">Job Responsibilities</h2>

              <div class="space-y-6">
                  <!-- Planning Section -->
                  <div>
                      <p class="text-gray-700 leading-relaxed">
                          {!! $career->excerpt !!}
                      </p>
                  </div>


              </div>
          </div>

          <!-- Required Skills Section -->
          <div class="bg-white rounded-lg shadow-md p-6">
              <h2 class="text-2xl font-bold mb-4">Required Skills & Education</h2>

              <div class="grid md:grid-cols-2 gap-6">
                  <div>
                      <h3 class="text-lg font-semibold text-blue-600 mb-2">Education & Experience</h3>
                      <ul class="list-disc pl-6 text-gray-700 space-y-2">
                          <li>{{ $career->experience }}</li>

                      </ul>
                  </div>

                  <div>
                      <h3 class="text-lg font-semibold text-blue-600 mb-2">Key Skills</h3>
                      <ul class="list-disc pl-6 text-gray-700 space-y-2">
                          <li>{{ $career->skill }}</li>

                      </ul>
                  </div>
              </div>
          </div>
          <div class="bg-white rounded-lg shadow-md p-6">
              <h2 class="text-2xl font-bold mb-4">For more Contact </h2>

              <div class="grid md:grid-cols-2 gap-6">
                  <div>

                      <ul class="list-disc pl-6 text-gray-700 space-y-2">
                          <li class="text-lg font-semibold text-blue-600 mb-2">{{ $siteSetting->title }}</li>
                          <li class="text-lg font-semibold text-blue-600 mb-2">{{ $siteSetting->email }}</li>
                          <li class="text-lg font-semibold text-blue-600 mb-2">{{ $siteSetting->phone }}</li>

                      </ul>
                  </div>
                  <div>
                      <h3 class="text-lg font-semibold text-blue-600 mb-2">Application Process</h3>
                      <p class="text-gray-700">
                          Interested candidates are requested to send their CV and cover letter to
                          <a href="mailto:{{ $siteSetting->email }}" class="text-blue-500 hover:underline">
                              {{ $siteSetting->email }}
                          </a>
                          with the subject line "Application for {{ $career->title }}".
                      </p>


                  </div>
              </div>
          </div>
      </div>



      <div class="bg-gray-100">
          <div class="max-w-6xl mx-auto mt-8  flex justify-between items-center  p-4 rounded-lg">
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
