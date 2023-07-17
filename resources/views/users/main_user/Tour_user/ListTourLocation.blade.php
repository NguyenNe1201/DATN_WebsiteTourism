@extends('users.layout_user.app')
@section('css-layout-user')
    <style>
        .entry-meta .meta-item {
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
            line-height: 18px;
        }
    </style>
@endsection
@section('PageTitle')
    @include('users.main_user.include.StartPageTitle')
@endsection
@section('content')
    <section class="gray-bg">
        <div class="container">
            <div class="row">
                <!-- Filter Sidebar -->
                <div class="col-md-4 col-sm-12">
                    @include('users.main_user.include.FilterTour')
                </div>
                <!-- All Item -->
                <div class="col-md-8 col-sm-12">
                    <div class="row mrg-0">
                        <div class="tr-single-box short-box">
                            <div class="col-sm-6 hidden-xs align-self-center">
                                <h4>Tour Theo Địa Điểm</h4>
                            </div>

                            <div class="col-sm-6 text-right">

                                {{-- <div class="btn-group mr-lg-2">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Short By
                                    </button>
                                    <div class="dropdown-menu pull-right animated flipInX">
                                        <a href="#">Accending</a>
                                        <a href="#">Decending</a>
                                        <a href="#">By Date</a>
                                    </div>
                                </div> --}}

                                <div class="btn-group">
                                    <a href="#" class="btn btn-default tooltips">
                                        <i class="ti-flix ti-layout-grid2"></i>
                                    </a>
                                </div>

                                <div class="btn-group">
                                    <a href="#" class="btn btn-default tooltips">
                                        <i class="ti-flix ti-view-list-alt"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->

                    <!-- Row -->
                    <div class="row">

                        <!-- Single Tour List -->
                        @if (!empty($tour_list_by_loca) && $tour_list_by_loca->count() > 0)
                            @foreach ($tour_list_by_loca as $key => $item)
                                <div class="col-md-6 col-sm-6">
                                    <article class="tour-box style-1">
                                        <!-- Single Tour -->
                                        <div class="tour-box-image">
                                            <figure>
                                                <a href="{{ route('TourSingle', ['id' => $item->id]) }}">
                                                    <img src="{{ $item->img_lgtour }}"
                                                        class="img-responsive listing-box-img" alt="" />
                                                    <div class="list-overlay"></div>
                                                </a>
                                                <div class="entry-bookmark">
                                                    <a href="#"><i class="ti-bookmark"></i></a>
                                                </div>

                                                <h4 class="destination-place">
                                                    <a href="#">{{ $item->cate_location->location_name }}</a>
                                                </h4>
                                                <span class="featured-tour"><i class="fa fa-star"></i></span>
                                                <a href="#" class="favorite-a list-like left"
                                                    data-tour-id="{{ $item->id }}"><i class="ti-heart"></i></a>
                                            </figure>
                                        </div>

                                        <div class="entry-meta">
                                            <div class="meta-item meta-rating">
                                                {{-- <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half"></i> --}}
                                                <div class="tour-time"
                                                    style="color: #334e6f; font-size: 14px; font-weight: 500;">
                                                    <i class="ti ti-car"></i><span>{{ $item->tour_date }}
                                                        Ngày</span>
                                                </div>
                                            </div>
                                            <div class="meta-item meta-comment fl-right">
                                                <span class="real-price padd-l-10" style="font-weight: 600;"><span
                                                        style="color:#ed8b34 ">{{ number_format($item->price, 0, '.', '.') }}
                                                        đ</span>/1 Người</span>
                                            </div>
                                        </div>
                                        <div class="hotel-detail-box">
                                            <div class="hotel-ellipsis">
                                                <h4 class="hotel-name">
                                                    <a href="#">{{ $item->tourname }}</a>
                                                    {{-- <p style="margin: 5px 0px;"><p style="margin: 5px 0px;"><span class="ti-timer"></span></p> --}}
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="hotel-inner inner-box">
                                            <div class="box-inner-ellipsis">
                                                <div class="hotel-review entry-location">
                                                    <span class="review-status bg-success"><i class="ti-check"></i></span>
                                                    <h6><span class="cl-success font-bold">Good</span>
                                                        @if (isset($reviewCounts[$item->id]))
                                                            {{ $reviewCounts[$item->id] }}
                                                        @else
                                                            0
                                                        @endif Review
                                                    </h6>
                                                </div>
                                                <div class="price-box">
                                                    <div class="destination-price fl-right">
                                                        <?php $rating = DB::table('review_tour')
                                                            ->where('tour_id', $item->id)
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
                        @else
                            <div class="col-md-12 col-sm-12">
                                <h2>không có tour nào</h2>
                            </div>
                        @endif

                    </div>
                    <!-- /Row -->

                    <div class="row">
                        <ul class="pagination">
                            {{-- paginator // phân trang --}}
                            {{ $tour_list_by_loca->links() }}
                        </ul>
                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection
