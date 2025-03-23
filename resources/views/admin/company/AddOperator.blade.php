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
                
                <h6 class="card-title">Add-Operator</h6>
      
                <form class="forms-sample" action="{{route('company.StoreOperator')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label for="name" class="form-label">Full-Name</label>
                    <input type="text" class="form-control bg-gray-700 "  placeholder="Full Name" name="name" >
                    <span style="color:red;">{{$errors->first('name')}}</span>
                  </div>
                  <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input class="form-control  bg-gray-700" name="address"  placeholder="Address">
                  </div>
                  <div class="grid md:grid-cols-2 gap-x-4">
                    <div class="mb-3">
                      <label for="phone" class="form-label">Phone</label>
                      <input type="text" class="form-control  bg-gray-700"   placeholder="phone" name="phone">
                      <span style="color:red;">{{ $errors->first('phone')}}</span>
                    </div>
                    <div class="mb-3">
                      <label for="gadino" class="form-label">Gaadi-Number</label>
                      <input type="text" class="form-control  bg-gray-700"   placeholder="Gaadi Number" name="gaadino">
                      <span style="color:red;">{{$errors->first('gaadino')}}</span>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="aadhar-no" class="form-label">Aadhar-Number</label>
                    <input type="text" class="form-control  bg-gray-700"   placeholder="Aadhar-Number" name="aadharno">
                    <span style="color:red;">{{$errors->first('aadharno')}}</span>
                  </div>
                  
                  <div class="mb-3">
                    <label for="image" class="form-label">Upload-Photo</label>
                    <input type="file" class="form-control  bg-gray-700 p-2"    name="image">
                    <span style="color:red;">{{$errors->first('image')}}</span>
                  </div>
                  <div class="mb-3">
                    <label for="license" class="form-label">Upload-License</label>
                    <input type="file" class="form-control  bg-gray-700 p-2 placeholder:bg-gray-700"   name="license">
                    <span style="color:red;">{{$errors->first('license')}}</span>
                  </div>
                  
                  <button type="submit" class="btn btn-primary me-2">Add-Operator</button>
                  
                </form>
      
              </div>
            </div>
          </div>
        </div>
      </div>


         
 </div>
</div>
 @endsection