@extends('agent.agent_dashboard')
@section('agent')
<div class="page-content">
   {{-- @include('_message')   --}}
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
                <h4 class="card-title">Company-list</h4>
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
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($locksheetData as $value )
                                
                            
                            <tr class="table-info text-dark">
                                <td>{{$value->id}}</td>
                                <td  >{{$value->name}}</td>
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
                                    {{-- <a href="{{route('agent.view_locksheet',$value->id)}}"   style="font-size:1.5rem">
                                        <i class="bi bi-eye text-success"></i>

                                    </a>  --}}
                                    <button class="btn btn-info btn-sm me-1" 
                                    data-bs-toggle="modal"
                                    data-bs-viewid="{{$value->id}}" 
                                    data-bs-cmpname="{{$value->companyname}}" 
                                    data-bs-name="{{$value->name}}" 
                                    data-bs-date="{{$value->date}}" 
                                    data-bs-intime="{{$value->inTime}}" 
                                    data-bs-outtime="{{$value->outTime}}" 
                                    data-bs-totaltime="{{$value->totalTime}}" 
                                    data-bs-workdetail="{{$value->workdetail}}" 
                                    data-bs-target="#agent_ViewCmpyModal">
                                View
                            </button>

                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                        
                    </table>

                </div>
             {{-- <div style="padding:20px; float:right;">
                {!!
                    $locksheetData->appends(Illuminate\Support\Facades\Request::except('page'))->links()
               !!}
             </div> --}}
             <!-- Add pagination links -->
                <div class="d-flex justify-content-center">
                    {{ $locksheetData->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
                                            
{{--view company data--start---}}
<!-- Modal -->
<div class="modal fade" id="agent_ViewCmpyModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="agent_ViewCmpyLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="agent_ViewCmpyLabel">View LockSheet Detail</h5>
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
</div>
@endsection
@section('agent_script')
<script>
    document.addEventListener("DOMContentLoaded", function () {
    let updateCompany = document.getElementById("agent_ViewCmpyModal");

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
