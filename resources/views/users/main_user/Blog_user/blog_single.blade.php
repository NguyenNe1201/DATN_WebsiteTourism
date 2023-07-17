@extends('users.layout_user.app')
@section('css-layout-user')
    <style>
        .blog-thumb--style2 {
            position: relative;
        }

        .blog-thumb--style2 .overlay-date {
            position: absolute;
            background-color: #ed8b34;
            color: #fff;
            font-size: 16px;
            left: 50%;
            transform: translateX(-50%);
            bottom: -17px;
            height: 38px;
            width: 145px;
            line-height: 38px;
            font-weight: 600;
            text-align: center;
        }

        .blog-content--style2 {
            padding: 30px 0;
            border-bottom: 1px solid #e5e5e5;
        }

        .blog-content--style2 .title {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .blog-content--style2 p {
            margin-top: 20px;
        }

        .blog-content--style2 .cmn-btn {
            margin-top: 30px;
        }

        .blog-content--style2 .meta-post .meta-user span {
            position: relative;
            color: var(--main-color);
            padding-right: 10px;
        }

        .blog-content--style2 .meta-post .meta-user span::after {
            position: absolute;
            content: '';
            width: 2px;
            height: 15px;
            top: 5px;
            right: 0;
            /* background-color: #e5e5e5; */
        }

        .blog-content--style2 .meta-post .meta-details span {
            padding-left: 10px;
            color: var(--main-color);
        }

        .blog-content--style3 {
            border: none;
        }

        .meta-user {
            font-weight: 500;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
        }

        .mb-2,
        .my-2 {
            margin-bottom: 0.5rem !important;
        }

        .w-50 {
            width: 50% !important;
        }

        .float-left {
            float: left !important;
        }

        .float-right {
            float: right !important;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .mb-4,
        .my-4 {
            margin-bottom: 1.5rem !important;
        }

        .media {
            display: flex;
            align-items: flex-start;
        }

        .media-body {
            flex: 1;
        }

        .media-body>h6 {
            font-size: 16px;
            margin-bottom: 0.5rem;
            margin-top: 0px;
        }

        .media-body>h6>small {
            font-size: 13px;
            color: #212121;
        }

        .media-body>button {
            font-size: 14px;
            padding: 5px 10px;
            font-weight: 500;
        }

        .mr-3,
        .mx-3 {
            margin-right: 1rem !important;
        }

        .mt-1,
        .my-1 {
            margin-top: 0.25rem !important;
        }

        .btn-outline-primary {
            color: rgba(237, 139, 52, 1);
            border-color: rgba(237, 139, 52, 1);
        }

        .btn-outline-primary:hover {
            color: #fff;
            background-color: rgba(237, 139, 52, 1);
            border-color: rgba(237, 139, 52, 1);
        }


        .mb-5,
        .my-5 {
            margin-bottom: 3rem !important;
        }

        .text-uppercase {
            font-weight: 600;
            color: #212121;
            font-size: 24px;
        }

        .list-inline1 {
            padding-left: 0;
            list-style: none;
        }

        .align-items-center {
            align-items: center !important;
        }

        .justify-content-between {
            justify-content: space-between !important;
        }

        .text-dark {
            color: #212121 !important;
            font-size: 16px;
        }

        .d-flex {
            display: flex !important;
        }

        .badge {
            display: inline-block;
            min-width: 10px;
            padding: 3px 7px;
            font-size: 12px;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            background-color: #ed8b34;
            border-radius: 10px;
        }

        .text-primary {
            color: #ED8B34 !important;
        }

        .mr-2,
        .mx-2 {
            margin-right: 0.5rem !important;
        }

        .pl-3,
        .px-3 {
            padding-left: 1rem !important;
        }

        .text-decoration-none {
            text-decoration: none !important;
        }

        .pl-3,
        .px-3 {
            padding-left: 1rem !important;
        }

        .pl-3>h6 {
            font-weight: 600;
            font-size: 15px;
        }

        .pl-3>small {
            font-weight: 500;
            font-size: 13px;
            color: #212121;
        }

        .m-1 {
            margin: 0.25rem !important;
        }

        .style-edit-blog>p>img {
            max-width: 100%;
            height: auto !important;
        }

        .style-edit-blog img {
            max-width: 100%;
            height: auto !important;
        }
    </style>
@endsection
@section('PageTitle')
    @include('users.main_user.include.StartPageTitle')
@endsection
@section('content')
    <!-- =========== Who We Are =================== -->
    <section class="tr-single-detail gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                {{-- --------- right blog --------- --}}
                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    <div class="pb-3">
                        <div class="blog-item">
                            <div class="position-relative blog-thumb--style2">
                                <img class="img-fluid w-100" src="{{ $getDetail_blog->img_title }}" alt="blog img">

                                <a href="#0"
                                    class="overlay-date">{{ $getDetail_blog->created_at->format('d - m - Y') }}</a>
                            </div>
                        </div>
                        <div class="mb-3" style=" background: #fff; padding: 30px;">
                            <div class="d-flex mb-3">
                                <div style="display: flex;">
                                    <img alt="" src="{{ $getDetail_blog->user->avatar }}" class="avatar avatar-24"
                                        height="24" width="24">
                                    <div style="margin: auto 10px;">
                                        <a style="font-size: 17px; font-weight: 700; color: #f06724;"
                                            href="#">{{ $getDetail_blog->user->name }}</a>
                                    </div>
                                </div>
                            </div>
                            <h2 class="mb-3">{{ $getDetail_blog->title }}</h2>
                            <div class="style-edit-blog">{!! $getDetail_blog->content !!}</div>
                            <!-- ====================== Domestic Routes ================= -->
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!-- Show comment blog -->
                    <div style="padding: 30px; margin: 30px 0px; background: #fff;">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Bình luận</h4>
                        <div id="hienbinhluan">
                            @if (!empty($showcmt_blog) && $showcmt_blog->count() > 0)
                                @foreach ($showcmt_blog as $item_cmt)
                                    <div class="media mb-4" id="">
                                        <img src="{{ $item_cmt->customer->avatar }}" alt="Image"
                                            class="img-fluid mr-3 mt-1" style="width: 45px;">
                                        <div class="media-body">
                                            <h6><a href="">{{ $item_cmt->customer->name }}</a>
                                                <small
                                                    style="color:#ff4e00;"><i>{{ $item_cmt->created_at->format('d/m/Y H:i:s') }}</i></small>
                                            </h6>
                                            <p style="color: #212121;">{{ $item_cmt->content_cmt }}</p>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- /Row -->
                                {{-- <div class="row">
                                    <ul class="pagination"> --}}
                                {{-- paginator // phân trang --}}
                                {{-- {{ $showcmt_blog->links() }}
                                    </ul> --}}
                                {{-- </div> --}}
                            @endif
                        </div>
                    </div>
                    {{-- form comment blog --}}
                    <div class="leave-comment">
                        <div class="form-box" style=" padding: 30px; background: #fff;">
                            <h4 class="text-uppercase mb-4" style="letter-spacing: 2px;">Gửi bình luận tại đây</h4>
                            <form class="c-form comment-form" action="{{ route('post_comment_blog') }}" method="POST">
                                @if (!empty(Auth::user()->id))
                                    <input type="hidden" name="customer_id_cmt" id="customer_id_cmt"
                                        value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="avatar_user" id="avatar_user"
                                        value="{{ Auth::user()->avatar }}">
                                    <input type="hidden" name="" id="customer_name" name="customer_name"
                                        value="{{ Auth::user()->name }}">
                                @endif
                                <input type="hidden" name="blog_single_id" id="blog_single_id"
                                    value="{{ $getDetail_blog->id }}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Message</label>
                                        <textarea class="form-control height-150" placeholder="viết bình phần bình luận của bạn tại đây...." name="content_cmt"
                                            id="content_cmt"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="comment-a btn theme-btn btn-arrow">Comment
                                            Now</button>
                                    </div>
                                </div>
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
                {{-- --------- end right blog --------- --}}
                {{-- --------- left blog ------------ --}}
                <div class="col-lg-4 mt-5 mt-lg-0">
                    <div class="mb-5">
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
                                            <input type="text" name="search" id="timkiem_blog" class="form-control"
                                                placeholder="Nhập blog bạn muốn tìm...">
                                            <ul class="list-group" id="result_li"></ul>
                                        </div>
                                        <button style="border-radius:50px;" type="submit" class="btn theme-btn">Tìm Kiếm
                                            <span class="ti-arrow-right"></span></button>
                                    </form>
                                </div>
                                <!-- category blog -->
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
                                                            <i style="color:#ED8B34;"
                                                                class="fa fa-angle-right text-primary mr-2"></i>
                                                            <label for="144"></label>
                                                            <span>{{ $item2->dm_blog_name }}</span>
                                                            <span
                                                                class="pull-right badge badge-primary badge-pill">{{ $countblog[$item2->id] }}</span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!------------------- Relate Blog --------------------->
                    <div class="md-5">
                        <div class="tr-single-box">
                            <div class="tr-single-header">
                                <h4>Blog Liên Quan</h4>
                            </div>
                            <div class="tr-single-body">
                                <div class="single-side-slide">
                                    @if (!empty($relate_blog) && $relate_blog->count() > 0)
                                        @foreach ($relate_blog as $key => $item1)
                                            <div class="col-md-4 col-sm-6">
                                                <article class="hotel-box style-1">

                                                    <div class="hotel-box-image">
                                                        <figure>
                                                            <a href="{{ route('blogSingle', ['id' => $item1->id]) }}">
                                                                <img src=" {{ $item1->img_title }} "
                                                                    class="img-responsive listing-box-img"
                                                                    alt="" />
                                                                <div class="list-overlay"></div>
                                                                <div class="read_more"><span>Read more</span></div>
                                                            </a>
                                                            <div class="discount-flick">hot</div>
                                                            <h4 class="hotel-place">
                                                                <a
                                                                    href="{{ route('blogSingle', ['id' => $item1->id]) }}">{{ $item1->cate_blog->dm_blog_name }}</a>
                                                            </h4>
                                                            <a href="#" class="favorite-blog-a list-like left"
                                                                 data-blog-id="{{ $item1->id }}"><i class="ti-heart"></i></a>
                                                        </figure>

                                                    </div>

                                                    <div class="entry-meta">
                                                        <div class="meta-item meta-author">
                                                            <div class="coauthors">
                                                                <span class="vcard author">
                                                                    <span class="fn">
                                                                        <a href="#"><img alt=""
                                                                                src="{{ $item1->user->avatar }}"
                                                                                class="avatar avatar-24" height="24"
                                                                                width="24">{{ $item1->user->name }}</a>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="hotel-detail-box">
                                                        <div class="hotel-ellipsis">
                                                            <h4 class="hotel-name">
                                                                <a
                                                                    href="{{ route('blogSingle', ['id' => $item1->id]) }}">{{ $item1->title }}</a>
                                                            </h4>
                                                            {{-- <p>Proin mi nisi, ultrices eget dictum a, volutpat at risus.
                                                                Aliquam elementum.</p> --}}
                                                        </div>
                                                    </div>

                                                    <div class="hotel-inner inner-box">
                                                        <div class="box-inner-ellipsis">
                                                            <div class="hotel-review entry-location">
                                                                <span class="review-status bg-danger"><i
                                                                        class="ti-check"></i></span>
                                                                <h6><span
                                                                        class="cl-danger font-bold">Poor</span>{{ $item1->updated_at->format('d/m/Y') }}
                                                                </h6>
                                                            </div>
                                                            <div class="view-box">
                                                                <div class="meta-item meta-comment fl-right">
                                                                    <i class="ti-comment-alt"></i>
                                                                    @if (isset($commentCounts[$item1->id]))
                                                                        <span>{{ $commentCounts[$item1->id] }}</span>
                                                                    @else
                                                                        <span>0</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                        @endforeach
                                    @else
                                        <p style="text-align: center; margin:15px 0px; font-size: 16px;">không có bài viết
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!------------------- end Relate Blog --------------------->
                    {{-- featured blog --}}
                    <div class="md-5">
                        <div class="tr-single-box">
                            <div class="tr-single-header">
                                <h4>Blog Nổi Bật</h4>
                            </div>
                            <div class="tr-single-body">
                                <div class="single-side-slide">
                                    @if (!empty($blogtopbinhluan) && $blogtopbinhluan->count() > 0)
                                        @foreach ($blogtopbinhluan as $item_top)
                                            <div class="col-md-4 col-sm-6">
                                                <article class="hotel-box style-1">

                                                    <div class="hotel-box-image">
                                                        <figure>
                                                            <a href="{{ route('blogSingle', ['id' => $item_top->id]) }}">
                                                                <img src=" {{ $item_top->img_title }} "
                                                                    class="img-responsive listing-box-img"
                                                                    alt="" />
                                                                <div class="list-overlay"></div>
                                                                <div class="read_more"><span>Read more</span></div>
                                                            </a>
                                                            <div class="discount-flick">hot</div>
                                                            <h4 class="hotel-place">
                                                                <a
                                                                    href="{{ route('blogSingle', ['id' => $item_top->id]) }}">{{ $item_top->cate_blog->dm_blog_name }}</a>
                                                            </h4>
                                                            <a href="#" class="favorite-blog-a list-like left"
                                                                data-blog-id="{{ $item_top->id }}"><i
                                                                    class="ti-heart"></i></a>
                                                        </figure>
                                                    </div>

                                                    <div class="entry-meta">
                                                        <div class="meta-item meta-author">
                                                            <div class="coauthors">
                                                                <span class="vcard author">
                                                                    <span class="fn">
                                                                        <a href="#"><img alt=""
                                                                                src="{{ $item_top->user->avatar }}"
                                                                                class="avatar avatar-24" height="24"
                                                                                width="24">{{ $item_top->user->name }}</a>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="hotel-detail-box">
                                                        <div class="hotel-ellipsis">
                                                            <h4 class="hotel-name">
                                                                <a
                                                                    href="{{ route('blogSingle', ['id' => $item_top->id]) }}">{{ $item_top->title }}</a>
                                                            </h4>

                                                        </div>
                                                    </div>

                                                    <div class="hotel-inner inner-box">
                                                        <div class="box-inner-ellipsis">
                                                            <div class="hotel-review entry-location">
                                                                <span class="review-status bg-danger"><i
                                                                        class="ti-check"></i></span>
                                                                <h6><span
                                                                        class="cl-danger font-bold">Poor</span>{{ $item_top->updated_at->format('d/m/Y') }}
                                                                </h6>
                                                            </div>
                                                            <div class="view-box">
                                                                <div class="meta-item meta-comment fl-right">
                                                                    <i class="ti-comment-alt"></i>
                                                                    @if (isset($commentCounts[$item_top->id]))
                                                                        <span>{{ $commentCounts[$item_top->id] }}</span>
                                                                    @else
                                                                        <span>0</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                        @endforeach
                                    @else
                                        <p style="text-align: center; margin:15px 0px; font-size: 16px;">không có bài viết
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end featured blog --}}
                </div>
                {{-- ------------ end left blog ------------ --}}
            </div>
        </div>
    </section>
@endsection
@section('js-layout-user')
    <script type="text/javascript">
        const submitBtn = document.querySelector('.comment-form .comment-a');
        submitBtn.addEventListener('click', (event) => {
            event.preventDefault();
            $.ajax({
                type: "GET",
                url: "/check_login_cus",
                success: function(data) {
                    if (data.loggedIn && data.userRole == 0) {
                        let content = $('#content_cmt').val();
                        let customer_id_cmt = $('#customer_id_cmt').val();
                        let blog_single_id = $('#blog_single_id').val();
                        let customer_name = $('#customer_name').val();
                        let userAvatar = $('#avatar_user').val();; // Thêm dòng này
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "/home/post_comment_blog",
                            type: "POST",
                            data: {
                                content: content,
                                customer_id_cmt: customer_id_cmt,
                                blog_single_id: blog_single_id
                            },
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire({
                                        title: 'Thông báo',
                                        text: 'Bình luận thành công!',
                                        icon: 'success',
                                        time: 4000
                                    });
                                    $('#content_cmt').val('');
                                    // Thêm bình luận mới vào danh sách bình luận
                                    var binhluanmoi = '<div class="media mb-4">' +
                                        '<img src = "' + userAvatar +
                                        '" alt = "Image" class = "img-fluid mr-3 mt-1" style = "width: 45px;" >' +
                                        '<div class = "media-body">' +
                                        '<h6>' + '<a>' + customer_name + '</a>' +
                                        ' <small style="color:#ff4e00;">' + ' <i>' +
                                        response.ngay + '</i>' +
                                        '</small>' + ' </h6>' +
                                        '<p style="color: #212121;">' + content + '</p>' +
                                        '</div>' + '</div>';
                                    $('#hienbinhluan').prepend(binhluanmoi);
                                } else {
                                    alert('Failed to add comment.');
                                }
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Thông báo',
                            text: 'Bạn cần đăng nhập!',
                            icon: 'warning',
                            time: 4000
                        });
                    }
                }
            });
        });
    </script>
@endsection
