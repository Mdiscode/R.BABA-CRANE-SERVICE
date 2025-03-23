@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
   @include('_message')  
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">users</a></li>
            <li class="breadcrumb-item active" aria-current="page">User-contactUs</li>
        </ol>
    </nav>
<div class="row">
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">ContactUs List</h4>
                <div class="table-responsive pt-3 ">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>FullName</th>
                                <th>PhoneNumber</th>
                                <th>Email</th>
                                <th>CompanyName</th>
                                <th>CraneType</th>
                                <th>Created At</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contactData as $value )
                                
                            
                            <tr class="table-info text-dark">
                                <td>{{$value->id}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->phoneNumber}}</td>
                                <td>{{$value->email}}</td>
                                <td>{{$value->company}}</td>
                                <td>{{$value->craneType}}</td>
                                <td>{{date('d-m-Y',strtotime($value->created_at))}}</td>
                                <td>
                                    <a href="{{route('admin.delete_contactus',$value->id)}}" onclick="return confirm('Are you sure you want to Delete!')" style="font-size:1.5rem">
                                         <i class="bi bi-trash text-danger"></i></a>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
             <div style="padding:20px; float:right;">
                {!!
                    $contactData->appends(Illuminate\Support\Facades\Request::except('page'))->links()
               !!}
             </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
