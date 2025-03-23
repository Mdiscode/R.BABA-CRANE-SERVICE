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
                
                <h6 class="card-title">Update Operator</h6>
                
                {{-- <h1>{{$Oper->name}}</h1> --}}
                <form class="forms-sample" action="{{route('UpdateOperator')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <input type="text" name="id"  class="form-control bg-gray-700 " value="{{$Oper->id}}">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control bg-gray-700 "  placeholder="Name" name="name" value="{{$Oper->name}}" >
                    <span style="color:red;">{{$errors->first('name')}}</span>
                  </div>
                  <div class="mb-3">
                    <label for="about" class="form-label">Address</label>
                    <input class="form-control  bg-gray-700" name="address"  placeholder="Address" value="{{$Oper->address}}">
                  </div>
                  <div class="mb-3">
                    <label for="Gadinum" class="form-label">Gaadi-Number</label>
                    <input type="text" class="form-control  bg-gray-700"   placeholder="Gaadi-Number" name="gaadino" value="{{$Oper->gaadino}}">
                    <span style="color:red;">{{ $errors->first('gaadino')}}</span>
                  </div>
                  
                  <div class="mb-3">
                    <label for="phone" class="form-label">Phone-Number</label>
                    <input type="text" class="form-control  bg-gray-700"   placeholder="phoneNo" name="phone" value="{{$Oper->phone}}">
                    <span style="color:red;">{{$errors->first('email')}}</span>
                  </div>
                  <div class="mb-3">
                    <label for="aadhar" class="form-label">Aadhar-No</label>
                    <input type="text" class="form-control  bg-gray-700"   placeholder="Aadhar-NO" name="aadharno" value="{{$Oper->aadharno}}">
                    <span style="color:red;">{{$errors->first('phone')}}</span>
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
                  <button type="submit" class="btn btn-primary me-2">Update</button>
                  <a href="{{url('company/viewOperator')}}" class="btn btn-danger me-2">Cancle</a>
                </form>
                
              </div>
            </div>
          </div>
        </div>
      </div>

    {{-- </div> --}}
      {{-- middle wrapper end  --}}
         
 </div>
 {{-- @if (session('success'))
    <script>
        Swal.fire({
            title: 'Updated!',
            text: @json(session('success')),
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif --}}

</div>
 @endsection