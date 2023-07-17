@extends('admin.layout_adm.app_dashboard')
@section('css_content_adm')
    <style>
        .dashboard .form-control {
            border-radius: 0px;
        }
    </style>
@endsection
@section('content_adm')
    <div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
        <div class="row mrg-0 mrg-top-20">
            <div class="tr-single-box">
                <div class="tr-single-header">
                    <h3 class="dashboard-title">Danh Sách Gallery Tour</h3>
                </div>
                <div class="tr-single-body">
                    <div style="display: flex; float: right;">
                        <a href="" style="margin-right: 15px;" type="button" class="btn theme-btn" data-toggle="modal"
                            data-target="#add_gallery_more_tour"><span class="ti-plus"></span> Add
                            Gallery</a>
                        <a href="{{ route('ListGalleryTour') }}" id="deleteCheckbox_gal" class="btn theme-btn"><i
                                class="ti-trash"></i> Delete</a>
                    </div>
                    <!-- ====================== Book Popular Hotel ================= -->
                    <div class="clearfix"></div>
                    <div class="table-responsive" style="margin-top: 20px; ">
                        <table class="table table-striped table-hover" id="table_gallery" data-page-length='5'>
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="checkbox_gallery_tour"></th>
                                    <th>STT</th>
                                    <th>Tên Tour</th>
                                    <th>Hình Ảnh</th>
                                    <th>Ngày Tạo</th>
                                    <th>Funtion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- tr -->
                                @if (!empty($list_gallery_tour))
                                    @foreach ($list_gallery_tour as $key => $item)
                                        <tr>
                                            <td><input type="checkbox" name="id" class="checkbox_gal_id"
                                                    value="{{ $item->id }}"></td>
                                            <td>{{ $key + 1 }}</td>

                                            <td><b>{{ $item->tour_name->tourname }}</b></td>

                                            <td><img src="/storage/photos/2/gallery/{{ $item->gallery_img }}" alt=""
                                                    class="img-thumbnail" width="100"></td>
                                            <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                <a href="" class="tbl-action settings" title="Settings"
                                                    data-toggle="tooltip"><i class="ti-pencil"></i></a>
                                                <a href="{{ route('Delete_Gallery', ['id' => $item->id]) }}"
                                                    class="tbl-action bg-danger delete-gallery" title="Delete"
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
    {{-- ----------------------------- Add gallery for more tours ------------------------------------ --}}
    <div class="modal fade" id="add_gallery_more_tour" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div>
                        <button style="font-size: 25px;" type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="text-center">
                        {{-- <img src="assets/img/logo.png" class="img-responsive" alt=""> --}}
                        <a href="" class="navbar-brand" style="margin-right:0px; ">
                            <h1 style="color:black; font-weight:600; font-size: 2.5rem;" class="m-0">Thêm Gallery</h1>
                        </a>
                    </div>
                    <!-- Tab panels -->
                    <div class="tab-content">
                        <!-- Employer Panel 1-->
                        <div class="tab-pane fade in show active" role="tabpanel">
                            <form style="margin-bottom: 15px;" action="{{ route('PostGallery_Tour') }}" method="POST"
                                role="form" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group" style="margin-top: 10px;">
                                    <label for="" style="font-size: 16px;">Tên tour cần thêm ảnh:</label>
                                    <div class="sl-box">
                                        <select name="tour_id" class="form-control wide">
                                            @if (!empty($tour))
                                                @foreach ($tour as $key => $tour_item)
                                                    <option value="{{ $tour_item->id }}">{{ $tour_item->tourname }}
                                                    </option>
                                                @endforeach
                                            @else
                                                <option value="null">không có danh mục</option>
                                            @endif
                                        </select>
                                    </div>
                                    <label for="dm_blog_name" style="font-size: 16px;">Upload img:</label>
                                    <input style="border-radius:0px; padding:11px 12px 10px;" type="file"
                                        name="file_gallery[]" id="file_gallery" class="form-control" accept="image/*"
                                        multiple required>
                                    <div style="color: red" id="error_gallery"></div>
                                </div>
                                <div style="text-align: center;">
                                    <button type="Submit" class="btn theme-btn btn-m">Submit </button>
                                </div>
                                @csrf
                            </form>
                        </div>
                        <!--/.Panel 1-->
                    </div>
                    <!-- Tab panels -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js_content_adm')
@endsection
