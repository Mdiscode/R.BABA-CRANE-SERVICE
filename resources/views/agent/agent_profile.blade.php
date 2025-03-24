@extends('agent.agent_dashboard')
 @section('agent')
 <div class="page-content">

  
    {{-- alert message  --}}
     @include('_message')  

    <div class="row profile-body ">
      <!-- left wrapper start -->
      <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
        <div class="card rounded">
          <div class="card-body">
            <div class="w-100 d-flex justify-content-center ">
              @if(!empty($getRecord))
                <img src="{{asset('upload/'.$getRecord->photo)}}" alt="" class="wd-80 ht-80 rounded-circle ">
            
                 {{-- <img src="{{asset('upload/'.$getRecord->photo)}}" alt="loading.." >  --}}
              @endif
            </div>
            <div class="d-flex align-items-center justify-content-between mb-2">
              
              <h6 class="card-title mb-0">About</h6>
              <div class="dropdown">
                <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="git-branch" class="icon-sm me-2"></i> <span class="">Update</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View all</span></a>
                </div>
              </div>
            </div>
            <p>{{Auth::user()->about}}</p>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Name</label>
              <p class="text-muted">{{Auth::user()->name}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
              <p class="text-muted">{{date('d-m-Y',strtotime(Auth::user()->created_at))}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Lives:</label>
              <p class="text-muted">{{Auth::user()->address}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
              <p class="text-muted">{{Auth::user()->email}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Website:</label>
              <p class="text-muted">{{Auth::user()->website}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">PhoneNo:</label>
              <p class="text-muted">{{Auth::user()->phone}}</p>
            </div>
            <div class="mt-3">
                <label class="tx-11 fw-bolder mb-0 text-uppercase">Company</label>
                <p class="text-muted">{{Auth::user()->companyname}}</p>
              </div>
            <div class="mt-3 d-flex social-links">
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="github"></i>
              </a>
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="twitter"></i>
              </a>
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="instagram"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
       {{-- end left wrapper  --}}

      {{-- middle wrapper start  --}}
      <div class="col-md-8 col-xl-9 middle-wrapper">
        
        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            
            <div class="card">
              <div class="card-body">
                
                <h6 class="card-title">Profile Update</h6>
      
                <form class="forms-sample" action="{{route('update_agent_profile')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label for="user" class="form-label">Name</label>
                    <input type="text" class="form-control bg-slate-900"  placeholder="Username" name="name" value="{{$getRecord->name}}">
                    <span style="color:red;">{{$errors->first('name')}}</span>
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">UserName</label>
                    <input type="text"  class="form-control bg-slate-900" id="username" placeholder="username" name="username" value="{{$getRecord->username}}">
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control bg-slate-900 " id="email"  placeholder="email" name="email" value="{{$getRecord->email}}">
                    <span style="color:red;">{{ $errors->first('email')}}</span>
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">password</label>
                    <input type="password" class="form-control bg-slate-900"   placeholder="password" name="password">
                    (Leave blank if you are not changing the password)
                  </div>
                  <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control bg-slate-900"   placeholder="Phone" name="phone" value="{{$getRecord->phone}}">
                    <span style="color:red;">{{$errors->first('phone')}}</span>
                  </div>
                  <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control bg-slate-900"   placeholder="address" name="address" value="{{$getRecord->address}}">
                    
                  </div>
                  <div class="mb-3">
                    <label for="file" class="form-label">Profile Image</label>
                    <input type="file" class="form-control  bg-slate-900"   name="photo">
                  </div>
                  <div class="mb-3">
                    <label for="about" class="form-label">About</label>
                    <textarea class="form-control bg-slate-900" name="about" >{{$getRecord->about}}</textarea>
                  </div>
                  <div class="mb-3">
                    <label for="website" class="form-label">Website</label>
                    <input type="text" class="form-control bg-slate-900"   placeholder="website" name="website" value="{{$getRecord->website}}">
                  </div>
                  <button type="submit" class="btn btn-primary me-2">Submit</button>
                  <button class="btn btn-secondary">Cancel</button>
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