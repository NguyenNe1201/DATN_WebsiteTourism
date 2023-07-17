@extends('users.layout_user.app')
@section('css-layout-user')
    <style>
        .list-group-item:first-child {
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
            color: #334e6f;
        }

        .custom-file-upload1 {
            display: inline-block;
            cursor: pointer;
            width: 100%;
            height: 60px;
            /* background-size: cover; */
            font-size: 40px;
            background-position: center;
            background: #ed8b34;
        }
    </style>
@endsection
@section('HomePageTitle')
    @include('users.main_user.include.HomePagaTitle')
@endsection
@section('content')
    <div class="clearfix"></div>
    <!-- ====================== Tour đề xuất ================= -->
    @if (!empty(Auth::check()))
        <section class="gray-bg">
            <div class="container">
                @if (!empty($suggetTours) && $suggetTours->count() > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading">
                                <span class="theme-cl">Book Tour</span>
                                <h1>Tour Đề Xuất</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="list-slider">
                            <!-- Single tour-->
                            @foreach ($suggetTours as $item_s)
                                <div class="list-slide-box">
                                    <article class="hotel-box style-1">
                                        <div class="hotel-box-image">
                                            <figure>
                                                <a href="{{ route('TourSingle', ['id' => $item_s->id]) }}">
                                                    <img src="{{ $item_s->img_lgtour }}"
                                                        class="img-responsive listing-box-img" alt="" />
                                                    <div class="list-overlay"></div>
                                                    <div class="read_more"><span>Read more</span></div>
                                                </a>
                                                <div class="discount-flick">Hot</div>

                                                <h4 class="hotel-place">
                                                    <a
                                                        href="{{ route('TourSingle', ['id' => $item_s->id]) }}">{{ $item_s->cate_location->location_name }}</a>
                                                </h4>
                                                <a href="#" class="favorite-a list-like left"
                                                    data-tour-id="{{ $item_s->id }}"><i class="ti-heart"></i></a>
                                            </figure>
                                        </div>
                                        <div class="entry-meta">
                                            <div class="meta-item meta-rating">
                                                <div class="tour-time"
                                                    style="color: #334e6f; font-size: 14px; font-weight: 500;">
                                                    <i class="ti ti-car"></i><span>{{ $item_s->tour_date }}
                                                        Ngày</span>
                                                </div>
                                            </div>
                                            <div class="meta-item meta-comment fl-right">
                                                <span class="real-price padd-l-10" style="font-weight: 600;"><span
                                                        style="color:#ed8b34 ">{{ number_format($item_s->price, 0, '.', '.') }}
                                                        đ</span>/1 Người</span>
                                            </div>
                                        </div>
                                        <div class="hotel-detail-box">
                                            <div class="hotel-ellipsis">
                                                <h4 class="hotel-name">
                                                    <a
                                                        href="{{ route('TourSingle', ['id' => $item_s->id]) }}">{{ $item_s->tourname }}</a>
                                                    {{-- <p style="margin: 5px 0px;"><span class="ti-timer"></span>
                                                    {{ $item_t->tour_date }}</p> --}}
                                                </h4>
                                            </div>
                                        </div>

                                        <div class="hotel-inner inner-box">
                                            <div class="box-inner-ellipsis">
                                                <div class="hotel-review entry-location">
                                                    <span class="review-status bg-success"><i class="ti-check"></i></span>
                                                    <h6 style="color:#ff4e00;"><span
                                                            class="cl-success font-bold">Good</span>
                                                        @if (isset($reviewCounts[$item_s->id]))
                                                            {{ $reviewCounts[$item_s->id] }}
                                                        @else
                                                            0
                                                        @endif
                                                        Review
                                                    </h6>
                                                </div>
                                                <div class="price-box">
                                                    <div class="destination-price fl-right">
                                                        <?php $rating = DB::table('review_tour')
                                                            ->where('tour_id', $item_s->id)
                                                            ->avg('rating_tour'); ?>
                                                        <p style="margin:0px;"><i
                                                                class="fa fa-star cl-warning"></i>{{ number_format($rating, 1) }}<span>/5</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </article>
                                </div>
                            @endforeach

                        </div>
                    </div>
                @endif
            </div>
        </section>
        <div class="clearfix"></div>
    @endif
    <!-- ====================== Tour Popular ================= -->
    <section class="gray-bg">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <span class="theme-cl">Book Tour</span>
                        <h1>Tour Nổi Bật</h1>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="list-slider">
                    <!-- Single tour-->
                    @if (!empty($gettour) && $gettour->count() > 0)
                        @foreach ($gettour as $key_t => $item_t)
                            <div class="list-slide-box">
                                <article class="hotel-box style-1">
                                    <div class="hotel-box-image">
                                        <figure>
                                            <a href="{{ route('TourSingle', ['id' => $item_t->id]) }}">
                                                <img src="{{ $item_t->img_lgtour }}" class="img-responsive listing-box-img"
                                                    alt="" />
                                                <div class="list-overlay"></div>
                                                <div class="read_more"><span>Read more</span></div>
                                            </a>
                                            <div class="discount-flick">Hot</div>

                                            <h4 class="hotel-place">
                                                <a
                                                    href="{{ route('TourSingle', ['id' => $item_t->id]) }}">{{ $item_t->cate_location->location_name }}</a>
                                            </h4>
                                            <a href="#" class="favorite-a list-like left"
                                                data-tour-id="{{ $item_t->id }}"><i class="ti-heart"></i></a>
                                        </figure>
                                    </div>
                                    <div class="entry-meta">
                                        <div class="meta-item meta-rating">
                                            <div class="tour-time"
                                                style="color: #334e6f; font-size: 14px; font-weight: 500;">
                                                <i class="ti ti-car"></i><span>{{ $item_t->tour_date }}
                                                    Ngày</span>
                                            </div>
                                        </div>
                                        <div class="meta-item meta-comment fl-right">
                                            <span class="real-price padd-l-10" style="font-weight: 600;"><span
                                                    style="color:#ed8b34 ">{{ number_format($item_t->price, 0, '.', '.') }}
                                                    đ</span>/1 Người</span>
                                        </div>
                                    </div>
                                    <div class="hotel-detail-box">
                                        <div class="hotel-ellipsis">
                                            <h4 class="hotel-name">
                                                <a
                                                    href="{{ route('TourSingle', ['id' => $item_t->id]) }}">{{ $item_t->tourname }}</a>
                                                {{-- <p style="margin: 5px 0px;"><span class="ti-timer"></span>
                                                {{ $item_t->tour_date }}</p> --}}
                                            </h4>
                                        </div>
                                    </div>

                                    <div class="hotel-inner inner-box">
                                        <div class="box-inner-ellipsis">
                                            <div class="hotel-review entry-location">
                                                <span class="review-status bg-success"><i class="ti-check"></i></span>
                                                <h6 style="color:#ff4e00;"><span class="cl-success font-bold">Good</span>
                                                    @if (isset($reviewCounts[$item_t->id]))
                                                        {{ $reviewCounts[$item_t->id] }}
                                                    @else
                                                        0
                                                    @endif
                                                    Review
                                                </h6>
                                            </div>
                                            <div class="price-box">
                                                <div class="destination-price fl-right">
                                                    <?php $rating = DB::table('review_tour')
                                                        ->where('tour_id', $item_t->id)
                                                        ->avg('rating_tour'); ?>
                                                    <p style="margin:0px;"><i
                                                            class="fa fa-star cl-warning"></i>{{ number_format($rating, 1) }}<span>/5</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </article>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- ====================== Popular blog ================= -->
    <section class="destination gray-bg">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <span class="theme-cl">View Blog</span>
                        <h1>Blog nổi bật</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="list-slider">
                    <!-- Single Destination -->
                    @if (!empty($blogtopbinhluan) && $blogtopbinhluan->count() > 0)
                        @foreach ($blogtopbinhluan as $key => $item)
                            <div class="list-slide-box">
                                <article class="destination-box style-1">
                                    <div class="destination-box-image">
                                        <figure>
                                            <a href="{{ route('blogSingle', ['id' => $item->id]) }}">
                                                <img src="{{ $item->img_title }}" class="img-responsive listing-box-img"
                                                    alt="" />
                                                <div class="list-overlay"></div>
                                            </a>
                                            <div class="discount-flick">Hot</div>
                                            <h4 class="destination-place">
                                                <a
                                                    href="{{ route('blogSingle', ['id' => $item->id]) }}">{{ $item->title }}</a>
                                            </h4>
                                            <a href="#" class="favorite-blog-a list-like left"
                                                data-blog-id="{{ $item->id }}"><i class="ti-heart"></i></a>
                                        </figure>
                                    </div>
                                    <div class="entry-meta">
                                        <div class="meta-item meta-author">
                                            <div class="coauthors">
                                                <span class="vcard author">
                                                    <span class="fn">
                                                        <a href="#"><img alt=""
                                                                src="{{ $item->user->avatar }}" class="avatar avatar-24"
                                                                height="24" width="24">{{ $item->user->name }}</a>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="meta-item meta-comment fl-right">
                                            <i class="ti-comment-alt"></i>
                                            @if (isset($commentCounts[$item->id]))
                                                <span>{{ $commentCounts[$item->id] }}</span>
                                            @else
                                                <span>0</span>
                                            @endif
                                        </div>
                                        <div class="meta-item meta-rating fl-right">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half"></i>
                                        </div>
                                    </div>
                                    <div class="inner-box">
                                        <div class="box-inner-ellipsis">
                                            <h4 class="entry-location">
                                                <a
                                                    href="{{ route('blogSingle', ['id' => $item->id]) }}">{{ $item->cate_blog->dm_blog_name }}</a>
                                            </h4>
                                            <div class="price-box">
                                                <div class="destination-price fl-right">
                                                    {{-- <a href="#"><i class="theme-cl ti-arrow-right"></i></a> --}}
                                                    <span class="theme-cl">{{ $item->updated_at->format('d/m/Y') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    @else
                        <div>
                            <h1>không có blog nào</h1>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </section>
    <div class="clearfix"></div>
    <!-- ====================== Tour Guide ================= -->
    <section class="gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <span class="theme-cl">Choose Guider</span>
                        <h1>Guide Nổi Bật</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="list-slider">
                    <!-- Single Guide -->
                    @if (!empty($guider) && $guider->count() > 0)
                        @foreach ($guider as $guider_tour)
                            <div class="col-md-3 col-sm-6">
                                <div class="guides-container" style="position: relative;">
                                    <a href="#" class="favorite-guider-a list-like left"
                                        data-guider-id="{{ $guider_tour->id }}"><i class="ti-heart"></i></a>
                                    <div class="guides-box">
                                        <div class="guides-img-box">
                                            <a href="#" class="favorite-guider-a list-like left"
                                                data-guider-id="{{ $guider_tour->id }}"><i class="ti-heart"></i></a>
                                            <img style="height:100%;" src="{{ $guider_tour->avatar_guider }}"
                                                class="img-responsive" alt="" />
                                        </div>
                                        <div class="guider-detail">
                                            <h4>{{ $guider_tour->name_guider }}</h4>
                                            <h5 class="theme-cl font-bold">
                                                {{ number_format($guider_tour->price_1date, 0, '.', '.') }}đ/Ngày</h5>
                                        </div>
                                    </div>
                                    <a href="{{ route('view_guider', ['id' => $guider_tour->id]) }}"
                                        class="btn theme-btn full-width">Book Now</a>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>

        </div>
    </section>
    <!-- ====================== Tour Guide ================= -->
    <!-- ====================== Review Tour ================= -->
    <section class="gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <span class="theme-cl">Review Tour</span>
                        <h1>Review Nổi Bật</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="list-slider">
                    <!-- review tour -->
                    @if (!empty($show_review_tour) && $show_review_tour->count() > 0)
                        @foreach ($show_review_tour as $review)
                            <div class="col-md-4 col-sm-6">
                                <div class="blog-box blog-grid-box">
                                    <div class="blog-grid-box-img">
                                        <img src="{{ $review->tour->img_lgtour }}" class="img-responsive"
                                            alt="">
                                    </div>

                                    <div class="blog-grid-box-content">
                                        <div class="blog-avatar text-center">
                                            <img src="{{ $review->customer->avatar }}" class="img-responsive"
                                                alt="">
                                            <p><strong>By</strong> <span
                                                    class="theme-cl">{{ $review->customer->name }}</span></p>
                                        </div>
                                        <h4 style="font-size:18px;">{{ $review->tour->tourname }}</h4>
                                        <p style="font-size:15px; color: #212121;">{{ $review->content_review }}</p>
                                        <a href="#"
                                            title="Read More..">{{ $review->review_date->format('d/m/Y') }}</a>
                                        <div class="destination-price fl-right ">
                                            <p><i class="fa fa-star cl-warning"></i>{{ $review->rating_tour }}/5</p>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        @endforeach
                    @endif
                    <!-- end review tour -->
                </div>
            </div>

        </div>
    </section>
    <!-- ====================== Review Tour ================= -->
    <div class="clearfix"></div>
@endsection
@section('js-layout-user')
@endsection
