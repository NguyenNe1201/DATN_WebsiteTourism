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

        .edit-icon {
            background-color: #eee;
            border: 1px solid #e3e3e3;
            border-radius: 24px;
            color: #bbb;
            float: right;
            font-size: 12px;
            line-height: 24px;
            min-height: 26px;
            text-align: center;
            width: 26px;
        }

        .pro-edit {
            /* position: absolute; */
            right: 0;
            top: 0;
            /* padding: 10px; */
        }

        .edit-icon:hover {
            background-color: #ff4e00;
            border-color: #ff4e00;
            color: #fff;
        }

        /* edit profile */
        .custom-modal .modal-body {
            padding: 30px;
        }

        .custom-modal .modal-content {
            border: 0;
            border-radius: 10px;
        }

        .modal-content {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            width: 100%;
            pointer-events: auto;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid rgba(0, 0, 0, .2);
            border-radius: 0.3rem;
            outline: 0;
        }

        .custom-modal .modal-header {
            border: 0;
            justify-content: center;
            padding: 30px 30px 0;
        }

        .modal-header {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: start;
            align-items: flex-start;
            -ms-flex-pack: justify;
            justify-content: space-between;
            padding: 1rem 1rem;
            border-bottom: 1px solid #dee2e6;
            border-top-left-radius: calc(0.3rem - 1px);
            border-top-right-radius: calc(0.3rem - 1px);
        }

        .custom-modal .modal-title {
            font-size: 22px;
        }

        .modal-title {
            margin-bottom: 0;
            line-height: 1.5;
        }

        .custom-modal .close {
            background-color: #a0a0a0;
            border-radius: 50%;
            color: #fff;
            font-size: 13px;
            height: 20px;
            line-height: 20px;
            margin: 0;
            opacity: 1;
            padding: 0;
            position: absolute;
            right: 10px;
            top: 10px;
            width: 20px;
            z-index: 99;
        }

        .profile-img-wrap.edit-img {
            border-radius: 50%;
            margin: 0 auto 30px;
            position: relative;
        }

        .profile-img-wrap {
            height: 120px;
            position: absolute;
            width: 120px;
            background: #fff;
            overflow: hidden;
        }

        .profile-img-wrap img {
            border-radius: 50%;
            height: 120px;
            width: 120px;
        }

        .profile-img-wrap.edit-img .fileupload.btn {
            left: 0;
        }

        .fileupload.btn {
            position: absolute;
            right: 0;
            bottom: 0;
            background: rgba(33, 33, 33, 0.5);
            border-radius: 0;
            padding: 3px 10px;
            border: none;
        }

        .submit-section {
            text-align: center;
            margin-top: 40px;
        }

        .submit-btn {
            border-radius: 50px;
            font-size: 18px;
            font-weight: 600;
            min-width: 200px;
            padding: 10px 20px;
        }

        .btn.btn-primary,
        .btn.btn-primary:focus,
        .btn.btn-primary:hover {
            border: 1px solid #ED8B34;
            width: 30%;
            height: 46px;
            background: #ED8B34;
            text-transform: capitalize;
            font-size: 16px;
            border-radius: 50px;
        }

        .btn.btn-primary:hover {
            color: #fff;
            background-color: #ff4e00 !important;
            border-color: #ff4e00 !important;
        }

        .fileupload input.upload {
            cursor: pointer;
            filter: alpha(opacity=0);
            font-size: 20px;
            margin: 0;
            opacity: 0;
            padding: 0;
            position: absolute;
            right: -3px;
            top: -3px;
            padding: 5px;
        }

        .btn-text {
            color: #fff;
            font-size: 14px;
            font-weight: 600;
        }

        .form-control {
            border-radius: 0px;
        }

        .tr-single-body {
            width: 100%;
            padding: 15px 20px 20px;
        }

        .tr-single-box {
            border: none;
        }

        .personal-info li .title {
            float: left;
            /* margin-right: 30px;
            width: 25%; */
        }

        .personal-info li .text {
            /* color: #8e8e8e; */
            display: block;
            overflow: hidden;
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

                <div class="col-md-12 col-sm-12">
                    {{--  --}}
                    @include('users.main_user.include.RightMenu_user')  
                    {{--  --}}
                    <div class="col-md-10 col-sm-10 ">
                        <div class="row mrg-0 ">
                            <div class="tr-single-box">
                                <div class="tr-single-header">
                                    <h3 class="dashboard-title">Thông Tin Cá Nhân</h3>
                                </div>
                                <div class="tr-single-body">
                                    <!-- Guide Detail -->
                                    <div class="row">
                                        <div class="tr-single-box">
                                            {{-- <div class="tr-single-header">
                                                <h4><i class="ti-user"></i>Khách hàng</h4>
                                            </div> --}}
                                            <div class="tr-single-body">
                                                <div class="guider-box-detail">
                                                    <div class="pro-edit"><a data-target="#profile_info1"
                                                            data-toggle="modal" class="edit-icon" href="#"><i
                                                                class="fa fa-pencil"></i></a></div>
                                                    <div class="col-md-6">
                                                        <div class="guider-box-thumb">
                                                            <img style="height: 100%;" src="{{ Auth::user()->avatar }}"
                                                                class="img-responsive img-circle" alt="" />
                                                        </div>
                                                        <div class="guider-box-detail-content">
                                                            <h4>{{ Auth::user()->name }}</h4>
                                                            <div class="pr-table">
                                                                <ul class="personal-info">
                                                                    <li><strong class="title">Nickname:</strong><span
                                                                            class="text">{{ Auth::user()->username }}</span>
                                                                    </li>
                                                                    <li>
                                                                        <strong class="title">Số lần đặt tour:</strong>
                                                                        <span class="t-type bg-success">{{ $countbooktour }}</span>
                                                                    </li>
                                                                    <li><strong class="title">Language:</strong><span class="text">English</span></li>
                                                                    <li><strong class="title">Giới tính:</strong>
                                                                        @if (Auth::user()->sex == 0)
                                                                            <span class="text">Nam</span>
                                                                        @elseif(Auth::user()->sex == 1)
                                                                            <span class="text">Nữ</span>
                                                                        @endif
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="pr-table">
                                                            <ul class="personal-info">
                                                                <li>
                                                                    <strong>Số điện
                                                                        thoại:</strong><span>{{ Auth::user()->phone }}</span>
                                                                </li>
                                                                <li><strong>
                                                                        Email:</strong><span>{{ Auth::user()->email }}</span>
                                                                </li>
                                                                <li><strong>Ngày sinh:</strong>
                                                                    <span>{{ date_create(Auth::user()->birthday)->format('d/m/Y') }}</span>
                                                                </li>
                                                                <li><strong class="title">Địa
                                                                        chỉ:</strong><span
                                                                        class="text">{{ Auth::user()->address }}</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ======================= Guide Detail ===================== -->
        <!-- Profile Modal -->
        <div id="profile_info1" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="font-weight: 600;">Update Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('UploadProfileCus') }}" method="POST" role="form"
                            enctype="multipart/form-data" id="edit-customer"class="jquery_valiss" >
                            <div class="row" style="display: flex; flex-wrap: wrap;">
                                <div class="col-md-12">
                                    <div class="profile-img-wrap edit-img">
                                        <div id="image_show">
                                            <img class="inline-block" src="{{ Auth::user()->avatar }}" alt="user">
                                        </div>
                                        <input type="hidden" value="{{ old('file_profile') ?? Auth::user()->avatar }}"
                                            name="file_profile" id="file">
                                        <div class="fileupload btn">
                                            <span class="btn-text">edit</span>
                                            <input name="avatar" class="upload" type="file" id="UploadAvatar">
                                        </div>
                                    </div>
                                    <input type="hidden" name="edit_profile" value="{{ Auth::user()->id }}">
                                    <div class="row"  style="display: flex; flex-wrap: wrap;">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Full Name</label>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ old('name') ?? Auth::user()->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="username">UserName</label>
                                                <input type="text" name="username" class="form-control"
                                                    value="{{ old('username') ?? Auth::user()->username }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email Address</label>
                                                <input type="text" name="email" class="form-control"
                                                    value="{{ Auth::user()->email }}">
                                                @error('email')
                                                    @if (Session::has('error'))
                                                        <div class="Authority">
                                                            <script>
                                                                document.addEventListener("DOMContentLoaded", function(event) {
                                                                    Swal.fire({
                                                                        position: 'center-center',
                                                                        icon: 'error',
                                                                        title: '{{ Session::get('error') }}',
                                                                        showConfirmButton: false,
                                                                        timer: 5000
                                                                    })
                                                                })
                                                            </script>
                                                        </div>
                                                    @else
                                                        <div class="Authority">
                                                            <script>
                                                                document.addEventListener("DOMContentLoaded", function(event) {
                                                                    Swal.fire({
                                                                        position: 'center-center',
                                                                        icon: 'error',
                                                                        title: '{{ $message }}',
                                                                        showConfirmButton: false,
                                                                        timer: 5000
                                                                    })
                                                                })
                                                            </script>
                                                        </div>
                                                    @endif
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="text" name="phone" class="form-control"
                                                    value="{{ old('phone') ?? Auth::user()->phone }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Birth Date</label>
                                                <div class="cal-icon">
                                                    <input class="form-control datetimepicker" name="birthday"
                                                        type="date"
                                                        value="{{ old('birthday') ?? Auth::user()->birthday }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="sex">Gender</label>
                                                <div class="sl-box">
                                                    <select name="sex" class="form-control wide">
                                                        @if (Auth::user()->sex == 0)
                                                            <option selected value="0">Nam</option>
                                                            <option value="1">Nữ</option>
                                                        @elseif(Auth::user()->sex == 1)
                                                            <option selected value="1">Nữ</option>
                                                            <option value="0">Nam</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" class="form-control"
                                            value="{{ old('address') ?? Auth::user()->address }}">
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Profile Modal -->
    </section>
@endsection
@section('js-layout-user')
    <script type="text/javascript">
        $().ready(function() {
            $("#edit-customer").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 2
                    },
                    username: {
                        required: true,
                        minlength: 5
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true,
                        rangelength: [10, 10]

                    },
                    address: {
                        required: true,
                        minlength: 10
                    },
                    // sex: "required",
                    birthday: "required"
                },
                messages: {
                    name: {
                        required: "Vui lòng nhập họ tên.",
                        minlength: "Họ tên phải trên 2 ký tự."
                    },
                    username: {
                        required: "Please enter a username.",
                        minlength: "Nickname phải trên 5 ký tự."
                    },
                    email: {
                        email: "Vui lòng nhập email hợp lệ.",
                        required: "Vui lòng nhập một email."
                    },

                    phone: {
                        required: "Vui lòng nhập một số điện thoại.",
                        rangelength: "Số điện thoại phải là 10 ký tự."
                    },
                    address: {
                        required: "Vui lòng nhập một địa chỉ.",
                        minlength: "Địa chỉ của bạn phải lớn hơn 10 ký tự."
                    },
                    // sex: "chọn giới tính",
                    birthday: "Vui lòng chọn ngày sinh."

                }
            });
        });
    </script>
@endsection