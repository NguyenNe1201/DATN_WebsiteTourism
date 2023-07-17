@extends('users.layout_user.app')
@section('css-layout-user')
    <style>
        /*  */
        .col-md-2,
        .col-sm-2 {
            padding-right: 5px !important;
            padding-left: 5px !important;
        }

        .col-lg-1,
        .col-lg-10,
        .col-lg-11,
        .col-lg-12,
        .col-lg-2,
        .col-lg-3,
        .col-lg-4,
        .col-lg-5,
        .col-lg-6,
        .col-lg-7,
        .col-lg-8,
        .col-lg-9,
        .col-md-1,
        .col-md-10,
        .col-md-11,
        .col-md-12,
        .col-md-2,
        .col-md-3,
        .col-md-4,
        .col-md-5,
        .col-md-6,
        .col-md-7,
        .col-md-8,
        .col-md-9,
        .col-sm-1,
        .col-sm-10,
        .col-sm-11,
        .col-sm-12,
        .col-sm-2,
        .col-sm-3,
        .col-sm-4,
        .col-sm-5,
        .col-sm-6,
        .col-sm-7,
        .col-sm-8,
        .col-sm-9,
        .col-xs-1,
        .col-xs-10,
        .col-xs-11,
        .col-xs-12,
        .col-xs-2,
        .col-xs-3,
        .col-xs-4,
        .col-xs-5,
        .col-xs-6,
        .col-xs-7,
        .col-xs-8,
        .col-xs-9 {
            position: relative;
            min-height: 1px;
            padding-right: 10px;
            padding-left: 10px;
        }

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
            font-weight: 550;
        }

        /* edit nice-select bootstrap */
        .nice-select {
            display: none !important;
        }

        /* Hiển thị thành phần select gốc */
        select[name="category_id"] {
            display: block !important;
        }
    </style>
@endsection
@section('PageTitle')
    @include('users.main_user.include.StartPageTitle')
@endsection
@section('content')
    <!-- ======================= Guide Detail ===================== -->
    <section class="tr-single-detail gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    {{--  --}}
                    @include('users.main_user.include.RightMenu_user')
                    {{--  --}}
                    <div class=" col-md-10 col-sm-10 ">
                        <div class="row mrg-0">
                            <div class="tr-single-box">
                                <div class="tr-single-header">
                                    <h3 class="dashboard-title">Thêm Blog</h3>
                                </div>
                                <div class="tr-single-body">
                                    {{-- @include('admin.alert') --}}
                                    {{-- @if (session('error'))
                                        <div class="alert alert-danger">{{ session('error') }}</div>
                                    @endif --}}
                                    <form id="add_blog_jqvali" class="jquery_valiss form-horizontal " method="POST"
                                        action="{{ route('post_addblog_user') }}" role="form"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="admin_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="status_blog" value="0">
                                        <div class="form-group">
                                            <label for="category_id" class="col-md-2 col-sm-3 col-form-label">Tên danh
                                                mục:</label>
                                            <div class="col-md-10 col-sm-9">

                                                <select name="category_id" id="category_id" class="form-control wide"
                                                    required>
                                                    @if (!empty($categoryblog) && $categoryblog->count() > 0)
                                                        <option value="">----- chọn danh mục -----</option>
                                                        @foreach ($categoryblog as $key => $item)
                                                            <option value="{{ $item->id }}">{{ $item->dm_blog_name }}
                                                            </option>
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
                                                    value="{{ old('title') }}" placeholder="nhập" required>
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
                                                <input style="padding:13px 12px 10px;" class="form-control"
                                                    id="UploadAvatar" name="img_title" type="file" required>
                                                <div id="image_show" style="margin-top: 10px; float: left;">
                                                    <img src="/assets/img/png-avatar-icon.png" width="100" height="90"
                                                        alt="">
                                                </div>
                                                <input type="hidden" name="file" id="file">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12 col-sm-12 text-center" style="margin-top: 20px;">
                                                <button style="font-weight: 600;" type="submit"
                                                    class="btn theme-btn">Submit</button>
                                  
                                            </div>
                                        </div>
                                        @csrf
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js-layout-user')
    <script type="text/javascript">
        CKEDITOR.replace('content_blog', options);
    </script>
@endsection
