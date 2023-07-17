@extends('admin.layout_adm.app_dashboard')
@section('css_content_adm')
    <style>
        .cl-yellow {
            color: #f0ad4e !important;
        }

        .cl-orange {
            color: #ff4e00 !important;
        }

        .span-icon {
            font-size: 40px;
            line-height: 47px;
            text-align: center;
            display: block;
        }

        .progress-bar-orange {
            background-color: #ff4e00;
        }

        .text-blue {
            color: #334e6f !important;
        }

        .progress-bar-blue {
            background-color: #334e6f;
        }

        .form-control {
            border-radius: 0px;
        }
    </style>
    {{-- <script src="{{ asset('assets/plugins/js/jquery.nice-select.min.js') }}"></script> --}}
@endsection
@section('content_adm')
    <div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
        <div class="row mrg-0 mrg-top-20">
            <div class="tr-single-box">
                <div class="tr-single-header">
                    <h3 class="dashboard-title">Dashboard</h3>
                </div>
                <div class="tr-single-body">
                    <!-- row -->
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="widget simple-widget">
                                <div class="rwidget-caption info">
                                    <div class="row">
                                        <div class="col-xs-4 padd-r-0">
                                            <i class="cl-info icon fa fa-users"></i>
                                        </div>
                                        <div class="col-xs-8">
                                            <div class="widget-detail">
                                                <h3>{{ $customerCount }}</h3>
                                                <span>Khách Hàng</span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="widget-line">
                                                <span style="width:80%;" class="bg-info widget-horigental-line"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="widget simple-widget">
                                <div class="widget-caption danger">
                                    <div class="row">
                                        <div class="col-xs-4 padd-r-0">
                                            <i class="cl-danger icon fa fa-paper-plane-o "></i>
                                        </div>
                                        <div class="col-xs-8">
                                            <div class="widget-detail">
                                                <h3>{{ $tourCount }}</h3>
                                                <span>Tour Hiện Có</span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="widget-line">
                                                <span style="width:50%;" class="bg-danger widget-horigental-line"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="widget simple-widget">
                                <div class="widget-caption warning">
                                    <div class="row">
                                        <div class="col-xs-4 padd-r-0">
                                            <i class="cl-success icon ti-book"></i>
                                        </div>
                                        <div class="col-xs-8">
                                            <div class="widget-detail">
                                                <h3>{{ $blogCount }}</h3>
                                                <span>Số Blog Hiện Có</span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="widget-line">
                                                <span style="width:60%;" class="bg-success widget-horigental-line"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="widget simple-widget">
                                <div class="widget-caption purple">
                                    <div class="row">
                                        <div class="col-xs-4 padd-r-0">
                                            <i class="cl-purple icon ti-shopping-cart-full"></i>
                                        </div>
                                        <div class="col-xs-8">
                                            <div class="widget-detail">
                                                <h3>{{ $tourSoldCount }}</h3>
                                                <span>Tour Đã Bán</span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="widget-line">
                                                <span style="width:40%;" class="bg-purple widget-horigental-line"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="widget simple-widget">
                                <div class="widget-caption purple">
                                    <div class="row">
                                        <div class="col-xs-4 padd-r-0">
                                            <i class="cl-yellow icon ti-user"></i>
                                        </div>
                                        <div class="col-xs-8">
                                            <div class="widget-detail">
                                                <h3>{{ $guiderCount }}</h3>
                                                <span>Tour Guider</span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="widget-line">
                                                <span style="width:40%;"
                                                    class="progress-bar-warning widget-horigental-line"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="widget simple-widget">
                                <div class="widget-caption purple">
                                    <div class="row">
                                        <div class="col-xs-4 padd-r-0">
                                            {{-- <i class="cl-yellow icon ti-briefcase"></i> --}}
                                            <span class="cl-orange span-icon ti-comment-alt"></span>
                                        </div>
                                        <div class="col-xs-8">
                                            <div class="widget-detail">
                                                <h3>{{ $reviewCount + $reviewCount_guider }}</h3>
                                                <span>Review</span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="widget-line">
                                                <span style="width:70%;"
                                                    class="progress-bar-orange widget-horigental-line"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <a href="{{ route('ListBookTourManager') }}">
                                <div class="widget simple-widget">
                                    <div class="widget-caption purple">
                                        <div class="row">
                                            <div class="col-xs-4 padd-r-0">
                                                {{-- <i class="cl-yellow icon ti-briefcase"></i> --}}
                                                <span class="text-blue span-icon ti-reload"></span>
                                            </div>
                                            <div class="col-xs-8">
                                                <div class="widget-detail">
                                                    <h3>{{ $bookTourCount }}</h3>
                                                    <span>Tour Chờ Xử Lý</span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="widget-line">
                                                    <span style="width:20%;"
                                                        class="progress-bar-blue widget-horigental-line"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <a href="{{ route('ListBookTourManager') }}">
                                <div class="widget simple-widget">
                                    <div class="widget-caption purple">
                                        <div class="row">
                                            <div class="col-xs-4 padd-r-0">
                                                {{-- <i class="cl-yellow icon ti-briefcase"></i> --}}
                                                <span class="cl-success  span-icon ti-money"></span>
                                            </div>
                                            <div class="col-xs-8" style="padding: 0px;">
                                                <div class="widget-detail">
                                                    <h4 style="font-size: 18px;">
                                                        {{ number_format($total_revenue, 0, '.', '.') }} đ</h4>
                                                    <span>Tổng doanh Thu</span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="widget-line">
                                                    <span style="width:80%;"
                                                        class="bg-success widget-horigental-line"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- /row -->
                    <!-- filter by date -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="tr-single-box">
                                <div class="tr-single-header">
                                    <h4 class="mb-0" style="font-size: 17px; font-weight: 550;">Thống Kê Doanh Thu Theo Ngày</h4>
                                </div>
                                <div class="tr-single-body">
                                    <form action="{{ route('FilterByDate') }}" method="POST" role="form"
                                        id="form_chart" class="jquery_valiss" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="from_date" class="col-md-2" style="width: 10%;">Từ ngày:</label>
                                            <div class="col-md-3">
                                                <input type="date" name="from_date" id="date_picker1"
                                                    class="form-control" required>
                                            </div>
                                            <label for="to_date" class="col-md-2" style="width: 12%;">Đến ngày:</label>
                                            <div class="col-md-3">
                                                <input type="date" name="to_date" id="date_picker2"
                                                    class="form-control" required>
                                            </div>
                                            <div class="col-md-2">
                                                <button style="height: 50px;" type="submit" id="btn-filter"
                                                    class="btn theme-btn">Search</button>
                                            </div>
                                        </div>
                                        @csrf
                                    </form>
                                    <div class="clearfix"></div>
                                    <div class="chart" id="myfirstchart" style="height: 350px;">
                                    </div>

                                </div>
                                <div style="float: left;color: #ff4e00; margin: 20px 0px; font-size:18px;">

                                    <label for="tong_tien">Tổng Tiền:</label>
                                    <span id="tong_tien_value"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- top địa điểm --}}
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="tr-single-box">
                                <div class="tr-single-header">
                                    <h4 class="mb-0" style="font-size: 17px; font-weight: 550;">Thống Kê Theo Địa Điểm</h4>
                                </div>
                                <div class="tr-single-body">
                                    {{-- <div class="form-group">

                                        <div class="col-md-3">
                                            <select name="id_location_tour" id="id_location_tour"
                                                class="btn_loca_tour form-control wide">
                                                <option value="">---- Lọc theo mục ----</option>
                                                <option value="toplocation">Top địa điểm</option>
                                                <option value="toptour">Top tour</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="clearfix"></div> --}}
                                    <div class="table-responsive" style="margin-top: 20px; ">
                                        <table class="table table-striped table-hover" id="table_filter_location"
                                            data-page-length='5'>
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên địa điểm</th>
                                                    <th>Số lần đặt</th>
                                                    <th>Số người đến địa điểm</th>
                                                    <th>Tour hiện có</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- tr -->
                                                @if (!empty($topLocations))
                                                    @foreach ($topLocations as $key_loca => $item_loca)
                                                        <tr>
                                                            <td>
                                                                {{ $key_loca + 1 }}
                                                            </td>
                                                            <td>{{ $item_loca->location_name }}</td>
                                                            <td>
                                                                <b>{{ $item_loca->book_tours_count }}</b>
                                                            </td>
                                                            <td>
                                                                @if ($item_loca->bookTours->count() > 0)
                                                                    {{ $item_loca->bookTours->first()->total_people }}
                                                                @else
                                                                    0
                                                                @endif
                                                            </td>
                                                            <td>{{ $item_loca->location_tour_count }}</td>
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
                    {{-- top tour --}}
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="tr-single-box">
                                <div class="tr-single-header">
                                    <h4 class="mb-0" style="font-size: 17px; font-weight: 550;">Thống Kê Theo Tour</h4>
                                </div>
                                <div class="tr-single-body">
                                    <div class="table-responsive" style="margin-top: 20px; ">
                                        <table class="table table-striped table-hover" id="table_filter_tour"
                                            data-page-length='5'>
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên tour</th>
                                                    <th>Đánh giá</th>
                                                    <th>Thông tin</th>
                                                    <th>Doanh thu</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- tr -->
                                                @if (!empty($topTours))
                                                    @foreach ($topTours as $key_tour => $item_tour)
                                                        <tr>
                                                            <td>{{ $key_tour + 1 }}</td>
                                                            <td><b>{{ $item_tour->tourname }}</b> <br>
                                                                @foreach ($cate_location as $item_cate)
                                                                    @if ($item_cate->id == $item_tour->location_tour_id)
                                                                        <i class=" ti-location-pin"></i>
                                                                        {{ $item_cate->location_name }} <br>
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @foreach ($total_review as $review)
                                                                    @if ($review->tour_id == $item_tour->id)
                                                                        <span style="color: #ff4e00">
                                                                            {{ $review->review_count }} Reivew</span>
                                                                        <i class="fa fa-star cl-warning"></i>
                                                                        {{ number_format($review->average_rating, 1) }}/5
                                                                        <br>
                                                                    @endif
                                                                @endforeach
                                                                {{-- <i style="color:#ff0052;" class="fa fa-fw fa-heart"></i> --}}
                                                            </td>
                                                            <td>
                                                                <b>Số lần đặt tour:</b>
                                                                {{ $item_tour->sign_tour_count }}<br>
                                                                <b>Số người đã đi:</b>
                                                                @if ($item_tour->sign_tour->count() > 0)
                                                                    {{ $item_tour->sign_tour->first()->total_people }} <br>
                                                                @else
                                                                    0 <br>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                {{ number_format($item_tour->sign_tour_sum_total_price, 0, '.', '.') }} đ
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
                <!-- /row -->
            </div>
        </div>
    </div>
    </div>
@endsection
@section('js_content_adm')
    <script>
        $(document).ready(function() {
            // datatable
            var table = $('#table_filter_category').DataTable({
                "pageLength": 10,
                "lengthMenu": [
                    [5, 10, 15, -1],
                    [5, 10, 15, "All"]
                ],
            });
            var table = $('#table_filter_location').DataTable({
                "pageLength": 10,
                "lengthMenu": [
                    [5, 10, 15, -1],
                    [5, 10, 15, "All"]
                ],
            });
            var table = $('#table_filter_tour').DataTable({
                "pageLength": 10,
                "lengthMenu": [
                    [5, 10, 15, -1],
                    [5, 10, 15, "All"]
                ],
            });
            // filter chart by date
            var chart = new Morris.Line({
                element: 'myfirstchart',
                hideHover: 'auto',
                parseTime: false,
                xkey: 'period',
                ykeys: ['price'],
                labels: ['Giá Tiền']
            });

            function loadChart() {
                var today = moment().format('YYYY-MM-DD');
                var thirtyDaysAgo = moment().subtract(30, 'days').format('YYYY-MM-DD');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/admin/filter-by-date",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        from_date: thirtyDaysAgo,
                        to_date: today
                    },
                    success: function(data) {
                        var chartData = data.map(function(item) {
                            var formattedDate = item.period.substring(0, 10);
                            return {
                                period: formattedDate,
                                price: item.price
                            };
                        });
                        chart.setData(chartData);
                        // Tính tổng giá trị doanh thu
                        var total = 0;
                        chartData.forEach(function(item) {
                            total += item.price;
                        });
                        displayTotal(total);
                    }
                });
            }

            function filterByDate() {
                loadChart();
                var from_date = $('#date_picker1').val();
                var to_date = $('#date_picker2').val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/admin/filter-by-date",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        from_date: from_date,
                        to_date: to_date
                    },
                    success: function(data) {
                        var chartData = data.map(function(item1) {
                            var formattedDate = item1.period.substring(0, 10);
                            return {
                                period: formattedDate,
                                price: item1.price
                            };
                        });
                        chart.setData(chartData);
                        // Tính tổng giá trị doanh thu
                        var total = 0;
                        chartData.forEach(function(item1) {
                            total += item1.price;
                        });
                        // Hiển thị tổng giá trị doanh thu
                        displayTotal(total);
                    }
                });
            }

            function displayTotal(total) {
                var formattedTotal = total.toLocaleString('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                });
                $('#tong_tien_value').text(formattedTotal);

            }
            loadChart();
            $("#form_chart").submit(function(event) {
                event.preventDefault(); // Ngăn chặn hành vi mặc định của form
                if ($("#form_chart").valid()) { // Kiểm tra validate form
                    filterByDate();
                }
            });
            // filter by category tour
            // $('.btn_cate_tour').change(function() {
            //     var selectedCategoryId = $(this).val();
            //     $.ajax({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         },
            //         url: "/admin/filter-by-category",
            //         type: "POST",
            //         dataType: "JSON",
            //         data: {
            //             id_category_tour: selectedCategoryId,
            //         },
            //         success: function(response) {
            //             // Cập nhật nội dung bảng với dữ liệu từ server
            //             updateTable(response);
            //         },
            //         error: function(xhr, status, error) {
            //             console.log(xhr.responseText);
            //         }
            //     });
            // });
            // // Hàm cập nhật nội dung bảng với dữ liệu từ server
            // function updateTable(data) {
            //     var tableBody = $('#table_filter_category tbody');
            //     tableBody.empty();
            //     if (data.length > 0) {
            //         $.each(data, function(index, item) {
            //             var row = $('<tr>');
            //             row.append('<td>' + (index + 1) + '</td>');
            //             row.append('<td>' + item.cate_tour.cate_tour_name + '</td>');
            //             row.append('<td><b>' + item.tourname + '</b></td>');
            //             row.append('<td><b>' + item.sign_tour_count + '</b></td>');
            //             tableBody.append(row);
            //         });
            //     } else {
            //         var row = $('<tr>');
            //         row.append('<td colspan="4">Không có dữ liệu</td>');
            //         tableBody.append(row);
            //     }
            // }


            // validate jquery
            $("#form_chart").validate({
                rules: {
                    from_date: {
                        required: true,
                    },
                    to_date: {
                        required: true,
                        greaterThanStartDate: "#date_picker1"
                    }
                },
                messages: {
                    from_date: {
                        required: "Vui lòng chọn ngày."
                    },
                    to_date: {
                        required: "Vui lòng chọn ngày.",
                        greaterThanStartDate: "Ngày nhập không hợp lệ."
                    }
                }
            });
            $.validator.addMethod("greaterThanStartDate", function(value, element, params) {
                var startDate = $(params).val();
                var endDate = value;
                if (startDate && endDate) {
                    var startDateObj = new Date(startDate);
                    var endDateObj = new Date(endDate);
                    return endDateObj > startDateObj;
                }
                return true;
            }, "Ngày nhập không hợp lệ.");
        });
    </script>
@endsection
