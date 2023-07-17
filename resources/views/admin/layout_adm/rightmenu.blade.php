<div class="col-lg-2 col-md-2 col-sm-3 dashboard-bg">
    <!-- /. NAV TOP  -->
    <nav class="navbar navbar-side">
        <!-- Start Logo Header Navigation -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target="#dashboard-menu">
                <i class="fa fa-bars"></i>
            </button>

        </div>
        <div class="collapse sidebar-collapse" id="dashboard-menu">
            <div class="profile-wrapper" style="padding: 15px 0px;">
                    <div class="profile-wrapper-thumb">
                        <img src="{{Auth::user()->avatar}}" class="img-responsive img-circle" alt="" />
                        <span class="dashboard-user-status bg-success"></span>
                    </div>
                    <h4>{{ Auth::user()->name }}</h4>
                </div>
            <ul class="nav" id="main-menu">

                <li class="active">
                    <a href="/admin/main"><i class="fa fa-dashboard"
                            aria-hidden="true"></i>Dashboard</a>
                </li>
                <li>
                    <a href="javascript:void(0)"><i class="fa fa-clone" aria-hidden="true"></i>
                        Blog <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('ListCategoryBlog')}}"><i class="fa fa-circle-o-notch"
                                    aria-hidden="true"></i>Quản Lý Danh Mục</a>
                        </li>
                        <li>
                            <a href="{{ route('addBlog') }}"><i class="fa fa-circle-o-notch"
                                    aria-hidden="true"></i>Thêm Bài blog</a>
                        </li>
                        <li>
                            <a href="{{ route('ListBlogContent') }}"><i class="fa fa-circle-o-notch"
                                    aria-hidden="true"></i>Danh Sách Blog</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0)"><i class="fa fa-fw fa-paper-plane-o" aria-hidden="true"></i>Tour
                        <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('ListCategoryTour') }}"><i class="fa fa-circle-o-notch"
                                    aria-hidden="true"></i>Danh Mục & Địa Điểm</a>
                        </li>
                        <li>
                            <a href="{{ route('addTour') }}"><i class="fa fa-circle-o-notch"
                                    aria-hidden="true"></i>Thêm Tour</a>
                        </li>
                        <li>
                            <a href="{{ route('ListTour') }}"><i class="fa fa-circle-o-notch"
                                    aria-hidden="true"></i>Danh Sách Tour</a>
                        </li>
                        <li>
                            <a href="{{ route('ListGalleryTour') }}"><i class="fa fa-circle-o-notch"
                                    aria-hidden="true"></i>Thư Viện Ảnh Tour</a>
                        </li>
                     
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)"><i class="ti-calendar" aria-hidden="true"></i> Booking Manager <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('ListBookTourManager') }}"><i class="fa fa-circle-o-notch"
                                    aria-hidden="true"></i>Danh Sách Đặt Tour</a>
                        </li>
                        <li>
                            <a href="{{ route('ListBookGuiderManager') }}"><i class="fa fa-circle-o-notch"
                                    aria-hidden="true"></i>Danh Sách Đặt Tour Guider</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0)"><i class="fa ti-user" aria-hidden="true"></i>Tour Guide
                        <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('get_add_tour_guider') }}"><i class="fa fa-circle-o-notch"
                                    aria-hidden="true"></i>Add Tour Guider</a>
                        </li>
                        <li>
                            <a href="{{ route('get_list_guider') }}"><i class="fa fa-circle-o-notch"
                                    aria-hidden="true"></i>List Tour Guider</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('UpdatePassWord_admin') }}"><i class="fa fa-fw fa-cloud-upload" aria-hidden="true"></i>Cập nhật mật khẩu</a>
                </li>
                <li class="log-off">
                    <a href="{{ route('logout') }}"><i class="fa fa-power-off" aria-hidden="true"></i>Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- /. NAV SIDE  -->
</div>