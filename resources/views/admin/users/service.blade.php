@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        {{-- --alert-message--- --}}
        @include('_message')
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">users</a></li>
                <li class="breadcrumb-item active" aria-current="page">Services-list</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="flex gap-4 items-center">
                            <h4 class="card-title">Services List</h4>
                            {{-- <button id="updateService1">Click</button> --}}
                        <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#AddService">Add-Service</button>
                        </div>
                        <div class="table-responsive pt-3 ">
                            <table class="table table-bordered ">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Created At</th>
                                        <th>Operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($service as $value)
                                        <tr class="table-info text-dark">
                                            <td>{{ $value->id }}</td>
                                            <td >
                                                <img class="h-20 object-cover " src="{{ asset('serviceimg/'.$value->image) }}" alt="Service Image">
                                            </td>
                                            

                                            <td class="whitespace-nowrap">{{ $value->title }}</td>
                                            <td class="whitespace-pre-wrap break-words sm:max-w-[40ch] max-w-[20ch] ">{!! $value->description !!}
                                            </td>
                                            <td class="whitespace-nowrap">{{ date('d-m-Y', strtotime($value->created_at)) }}
                                            </td>
                                            <td>
                                                <button 
                                                id="updateService" 
                                                data-bs-toggle="modal"
                                                data-bs-sid="{{$value->id}}" 
                                                data-bs-utitle="{{$value->title}}" 
                                                data-bs-udesc="{!!$value->description !!}" 
                                                data-bs-uimg="{{ asset('serviceimg/'.$value->image) }}" 
                                                data-bs-target="#UpdateService">
                                                <i class="bi bi-pencil-square text-primary" style="font-size:1.5rem"></i> 
            
                                        </button>
                                                <a href="{{route('deleteservice',$value->id)}}"  style="font-size:1.5rem" onclick="return confirm('Are your sure you want to Delete!')"> <i
                                                        class="bi bi-trash text-danger"></i></a>

                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <!-- Pagination Links -->
                        <div class="d-flex justify-content-center">
                            {{ $service->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
{{--Add SERVICES data--start---}}
<!-- Modal -->
<div class="modal fade" id="AddService" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="AddServiceLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="AddServiceLabel">Add-Services</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
  
            <form class="forms-sample" action="{{route('Add_Services')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="user" class="form-label">Title</label>
                  <input type="text" class="form-control bg-gray-700 "  placeholder="Title" name="stitle" id="title" required>
                  <span style="color:red;">{{$errors->first('stitle')}}</span>
                </div>
                <div class="mb-3">
                  <label for="about" class="form-label">Description</label>
                  <textarea rows="8" class="form-control  bg-gray-700 " name="description" id="desc" required></textarea>
                  <span style="color:red;">{{$errors->first('description')}}</span>
                </div>
                
                <div class="mb-3">
                  <label for="file" class="form-label">Image</label>
                  <input type="file" class="form-control  bg-gray-700 p-2 "   name="image" required>
                  <span style="color:red;">{{$errors->first('image')}}</span>
                </div>
                
                <div>
                    <button type="submit" class="btn btn-primary me-2">Add-Services</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
              </form>
        </div>
      </div>
    </div>
</div>
  {{--end Add-Services model---}}  

  {{--UPDATE-SERVICES data--start---}}
<!-- Modal -->
<div class="modal fade" id="UpdateService" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="UpdateServiceLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="UpdateServiceLabel">Add-Services</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          
        </div>
        <div class="modal-body">
  
            <form class="forms-sample" action="{{route('update_Services')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <input type="hidden" name="id" id="sid">
                  <label for="user" class="form-label">Title</label>
                  <input type="text" class="form-control bg-gray-700 "  placeholder="Title" name="stitle" id="utitle" >
                  <span style="color:red;">{{$errors->first('stitle')}}</span>
                </div>
                <div class="mb-3">
                  <label for="about" class="form-label">Description</label>
                  <textarea rows="8" class="form-control  bg-gray-700 text-lg" name="description" id="udesc"></textarea>
                  <span style="color:red;">{{$errors->first('description')}}</span>
                </div>
                <div class="mb-3">
                    <img id="uimg" class="w-20 h-15" src="" alt="">
                </div>
                <div class="mb-3">
                  <label for="file" class="form-label">Image</label>
                  <input type="file" class="form-control  bg-gray-700 p-2 "   name="image" >
                  <span style="color:red;">{{$errors->first('image')}}</span>
                </div>
                
                <div>
                    <button type="submit" class="btn btn-primary me-2">Update-Services</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
              </form>
        </div>
      </div>
    </div>
</div>
  {{--end UPDATE-Services model---}}  
@endsection

@section('script')

<script>
    $(document).ready(function () {

    $('#UpdateService').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);

        // Extract values from data attributes
        let id = button.attr('data-bs-sid');
        let title = button.attr('data-bs-utitle');
        let desc = button.attr('data-bs-udesc');
        let img = button.attr('data-bs-uimg');
        
        
        // Populate modal with values
        $("#sid").val(id);
        $('#utitle').val(title);
        $('#udesc').val(desc);
        $('#uimg').attr('src',img);

        
    });
});
</script>

@endsection
