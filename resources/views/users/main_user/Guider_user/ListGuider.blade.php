@extends('users.layout_user.app')
@section('css-layout-user')
    <style>
        .t-type {
            color: #fff;
            padding: 3px 10px;
            border-radius: 2px;
            margin-right: 5px;
            font-size: 13px;
        }

        .bg-offline-edit {
            border: 1px solid #eaeff5;
            background: #fff !important;
            color: #677897;
        }
    </style>
@endsection
@section('PageTitle')
    @include('users.main_user.include.StartPageTitle')
@endsection
@section('content')
    <!-- =========== Start Tour Guider =================== -->
    <section class="gray-bg">
        <div class="container">
            <!-- Row -->
            <div class="row mrg-0">
                <div class="tr-single-box short-box">
                    <div class="col-xs-4 align-self-center">
                        <h4>Danh Sách Hướng Dẫn Viên Du lịch</h4>
                    </div>

                    <div class="col-xs-8 text-right">

                        <div class="btn-group mr-lg-2">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Most Recent
                            </button>
                            <div class="dropdown-menu pull-right animated flipInX">
                                <a href="#">Recent</a>
                                <a href="#">Most Popular</a>
                                <a href="#">Most Ratting</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Row -->
            <!-- Start all guider -->
            <div class="row">
                <!-- Single Guide -->
                @if (!empty($getdetail_guider) && $getdetail_guider->count() > 0)
                    @foreach ($getdetail_guider as $item)
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="guide-container">
                                <div class="guide-container-box">
                                    <div class="fguide-thumb">
                                        <img src="{{ $item->avatar_guider }}" class="img-responsive img-circle"
                                            alt="" style="height: 100%;">
                                        <?php $rating = DB::table('review_guider')->where('guider_id', $item->id)->avg('rating_guider'); ?>
                                        <p class="padd-15 text-center"><i class="fa fa-star cl-warning"></i>{{ number_format($rating, 1) }}<span>/5</span>
                                            @if ($item->status_guider == 1)
                                                <span class="t-type bg-success">Online</span>
                                            @elseif($item->status_guider == 0)
                                                <span class="t-type bg-danger">Offline</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="fguide-detail">
                                        <h4>{{ $item->name_guider }}</h4>
                                        <ul class="extra-service">
                                            <li>
                                                <div class="icon-box-icon-block">
                                                    <a href="#">
                                                        <div class="icon-box-round">
                                                            <i class="fa fa-fw fa-money"></i>
                                                        </div>
                                                        <div class="icon-box-text">
                                                            <strong>Giá/Ngày</strong>
                                                            <span
                                                                class="theme-cl font-bold">{{ number_format($item->price_1date, 0, '.', '.') }}đ</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon-box-icon-block">
                                                    <a href="#">
                                                        <div class="icon-box-round">
                                                            <i class="fa fa-fw fa-calendar-minus-o"></i>
                                                        </div>
                                                        <div class="icon-box-text">
                                                            <strong>Ngày Sinh</strong>
                                                            {{ $item->birthday_guider->format('d/m/Y') }}
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="icon-box-icon-block">
                                                    <a href="#">
                                                        <div class="icon-box-round">
                                                            <i class="fa fa-fw fa-language"></i>
                                                        </div>
                                                        <div class="icon-box-text">
                                                            <strong>Ngôn Ngữ</strong>
                                                            {{ $item->language_guider }}
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="guide-container-links">
                                    <a href="{{ route('view_guider', ['id' => $item->id]) }}" class="btn btn-default"><i
                                            class="fa fa-fw fa-eye mrg-r-5"></i>View
                                        Profile</a>
                                    <a data-toggle="modal" data-target="#guider_calender_modal"
                                        data-guiderid="{{ $item->id }}" class="btn btn-default"><i
                                            class="fa fa-fw fa-calendar-check-o mrg-r-5"></i>Lịch Book</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <!-- /Row -->
            <div class="row">
                <ul class="pagination">
                    {{ $getdetail_guider->links() }}
                </ul>
            </div>
            <!-- End all guider -->
        </div>
    </section>
    <!-- =========== End Tour Guider =================== -->
@endsection
