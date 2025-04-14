@extends('userUi.userLayout')
@section('content')
<div class="containerWra w-full ">
<!-- Swiper -->
<div class="swiper mySwiper md:w-full md:h-90 relative">
  <div class="flex items-center justify-between z-50 absolute bottom-0 w-full md:px-20 mb-4 px-4">
    <button id="openModelCon" data-modal-target="#myModalcon" class="hover:border-2 hover:border-red-500 px-10 py-2  gap-2 whitespace-nowrap text-white hover:text-red-500 bg-red-500 hover:bg-white  focus:outline-none flex  items-center rounded-3xl cursor">
      @lang('userMsg.contactus')
  </button>
    <a href="tel:+9044508134" class="px-5 py-2 hover:border-2 hover:border-green-500 text-white hover:text-green-500 bg-green-500 hover:bg-white  focus:outline-none flex  items-center rounded-3xl cursor  ">
      <ion-icon name="call-outline" class="w-6 h-6 px-2"></ion-icon>9044508134
    </a> 
    
  </div>
  <div class="swiper-wrapper z-0 w-full ">
    
    <div class="swiper-slide relative"><img style="width: 100%; height:90vh;" class="w-full  bg-cover bg-center"  src="{{asset('slider/farana2.jpg')}}" alt="">
    <div class="absolute bottom-10 left-[34rem] text-white font-bold text-4xl bg-gray-600 p-2 rounded-lg">
        @lang('userMsg.farana')
    </div>
    </div>
    <div class="swiper-slide">
      <img  style="width: 100%; height:90vh;" class="w-full    bg-cover bg-center" src="{{asset('slider/farana1.jpg')}}" alt="">
      <div class="absolute bottom-10 left-[34rem] text-white font-bold text-4xl bg-gray-600 p-2 rounded-lg">
        @lang('userMsg.hydra')
    </div>
    </div>
    <div class="swiper-slide">
      <img  style="width: 100%; height:90vh;" class="w-full  bg-cover bg-center" src="{{asset('slider/img2.jpg')}}" alt="">
      <div class="absolute bottom-10 left-[34rem] text-white font-bold text-4xl bg-gray-600 p-2 rounded-lg">
        @lang('userMsg.mobilecrane')
    </div>
    </div>
    <div class="swiper-slide">
      <img  style="width: 100%; height:90vh;" class="w-full  bg-cover bg-center" src="{{asset('slider/forkillift.jpg')}}" alt="">
      <div class="absolute bottom-10 left-[34rem] text-white font-bold text-4xl bg-gray-600 p-2 rounded-lg">
        @lang('forkillift')
    </div>
    </div>
    <div class="swiper-slide">
      <img  style="width: 100%; height:90vh;" class="w-full  bg-cover bg-center" src="{{asset('slider/slide2.jpg')}}" alt="">
      <div class="absolute bottom-10 left-[34rem] text-white font-bold text-4xl bg-gray-600 p-2 rounded-lg">
        @lang('userMsg.forkillift')
    </div>
    </div>
    <div class="swiper-slide"><img  style="width: 100%; height:90vh;" class="w-full  bg-cover bg-center" src="{{asset('slider/slide3.jpg')}}" alt="">
      <div class="absolute bottom-10 left-[34rem] text-white font-bold text-4xl bg-gray-600 p-2 rounded-lg">
        @lang('userMsg.hydra')
    </div>
    </div>
    <div class="swiper-slide">
      <img  style="width: 100%; height:90vh;" class="w-full  bg-cover bg-center" src="{{asset('slider/slide6.jpg')}}" alt="">
      <div class="absolute bottom-10 left-[34rem] text-white font-bold text-4xl bg-gray-600 p-2 rounded-lg">
        @lang('userMsg.hydra')
    </div>
    </div>
    <div class="swiper-slide">
      <img  style="width: 100%; height:90vh;" class="w-full  bg-cover bg-center" src="{{asset('slider/towing1.jpg')}}" alt="">
      <div class="absolute bottom-10 left-[34rem] text-white font-bold text-4xl bg-gray-600 p-2 rounded-lg">
        @lang('userMsg.towing')
      </div>
    </div>
  </div>
  {{-- <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div> --}}
  {{-- <div class="swiper-pagination"></div> --}}
</div>

@include('userUi.include.welcome')

{{-- // card  --}}

  {{-- <div class="h-full "> --}}
    @include('userUi.include.card')
  {{-- </div> --}}


    {{-- ///model 
 --}}
 
      {{-- @include('userUi.include.userLogin') --}}
 
      @include('userUi.include.contactUs')
 
      @include('userUi.include.inquiry')
 

</div> 

@endsection