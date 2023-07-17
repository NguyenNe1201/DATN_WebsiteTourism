@extends('users.layout_user.app')
@section('css-layout-user')
    <style>
        .form-control {
            border-radius: 0px;
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

        .btn-text {
            color: #fff;
            font-size: 14px;
            font-weight: 600;
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

        /* edit nice-select bootstrap */
        .nice-select {
            display: none !important;
        }

        /* Hiển thị thành phần select gốc */
        select[name="sex"] {
            display: block !important;
        }
    </style>
@endsection
@section('PageTitle')
    @include('users.main_user.include.StartPageTitle')
@endsection
@section('content')
    <!-- =========== Start All Hotel In Grid View =================== -->
    <section class="gray-bg">
        <div class="container">

            <!-- row -->
            <div class="row">
                <div class="col-md-12 ">
                    <div class="tr-single-box">
                        <div class="tr-single-header">
                            <h3><i class="ti-write"></i> Đăng kí tài khoản</h3>
                        </div>
                        <div class="tr-single-body">
                            <form id="addcustomer" class="jquery_valiss" action="{{ route('PostAddCus') }}" method="POST"
                                role="form" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="profile-img-wrap edit-img">
                                        <div id="image_show">
                                            <img class="inline-block" src="/assets/img/png-avatar-icon.png" alt="user">
                                        </div>
                                        <input type="hidden" name="file_profile" id="file">
                                        <div class="fileupload btn">
                                            <span class="btn-text">add</span>
                                            <input name="avatar" class="upload" type="file" id="UploadAvatar" required>
                                        </div>
                                    </div>
                                    <div style="display: flex; flex-wrap: wrap;">
                                        <div class="col-sm-6">
                                            <label for="name">Họ tên:</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                value="{{ old('name') }}" placeholder="Nguyễn Văn A">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="username">Nick name:</label>
                                            <input name="username" type="text" class="form-control"
                                                value="{{ old('username') }}" placeholder="user123">
                                        </div>
                                        <div class="col-sm-6" style="margin-top: 20px;">
                                            <label for="email">Địa chỉ email:</label>
                                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                                class="form-control" placeholder="nguyenvana@gmail.com">
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
                                        <div class="col-sm-6" style="margin-top: 20px;">
                                            <label for="phone">Số điện thoại:</label>
                                            <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                                                class="form-control" placeholder="0123456789">
                                        </div>
                                        <div class="col-sm-6" style="margin-top: 20px;">
                                            <label for="birthday">Ngày sinh:</label>
                                            <input type="date" name="birthday" id="birthday"
                                                value="{{ old('birthday') }}" class="form-control">
                                        </div>
                                        <div class="col-sm-6" style="margin-top: 20px;">
                                            <label for="sex">Giới tính:</label>
                                            <select name="sex" class="form-control wide" required>
                                                <option value="">----- Chọn giới tính -----</option>
                                                <option value="0">Nam</option>
                                                <option value="1">Nữ</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 20px;">
                                            <label for="address">Địa Chỉ:</label>
                                            <input type="text" name="address" id="address" class="form-control"
                                                value="{{ old('address') }}" placeholder="111 Nguyễn Trãi, P2, Q1, Tp.HCM">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="password">Mật khẩu:</label>
                                            <input id="password" type="password" class="password form-control" name="password" value="{{ old('password') }}" placeholder="Nhập một mật khẩu">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="confirm_password">Xác nhận mật khẩu:</label>
                                            <input id="confirm_password" type="password" class="form-control"
                                                name="confirm_password"placeholder="Nhập xác thực mật khẩu">
                                        </div>
                                        <input type="hidden" name="role" id="role" value="0">
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 text-center" style="margin: 30px 0px;">
                                            <button style="font-weight: 600;" type="submit"
                                                class="btn theme-btn">Submit</button>
                                            <a href="/home" style="font-weight:600;" type="button"
                                                class="btn btn-warning">CANCEL</a>
                                        </div>
                                    </div>
                                </div>
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =========== End All Hotel In Grid View =================== -->
@endsection
@section('js-layout-user')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#addcustomer").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 2
                    },
                    username: {
                        required: true,
                        minlength: 5
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    confirm_password: {
                        required: true,
                        minlength: 5,
                        equalTo: ".password"
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
                    sex: "required",
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
                    password: {
                        required: "Vui lòng nhập một mật khẩu.",
                        minlength: "Mật khẩu phải trên 5 ký tự."
                    },
                    confirm_password: {
                        required: "Vui lòng nhập một mật khẩu.",
                        minlength: "Mật khẩu phải trên 5 ký tự.",
                        equalTo: "Mật khẩu không khớp."
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
                    sex: "Chọn giới tính.",
                    birthday: "Vui lòng chọn ngày sinh."
                }
            });
        });
    </script>
@endsection
