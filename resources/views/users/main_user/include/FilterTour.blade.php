<div class="tr-single-box">
    <div class="tr-single-header">
        <h4>Filter</h4>
        <span class="pull-right clickables" data-toggle="collapse" data-target="#filter"><i
                class="ti-align-left"></i></span>
    </div>
    <div id="filter" class="collapse in">

        <!-- Input Box Search -->
        <div class="tr-single-body">
            <form action="{{ route('search_tour_api') }}" id="searchForm" method="POST" enctype="multipart/form-data"
                class="text-center">
                <label for="searchanh" class="sidebar-input form form-control">
                    <input style="padding-top: 10px; display:none;" name="searchanh" id="searchanh" type="file"
                        class="form-control" placeholder="Nhập tour bạn cần tìm.." onchange="submitForm()" accept="image/*" multiple>
                    <span
                        style=" display: block; text-align: left; font-size: 15px; color: #6b7c8a; font-weight: 400; margin: 6px 0px;">Tìm
                        tour bằng hình ảnh..</span>
                </label>
                @csrf
            </form>
            <form action="{{ route('search_tour') }}" method="GET" class="text-center">
                <div class="sidebar-input">
                    <input name="search" id="timkiem" type="text" class="form-control"
                        placeholder="Nhập tour bạn cần tìm.." required>
                    <ul class="list-group" id="result"></ul>
                </div>
                <button style="border-radius:50px;" type="submit" class="btn theme-btn">Tìm Kiếm <span
                        class="ti-arrow-right"></span></button>
            </form>
        </div>

        <!-- Distance -->
        <div class="tr-inner-single-box">

            <div class="tr-single-header">
                <h4>Danh Mục Tour</h4>

            </div>
            <div class="tr-single-body">
                <ul class="side-list-check hover-category">
                    @if (!empty($categorytour))
                        @foreach ($categorytour as $key2 => $item2)
                            <li>
                                <a href="{{ route('TourListCategory', ['id' => $item2->id]) }}">
                                    <i style="color:#ED8B34;" class="fa fa-angle-right text-primary mr-2"></i>
                                    <label for="144"></label>
                                    <span>{{ $item2->cate_tour_name }}</span>
                                    <span class="pull-right">{{ $counttour[$item2->id] }}</span>
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>

            </div>

        </div>
        {{-- location tour filter --}}

        <div class="tr-inner-single-box">
            <div class="tr-single-header">
                <h4>Địa Điểm</h4>
            </div>
            <div class="tr-single-body">
                <ul class="side-list-check hover-category">
                    @if (!empty($categorylocation))
                        @foreach ($categorylocation as $key3 => $item3)
                            <li>
                                <a href="{{ route('TourListLocation', ['id' => $item3->id]) }}">
                                    <i style="color:#ED8B34;" class="fa fa-angle-right text-primary mr-2"></i>
                                    <label for="144"></label>
                                    <span>{{ $item3->location_name }}</span>
                                    <span class="pull-right">{{ $countlocation[$item3->id] }}</span>
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>

            </div>
        </div>
        <!-- Start Rating -->
        {{-- <div class="tr-inner-single-box">
            <div class="tr-single-header">
                <h4>Đánh Giá</h4>

            </div>
            <div class="tr-single-body">
                <ul class="side-list-check">
                    <li>
                        <span class="custom-checkbox">
                            <input type="checkbox" id="11">
                            <label for="11"></label>
                        </span>
                        <div class="search-rating">
                            <i class="fa fa-star enable"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <span class="pull-right">102</span>
                    </li>
                    <li>
                        <span class="custom-checkbox">
                            <input type="checkbox" id="12">
                            <label for="12"></label>
                        </span>
                        <div class="search-rating">
                            <i class="fa fa-star enable"></i>
                            <i class="fa fa-star enable"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <span class="pull-right">110</span>
                    </li>
                    <li>
                        <span class="custom-checkbox">
                            <input type="checkbox" id="13">
                            <label for="13"></label>
                        </span>
                        <div class="search-rating">
                            <i class="fa fa-star enable"></i>
                            <i class="fa fa-star enable"></i>
                            <i class="fa fa-star enable"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <span class="pull-right">56</span>
                    </li>
                    <li>
                        <span class="custom-checkbox">
                            <input type="checkbox" id="14">
                            <label for="14"></label>
                        </span>
                        <div class="search-rating">
                            <i class="fa fa-star enable"></i>
                            <i class="fa fa-star enable"></i>
                            <i class="fa fa-star enable"></i>
                            <i class="fa fa-star enable"></i>
                            <i class="fa fa-star"></i>
                        </div>

                    </li>
                    <li>
                        <span class="custom-checkbox">
                            <input type="checkbox" id="15">
                            <label for="15"></label>
                        </span>
                        <div class="search-rating">
                            <i class="fa fa-star enable"></i>
                            <i class="fa fa-star enable"></i>
                            <i class="fa fa-star enable"></i>
                            <i class="fa fa-star enable"></i>
                            <i class="fa fa-star enable"></i>
                        </div>

                    </li>
                </ul>
            </div>
        </div> --}}
    </div>
</div>
