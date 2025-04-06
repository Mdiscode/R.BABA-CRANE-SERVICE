@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        {{-- --alert-message--- --}}
        @include('_message')
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">users</a></li>
                <li class="breadcrumb-item active" aria-current="page">User-CardData</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">CardData List</h4>
                        <div class="table-responsive pt-3 ">
                            <table class="table table-bordered ">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>location</th>
                                        <th>phone-No</th>
                                        <th>Address</th>
                                        <th>Created At</th>
                                        <th>Operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getCardData as $value)
                                        <tr class="table-info text-dark">
                                            <td>{{ $value->id }}</td>
                                            <td>
                                                <img class="w-[4rem] md:w-[8rem] h-full"
                                                    src="{{ asset('cardimg/' . $value->image) }}" alt="">
                                            </td>

                                            <td>{{ $value->title }}</td>
                                            <td class="whitespace-pre-wrap break-words w-[30ch]">{!! $value->description !!}
                                            </td>
                                            <td>{{ $value->location }}</td>
                                            <td><a href="tel:{{ $value->phoneNo }}">{{ $value->phoneNo }}</a></td>
                                            <td>{{ $value->address }}</td>
                                            <td class="whitespace-nowrap">{{ date('d-m-Y', strtotime($value->created_at)) }}
                                            </td>
                                            <td>
                                                {{-- <a href="{{route('admin.edit_cardData',$value->id)}}"> </a --}}
                                                <button  
                                                data-bs-toggle="modal"
                                                data-bs-uid="{{$value->id}}" 
                                                data-bs-title="{{$value->title}}" 
                                                data-bs-desc="{{$value->description}}" 
                                                data-bs-loc="{{$value->location}}" 
                                                data-bs-phone="{{$value->phoneNo}}" 
                                                data-bs-address="{{$value->address}}" 
                                                
                                                data-bs-target="#UpdateCardData">
                                                <i class="bi bi-pencil-square text-primary" style="font-size:1.5rem"></i> 
            
                                        </button>
                                                <a href="{{route('admin.deleteCard',$value->id)}}"  style="font-size:1.5rem" onclick="return confirm('Are your sure you want to Delete!')"> <i
                                                        class="bi bi-trash text-danger"></i></a>

                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div style="padding:20px; float:right;">
                            {!! $getCardData->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
{{--view company data--start---}}
<!-- Modal -->
<div class="modal fade" id="UpdateCardData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="UpdateCardDataLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="UpdateCardDataLabel">View Card Detail</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
  
            <form class="forms-sample" action="{{route('update_cardData')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="user" class="form-label">Title</label>
                  <input type="hidden" name="id" id="id">
                  <input type="text" class="form-control bg-gray-700 "  placeholder="Title" name="title" id="title" >
                  <span style="color:red;">{{$errors->first('title')}}</span>
                </div>
                <div class="mb-3">
                  <label for="about" class="form-label">Description</label>
                  <textarea class="form-control  bg-gray-700 h-28" name="description" id="desc" ></textarea>
                </div>
                <div class="mb-3">
                  <label for="location" class="form-label">Location</label>
                  <input type="text" class="form-control  bg-gray-700" id="location"  placeholder="location" name="location" id="location">
                  <span style="color:red;">{{ $errors->first('location')}}</span>
                </div>
                
                <div class="mb-3">
                  <label for="phone" class="form-label">Phone</label>
                  <input type="text" class="form-control  bg-gray-700"   placeholder="PhoneNumber" name="phone" id="phone">
                  <span style="color:red;">{{$errors->first('phone')}}</span>
                </div>
                <div class="mb-3">
                  <label for="address" class="form-label">Address</label>
                  <input type="text" class="form-control  bg-gray-700"   placeholder="address" name="address" id="address">
                  <span style="color:red;">{{$errors->first('address')}}</span>
                </div>
                <div class="mb-3">
                  <label for="file" class="form-label">Image</label>
                  <input type="file" class="form-control  bg-gray-700 p-2 "   name="image">
                  <span style="color:red;">{{$errors->first('image')}}</span>
                </div>
                
                <div>
                    <button type="submit" class="btn btn-primary me-2">AddCardData</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
              </form>
    
         
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div> --}}
      </div>
    </div>
</div>
  {{--end view company model---}}  
@endsection

@section('script')
<script>
    $(document).ready(function () {
    $('#UpdateCardData').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);

        // Extract values from data attributes
        let id = button.attr('data-bs-uid');
        let title = button.attr('data-bs-title');
        let desc = button.attr('data-bs-desc');
        let location = button.attr('data-bs-loc');
        let phone= button.attr('data-bs-phone');
        let address = button.attr('data-bs-address');
        
        // Populate modal with values
        $("#id").val(id);
        $('#title').val(title);
        $('#desc').val(desc);
        $('#location').val(location);
        $('#phone').val(phone);
        $('#address').val(address);
        
    });
});


</script>
@endsection
