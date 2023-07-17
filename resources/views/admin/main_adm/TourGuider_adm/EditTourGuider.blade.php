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
        }

        /* edit css avatar tour guider */
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

        /* edit nice-select bootstrap */
        .nice-select {
            display: none !important;
        }

        /* Hiển thị thành phần select gốc */
        select[name="sex_guider"] {
            display: block !important;
        }

        select[name="status_guider"] {
            display: block !important;
        }
    </style>
@endsection
@section('content_adm')
    <!-- ======================= Start add blog===================== -->
    <div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
        <div class="row mrg-0 mrg-top-20">
            <div class="tr-single-box">
                <div class="tr-single-header">
                    <h3 class="dashboard-title">Edit Tour Guider</h3>
                </div>
                {{-- @include('admin.alert')
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif --}}
                <div class="tr-single-body">
                    <form id="add_guider" class="jquery_valiss" action="{{ route('PostEdit_Guider') }}" method="POST"
                        novalidate="novalidate" enctype="multipart/form-data">
                        <input type="hidden" name="id_tourguider" value="{{ $editGuider->id }}">
                        <div class="row">
                            <div class="profile-img-wrap edit-img">
                                <div id="image_show">
                                    <img class="inline-block" src="{{ $editGuider->avatar_guider }}" alt="user">
                                </div>
                                <input type="hidden" name="file_profile" id="file"
                                    value="{{ old('file_profile') ?? $editGuider->avatar_guider }}">
                                <div class="fileupload btn">
                                    <span class="btn-text">add</span>
                                    <input name="avatar" class="upload" type="file" id="UploadAvatar">
                                </div>
                            </div>
                            <div style="display: flex; flex-wrap: wrap;">
                                <div class="col-xs-6">
                                    <label for="name_guider">Họ Tên Tour Guider</label>
                                    <input type="text" name="name_guider" class="form-control" placeholder="Nguyễn Văn A"
                                        value="{{ old('name_guider') ?? $editGuider->name_guider }}" required>
                                </div>
                                <div class="col-xs-6">
                                    <label for="email_guider">Email</label>
                                    <input type="email" name="email_guider" class="form-control"
                                        placeholder="quanghthin123@gmail.com"
                                        value="{{ old('email_guider') ?? $editGuider->email_guider }}" required>
                                    @error('email_guider')
                                        <label style="width: 100%; margin-top: 0.25rem; font-size: 90%; color: #dc3545;">
                                            {{ $message }}
                                        </label>
                                    @enderror
                                </div>
                                <div class="col-xs-6">
                                    <label for="sex_guider">Giới tính</label>
                                    <select name="sex_guider" class="form-control wide" required>
                                        @if ($editGuider->sex_guider == 0)
                                            <option selected value="0">Nam</option>
                                            <option value="1">Nữ</option>
                                        @elseif($editGuider->sex_guider == 1)
                                            <option selected value="1">Nữ</option>
                                            <option value="0">Nam</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-xs-6">
                                    <label for="price_1date">Giá/1 Ngày</label>
                                    <input type="text" name="price_1date" class="form-control"
                                        placeholder="200000vnd/ngày"
                                        value="{{ old('price_1date') ?? $editGuider->price_1date }}" />
                                </div>
                                <div class="col-xs-6">
                                    <label for="phone_guider">Số điện thoại</label>
                                    <input type="text" name="phone_guider" class="form-control"
                                        placeholder="+91 254 875 8457"
                                        value="{{ old('phone_guider') ?? $editGuider->phone_guider }}" />
                                </div>
                                <div class="col-xs-6">
                                    <label for="language_guider">Ngôn Ngữ</label>
                                    <input type="text" name="language_guider" class="form-control"
                                        placeholder="English, French,..."
                                        value="{{ old('language_guider') ?? $editGuider->language_guider }}" />
                                </div>
                                <div class="col-xs-12">
                                    <label for="address_guider">Address</label>
                                    <input type="text" class="form-control " name="address_guider"
                                        value="{{ old('address_guider') ?? $editGuider->address_guider }}"
                                        placeholder="32 Ngô Quyền, Phường 2, Quận 3, Tp.Hồ Chí Minh" />
                                </div>
                                {{-- @php
                                    $birthday = date('Y-m-d', strtotime($editGuider->birthday_guider));
                                @endphp --}}
                                <div class="col-xs-6">
                                    <label for="birthday_guider">Ngày Sinh</label>
                                    <input type="date" name="birthday_guider" class="form-control datetimepicker"
                                        value="{{ old('birthday_guider') ??$editGuider->birthday_guider }}">
                                </div>
                                <div class="col-xs-6">
                                    <label for="status_guider">Trạng Thái</label>
                                    <select name="status_guider" class="form-control wide" required>
                                        @if ($editGuider->status_guider== 0)
                                            <option selected value="0">Offline</option>
                                            <option value="1">Online</option>
                                        @elseif($editGuider->status_guider == 1)
                                            <option selected value="1">Online</option>
                                            <option value="0">Offline</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-xs-12">
                                    <label for="describe_guider">Mô Tả Về Tour Guider</label>
                                    <textarea  name="describe_guider"
                                        class="form-control height-120" placeholder="mô tả về hướng dẫn viên...">{{$editGuider->describe_guider }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 text-center" style="margin-top: 20px;">
                                    <button style="font-weight: 600;" type="submit"
                                        class="btn theme-btn">Save</button>
                                    <a href="{{ route('get_list_guider') }}" style="font-weight:600;" type="button"
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
    <!-- ======================= End  basic-settings ===================== -->
@endsection
@section('js_content_adm')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#add_guider").validate({
                rules: {
                    name_guider: {
                        required: true,
                        minlength: 2
                    },
                    price_1date: {
                        required: true,
                        digits: true
                    },
                    email_guider: {
                        required: true,
                        email: true
                    },

                    phone_guider: {
                        required: true,
                        rangelength: [10, 10]

                    },
                    address_guider: {
                        required: true,
                        minlength: 10
                    },
                    sex_guider: "required",
                    birthday_guider: "required",
                    status_guider: "required",
                    language_guider: "required",
                    describe_guider: "required"
                },
                messages: {
                    name_guider: {
                        required: "Vui lòng nhập họ tên.",
                        minlength: "Họ tên phải trên 2 ký tự."
                    },
                    price_1date: {
                        required: "Vui lòng nhập giá tiền.",
                        digits: "Giá tiền phải là số."
                    },
                    password: {
                        required: "Vui lòng nhập một mật khẩu.",
                        minlength: "Mật khẩu phải trên 5 ký tự."
                    },
                    confirm_password: {
                        required: "Vui lòng nhập một mật khẩu.",
                        minlength: "Mật khẩu phải trên 5 ký tự.",
                        equalTo: "Mật khẩu không đúng."
                    },
                    email_guider: {
                        email: "Vui lòng nhập email hợp lệ.",
                        required: "Vui lòng nhập một email."
                    },

                    phone_guider: {
                        required: "Vui lòng nhập một số điện thoại.",
                        rangelength: "Số điện thoại phải là 10 ký tự."
                    },
                    address_guider: {
                        required: "Vui lòng nhập một địa chỉ.",
                        minlength: "Địa chỉ của bạn phải lớn hơn 10 ký tự."
                    },
                    sex_guider: "Vui lòng chọn giới tính.",
                    birthday_guider: "Vui lòng chọn ngày sinh.",
                    status_guider: "Vui lòng chọn trạng thái.",
                    language_guider: "Vui lòng nhập ngôn ngữ.",
                    describe_guider: "Vui lòng nhập phần mộ tả cho tour guider."
                }
            });
        });
    </script>
@endsection
