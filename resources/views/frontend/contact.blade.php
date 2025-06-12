@extends('common.layout')
@section('content')
    <div class="relative h-60 mb-10">
        <div class="absolute inset-0 bg-[url('/image/contactUsBg.jpg')] bg-cover bg-center"></div>
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative flex items-center justify-center h-full flex-col">
    <h1 class="font-bold text-[50px] text-white tracking-wider uppercase">GET IN TOUCH</h1>
    <p class="text-white text-lg mt-2">We would love to hear from you</p>
</div>
    </div>

    <div class="max-w-6xl mx-auto mb-10 p-2">
        <div class="shadow-md shadow-gray-100 lg:shadow-lg sm:shadow-sm md:shadow">

            <div class="flex flex-col lg:flex-row justify-between gap-4">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14138.324647519654!2d85.51756397801643!3d27.63295549442299!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb0f33b1a23b53%3A0x3dd31a7287f8473b!2sBanepa!5e0!3m2!1sen!2snp!4v1704201781580!5m2!1sen!2snp"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" class="w-full"></iframe>
                <div class="w-full">
                    @if (session('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success_message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('contact.store') }}" method="post" class="space-y-4 p-6">
                        @method('POST')
                        @csrf
                        <input type="text" name="name" id="name" placeholder="Name" required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                             <input type="text" name="phone" id="phone" placeholder="9841000000" required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">


                        <input type="email" name="email" id="email" placeholder="Email" required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">


                        <input type="text" name="subject" id="subject" placeholder="Subject" required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">

                        <textarea name="message" id="message" placeholder="How can we help?" rows="4" required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500"></textarea>

                        <button type="submit"
                            class="w-full bg-blue-500 text-white py-
                            2 px-4 rounded-lg hover:bg-blue-600 transition-colors">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
