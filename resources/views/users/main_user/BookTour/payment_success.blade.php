@extends('users.layout_user.app')
@section('css-layout-user')
    <style>
        .form-control {
            border-radius: 0px;
        }
        .submit-section {
            text-align: center;
            margin-top: 30px;
        }
        .submit-section a {
            max-width: 200px;
            font-weight: 500px;
        }
    </style>
@endsection
@section('PageTitle')
    @include('users.main_user.include.StartPageTitle')
@endsection
@section('content')
    <section class="gray-bg">
        <div class="container">
            <!-- progressbar -->
            <ul id="progressbar">
                <li class="active">Đăng Kí Tour</li>
                <li class="active">Thanh Toán Tour</li>
                <li class="active">Thanh Toán Thành Công</li>
            </ul>
            {{-- payment tour --}}
            <fieldset>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <i class="ti-thumb-up cl-success font-50"></i>
                        <h3 class="cl-success">Đặt tour thành công!</h3>
                        <p style="font-size: 16px;"><strong style="color: #ed8b34">Hi {{ Auth::user()->name }}</strong>,
                            Chúng tôi sẽ liên hệ cho bạn sớm nhất!!!</p>
                        <div class="submit-section">
                            <a href="{{route('GetTourBookHistory')}}" class="btn btn-primary submit-btn">lịch sử đặt tour</a>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    </section>
@endsection
@section('js-layout-user')
    <script type="text/javascript"></script>
@endsection
