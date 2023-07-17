@extends('admin.layout_adm.app_dashboard')
@section('css_content_adm')
    <style>
        .inputgallery-form {
            display: flex;
            max-width: 500px;

        }

        .inputgallery-form>button {
            margin-left: 15px;
        }

        .inputgallery-form>input {
            border-radius: 0;
            margin-bottom: 0px;
        }
    </style>
@endsection
@section('content_adm')
    <div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
        <div class="row mrg-0 mrg-top-20">
            <div class="tr-single-box">
                <div class="tr-single-header">
                    <h3 class="dashboard-title">Danh Sách Gallery Tour</h3>
                </div>
                <div class="tr-single-body">
                    <div style="text-align: -webkit-center;">
                        <form action="{{ route('PostGallery_Tour') }}" method="POST" role="form"
                            enctype="multipart/form-data">
                            <div class="inputgallery-form">
                                <label for="img_lgtour" class="col-md-2 col-sm-3" style="margin-bottom: 0px;">Upload
                                    img:</label>
                                <input type="hidden" name="tour_id" id="tour_id" value="{{ $tour_id }}">
                                <input style="padding:11px 12px 10px;" type="file" name="file_gallery[]"
                                    id="file_gallery" class="form-control" accept="image/*" multiple required>
                                <button style="font-weight: 600;" type="submit" class="btn theme-btn">Submit</button>
                            </div>
                            <div style="color: red" id="error_gallery"></div>
                            @csrf
                        </form>
                    </div>
                    <!-- ====================== Book Popular Gallery ================= -->
                    <div class="clearfix"></div>
              
                        <div class="table-responsive" id="gallery_load" style="margin-top: 20px; ">
                            <table class="table table-striped table-hover" id="table_list_gallery" data-page-length='5'>
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên Tour</th>
                                        <th>Hình Ảnh</th>
                                        <th>Ngày Tạo</th>
                                        <th>Funtion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- tr -->
                                    @if (!empty($gallery))
                                        @foreach ($gallery as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td><b>{{ $item->tour_name->tourname }}</b></td>
                                                <td><img src="/storage/photos/2/gallery/{{ $item->gallery_img }}"
                                                        alt="" class="img-thumbnail" width="100"> </td>
                                                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                                <td>
                                                    <a href="" class="tbl-action settings" title="Settings"
                                                        data-toggle="tooltip"><i class="ti-pencil"></i></a>
                                                    <a href="{{ route('Delete_Gallery', ['id' => $item->id]) }}" class="tbl-action bg-danger delete-blog"
                                                        title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a>
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
                table = $('#table_list_gallery').DataTable({
                    "pageLength": 10,
                    "lengthMenu": [
                        [5, 10, 15, -1],
                        [5, 10, 15, "All"]
                    ],
                });
            });
            $('.delete-blog').on('click', function() {
                event.preventDefault(); //this will hold the url
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
