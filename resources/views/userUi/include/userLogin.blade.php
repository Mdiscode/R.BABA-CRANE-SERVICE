{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Login Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
  <div class="w-full max-w-sm p-6 bg-white rounded-lg shadow-md">
    <h2 class="mb-6 text-2xl font-bold text-center text-gray-700">Login</h2>
    <form>
      <!-- Username Field -->

      <div class="mb-4">
        <label for="username" class="block mb-2 text-sm font-medium text-gray-600">Username</label>
        <input 
          type="text" 
          id="username" 
          class="w-full px-4 py-2 text-gray-700 bg-gray-100 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="Enter your username"
          required
        >
      </div>
      <!-- Password Field -->
      <div class="mb-4">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-600">Password</label>
        <input 
          type="password" 
          id="password" 
          class="w-full px-4 py-2 text-gray-700 bg-gray-100 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="Enter your password"
          required
        >
      </div>
      <!-- Login Button -->
      <div>
        <button 
          type="submit" 
          class="w-full px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
          Login
        </button>
      </div>
    </form>
  </div>
</body>
</html> --}}



<!-- The Modal -->
<div 

  id="myModal" 
  class="fixed z-[3] top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 hidden justify-center items-center">
  <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-6 relative">
    <!-- Modal Header -->
      <button data-modal-close="#myModal" id="closeModal" class="text-gray-500 hover:text-gray-700 absolute top-0 right-6" style="font-size:2.5rem;">&times;</button>
    {{-- </div> --}}

    <!-- Modal Body -->
    <div class="my-4 text-gray-600">
        <div class="w-full max-w-sm p-6 bg-white rounded-lg shadow-md">
            <h2 class="mb-6 text-2xl font-bold text-center text-gray-700">Login</h2>
            <form method="post" action="{{ route('login') }}">
              <!-- Username Field -->
             @csrf
              <div class="mb-4">
                <label for="username" class="block mb-2 text-sm font-medium text-gray-600">Email</label>
                <input name="email"
                  type="text" 
                  id="username" 
                  class="w-full px-4 py-2 text-gray-700 bg-gray-100 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                  placeholder="Enter your Email"
                  required
                >
                <span style="color:red">{{ $errors->first('email')}}</span>
              </div>
              <!-- Password Field -->
              <div class="mb-4">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-600">Password</label>
                <input 
                  name="password"
                  value="{{old('login')}}"
                  type="password" 
                  id="password" 
                  class="w-full px-4 py-2 text-gray-700 bg-gray-100 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                  placeholder="Enter your password"
                  required
                >
                <span style="color:red">{{ $errors->first('password')}}</span>
                <a class="flex justify-end" href="{{route('password.request')}}"><u>forgot-password?</u></a>
              </div>
              <!-- Login Button -->
              <div>
                <button 
                  type="submit" 
                  class="w-full px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                  Login
                </button>
                
              </div>
            </form><br>
            <p>Don't have an account? <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">Create one</a></p>

          </div>
    </div>

    
  </div>
</div>


