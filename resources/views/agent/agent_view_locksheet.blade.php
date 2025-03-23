@extends('agent.agent_dashboard')
 @section('agent')
 <div class="page-content">

   

    <div class="row profile-body ">
      <!-- left wrapper start -->
      <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
        <div class="card rounded">
          <div class="card-body">
            
            <div class="d-flex align-items-center justify-content-between mb-2">
              
              <h6 class="card-title mb-0 text-lg">CompanyName</h6>
              
            </div>
            <p class="text-muted">{{$data->companyname}}</p>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase sm:text-sm">Name</label>
              <p class="text-muted">{{$data->name}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Date</label>
              <p class="text-muted">{{date('d-m-Y',strtotime($data->created_at))}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">InTime</label>
              <p class="text-muted">{{$data->inTime}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">OutTime</label>
              <p class="text-muted">{{$data->outTime}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">TotalTime</label>
              <p class="text-muted">{{$data->totalTime}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Work-Details</label>
              <p class="text-muted">{{$data->workdetail}}</p>
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
         
 </div>
</div>
 @endsection