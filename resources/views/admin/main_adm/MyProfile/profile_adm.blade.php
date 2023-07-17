@extends('admin.layout_adm.app_dashboard')
@section('css_content_adm')
    <style>
        .form-control {
            border-radius: 0px;
        }

        .card {
            border: 1px solid #ededed;
            /* box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.2); */
            margin-bottom: 30px;
        }

        .mb-0,
        .my-0 {
            margin-bottom: 0 !important;
        }

        .card {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: 0.25rem;
        }

        .card-body {
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1.25rem;
        }

        .profile-view {
            position: relative;
        }

        *,
        ::after,
        ::before {
            box-sizing: border-box;
        }

        .profile-view .profile-img-wrap {
            height: 120px;
            width: 120px;
        }

        .profile-img-wrap {
            height: 120px;
            position: absolute;
            width: 120px;
            background: #fff;
            overflow: hidden;
        }

        .profile-view .profile-img {
            width: 120px;
            height: 120px;
        }

        .profile-img {
            cursor: pointer;
            height: 80px;
            margin: 0 auto;
            position: relative;
            width: 80px;
        }

        .profile-view .profile-basic {
            margin-left: 140px;
            padding-right: 50px;
        }

        .profile-basic {
            margin-left: 140px;
        }

        .profile-view .pro-edit {
            position: absolute;
            right: 0;
            top: 0;
        }

        .profile-info-left {
            border-right: 2px dashed #ccc;
        }

        .personal-info li .title {
            color: #4f4f4f;
            float: left;
            font-weight: 500;
            margin-right: 30px;
            width: 25%;
        }

        .personal-info {
            list-style: none;
            margin-bottom: 0;
            padding: 0;
        }

        .personal-info li .text {
            color: #8e8e8e;
            display: block;
            overflow: hidden;
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

        .edit-icon:hover {
            background-color: #ff4e00;
            border-color: #ff4e00;
            color: #fff;
        }

        /* ======================== css modal edit ===========================*/
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
        .t-type-edit {
            color: #fff;
            padding: 3px 10px;
            border-radius: 2px;
            margin-right: 5px;
            font-size: 12px;
        }
    </style>
@endsection
@section('content_adm')
    <div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
        <div class="row mrg-0 mrg-top-20">
            <div class="tr-single-box">
                <div class="tr-single-header">
                    <h3 class="dashboard-title">My Profile</h3>
                </div>
                <div class="tr-single-body">
                    <div class="card mb-0" style="border: none;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="profile-view">
                                        <div class="profile-img-wrap">
                                            <div class="profile-img" style="border: none;">
                                                <a href="#"><img style="height: auto;" alt=""
                                                        src="{{ Auth::user()->avatar }}"></a>
                                            </div>
                                        </div>
                                        <div class="profile-basic">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="profile-info-left">
                                                        <h3 class="user-name m-t-0 mb-0" style="margin-top:0px;">   {{ Auth::user()->name }}</h3>
                                                        <div class="staff-id">Chức Vụ:  
                                                            <span class="t-type bg-success t-type-edit ">Admin</span></div>
                                                        <div class="staff-id">Admin ID: {{ Auth::user()->id }}</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <ul class="personal-info">
                                                        <li>
                                                            <div class="title">Phone:</div>
                                                            <div class="text"> {{ Auth::user()->phone }}</div>
                                                        </li>
                                                        <li>
                                                            <div class="title">Email:</div>
                                                            <div class="text">{{ Auth::user()->email }}
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="title">Birthday:</div>
                                                            <div class="text">
                                                                {{ date_create(Auth::user()->birthday)->format('d/m/Y') }}
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="title">Address:</div>
                                                            <div class="text">{{ Auth::user()->address }}</div>
                                                        </li>
                                                        <li>
                                                            <div class="title">Gender:</div>
                                                            @if (Auth::user()->sex == 0)
                                                                <div class="text">Nam</div>
                                                            @elseif(Auth::user()->sex == 1)
                                                                <div class="text">Nữ</div>
                                                            @endif
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal"
                                                class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Profile Modal -->
    <div id="profile_info" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Profile Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('PostEdit_Profile') }}" method="POST" role="form"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile-img-wrap edit-img">
                                    <div id="image_show_profile">
                                        <img class="inline-block" src="{{ Auth::user()->avatar }}" alt="user">
                                    </div>
                                    <input type="hidden" value="{{ old('file_profile') ?? Auth::user()->avatar }}"
                                        name="file_profile" id="file_profile">
                                    <div class="fileupload btn">
                                        <span class="btn-text">edit</span>
                                        <input name="avatar" class="upload" type="file" id="Upload_avt_profile">
                                    </div>
                                </div>
                                <input type="hidden" name="edit_profile" value="{{ Auth::user()->id }}">
                                <div class="row">
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
                                                <input style="width: 100%;" class="form-control" name="birthday" type="date"
                                                    value="{{ old('birthday') ?? Auth::user()->birthday }}">
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
@endsection
