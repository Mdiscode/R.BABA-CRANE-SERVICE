<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
  @vite('resources/css/app.css')
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
  <div class="w-full max-w-sm p-6 bg-white rounded-lg shadow-md">
    <h2 class="mb-6 text-2xl font-bold text-center text-gray-700">Register</h2>
    <form method="post" action="{{route('userRegister')}}">
      <!-- Username Field -->
         @csrf
      <div class="mb-4">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-600">Name</label>
        <input 
          type="text" 
          id="name" 
          class="w-full px-4 py-2 text-gray-700 bg-gray-100 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="Enter your name"
          name="name"
        >
        {{-- <span class="text-red-500">@error('name'){{@message}}@enderror</span> --}}
      </div>
      {{-- //email  --}}
      <div class="mb-4">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-600">Email</label>
        <input 
          type="text" 
          id="email" 
          class="w-full px-4 py-2 text-gray-700 bg-gray-100 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="Enter your Email"
          name="email"
        >
        <span>{{@errors()->first('email')}}</span>
        {{-- <span class="text-red-500">@error('email'){{@message}}@enderror</span> --}}
      </div>
      <!-- Password Field -->
      <div class="mb-4">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-600">Password</label>
        <input 
          type="password" 
          id="password" 
          class="w-full px-4 py-2 text-gray-700 bg-gray-100 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="Enter your password"
          name="password"
        >
        <span>{{@errors()->first('password')}}</span>
        {{-- <span class="text-red-500">@error('password'){{@message}}@enderror</span> --}}
      </div>
      <!-- Login Button -->
      <div>
        <button 
          type="submit" 
          class="w-full px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
          Register
        </button>
      </div>
    </form>
  </div>
</body>
</html>
