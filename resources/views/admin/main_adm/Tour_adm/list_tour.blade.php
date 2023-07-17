@extends('admin.layout_adm.app_dashboard')
@section('css_content_adm')
    <style>

    </style>
@endsection
@section('content_adm')
    <div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
        <div class="row mrg-0 mrg-top-20">
            <div class="tr-single-box">
                <div class="tr-single-header">
                    <h3 class="dashboard-title">Danh Sách Tour</h3>
                </div>
                <div class="tr-single-body">
                    <div style="display: flex; float: right;">
                        <a href="{{ route('addTour') }}" style="margin-right: 15px;" type="button" class="btn theme-btn"><span
                                class="ti-plus"></span> Add Tour</a>
                    </div>
                    <!-- ====================== Book Popular Hotel ================= -->
                    <div class="clearfix"></div>
                    <div class="table-responsive" style="margin-top: 20px; ">
                        <table class="table table-striped table-hover" id="table_list_tour" data-page-length='5'>
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên Tour</th>
                                    <th>Địa Điểm</th>
                                    <th>Gallery Tour</th>
                                    <th>Thời Gian</th>
                                    <th>Funtion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- tr -->
                                @if (!empty($listtour))
                                    @foreach ($listtour as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <b>{{ $item->tourname }}</b> <br>
                                                {{-- @foreach ($guider as $item_g)
                                                    @if ($item_g->id == $item->guider_id)
                                                        <b>Hướng dẫn viên:</b> {{ $item_g->name_guider }}
                                                    @endif
                                                @endforeach --}}
                                            </td>
                                            <td>{{ $item->cate_location->location_name }} </td>
                                            <td>
                                                <a style="margin-left: 10px;"
                                                    href="{{ route('AddGallery_Tour', ['id' => $item->id]) }}"
                                                    type="button" class="btn theme-btn"><span style="font-size: 14px;"
                                                        class="ti-plus">Add</span> </a>
                                            </td>
                                            <td>{{ $item->tour_date }} Ngày</td>
                                            <td>
                                                <a href="{{ route('GetEdit_Tour', ['id' => $item->id]) }}"
                                                    class="tbl-action settings" title="Settings" data-toggle="tooltip"><i
                                                        class="ti-pencil"></i></a>
                                                <a href="{{ route('delTour', ['id' => $item->id]) }}"
                                                    class="tbl-action bg-danger delete-tour" title="Delete"
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
                table = $('#table_list_tour').DataTable({
                    "pageLength": 10,
                    "lengthMenu": [
                        [5, 10, 15, -1],
                        [5, 10, 15, "All"]
                    ],
                });

            });
            // 
            $('.delete-tour').on('click', function() {
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
