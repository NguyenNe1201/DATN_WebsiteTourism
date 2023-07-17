<!-- ======================= Start Banner ===================== -->
<div class="main-banner" style="background-image:url(/assets/img/banner.jpg);">
    <div class="container">
        <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
            <div class="caption text-center cl-white">
                <h2>Khám Phá Chuyến Du Lịch Của Bạn</h2>
                <p>Tìm Kiếm Các Chuyến Du Lịch Hàng Đầu Trên Thế Giới</p>
            </div>
            <div class="row">
                <form action="{{ route('search_tour') }}" method="GET" class="col-md-10 col-sm-10">
                    <fieldset class="home-form-1 ">
                        <div class="col-md-10 col-sm-10 padd-0">
                            <input style="margin:0px;" type="text" name="search" id="timkiem" accept="image/*" multiple
                                class="form-control br-1" placeholder="Nhập Tour Bạn Muốn Tìm kiếm Vào Đây...." required>
                        </div>
                        <div class="col-md-2 col-sm-2 padd-0">
                            <button type="submit" class="btn theme-btn cl-white seub-btn">SEARCH</button>
                        </div>
                    </fieldset>
                    {{-- tìm kiếm gợi ý --}}
                    <div class="col-md-10 col-sm-10 padd-0">
                        <ul class="list-group" id="result"></ul>
                    </div>
                </form>
                <form action="{{ route('search_tour_api') }}" id="searchForm" method="POST" class="col-md-2 col-sm-2"
                    enctype="multipart/form-data">
                    <fieldset class="home-form-1">
                        <label for="searchanh" class="custom-file-upload1 padd-0 btn theme-btn">
                            <span class="icon ti-image"></span>
                            <input style="display: none;" type="file" name="searchanh" id="searchanh"
                                class="form-control" onchange="submitForm()" accept="image/*" multiple>
                        </label>
                    </fieldset>
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ======================= End Banner ===================== -->
<div class="clearfix"></div>
