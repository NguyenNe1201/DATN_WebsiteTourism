@extends('admin.layout_adm.app_dashboard')
@section('css_content_adm')
    <style>
        .form-control {
            border-radius: 0px;
        }

        label {
            color: #334e6f;
        }

        .btn-warning {
            color: #1f2d3d;
            background-color: #ffc107;
            border-color: #ffc107;
            box-shadow: none;
        }

        .dashboard .form-control {
            background: none;
            font-weight: 500;
            border: 1px solid #ccc;
        }

        label {
            font-size: 16px;
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
                    <h3 class="dashboard-title">Cập Nhật Mật Khẩu</h3>
                </div>
                <div class="tr-single-body">
                    <form id="update_password_jqvali" class="jquery_valiss form-horizontal " method="POST"
                        action="{{ route('PostUpdatePassWord_admin') }}" role="form" enctype="multipart/form-data">
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
                                <input name="new_password" id="new_password" type="password"
                                    class="new_password form-control" value="" placeholder="nhập mật khẩu mới"
                                    required>
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
                                <button style="font-weight: 600;" type="submit" class="btn theme-btn">Save</button>
                                <a href="/admin/main" style="font-weight:600;" type="button"
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
