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
                        <div class="flex gap-4 items-center ">
                            <h4 class="card-title">Services List</h4>
                           @foreach ($about as $value)
                           <button 
                           class="btn btn-primary"
                           id="updateService" 
                           data-bs-toggle="modal"
                           data-bs-id="{{$value->id}}" 
                           data-bs-ow_name="{{$value->ow_name}}" 
                           data-bs-ad_name="{{$value->ad_name}}" 
                           data-bs-heading="{{ $value->heading}}" 
                           data-bs-insid="{{ $value->instaid}}" 
                           data-bs-faceid="{{ $value->facebookid}}" 
                           data-bs-about="{{ $value->about}}" 

                           data-bs-target="#UpdateAbout">
                           {{-- <i class="bi bi-pencil-square text-primary" style="font-size:1.5rem"></i>  --}}
                         Update-About
                   </button>
                           @endforeach
                        </div>
                        <div class="table-responsive pt-3 ">
                            <table class="table table-bordered ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Slide</th>
                                        <th>Ow_photo</th>
                                        <th>Ad_photo</th>
                                        <th>ow_name</th>
                                        <th>Ad_name</th>
                                        <th>Heading</th>
                                        <th>instaId</th>
                                        <th>facebookId</th>
                                        <th>about</th>
                                        {{-- <th>Operation</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($about as $value)
                                        <tr class="table-info text-dark">
                                            <td>{{ $value->id }}</td>
                                            <td >
                                                <img class="h-20 w-20 object-cover " src="{{ asset('serviceimg/'.$value->sphoto) }}" alt="Service Image">
                                            </td>
                                            <td >
                                                <img class="h-20 object-cover " src="{{ asset('serviceimg/'.$value->owphoto) }}" alt="Service Image">
                                            </td>
                                            <td >
                                                <img class="h-20 object-cover " src="{{ asset('serviceimg/'.$value->ad_photo) }}" alt="Service Image">
                                            </td>
                                            <td class="whitespace-nowrap">{{ $value->ow_name }}</td>
                                            <td class="whitespace-nowrap">{{ $value->ad_name }}</td>
                                            <td class="whitespace-nowrap">{{ $value->heading }}</td>
                                            <td class="whitespace-nowrap">{{ $value->instaid }}</td>
                                            <td class="whitespace-nowrap">{{ $value->facebookid }}</td>
                                            <td>{!! $value->about !!}
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <!-- Pagination Links -->
                        {{-- <div class="d-flex justify-content-center">
                            {{ $service->links() }}
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


  {{--UPDATE-SERVICES data--start---}}
<!-- Modal -->
<div class="modal fade" id="UpdateAbout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="UpdateAboutLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="UpdateAboutLabel">Update-AboutUs</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          
        </div>
        <div class="modal-body">
  
            <form class="forms-sample grid grid-cols-2 gap-2" action="{{route('update_About')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-1">
                    <input type="hidden" name="id" id="sid">
                  <label for="user" class="form-label">Owner-Name</label>
                  <input type="text" class="form-control bg-gray-700 "  placeholder="Owner-name" name="ow_name" id="oname" >
                  <span style="color:red;">{{$errors->first('stitle')}}</span>
                </div>
                <div class="mb-1">
                  <label for="user" class="form-label">Administrator-Name</label>
                  <input type="text" class="form-control bg-gray-700 "  placeholder="Administrator-Name" name="ad_name" id="aname" >
                  <span style="color:red;">{{$errors->first('stitle')}}</span>
                </div>
                <div class="mb-1">
                    <label for="user" class="form-label">insta-Id</label>
                    <input type="text" class="form-control bg-gray-700 "  placeholder="Title" name="instaid" id="instaid" >
                    <span style="color:red;">{{$errors->first('stitle')}}</span>
                  </div>
                  <div class="mb-1">
                    <label for="user" class="form-label">Facebook-id</label>
                    <input type="text" class="form-control bg-gray-700 "  placeholder="Title" name="facebookid" id="facebookid" >
                    <span style="color:red;">{{$errors->first('stitle')}}</span>
                  </div>
                  <div class="mb-1 col-span-2">
                    <label for="user" class="form-label">Heading-About</label>
                    <input type="text" class="form-control bg-gray-700 "  placeholder="Title" name="heading" id="heading" >
                    <span style="color:red;">{{$errors->first('stitle')}}</span>
                  </div>
                <div class="mb-3 col-span-2">
                  <label for="about" class="form-label">About-Us</label>
                  <textarea rows="8" class="form-control  bg-gray-700 text-lg" name="about" id="about"></textarea>
                  <span style="color:red;">{{$errors->first('description')}}</span>
                </div>

                <div class="mb-3 col-span-2">
                  <label for="file" class="form-label">Slide_image</label>
                  <input type="file" class="form-control  bg-gray-700 p-2 "   name="sphoto" >
                  <span style="color:red;">{{$errors->first('image')}}</span>
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">owner_image</label>
                    <input type="file" class="form-control  bg-gray-700 p-2 "   name="owphoto" >
                    <span style="color:red;">{{$errors->first('image')}}</span>
                  </div>
                  <div class="mb-3">
                    <label for="file" class="form-label">Administrator_image</label>
                    <input type="file" class="form-control  bg-gray-700 p-2 "   name="ad_photo" >
                    <span style="color:red;">{{$errors->first('image')}}</span>
                  </div>
                <div>
                    <button id="UpdateAbout" type="submit" class="btn btn-primary me-2">Update-Services</button>
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

    $('#UpdateAbout').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);

        // Extract values from data attributes
        let id = button.attr('data-bs-id');
        let ow_name = button.attr('data-bs-ow_name');
        let ad_name = button.attr('data-bs-ad_name');
        let heading = button.attr('data-bs-heading');
        let insid = button.attr('data-bs-insid');
        let faceid = button.attr('data-bs-faceid');
        let about = button.attr('data-bs-about');
        
        
        // Populate modal with values
        $("#sid").val(id);
        $('#oname').val(ow_name);
        $('#aname').val(ad_name);
        $('#heading').val(heading);
        $('#instaid').val(insid);
        $('#facebookid').val(faceid);
        $('#about').val(about);

        
    });
});
</script>

@endsection
