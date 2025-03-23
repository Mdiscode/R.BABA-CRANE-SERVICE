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
                
                <h6 class="card-title">Add-LockSheet</h6>
                <form class="forms-sample grid grid-cols-1" action="{{route('company.Storelocksheet')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3 ">
                    <label for="name" class="form-label">M/S-Name</label>
                    <input type="text" class="form-control bg-gray-700 "  placeholder="Name" name="name" >
                    <span style="color:red;">{{$errors->first('name')}}</span>
                  </div>
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 ">
                    <div class="mb-3">
                      <label for="slipno" class="form-label">Slip-No</label>
                      <input type="text" class="form-control  bg-gray-700" name="slipNo"  placeholder="slipno">
                    </div>
                    <div class="mb-3">
                      <label for="date" class="form-label">Date</label>
                      <input type="date" class="form-control  bg-gray-700" name="date"  placeholder="Date">
                    </div>
                  
                    <div class="mb-3">
                      <label for="in-time" class="form-label">In-Time</label>
                      <input id="intime" type="time" class="form-control  bg-gray-700"   placeholder="IN-Time" name="inTime">
                      <span style="color:red;">{{ $errors->first('inTime')}}</span>
                    </div>
                    
                    <div class="mb-3">
                      <label for="out-time" class="form-label">Out-Time</label>
                      <input id="outtime" type="time" class="form-control  bg-gray-700"   placeholder="Out-Time" name="outTime">
                      <span style="color:red;">{{$errors->first('outTime')}}</span>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="totaltime" class="form-label">Total-Time</label>
                    <input id='totaltime' type="text" class="form-control  bg-gray-700"   placeholder="Total-time" name="totalTime" readonly>
                    <span style="color:red;">{{$errors->first('totalTime')}}</span>
                  </div>
                  <div class="mb-3">
                    <label for="work-detail" class="form-label">Work-Detail</label>
                    <input type="text" class="form-control  bg-gray-700"   placeholder="Work-Detail" name="workdetail">
                    <span style="color:red;">{{$errors->first('workdetail')}}</span>
                  </div>
                  <div class="mb-3">
                    <label for="work-detail" class="form-label">Select-GaadiNO</label>
                  <select id="cranetype" name='gaadino' class="form-control  bg-gray-700 text-gray-900 text-sm  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option vlaue="Gj 15 4055" selected>Gj 15 4055</option>
                    <option vlaue="Gj 15 4665">Gj 15 4665</option>
                    <option vlaue="Gj 15 6089">Gj 15 6089</option>
                  </select>
                </div>

                  <div class="mb-3">
                    <label for="work-detail" class="form-label">Select-Company</label>
                  <select id="cranetype" name='companyname' class="form-control  bg-gray-700 text-gray-900 text-sm  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($companyNames  as $companyName)
                    <option value="{{$companyName}}" selected>{{$companyName}}</option>
                    @endforeach
                  </select>
                </div>
                  <button type="submit" class="btn btn-primary me-2">Add-LockSheet</button> 
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