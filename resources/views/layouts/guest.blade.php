<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body{
                background:url("{{asset('slider/farana1.jpg')}}" ) no-repeat center center fixed;
                background-size: cover;
                
            }
             /* Adding blur effect */
             .background-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                backdrop-filter: blur(10px); /* Blur effect */
                background: rgba(0, 0, 0, 0.4); /* Dark overlay */
                z-index: -1;
            }
              /* Card styling */
              .auth-card {
                background: rgba(255, 255, 255, 0.9); /* Semi-transparent white */
                backdrop-filter: blur(5px);
                border-radius: 10px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
                transition: all 0.3s ease-in-out;
            }

            .auth-card:hover {
                box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased ">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 background-overlay">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4  auth-card">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
