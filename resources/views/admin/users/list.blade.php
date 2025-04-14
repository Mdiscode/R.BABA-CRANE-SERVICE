@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
   @include('_message')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">users</a></li>
            <li class="breadcrumb-item active" aria-current="page">User-list</li>
        </ol>
    </nav>
<div class="row">
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between w-100">
                <h4 class="card-title mb-0 me-3 hidden sm:flex">Users List</h4>
            
                {{-- <form method="GET" action="{{ route('search') }}">
                    <input type="search" name="query" placeholder="Search by Name or ID" class="placeholder-whit w-96 bg-gray-600 text-white" value="{{ request('query') }}">
                    <button type="submit">Search</button>
                </form>
                 --}}
                 <form method="GET" action="{{ route('search') }}" class="flex  w-full max-w-lg mx-auto relative">
                  <!-- Search Input -->
                  <input type="search" name="query" id="searchInput" 
                      placeholder="Search by Name or ID" 
                      class="placeholder-white w-full   bg-gray-900 text-white px-4 py-2 rounded-md "
                      value="{{ request('query') }}">
              
                  <!-- Search Button -->
                  <button type="submit" class="absolute right-1 top-2 md:right-16 md:top-[1px]    bg-gray-900  text-white md:px-4 sm:py-2 rounded-md  ">
                      <span class="hidden md:flex">Search</span> <i data-feather="search" class="icon-lg me-2 sm:hidden"></i>
                  </button>

              
                  <!-- Clear Button -->
                  <a href="{{ route('admin.users.list') }}" class="sm:bg-red-500  text-white sm:px-4 sm:py-2 rounded-md ">
                      <span class="hidden sm:flex">Clear</span><i  data-feather="x" class="icon-lg me-2 sm:hidden absolute top-2"></i> 
                  </a>
              </form>
              
            </div>
            
                <div class="table-responsive pt-3 ">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>UserName</th>
                                <th>Email</th>
                                <th>Phone</th>
                                {{-- <th>Website</th> --}}
                                <th>Address</th>
                                <th>CompanyName</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($getRecord->isNotEmpty())
                            @foreach ($getRecord as $value)
                                <tr class="table-info text-dark">
                                    <td>{{$value->id}}</td>
                                    <td>
                                        <div class="w-100 d-flex justify-content-center">
                                            @if(!empty($value->photo))
                                                <img src="{{ asset('upload/'.$value->photo) }}" alt="" class="wd-70 ht-70 rounded-circle">
                                            @else 
                                                <img src="{{ asset('upload/avtar.jpg') }}" alt="" class="wd-70 ht-70 rounded-circle">
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->username}}</td>
                                    <td>{{$value->email}}</td>
                                    <td class="whitespace-nowrap">{{$value->phone}}</td>
                                    <td>{{$value->address}}</td>
                                    <td>{{$value->companyname}}</td>
                                    <td>
                                        @if ($value->role == 'admin')
                                            <span class="badge bg-info">Admin</span>
                                        @elseif($value->role == 'agent')
                                            <span class="badge bg-primary">Agent</span>  
                                        @elseif($value->role == 'user')
                                            <span class="badge bg-success">User</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($value->status == 'active')
                                            <span class="badge bg-primary">Active</span>
                                        @else
                                            <span class="badge bg-danger">InActive</span>   
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap">{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                                    <td>
                                        {{-- <button data-modal-target="#userlistModal" style="font-size:1.5rem">
                                            <i class="bi bi-pencil-square text-primary"></i> 
                                        </button> --}}
                                        <a href="{{ route('deleteRole', $value->id) }}" onclick="return confirm('Are you sure you want to delete!')" style="font-size:1.5rem">
                                            <i class="bi bi-trash text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10" class="text-center">No records found</td>
                            </tr>
                        @endif
                        

                        </tbody>
                    </table>

                </div>
             <div style="padding:20px; float:right;">
                {{-- {!!
                    $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links()
               !!} --}}
               {{ $getRecord->appends(request()->query())->links() }}

             </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
