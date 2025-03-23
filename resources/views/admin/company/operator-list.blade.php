@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
   @include('_message')  
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Operator</a></li>
            <li class="breadcrumb-item active" aria-current="page">Operator-list</li>
        </ol>
    </nav>
<div class="row">
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Operator-list</h4>
                <div class="table-responsive pt-3 ">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Photo</th>
                                <th>License</th>
                                <th>Full-Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Aadhar-No</th>
                                <th>Gaadi-No</th>
                                <th>Created At</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getOperator as $value )
                                
                            
                            <tr class="table-info text-dark">
                                <td>{{$value->id}}</td>
                                <td>
                                  <img class="w-[4rem] md:w-[8rem] h-full" 
                                  src="{{ asset('upload/' . ($value->image ?? 'license.webp')) }}" 
                                  alt="not found..">
                             
                                </td>
                                <td>
                                    <img class="w-[4rem] md:w-[8rem] h-full" src="{{asset('upload/'.$value->license ?? 'avtar.jpg')}}" alt="not found..">

                                </td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->address}}</td>
                                <td>{{$value->phone}}</td>
                                <td>{{$value->gaadino}}</td>
                                <td>{{$value->aadharno}}</td>
                                <td>{{date('d-m-Y',strtotime($value->created_at))}}</td>
                                <td>
                                    {{-- <a href="/EditOperatorData/{{$value->id}}" class="editbtn"  style="font-size:1.5rem">
                                        <i class="bi bi-pencil-square  text-primary"></i> 
                                    </a> --}}
                                    <button  
                                                data-bs-toggle="modal"
                                                data-bs-oid="{{$value->id}}" 
                                                data-bs-name="{{$value->name}}" 
                                                data-bs-address="{{$value->address}}" 
                                                data-bs-phone="{{$value->phone}}" 
                                                data-bs-gaadino="{{$value->gaadino}}" 
                                                data-bs-aadhar="{{$value->aadharno}}"
                                                data-bs-image = "{{$value->image}}" 
                                                 
                                                
                                                data-bs-target="#UpdateOperator">
                                                <i class="bi bi-pencil-square text-primary" style="font-size:1.5rem"></i> 
            
                                        </button>
                                    <a href="{{route('deleteOperator',$value->id)}}" style="font-size:1.5rem" onclick="return confirm('Are you sure you want to delete!')"> <i class="bi bi-trash text-danger"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>  
                    </table>
                </div>
             <div style="padding:20px; float:right;">
                {!!
                    $getOperator->appends(Illuminate\Support\Facades\Request::except('page'))->links()
               !!}
             </div>
            </div>
        </div>
    </div>
</div>
</div>
{{--view company data--start---}}
<!-- Modal -->
<div class="modal fade" id="UpdateOperator" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="UpdateOperatorLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="UpdateOperatorLabel">Update Operator</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
  
         {{-- <h1>{{$Oper->name}}</h1> --}}
         <form class="forms-sample" action="{{route('UpdateOperator')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <input type="text" name="id"  class="form-control bg-gray-700 " id="oid">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control bg-gray-700 "  placeholder="Name" name="name" id="name" >
              <span style="color:red;">{{$errors->first('name')}}</span>
            </div>
            <div class="mb-3">
              <label for="about" class="form-label">Address</label>
              <input class="form-control  bg-gray-700" name="address"  placeholder="Address" id="address" >
            </div>
            <div class="mb-3">
              <label for="Gadinum" class="form-label">Gaadi-Number</label>
              <input type="text" class="form-control  bg-gray-700"   placeholder="Gaadi-Number" name="gaadino" id="gaadino">
              <span style="color:red;">{{ $errors->first('gaadino')}}</span>
            </div>
            
            <div class="mb-3">
              <label for="phone" class="form-label">Phone-Number</label>
              <input type="text" class="form-control  bg-gray-700"   placeholder="phoneNo" name="phone" id="phone">
              <span style="color:red;">{{$errors->first('email')}}</span>
            </div>
            <div class="mb-3">
              <label for="aadhar" class="form-label">Aadhar-No</label>
              <input type="text" class="form-control  bg-gray-700"   placeholder="Aadhar-NO" name="aadharno" id="aadhar">
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
  {{--end view company model---}}
@endsection
@section('script')
<script>
    $(document).ready(function(){
    $('#UpdateOperator').on('show.bs.modal',function(event){
        let button = $(event.relatedTarget);
        let oid = button.attr('data-bs-oid');
        let name = button.attr('data-bs-name');
        let address = button.attr('data-bs-address');
        let gaadino = button.attr('data-bs-gaadino');
        let phone = button.attr('data-bs-phone');
        let aadhar = button.attr('data-bs-aadhar');

        $('#oid').val(oid);
        $('#name').val(name);
        $('#address').val(address);
        $('#gaadino').val(gaadino);
        $('#phone').val(phone);
        $('#aadhar').val(aadhar);
    });
});
</script>
@endsection