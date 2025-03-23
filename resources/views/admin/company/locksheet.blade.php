@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
   @include('_message')  
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">LockSheet</a></li>
            <li class="breadcrumb-item active" aria-current="page">Locksheet-list</li>
        </ol>
    </nav>
<div class="row">
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Locksheet-list</h4>
                {{-- <a href="{{route('pdf_generator')}}" class="btn btn-primary">Download PDF</a> --}}
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#PDFLockSheetModal">Download PDF </button>
                <div class="table-responsive pt-3 ">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>slipNO</th>
                                <th>Date</th>
                                <th>InTime</th>
                                <th>OutTime</th>
                                <th>TotalTime</th>
                                <th>WordDetail</th>
                                <th>CompanyName</th>
                                <th>GaadiNo</th>
                                <th>Created At</th>
                                <th class="flex">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getLocksheet as $value )
                                
                            
                            <tr class="table-info text-dark">
                                <td>{{$value->id}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->slipNo}}</td>
                                <td>{{$value->date}}</td>
                                <td>{{$value->inTime}}</td>
                                <td>{{$value->outTime}}</td>
                                <td>{{$value->totalTime}}</td>
                                <td class="whitespace-pre-wrap">{{$value->workdetail}}</td>
                                <td>{{$value->companyname}}</td>
                                <td>{{$value->gaadino}}</td>
                                <td>{{date('d-m-Y',strtotime($value->created_at))}}</td>
                                <td>
                                    <span class="flex justify-center items-center gap-2">
                                        <button  
                                        data-bs-toggle="modal"
                                        data-bs-viewid="{{$value->id}}" 
                                        data-bs-cmpname="{{$value->companyname}}" 
                                        data-bs-name="{{$value->name}}" 
                                        data-bs-date="{{$value->date}}" 
                                        data-bs-intime="{{$value->inTime}}" 
                                        data-bs-outtime="{{$value->outTime}}" 
                                        data-bs-totaltime="{{$value->totalTime}}" 
                                        data-bs-workdetail="{{$value->workdetail}}" 
                                        data-bs-target="#viewLockSheetModal">
                                        <i class="bi bi-eye text-primary" style="font-size:1.5rem"></i>
    
                                </button>
                                    {{-- <button style="font-size:1.5rem" > <i class="bi bi-pencil-square  text-primary"> </i> </button> --}}
                                     <a href="{{route('EditLockSheet',$value->id)}}"   >
                                        <i class="bi bi-pencil-square  text-primary" style="font-size:1.5rem"> </i>
                                    </a>
                                    {{-- <button  class="btn btn-info btn-sm me-1"   data-bs-toggle="modal" data-bs-viewid="{{$value->id}}" data-bs-target="#ViewCmpyModal">View</button> --}}
                                    {{-- <button  
                                        data-bs-toggle="modal"
                                        data-bs-viewid="{{$value->id}}" 
                                        data-bs-cmpname="{{$value->companyname}}" 
                                        data-bs-name="{{$value->name}}" 
                                        data-bs-date="{{$value->date}}" 
                                        data-bs-intime="{{$value->inTime}}" 
                                        data-bs-outtime="{{$value->outTime}}" 
                                        data-bs-totaltime="{{$value->totalTime}}" 
                                        data-bs-workdetail="{{$value->workdetail}}" 
                                        data-bs-target="#UpdateLockSheetModal">
                                        <i class="bi bi-pencil-square  text-primary" style="font-size:1.5rem"> </i>
    
                                </button> --}}

                                    <a href="{{route('deleteLocksheet',$value->id)}}" style="font-size:1.5rem" onclick="return confirm('Are You sure you want to delete?');"> <i class="bi bi-trash text-danger"></i> </a>
                                </span>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                        
                    </table>

                </div>
             <div style="padding:20px; float:right;">
                {!!
                    $getLocksheet->appends(Illuminate\Support\Facades\Request::except('page'))->links()
               !!}
             </div>
            </div>
        </div>
    </div>
</div>                    
</div>
{{--view company data--start---}}
<!-- Modal -->
<div class="modal fade" id="viewLockSheetModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewLockSheetModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="viewLockSheetModalLabel">View LockSheet Detail</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
  
         <div class="mb-2">
          <label for="name" class="text-sm sm:text-base md:text-lg lg:text-xl ">Company-Name</label>
          <p id="cmpName" class="text-gray-400 cmpValue text-sm sm:text-sm md:text-lg lg:text-xl ">adfc</p>
         </div>
         <div class="mb-2">
          <label for="name" class="text-sm sm:text-base md:text-lg lg:text-xl ">Name</label>
          <p id="locname" class="text-gray-400  cmpValue text-sm sm:text-base md:text-lg lg:text-xl ">adfc</p>
         </div>
         <div class="mb-2">
          <label for="name" class="text-sm sm:text-sm md:text-lg lg:text-xl ">Date</label>
          <p id="locdate" class="text-gray-400 cmpValue text-sm sm:text-sm md:text-lg lg:text-xl ">adfc</p>
         </div>
         <div class="mb-2">
          <label for="name" class="text-sm sm:text-sm md:text-lg lg:text-xl ">InTime</label>
          <p id="locinTime" class="text-gray-400 cmpValue text-sm sm:text-sm md:text-lg lg:text-xl ">adfc</p>
         </div>
         <div class="mb-2">
          <label for="name" class="text-sm sm:text-sm md:text-lg lg:text-xl ">OutTime</label>
          <p id="locOutTime" class="text-gray-400 cmpValue text-sm sm:text-sm md:text-lg lg:text-xl ">adfc</p>
         </div>
         <div class="mb-2">
            <label for="name" class="text-sm sm:text-sm md:text-lg lg:text-xl ">TotalTime</label>
            <p id="locTotalTime" class="text-gray-400 cmpValue text-sm sm:text-sm md:text-lg lg:text-xl ">adfc</p>
           </div>
           <div class="mb-2">
            <label for="name" class="text-sm sm:text-sm md:text-lg lg:text-xl ">Work-Detail</label>
            <p id="locWorkDetail" class="text-gray-400 cmpValue text-sm sm:text-sm md:text-lg lg:text-xl ">adfc</p>
           </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
  {{--end view company model---}} 

{{--Update company data--start---}}
{{-- <div class="modal fade" id="UpdateLockSheetModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="UpdateLockSheetModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="UpdateLockSheetModalLabel">View LockSheet Detail</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
  
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
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
  {{--end Update company model---}}                    

  {{-- //pdf generate  --}}
  <div class="modal fade" id="PDFLockSheetModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="PDFLockSheeLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="PDFLockSheeLabel">Select Date Range to Generate PDF</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        
          <form class="forms-sample" action="{{route('pdf_generator')}}" method="GET">
              @csrf
            <div class="m-3">
              <label class="form-label" for="start_date">Start Date:</label>
              <input class="form-control text-black bg-white" type="date" name="start_date" required>
            </div>
             <div class="m-3">
              <label class="form-label" for="end_date">End Date:</label>
              <input class="form-control text-black bg-white forced-color-adjust-none" type="date" name="end_date" required>
             </div>
             <div class="m-3">
              <label class="form-label" for="end_date">Select Company</label>
              <select class="form-control text-black bg-white forced-color-adjust-none"  name="companyname">
                <option value="Menzel">Menzen</option>
                <option value="sugna">sugna</option>
                <option value="marlvare">marlvare</option>
              </select>
             </div>
              <button class="btn btn-primary" type="submit">Generate PDF</button>
          </form>
        </div>
        
      </div>
    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener("DOMContentLoaded", function () {
    let updateCompany = document.getElementById("viewLockSheetModal");

    if (updateCompany) {
        updateCompany.addEventListener("show.bs.modal", function (event) {
            var button = event.relatedTarget;

            // Extract values from data attributes
            let cmpname = button.getAttribute("data-bs-cmpname");
            let name = button.getAttribute("data-bs-name");
            let date = button.getAttribute("data-bs-date");
            let inTime = button.getAttribute("data-bs-intime");
            let outTime = button.getAttribute("data-bs-outtime");
            let totalTime = button.getAttribute("data-bs-totaltime");
            let workDetail = button.getAttribute("data-bs-workdetail");

            // Populate modal with values
            document.getElementById('cmpName').innerText = cmpname;
            document.getElementById('locname').innerText = name;
            document.getElementById('locdate').innerText = date;
            document.getElementById('locinTime').innerText = inTime;
            document.getElementById('locOutTime').innerText = outTime;
            document.getElementById('locTotalTime').innerText = totalTime;
            document.getElementById('locWorkDetail').innerText = workDetail;
        });
    }
});

</script>
@endsection