{{-- ///---home page  --}}
<section class="wel">
    
    <div class="mail">
      <div class="row">
        <div class="flex justify-around ">
            <div class="sm:px-20 hidden sm:flex">
                <img class="w-56 h-40" src="{{asset('slider/farana3.jpg')}}" alt="">
            </div>
    
          <div class="sm:px-10 px-6">
            <img class="w-24 h-24 flex justify-self-center" src="{{asset('homeimg/year.png')}}" alt="">
            {{-- Year of Establishment <br> <strong>2010</strong> --}}
            {{__('userMsg.year_of_est')}} <br> <strong>2010</strong>
            
        </div>
          <div class="sm:px-10 px-6">
            <img class="w-24 h-24 flex justify-self-center" src="{{asset('homeimg/staff.png')}}" alt="">
            {{__('userMsg.no_of_staff')}} <br> <strong>{{$staff}}</strong></div>
          <div class="sm:px-10 px-6">
            <img class="w-24 h-24 flex justify-self-center" src="{{asset('homeimg/users.png')}}" alt="">
            {{__('userMsg.no_of_users')}} <br> <strong>{{$usercount}}</strong></div>
            <div class="sm:px-20 hidden sm:flex">
                <img class="w-56 h-40" src="{{asset('slider/hydra.webp')}}" alt="">
            </div>
        </div>
      </div>
    </div>
    
    </section>
<section class="wel">
    
    <div class="mail">
      <div class="row">
        <div class=" box-col-md-12">
          <p>{{__('userMsg.welcome_to')}}</p>
          <div class="welcomeName">
            @lang('userMsg.rbaba')
            <div class="bg-gray-600 w-72 h-1 rounded-full flex justify-self-center mt-3"></div>
            <div class="bg-gray-600 w-28 h-1 rounded-full flex justify-self-center mt-2"></div>
            <div class="bg-gray-600 w-16 h-1 rounded-full flex justify-self-center mt-1"></div>
          </div>
          <div class="welDis">
         @lang('userMsg.weldes')
             
          </div>
        </div>
      </div>
    </div>
    
    </section>