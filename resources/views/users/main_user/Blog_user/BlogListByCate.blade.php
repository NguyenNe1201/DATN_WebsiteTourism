@extends('users.layout_user.app')
@section('PageTitle')
    @include('users.main_user.include.StartPageTitle')
@endsection
@section('content')
    <!-- =========== Start All Hotel In Grid View =================== -->
    <section class="gray-bg">
        <div class="container">
            <div class="row">

                <!-- Filter Sidebar -->
                <div class="col-md-4 col-sm-12">
                    @include('users.main_user.include.FilterBlog')
                </div>
                <!-- All Item -->
                <div class="col-md-8 col-sm-12">

                    <!-- Row -->
                    <div class="row mrg-0">
                        <div class="tr-single-box short-box">
                            <div class="col-sm-6 hidden-xs align-self-center">
                                <h4>Blog Theo Danh Mục</h4>
                            </div>

                            <div class="col-sm-6 text-right">

                                {{-- <div class="btn-group mr-lg-2">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Short By
                                    </button>
                                    <div class="dropdown-menu pull-right animated flipInX">
                                        <a href="#">Accending</a>
                                        <a href="#">Decending</a>
                                        <a href="#">By Date</a>
                                    </div>
                                </div> --}}

                                <div class="btn-group">
                                    <a href="" class="btn btn-default tooltips">
                                        <i class="ti-flix ti-layout-grid2"></i>
                                    </a>
                                </div>

                                <div class="btn-group">
                                    <a href="" class="btn btn-default tooltips">
                                        <i class="ti-flix ti-view-list-alt"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->
                    {{--  --}}
                    <!-- Row -->
                    {{-- @if (session('msg'))
                        <div class="alert alert-success">{{ session('msg') }}</div>
                    @endif --}}
                    @if (Session::has('error'))
                        <div class="Authority">
                            <script>
                                document.addEventListener("DOMContentLoaded", function(event) {
                                    Swal.fire({
                                        position: 'center-center',
                                        icon: 'error',
                                        title: '{{ Session::get('error') }}',
                                        showConfirmButton: false,
                                        timer: 3000
                                    })
                                })
                            </script>
                        </div>
                    @endif
                    <div class="row">
                        <!-- Singl hotel List -->
                        @if (!empty($blog_list_by_cate)&& $blog_list_by_cate ->count() > 0)
                            @foreach ($blog_list_by_cate as $key => $item)
                                <div class="col-md-12 col-sm-12">
                                    <article class="hotel-box list-style">
                                        <div class="row">

                                            <div class="col-md-5 col-sm-5">
                                                <div class="hotel-box-image">
                                                    <a style="width: 100%;"
                                                        href="{{ route('blogSingle', ['id' => $item->id]) }}">
                                                        <img src="{{ $item->img_title }}"
                                                            class="img-responsive hotel-box-img" alt="">
                                                    </a>
                                                    <div class="entry-bookmark">
                                                        <a href=""><i class="ti-bookmark"></i></a>
                                                    </div>
                                                    {{-- <h4 class="hotel-place">
                                                <a href="#">Netherlands</a>
                                            </h4> --}}
                                                    <span class="featured-tour"><i class="fa fa-star"></i></span>
                                                    <a href="#" class="favorite-blog-a list-like left"
                                                    data-blog-id="{{ $item->id }}"><i class="ti-heart"></i></a>
                                                </div>
                                            </div>

                                            <div class="col-md-7 col-sm-7">
                                                <div class="inner-box">

                                                    <div class="box-inner-ellipsis">
                                                        <div style="margin: 0px; padding: 0px; border: 0px;">
                                                          
                                                            <h3 class="entry-title">
                                                                <a href="">{{ $item->dm_blog_name }}</a>
                                                            </h3>
                                                            <div class="entry-content">
                                                                <p>{{ $item->title }}</p>
                                                                <div class="meta-item meta-author">
                                                                    <div class="coauthors">
                                                                        <span class="vcard author">
                                                                            <span class="fn">
                                                                                <a href="#"><img alt="" src="{{  $item->user->avatar}}" class="avatar avatar-24" height="24" width="24">{{  $item->user->name}}</a>
                                                                            </span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="entry-meta">
                                                        <div class="meta-item meta-author">
                                                            <div class="hotel-review entry-location">
                                                                <span class="review-status bg-warning"><i
                                                                        class="ti-check"></i></span>
                                                                <h6><span class="cl-warning font-bold">fair</span>
                                                                    {{ $item->created_at->format('d/m/Y H:i:s') }}
                                                                </h6>
                                                            </div>
                                                        </div>
                                                        <div class="meta-item meta-comment fl-right">
                                                            <i class="ti-comment-alt"></i>
                                                            @if (isset($commentCounts[$item->id]))
                                                                <span>{{ $commentCounts[$item->id] }}</span>
                                                            @else
                                                                <span>0</span>
                                                            @endif
                                                            </span>
                                                        </div>
                                                        <div class="meta-item meta-rating fl-right">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        @else
                        <div class="col-md-12 col-sm-12">
                            
                                <h2>không có bài viết blog nào</h2>
                           
                        </div>
                        @endif
                    </div>
                    <!-- /Row -->
                    <div class="row">
                        <ul class="pagination">
                            {{-- paginator // phân trang  --}}
                            {{ $blog_list_by_cate->links() }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =========== End All Hotel In Grid View =================== -->
@endsection
