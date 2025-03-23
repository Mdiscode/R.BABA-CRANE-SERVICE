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
                
                <h6 class="card-title">Add-Company</h6>
      
                <form class="forms-sample" action="{{route('company.StoreCompany')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label for="Company" class="form-label">CompanyName</label>
                    <input type="text" class="form-control bg-gray-700 "  placeholder="Company Name" name="companyname" >
                    <span style="color:red;">{{$errors->first('companyname')}}</span>
                  </div>
                  <div class="mb-3">
                    <label for="about" class="form-label">Address</label>
                    <input class="form-control  bg-gray-700" name="address"  placeholder="Address">
                  </div>
                  <div class="mb-3">
                    <label for="Gadinum" class="form-label">Gaadi-Number</label>
                    <input type="text" class="form-control  bg-gray-700"   placeholder="Gaadi-Number" name="gaadino">
                    <span style="color:red;">{{ $errors->first('gaadino')}}</span>
                  </div>
                  
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control  bg-gray-700"   placeholder="Email" name="email">
                    <span style="color:red;">{{$errors->first('email')}}</span>
                  </div>
                  <div class="mb-3">
                    <label for="phone" class="form-label">Phone-Number</label>
                    <input type="text" class="form-control  bg-gray-700"   placeholder="Phone Number" name="phone">
                    <span style="color:red;">{{$errors->first('phone')}}</span>
                  </div>
                  
                  <button type="submit" class="btn btn-primary me-2">Add-Company</button>
                  
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