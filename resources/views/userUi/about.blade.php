
@extends('userUi.userLayout') 
@section('content')

<!-- Slider Section -->
<div class="containerWra w-full">
    <div class="flex justify-center md:flex">
        <img class="w-full h-60" src="{{ asset('slider/farana1.jpg') }}" alt="">
        <img class="w-full h-60 hidden md:block" src="{{ asset('slider/slide8.jpg') }}" alt="">
        <img class="w-52 h-60 hidden md:block" src="{{ asset('slider/slide3.jpg') }}" alt="">
        {{-- <img class="w-full h-60 hidden md:block" src="{{ asset('slider/slide2.jpg') }}" alt=""> --}}
    </div>
</div>

<!-- Owners Section -->
<section class="w-full h-full">
    <div class="w-full h-full flex justify-center flex-wrap mt-4 mb-4 gap-6">
        
        <!-- Owner Card 1 -->
        <div class="max-w-sm w-64 rounded overflow-hidden shadow-lg bg-slate-200 ">
            <img class="w-full h-48" src="{{ asset('homeimg/owner.jpeg') }}" alt="Owner Image">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2 text-center">OWNER</div>
                <p class="text-gray-700 text-base text-center">
                    BABA L SHAIKH
                </p>
            </div>
            <div class="px-3 pt-1 pb-1 flex justify-center gap-4 mt-6">
                <a href="https://instagram.com" class="flex items-center hover:text-blue-400">
                    <img src="{{ asset('slider/instagram.webp') }}" alt="Instagram" class="h-6 w-6 mr-2"> Instagram
                </a>
                <a href="https://facebook.com" class="flex items-center hover:text-blue-400">
                    <img src="{{ asset('slider/facebook.png') }}" alt="Facebook" class="h-6 w-6 mr-2"> Facebook
                </a>
            </div>
        </div>

        <!-- Owner Card 2 -->
        <div class="max-w-sm w-64 rounded overflow-hidden shadow-lg bg-slate-200">
            <img class="w-full h-48" src="{{ asset('homeimg/oner.jpeg') }}" alt="Owner Image">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2 text-center"> Administrator </div>
                <p class="text-gray-700 text-base text-center">
                    SHAIKH RAZA AHMAD IDRISH
                </p>
            </div>
            <div class="px-3 pt-1 pb-1 flex justify-center gap-4 mb-2">
                <a href="https://instagram.com" class="flex items-center hover:text-blue-400">
                    <img src="{{ asset('slider/instagram.webp') }}" alt="Instagram" class="h-6 w-6 mr-2"> Instagram
                </a>
                <a href="https://facebook.com" class="flex items-center hover:text-blue-400">
                    <img src="{{ asset('slider/facebook.png') }}" alt="Facebook" class="h-6 w-6 mr-2"> Facebook
                </a>
            </div>
        </div>
    </div>
</section>

<!-- About Us Section -->
<section class="w-full bg-gray-100 py-10">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-2xl font-bold text-black mb-4 text-center">About Us – R. Baba Crane Service</h2>

            <p class="text-gray-700">
                Established in <strong>2000</strong>, R. Baba Crane Service began as a <strong>motor parts business</strong>, 
                providing high-quality components to the automotive industry. With a vision for growth and a commitment 
                to excellence, we expanded into <strong>crane services in 2008</strong>, starting with a <strong>14-ton Hydra crane</strong>.
            </p>

            <p class="mt-4">
                Today, we offer a wide range of lifting and towing solutions, including Farana cranes, forklifts, 
                mobile cranes, towing services, and more.
            </p>

            <p class="mt-4">
                With a focus on <strong>safety, reliability, and efficiency</strong>, R. Baba Crane Service has become a 
                <strong>trusted</strong> name in the <strong>industry</strong>. Our experienced team and well-maintained 
                equipment ensure that we provide the best lifting and transportation solutions for all types of projects.
            </p>

            <div class="mt-6">
                <h3 class="text-lg font-bold">Why Choose Us?</h3>
                <ul class="list-disc ml-5 mt-2 text-gray-700">
                    <li>✅ Experienced & Skilled Operators</li>
                    <li>✅ Wide Range of Cranes & Lifting Equipment</li>
                    <li>✅ Reliable & On-Time Service</li>
                    <li>✅ Competitive Pricing</li>
                </ul>
            </div>

            <p class="mt-6 font-bold">📞 Contact us today for professional crane services!</p>
        </div>
    </div>
</section>

@endsection

