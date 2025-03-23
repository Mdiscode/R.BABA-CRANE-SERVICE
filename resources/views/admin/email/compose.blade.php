@extends('admin.admin_dashboard')
@section('admin')
 
{{-- ---////---  --}}
<div class="page-content">
  @include('_message') 
  <div class="row inbox-wrapper">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
           {{-- sidebar email  --}}
            @include('admin/email/_sidebar_email')
            {{-- end--sidebar--- --}}
            <div class="col-lg-9">
              <div>
                <div class="d-flex align-items-center p-3 border-bottom tx-16">
                  <span data-feather="edit" class="icon-md me-2"></span>
                  New message
                </div>
              </div>
              {{-- --form--start --}}
      <form  action="{{route('compose_post')}}" method="post">
        @csrf
      <div class="py-4">
        <div class="mb-3">
          <label class="block text-gray-400">To:</label>
          <select name="user_id" id="" class="w-full bg-gray-800 border-gray-600 text-white">
            <option value="" selected>SelectEmail [Agent and User]</option>
            @foreach ($getEmail as $value )
                <option value="{{$value->id}}">{{$value->email}}-{{$value->role}}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label class="block text-gray-400">Cc:</label>
          <input type="text" class="form-control bg-gray-800 border-gray-600" name="cc_email">
        </div>
        <div class="mb-3">
          <label class="block text-gray-400">Subject:</label>
          <input class="w-full border p-2 rounded bg-gray-800 text-white border-gray-600" type="text" name="subject">
        </div>
        <div class="mb-3">
          <label class="block text-gray-400">Message:</label>
          <textarea class="w-full border p-2 rounded bg-gray-800 text-white border-gray-600 h-32" name="message"></textarea>
        </div>
        <div class="flex space-x-2">
          <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Send</button>
          <button class="bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-700">Cancel</button>
        </div>
      </div>
    </form>  {{--form--end--}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>



 @endsection