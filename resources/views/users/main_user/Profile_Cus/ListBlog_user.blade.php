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
                                    <h3 class="dashboard-title">Danh Sách Bài Đăng Blog</h3>
                                </div>
                                <div class="tr-single-body">
                                    <div class="table-responsive" style="margin-top: 20px; ">
                                        <table class="table table-striped table-hover" id="table_list_blog_user"
                                            data-page-length='5'>
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th >Danh Mục</th>
                                                    <th style="max-width: 280px;">Tiêu Đề</th>
                                                    <th>Ngày Đăng</th>
                                                    <th style="text-align: center;">Trạng Thái</th>
                                                    <th>Function</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- tr -->
                                                @if (!empty($listblog))
                                                @foreach ($listblog as $key => $item)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>
                                                            <b>{{ $item->cate_blog->dm_blog_name }}</b>
                                                        </td>
                                                        <td><b>{{ $item->title }}</b></td>
                                                        <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                                        <td class="text-center">
                                                            <div class="dropdown action-label">
                                                                @if ($item->status_blog == 1)
                                                                    <a style="font-weight: 600;"
                                                                        class=" btn btn-white btn-sm btn-rounded"
                                                                        href="#" data-toggle="dropdown"
                                                                        aria-expanded="false">
                                                                        <i class="fa fa-dot-circle-o text-success"></i>
                                                                        Đã xử lý
                                                                    </a>
                                                                @elseif($item->status_blog == 0)
                                                                    <a style="font-weight: 600;"
                                                                        class=" btn btn-white btn-sm btn-rounded fw-600"
                                                                        href="#" data-toggle="dropdown"
                                                                        aria-expanded="false">
                                                                        <i class="fa fa-dot-circle-o text-danger"></i>
                                                                        Chờ xử lý
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('GetEdit_Blog', ['id' => $item->id]) }}"
                                                                class="tbl-action settings" title="Settings" data-toggle="tooltip"><i
                                                                    class="ti-pencil"></i></a>
                                                            <a href="{{ route('delBlog', ['id' => $item->id]) }}"
                                                                class="tbl-action bg-danger delete-blog" title="Delete"
                                                                data-toggle="tooltip"><i class="ti-trash"></i></a>
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
@endsection
@section('js-layout-user')
    <script type="text/javascript">
        $(function(e) {
            var table;
            $(document).ready(function() {
                table = $('#table_list_blog_user').DataTable({
                    "pageLength": 10,
                    "lengthMenu": [
                        [5, 10, 15, -1],
                        [5, 10, 15, "All"]
                    ],
                });
            });
        });
    </script>
@endsection
