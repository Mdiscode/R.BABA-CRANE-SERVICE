
@extends('userUi.userLayout') 
@section('content')

<!-- Slider Section -->
<div class="containerWra w-full">
    @foreach ($userabout as $value)
        
    
    <div class="flex justify-center items-center flex-nowrap w-full overflow-hidden">
        <img class="h-60 flex-1 object-cover" src="{{ asset('serviceimg/'.$value->sphoto) }}" alt="Service Image">
        <img class="h-60 flex-1 object-cover hidden md:block" src="{{ asset('slider/slide8.jpg') }}" alt="Slider Image 8">
        {{-- <img class="h-60 w-10 flex-1 object-cover hidden md:block" src="{{ asset('slider/slide3.jpg') }}" alt="Slider Image 3"> --}}
        <img class="h-60 flex-1 object-cover hidden md:block" src="{{ asset('slider/slide2.jpg') }}" alt="Slider Image 2">
    </div>
    
    
    
</div>

<!-- Owners Section -->
<section class="w-full h-full">
    <div class="w-full h-full flex justify-center flex-wrap mt-4 mb-4 gap-6">
        
        <!-- Owner Card 1 -->
        <div class="max-w-sm w-64 rounded overflow-hidden shadow-lg bg-slate-200 ">
            <img class="w-full h-48" src="{{ asset('serviceimg/'.$value->owphoto) }}" alt="Owner Image">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2 text-center">OWNER</div>
                <p class="text-gray-700 text-base text-center">
                    {{$value->ow_name}}
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
            <img class="w-full h-48" src="{{ asset('serviceimg/'.$value->ad_photo) }}" alt="Owner Image">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2 text-center"> Administrator </div>
                <p class="text-gray-700 text-base text-center">
                    {{$value->ad_name}}
                </p>
            </div>
            <div class="px-3 pt-1 pb-1 flex justify-center gap-4 mb-2">
                <a href="https://{{$value->instaid}}" class="flex items-center hover:text-blue-400">
                    <img src="{{ asset('slider/instagram.webp') }}" alt="Instagram" class="h-6 w-6 mr-2"> Instagram
                </a>
                <a href="https://{{$value->facebookid}}" class="flex items-center hover:text-blue-400">
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
            <h2 class="text-2xl font-bold text-black mb-4 text-center">{{$value->heading}}</h2>
           {!! $value->about!!}
        </div>
    @endforeach
    </div>
</section>

@endsection

