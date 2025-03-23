<header>
    <nav class="h-20 bg-gray-600 shadow md:flex md:items-center md:justify-between flex justify-between items-center">
        <div class="ml-10">
            {{-- <span class="flex  items-center px-5 "> --}}
                <span class="text-3xl cursor-pointer text-white ml-7 flex  md:hidden">
                    <ion-icon  id='menu-icon' name="menu" onclick="Menu(this)">X</ion-icon>
                </span>
                <span class="hidden md:flex text-2xl  font-[Poppins] cursor-pointer text-orange-500 md:text-[02rem]">

                    <span class="w-8 h-8 hover:bg-white hover:text-orange-500 rounded-full text-center bg-orange-500 text-white">R</span>.BABA CRANE
                    
                </span>
                {{-- </span> --}}
        </div>

        <ul
            class="absolute left-0 right-0 top-20 md:mt-48 text-center sm:mb-48 md:flex md:items-center  z-[4] md:z-auto md:static   bg-gray-600    sm:w-full md:w-auto md:py-0  md:pl-0   md:opacity-100 opacity-0  "
            >
            <ion-icon class=" md:hidden block text-3xl  ml-80 text-white" name="close"
                id="close-icon" onclick="Close(this)"></ion-icon>
            <li
                class="mx-4 text-white md:text-white  my-6 md:my-0   hover:text-orange-500  text-xl  p-2 hover:rounded">
                <a href="/">{{__('message.home')}}</a></li>
            <li
                class="mx-4 text-white md:text-white my-6 md:my-0  hover:text-orange-500     text-xl  p-2 hover:rounded">
                <a href="{{route('user.about')}}">{{__('message.about')}}</a></li>
            <li
                class="mx-4  text-white md:text-white my-6 md:my-0 hover:text-orange-500       text-xl   p-2 hover:rounded">
                <a href="{{route('user.services')}}">{{__('message.service')}}</a></li>
            
        </ul>

        
            

         <div class="md:flex flex justify-center items-center ">
                
            <div class="relative inline-block text-left w-5 mr-5 md:items-center right-16 ">

                <svg id="dropdownButton" class="md:w-6 md:h-6 text-white hover:text-orange-500 cursor-pointer" viewBox="0 0 24 24" role="img" xmlns="http://www.w3.org/2000/svg" aria-labelledby="languageIconTitle" stroke="currentColor" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none">
                    <title id="languageIconTitle">Language</title> 
                    <circle cx="12" cy="12" r="10"/>
                    <path stroke-linecap="round" d="M12,22 C14.6666667,19.5757576 16,16.2424242 16,12 C16,7.75757576 14.6666667,4.42424242 12,2 C9.33333333,4.42424242 8,7.75757576 8,12 C8,16.2424242 9.33333333,19.5757576 12,22 Z"/>
                    <path stroke-linecap="round" d="M2.5 9L21.5 9M2.5 15L21.5 15"/>
                  </svg>
                  
                
                <!-- Dropdown Menu -->
                <div id="dropdownMenu"
                    class="hidden absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                    <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="dropdownButton">
                        <a href="/setlang/hi"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                            role="menuitem">Hindi</a>
                        <a href="/setlang/en"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                            role="menuitem">English</a>
                        <a href="/setlang/gu"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                            role="menuitem">gujrati</a>
                        <a href="#"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                            role="menuitem">Marathi</a>
                    </div>
                </div>
                
            </div>


            @if(Route::has('login'))
            @auth
            
            <div class="relative inline-block text-left w-10 h-15 right-12 ">
                <!-- Dropdown Button -->
                    <img id="dropdownProfile" class="w-15 h-15 rounded-full cursor-pointer" src="{{asset('upload/avtar.jpg')}}"  alt="">
                <!-- Dropdown Menu -->
                <div id="dropdownMenu2"
                    class="hidden absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                    <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="dropdownButton">
                        <a href="#"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                            role="menuitem">Profile</a>
                        <a href="{{route('profile.edit')}}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                            role="menuitem">Edit</a>
                        <a href="{{route('user.logout')}}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                            role="menuitem">Logout</a>
                    </div>
                </div>
    
            </div>
            @else
            {{-- <div  class="mr-5 flex items-center text-white cursor-pointer">
        
                <button id="openModal" data-modal-target="#myModal" class="btn btn-primary">Login</button>
            </div> --}}
            <div class="relative inline-block text-left w-10 h-15 right-12 ">
                <!-- Dropdown Button -->
                    <button id="dropdownProfile" class="w-15 h-15 rounded-full cursor-pointer text-white" >Login</button>
                <!-- Dropdown Menu -->
                <div id="dropdownMenu2"
                    class="w-20 hidden absolute right-0 z-10 mt-2  origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none ">
                    <div class="p-3" role="menu" aria-orientation="vertical" aria-labelledby="dropdownButton" >
                        
                            <button id="openModal" data-modal-target="#myModal" class="btn btn-primary block hover:text-orange-500 ">User</button>
                            <button id="openModal" data-modal-target="#myModal" class="btn btn-primary block hover:text-orange-500">Agent</button>
                            <button id="openModal" data-modal-target="#myModal" class="btn btn-primary block  hover:text-orange-500">Admin</button>
                    </div>
                </div>
    
            </div>
           
            @endauth
            @endif
         </div>  
    </nav> 
    <script>
        // Get references to the button and menu
        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownMenu = document.getElementById('dropdownMenu');

        // Toggle the menu on button click
        dropdownButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        // Close the menu if clicking outside of it
        document.addEventListener('click', (event) => {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>

<script>
    // Get references to the button and menu
    const dropdownProfile = document.getElementById('dropdownProfile');
    const dropdownMenu2 = document.getElementById('dropdownMenu2');

    // Toggle the menu on button click
    dropdownProfile.addEventListener('click', () => {
        dropdownMenu2.classList.toggle('hidden');
    });

    // Close the menu if clicking outside of it
    document.addEventListener('click', (event) => {
        if (!dropdownProfile.contains(event.target) && !dropdownMenu2.contains(event.target)) {
            dropdownMenu2.classList.add('hidden');
        }
    });
</script>
    
</header>



{{-- 
<header>
    <nav class="p-5 bg-gray-600 shadow md:flex md:items-center md:justify-between flex justify-between items-center">
        <div>
            <span class="flex items-center px-5">
                <!-- Mobile Menu Icon -->
                <span class="text-3xl cursor-pointer text-white md:hidden block mr-4" id="menu-icon">
                    <ion-icon name="menu"></ion-icon>
                </span>

                <span class="hidden md:flex text-2xl font-[Poppins] cursor-pointer text-orange-500 md:text-[2rem]">
                    <span class="w-8 h-8 hover:bg-white hover:text-orange-500 rounded-full text-center bg-orange-500 text-white">R</span>.BABA CRANE
                </span>
            </span>
        </div>

        <!-- Navbar Links -->
        <ul id="mobile-menu"
            class=" md:items-center z-[4] md:z-auto md:static absolute bg-orange-600 w-72 top-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7 
            hidden md:block transition-all ease-in duration-500">
            
            <!-- Close Icon for Mobile -->
            <li class="md:hidden text-right pr-5">
                <span class="text-3xl cursor-pointer text-white" id="close-icon">
                    <ion-icon name="close"></ion-icon>
                </span>
            </li>

            <li class="mx-4 text-white md:text-white my-6 md:my-0 hover:bg-white hover:text-black text-xl p-2 hover:rounded">
                <a href="/">{{__('message.home')}}</a>
            </li>
            <li class="mx-4 text-white md:text-white my-6 md:my-0 hover:bg-white hover:text-black text-xl p-2 hover:rounded">
                <a href="{{route('user.about')}}">{{__('message.about')}}</a>
            </li>
            <li class="mx-4 text-white md:text-white my-6 md:my-0 hover:bg-white hover:text-black text-xl p-2 hover:rounded">
                <a href="{{route('user.services')}}">{{__('message.service')}}</a>
            </li>
        </ul>
    </nav>

    <!-- JavaScript for Mobile Menu Toggle -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const menuIcon = document.getElementById("menu-icon");
            const closeIcon = document.getElementById("close-icon");
            const mobileMenu = document.getElementById("mobile-menu");

            // Open menu
            menuIcon.addEventListener("click", () => {
                mobileMenu.classList.remove("hidden");
            });

            // Close menu
            closeIcon.addEventListener("click", () => {
                mobileMenu.classList.add("hidden");
            });

            // Close menu if clicking outside
            document.addEventListener("click", (event) => {
                if (!menuIcon.contains(event.target) && !mobileMenu.contains(event.target)) {
                    mobileMenu.classList.add("hidden");
                }
            });
        });
    </script>
</header> --}}

{{-- 
<header>
    <nav class="p-5 h-12 bg-gray-600 shadow md:flex md:items-center md:justify-between flex justify-between items-center">
        <div>
            <span class="flex items-center px-5">
                <!-- Mobile Menu Icon -->
                <span class="text-3xl cursor-pointer text-white md:hidden block mr-4">
                    <ion-icon id="menu-icon" name="menu" onclick="Menu(this)"></ion-icon>
                </span>
                <!-- Brand Logo -->
                <span class="hidden md:flex text-2xl font-[Poppins] cursor-pointer text-orange-500 md:text-[2rem]">
                    <span class="w-8 h-8 hover:bg-white hover:text-orange-500 rounded-full text-center bg-orange-500 text-white">R</span>
                    .BABA CRANE
                </span>
            </span>
        </div>

        <!-- Navigation Links -->
        <ul id="navMenu"
            class=" mt-52 md:flex md:items-center z-[4] md:z-auto md:static  bg-orange-600 w-72  md:w-auto md:py-0 py-4 md:pl-0 pl-7 md:opacity-100 opacity-0 left-[100%] transition-all ease-in duration-500">
            
            <ion-icon class="md:hidden block text-3xl  right-[10px] top-0 text-white" 
                name="close" id="close-icon" onclick="Close(this)"></ion-icon>

            <li class="mx-4 text-white my-6 md:my-0 hover:bg-white hover:text-black text-xl p-2 hover:rounded">
                <a href="/">{{ __('message.home') }}</a>
            </li>
            <li class="mx-4 text-white my-6 md:my-0 hover:bg-white hover:text-black text-xl p-2 hover:rounded">
                <a href="{{ route('user.about') }}">{{ __('message.about') }}</a>
            </li>
            <li class="mx-4 text-white my-6 md:my-0 hover:bg-white hover:text-black text-xl p-2 hover:rounded">
                <a href="{{ route('user.services') }}">{{ __('message.service') }}</a>
            </li>
        </ul>

        <!-- Right Section: Language & Profile -->
        <div class="md:flex flex justify-center items-center">
            
            <!-- Language Dropdown -->
            <div class="relative inline-block text-left w-5 mr-5 md:items-center">
                <svg id="dropdownButton" class="md:w-6 md:h-6 text-white hover:text-orange-500 cursor-pointer"
                    viewBox="0 0 24 24" role="img" xmlns="http://www.w3.org/2000/svg" aria-labelledby="languageIconTitle"
                    stroke="currentColor" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none">
                    <title id="languageIconTitle">Language</title>
                    <circle cx="12" cy="12" r="10"/>
                    <path stroke-linecap="round" d="M12,22 C14.6666667,19.5757576 16,16.2424242 16,12 C16,7.75757576 14.6666667,4.42424242 12,2 C9.33333333,4.42424242 8,7.75757576 8,12 C8,16.2424242 9.33333333,19.5757576 12,22 Z"/>
                    <path stroke-linecap="round" d="M2.5 9L21.5 9M2.5 15L21.5 15"/>
                </svg>

                <!-- Dropdown Menu -->
                <div id="dropdownMenu"
                    class="hidden absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                    <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="dropdownButton">
                        <a href="/setlang/hi" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                            Hindi
                        </a>
                        <a href="/setlang/en" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                            English
                        </a>
                        <a href="/setlang/gu" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                            Gujarati
                        </a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                            Marathi
                        </a>
                    </div>
                </div>
            </div>

            @if(Route::has('login'))
                @auth
                    <!-- Profile Dropdown -->
                    <div class="relative inline-block text-left w-10 h-15">
                        <img id="dropdownProfile" class="w-15 h-15 rounded-full cursor-pointer" 
                            src="{{ asset('upload/avtar.jpg') }}" alt="User Avatar">

                        <div id="dropdownMenu2"
                            class="hidden absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                            <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="dropdownProfile">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                    Profile
                                </a>
                                <a href="{{ route('profile.edit') }}" 
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                    Edit
                                </a>
                                <a href="{{ route('user.logout') }}" 
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                    Logout
                                </a>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Login Button -->
                    <div class="mr-5 flex items-center text-white cursor-pointer">
                        <button id="openModal" data-modal-target="#myModal" class="btn btn-primary">Login</button>
                    </div>
                @endauth
            @endif
        </div>
    </nav>
</header>

<!-- JavaScript -->
<script>
    // Toggle Mobile Menu
    function Menu(e) {
        const navMenu = document.getElementById('navMenu');
        navMenu.classList.toggle('left-[100%]');
        navMenu.classList.toggle('opacity-100');
    }

    function Close(e) {
        const navMenu = document.getElementById('navMenu');
        navMenu.classList.add('left-[100%]');
        navMenu.classList.remove('opacity-100');
    }

    // Language Dropdown
    document.getElementById('dropdownButton').addEventListener('click', () => {
        document.getElementById('dropdownMenu').classList.toggle('hidden');
    });

    // Profile Dropdown
    document.getElementById('dropdownProfile').addEventListener('click', () => {
        document.getElementById('dropdownMenu2').classList.toggle('hidden');
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', (event) => {
        if (!event.target.closest('#dropdownButton')) {
            document.getElementById('dropdownMenu').classList.add('hidden');
        }
        if (!event.target.closest('#dropdownProfile')) {
            document.getElementById('dropdownMenu2').classList.add('hidden');
        }
    });
</script> --}}

