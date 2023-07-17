@extends('admin.layout_adm.app_dashboard')
@section('css_content_adm')
    <style>
        .form-control {
            border-radius: 0px;
        }

        label {
            color: #334e6f;
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
            border: 1px solid #ccc;
        }

        label {
            font-size: 16px;
            font-weight: 550;
        }

        /* edit nic-select bootstrap */
        .nice-select {
            display: none !important;
        }

        /* Hiển thị thành phần select gốc */
        select[name="cate_tour_id"] {
            display: block !important;
        }

        select[name="location_t"] {
            display: block !important;
        }

        select[name="location_id"] {
            display: block !important;
        }

        select[name="guider_id"] {
            display: block !important;
        }

        .dataTables_length>label {
            font-size: 14px;
            font-weight: 500;
        }

        .dataTables_filter>label {
            font-size: 14px;
            font-weight: 500;
        }
    </style>
@endsection
@section('content_adm')
    <!-- ======================= Start add tour===================== -->
    <div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
        <div class="row mrg-0 mrg-top-20">
            <div class="tr-single-box">
                <div class="tr-single-header">
                    <h3 class="dashboard-title">Thêm Tour</h3>
                </div>
                <div class="tr-single-body">
                    {{-- @include('admin.alert') --}}
                    {{-- @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif --}}
                    <form class="jquery_valiss form-horizontal" id="add_tour_jqvali" method="POST"
                        action="{{ route('inputaddTour') }}" role="form" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="cate_tour_id" class="col-md-2 col-sm-3">Tên danh mục:</label>
                            <div style="padding: 0px 15px;">

                                <select name="cate_tour_id" id="cate_tour_id" class="form-control wide" required>
                                    <option value="">----- chọn danh mục -----</option>
                                    @if (isset($cate_tour) && !empty($cate_tour) && $cate_tour->count() > 0)
                                        @foreach ($cate_tour as $key => $item)
                                            <option value="{{ $item->id }}">{{ $item->cate_tour_name }}</option>
                                        @endforeach
                                    @else
                                        <option value="">----- Không có danh mục -----</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tourname" class="col-md-2 col-sm-3">Tên tour:</label>
                            <div style="padding: 0px 15px;">
                                <input name="tourname" id="tourname" type="text" class="form-control"
                                    value="{{ old('tourname') }}" placeholder="Nhập tên tour" required>
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label for="introduce_t" class="col-md-2 col-sm-3">Giới thiệu về tour:</label>
                            <div class="clearfix"></div>
                            <div style="padding: 0px 15px;">
                                <textarea name="introduce_t" id="introduce_t" class="form-control" required></textarea>
                            </div>
                            @error('introduce_t')
                                <div
                                    style="width: 100%; font-weight: 550; margin-top: 0.25rem; font-size: 90%; color: #dc3545; padding: 0px 15px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label for="describe_t" class="col-md-2 col-sm-3">Mô tả về tour:</label>
                            <div class="clearfix"></div>
                            <div style="padding: 0px 15px;">
                                <textarea name="describe_t" id="describe_t" class="form-control" required></textarea>
                            </div>
                            @error('introduce_t')
                                <div
                                    style="width: 100%; font-weight: 550; margin-top: 0.25rem; font-size: 90%; color: #dc3545; padding: 0px 15px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label for="tourplan" class="col-md-2 col-sm-3">Lịch trình về tour:</label>
                            <div class="clearfix"></div>
                            <div style="padding: 0px 15px;">
                                <textarea name="tourplan" id="tourplan" class="form-control" required> </textarea>
                            </div>
                            @error('tourplan')
                                <div
                                    style="width: 100%; font-weight: 550; margin-top: 0.25rem; font-size: 90%; color: #dc3545; padding: 0px 15px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="tour_date">Thời gian:</label>
                                <input type="number" min="1" name="tour_date" id="tour_date" class="form-control"
                                    placeholder="Nhập số ngày của tour" required />
                            </div>
                            <div class="col-xs-6">
                                <label for="price">Giá tiền/Người:</label>
                                <input type="text" name="price" id="price" class="form-control" required
                                    placeholder="Nhập giá tiền 1 người" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="location_t">Địa điểm:</label>
                                    <select name="location_t" id="location_t" class="form-control wide" required>
                                        <option value="">----- chọn địa điểm -----</option>
                                        @if (isset($cate_location) && !empty($cate_location) && $cate_location->count() > 0)
                                            @foreach ($cate_location as $key_l => $item_l)
                                                <option value="{{ $item_l->id }}">{{ $item_l->location_name }}</option>
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
                                    @if (isset($guider) && !empty($guider) && $guider->count() > 0)
                                        @foreach ($guider as $key_g => $item_g)
                                            <option value="{{ $item_g->id }}">{{ $item_g->name_guider }}</option>
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
                                <input name="location_url" id="location_url" class="form-control" required
                                    placeholder="https://www.listing-hub.com/">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="img_lgtour" class="col-md-2 col-sm-3">Upload logo:</label>
                            <div style="padding: 0px 15px;">
                                <input style="padding:13px 12px 10px;" class="form-control" id="UploadAvatar"
                                    name="img_lgtour" type="file" required>
                                <div id="image_show" style="margin-top: 10px; float: left;">
                                    <img src="/assets/img/png-avatar-icon.png" width="100" height="90"
                                        alt="">
                                </div>
                                <input type="hidden" name="filetour" id="file">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 text-center" style="margin-top: 20px;">
                                <button style="font-weight: 600;" type="submit" class="btn theme-btn">Submit</button>
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
    <!-- ======================= Add location tour ===================== -->
    <div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
        {{-- list category blog --}}
        <div class="row mrg-0 mrg-top-20">
            <div class="tr-single-box">
                <div class="tr-single-header">
                    <h3 class="dashboard-title">Danh sách Địa Điểm</h3>
                </div>
                <div class="tr-single-body">
                    <div style="display: flex; float: right;">
                        <a style="margin-right: 15px;" type="button" class="btn theme-btn" data-toggle="modal"
                            data-target="#add_location"><span class="ti-plus"></span> Add</a>
                        <a style="margin-right: 15px;" type="button" class="btn theme-btn" data-toggle="modal"
                            data-target="#edit_location"><i class="ti-pencil"></i>
                            Edit</a>
                        {{-- <a href="{{ route('ListCategoryBlog') }}" id="deleteCheckbox" class="btn theme-btn"><i
                                class="ti-trash"></i> Delete</a> --}}
                    </div>
                    <!-- ====================== Book Popular Hotel ================= -->
                    <div class="clearfix"></div>
                    <div class="table-responsive" style="margin-top: 20px; ">
                        <table class="table table-striped table-hover" id="table_list_location_tour"
                            data-page-length='5'>
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Địa Điểm</th>
                                    <th>Ngày Tạo</th>
                                    <th>Ngày Cập Nhật</th>
                                    <th>Function</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- tr -->
                                @if (!empty($cate_location))
                                    @foreach ($cate_location as $key_t => $item_t)
                                        <tr>
                                            <td>
                                                {{ $key_t + 1 }}
                                            </td>
                                            <td><b>{{ $item_t->location_name }}</b></td>
                                            <td>{{ $item_t->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                {{ $item_t->updated_at->format('d/m/Y') }}
                                            </td>
                                            <td>
                                                <a href="{{ route('delLocation', ['id' => $item_t->id]) }}"
                                                    class="tbl-action bg-danger delete-tour" title="Delete"
                                                    data-toggle="tooltip"><i class="ti-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                    img_lgtour: "required",
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
                    img_lgtour: "Vui lòng chọn ảnh logo.",
                    location_url: "Vui lòng nhập địa chỉ url."
                }
            });

        });
    </script>
    <script>
        $(function(e) {
            var table;
            $(document).ready(function() {
                table = $('#table_list_location_tour').DataTable({
                    "pageLength": 10,
                    "lengthMenu": [
                        [5, 10, 15, -1],
                        [5, 10, 15, "All"]
                    ],
                });

            });
        });
    </script>
@endsection
