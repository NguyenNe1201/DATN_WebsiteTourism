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

        /*  */
        .dataTables_wrapper .dataTables_filter {
            float: right;
            text-align: right;
        }

        .dataTables_wrapper .dataTables_length {
            float: left;
        }

        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #aaa;
            border-radius: 3px;
            padding: 5px;
            background-color: transparent;
            margin-left: 3px;
        }

        .dataTables_wrapper .dataTables_length select {
            border: 1px solid #aaa;
            border-radius: 3px;
            padding: 5px;
            background-color: transparent;
            padding: 4px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            color: inherit !important;
            border: 1px solid rgba(0, 0, 0, 0.3);
            background: linear-gradient(to bottom, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            box-sizing: border-box;
            display: inline-block;
            min-width: 1.5em;
            padding: 0.5em 1em;
            margin-left: 2px;
            text-align: center;
            text-decoration: none !important;
            cursor: pointer;
            color: inherit !important;
            border: 1px solid transparent;
            border-radius: 2px;
            background: transparent;
        }

        .dataTables_wrapper .dataTables_paginate {
            float: right;
            text-align: right;
            padding-top: 0.25em;
        }

        .dataTables_wrapper .dataTables_info {
            clear: both;
            float: left;
            padding-top: 0.755em;
        }

        table.dataTable {
            width: 100%;
            margin: 0 auto;
            clear: both;
            border-collapse: separate;
            border-spacing: 0;
        }

        table.dataTable.no-footer {
            border-bottom: 1px solid rgba(0, 0, 0, 0.3);
        }

        .t-type-edit {
            color: #fff;
            padding: 3px 10px;
            border-radius: 2px;
            margin-right: 5px;
            font-size: 13px;
        }

        .tr-single-body {

            padding: 15px 15px;
        }

        table.table tr td,
        table.table.table-lg tr th {
            border-color: #eaeff5;
            padding: 10px;
            vertical-align: middle;
            font-size: 13.5px;
        }

        /* edit css button payment */

        .action-label .btn-sm {
            padding: 4px;
        }

        .btn-group-sm>.btn,
        .btn-sm {
            font-size: 1.3rem;
            line-height: 1.5;
        }

        .fw-600 {
            font-weight: 600;
        }

        .dropdown.action-label {
            display: inline-block;
        }

        .btn.btn-rounded {
            border-radius: 50px;
        }

        .text-success,
        .dropdown-menu>li>a.text-success {
            color: #55ce63 !important;
        }

        .text-danger,
        .dropdown-menu>li>a.text-danger {
            color: #f62d51 !important;
        }

        .dropdown.action-label {
            display: inline-block;
        }

        .table .dropdown-menu {
            font-size: 13px;
            min-width: 130px;
            padding: 0;
        }

        .dropdown-menu {
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 3px;
            transform-origin: left top 0;
            box-shadow: inherit;
            background-color: #fff;
        }

        .table .dropdown-menu .dropdown-item {
            padding: 5px 10px;
            width: 100%;
        }

        .btn-white {
            background-color: #fff;
            border: 1px solid #ccc;
            /* color: #333; */
            color: #70778b;
        }

        .dropdown-item:focus,
        .dropdown-item:hover {
            color: #16181b;
            text-decoration: none;
            background-color: #e9ecef;
        }

        .dropdown-item {
            display: block;
            width: 100%;
            padding: 0.25rem 1.5rem;
            clear: both;
            font-weight: 400;
            color: #212529;
            text-align: inherit;
            white-space: nowrap;
            background-color: transparent;
            border: 0;
        }

        .fw-500 {
            font-weight: 500;
        }

        /* modal review tour */
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

        /* css rating star */
        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rate:not(:checked)>input {
            position: absolute;
            top: -9999px;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }

        .submit-section {
            text-align: center;
            margin: 15px 0px;
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
                        {{-- list category blog --}}
                        <div class="row mrg-0 ">
                            <div class="tr-single-box">
                                <div class="tr-single-header">
                                    <h3 class="dashboard-title">Danh Sách Lịch Sử Đặt Guider</h3>
                                </div>
                                <div class="tr-single-body">
                                    <div class="table-responsive" style="margin-top: 20px; ">
                                        <table class="table table-striped table-hover" id="table_guiderbook_history"
                                            data-page-length='5'>
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th style="max-width:240px;">Tour Guider</th>
                                                    <th>Thông tin</th>
                                                    <th>Thanh toán</th>
                                                    <th>Trạng thái</th>
                                                    <th>Function</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- tr -->
                                                @if (!empty($getSignUpGuider) && $getSignUpGuider->count() > 0)
                                                    @foreach ($getSignUpGuider as $key => $item)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>
                                                                <b>{{ $item->guider->name_guider }}</b> <br>
                                                                <span style="font-weight: 600; margin-right: 5px;">Ngày đăng
                                                                    kí:</span>{{ $item->regis_date->format('d/m/Y') }}<br>
                                                                <span class="ti-timer"></span>{{ $item->start_date->format('d/m/Y') }} - {{ $item->end_date->format('d/m/Y') }}
                                                            </td>
                                                            <td>
                                                                <span style="font-weight: 600; margin-right: 5px;">Tổng
                                                                    Tiền:</span>{{ number_format($item->total_price, 0, '.', '.') }}
                                                                đ<br>
                                                                @if ($item->payment->payment_method == 0)
                                                                    <span style="font-weight: 600; margin-right: 5px;">Thanh
                                                                        toán:</span> tại công ty<br>
                                                                @elseif($item->payment->payment_method == 1)
                                                                    <span style="font-weight: 600; margin-right: 5px;">Thanh
                                                                        toán:</span> online<br>
                                                                @endif
                                                                <span style="font-weight: 600; margin-right: 5px;">Ghi
                                                                    chú:</span>{{ $item->note_guider }}
                                                            </td>
                                                            <td>
                                                                <div class="dropdown action-label">
                                                                    @if ($item->payment->status_payment == 1)
                                                                        <a style="font-weight: 600;"
                                                                            class=" btn btn-white btn-sm btn-rounded"
                                                                            href="#" data-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            <i class="fa fa-dot-circle-o text-success"></i>
                                                                            Đã thanh toán
                                                                        </a>
                                                                    @elseif($item->payment->status_payment == 0)
                                                                        <a style="font-weight: 600;"
                                                                            class=" btn btn-white btn-sm btn-rounded fw-600"
                                                                            href="#" data-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            <i class="fa fa-dot-circle-o text-danger"></i>
                                                                            Chưa thanh toán
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                            <td>
                                                                @if ($item->status_bookguider == 0)
                                                                    <span class="t-type  bg-danger t-type-edit">Đã
                                                                        hủy</span>
                                                                @elseif($item->status_bookguider == 1)
                                                                    <span class="t-type bg-warning t-type-edit">Chờ xử
                                                                        lý</span>
                                                                @elseif($item->status_bookguider == 2)
                                                                    <span class="t-type bg-success t-type-edit">Đã xử
                                                                        lý</span>
                                                                @elseif($item->status_bookguider == 3)
                                                                    <span class="t-type btn-info t-type-edit">Đã kết
                                                                        thúc</span>
                                                                @endif
                                                            </td>
                                                            <td style="text-align: center;">
                                                                <div class="dropdown dropdown-action">
                                                                    <a href="#" class="action-icon dropdown-toggle"
                                                                        data-toggle="dropdown" aria-expanded="false"><span
                                                                            class="ti-view-list-alt"></span></a>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        style="text-align: center;">
                                                                        @if ($item->status_bookguider == 1)
                                                                            <form action="{{ route('update_book_guider') }}"
                                                                                method="POST" role="form"
                                                                                enctype="multipart/form-data">
                                                                                <input type="hidden" name="id_sign_guider"
                                                                                    value="{{ $item->id }}">
                                                                                <input type="hidden" name="status_edit"
                                                                                    id="status_edit" value="0">
                                                                                <button type="submit"
                                                                                    class="dropdown-item fw-500 push-guider"><i
                                                                                        class="fa fa-trash-o m-r-5"></i>
                                                                                    Yêu cầu hủy</button>
                                                                                @csrf
                                                                            </form>
                                                                        @endif
                                                                        @if ($item->status_bookguider == 3 && !$item->reviews_guider()->exists())
                                                                            <a data-target="#review_modal"
                                                                                data-toggle="modal"
                                                                                data-guiderid="{{ $item->guider_id }}"
                                                                                data-customerid="{{ $item->customer_id }}"
                                                                                data-signupid="{{ $item->id }}"
                                                                                class="dropdown-item"><i
                                                                                    class="ti-comment-alt m-r-5"></i>
                                                                                Review</a>
                                                                        @endif
                                                                        @if ($item->payment->status_payment == 1)
                                                                        <a href="#" class="dropdown-item"><i
                                                                                class="fa fa-fw fa-eye m-r-5"></i> Xem chi tiết</a>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- modal review tour --}}
    <div id="review_modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-weight: 600;">
                        Gửi đánh giá cho chuyến đi vừa rồi !!!
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('post_review_guider') }}" method="POST" role="form"
                        enctype="multipart/form-data" id="review_guider" class="jquery_valiss">
                        <input type="hidden" name="guider_id" id="guider_id" value="">
                        <input type="hidden" name="customer_id_rv" id="customer_id_rv" value="">
                        <input type="hidden" name="signup_guider_id" id="signup_id" value="">
                        <input type="hidden" name="review_date" id="review_date" value="<?php echo date('Y-m-d'); ?>">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label style="font-size:15px;" for="content" class="col-md-2 col-sm-3">Đánh
                                        giá:</label>
                                    <div class="col-md-10 col-sm-9">
                                        <div class="rate">
                                            <input type="radio" id="star5" name="rate" value="5" />
                                            <label for="star5" title="text">5
                                                stars</label>
                                            <input type="radio" id="star4" name="rate" value="4" />
                                            <label for="star4" title="text">4
                                                stars</label>
                                            <input type="radio" id="star3" name="rate" value="3" />
                                            <label for="star3" title="text">3
                                                stars</label>
                                            <input type="radio" id="star2" name="rate" value="2" />
                                            <label for="star2" title="text">2
                                                stars</label>
                                            <input type="radio" id="star1" name="rate" value="1" />
                                            <label for="star1" title="text">1
                                                star</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label style="font-size:15px;" for="content" class="col-md-2 col-sm-3">Nội
                                        dung Review:</label>
                                    <div class="col-md-10 col-sm-9">
                                        <textarea name="content_review" id="content_review" class="form-control height-100"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn" style="max-width:160px;">Review
                                Now</button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js-layout-user')
    <script>
        $(function(e) {
            $(document).ready(function() {
              var table = $('#table_guiderbook_history').DataTable({
                    "pageLength": 10,
                    "lengthMenu": [
                        [5, 10, 15, -1],
                        [5, 10, 15, "All"]
                    ],
                });
                // truyền tour_id vào modal
                $('#review_modal').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget);
                    var guiderId = button.data('guiderid');
                    var customerId = button.data('customerid');
                    var signupId = button.data('signupid');
                    // Truyền giá trị vào các thẻ input
                    $('#guider_id').val(guiderId);
                    $('#signup_id').val(signupId);
                    $('#customer_id_rv').val(customerId);
                });
                $("#review_guider").validate({
                    rules: {
                        content_review: "required",
                    },
                    messages: {
                        content_review: "Vui lòng nhập nội dung review."
                    }
                });
                // push cancel book guider
                $('.push-guider').on('click', function(event) {
                    event.preventDefault(); // Ngăn chặn hành vi mặc định của nút submit
                    Swal.fire({
                        title: 'Thông báo',
                        text: 'Bạn có chắc chắn muốn hủy!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK',
                        cancelButtonText: 'Hủy'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#status_edit').val('0');
                            $(this).closest('form').submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
