@extends('common.layout')
@section('content')
    <div class="relative h-60 mb-10">
        <div class="absolute inset-0 bg-[url('/image/newAndEventBg.jpg')] bg-cover bg-center"></div>
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative flex items-center justify-center h-full">
            <h1 class="font-bold text-[50px] text-white tracking-wider uppercase">FAQ</h1>
        </div>
    </div>
    <section id="content" class="bg-gray-100 py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">Frequently Asked Questions</h2>

            <div x-data="{ selected: null, showAll: false }" class="max-w-4xl mx-auto space-y-4">

                @foreach ($_faq as $index => $_faqs)
                    <div x-show="showAll || {{ $index }} < 5" class="bg-white rounded-lg shadow" x-cloak>
                        <button @click="selected === {{ $index }} ? selected = null : selected = {{ $index }}"
                            class="w-full flex items-center justify-between px-6 py-4 text-left text-lg font-medium text-gray-800 hover:bg-gray-50 transition">
                            <span>{{ Str::title($_faqs->question) }}</span>
                            <svg :class="selected === {{ $index }} ? 'rotate-180' : ''"
                                class="w-5 h-5 text-gray-500 transform transition-transform duration-200" fill="none"
                                stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="selected === {{ $index }}" x-collapse
                            class="px-6 pb-4 text-gray-600 text-sm leading-relaxed">
                            {!! $_faqs->answer !!}
                        </div>
                    </div>
                @endforeach

                @if ($_faq->count() > 5)
                    <div class="text-center mt-6">
                        <button @click="showAll = !showAll" class="text-blue-600 hover:underline font-medium">
                            <span x-show="!showAll">See More</span>
                            <span x-show="showAll">See Less</span>
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Make sure Alpine.js is included -->
    <script src="//unpkg.com/alpinejs" defer></script>



    {{-- <section id="content">
        <div class="content-wrap">
            <div class="container">

                <div id="faqs" class="faqs">
                    @forelse ($_faq as $_faqs)
                        <div class="toggle faq faq-marketplace faq-authors">
                            <div class="toggle-header">
                                <div class="toggle-icon">
                                    <i class="toggle-closed bi-question-circle"></i>
                                    <i class="toggle-open bi-question-circle"></i>
                                </div>
                                <div class="toggle-title">
                                    {{ Str::title($_faqs->question) }}
                                </div>
                            </div>
                            <div class="toggle-content">{!! $_faqs->answer !!}</div>
                        </div>
                    @empty
                    @endforelse



                </div>

            </div>





        </div>
    </section> --}}
@endsection
