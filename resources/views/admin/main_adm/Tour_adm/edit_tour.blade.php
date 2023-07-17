@extends('admin.layout_adm.app_dashboard')
@section('css_content_adm')
    <style>
        .form-control {
            border-radius: 0px;
        }

        .btn-warning {
            color: #1f2d3d;
            background-color: #ffc107;
            border-color: #ffc107;
            box-shadow: none;
        }

        .dashboard .form-control {
            background: none;
            font-weight: 500;
        }

        label {
            font-size: 16px;
            font-weight: 550;
        }

        .nice-select {
            display: none !important;
        }

        /* Hiển thị thành phần select gốc */
        select[name="cate_tour_id"] {
            display: block !important;
        }

        select[name="guider_id"] {
            display: block !important;
        }

        select[name="location_t"] {
            display: block !important;
        }

        select[name="location_id"] {
            display: block !important;
        }
    </style>
@endsection
@section('content_adm')
    <!-- ======================= Start add blog===================== -->
    <div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
        <div class="row mrg-0 mrg-top-20">
            <div class="tr-single-box">
                <div class="tr-single-header">
                    <h3 class="dashboard-title">Chỉnh sửa Tour</h3>
                </div>
                <div class="tr-single-body">
                    {{-- @include('admin.alert') --}}
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <form id="add_tour_jqvali" class="jquery_valiss form-horizontal " method="POST"
                        action="{{ route('PostEdit_Tour') }}" role="form" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="cate_tour_id" class="col-md-2 col-sm-3">Tên danh mục:</label>
                            <div style="padding: 0px 15px;">
                                <select name="cate_tour_id" id="cate_tour_id" class="form-control wide">
                                    @if (!empty($cate_tour) && $cate_tour->count() > 0)
                                        @foreach ($cate_tour as $key => $item)
                                            @if ($editTour->cate_tour_id == $item->id)
                                                <option selected
                                                    value="{{ old('cate_tour_id') ?? $editTour->cate_tour_id }}">
                                                    {{ $item->cate_tour_name }}</option>
                                            @else
                                                <option value="{{ $item->id }}">
                                                    {{ $item->cate_tour_name }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="null">----- Không có danh mục -----</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tourname" class="col-md-2 col-sm-3">Tên tour:</label>
                            <div style="padding: 0px 15px;">
                                <input name="tourname" id="tourname" type="text" class="form-control"
                                    value="{{ old('tourname') ?? $editTour->tourname }}" placeholder="nhập" required>
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label for="introduce_t" class="col-md-2 col-sm-3">Giới thiệu:</label>
                            {{--  --}}
                            <div class="clearfix"></div>
                            {{--  --}}
                            <div style="padding: 0px 15px;">
                                <textarea name="introduce_t" id="introduce_t" class="form-control" required>{{ $editTour->introduce_t }}</textarea>
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label for="describe_t" class="col-md-2 col-sm-3">Mô tả:</label>
                            {{--  --}}
                            <div class="clearfix"></div>
                            {{--  --}}
                            <div style="padding: 0px 15px;">
                                <textarea name="describe_t" id="describe_t" class="form-control" required>{{ $editTour->describe_t }}</textarea>
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label for="tourplan" class="col-md-2 col-sm-3">Lịch trình:</label>
                            {{--  --}}
                            <div class="clearfix"></div>
                            {{--  --}}
                            <div style="padding: 0px 15px;">
                                <textarea name="tourplan" id="tourplan" class="form-control" required> {{ $editTour->tourplan }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="tour_date">Ngày khởi hành:</label>

                                <input type="number" name="tour_date" id="tour_date" value="{{ $editTour->tour_date }}"
                                    class="form-control" required>

                            </div>
                            <div class="col-xs-6">
                                <label for="price">Giá tiền:</label>
                                <input type="text" name="price" id="price" class="form-control"
                                    value="{{ old('price') ?? $editTour->price }}" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="location_t">Địa điểm:</label>
                                <select name="location_t" id="location_t" class="form-control wide" required>
                                    <option value="">----- chọn địa điểm -----</option>
                                    @if (!empty($cate_location) && $cate_location->count() > 0)
                                        @foreach ($cate_location as $key_l => $item_l)
                                            @if ($editTour->location_tour_id == $item_l->id)
                                                <option selected
                                                    value="{{ old('category_id') ?? $editTour->location_tour_id }}">
                                                    {{ $item_l->location_name }}</option>
                                            @else
                                                <option value="{{ $item_l->id }}">
                                                    {{ $item_l->location_name }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">----- Không có địa điểm -----</option>
                                    @endif
                                </select>
                            </div>
                            {{-- <div class="col-xs-6">
                                <label for="guider_id">Hướng dẫn viên:</label>
                                <select name="guider_id" id="guider_id" class="form-control wide" required>
                                    <option value="">----- chọn hướng dẫn viên -----</option>
                                    @if (!empty($guider) && $guider->count() > 0)
                                        @foreach ($guider as $guider_t)
                                            @if ($editTour->guider_id == $guider_t->id)
                                                <option selected value="{{ $editTour->guider_id }}">
                                                    {{ $guider_t->name_guider }}</option>
                                            @endif
                                        @endforeach
                                        @foreach ($guider1 as $guider_l)
                                            <option value=" {{ $guider_l->id }}">{{ $guider_l->name_guider }}</option>
                                        @endforeach
                                    @else
                                        <option value="">Không có hướng dẫn viên</option>
                                    @endif
                                </select>
                            </div> --}}
                        </div>

                        <div class="form-group">
                            <label for="location_url" class="col-md-2 col-sm-3">Địa điểm Url:</label>
                            <div style="padding: 0px 15px;">
                                <input name="location_url" id="location_url"
                                    value="{{ old('location_url') ?? $editTour->location_url }}" class="form-control"
                                    required placeholder="https://www.listing-hub.com/">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="img_lgtour" class="col-md-2 col-sm-3">Upload logo:</label>
                            <div style="padding: 0px 15px;">
                                <input style="padding:13px 12px 10px;" class="form-control" id="UploadAvatar"
                                    name="img_lgtour" type="file">
                                <div id="image_show" style="margin-top: 10px; float: left;">
                                    <img src="{{ $editTour->img_lgtour }}" width="100" alt="">
                                </div>
                                <input type="hidden" name="upfiletour"
                                    value="{{ old('upfiletour') ?? $editTour->img_lgtour }}" id="file">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 text-center" style="margin-top: 20px;">
                                <button style="font-weight: 600;" type="submit" class="btn theme-btn">Save</button>
                                <a href="" style="font-weight:600;" type="button"
                                    class="btn btn-warning">CANCEL</a>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- ======================= End  basic-settings ===================== -->
@endsection
@section('js_content_adm')
    <script type="text/javascript">
        CKEDITOR.replace('introduce_t', options);
        CKEDITOR.replace('describe_t', options);
        CKEDITOR.replace('tourplan', options);
        $(document).ready(function() {
            $("#add_tour_jqvali").validate({
                rules: {
                    cate_tour_id: {
                        required: true
                    },
                    tourname: {
                        required: true,
                        minlength: 10
                    },
                    price: {
                        required: true,
                        digits: true

                    },
                    tour_date: {
                        required: true
                    },
                    location_t: "required",

                    location_url: "required"
                },
                messages: {
                    cate_tour_id: {
                        required: "Vui lòng chọn danh mục."
                    },
                    tourname: {
                        required: "Vui lòng nhập tên tour.",
                        minlength: "Tiêu đề phải trên 10 ký tự."
                    },
                    price: {
                        required: "vui lòng nhập giá tiền.",
                        digits: "Giá tiền phải là số."
                    },
                    tour_date: {
                        required: "Vui lòng nhập thời gian."
                    },
                    location_t: "Vui lòng chọn địa điểm.",

                    location_url: "Vui lòng nhập địa chỉ url."
                }
            });

        });
    </script>
@endsection
