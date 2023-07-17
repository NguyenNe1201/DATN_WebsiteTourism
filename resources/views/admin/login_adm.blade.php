<!DOCTYPE html>
<html lang="en">

<head>
    @include('shared.head')
    {{-- jquery validate --}}
    <script src="/assets/jquery-validate/lib/jquery.js"></script>
    <script src="/assets/jquery-validate/dist/jquery.validate.js"></script>
    {{-- css input validate  --}}
    <link rel="stylesheet" href="/assets/css/input_validate.css">
</head>

<body>
    <div id="signin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="myModalLabel1">
                <div class="modal-body">
                    <div class="text-center" style="margin-bottom: 20px;">
                        {{-- <img src="assets/img/logo.png" class="img-responsive" alt=""> --}}
                        <a href="" class="navbar-brand" style="margin-right:0px; ">
                            <h1 style="color:black; font-weight:650; font-size: 2.5rem;" class="m-0">Admin<span
                                    style="color: #ff4e00">Login</span></h1>
                        </a>
                    </div>
                    <!-- Tab panels -->
                    <div class="tab-content">
                        {{-- alert push tb email or mk ko đúng --}}
                        @if (Session::has('error'))
                            <div class="Authority">
                                <script>
                                    document.addEventListener("DOMContentLoaded", function(event) {
                                        Swal.fire({
                                            position: 'center-center',
                                            icon: 'error',
                                            title: '{{ Session::get('error') }}',
                                            showConfirmButton: false,
                                            timer: 4000
                                        })
                                    })
                                </script>
                            </div>
                        @endif
                        <!-- Admin Panel 1-->
                        <div class="tab-pane fade in show active" id="employer" role="tabpanel">
                            <form id="AdminForm" action="{{ route('login_admin') }}" class="jquery_valiss"
                                method="post" role="form" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="email">Email Admin</label>
                                    <input id="email" name="email" type="email" class="form-control"
                                        placeholder="Enter email" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" name="password" type="password" class="form-control"
                                        placeholder="*********" required>
                                </div>

                                <div class="form-group">
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="remember" name="remember">
                                        <label for="remember"></label>Remember me
                                    </span>
                                    <a href="#" title="Forget" class="fl-right">Forgot Password?</a>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn theme-btn full-width btn-m">LogIn </button>
                                </div>
                                @csrf
                            </form>

                            <div class="log-option"><span>OR</span></div>

                            <!-- <div class="row mrg-bot-20">  <div class="col-md-6">
                                                <a href="#" title="" class="fb-log-btn log-btn"><i class="fa fa-facebook"></i>Sign
                                    In With Facebook</a>
                                    </div>
                                    <div class="col-md-6">
                                    <a href="#" title="" class="gplus-log-btn log-btn"><i
                                    class="fa fa-google-plus"></i>Sign In With Google+</a>
                                    </div>
                            </div> -->

                        </div>
                    </div>
                </div>
                <!-- Tab panels -->
            </div>
        </div>
    </div>
    </div>
    <!-- =================== START JAVASCRIPT ================== -->
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js"></script>
    {{-- public (dùng chung) --}}
    @include('shared.jquery_public')
    {{-- js login validate  --}}
    <script src="{{ asset('js_adm/login.js') }}"></script>
</body>

</html>
