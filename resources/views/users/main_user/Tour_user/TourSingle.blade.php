@extends('users.layout_user.app')
@section('css-layout-user')
    <style>
        .map iframe {
            height: 100% !important;
            width: 100% !important;
        }
    </style>
@endsection
@section('PageTitle')
    @include('users.main_user.include.StartPageTitle')
@endsection
@section('content')
    <!-- ======================= Start Detail Header ===================== -->
    <section class="profile-header-nav padd-0 bb-1">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-sm-8">
                    <div class="tab" role="tabpanel">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#Overview" aria-controls="home" role="tab"
                                    data-toggle="tab"><i class="ti-user"></i>Overview</a></li>
                            <li role="presentation"><a href="#Features" aria-controls="profile" role="tab"
                                    data-toggle="tab"><i class="ti-settings"></i>Lịch Trình</a></li>
                            <li role="presentation"><a href="#Review" aria-controls="messages" role="tab"
                                    data-toggle="tab"><i class="ti-thumb-up"></i>Review</a></li>
                            <li role="presentation"><a href="#Photos" aria-controls="messages" role="tab"
                                    data-toggle="tab"><i class="ti-gallery"></i>Thư Viện Ảnh</a></li>
                        </ul>
                        <!-- Tab panes -->
                    </div>
                </div>

                {{-- <div class="col-md-4 col-sm-4">
                    <div class="fl-right">
                        <button type="button" class="btn theme-btn"><span class="fa fa-paper-plane mrg-r-10"></span>Send
                            Message</button>
                    </div>
                </div> --}}

            </div>
        </div>
    </section>
    <!-- ======================= End Detail Header ===================== -->

    <!-- ======================= Start Detail ===================== -->
    <section class="tr-single-detail gray-bg">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-sm-12">
                    <div class="tab-content tabs">

                        <div role="tabpanel" class="tab-pane fade in active" id="Overview">

                            <!-- Overview -->
                            <div class="row">
                                <div class="tr-single-box">
                                    <div class="tr-single-header">
                                        <h4><i class="fa fa-star-o"></i>Overview</h4>
                                    </div>
                                    <div class="tr-single-body">
                                        <div class="row">

                                            <div class="col-md-6 col-sm-6">
                                                <div class="list-thumb-box">
                                                    <img src="{{ $getDetail_tour->img_lgtour }}" class="img-responsive"
                                                        alt="" />
                                                    <a href="#" class="favorite-a list-like left"
                                                        data-tour-id="{{ $getDetail_tour->id }}"><i
                                                            class="ti-heart"></i></a>
                                                    <h5>{{ $rating }}/<sub class="theme-cl">5</sub></h5>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6">
                                                <div class="list-overview-detail">
                                                    <h5>{{ $getDetail_tour->tourname }}</h5>
                                                    <ul class="extra-service">
                                                        <li>
                                                            <div class="icon-box-icon-block">
                                                                <a href="#">
                                                                    <div class="icon-box-round">
                                                                        <i class=" ti-location-pin"></i>
                                                                    </div>
                                                                    <div class="icon-box-text">
                                                                        Điểm xuất phát: Hồ Chí Minh
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon-box-icon-block">
                                                                <a href="#">
                                                                    <div class="icon-box-round">
                                                                        <i class=" ti-location-pin"></i>
                                                                    </div>
                                                                    <div class="icon-box-text">
                                                                        Điểm đến:
                                                                        {{ $getDetail_tour->cate_location->location_name }}
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="icon-box-icon-block">
                                                                <a href="#">
                                                                    <div class="icon-box-round">
                                                                        <span class="ti-timer"></span>
                                                                    </div>
                                                                    <div class="icon-box-text">
                                                                        Thời gian: {{ $getDetail_tour->tour_date }} Ngày
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon-box-icon-block">
                                                                <a href="#">
                                                                    <div class="icon-box-round">
                                                                        <span class="ti-user"></span>
                                                                    </div>
                                                                    <div class="icon-box-text">
                                                                        Số người đã từng đi: {{ $regis_people_count }}
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
                                                                        Reivew: {{ $reviewCount }}
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Overview -->
                            <div class="row">
                                <div class="tr-single-box">
                                    <div class="tr-single-header">
                                        <h4><i class="fa fa-star-o"></i>Giới Thiệu</h4>
                                    </div>
                                    <div class="tr-single-body">
                                        {!! $getDetail_tour->introduce_t !!}
                                    </div>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="row">
                                <div class="tr-single-box">
                                    <div class="tr-single-header">
                                        <h4><i class="ti-comment-alt"></i>Mô Tả</h4>
                                    </div>
                                    <div class="tr-single-body">
                                        {!! $getDetail_tour->describe_t !!}
                                    </div>
                                </div>
                            </div>
                            <!-- Single Guide -->
                            {{-- <div class="row">
                                @foreach ($guide_tour as $guider)
                                    @if ($guider->id == $getDetail_tour->guider_id)
                                        <div class="tr-single-box">
                                            <div class="tr-single-header">
                                                <h4><i class="ti-user"></i>Hướng Dẫn Viên</h4>
                                            </div>
                                            <div class="tr-single-body">
                                                <div class="guider-box-detail">
                                                    <div class="guider-box-thumb">
                                                        <img src="{{ $guider->avatar_guider }}"
                                                            class="img-responsive img-circle" alt="" />
                                                    </div>
                                                    <div class="guider-box-detail-content">
                                                        <h4>{{ $guider->name_guider }}<sup class="theme-cl">Guide</sup>
                                                        </h4>
                                                        <p><span class="guider-status bg-success">Online</span>
                                                        </p>
                                                        <a href="#" class="btn btn-info">View Detail</a>
                                                        <a href="#" class="btn btn-default">Message</a>
                                                    </div>
                                                    <div class="pr-table">
                                                        <ul>
                                                            <li>
                                                                <strong>Loại Tour:</strong>
                                                                <span class="t-type bg-danger">Trekking</span>
                                                                <span class="t-type bg-warning">Ẩm Thực</span>
                                                                <span class="t-type bg-success">Du Lịch</span>
                                                            </li>
                                                            <li><strong>Email:</strong>{{ $guider->email_guider }}</li>
                                                            <li><strong>Ngôn Ngữ:</strong>{{ $guider->language_guider }}</li>
                                                            <li><strong>Ngày Sinh:</strong>{{ $guider->birthday_guider->format('d/m/Y')}}</li>
                                                            <li><strong></strong></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div> --}}
                            <!-- Amenities -->
                            <div class="row">
                                <div class="tr-single-box">
                                    <div class="tr-single-header">
                                        <h4><i class="ti-crown"></i>Tiện ích</h4>
                                    </div>
                                    <div class="tr-single-body">
                                        <ul class="amenities third">
                                            <li>Satellite TV</li>
                                            <li>Coffeemaker</li>
                                            <li>Hair Dryer</li>
                                            <li>Swimming Pool</li>
                                            <li>Room Service</li>
                                            <li>Luxury Bedding</li>
                                            <li>Good Showers</li>
                                            <li>Free Parking</li>
                                            <li>Free Wifi</li>
                                            <li>Bath towel</li>
                                            <li>Free Coffee</li>
                                            <li>Pets Allow</li>
                                            <li>Hot Water</li>
                                            <li>Attached garage </li>
                                            <li>Elevator</li>
                                            <li>Spa/Sauna</li>
                                            <li>Indoor pool </li>
                                            <li>Security cameras </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Location -->
                            <div class="row">
                                <div class="tr-single-box">
                                    <div class="tr-single-header">
                                        <h4><i class="ti-map-alt"></i>Địa Điểm</h4>
                                    </div>
                                    <div class="tr-single-body">
                                        <div class="height-350 map">
                                            {!! $getDetail_tour->location_url !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- ============ Features =================== -->
                        <div role="tabpanel" class="tab-pane fade in" id="Features">

                            <!-- About Features -->
                            <div class="row">
                                <div class="tr-single-box">
                                    <div class="tr-single-header">
                                        <h4><i class="ti-files"></i>Lịch Trình</h4>
                                    </div>
                                    <div class="tr-single-body">
                                        {!! $getDetail_tour->tourplan !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============ Review =================== -->
                        <div role="tabpanel" class="tab-pane fade in" id="Review">
                            <!-- Review -->
                            <div class="row">
                                <div class="tr-single-box">
                                    <div class="tr-single-header">
                                        <h4><i class="ti-write"></i>All Review</h4>
                                    </div>
                                    <div class="tr-single-body">

                                        <!-- Single Review -->
                                        @if (!empty($show_cmt_tour) && $show_cmt_tour->count() > 0)
                                            @foreach ($show_cmt_tour as $item_cmt)
                                                <div class="review-box">
                                                    <div class="review-thumb">
                                                        <img src="{{ $item_cmt->customer->avatar }}"
                                                            class="img-responsive img-circle" alt="" />
                                                    </div>

                                                    <div class="review-box-content">
                                                        <div class="reviewer-rate">
                                                            <p><i
                                                                    class="fa fa-star cl-warning"></i>{{ $item_cmt->rating_tour }}/<span>5</span>
                                                            </p>
                                                        </div>
                                                        <div class="review-user-info">
                                                            <h4>{{ $item_cmt->customer->name }}</h4>
                                                            <p>{{ $item_cmt->content_review }}</p>
                                                        </div>
                                                        <div class="review-lc text-right">
                                                            <a href="#"><i
                                                                    class="fa fa-fw fa-calendar-check-o"></i>{{ $item_cmt->created_at->format('d/m/Y H:i:s') }}</a>
                                                            {{-- <a href="#"><i class="ti-comment"></i>52</a> --}}
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

                        <!-- ============ Photos =================== -->
                        <div role="tabpanel" class="tab-pane fade in" id="Photos">
                            <div class="row">
                                <div class="tr-single-box">
                                    <div class="tr-single-header">
                                        <h4><i class="ti-gallery"></i>All Gallery</h4>
                                    </div>
                                    <div class="tr-single-body">
                                        <ul class="gallery-list">
                                            @if (!empty($tour_gallery) && $tour_gallery->count() > 0)
                                                @foreach ($tour_gallery as $key => $item)
                                                    <li>
                                                        <a data-fancybox="gallery"
                                                            href="/storage/photos/2/gallery/{{ $item->gallery_img }}">
                                                            <img src="/storage/photos/2/gallery/{{ $item->gallery_img }}"
                                                                class="img-responsive" alt="">
                                                        </a>
                                                    </li>
                                                @endforeach
                                            @else
                                                <li>
                                                    <a data-fancybox="gallery"href="#"> không có ảnh</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Sidebar Start -->
                <div class="col-md-4 col-sm-12">



                    <!-- overview & booking Form -->
                    <div class="tr-single-box">
                        <div class="tr-single-header">
                            <div class="entry-meta">
                                <div class="meta-item meta-comment fl-right">
                                    <div class="view-box">
                                        <div class="fl-right">
                                            <h4 class="font-20"><span style="color: #ed8b34"
                                                    class="theme-cl font-20">{{ number_format($getDetail_tour->price, 0, '.', '.') }}
                                                    đ</span>
                                                <sub>/Per Persion</sub>
                                            </h4>
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
                            <form class="book-form pay-ment-form">
                                <div class="row">
                                    <div class="col-xs-12 mrg-top-15">
                                        <a href="{{ route('GetBookTour', ['tour_id' => $getDetail_tour->id]) }}"
                                            class="pay-ment-a btn btn-arrow theme-btn full-width ">Book now</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Share this -->
                    <div class="tr-single-box">
                        <div class="tr-single-header">
                            <h4>Share this</h4>
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
                            <h4>Tour liên quan</h4>
                        </div>

                        <div class="tr-single-body">
                            <div class="single-side-slide">
                                <!-- Single Destination -->
                                @if (!empty($relate_tour) && $relate_tour->count() > 0)
                                    @foreach ($relate_tour as $key1 => $item1)
                                        <div class="col-md-4 col-sm-6">
                                            <article class="destination-box style-1">

                                                <div class="destination-box-image">
                                                    <figure>
                                                        <a href="{{ route('TourSingle', ['id' => $item1->id]) }}">
                                                            <img src="{{ $item1->img_lgtour }}"
                                                                class="img-responsive listing-box-img" alt="" />
                                                            <div class="list-overlay"></div>
                                                        </a>
                                                        {{-- <div class="discount-flick">-12%</div> --}}
                                                        <h4 class="destination-place">
                                                            <a href="#">{{ $item1->tourname }}</a>
                                                        </h4>
                                                        <a href="#" class="list-like left"><i
                                                                class="ti-heart"></i></a>
                                                    </figure>
                                                </div>

                                                <div class="entry-meta">
                                                    <div class="meta-item meta-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half"></i>
                                                    </div>
                                                    <div class="meta-item meta-comment fl-right">
                                                        {{-- <span class="text-through">$2887</span> --}}
                                                        <span class="real-price padd-l-10 font-bold"
                                                            style="color: #ed8b34">{{ number_format($item1->price, 0, '.', '.') }}
                                                            đ</span>
                                                    </div>
                                                </div>

                                                <div class="inner-box">
                                                    <div class="box-inner-ellipsis">
                                                        <h4 class="entry-location">
                                                            <a
                                                                href="{{ route('TourSingle', ['id' => $item1->id]) }}">{{ $item1->location_t }}</a>
                                                        </h4>
                                                        <div class="price-box">
                                                            <div class="destination-price fl-right">
                                                                <a href="#"><i
                                                                        class="theme-cl ti-arrow-right"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </article>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-md-4 col-sm-6">
                                        <p style="text-align: center;">không có tour nào liên quan</p>
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
    <!-- ======================= End Detail ===================== -->
@endsection
@section('js-layout-user')
    <script type="text/javascript">
        const bookNowBtn = document.querySelector('.pay-ment-form .pay-ment-a');
        bookNowBtn.addEventListener('click', (event) => {
            event.preventDefault();

            const tourId = window.location.href.split('/').pop();
            const searchParams = new URLSearchParams(window.location.search);
            const tour_id = searchParams.get('tour_id');
            $.ajax({
                type: "GET",
                url: "/check_login_cus",
                success: function(data) {
                    if (data.loggedIn && data.userRole == 0) {
                        window.location.href = '/home/book_tour/' + (tourId || tour_id);
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
@endsection
