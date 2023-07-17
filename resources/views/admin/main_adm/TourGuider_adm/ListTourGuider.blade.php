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

        /* .dropdown-toggle-edit::after {
            display: inline-block;
            margin-left: 0.255em;
            vertical-align: 0.255em;
            content: "";
            border-top: 0.3em solid;
            border-right: 0.3em solid transparent;
            border-bottom: 0;
            border-left: 0.3em solid transparent;
        } */

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
    </style>
@endsection
@section('content_adm')
    <div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
        <div class="row mrg-0 mrg-top-20">
            <div class="tr-single-box">
                <div class="tr-single-header">
                    <h3 class="dashboard-title">Danh Sách Tour Guider</h3>
                </div>
                <div class="tr-single-body">
                    <div style="display: flex; float: right;">
                        <a href="{{ route('get_add_tour_guider') }}" style="margin-right: 15px;" type="button"
                            class="btn theme-btn"><span class="ti-plus"></span> Add Tour Guider</a>
                    </div>
                    <!-- ====================== Book Popular Hotel ================= -->
                    <div class="clearfix"></div>
                    <div class="table-responsive" style="margin-top: 20px; ">
                        <table class="table table-striped table-hover" id="table_list_guider" data-page-length='5'>
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Ảnh</th>
                                    <th>Thông Tin</th>
                                    <th>Ngày Sinh</th>
                                    <th style="text-align: center;">Trạng Thái</th>
                                    <th style="text-align: center;">Vai Trò</th>
                                    <th>Funtion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- tr -->
                                @if (!empty($list))
                                    @foreach ($list as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <img src="{{ $item->avatar_guider }}" class="img-thumbnail" width="50"
                                                    alt="">
                                            </td>
                                            <td>
                                                <b>Tên: </b> {{ $item->name_guider }} <br>
                                                <b>Phone: </b>{{ $item->phone_guider }} <br>
                                                <b>Địa chỉ: </b>{{ $item->address_guider }} <br>
                                            </td>
                                            <td>{{ $item->birthday_guider->format('d/m/Y') }} </td>
                                            <td class="text-center">
                                                @if ($item->role == 1 && $item->status_guider == 0)
                                                <span class="t-type bg-danger t-type-edit">Offline</span>
                                                @else
                                                <span class="t-type bg-success t-type-edit">Online</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="dropdown action-label">
                                                    @if ($item->role == 1)
                                                        <a style="font-weight:600;"
                                                            class=" btn btn-white btn-sm btn-rounded dropdown-toggle-edit"
                                                            href="#" data-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa fa-dot-circle-o text-success"></i> Tự do
                                                        </a>
                                                    @elseif ($item->role == 0)
                                                        <a style="font-weight:600;"
                                                            class=" btn btn-white btn-sm btn-rounded dropdown-toggle-edit"
                                                            href="#" data-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa fa-dot-circle-o text-danger"></i> Theo tour
                                                        </a>
                                                    @endif
                                                    {{-- <div class="dropdown-menu dropdown-menu-right">
                                                        <form action="{{ route('update_status_guider') }}" method="POST"
                                                            role="form" enctype="multipart/form-data">
                                                            <input type="hidden" name="id_guider"
                                                                value="{{ $item->id }}">
                                                            <input type="hidden" name="status_edit" id="status_edit"
                                                                value="1">
                                                            <button type="submit" class="dropdown-item fw-600"><i
                                                                    class="fa fa-dot-circle-o text-success"></i> Online
                                                            </button>
                                                            @csrf
                                                        </form>
                                                        <form action="{{ route('update_status_guider') }}" method="POST"
                                                            role="form" enctype="multipart/form-data">
                                                            <input type="hidden" name="status_edit" id="status_edit"
                                                                value="0">
                                                            <input type="hidden" name="id_guider"
                                                                value="{{ $item->id }}">
                                                            <button type="submit" class="dropdown-item fw-600"><i
                                                                    class="fa fa-dot-circle-o text-danger"></i> Offline
                                                            </button>
                                                            @csrf
                                                        </form>

                                                    </div> --}}
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('GetEdit_Guider', ['id' => $item->id]) }}"
                                                    class="tbl-action settings" title="Settings" data-toggle="tooltip"><i
                                                        class="ti-pencil"></i></a>
                                                <a href="{{ route('get_delete_guider', ['id' => $item->id]) }}"
                                                    class="tbl-action bg-danger delete-guider" title="Delete"
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
@endsection
@section('js_content_adm')
    <script>
        $(function(e) {
            var table;
            $(document).ready(function() {
                table = $('#table_list_guider').DataTable({
                    "pageLength": 10,
                    "lengthMenu": [
                        [5, 10, 15, -1],
                        [5, 10, 15, "All"]
                    ],
                });

            });
            // 
            $('.delete-guider').on('click', function() {
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
