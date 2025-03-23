    <!-- Start---Card--Modal -->
    <div 
    id="cardModal" 
    class="fixed z-[3] top-0 left-0 w-full h-full bg-gray-800  bg-opacity-95 hidden justify-center items-center">
    
    <div class="bg-white w-[40rem]  rounded-lg shadow-lg px-0 py-0 relative ">
      <!-- Modal Header -->
        
      <button data-modal-close="#cardModal"  id="closeCardModal" class="text-gray-500 hover:text-gray-700 absolute top-0 right-6" style="font-size:2.5rem;">&times;</button>
      <!-- Modal Body -->
      <div class=" text-gray-600 flex w-full h-full">
        {{-- image div  --}}
        <div class="w-30 hidden sm:flex">
          <img class="transform transition-transform duration-300 hover:scale-105 w-full h-full overflow-hidden" src="{{asset('upload/h2.jpg')}}" alt="loading..">
        </div> 
    
          <div class="w-[58rem] max-w-sm p-4 bg-white rounded-lg shadow-md">
              <div class=" w-full text-center mb-10 ">
                <p class=" text-2xl font-bold text-center text-gray-700">Contact Us</p>
                <p class="text-gray-600  text-center">contact us for Inquiry</p>
              </div>
              <form method="post" action="{{ route('user.contactUs') }}">
                <!-- Username Field -->
               @csrf
               <div class="mb-3">
                <input name="title" type="text" 
                value="{{$find->title}}" 
                  class="w-full px-4 py-2 text-gray-700 bg-gray-100 border rounded-lg focus:outline-none "
                  placeholder="Title">
                <span style="color:red">{{ $errors->first('title')}}</span>
              </div>
            
              <div class="mb-3">
                <input  name="description" type="text" 
                value="{{$find->description}}"
                  class="w-full px-4 py-2 text-gray-700 bg-gray-100 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                  placeholder="Description" >
                <span style="color:red">{{ $errors->first('description')}}</span>
              </div>
              <div class="mb-3">
                <input  name="location" type="text" 
                  class="w-full px-4 py-2 text-gray-700 bg-gray-100 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                  placeholder="location Address">
                <span style="color:red">{{ $errors->first('location')}}</span>
              </div>
              <div class="mb-3">
                <input  name="address" type="text" 
                  class="w-full px-4 py-2 text-gray-700 bg-gray-100 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                  placeholder="address " >
                
              </div>
              <div class="mb-3">
                <input  name="phone" type="text" 
                  class="w-full px-4 py-2 text-gray-700 bg-gray-100 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                  placeholder="phone Number" >
                
              </div>
              <div class="mb-4">
                <input  name="address" type="file" 
                  class="w-full px-4 py-2 text-gray-700 bg-gray-100 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   >
                
              </div>
              
              <!-- Login Button -->
              <div>
                <button 
                  type="submit" 
                  class="w-full px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                  Update CardData
                </button>
              </div>
            
                
              </form>
            </div>
            
      </div>
    
    </div>
    </div>
    {{-- --end Modal-- --}}