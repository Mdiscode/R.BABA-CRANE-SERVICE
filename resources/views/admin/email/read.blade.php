@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
      {{-- alert message  --}}
  @include('_message')   
    <div class="row inbox-wrapper">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
             @include('admin/email/_sidebar_email')
              <div class="col-lg-9">
                <div class="d-flex align-items-center justify-content-between p-3 border-bottom tx-16">
                  <div class="d-flex align-items-center">
                    <i data-feather="star" class="text-primary icon-lg me-2"></i>
                    <span>{{$data->subject}}</span>
                  </div>
                  <div class="flex">
                    <a class="me-2" type="button" data-bs-toggle="tooltip" data-bs-title="Forward"><i data-feather="share" class="text-muted icon-lg"></i></a>
                    <a class="me-2" type="button" data-bs-toggle="tooltip" data-bs-title="Print"><i data-feather="printer" class="text-muted icon-lg"></i></a>
                    <a href="{{route('admin.email.deleteRead',$data->id)}}" data-bs-toggle="tooltip" data-bs-title="Delete"><i data-feather="trash" class="text-muted icon-lg"></i></a>
                  </div>
                </div>
                <div class="d-flex align-items-center justify-content-between flex-wrap px-3 py-2 border-bottom">
                  <div class="d-flex align-items-center">
                    <div class="me-2">
                      <img src="{{asset('upload/'.$getUserName->photo)}}" alt="Avatar" class="rounded-circle img-xs">
                    </div>
                    <div class="d-flex align-items-center">
                      <a href="#" class="text-body">{{$getUserName->name}}</a> 
                      <span class="mx-2 text-muted">to</span>
                      <a href="#" class="text-body me-2">me</a>
                      <div class="actions dropdown">
                        <a href="#" data-bs-toggle="dropdown"><i data-feather="chevron-down" class="icon-lg text-muted"></i></a>
                        <div class="dropdown-menu" role="menu">
                          <a class="dropdown-item" href="#">Mark as read</a>
                          <a class="dropdown-item" href="#">Mark as unread</a>
                          <a class="dropdown-item" href="#">Spam</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item text-danger" href="#">Delete</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tx-13 text-muted mt-2 mt-sm-0">{{date('d M',strtotime($data->created_at))}},{{$data->created_at->format('h:i A')}}</div>
                </div>
                <div class="p-4 border-bottom">
                  <p>{{$data->message}}</p>
                  
                </div>
                
            </div>
              
          </div>
        </div>
      </div>
    </div>

</div>

@endsection