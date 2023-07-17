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
            border: 1px solid #ccc;
        }
          /* edit nice-select bootstrap */
          .nice-select {
            display: none !important;
        }
        /* Hiển thị thành phần select gốc */
        select[name="category_id"] {
            display: block !important;
        }
        label{
            color: #334e6f;
        }
    </style>
@endsection
@section('content_adm')
    <!-- ======================= Start add blog===================== -->
    <div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
        <div class="row mrg-0 mrg-top-20">
            <div class="tr-single-box">
                <div class="tr-single-header">
                    <h3 class="dashboard-title">Thêm Blog</h3>
                </div>
                <div class="tr-single-body">
                    {{-- @include('admin.alert') --}}
                    {{-- @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif --}}
                    <form id="add_blog_jqvali" class="jquery_valiss form-horizontal" method="POST" action=""
                        role="form" enctype="multipart/form-data">
                        <input type="hidden" name="admin_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="status_blog" value="1">
                        <div class="form-group">
                            <label for="category_id" class="col-md-2 col-sm-3 col-form-label">Tên danh mục:</label>
                            <div class="col-md-10 col-sm-9">
                             
                                    <select name="category_id" id="category_id" class="form-control wide" required>
                                        @if (!empty($categoryblog) && $categoryblog->count() > 0)
                                            <option value="">----- chọn danh mục -----</option>
                                            @foreach ($categoryblog as $key => $item)
                                                <option value="{{ $item->id }}">{{ $item->dm_blog_name }}</option>
                                            @endforeach
                                        @else
                                            <option value="">----- Không có danh mục -----</option>
                                        @endif
                                    </select>
                              
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-md-2 col-sm-3">Tiêu đề chính:</label>
                            <div class="col-md-10 col-sm-9">
                                <input name="title" id="title" type="text" class="form-control"
                                    value="{{ old('title') }}" placeholder="Nhập tiêu đề cho blog" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="content" class="col-md-2 col-sm-3">Nội dung:</label>
                            <div class="col-md-10 col-sm-9">
                                <textarea name="content_blog" id="content_blog" class="form-control height-100" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="img_title" class="col-md-2 col-sm-3">Upload logo:</label>
                            <div class="col-md-10 col-sm-9">
                                {{-- <label for="img_title" class="btn-bs-file btn"> Browse </label> --}}
                                <input style="padding:13px 12px 10px;" class="form-control" id="UploadAvatar"
                                    name="img_title" type="file" required>
                                <div id="image_show" style="margin-top: 10px; float: left;">
                                    <img src="/assets/img/png-avatar-icon.png" width="100" height="90" alt="">
                                </div>
                                <input type="hidden" name="file" id="file">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 text-center" style="margin-top: 20px;">
                                <button style="font-weight: 600;" type="submit" class="btn theme-btn">Submit</button>
                                <a href="{{ route('ListBlogContent') }}" style="font-weight:600;" type="button"
                                    class="btn btn-warning">CANCEL</a>
                            </div>
                        </div>
                        @csrf
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- ======================= End  basic-settings ===================== -->
@endsection
@section('js_content_adm')
    <script type="text/javascript">
        CKEDITOR.replace('content_blog', options);
    </script>
@endsection
