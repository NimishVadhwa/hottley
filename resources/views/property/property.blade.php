<x-header></x-header>
<x-nav></x-nav>


    <!------- Page Main Body starts ------->
        <div class="page-body">
          <!------- Container Fluid Page Body Title Starts ------->
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-9">
                  <h3>All Properties</h3>
                </div>

                <div class="col-3 text-end">
                  <button class="btn btn-secondary btn-pill" type="button" data-bs-toggle="modal"
                    data-bs-target="#add-property-modal">
                    Add New Property<i class="fas fa-plus-circle ms-2"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!------- Container Fluid Page Body Title End ------->

          <!------- Page body Content Container-fluid starts ------->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                    <!------- DataTable Starts ------->
                    <div class="table-responsive">
                      <table class="display text-center" id="basic-1">
                        <!------- Table Head  ------->
                        <thead>
                          <tr>
                            <th>Property Image</th>
                            <th>Property Name</th>
                            <th>Address</th>
                            <th>Location</th>
                            <th>Care Taker No.</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <!------- Table Head  ------->

                        <!------- Table Body ------->
                        <tbody>
                          
                            @forelse ($all as $item)
                                
                            <tr>
                                    <td style="width: 15%;">
                                        <div class="property-img w-100">
                                            <img class="img-fluid default-img" src="{{$item->image ?? asset('image/no-image.jpg') }}" alt="image">
                                        </div>
                                    </td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->address}}</td>
                                    <td>{{$item->location}}</td>
                                    <td>{{$item->number}}</td>
                                    <td>
                                        <!------- Edit details Button ------->
                                        <button class="btn btn-primary me-3" onclick="open_property({{$item}})" type="button" data-bs-toggle="modal"
                                            data-bs-target="#edit-property">
                                            <i class="far fa-edit"></i>
                                        </button>

                                        {{-- <a class="btn btn-light custom-link-btn" href="property-details.html"><i
                                            class="fas fa-info"></i>
                                        </a> --}}

                                    </td>

                                </tr>
                                
                            @empty
                            @endforelse
                           

                      

                        </tbody>
                        <!------- Table Body ------->
                      </table>
                    </div>
                    <!------- DataTable Starts ------->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!------- Page body Content Container-fluid End ------->
        </div>
    <!------- Page Main Body End ------->



@section('model')


    <!---- (Modal First) Add New Property btn Modal ---->
    <div class="modal fade" id="add-property-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="add-property-modal" aria-hidden="true">
        <!------- Modal Dialog Box Start ------->
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Property</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{url('admin/add_property')}}" method="post" id="add_property" enctype="multipart/form-data" class="theme-form">
                        @csrf
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="property_name">Property Name</label>
                            <input class="form-control" id="name" name="name" type="text" placeholder="Enter Property Name">
                        </div>

                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="property-location">Location</label>
                            <input class="form-control" id="location" name="location" type="text"
                                placeholder="Enter Property Location">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="property-address">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3"
                                placeholder="Enter Property Address"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="cc-no">Care Taker No.</label>
                            <input class="form-control" id="number" type="number" name="number" placeholder="Enter No. Here">
                        </div>

                        <div class="mb-3 position-relative">
                            <label class="col-form-label pt-0 prop-img position-initial" for="image">Property
                                Image</label>
                            <input class="form-control d-none" onchange="openFile(event);" name="image" id="image" type="file">

                            <div class="pro-img-container mt-3">
                                <img src="{{asset('image/no-image.jpg')}}" id="image1" alt="Property Image"
                                    class="img-fluid default-img">
                            </div>
                        </div>

                        <!------- Form Buttons ------->
                        <div class="modal-btns text-center mt-4">
                            <button class="btn btn-secondary me-4" type="button" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" type="button" onclick="add_property()">Add Property</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!------- Modal Dialog Box End ------->
    </div>

    <!---- (Modal Second) Edit Property Button Modal ---->
    <div class="modal fade" id="edit-property" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="edit-property" aria-hidden="true">
        <!------- Modal Dialog Box Start ------->
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Property</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{url('admin/edit_property')}}" class="theme-form" id="edit_property" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="p_id" name="p_id" value="0">
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="edit_name">Property Name</label>
                            <input class="form-control" id="edit_name" name="edit_name" type="text" placeholder="Enter Property Name">
                        </div>

                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="edit_location">Location</label>
                            <input class="form-control" id="edit_location" name="edit_location" type="text"
                                placeholder="Enter Property Location">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="edit_address">Address</label>
                            <textarea class="form-control" id="edit_address" name="edit_address" rows="3"
                                placeholder="Enter Property Address"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="edit_number">Care Taker No.</label>
                            <input class="form-control" id="edit_number" name="edit_number" type="number" placeholder="Enter No. Here">
                        </div>

                        <div class="mb-3 position-relative">
                            <label class="col-form-label pt-0 prop-img position-initial" for="image2">Property
                                Image</label>
                            <input class="form-control d-none" id="image2" onchange="openFile2(event)" name="image2" type="file">

                            <div class="pro-img-container mt-3">
                                <img src="{{asset('image/no-image.jpg')}}" id="image3" alt="Property Image"
                                    class="img-fluid default-img">
                            </div>
                        </div>

                        <!------- Form Buttons ------->
                        <div class="modal-btns text-center mt-4">
                            <button class="btn btn-secondary me-4" type="button" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" type="button" onclick="edit_property()">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!------- Modal Dialog Box End ------->
    </div>


@endsection

<x-footer></x-footer>
