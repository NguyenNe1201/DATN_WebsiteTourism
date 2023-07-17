<div class="tr-single-box">
    <div class="tr-single-header">
        <h4>Filter</h4>
        <span class="pull-right clickables" data-toggle="collapse" data-target="#filter"><i
                class="ti-align-left"></i></span>
    </div>
    <div id="filter" class="collapse in">

        <!-- Input Box Search -->
        <div class="tr-single-body">
           <form action="{{ route('search_blog') }}" method="GET" class="text-center">
            <div class="sidebar-input">
                <input type="text" name="search" id="timkiem_blog" class="form-control" placeholder="Nhập blog bạn muốn tìm...">
                <ul class="list-group" id="result_li"></ul>
            </div>
            <button style="border-radius:50px;" type="submit" class="btn theme-btn">Tìm Kiếm <span
                class="ti-arrow-right"></span></button>
           </form>
        </div>

        <!-- Distance -->
        <div class="tr-inner-single-box">
            <div class="tr-single-header">
                <h4>Danh Mục Blog</h4>

            </div>
            <div class="tr-single-body">
                <ul class="side-list-check hover-category">
                    @if (!empty($categoryblog))
                        @foreach ($categoryblog as $key2 => $item2)
                            <li>
                                <a href="{{ route('blogListCategory', ['id' => $item2->id]) }}">
                                    <i style="color:#ED8B34;" class="fa fa-angle-right text-primary mr-2"></i>
                                    <label for="144"></label>
                                    <span>{{ $item2->dm_blog_name }}</span>
                                    <span class="pull-right" style="color: #ed8b34;">{{ $countblog[$item2->id] }}</span>
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>

            </div>
        </div>

        <!-- Start Rating -->
        <div class="tr-inner-single-box">
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
                        {{-- <span class="pull-right">102</span> --}}
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
                        {{-- <span class="pull-right">110</span> --}}
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
                        {{-- <span class="pull-right">56</span> --}}
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
                        {{-- <span class="pull-right">18</span> --}}
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
                        {{-- <span class="pull-right">75</span> --}}
                    </li>
                </ul>
            </div>
        </div>




    </div>
</div>
