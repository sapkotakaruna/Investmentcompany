@extends('common.layout')
@section('content')
    <div class="relative h-60 mb-10">
        <div class="absolute inset-0 bg-[url('/image/newAndEventBg.jpg')] bg-cover bg-center"></div>
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative flex items-center justify-center h-full">
            <h1 class="font-bold text-[50px] text-white tracking-wider uppercase">Notice</h1>
        </div>
    </div>
    @forelse ($_notice as $notice)
        <div class="max-w-6xl mx-auto bg-white shadow-md rounded-lg p-6 flex flex-col gap-4 mt-2">
            <div class="flex items-start sm:items-center justify-between flex-wrap gap-4">
                <div class="flex items-center gap-4">
                    <div
                        class="w-12 h-12 bg-green-400 rounded-full flex items-center justify-center text-white text-xl font-bold">

                    </div>
                    <div>


                        <h2 class="text-lg sm:text-xl font-semibold text-gray-800">{{ $notice->title }}</h2>
                        <div class="flex items-center text-sm text-gray-500 flex-wrap gap-4 mt-1">

                        </div>
                    </div>
                </div>

            </div>

            <p class="text-gray-600 text-sm">
                 {!! Str::limit(strip_tags($notice->excerpt), 200) !!} <a href="{{ route('noticeDetail', $notice->slug) }}"
                    class="text-blue-600 hover:underline">Show More</a>
            </p>



            <div class="flex justify-between items-center text-sm text-gray-500 flex-wrap gap-2">
                <span>Posted on <strong class="text-gray-800">{{ $notice->start_date }}</strong></span>
                <span>Expires on <strong class="text-gray-800">{{ $notice->end_date }}</strong></span>
            </div>
        </div>
    @empty
    @endforelse
    <section class="h-[100px]"></section>
@endsection
