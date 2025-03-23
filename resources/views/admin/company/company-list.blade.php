@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
   @include('_message')  
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Company</a></li>
            <li class="breadcrumb-item active" aria-current="page">company-list</li>
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
                                <th>CompanyName</th>
                                <th>Address</th>
                                <th>Gaadi-Number</th>
                                <th>Email</th>
                                <th>Phone-Number</th>
                                <th>Created At</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getCompany as $value )
                                
                            
                            <tr class="table-info text-dark">
                                <td>{{$value->id}}</td>
                                <td>{{$value->companyname}}</td>
                                <td class="whitespace-pre-wrap break-words w-[5ch]">{{$value->address}}</td>
                                <td>{{$value->gaadino}}</td>
                                <td class="whitespace-pre-wrap break-words w-[5ch]">{{$value->email}}</td>
                                <td>{{$value->phone}}</td>
                                <td class="whitespace-nowrap">{{date('d-m-Y',strtotime($value->created_at))}}</td>
                                <td>
                                    {{-- <a href="#" class="editbtn"  style="font-size:1.5rem">
                                        <i class="bi bi-pencil-square  text-primary"></i> 
                                    </a>
                                    <a href="{{route('deleteContactus',$value->id)}}" style="font-size:1.5rem"> <i class="bi bi-trash text-danger"></i></a>
                                     --}}

                                     {{-- ///button --}}
                                     <button  class="btn btn-info btn-sm me-1"   data-bs-toggle="modal" data-bs-viewid="{{$value->id}}" data-bs-target="#ViewCmpyModal">View</button>
                                    <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-cmpyId="{{$value->id}}" data-bs-target="#UpdateCmpyModal">Update</button>
                                    <button onclick="deletecmp({{$value->id}})" class="btn btn-danger btn-sm">Delete</button>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>

                </div>
             <div style="padding:20px; float:right;">
                {!!
                    $getCompany->appends(Illuminate\Support\Facades\Request::except('page'))->links()
               !!}
             </div>
            </div>
        </div>
    </div>
</div>  {{--close row---}}
</div> {{--close page-content--}} 

  

{{-- ///update the-start-- --}}
  <!-- Modal -->
  <div class="modal fade" id="UpdateCmpyModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="UpdateCmpyLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="UpdateCmpyLabel">Update Company</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="forms-sample" id="updatecompany" >
            {{-- @csrf --}}
            <div>
              <input type="hidden" id="cid" class="form-control bg-gray-700" name="cid">
              <label for="Company" class="form-label">CompanyName</label>
              <input type="text" class="form-control bg-gray-700 "  placeholder="Company Name" name="companyname" id="cmpyName" >
              <span style="color:red;" id="errorname" class="error-message"></span><br>
            </div>
            <div>
              <label for="about" class="form-label">Address</label>
              <input class="form-control  bg-gray-700" name="address"  placeholder="Address" id="cmpyAddress">
              <span style="color:red;" id="error-address" class="error-message"></span><br>
            </div>
            <div>
              <label for="Gadinum" class="form-label">Gaadi-Number</label>
              <input type="text" class="form-control  bg-gray-700"   placeholder="Gaadi-Number" name="gaadino" id="gaadiNo">
              <span style="color:red;" id="error-gadino" class="error-message"></span><br>
            </div>
            
            <div>
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control  bg-gray-700"   placeholder="Email" name="email" id="cmpyEmail">
              <span style="color:red;" id="error-email" class="error-message"></span><br>
            </div>
            <div>
              <label for="phone" class="form-label">Phone-Number</label>
              <input type="text" class="form-control  bg-gray-700"   placeholder="Phone Number" name="phone" id="cmpyPhone">
              <span style="color:red;" id="error-phone" class="error-message"></span><br>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary me-2">
        </div>
      </form>
      </div>
    </div>
  </div>
{{-- ///update the-end-- --}}


{{--view company data--start---}}
<!-- Modal -->
<div class="modal fade" id="ViewCmpyModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ViewCmpyLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ViewCmpyLabel">View Company</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

       <div class="mb-2">
        <label for="name" class="text-sm sm:text-base md:text-lg lg:text-xl ">Company-Name</label>
        <p id="viewcmpName" class="text-gray-400 cmpValue text-sm sm:text-sm md:text-lg lg:text-xl ">adfc</p>
       </div>
       <div class="mb-2">
        <label for="name" class="text-sm sm:text-base md:text-lg lg:text-xl ">Company-Address</label>
        <p id="viewcmpAddress" class="text-gray-400  cmpValue text-sm sm:text-base md:text-lg lg:text-xl ">adfc</p>
       </div>
       <div class="mb-2">
        <label for="name" class="text-sm sm:text-sm md:text-lg lg:text-xl ">Gaadi-Number</label>
        <p id="viewcmpGaadino" class="text-gray-400 cmpValue text-sm sm:text-sm md:text-lg lg:text-xl ">adfc</p>
       </div>
       <div class="mb-2">
        <label for="name" class="text-sm sm:text-sm md:text-lg lg:text-xl ">Company-Email</label>
        <p id="viewcmpEmail" class="text-gray-400 cmpValue text-sm sm:text-sm md:text-lg lg:text-xl ">adfc</p>
       </div>
       <div class="mb-2">
        <label for="name" class="text-sm sm:text-sm md:text-lg lg:text-xl ">Company-Phone Number</label>
        <p id="viewcmpPhone" class="text-gray-400 cmpValue text-sm sm:text-sm md:text-lg lg:text-xl ">adfc</p>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary me-2">
      </div>
    </div>
  </div>
</div>
{{--end view company model---}}

@endsection
