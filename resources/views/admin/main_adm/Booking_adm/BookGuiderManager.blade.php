@extends('admin.layout_adm.app_dashboard')
@section('css_content_adm')
    <style>
        .table .dropdown-menu {
            font-size: 13px;
            min-width: 120px;
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
        }

        .dropdown-item {
            display: block;
            width: 100%;
            padding: 0.25rem 1.5rem;
            clear: both;
            font-weight: 400;
            /* color: #212529; */
            color: #70778b;
            text-align: inherit;
            white-space: nowrap;
            background-color: transparent;
            border: 0;
        }

        .dropdown-item:focus,
        .dropdown-item:hover {
            color: #16181b;
            text-decoration: none;
            background-color: #e9ecef;
        }

        .t-type-edit {
            color: #fff;
            padding: 3px 10px;
            border-radius: 2px;
            margin-right: 5px;
            font-size: 12px;
            font-weight: 600;
        }

        .m-r-5 {
            margin-right: 5px !important;
        }

        /* css status payment */
        .dropdown.action-label {
            display: inline-block;
        }

        .action-label .btn-sm {
            padding: 5px;
        }

        .btn-group-sm>.btn,
        .btn-sm {
            font-size: 13px;
            line-height: 1.5;
        }

        .btn.btn-rounded {
            border-radius: 50px;
        }

        .btn-white {
            background-color: #fff;
            border: 1px solid #ccc;
            /* color: #333; */
            color: #70778b;
        }


        .action-label>a {
            display: inline-block;
            min-width: 103px;
        }

        .text-purple,
        .dropdown-menu>li>a.text-purple {
            color: #7460ee !important;
        }

        .text-info,
        .dropdown-menu>li>a.text-info {
            color: #009efb !important;
        }

        .text-success,
        .dropdown-menu>li>a.text-success {
            color: #55ce63 !important;
        }

        .text-danger,
        .dropdown-menu>li>a.text-danger {
            color: #f62d51 !important;
        }

        .dropdown-toggle-edit::after {
            display: inline-block;
            margin-left: 0.255em;
            vertical-align: 0.255em;
            content: "";
            border-top: 0.3em solid;
            border-right: 0.3em solid transparent;
            border-bottom: 0;
            border-left: 0.3em solid transparent;
        }

        .fw-500 {
            font-weight: 500;
        }

        .fw-600 {
            font-weight: 600;
        }

        .text-yellow,
        .dropdown-menu>li>a.text-yellow {
            color: #ff9800 !important;
        }

        .tr-single-body {
            width: 100%;
            padding: 15px 15px 15px;
        }

        table.dataTable tbody th,
        table.dataTable tbody td {
            padding: 8px 5px;
        }
    </style>
@endsection
@section('content_adm')
    <div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
        <div class="row mrg-0 mrg-top-20">
            <div class="tr-single-box">
                <div class="tr-single-header">
                    <h3 class="dashboard-title">Danh Sách Đặt Tour Guider</h3>
                </div>
                <div class="tr-single-body">
                    <div class="table-responsive" style="margin-top: 20px; ">
                        <table class="table table-striped table-hover" id="table_list_book_tour" data-page-length='5'>
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Thông Tin Tour</th>
                                    <th>Dữ Liệu Tour</th>
                                    <th style="text-align: center;">Thanh Toán</th>
                                    <th>Trạng Thái</th>
                                    <th>Funtion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- tr -->
                                @if (!empty($getsignguider) && $getsignguider->count() > 0)
                                    @foreach ($getsignguider as $key => $item)
                                        <tr>
                                            <td>
                                                {{ $key + 1 }}
                                                {{-- {{ $item->id }} --}}
                                                <input type="hidden" value="{{ $item->id }}">
                                            </td>
                                            <td>
                                                <b>Guider: </b>{{ $item->guider->name_guider }} <br>
                                                <b>Tên HK: </b>{{ $item->customer->name }} <br>
                                                <b>Email: </b>{{ $item->customer->email }} <br>
                                                <b>Phone: </b>{{ $item->customer->phone }} <br>
                                            </td>

                                            <td>
                                                <b>Thời gian: </b> {{ $item->start_date->format('d/m/Y') }} -
                                                {{ $item->end_date->format('d/m/Y') }} <br>
                                                <b>Ngày đăng kí: </b> {{ $item->regis_date->format('d/m/Y') }} <br>
                                                <b>Tổng tiền: </b> {{ number_format($item->total_price, 0, '.', '.') }}đ
                                                <br>
                                                <b>Thanh toán:</b>
                                                @if ($item->payment->payment_method == 1)
                                                    Online <br>
                                                @elseif($item->payment->payment_method == 0)
                                                    tại công ty <br>
                                                @endif
                                                <b>Ghi chú: </b> {{ $item->note_tour }} <br>
                                            </td>
                                            <td class="text-center">
                                                <div class="dropdown action-label">
                                                    @if ($item->payment->status_payment == 1)
                                                        <a style="font-weight:600;"
                                                            class=" btn btn-white btn-sm btn-rounded dropdown-toggle-edit"
                                                            href="#" data-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa fa-dot-circle-o text-success"></i> Đã thanh toán
                                                        </a>
                                                    @elseif ($item->payment->status_payment == 0)
                                                        <a style="font-weight:600;"
                                                            class=" btn btn-white btn-sm btn-rounded dropdown-toggle-edit"
                                                            href="#" data-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa fa-dot-circle-o text-danger"></i> Chưa thanh toán
                                                        </a>
                                                    @endif
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <form action="{{ route('UpStattusPayment') }}" method="POST"
                                                            role="form" enctype="multipart/form-data">
                                                            <input type="hidden" name="id_payment_tour"
                                                                value="{{ $item->payment->id }}">
                                                            <input type="hidden" name="status_payment_edit"
                                                                id="status_payment_edit" value="1">
                                                            <input type="hidden" name="payment_date"
                                                                value="<?php echo date('Y-m-d'); ?>">
                                                            <input type="hidden" name="payment_amount_edit"
                                                                value="{{ $item->total_price }}">
                                                            <button type="submit" class="dropdown-item fw-600"><i
                                                                    class="fa fa-dot-circle-o text-success"></i> Đã thanh
                                                                toán
                                                            </button>
                                                            @csrf
                                                        </form>
                                                        <form action="{{ route('UpStattusPayment') }}" method="POST"
                                                            role="form" enctype="multipart/form-data">
                                                            <input type="hidden" name="id_payment_tour"
                                                                value="{{ $item->payment->id }}">
                                                            <input type="hidden" name="status_payment_edit"
                                                                id="status_payment_edit" value="0">
                                                            <input type="hidden" name="payment_amount_edit" value="0">
                                                            <input type="hidden" name="payment_date"
                                                                value="<?php echo date('Y-m-d'); ?>">
                                                            <button type="submit" class="dropdown-item fw-600"><i
                                                                    class="fa fa-dot-circle-o text-danger"></i> Chưa thanh
                                                                toán
                                                            </button>
                                                            @csrf
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                @if ($item->status_bookguider == 0)
                                                    <span class="t-type  bg-danger t-type-edit">Đã hủy</span>
                                                @elseif($item->status_bookguider == 1)
                                                    <span class="t-type bg-warning t-type-edit">Chờ xử lý</span>
                                                @elseif($item->status_bookguider == 2)
                                                    <span class="t-type bg-success t-type-edit">Đã xử lý</span>
                                                @elseif($item->status_bookguider == 3)
                                                    <span class="t-type btn-info t-type-edit">Đã kết thúc</span>
                                                @endif
                                            </td>
                                            <td style="text-align: center;">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle"
                                                        data-toggle="dropdown" aria-expanded="false"><span
                                                            class="ti-view-list-alt"></span></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <form action="{{ route('update_book_guider') }}" method="POST"
                                                            role="form" enctype="multipart/form-data">
                                                            <input type="hidden" name="id_sign_guider"
                                                                value="{{ $item->id }}">
                                                            <input type="hidden" name="status_edit" id="status_edit"
                                                                value="1">
                                                            <button type="submit" class="dropdown-item fw-500"><i
                                                                    class="fa fa-dot-circle-o text-yellow"></i> Chờ xử
                                                                lý</button>
                                                            @csrf
                                                        </form>
                                                        <form action="{{ route('update_book_guider') }}" method="POST"
                                                            role="form" enctype="multipart/form-data">
                                                            <input type="hidden" name="id_sign_guider"
                                                                value="{{ $item->id }}">
                                                            <input type="hidden" name="status_edit" id="status_edit"
                                                                value="2">
                                                            <button type="submit" class="dropdown-item fw-500"><i
                                                                    class="fa fa-dot-circle-o text-success"></i> Đã xử
                                                                lý</button>
                                                            @csrf
                                                        </form>
                                                        <form action="{{ route('update_book_guider') }}" method="POST"
                                                            role="form" enctype="multipart/form-data">
                                                            <input type="hidden" name="id_sign_guider"
                                                                value="{{ $item->id }}">
                                                            <input type="hidden" name="status_edit" id="status_edit"
                                                                value="3">
                                                            <button type="submit" class="dropdown-item fw-500"><i
                                                                    class="fa fa-dot-circle-o text-info"></i></i> Đã Kết
                                                                Thúc</button>
                                                            @csrf
                                                        </form>
                                                        <form action="{{ route('update_book_guider') }}" method="POST"
                                                            role="form" enctype="multipart/form-data">
                                                            <input type="hidden" name="id_sign_guider"
                                                                value="{{ $item->id }}">
                                                            <input type="hidden" name="status_edit" id="status_edit"
                                                                value="0">
                                                            <button type="submit" class="dropdown-item fw-500"><i
                                                                    class="fa fa-dot-circle-o text-danger"></i> Đã
                                                                Hủy</button>
                                                            @csrf
                                                        </form>
                                                        <a href="{{ route('delete_book_guider', ['bookguider_id' => $item->id]) }}"
                                                            class="delete-book-tour dropdown-item fw-500"><i
                                                                class="fa fa-trash-o m-r-5"></i>
                                                            Delete</a>
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
@endsection
@section('js_content_adm')
    <script>
        $(function(e) {
            var table;
            $(document).ready(function() {
                table = $('#table_list_book_tour').DataTable({
                    "pageLength": 10,
                    "lengthMenu": [
                        [5, 10, 15, -1],
                        [5, 10, 15, "All"]
                    ],
                });

            });
            // 
            $('.delete-book-tour').on('click', function() {
                event.preventDefault();
                Swal.fire({
                    title: 'Are you sure you want to delete?',
                    text: "You will not restore this data!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = this.getAttribute('href');
                    }
                })
            });
        });
    </script>
@endsection
