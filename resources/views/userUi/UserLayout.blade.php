<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <title>Home</title>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
        <!-- Bootstrap CSS -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
        {{-- ---user--home---css--- --}}
        <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
        
    {{-- //jquery--- --}}
    <script src="{{asset('assets/jquery/jquery.js')}}"></script>

</head>


<body>
    
    <div class="main-wrap m-0 p-0 ">
        {{-- ---navbar---- --}}
        @include('userUi.navbar')

        <div class="h-auto w-full">
             @yield('content')
             
             @include('userUi.include.userLogin')
        </div>
    
    
    {{-- // footer  --}}
    @include('userUi.footer')
  </div>
    
    {{-- jquery cdn  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-JobWAqYk5CSjWuVV3mxgS+MmccJqkrBaDhk8SKS1BW+71dJ9gzascwzW85UwGhxiSyR7Pxhu50k+Nl3+o5I49A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

{{-- //jquery  --}}
  <script src="{{asset('assets/jquery/jquery.js')}}"></script>
  
  {{-- --slider-js-file-- --}}
  <script src="{{asset('user-js/slider.js')}}"></script>
  
  
  

  {{-- //register  --}}
  
  {{-- <script>
    $(document).ready(function() {
      // Open Modal
      $('#register').on('click', function() {
        $('#myModal').removeClass('hidden').addClass('flex');
      });
  
      // Close Modal
      $('#closeModal, #closeModalFooter').on('click', function() {
        $('#myModal').removeClass('flex').addClass('hidden');
      });
  
      // Close modal on outside click
      $(document).on('click', function(e) {
        if ($(e.target).closest('#myModal > div').length === 0 && !$(e.target).is('#register')) {
          $('#myModal').removeClass('flex').addClass('hidden');
        }
      });
    });
  </script> --}}

  {{-- ---bootstrap-js--- --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  {{-- //animation  --}}
  <script>
    document.addEventListener("DOMContentLoaded", () => {
    const placeholder = document.getElementById("placeholder");
    const content = document.getElementById("content");
  
    // Simulate content loading delay
    setTimeout(() => {
      // Replace placeholder with actual content
      placeholder.classList.add("hidden");
      content.classList.remove("hidden");
    }, 3000); // Adjust time to simulate slow network
  
    // Optional: Check for slow network
    if (navigator.connection) {
      const connectionType = navigator.connection.effectiveType;
      console.log(`Connection type: ${connectionType}`);
      if (connectionType === "2g" || navigator.connection.downlink < 0.5) {
        // Display a message or make adjustments for slow network
        console.warn("Slow network detected. Using placeholder animations.");
      }
    }
  });


  
  </script>

  
  
</body>

</html>
