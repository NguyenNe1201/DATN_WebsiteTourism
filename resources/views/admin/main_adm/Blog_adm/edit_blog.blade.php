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
            font-weight: 550;
        }
    </style>
@endsection
@section('content_adm')
    <!-- ======================= Start add blog===================== -->
    <div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
        <div class="row mrg-0 mrg-top-20">
            <div class="tr-single-box">
                <div class="tr-single-header">
                    <h3 class="dashboard-title">Chỉnh Sửa Blog</h3>
                </div>
                <div class="tr-single-body">
                    @include('admin.alert')
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <form id="edit_blog_jqvali" class="jquery_valiss form-horizontal"method="POST"
                        action="{{ route('PostEdit_Blog') }}" role="form" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="category_id" class="col-md-2 col-sm-3">Tên danh mục:</label>
                            <div class="col-md-10 col-sm-9">
                                <div class="sl-box">
                                    <select name="category_id" id="category_id" class="form-control wide">
                                        @if(!empty($categoryblog)&&$categoryblog->count() > 0)
                                            @foreach ($categoryblog as $key => $item)
                                                @if ($editBlog->category_id == $item->id)
                                                    <option selected
                                                        value="{{ old('category_id') ?? $editBlog->category_id }}">
                                                        {{ $item->dm_blog_name }}</option>
                                                @else
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->dm_blog_name }}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option value="null">Không có danh mục</option>
                                        @endif
                                    </select>
                                </div>
                                {{-- <input name="category_id" id="category_id" type="text" class="form-control" value="1" placeholder="nhập"> --}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-md-2 col-sm-3">Tiêu đề chính:</label>
                            <div class="col-md-10 col-sm-9">
                                <input name="title" id="title" type="text" class="form-control"
                                    value="{{ old('title') ?? $editBlog->title }}" placeholder="nhập">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="content_blog" class="col-md-2 col-sm-3">Nội dung:</label>
                            <div class="col-md-10 col-sm-9">
                                {{-- <input class="form-control height-100" type="text" name="" id=""> --}}
                                <textarea name="content_blog" id="content_blog"class="form-control height-100" required>
                                    {{ $editBlog->content }}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="img_title" class="col-md-2 col-sm-3">Upload logo:</label>
                            <div class="col-md-10 col-sm-9">
                                <input style="padding:13px 12px 10px;" class="form-control" id="UploadAvatar"
                                    name="img_title" type="file">
                                <div id="image_show" style="margin-top: 10px; float: left;">
                                    <img src="{{ $editBlog->img_title }}" width="100" alt="">
                                </div>
                                <input type="hidden" value="{{ old('upfile') ?? $editBlog->img_title }}" name="upfile"
                                    id="file">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 text-center" style="margin-top: 20px;">
                                <button style="font-weight: 600;" type="submit" class="btn theme-btn">Save</button>
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
