<div class=" col-md-2 col-sm-2" style="background: white;">
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
                    <img style="height:100px;" src="{{ Auth::user()->avatar }}" class="img-responsive img-circle"
                        alt="" />
                    <span class="dashboard-user-status bg-success"></span>
                </div>
                <h4>{{ Auth::user()->name }}</h4>
            </div>
            <ul class="nav" id="main-menu">
                <li class="active">
                    <a href="#"><i class="fa fa-dashboard" aria-hidden="true"></i>Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('Profile_Cus') }}"><i class="fa fa-clone" aria-hidden="true"></i>
                        Profile</a>
                </li>
                <li>
                    <a href="{{ route('GetTourBookHistory') }}"><i class="fa fa-fw fa-paper-plane-o"
                            aria-hidden="true"></i>Lịch Sử Đặt Tour</a>
                </li>
                <li >
                    <a href="{{ route('guider_book_history') }}"><i class="fa fa-fw fa-plane"
                            aria-hidden="true"></i>Lịch Sử Đặt Guider</a>
                </li>
                <li >
                    <a href="{{ route('get_addblog_user') }}"><i class="fa fa-fw fa-paint-brush"
                            aria-hidden="true"></i>Đăng Bài Blog</a>
                </li>
                <li >
                    <a href="{{ route('list_blog_user') }}"><i class="fa fa-fw fa-list-ul" aria-hidden="true"></i>Danh Sách Bài Đăng Blog</a>
                </li>
                <li>
                    <a href="{{ route('UpdatePassWord') }}"><i class="fa fa-fw fa-cloud-upload" aria-hidden="true"></i>Cập
                        Nhật Mật Khẩu</a>
                </li>

                <li class="log-off">
                    <a href="{{ route('logout_cus') }}"><i class="fa fa-power-off"
                            aria-hidden="true"></i>Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- /. NAV SIDE  -->
</div>