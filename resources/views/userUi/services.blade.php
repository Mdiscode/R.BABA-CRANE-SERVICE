@extends('userUi.userLayout')
@section('content')

<section class="bg-gray-700 py-8">
    <div class="flex justify-center">
        <div class="text-2xl text-white text-center  cursor-pointer">
            SERVICES
            <div class="bg-white w-28 h-1 rounded-full mx-auto mt-3 hover:bg-orange-600"></div>
        </div>
    </div>

    {{-- Services List --}}
    <div class="container mx-auto px-4 lg:px-20">

        {{-- Hydra Crane Services --}}
        <div class="flex flex-col lg:flex-row items-center bg-white rounded-lg shadow-lg overflow-hidden mt-6 p-6">
            <div class="w-full lg:w-1/2">
                <img class="w-full h-60 object-cover rounded-lg" src="{{asset('homeimg/slide4.jpg')}}" alt="Hydra Crane">
            </div>
            <div class="w-full lg:w-1/2 p-4">
                <h2 class="text-gray-900 font-bold text-xl">CRANE SERVICES</h2>
                <p class="text-gray-700 mt-2">
                    At R. Baba Crane Service, we provide reliable and efficient 
                    <strong>Hydra crane services</strong> for all types of heavy lifting needs. 
                    Whether it's <strong>loading, unloading, or transporting</strong> heavy materials, 
                    our well-maintained Hydra cranes and skilled operators ensure 
                    smooth, safe, and efficient operations.
                </p>
            </div>
        </div>

        {{-- Farana Crane Services --}}
        <div class="flex flex-col lg:flex-row-reverse items-center bg-white rounded-lg shadow-lg overflow-hidden mt-6 p-6">
            <div class="w-full lg:w-1/2">
                <img class="w-full h-60 object-cover rounded-lg" src="{{asset('homeimg/farana1.jpg')}}" alt="Farana Crane">
            </div>
            <div class="w-full lg:w-1/2 p-4">
                <h2 class="text-gray-900 font-bold text-xl">FARANA CRANE SERVICES</h2>
                <p class="text-gray-700 mt-2">
                    At R. Baba Crane Service, we provide reliable and efficient 
                    <strong>Farana crane services</strong> for all types of heavy lifting needs. 
                    Whether it's <strong>loading, unloading, or transporting</strong> heavy materials, 
                    our well-maintained Farana cranes and skilled operators ensure 
                    smooth, safe, and efficient operations.
                </p>
            </div>
        </div>

        {{-- Towing Services --}}
        <div class="flex flex-col lg:flex-row items-center bg-white rounded-lg shadow-lg overflow-hidden mt-6 p-6">
            <div class="w-full lg:w-1/2">
                <img class="w-full h-60 object-cover rounded-lg" src="{{asset('homeimg/tow3.jpg')}}" alt="Towing Services">
            </div>
            <div class="w-full lg:w-1/2 p-4">
                <h2 class="text-gray-900 font-bold text-xl">TOWING SERVICES</h2>
                <p class="text-gray-700 mt-2">
                    At R. Baba Crane Service, we provide reliable and efficient 
                    <strong>towing services</strong> for all types of vehicles, including cars and heavy-duty tochan. 
                    Whether it's <strong>vehicle breakdown recovery, accident towing, or transportation</strong>, 
                    our well-maintained tow trucks and skilled operators ensure 
                    safe, smooth, and timely service.
                </p>
            </div>
        </div>

        {{-- Forklift Services --}}
        <div class="flex flex-col lg:flex-row-reverse items-center bg-white rounded-lg shadow-lg overflow-hidden mt-6 p-6">
            <div class="w-full lg:w-1/2">
                <img class="w-full h-60 object-cover rounded-lg" src="{{asset('slider/slide1.jpg')}}" alt="Forklift Services">
            </div>
            <div class="w-full lg:w-1/2 p-4">
                <h2 class="text-gray-900 font-bold text-xl">FORKLIFT SERVICES</h2>
                <p class="text-gray-700 mt-2">
                    At R. Baba Crane Service, we provide reliable and efficient forklift
                    services for all types of material handling needs. Whether it's loading, 
                    unloading, or transporting heavy goods, our well-maintained forklifts and 
                    skilled operators ensure smooth and safe operations.
                </p>
            </div>
        </div>

        {{-- Mobile Crane Services --}}
        <div class="flex flex-col lg:flex-row items-center bg-white rounded-lg shadow-lg overflow-hidden mt-6 p-6">
            <div class="w-full lg:w-1/2">
                <img class="w-full h-60 object-cover rounded-lg" src="{{asset('homeimg/mobilecrane.jpg')}}" alt="Mobile Crane">
            </div>
            <div class="w-full lg:w-1/2 p-4">
                <h2 class="text-gray-900 font-bold text-xl">MOBILE CRANE SERVICES</h2>
                <p class="text-gray-700 mt-2">
                    At R. Baba Crane Service, we provide reliable and efficient 
                    <strong>mobile crane services</strong> for all types of heavy lifting and material handling needs.  
                    Whether it's <strong>construction work, industrial lifting, loading, or unloading</strong>,  
                    our well-maintained mobile cranes and skilled operators ensure 
                    safe, smooth, and efficient operations at any location.
                </p>
            </div>
        </div>

    </div>
</section>

@endsection
