<!------- Main Container Start ------->
  <div class="main-container">
    <!------- page-wrapper Start ------->
    <div class="page-wrapper" id="pageWrapper">
      <!------- Page-main Header Start ------->
      <div class="page-main-header">
        <!------- Main-header Right Starts ------->
        <div class="main-header-right row m-0">
          <!------- Main-header Left ------->
          <div class="main-header-left">
            <!------- Site Logo Wrapper start ------->
            <div class="logo-wrapper">
              <a href="{{url('admin/dashboard')}}" class="d-inline-block">
                <img class="img-fluid default-img" src="{{asset('image/logo-hottley-dark.png')}}" alt="Hottley Image">
              </a>
            </div>
            <!------- Site Logo Wrapper End ------->

            <!------- Dark site Logo Wrapper Starts ------->
            {{-- <div class="dark-logo-wrapper">
              <a href="index.html">
                <img class="img-fluid" src="{{asset('image/dark-logo.png')}}" alt="Hottley Image">
              </a>
            </div> --}}
            <!------- Dark site Logo Wrapper Starts ------->

            <!------- SideBar Toggle ------->
            <div class="toggle-sidebar">
              <i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle"></i>
            </div>
          </div>
          <!------- Main-header End ------->

          <!------- Left-Menu Header Starts ------->
          {{-- <div class="left-menu-header col">
            <ul>
              <li>
                <form class="form-inline search-form">
                  <div class="search-bg d-none d-lg-flex"><i class="fas fa-search"></i>
                    <input class="form-control-plaintext" placeholder="Search here.....">
                  </div>
                </form><span class="d-sm-none mobile-search search-bg"><i class="fas fa-search"></i></span>
              </li>
            </ul>
          </div> --}}
          <!------- Left-Menu Header End ------->

          <!------- Left Header Right side Menu Starts ------->
          <div class="nav-right col pull-right right-menu p-0">
            <ul class="nav-menus">
              <!------- Menu First ------->
              <li>
                <a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()">
                  <i data-feather="maximize"></i>
                </a>
              </li>

              <!------- Menu Sencond ------->
              {{-- <li class="onhover-dropdown">
                <div class="notification-box">
                  <i data-feather="bell"></i><span class="dot-animated"></span>
                </div>
                <!------- Dropdown-menu of Second menu ------->
                <ul class="notification-dropdown onhover-show-div">
                  <li>
                    <p class="f-w-700 mb-0">You have 3 Notifications<span
                        class="pull-right badge badge-primary badge-pill">4</span>
                    </p>
                  </li>

                  <li class="noti-primary">
                    <div class="media">
                      <span class="notification-bg bg-light-primary"><i data-feather="activity"></i></span>
                      <div class="media-body">
                        <p>Delivery processing </p><span>10 minutes ago</span>
                      </div>
                    </div>
                  </li>

                  <li class="noti-success">
                    <div class="media"><span class="notification-bg bg-light-success"><i data-feather="file-text">
                        </i></span>
                      <div class="media-body">
                        <p>Tickets Generated</p><span>3 hour ago</span>
                      </div>
                    </div>
                  </li>

                  <li class="noti-danger">
                    <div class="media"><span class="notification-bg bg-light-danger"><i data-feather="user-check">
                        </i></span>
                      <div class="media-body">
                        <p>Delivery Complete</p><span>6 hour ago</span>
                      </div>
                    </div>
                  </li>
                </ul>
              </li> --}}

              <!------- Menu Third ------->
              {{-- <li class="onhover-dropdown"><i data-feather="message-square"></i>
                <!------- Dropdown Of third menu ------->
                <ul class="chat-dropdown onhover-show-div">
                  <li>
                    <div class="media"><img class="img-fluid rounded-circle me-3" src="./assets/img/user/4.jpg" alt="">
                      <div class="media-body"><span>Ain Chavez</span>
                        <p class="f-12 light-font">Lorem Ipsum is simply dummy...</p>
                      </div>
                      <p class="f-12">32 mins ago</p>
                    </div>
                  </li>

                  <li>
                    <div class="media"><img class="img-fluid rounded-circle me-3" src="./assets/img/user/1.jpg" alt="">
                      <div class="media-body"><span>Erica Hughes</span>
                        <p class="f-12 light-font">Lorem Ipsum is simply dummy...</p>
                      </div>
                      <p class="f-12">58 mins ago</p>
                    </div>
                  </li>

                  <li>
                    <div class="media"><img class="img-fluid rounded-circle me-3" src="./assets/img/user/2.jpg" alt="">
                      <div class="media-body"><span>Kori Thomas</span>
                        <p class="f-12 light-font">Lorem Ipsum is simply dummy...</p>
                      </div>
                      <p class="f-12">1 hr ago</p>
                    </div>
                  </li>

                  <li class="text-center"> <a class="f-w-700" href="javascript:void(0)">See All </a></li>
                </ul>
              </li> --}}

              <!------- Menu Fourth ------->
              <li class="onhover-dropdown p-0">
                <button class="btn btn-primary-light" type="button">
                  <a href="{{url('admin/logout')}}"><i data-feather="log-out"></i>Log out</a>
                </button>
              </li>

            </ul>
          </div>
          <!------- Left Header Right side Menu End ------->
          <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
        </div>
        <!------- Main-header Right End ------->
      </div>
      <!------- Page-main Header End ------->

      <!------- Page Body Start ------->
      <div class="page-body-wrapper horizontal-menu">
        <!------- Page Sidebar Start ------->
        <header class="main-nav">
          <div class="sidebar-user text-center">
            <!------- Admin Profile Picture ------->
            <img class="img-90 rounded-circle" src="{{asset('image/dashboard/1.png')}}" alt="Admin Image">
            <!------- Badge on Image ------->
            <div class="badge-bottom">
              <span class="badge badge-primary">Admin</span>
            </div>
            <!------- Admin Name ------->
            <a href="{{url('admin/dashboard')}}">
              <h6 class="mt-3 f-14 f-w-600">Yash Kalra</h6>
            </a>
            <p class="mb-0 font-roboto">Hottley Hospitality Private Limited</p>
          </div>

          <!------- Side Bar Navigation Starts ------->
          <nav>
            <div class="main-navbar">
              <div class="left-arrow" id="left-arrow">
                <i data-feather="arrow-left"></i>
              </div>

              <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                  <li class="back-btn">
                    <div class="mobile-back text-end">
                      <span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                    </div>
                  </li>

                  <!------- Side Bar Nav tab-1 ------->
                  {{-- <li class="no-icon">
                    <a class="nav-link menu-title tab-default-bg text-white" href="{{url('admin/dashboard')}}">
                      <i class="fas fa-home"></i><span>Dashboard</span>
                    </a>
                  </li> --}}

                  <li class="p-t-10">
                    <a class="nav-link menu-title link-nav" href="{{url('admin/dashboard')}}">
                      <i class="fas fa-home"></i><span>Dashboard</span>
                    </a>
                  </li>

                  <!------- Side Bar Nav tab-2 ------->
                  <li class="p-t-10">
                    <a class="nav-link menu-title link-nav" href="{{url('admin/view_property')}}">
                      <i class="fas fa-building"></i><span>Properties</span>
                    </a>
                  </li>

                  <!------- Side Bar Nav tab-3 ------->
                  <li class="p-t-10">
                    <a class="nav-link menu-title link-nav" href="{{url('admin/view_vouchers')}}">
                      <i class="fas fa-percent"></i><span>vouchers</span>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </div>
          </nav>
          <!------- Side Bar Navigation End ------->
        </header>