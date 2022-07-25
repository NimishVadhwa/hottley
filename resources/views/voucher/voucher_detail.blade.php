<x-header></x-header>
<x-nav></x-nav>

<?php use Carbon\Carbon; ?>

  <!------- Page Main Body starts ------->
        <div class="page-body">
          <!------- Container Fluid Page Body Title Starts ------->
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-12">
                  <h3>Voucher Details</h3>
                </div>
              </div>
            </div>
          </div>
          <!------- Container Fluid Page Body Title End ------->

          <!------- Page body Content Container-fluid starts ------->

          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card bg-voucher border-0">
                  <div class="card-header d-flex justify-content-between align-items-center bg-voucher p-3">
                    <div class="logo-wrapper">
                      <a href="index.html" class="d-inline-block" data-bs-original-title="" title="">
                        <img class="img-fluid default-img" src="{{asset('image/logo-hottley-dark.png')}}" alt="Hottley Image">
                      </a>
                    </div>

                    <div class="voucher-tag">
                      <h3 class="m-0">Booking Voucher</h3>
                    </div>
                  </div>

                  <div class="booking-status p-4">
                    <h3 class="position-relative conform-icon confirm-heading m-0 fw-bold">Booking
                      Confirmed</i>
                    </h3>

                    <span class="d-inline-block confirm-img"><img src="{{asset('image/verified-symbol.svg')}}"
                        alt="Confirm Image" class="default-img">
                    </span>
                    <br>
                    <b>Booking Date:</b> <span> {{ Carbon::parse($all->created_at)->format('d M Y') }}</span>
                    <br>
                    <b>Booking Id: </b> <span>{{ $all->booking_id }}</span>

                  </div>

                  <div class="card-body bg-white pt-1">
                    <div class="property-card mt-5">
                      <div class="card-info-1 row justify-content-between align-items-center mb-5 pb-5">
                        <div class="property-details col-5">
                          <h4>{{$all->property->name}}</h4>

                          <p class="f-18">
                           {{$all->property->address}}
                          </p>


                          <a href="{{$all->property->location}}" class="btn btn-secondary btn-pill me-3 main-color" type="button">
                            <i class="fas fa-map-marker-alt me-2"></i> Location
                          </a>

                          <a href="tel:{{$all->property->number}}" class="btn btn-secondary btn-pill main-color" type="button">
                            <i class="fas fa-phone-alt me-2"></i> Caretaker
                          </a>
                        </div>

                        <div class="col-5">
                          <div class="property-img">
                            <img src="{{$all->property->image}}" class="default-img" alt="Property Image">
                          </div>
                        </div>
                      </div>

                      <div class="card-info-2 row gy-5 justify-content-between align-items-center">
                        <div class="col-5">
                          <div class="guest-details voucher-border">
                            <h5>Check In</h5>
                            <h4 class="fw-bold"> {{ Carbon::parse($all->check_in)->format('d M Y') }}</h4>

                            {{-- <p class="f-18 mt-2">
                              After 02:00 PM
                            </p> --}}
                          </div>
                        </div>

                        <?php 
                            $to = Carbon::createFromFormat('Y-m-d H:s:i',$all->check_in);
                            $from = Carbon::createFromFormat('Y-m-d H:s:i',$all->check_out);
                           
                        ?>

                        <div class="col-2">
                          <span class="badge rounded-pill main-color py-2 px-3 f-14"> {{$to->diffInDays($from) ?? 0}} Night </span>
                        </div>

                        <div class="col-5 text-end">
                          <div class="guest-details">
                            <h5>Check Out</h5>
                            <h4 class="fw-bold"> {{ Carbon::parse($all->check_out)->format('d M Y') }}</h4>

                            {{-- <p class="f-18 mt-2">
                              After 02:00 PM
                            </p> --}}
                          </div>
                        </div>

                        <?php $total = (int)$all->adult +(int)$all->kids + (int)$all->infants ?>
                        <div class="col-12">
                          <div class="guest-details c-footer">
                            <h5 class="fw-bold text-main">{{$all->name}} +{{$total-1}}</h5>
                            <p class="f-18 mt-2">

                                @if($all->adult)
                                    Total Adults: {{$all->adult}} <br>
                                @endif
                                @if($all->kids)
                                    Total Kids: {{$all->kids}} <br>
                                @endif

                                @if($all->infants)
                                    Total Infants: {{$all->infants}} <br>
                                @endif

                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card-body bg-white pt-1 mt-5 rounded">
                    <div class="property-card total-amount mt-5">
                      <div class="card-info-2 row gy-5 justify-content-between align-items-center">
                        <div class="col-12">
                          <div class="guest-details voucher-border row justify-content-between align-items-center">
                            <div class="col-6">
                              <h5>Total Terrif</h5>

                              <p class="f-10 mt-1">
                                ({{$to->diffInDays($from) ?? 0}} Night, {{ ($all->adult) ? $all->adult.' adults,' :'' }} {{ ($all->kids) ? $all->kids.' kids,' :'' }} {{ ($all->infants) ? $all->infants.' infants,' :'' }} )
                              </p>
                            </div>

                            <div class="col-6 text-end">
                              <h6>{{$all->total_amount}}</h6>
                            </div>

                            <div class="col-6 mt-3">
                              <h5>Advance Received</h5>
                            </div>

                            <div class="col-6 text-end">
                              <h6>{{$all->advance}}</h6>
                            </div>

                            <div class="col-6 mt-3">
                              <h5 class="fw-bold">Due on Checkin</h5>
                            </div>

                            <div class="col-6 text-end">
                              <h6>{{$all->due}}</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12 mb-4 text-center">
                <div class="logo-wrapper mb-3">
                  <a href="index.html" class="d-inline-block" data-bs-original-title="" title="">
                    <img class="img-fluid default-img" src="{{asset('image/hotley-half-logo.svg')}}" alt="Hottley Image">
                  </a>
                </div>
                <h3 class="fw-bold">Hottley Hospitality Private Limited</h3>
                <p class="m-0">435/13 1st Floor, Green Valley, Chogm Rd,</p>
                <p class="m-0">Porvorim, Goa 403501</p>
                <a href="tel:1234567890" class="m-0">Phone: +91-9982443318 |</a>
                <a href="mailto:admin@gmail.com" class="m-0">Email: booking@hottley.in</a>
              </div>
            </div>
          </div>


          <!------- Page body Content Container-fluid End ------->
        </div>
        <!------- Page Main Body End ------->


<x-footer></x-footer>