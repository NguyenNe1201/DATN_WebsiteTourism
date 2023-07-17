@extends('users.layout_user.app')
@section('css-layout-user')
    <style>
        ul li .t-type {
            color: #fff;
            padding: 3px 10px;
            border-radius: 2px;
            margin-right: 5px;
            font-size: 13px;
        }
        span.guider-status {
            margin: 0 10px;
        }
    </style>
@endsection
@section('PageTitle')
    @include('users.main_user.include.StartPageTitle')
@endsection
@section('content')
    <!-- =========== Start Tour Guider =================== -->
    <section class="tr-single-detail gray-bg">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-sm-8">

                    <!-- Guide Detail -->
                    <div class="row">
                        <div class="tr-single-box">
                            <div class="tr-single-header">
                                <h4><i class="ti-user"></i>Thông Tin Hướng Dẫn Viên</h4>
                            </div>
                            <div class="tr-single-body">

                                <div class="guider-box-detail">
                                    <div class="guider-box-thumb">
                                        <img src="{{ $view_detail_guider->avatar_guider }}"
                                            class="img-responsive img-circle" alt="" style="height: 100%;"/>
                                    </div>
                                    <div class="guider-box-detail-content">
                                        <h4>{{ $view_detail_guider->name_guider }}<sup class="theme-cl">Guide</sup></h4>
                                        <p><i class="fa fa-star cl-warning"></i> {{ $rating }}<span>/5</span>
                                            @if ($view_detail_guider->status_guider == 1)
                                                <span class="guider-status bg-success">Online</span>
                                            @elseif($view_detail_guider->status_guider == 0)
                                                <span class="guider-status bg-danger">Offline</span>
                                            @endif
                                        </p>
                                        <a data-toggle="modal" data-target="#guider_calender_modal" data-guiderid="{{ $view_detail_guider->id }}" class="btn btn-info"><i
                                            class="fa fa-fw fa-calendar-check-o mrg-r-5"></i>Lịch Book</a>
                                        {{-- <a href="#" class="btn btn-default">Celandar</a> --}}
                                    </div>
                                    <div class="pr-table">
                                        <ul>
                                            <li>
                                                <strong>Loại Tour:</strong>
                                                <span class="t-type bg-danger">Trekking</span>
                                                <span class="t-type bg-warning">Ẩm Thực</span>
                                                <span class="t-type bg-success">Du Lịch</span>
                                            </li>
                                            <li><strong>Email:</strong>{{ $view_detail_guider->email_guider }}</li>
                                            <li><strong>Ngày
                                                    Sinh:</strong>{{ $view_detail_guider->birthday_guider->format('d/m/Y') }}
                                            </li>

                                            <li><strong>Số Điện Thoại:</strong>{{ $view_detail_guider->phone_guider }}</li>
                                            <li><strong>Ngôn Ngữ:</strong>{{ $view_detail_guider->language_guider }}</li>
                                            <li><strong>Địa Chỉ:</strong>{{ $view_detail_guider->address_guider }}</li>
                                            <li><strong></strong></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Extra features -->
                    <div class="row">
                        <div class="tr-single-box">
                            <div class="tr-single-header">
                                <h4><i class="ti-thumb-up"></i>Ưu Đãi Cho Khách Hàng</h4>
                            </div>
                            <div class="tr-single-body">
                                <ul class="simple-features-list">
                                    <li>khách hàng lưu ý đặc biệt khi book hướng dẫn viên:</li>
                                    <li>Trên 5 ngày được giảm 2%.</li>
                                    <li>Trên 10 ngày được giảm 5%.</li>
                                    <li>Trên 15 ngày được giảm 10%.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Ratting -->
                    <div class="row">
                        <div class="tr-single-box">
                            <div class="tr-single-header">
                                <h4><i class="fa fa-star-o"></i>Rating</h4>
                            </div>
                            <div class="tr-single-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div id="review_summary">
                                            <strong>8.5</strong>
                                            <em class="cl-success">Superb</em>
                                            <small>Based on 4 reviews</small>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-lg-10 col-9">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-success" role="progressbar"
                                                        style="width: 98%" aria-valuenow="98" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-3"><small><strong>5 stars</strong></small></div>
                                        </div>
                                        <!-- /row -->
                                        <div class="row">
                                            <div class="col-lg-10 col-9">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-warning" role="progressbar"
                                                        style="width: 90%" aria-valuenow="90" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-3"><small><strong>4 stars</strong></small></div>
                                        </div>
                                        <!-- /row -->
                                        <div class="row">
                                            <div class="col-lg-10 col-9">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-primary" role="progressbar"
                                                        style="width: 60%" aria-valuenow="60" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-3"><small><strong>3 stars</strong></small></div>
                                        </div>
                                        <!-- /row -->
                                        <div class="row">
                                            <div class="col-lg-10 col-9">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-danger" role="progressbar"
                                                        style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-3"><small><strong>2 stars</strong></small></div>
                                        </div>
                                        <!-- /row -->
                                        <div class="row">
                                            <div class="col-lg-10 col-9">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 10%"
                                                        aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-3"><small><strong>1 stars</strong></small></div>
                                        </div>
                                        <!-- /row -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Description -->
                    <div class="row">
                        <div class="tr-single-box">
                            <div class="tr-single-header">
                                <h4><i class="ti-files"></i>Mô Tả</h4>
                            </div>
                            <div class="tr-single-body">
                                <p>{{ $view_detail_guider->describe_guider }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Review -->
                    <div class="row">
                        <div class="tr-single-box">
                            <div class="tr-single-header" data-toggle="collapse" data-target="#review-pannel"
                                aria-expanded="true">
                                <h4><i class="ti-write"></i>All Review<i class="ti-menu fl-right"></i></h4>
                            </div>
                            <div class="tr-single-body collapse" id="review-pannel" aria-expanded="false">
                                <!-- Single Review -->
                                @if (!empty($show_cmt_guider) && $show_cmt_guider->count() > 0)
                                    @foreach ($show_cmt_guider as $item_cmt)
                                        <div class="review-box">
                                            <div class="review-thumb">
                                                <img src="{{ $item_cmt->customer->avatar }}"
                                                    class="img-responsive img-circle" alt="" style="height: 100%;"/>
                                            </div>
                                            <div class="review-box-content">
                                                <div class="reviewer-rate">
                                                    <p><i
                                                            class="fa fa-star cl-warning"></i>{{ $item_cmt->rating_guider }}/<span>5</span>
                                                    </p>
                                                </div>
                                                <div class="review-user-info">
                                                    <h4>{{ $item_cmt->customer->name }}</h4>
                                                    <p>{{ $item_cmt->content_review }}</p>
                                                </div>
                                                <div class="review-lc text-right">
                                                    {{-- <a href="#"><i class="ti-heart"></i>87</a>
                                                    <a href="#"><i class="ti-comment"></i>52</a> --}}
                                                    <a href="#"><i
                                                            class="fa fa-fw fa-calendar-check-o"></i>{{ $item_cmt->created_at->format('d/m/Y H:i:s') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="review-box">
                                        <h4 style="text-align: center;">Chưa có review</h4>
                                    </div>
                                @endif

                            </div>
                        </div>

                    </div>
                </div>

                <!-- Sidebar Start -->
                <div class="col-md-4 col-sm-4">
                    <!-- overview & booking Form -->
                    <div class="tr-single-box">
                        <div class="tr-single-header">
                            <div class="entry-meta">
                                <div class="meta-item meta-comment fl-right">
                                    <div class="view-box">
                                        <div class="fl-right">
                                            <h4 class="font-20"><span style="color: #ed8b34"
                                                    class="theme-cl font-20">{{ number_format($view_detail_guider->price_1date, 0, '.', '.') }}
                                                    đ</span><sub>/Per Day</sub></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="meta-item meta-author">
                                    <div class="hotel-review entry-location">
                                        <span class="review-status bg-success"><i class="ti-check"></i></span>
                                        <h6><span class="cl-success font-bold">Good</span></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tr-single-body">
                            <form class="book-form book-guider-form">
                                <div class="row">
                                    <div class="col-xs-12 mrg-top-15">
                                        @if ($view_detail_guider->status_guider == 1)
                                            <a href="{{ route('get_book_guider', ['guider_id' => $view_detail_guider->id]) }}"
                                                class="book-guider-a btn btn-arrow theme-btn full-width">Book now</a>
                                        @elseif ($view_detail_guider->status_guider == 0)
                                            <a class="push-guider btn btn-arrow theme-btn full-width">Book now</a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Tourist Overview -->
                    <div class="tr-single-box">
                        <div class="tr-single-header">
                            <h4>{{ $view_detail_guider->name_guider }}<sup class="cl-success">Tour Guide</sup></h4>
                        </div>

                        <div class="tr-single-body">
                            <ul class="extra-service half">
                                <li>
                                    <div class="icon-box-icon-block">
                                        <a href="#">
                                            <div class="icon-box-round">
                                                <i class="ti-user"></i>
                                            </div>
                                            <div class="icon-box-text">
                                                {{ $count_cus_book }} Rehire
                                            </div>
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div class="icon-box-icon-block">
                                        <a href="#">
                                            <div class="icon-box-round">
                                                <i class="ti-timer"></i>
                                            </div>
                                            <div class="icon-box-text">
                                                {{ $total_day_count }} Ngày.
                                            </div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon-box-icon-block">
                                        <a href="#">
                                            <div class="icon-box-round">
                                                <i class="ti-comment-alt"></i>
                                            </div>
                                            <div class="icon-box-text">
                                                {{ $reviewCount }} Review
                                            </div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon-box-icon-block">
                                        <a href="#">
                                            <div class="icon-box-round">
                                                <i class="ti-heart"></i>
                                            </div>
                                            <div class="icon-box-text">
                                                20 Like
                                            </div>
                                        </a>
                                    </div>
                                </li>

                            </ul>
                        </div>

                    </div>
                    <!-- Share this -->
                    <div class="tr-single-box">
                        <div class="tr-single-header">
                            <h4>Chia Sẻ</h4>
                        </div>

                        <div class="tr-single-body">
                            <ul class="extra-service half">
                                <li>
                                    <div class="icon-box-icon-block">
                                        <a href="#">
                                            <div class="icon-box-round">
                                                <i class="fa fa-facebook"></i>
                                            </div>
                                            <div class="icon-box-text">
                                                Facebook
                                            </div>
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div class="icon-box-icon-block">
                                        <a href="#">
                                            <div class="icon-box-round">
                                                <i class="fa fa-google-plus"></i>
                                            </div>
                                            <div class="icon-box-text">
                                                Google plus
                                            </div>
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div class="icon-box-icon-block">
                                        <a href="#">
                                            <div class="icon-box-round">
                                                <i class="fa fa-twitter"></i>
                                            </div>
                                            <div class="icon-box-text">
                                                Twitter
                                            </div>
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div class="icon-box-icon-block">
                                        <a href="#">
                                            <div class="icon-box-round">
                                                <i class="fa fa-linkedin"></i>
                                            </div>
                                            <div class="icon-box-text">
                                                LinkedIn
                                            </div>
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div class="icon-box-icon-block">
                                        <a href="#">
                                            <div class="icon-box-round">
                                                <i class="fa fa-instagram"></i>
                                            </div>
                                            <div class="icon-box-text">
                                                Instagram
                                            </div>
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div class="icon-box-icon-block">
                                        <a href="#">
                                            <div class="icon-box-round">
                                                <i class="fa fa-pinterest"></i>
                                            </div>
                                            <div class="icon-box-text">
                                                Pinterest
                                            </div>
                                        </a>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <!-- Share this -->
                    <div class="tr-single-box">
                        <div class="tr-single-header">
                            <h4>Tour Guider Nổi Bật</h4>
                        </div>

                        <div class="tr-single-body">
                            <div class="single-side-slide">
                                <!-- Single Guide -->
                                @if (!empty($guider) && $guider->count() > 0)
                                    @foreach ($guider as $guider_tour)
                                        <div class="guides-container">

                                            <div class="guides-box">
                                                <div class="guides-img-box">
                                                    <img src="{{ $guider_tour->avatar_guider }}" class="img-responsive"
                                                        alt="" style="height: 100%;">
                                                </div>
                                                <div class="guider-detail">
                                                    <h4>{{ $guider_tour->name_guider }}</h4>
                                                    <h5 class="theme-cl font-bold">
                                                        {{ number_format($guider_tour->price_1date, 0, '.', '.') }}đ/Ngày
                                                    </h5>
                                                </div>
                                            </div>
                                            <a href="{{ route('view_guider', ['id' => $guider_tour->id]) }}" class="btn theme-btn full-width">Book Now</a>

                                        </div>
                                    @endforeach
                                @else
                                    <div class="guides-container">
                                        <h5 class="text-center">không có tour guider nổ bật</h5>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /col-md-4 -->
            </div>
        </div>
    </section>
    <!-- =========== End Tour Guider =================== -->
@endsection
@section('js-layout-user')
    <script type="text/javascript">
        const bookNowBtn = document.querySelector('.book-guider-form .book-guider-a');
        bookNowBtn.addEventListener('click', (event) => {
            event.preventDefault();

            const guiderId = window.location.href.split('/').pop();
            const searchParams = new URLSearchParams(window.location.search);
            const guider_id = searchParams.get('guider_id');
            $.ajax({
                type: "GET",
                url: "/check_login_cus",
                success: function(data) {
                    if (data.loggedIn && data.userRole == 0) {
                        window.location.href = '/home/book_guider/' + (guiderId || guider_id);
                    } else {
                        Swal.fire({
                            title: 'Thông báo',
                            text: 'Bạn cần đăng nhập!',
                            icon: 'warning',
                            time: 4000
                        });
                    }
                }
            });
        });  
    </script>
    <script type="text/javascript">
         $(document).ready(function() {
            $('.push-guider').on('click', function(event) {
                Swal.fire({
                    title: 'Thông báo',
                    text: 'Tour Guider này đang Offline, bạn không thể book now!',
                    icon: 'warning',
                    time: 4000
                });
            });
        });
    </script>
@endsection
