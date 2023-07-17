
<!-- ======================= Start Navigation ===================== -->
<nav class="navbar navbar-default navbar-mobile navbar-fixed light bootsnav">
    <div class="container">
    
        <!-- Start Logo Header Navigation -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
            <a href="" class="navbar-brand">
                <h1 style="color:black; font-weight:650; font-size: 2.5rem;" class="m-0">Bucket<span
                        style="color: #ff4e00">Tour</span></h1>
            </a>
        </div>
        <!-- End Logo Header Navigation -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-menu">
        
            <ul class="nav navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp">
            
                <li class="dropdown">
                    <a href="/home">Home</a>
                </li>                
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown dash-link"><a href="#" class="dropdown-toggle"><img src="{{Auth::user()->avatar}}" class="img-responsive avatar" alt="" />{{ Auth::user()->username }}</a> 
                    <ul class="dropdown-menu left-nav">
                        <li><a href="/admin/main">Dashboard</a></li>
                        <li><a href="{{ route('MyProfile_admin') }}">My Profile</a></li>
                        
                        <li><a href="{{ route('UpdatePassWord_admin') }}">Update Password</a></li>
                        <li><a href="{{ route('logout') }}">Log Out</a></li>
                    </ul>
                </li>
            </ul>
                
        </div>
        <!-- /.navbar-collapse -->
    </div>   
</nav>
<!-- ======================= End Navigation ===================== -->
 {{-- push notify sucess / error --}}
 @if (Session::has('error'))
 <div class="Authority">
     <script>
         document.addEventListener("DOMContentLoaded", function(event) {
             Swal.fire({
                 position: 'center-center',
                 icon: 'error',
                 title: '{{ Session::get('error') }}',
                 showConfirmButton: false,
                 timer: 1500
             })
         })
     </script>
 </div>
@endif
@if (Session::has('success'))
 <div class="Authority">
     <script>
         document.addEventListener("DOMContentLoaded", function(event) {
             Swal.fire({
                 position: 'center-center',
                 icon: 'success',
                 title: '{{ Session::get('success') }}',
                 showConfirmButton: false,
                 timer: 1500
             })
         })
     </script>
 </div>
@endif
{{-- modal add location tour --}}
<div class="modal fade" id="add_location" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <form style="margin-bottom: 15px;"
                            method="POST" action="{{ route('inputaddLocationTour') }}" role="form"
                            enctype="multipart/form-data">
                            <div class="form-group" style="margin-top: 10px;">
                                <label for="location_name" style="font-size: 16px;">Tên địa điểm:</label>
                                <input name="location_name" id="location_name" style="border-radius:0px;"
                                    type="text" class="form-control" placeholder="Nhập địa danh hoặc địa điểm" required>
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
{{-- modal edit location --}}
<div class="modal fade" id="edit_location" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <form  style="margin-bottom: 15px;"
                            action="{{ route('editLocationTour') }}" method="POST" role="form"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group" style="margin-top: 10px;">
                                <label for="location_id" style="font-size: 16px;">Tên địa điểm cần chỉnh sửa:</label>
                                <div class="sl-box">
                                    <select name="location_id" class="form-control wide">
                                        @if (!empty($cate_location))
                                            @foreach ($cate_location as $key_c => $cate_c)
                                                <option value="{{ $cate_c->id }}">{{ $cate_c->location_name }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="null">không có địa điểm</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" style="margin-top: 10px;">
                                <label for="location_name" style="font-size: 16px;">Tên địa điểm mới mới:</label>
                                <input name="location_name" style="border-radius:0px;" type="text"
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