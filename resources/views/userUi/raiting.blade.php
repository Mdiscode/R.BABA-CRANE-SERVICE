@extends('userUi.UserLayout')
@section('content')
<div class="p-4 max-w-2xl mx-auto">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Write a Review</h2>
   <!-- Quick Tags -->
    <div class="mb-4">
      <h3 class="text-lg font-medium text-gray-700 mb-2">Quick Tags:</h3>
      <div class="flex flex-wrap gap-2">
        <button
          class="px-3 py-1 text-sm font-medium text-gray-800 bg-gray-200 rounded hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
          Flexible appointments available
        </button>
        <button
          class="px-3 py-1 text-sm font-medium text-gray-800 bg-gray-200 rounded hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
          Speedly response
        </button>
        <button
          class="px-3 py-1 text-sm font-medium text-gray-800 bg-gray-200 rounded hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
          Easily understandable quotation
        </button>
        <button
          class="px-3 py-1 text-sm font-medium text-gray-800 bg-gray-200 rounded hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
          Affordable Prices
        </button>
      </div>
    </div>
  
    <!-- Review Input Section -->
    <div class="mb-4">
      <textarea
        class="w-full h-32 p-3 text-sm text-gray-800 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
        placeholder="Write your review here..."
        id="reviewTextarea"
      ></textarea>
    </div>
  
    <!-- AI Suggestion Section -->
    <div class="mb-4">
      <button
        id="aiSuggestBtn"
        class="px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
      >
        Let AI write 
      </button>
      <div
        id="aiSuggestion"
        class="mt-2 text-sm text-gray-600 hidden"
      >
        <!-- AI suggestion text will appear here -->
      </div>
    </div>
  
    <!-- Submit Button -->
    <div>
      <button
        class="w-full px-4 py-2 text-lg font-medium text-white bg-green-500 rounded hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500"
      >
        Submit Review
      </button>
    </div>
  </div>
@endsection
  