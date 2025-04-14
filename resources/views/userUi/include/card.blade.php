<div class="view grid grid-cols-1 md:grid-cols-2 gap-3   bg-gray-600  py-1 ">
  @foreach ($cardData as $cdata )
{{-- <div  class="block max-w-sm mx-auto bg-white sm:w-full shadow-lg rounded-lg overflow-hidden md:max-w-2xl m-10 hover:border-2 hover:border-blue-500" >

  <div class="md:flex  bg-white">
    <!-- Image Section -->
    <div class="md:shrink-0">
      <img class=" transform transition-transform duration-300 hover:scale-110 h-48 w-full object-cover md:h-full md:w-64" src="{{asset('cardimg/'.$cdata->image)}}" alt="Card Image">
    </div>
    <!-- Content Section -->
    <div class="p-4">
      <h2 class="text-xl font-bold text-gray-800">{{$cdata->title}}</h2>
      <p class="mt-2 text-gray-600 text-ellipsis line-clamp-2 ">
          {{$cdata->description}}
      </p>
      
        
      <!-- Rating Section -->
      <div class="mt-2 flex items-center">
        <a href="user/raiting" class="flex ">
          <span class="text-yellow-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path d="M9.049 2.927a1 1 0 011.902 0l1.286 3.971a1 1 0 00.95.69h4.146a1 1 0 01.592 1.807l-3.356 2.441a1 1 0 00-.364 1.118l1.286 3.971a1 1 0 01-1.538 1.118L10 13.347l-3.357 2.441a1 1 0 01-1.538-1.118l1.286-3.971a1 1 0 00-.364-1.118L2.671 9.395a1 1 0 01.592-1.807h4.146a1 1 0 00.95-.69L9.049 2.927z" />
            </svg>
          </span>
          <span class="text-yellow-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path d="M9.049 2.927a1 1 0 011.902 0l1.286 3.971a1 1 0 00.95.69h4.146a1 1 0 01.592 1.807l-3.356 2.441a1 1 0 00-.364 1.118l1.286 3.971a1 1 0 01-1.538 1.118L10 13.347l-3.357 2.441a1 1 0 01-1.538-1.118l1.286-3.971a1 1 0 00-.364-1.118L2.671 9.395a1 1 0 01.592-1.807h4.146a1 1 0 00.95-.69L9.049 2.927z" />
            </svg>
          </span>
          <span class="text-yellow-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path d="M9.049 2.927a1 1 0 011.902 0l1.286 3.971a1 1 0 00.95.69h4.146a1 1 0 01.592 1.807l-3.356 2.441a1 1 0 00-.364 1.118l1.286 3.971a1 1 0 01-1.538 1.118L10 13.347l-3.357 2.441a1 1 0 01-1.538-1.118l1.286-3.971a1 1 0 00-.364-1.118L2.671 9.395a1 1 0 01.592-1.807h4.146a1 1 0 00.95-.69L9.049 2.927z" />
            </svg>
          </span>
          <span class="text-yellow-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path d="M9.049 2.927a1 1 0 011.902 0l1.286 3.971a1 1 0 00.95.69h4.146a1 1 0 01.592 1.807l-3.356 2.441a1 1 0 00-.364 1.118l1.286 3.971a1 1 0 01-1.538 1.118L10 13.347l-3.357 2.441a1 1 0 01-1.538-1.118l1.286-3.971a1 1 0 00-.364-1.118L2.671 9.395a1 1 0 01.592-1.807h4.146a1 1 0 00.95-.69L9.049 2.927z" />
            </svg>
          </span>
          <span class="text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path d="M9.049 2.927a1 1 0 011.902 0l1.286 3.971a1 1 0 00.95.69h4.146a1 1 0 01.592 1.807l-3.356 2.441a1 1 0 00-.364 1.118l1.286 3.971a1 1 0 01-1.538 1.118L10 13.347l-3.357 2.441a1 1 0 01-1.538-1.118l1.286-3.971a1 1 0 00-.364-1.118L2.671 9.395a1 1 0 01.592-1.807h4.146a1 1 0 00.95-.69L9.049 2.927z" />
            </svg>
          </span>
        </a>
      </div>
      <p class="flex items-center text-gray-600 mt-2"><ion-icon class="w-5 h-5" name="location-outline"></ion-icon>{{$cdata->location}}</p>
      <p class="text-gray-600 text-[13px] ml-5">{{$cdata->address}}</p>
      <!-- Action Buttons -->
      <div class="mt-4 flex items-center justify-around">

      <button id="openinquiryModel" data-modal-target="#inquiryModel" class="p-3 bg-orange-500 text-white rounded hover:bg-orange-600 focus:outline-none flex items-center">
        SEND INQUIRY
    </button>
        <a href="https://wa.me/9026018381" class="ml-2 px-2 py-2 bg-white text-black rounded hover:bg-green-600 hover:text-white  flex items-center  shadow-lg border-[3px] ">
          <img src="{{asset('cardimg/whatsapp2.png')}}" class="h-8 w-8 mr-2 hover:text-white" alt="WhatsApp">
          WhatsApp
        </a>
      </div>
    </div>
  </div>
</div> --}}

<div  class="flex flex-col lg:flex-row items-center bg-white rounded-lg shadow-lg overflow-hidden mt-6 p-6  ml-3 mr-3 hover:border-2 hover:border-blue-500 pointer-cursor" >

  <div class="md:flex  bg-white">
    <!-- Image Section -->
    <div class="md:shrink-0">
      <img class=" transform transition-transform duration-300 hover:scale-110 h-48 w-full object-cover md:h-full md:w-64" src="{{asset('cardimg/'.$cdata->image)}}" alt="Card Image">
    </div>
    


    <!-- Content Section -->
    <div class="w-full lg:w-1/2 p-4">
      <h2 class="text-gray-900 font-bold text-xl">{{$cdata->title}}</h2>
      <p class="text-gray-700 mt-2" >
          {!!$cdata->description!!}
      </p>
      
        
      <!-- Rating Section -->
      {{-- <div class="mt-2 flex items-center">
        <a href="user/raiting" class="flex ">
          <span class="text-yellow-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path d="M9.049 2.927a1 1 0 011.902 0l1.286 3.971a1 1 0 00.95.69h4.146a1 1 0 01.592 1.807l-3.356 2.441a1 1 0 00-.364 1.118l1.286 3.971a1 1 0 01-1.538 1.118L10 13.347l-3.357 2.441a1 1 0 01-1.538-1.118l1.286-3.971a1 1 0 00-.364-1.118L2.671 9.395a1 1 0 01.592-1.807h4.146a1 1 0 00.95-.69L9.049 2.927z" />
            </svg>
          </span>
          <span class="text-yellow-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path d="M9.049 2.927a1 1 0 011.902 0l1.286 3.971a1 1 0 00.95.69h4.146a1 1 0 01.592 1.807l-3.356 2.441a1 1 0 00-.364 1.118l1.286 3.971a1 1 0 01-1.538 1.118L10 13.347l-3.357 2.441a1 1 0 01-1.538-1.118l1.286-3.971a1 1 0 00-.364-1.118L2.671 9.395a1 1 0 01.592-1.807h4.146a1 1 0 00.95-.69L9.049 2.927z" />
            </svg>
          </span>
          <span class="text-yellow-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path d="M9.049 2.927a1 1 0 011.902 0l1.286 3.971a1 1 0 00.95.69h4.146a1 1 0 01.592 1.807l-3.356 2.441a1 1 0 00-.364 1.118l1.286 3.971a1 1 0 01-1.538 1.118L10 13.347l-3.357 2.441a1 1 0 01-1.538-1.118l1.286-3.971a1 1 0 00-.364-1.118L2.671 9.395a1 1 0 01.592-1.807h4.146a1 1 0 00.95-.69L9.049 2.927z" />
            </svg>
          </span>
          <span class="text-yellow-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path d="M9.049 2.927a1 1 0 011.902 0l1.286 3.971a1 1 0 00.95.69h4.146a1 1 0 01.592 1.807l-3.356 2.441a1 1 0 00-.364 1.118l1.286 3.971a1 1 0 01-1.538 1.118L10 13.347l-3.357 2.441a1 1 0 01-1.538-1.118l1.286-3.971a1 1 0 00-.364-1.118L2.671 9.395a1 1 0 01.592-1.807h4.146a1 1 0 00.95-.69L9.049 2.927z" />
            </svg>
          </span>
          <span class="text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path d="M9.049 2.927a1 1 0 011.902 0l1.286 3.971a1 1 0 00.95.69h4.146a1 1 0 01.592 1.807l-3.356 2.441a1 1 0 00-.364 1.118l1.286 3.971a1 1 0 01-1.538 1.118L10 13.347l-3.357 2.441a1 1 0 01-1.538-1.118l1.286-3.971a1 1 0 00-.364-1.118L2.671 9.395a1 1 0 01.592-1.807h4.146a1 1 0 00.95-.69L9.049 2.927z" />
            </svg>
          </span>
        </a>
      </div> --}}
      <p class="flex items-center text-gray-600 mt-2"><ion-icon class="w-5 h-5" name="location-outline"></ion-icon>{{$cdata->location}}</p>
      <p class="text-gray-600 text-[13px] ml-5">{{$cdata->address}}</p>
      <!-- Action Buttons -->
      <div class="mt-4 flex items-center justify-around">

      <button id="openinquiryModel" data-modal-target="#inquiryModel" class="p-3 bg-orange-500 text-white rounded hover:bg-orange-600 focus:outline-none flex items-center">
        @lang('userMsg.inquiry')
    </button>
        <a href="https://wa.me/9026018381" class="ml-2 px-2 py-2 bg-white text-black rounded hover:bg-green-600 hover:text-white  flex items-center  shadow-lg border-[3px] ">
          <img src="{{asset('cardimg/whatsapp2.png')}}" class="h-8 w-8 mr-2 hover:text-white" alt="WhatsApp">
          WhatsApp
        </a>
      </div>
    </div>
  </div>
</div> 
@endforeach




</div>


{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pulse Animation</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Custom keyframes for animation (if needed) */
    @keyframes pulse-custom {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.5; }
    }
    .animate-pulse-custom {
      animation: pulse-custom 2s infinite;
    }
  </style>
</head>
<body class="bg-gray-100">
  <header class=" text-white text-center p-4 animate-pulse bg-gray-600">Header</header>

  <main class="p-6 hiddent">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
      <!-- Card 1 -->
      <div class="bg-white p-4 shadow-md rounded-lg animate-pulse">
        <img src="https://via.placeholder.com/150" alt="Placeholder" class="rounded-md mb-4">
        <h3 class="text-lg font-bold  bg-gray-600">Card Title</h3>
        <p class="text-gray-600 bg-gray-600">This is a sample card description.</p>
      </div>
      <!-- Add more cards as needed -->
    </div>
  </main>

  <footer class="bg-gray-800 text-white text-center p-4 animate-pulse">Footer</footer>

  <script>
    // Simulate a slow network: Add animation for 2 seconds and remove it
    window.addEventListener('load', () => {
      setTimeout(() => {
        const animatedElements = document.querySelectorAll('.animate-pulse');
        const hidden = document.querySelectorAll('.bg-gray-600');
        animatedElements.forEach(el => {
          el.classList.remove('animate-pulse');
        });
        //hidde
        hidden.forEach(el =>{
          el.classList.remove('bg-gray-600');
        })
      }, 4000); // Remove pulse after 2 seconds
    });
  </script>
</body>
</html> --}}

