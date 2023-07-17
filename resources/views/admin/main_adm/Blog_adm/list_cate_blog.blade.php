@extends('admin.layout_adm.app_dashboard')
@section('css_content_adm')
    <style>
        .form-control {
            border-radius: 0px;
        }
    </style>
@endsection
@section('content_adm')
    <div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
        {{-- list category blog --}}
        <div class="row mrg-0 mrg-top-20">
            <div class="tr-single-box">
                <div class="tr-single-header">
                    <h3 class="dashboard-title">Danh Sách Danh Mục blog</h3>
                </div>
                <div class="tr-single-body">
                    <div style="display: flex; float: right;">
                        <a style="margin-right: 15px;" type="button" class="btn theme-btn" data-toggle="modal"
                            data-target="#add_category"><span class="ti-plus"></span> Add</a>
                        <a style="margin-right: 15px;" type="button" class="btn theme-btn" id="edit_category_blog"><i
                                class="ti-pencil"></i>
                            Edit</a>
                        <a href="{{ route('ListCategoryBlog') }}" id="deleteCheckbox" class="btn theme-btn"><i
                                class="ti-trash"></i> Delete</a>
                    </div>
                    <!-- ====================== Book Popular Hotel ================= -->
                    <div class="clearfix"></div>
                    <div class="table-responsive" style="margin-top: 20px; ">
                        <table class="table table-striped table-hover" id="table_list_categoryblog" data-page-length='5'>
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="checkbox_cate_blog"></th>
                                    <th>STT</th>
                                    <th>Danh Mục</th>
                                    <th>Ngày Tạo</th>
                                    <th>Ngày Cập Nhật</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- tr -->
                                @if (!empty($categoryblog))
                                    @foreach ($categoryblog as $key => $item)
                                        <tr>
                                            <td> <input type="checkbox" name="id" class="checkbox1"
                                                    value="{{ $item->id }}"></td>
                                            <td>{{ $key + 1 }}</td>
                                            <td><b>{{ $item->dm_blog_name }}</b></td>
                                            <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                {{ $item->updated_at->format('d/m/Y') }}
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
    <!------------------------------- add category Code ------------------------------------------>
    <div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <h1 style="color:black; font-weight:600; font-size: 2.5rem;" class="m-0">Thêm Danh Mục</h1>
                        </a>
                    </div>
                    <!-- Tab panels -->
                    <div class="tab-content">
                        <!-- Employer Panel 1-->
                        <div class="tab-pane fade in show active" role="tabpanel">
                            <form id="add_cateblog_jqvali" class="jquery_valiss" style="margin-bottom: 15px;"
                                action="{{ route('inputaddCetegoryBlog') }}" method="POST" role="form"
                                enctype="multipart/form-data">
                                <div class="form-group" style="margin-top: 10px;">
                                    <label for="dm_blog_name" style="font-size: 16px;">Tên danh mục:</label>
                                    <input name="dm_blog_name" id="dm_blog_name" style="border-radius:0px;" type="text"
                                        class="form-control" placeholder="Nhập danh mục " required>
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
    <!------------------------------- END add category Code ------------------------------------------>
    <!------------------------------- EDIT CATEGORY BLOG ------------------------------------------>
    <div class="modal fade" id="edit_1_category_blog" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <h1 style="color:black; font-weight:600; font-size: 2.5rem;" class="m-0">Chỉnh Sửa Danh Mục
                            </h1>
                        </a>
                    </div>
                    <!-- Tab panels -->
                    <div class="tab-content">
                        <!-- Employer Panel 1-->
                        <div class="tab-pane fade in show active" role="tabpanel">
                            <form id="edit_cateblog_jqvali" class="jquery_valiss" style="margin-bottom: 15px;"
                                action="{{ route('EditCategory_Blog') }}" method="POST" role="form"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group" style="margin-top: 10px;">
                                    <label for="" style="font-size: 16px;">Tên danh mục cần chỉnh sửa:</label>
                                    <div>
                                        <div id="list_cate"></div>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-top: 10px;">
                                    <label for="updm_blog_name" style="font-size: 16px;">Tên danh mục mới:</label>
                                    <input name="updm_blog_name" id="updm_blog_name" style="border-radius:0px;"
                                        type="text" class="form-control" placeholder="Nhập danh mục ">
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
    <!------------------------------- END edit category blog ------------------------------------------>
    <!------------------------------- EDIT ALL CATEGORY BLOG ------------------------------------------>
    <div class="modal fade" id="edit_allcategory_blog" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <h1 style="color:black; font-weight:600; font-size: 2.5rem;" class="m-0">Chỉnh Sửa Danh Mục
                            </h1>
                        </a>
                    </div>
                    <!-- Tab panels -->
                    <div class="tab-content">
                        <!-- Employer Panel 1-->
                        <div class="tab-pane fade in show active" role="tabpanel">
                            <form id="edit_cateblog_jqvali" class="jquery_valiss" style="margin-bottom: 15px;"
                                action="{{ route('EditCategory_Blog') }}" method="POST" role="form"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group" style="margin-top: 10px;">
                                    <label for="dm_blog_get" style="font-size: 16px;">Tên danh mục cần chỉnh sửa:</label>
                                    <div class="sl-box">
                                        <select name="dm_blog_get" class="form-control wide">
                                            @if (!empty($categoryblog))
                                                @foreach ($categoryblog as $key => $cate)
                                                    <option value="{{ $cate->id }}">{{ $cate->dm_blog_name }}
                                                    </option>
                                                @endforeach
                                            @else
                                                <option value="null">không có danh mục</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-top: 10px;">
                                    <label for="updm_blog_name" style="font-size: 16px;">Tên danh mục mới:</label>
                                    <input name="updm_blog_name" style="border-radius:0px;" type="text"
                                        class="form-control" placeholder="Nhập danh mục ">
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
    <!------------------------------- END edit all category blog ------------------------------------------>
@endsection

