@extends('admin.admin_dashboard')
 @section('admin')
 <div class="page-content">

  
    {{-- alert message  --}}
     @include('_message')  
    <div class="row profile-body ">


      {{-- middle wrapper start  --}}
      <div class="col-md-8 col-xl-9 middle-wrapper">
        
        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            
            <div class="card">
              <div class="card-body">
                
                <h6 class="card-title">Add-Data-To-Card</h6>
      
                <form class="forms-sample" action="{{route('admin.storeCardData')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label for="user" class="form-label">Title</label>
                    <input type="text" class="form-control bg-gray-700 "  placeholder="Title" name="title" >
                    <span style="color:red;">{{$errors->first('title')}}</span>
                  </div>
                  <div class="mb-3">
                    <label for="about" class="form-label">Description</label>
                    <textarea class="form-control  bg-gray-700" name="description" ></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" class="form-control  bg-gray-700" id="location"  placeholder="location" name="location">
                    <span style="color:red;">{{ $errors->first('location')}}</span>
                  </div>
                  
                  <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control  bg-gray-700"   placeholder="PhoneNumber" name="phone">
                    <span style="color:red;">{{$errors->first('phone')}}</span>
                  </div>
                  <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control  bg-gray-700"   placeholder="address" name="address">
                    <span style="color:red;">{{$errors->first('address')}}</span>
                  </div>
                  <div class="mb-3">
                    <label for="file" class="form-label">Image</label>
                    <input type="file" class="form-control  bg-gray-700 p-2 "   name="image">
                    <span style="color:red;">{{$errors->first('image')}}</span>
                  </div>
                  
                  <button type="submit" class="btn btn-primary me-2">AddCardData</button>
                  
                </form>
      
              </div>
            </div>
          </div>
        </div>
      </div>

    {{-- </div> --}}
      {{-- middle wrapper end  --}}
         
 </div>
</div>
 @endsection