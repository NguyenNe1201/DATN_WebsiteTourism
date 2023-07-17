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
                                    <h3 class="dashboard-title">Cập Nhật Mật Khẩu</h3>
                                </div>
                                <div class="tr-single-body">
                                    <form id="update_password_jqvali" class="jquery_valiss form-horizontal " method="POST"
                                        action="{{ route('PostUpdatePassWord') }}" role="form"
                                        enctype="multipart/form-data">
                                        <input type="hidden" value="{{ Auth::user()->id }}" name="profile_id">
                                        <div class="form-group">
                                            <label for="current_password" class="col-md-2 col-sm-3">Mật khẩu hiện tại:</label>
                                            <div class="col-md-10 col-sm-9">
                                                <input name="current_password" id="current_password" type="password" class="form-control"
                                                    value="" placeholder="nhập mật khẩu hiện tại" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="new_password" class="col-md-2 col-sm-3">Mật khẩu mới:</label>
                                            <div class="col-md-10 col-sm-9">
                                                <input name="new_password" id="new_password" type="password" class="new_password form-control"
                                                    value="" placeholder="nhập mật khẩu mới" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="confirm_password" class="col-md-2 col-sm-3">Xác nhận mật khẩu:</label>
                                            <div class="col-md-10 col-sm-9">
                                                <input name="confirm_password" id="confirm_password" type="password" class="form-control"
                                                    value="" placeholder="xác nhận mật khẩu" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12 col-sm-12 text-center" style="margin-top: 20px;">
                                                <button style="font-weight: 600;" type="submit"
                                                    class="btn theme-btn">Save</button>
                                 
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
    $(document).ready(function() {
        $("#update_password_jqvali").validate({
            rules: {
                new_password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: ".new_password"
                }
            },
            messages: {
                
                new_password: {
                    required: "Vui lòng nhập một mật khẩu.",
                    minlength: "Mật khẩu phải trên 5 ký tự."
                },
                confirm_password: {
                    required: "Vui lòng nhập một mật khẩu.",
                    minlength: "Mật khẩu phải trên 5 ký tự.",
                    equalTo: "Mật khẩu không khớp."
                }
            }
        });
    });
</script>
@endsection
