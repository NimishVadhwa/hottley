<x-header></x-header>
<x-nav></x-nav>

<!------- Page Main Body starts ------->
<div class="page-body">
    <!------- Container Fluid Page Body Title Starts ------->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-9">
                    <h3>All vouchers</h3>
                </div>

                <div class="col-3 text-end">
                    <button class="btn btn-secondary btn-pill" type="button" data-bs-toggle="modal"
                        data-bs-target="#add-new-voucher">
                        Add New Voucher<i class="fas fa-plus-circle ms-2"></i>
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
                                        <th>Booking Id</th>
                                        <th>Voucher Name</th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                        {{-- <th>Phone No.</th> --}}
                                        <th>Total amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <!------- Table Head  ------->

                                <!------- Table Body ------->
                                <tbody>

                                    @forelse ($all as $item)
                                        <tr>
                                            <td>{{$item->booking_id}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->check_in}}</td>
                                            <td>{{$item->check_out}}</td>
                                            {{-- <td>{{$item->phone_number}}</td> --}}
                                            <td>{{$item->total_amount}}</td>
                                            <td>
                                                <!------- Edit details Button ------->
                                                <button class="btn btn-primary me-3" type="button"
                                                    data-bs-toggle="modal" onclick="open_edit_voucher({{$item}})" data-bs-target="#edit_voucher">
                                                    <i class="far fa-edit"></i>
                                                </button>

                                                <!------- Voucher Details Button ------->
                                                <a class="btn btn-light custom-link-btn me-3"
                                                    href="{{url('admin/voucher_detail',$item->id)}}"><i class="fas fa-info"></i>
                                                </a>

                                                <!------- Download Voucher Button ------->
                                                <a class="btn btn-secondary custom-link-btn" href="{{url('admin/download_voucher',$item->id)}}">
                                                    <i class="fas fa-download"></i>
                                                </a>

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


    <!---- (Modal First) Add New Voucher Page btn Modal ---->
    <div class="modal fade" id="add-new-voucher" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="add-new-voucher" aria-hidden="true">
        <!------- Modal Dialog Box Start ------->
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Voucher</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{url('admin/add_voucher')}}" method="POST" id="add_voucher" enctype="multipart/form-data" class="theme-form">
                        @csrf
                        <div class="mb-3">
                            <label class="col-form-label" for="voucher-edit-select">Select Property</label>
                            <select class="form-select digits" id="property_id" name="property_id">
                                <option class="d-none" value="0" selected>Select Your Property</option>
                                    @forelse ($property as $prty)
                                        <option value="{{$prty->id}}">{{$prty->name}}</option>
                                    @empty
                                    @endforelse
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="name">Guest Name</label>
                            <input class="form-control" id="name" name="name" type="text" placeholder="Enter Guest Name">
                        </div>

                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="number">Guest Contact No.</label>
                            <input class="form-control" id="number" name="number" type="number" placeholder="Enter Mobile No.">
                        </div>

                        <div class=" mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <label class="col-form-label" for="check_in">Check-In</label>
                                    <input class="form-control" id="check_in" name="check_in" type="datetime-local"
                                        placeholder="Enter Check-In details">
                                </div>

                                <div class="col-6">
                                    <label class="col-form-label" for="check_out">Check-Out</label>
                                    <input class="form-control" id="check_out" name="check_out" type="datetime-local"
                                        placeholder="Enter Check-out details">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-4">
                                    <label class="col-form-label pt-0" for="adult">Total Adults</label>
                                    <input class="form-control" id="adult" name="adult" type="number"
                                        placeholder="Enter Adults Count">
                                </div>

                                <div class="col-4">
                                    <label class="col-form-label pt-0" for="kid">Total Kids</label>
                                    <input class="form-control" id="kid" name="kid" type="number" placeholder="Enter Kids Count">
                                </div>

                                <div class="col-4">
                                    <label class="col-form-label pt-0" for="infant">Total Infants</label>
                                    <input class="form-control" id="infant" name="infant" type="number"
                                        placeholder="Enter Infants Count">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-4">
                                    <label class="col-form-label pt-0" for="total">Total Amount</label>
                                    <input class="form-control" id="total" name="total" type="number"
                                        placeholder="Enter Total Amount">
                                </div>

                                <div class="col-4">
                                    <label class="col-form-label pt-0" for="advance">Advance Recived</label>
                                    <input class="form-control" id="advance" name="advance" type="number"
                                        placeholder="Enter Advance Amount">
                                </div>

                                {{-- <div class="col-4">
                                    <label class="col-form-label pt-0" for="due">Due Amount</label>
                                    <input class="form-control" id="due" name="due" type="number"
                                        placeholder="Enter Due Amount">
                                </div> --}}

                            </div>
                        </div>

                        <!------- Form Buttons ------->
                        <div class="modal-btns text-center mt-4">
                            <button class="btn btn-secondary me-4" type="button" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" type="button" onclick="add_voucher()">Add Voucher</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!------- Modal Dialog Box End ------->
    </div>

    <!---- (Modal Second) Edit Voucher btn Modal ---->
    <div class="modal fade" id="edit_voucher" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="edit_voucher" aria-hidden="true">
        <!------- Modal Dialog Box Start ------->
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Voucher</h5>
                    <button class="btn-close" type="button"  data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{url('admin/edit_voucher')}}" class="theme-form" method="POST" id="edit_data_voucher" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="v_id" name="v_id" value="0">
                        <div class="mb-3">
                            <label class="col-form-label" for="voucher-edit-select-1">Select Property</label>
                            <select class="form-select digits" id="edit_property" name="edit_property">
                                <option class="d-none" value="0" selected>Select Your Property</option>
                                    @forelse ($property as $prty)
                                        <option value="{{$prty->id}}">{{$prty->name}}</option>
                                    @empty
                                    @endforelse
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="edit_name">Guest Name</label>
                            <input class="form-control" id="edit_name" name="edit_name" type="text" placeholder="Enter Guest Name">
                        </div>

                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="edit_number">Guest Contact No.</label>
                            <input class="form-control" id="edit_number" name="edit_number" type="number" placeholder="Enter Mobile No.">
                        </div>

                        <div class=" mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <label class="col-form-label" for="edit_check_in">Check-In</label>
                                    <input class="form-control" id="edit_check_in" name="edit_check_in" type="datetime-local"
                                        placeholder="Enter Check-In details">
                                </div>

                                <div class="col-6">
                                    <label class="col-form-label" for="edit_check_out">Check-Out</label>
                                    <input class="form-control" id="edit_check_out" name="edit_check_out" type="datetime-local"
                                        placeholder="Enter Check-out details">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-4">
                                    <label class="col-form-label pt-0" for="edit_adult">Total Adults</label>
                                    <input class="form-control" id="edit_adult" name="edit_adult" type="number-1"
                                        placeholder="Enter Adults Count">
                                </div>

                                <div class="col-4">
                                    <label class="col-form-label pt-0" for="edit_kid">Total Kids</label>
                                    <input class="form-control" id="edit_kid" name="edit_kid" type="number" placeholder="Enter Kids Count">
                                </div>

                                <div class="col-4">
                                    <label class="col-form-label pt-0" for="edit_infant">Total Infants</label>
                                    <input class="form-control" id="edit_infant" name="edit_infant" type="number"
                                        placeholder="Enter Infants Count">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-4">
                                    <label class="col-form-label pt-0" for="edit_total">Total Amount</label>
                                    <input class="form-control" id="edit_total" name="edit_total" type="number"
                                        placeholder="Enter Total Amount">
                                </div>

                                <div class="col-4">
                                    <label class="col-form-label pt-0" for="edit_receive">Advance Recived</label>
                                    <input class="form-control" id="edit_receive" name="edit_receive" type="number"
                                        placeholder="Enter Advance Amount">
                                </div>

                                {{-- <div class="col-4">
                                    <label class="col-form-label pt-0" for="edit_due">Due Amount</label>
                                    <input class="form-control" id="edit_due" name="edit_due" type="number"
                                        placeholder="Enter Due Amount">
                                </div> --}}
                            </div>
                        </div>

                        <!------- Form Buttons ------->
                        <div class="modal-btns text-center mt-4">
                            <button class="btn btn-secondary me-4" type="button" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" onclick="edit_voucher()" type="button">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!------- Modal Dialog Box End ------->
    </div>


@endsection


<x-footer></x-footer>
