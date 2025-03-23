
<!-- The Modal -->
<div 
  id="myModalcon" 
  class="fixed z-[3] top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 hidden justify-center items-center">

  <div class="bg-white w-[40rem]  rounded-lg shadow-lg px-0 py-0 relative ">
    <!-- Modal Header -->
      
    <button data-modal-close="#myModalcon"  id="closeModalcon" class="text-gray-500 hover:text-gray-700 absolute top-0 right-6" style="font-size:2.5rem;">&times;</button>
    <!-- Modal Body -->
    <div class=" text-gray-600 flex w-full h-full">
      {{-- image div  --}}
      <div class="w-30 hidden sm:flex">
        <img class="transform transition-transform duration-300 hover:scale-105 w-full h-full overflow-hidden" src="{{asset('upload/h2.jpg')}}" alt="loading..">
      </div> 

        <div class="w-[58rem] max-w-sm p-6 bg-white rounded-lg shadow-md">
            <div class=" w-full text-center mb-10 ">
              <p class=" text-2xl font-bold text-center text-gray-700">Contact Us</p>
              <p class="text-gray-600  text-center">contact us for Inquiry</p>
            </div>
            <form method="post" action="{{ route('user.contactUs') }}">
              <!-- Username Field -->
             @csrf
              <div class="mb-4">
                <input name="name" type="text" id="fullname" 
                  class="w-full px-4 py-2 text-gray-700 bg-gray-100 border rounded-lg focus:outline-none "
                  placeholder="Full Name">
                <span style="color:red">{{ $errors->first('fullname')}}</span>
              </div>
            
              <div class="mb-4">
                <input  name="phone" type="text" 
                  class="w-full px-4 py-2 text-gray-700 bg-gray-100 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                  placeholder="Phone Number" >
                <span style="color:red">{{ $errors->first('phone')}}</span>
              </div>
              <div class="mb-4">
                <input  name="email" type="email" 
                  class="w-full px-4 py-2 text-gray-700 bg-gray-100 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                  placeholder="Email Address">
                <span style="color:red">{{ $errors->first('email')}}</span>
              </div>
              <div class="mb-4">
                <input  name="company" type="text" 
                  class="w-full px-4 py-2 text-gray-700 bg-gray-100 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                  placeholder="Company Name" >
                
              </div>
              <div class="mb-4">
                <select id="cranetype" name='craneType' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option selected>Choose a Crane type</option>
                  <option value="mobile crane">Mobile crane</option>
                  <option value="towing">Towing service</option>
                  <option value="Farana">Farana</option>
                  <option value="Hydra-14">Hydra crane 14 ton</option>
                  <option value="Hydra-15">Hydra crane 15 ton</option>
                </select>
                
              </div>
              <!-- Login Button -->
              <div>
                <button 
                  type="submit" 
                  class="w-full px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                  Enquire
                </button>
              </div>
            </form>
          </div>
          
    </div>

  </div>
</div>

