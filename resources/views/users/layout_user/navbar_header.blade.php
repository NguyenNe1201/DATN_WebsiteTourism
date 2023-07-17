<nav class="navbar navbar-default navbar-mobile navbar-fixed light bootsnav">
    <div class="container">
        <!-- Start Logo Header Navigation -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
            <a href="#" class="navbar-brand">
                <h1 style="color:black; font-weight:650; font-size: 2.5rem;" class="m-0">Bucket<span
                        style="color: #ff4e00">Tour</span></h1>
            </a>
        </div>
        <!-- End Logo Header Navigation -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp">
                <li>
                    <a href="/home">Trang Chủ</a>
                </li>
                <li>
                    <a href="{{ route('aboutUs') }}">Chào bạn, mình là...</a>
                </li>
                <li class="dropdown">
                    <a href="{{ route('TourListSidebar') }}" class="dropdown-toggle" data-toggle="dropdown">Tour</a>
                    <ul class="dropdown-menu animated fadeOutUp">
                        @if (!empty($categorytour) && $categorytour->count() > 0)
                            @foreach ($categorytour as $key => $item)
                                <li><a
                                        href="{{ route('TourListCategory', ['id' => $item->id]) }}">{{ $item->cate_tour_name }}</a>
                                </li>
                            @endforeach
                        @else
                            <li><a href="#">không có danh mục</a></li>
                        @endif
                    </ul>
                </li>
                <li>
                    <a href="{{ route('list_tour_guider') }}">Find Guide</a>
                </li>
                <li>
                    <a href="{{ route('contactUs') }}">Liên Hệ</a>
                </li>
                <li class="dropdown">
                    <a href="{{ route('blogListSidebar') }}" class="dropdown-toggle" data-toggle="dropdown">blog</a>
                    <ul class="dropdown-menu animated fadeOutUp">
                        @if (!empty($categoryblog) && $categoryblog->count() > 0)
                            @foreach ($categoryblog as $key => $item)
                                <li><a
                                        href="{{ route('blogListCategory', ['id' => $item->id]) }}">{{ $item->dm_blog_name }}</a>
                                </li>
                            @endforeach
                        @else
                            <li><a href="#">không có danh mục</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
            @if (Auth::check() && Auth::user()->role == 0)
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown dash-link"><a href="#" class="dropdown-toggle"><img
                                src="{{ Auth::user()->avatar }}" class="img-responsive avatar"
                                alt="" />{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu left-nav">
                            <li><a href="{{ route('Profile_Cus') }}">Hồ sơ</a></li>
                            <li><a href="{{ route('GetTourBookHistory') }}">Lịch sử đặt tour</a></li>
                            <li><a href="{{ route('guider_book_history') }}">Lịch sử đặt tour guider</a></li>
                            <li><a href="{{ route('get_addblog_user') }}">Bài Đăng Blog</a></li>
                            <li><a href="{{ route('list_blog_user') }}">Danh Sách Blog</a></li>
                            <li><a href="{{ route('UpdatePassWord') }}">Cập Nhật Mật Khẩu</a></li>
                            <li><a href="{{ route('logout_cus') }}">Đăng xuất</a></li>
                        </ul>
                    </li>
                </ul>
            @else
                <ul class="nav navbar-nav navbar-right">
                    <li class="br-right"><a href="javascript:void(0)" data-toggle="modal" data-target="#signin"><i
                                class="login-icon ti-user"></i>Đăng nhập</a></li>
                    <li class="sign-up"><a class="btn-signup red-btn" href="{{ route('GetAddCus') }}"><i
                                class="fa fa-fw fa-registered"></i> Đăng ký</a></li>
                </ul>
            @endif
        </div>
    </div>
</nav>
@if (Session::has('error'))
    <div class="Authority">
        <script>
            document.addEventListener("DOMContentLoaded", function(event) {
                Swal.fire({
                    position: 'center-center',
                    icon: 'error',
                    title: '{{ Session::get('error') }}',
                    showConfirmButton: false,
                    timer: 4000
                })
            })
        </script>
    </div>
@endif
@if (Session::has('success'))
    <div class="Authority">
        <script>
            document.addEventListener("DOMContentLoaded", function(event) {
                Swal.fire({
                    position: 'center-center',
                    icon: 'success',
                    title: '{{ Session::get('success') }}',
                    showConfirmButton: false,
                    timer: 3000
                })
            })
        </script>
    </div>
@endif
<!-- Modal Login Customer -->
<div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="myModalLabel1">
            <div class="modal-body">
                <div>
                    <button style="font-size: 25px;" type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="text-center">
                    {{-- <img src="assets/img/logo.png" class="img-responsive" alt=""> --}}
                    <a href="" class="navbar-brand" style="margin-right:0px; ">
                        <h1 style="color:black; font-weight:650; font-size: 2.5rem;" class="m-0">Bucket<span
                                style="color: #ff4e00">Tour</span></h1>
                    </a>
                </div>
                <!-- Tab panels -->
                <div class="tab-content" style="margin-top: 20px;">
                    <!-- Employer Panel 1-->
                    <div class="tab-pane fade in show active" id="employer" role="tabpanel">
                        <form id="CustomerForm" action="{{ route('loginStore_cus') }}" class="jquery_valiss"
                            method="post" role="form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="email">Email Customer</label>
                                <input id="email" name="email" type="email" class="form-control"
                                    placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" name="password" type="password" class="form-control"
                                    placeholder="*********" required>
                            </div>

                            <div class="form-group">
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="remember" name="remember">
                                    <label for="remember"></label>Remember me
                                </span>
                                <a href="#" title="Forget" class="fl-right">Forgot Password?</a>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn theme-btn full-width btn-m">LogIn </button>
                            </div>
                            @csrf
                        </form>
                        <div class="log-option" style="margin-bottom: 0px;"><span>OR</span></div>
                        <div class="row mrg-bot-20">
                            <div class="col-md-6" style="text-align: center; width:100%; font-size: 15px;">
                                <p>bạn chưa có tài khoản? <a href="{{ route('GetAddCus') }}">đăng kí</a></p>
                            </div>
                        </div>
                    </div>
                    <!--/.Panel 1-->
                </div>
                <!-- Tab panels -->
            </div>
        </div>
    </div>
</div>
<!-- Modal Calender book guider -->
<div class="modal fade" id="guider_calender_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="myModalLabel1">
            <div class="modal-body">
                <div>
                    <button style="font-size: 25px;" type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="text-center">
                    <a href="" class="navbar-brand" style="margin-right:0px; ">
                        <h1 style="color:#ed8b34; font-weight:600; font-size: 2.5rem;" class="m-0">Lịnh Trình Của
                            Guider</h1>
                    </a>
                </div>
                <!-- Table canlendar guider -->
                <div class="tab-content" style="margin-top: 20px;">
                    <div class="table-responsive" id="guider_calendar_table" style="margin-top: 20px;">
                    </div>
                </div>
                <!-- Table canlendar guider -->
            </div>
        </div>
    </div>
</div>
