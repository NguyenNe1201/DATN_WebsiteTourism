@extends('users.layout_user.app')
@section('css-layout-user')
    <style>
        .form-control {
            border-radius: 0px;
        }

        /* edit nice-select bootstrap */
        .nice-select {
            display: none !important;
        }

        /* Hiển thị thành phần select gốc */
        select[name="payment_method"] {
            display: block !important;
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
                <li class="active">Book Tour Guider</li>
                <li>Thanh Toán Tour</li>
                <li>Proceed Payment</li>
            </ul>
            <!-- fieldsets -->
            <!-- row -->
            <div class="row">
                <div class="col-md-6">
                    <div class="tr-single-box">
                        <div class="tr-single-header">
                            <h4><i class="fa fa-star-o"></i>Book Tour Guider</h4>
                        </div>
                        <div class="tr-single-body">
                            <div class="booking-price-detail side-list no-border">
                                <h5>Tour Guider & Thông Tin</h5>
                                <ul>
                                    <li>Tên tour guider<strong
                                            class="pull-right">{{ $getguider_signup->name_guider }}</strong></li>
                                    <li>Ngày sinh<strong
                                            class="pull-right">{{ $getguider_signup->birthday_guider->format('d/m/Y') }}</strong>
                                    </li>
                                    <li>Số điện thoại<strong
                                            class="pull-right">{{ $getguider_signup->phone_guider }}</strong></li>
                                    <li>Giá<strong class="pull-right"><span
                                                style="color: #ed8b34">{{ number_format($getguider_signup->price_1date, 0, '.', '.') }}
                                                đ</span>/Ngày</strong></li>
                                    <li>Ngày khởi hành<strong class="pull-right" id="start_date_dk"></strong></li>
                                    <li>Ngày về<strong class="pull-right" id="end_date_dk"></strong></li>
                                    <li>Tổng thời gian<strong class="pull-right" id="total_day_dk"></strong></li>

                                    <li>Tổng tiền<strong style="color: #ed8b34;" class="pull-right"
                                            id="total_price_display"></strong></li>
                                    <li>Giảm giá<strong style="color: #ed8b34;" class="pull-right"
                                            id="discount_price"></strong></li>

                                    <li>Tổng tiền cần thanh trả<strong style="color: #ed8b34;" class="pull-right"
                                            id="total_price_discount"></strong></li>
                                </ul>
                            </div>
                            <div class="booking-price-detail side-list no-border">
                                <h5>Ưu đãi dành cho khách hàng</h5>
                                <div class="include-features">
                                    <span class="features-tag">Book trên 5 ngày được giảm 2%</span>
                                    <span class="features-tag">Book trên 10 ngày được giảm 5%</span>
                                    <span class="features-tag">Book trên 20 ngày được giảm 10%</span>
                                    <span class="features-tag">Hot Water</span>
                                    <span class="features-tag">Spa/Sauna</span>
                                    <span class="features-tag">Free Wifi</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="tr-single-box">
                        <div class="tr-single-header">
                            <h4><i class="ti-write"></i>Thông Tin Khách Hàng</h4>
                        </div>
                        {{-- @include('admin.alert')
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif --}}
                        <form action="{{ route('post_signup_guider') }}" method="POST" role="form" id="book-guider-form"
                            class="jquery_valiss" enctype="multipart/form-data">
                            <input type="hidden" name="customer_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="guider_id" value="{{ $getguider_signup->id }}">
                            <input type="hidden" name="status_bookguider" id="status_bookguider" value="1">
                            <input type="hidden" name="total_day">
                            <div class="tr-single-body">
                                <div class="row" style="display: flex; flex-wrap: wrap;">
                                    <div class="col-sm-6">
                                        <label>Họ tên</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') ?? Auth::user()->name }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control"
                                            value="{{ old('email') ?? Auth::user()->email }}" readonly>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="phone">Số điện thoại</label>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                            value="{{ old('phone') ?? Auth::user()->phone }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="regis_date">Ngày đăng kí</label>
                                        <input type="date" name="regis_date" id="regis_date" class="form-control"
                                            value="<?php echo date('Y-m-d'); ?>" readonly>
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="address">Địa chỉ</label>
                                        <input name="address" id="address" type="text" class="form-control"
                                            value="{{ old('address') ?? Auth::user()->address }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="start_date">Ngày khởi hành</label>
                                        <input type="date" name="start_date" id="start_date" class="form-control"
                                            value="{{ old('start_date') }}" oninput="calculateTotal()" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="end_date">Ngày về</label>
                                        <input type="date" name="end_date" id="end_date" class="form-control"
                                            oninput="calculateTotal()" value="{{ old('end_date') }}" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="total_price">Tổng tiền</label>
                                        <input type="text" id="total_price" name="total_price" class="form-control"
                                            value="{{ old('total_price') }}" placeholder="số tiền" readonly>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="payment_method">Phương thức thanh toán</label>
                                        <select name="payment_method" class="form-control wide"
                                            onchange="redirectPage(this.value==1)" required>
                                            <option value="">-- chọn loại thanh toán --</option>
                                            <option value="0">Thanh toán tại công ty</option>
                                            <option value="1">Thanh toán online</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Ghi chú</label>
                                        <textarea class="form-control height-70" name="note_guider" id="note_guider" spellcheck="false"></textarea>
                                    </div>
                                    <div class="col-sm-12 text-center" style="margin-top: 10px;">
                                        <button style="font-weight: 600;" name="redirect" type="submit"
                                            class="btn theme-btn btn-arrow">Book Tour Guider</button>
                                    </div>
                                </div>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js-layout-user')
    <script type="text/javascript">
        const getPrice = () => {
            // Lấy giá tiền mỗi người từ backend
            return {{ $getguider_signup->price_1date }};
        };
        const calculateTotal = () => {
            const date_start_tour = new Date(document.getElementById("start_date").value);
            const date_end_tour = new Date(document.getElementById("end_date").value);
            const pricePerDay = getPrice();
            let discountPercentage = 0; // Phần trăm giảm giá, mặc định là 0

            if (date_start_tour && date_end_tour && pricePerDay) {
                const numDays = Math.round((date_end_tour - date_start_tour) / (24 * 60 * 60 * 1000)) + 1;

                // Áp dụng giảm giá dựa trên số ngày đặt tour
                if (numDays >= 5 && numDays < 10) {
                    discountPercentage = 2; // Giảm 2%
                } else if (numDays >= 10 && numDays < 20) {
                    discountPercentage = 5; // Giảm 5%
                } else if (numDays >= 20) {
                    discountPercentage = 10; // Giảm 10%
                }

                const totalPrice = pricePerDay * numDays * (1 - discountPercentage / 100);
                document.getElementById("total_price").value = totalPrice;
                document.getElementById("total_price_discount").innerHTML = totalPrice.toLocaleString('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                });
                document.getElementById("start_date_dk").textContent = formatDate(date_start_tour);
                document.getElementById("end_date_dk").textContent = formatDate(date_end_tour);
                document.getElementById("discount_price").textContent = discountPercentage + "%";
                const totalPriceNoDiscount = pricePerDay * numDays;
                document.getElementById("total_price_display").innerHTML = totalPriceNoDiscount.toLocaleString(
                    'vi-VN', {
                        style: 'currency',
                        currency: 'VND'
                    });
            }
            if (date_start_tour && date_end_tour) {
                const totalDays = Math.ceil((date_end_tour - date_start_tour) / (24 * 60 * 60 * 1000)) + 1;
                document.getElementById("total_day_dk").textContent = totalDays.toLocaleString('vi-VN') + ' Ngày';
                document.getElementsByName("total_day")[0].value = totalDays;
            }
        };
        // check guider plan
        $(document).ready(function() {
            // Gán sự kiện khi thay đổi ngày khởi hành và ngày về
            $("#start_date, #end_date").on("change", function() {
                var startDate = $("#start_date").val();
                var endDate = $("#end_date").val();
                var guiderId = "{{ $getguider_signup->id }}";
                checkDuplicateSchedule(startDate, endDate, guiderId);
            });
        });
        const checkDuplicateSchedule = (startDate, endDate, guiderId) => {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/home/check-guider-plan",
                type: "POST",
                data: {
                    start_date: startDate,
                    end_date: endDate,
                    guider_id: guiderId
                },
                success: function(response) {
                    if (response.duplicate) {
                        // Nếu có lịch trình trùng lặp, hiển thị thông báo lỗi cho khách hàng
                        Swal.fire({
                            title: 'Thông báo',
                            text: 'Lịch trình này đã được book. Vui lòng chọn ngày khác!',
                            icon: 'error',
                            timer: 5000
                        });
                    }else {
                        
                    }
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        };
        // xử lý hiển thị ngày
        const formatDate = (date) => {
            const month = (date.getMonth() + 1).toString().padStart(2, '0');
            const day = date.getDate().toString().padStart(2, '0');
            const year = date.getFullYear();
            return day + '/' + month + '/' + year;
        };
        // xử lý phần chọn phương thức thanh toán
        const redirectPage = (selectElement) => {
            if (selectElement.value === "0") {
                window.location.href = "/home/payment_push";
            }
        };
        $(document).ready(function() {
            // jquery validate book tour
            $("#book-guider-form").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 10
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    address: {
                        required: true
                    },
                    phone: {
                        required: true,
                        rangelength: [10, 10]
                    },
                    start_date: {
                        required: true,
                        greaterThanOrEqualToToday: true

                    },
                    end_date: {
                        required: true,
                        greaterThanStartDate: "#start_date"
                    },
                    payment_method: "required"
                },
                messages: {
                    name: {
                        required: "Vui lòng nhập họ tên.",
                        minlength: "Họ tên phải trên 10 ký tự."
                    },
                    email: {
                        email: "Địa chỉ email không hợp lệ.",
                        required: "Vui lòng nhập email."
                    },
                    address: {
                        required: "vui lòng nhập địa chỉ."
                    },
                    phone: {
                        required: "Vui lòng nhập số điện thoại.",
                        rangelength: "số điện thoại không hợp lệ."
                    },
                    start_date: {
                        required: "Vui lòng chọn ngày đi.",
                        greaterThanOrEqualToToday: "Ngày đi phải từ hôm nay trở đi."

                    },
                    end_date: {
                        required: "Vui lòng chọn ngày về.",
                        greaterThanStartDate: "Ngày về phải lớn hơn ngày đi."
                    },
                    payment_method: "Vui lòng chọn loại thanh toán."
                }
            });
            $.validator.addMethod("greaterThanOrEqualToToday", function(value, element) {
                var today = new Date();
                today.setHours(0, 0, 0, 0);
                var selectedDate = new Date(value);
                return selectedDate >= today;
            }, "Ngày đi phải từ hôm nay trở đi.");
            $.validator.addMethod("greaterThanStartDate", function(value, element, params) {
                var startDate = $(params).val();
                var endDate = value;
                if (startDate && endDate) {
                    var startDateObj = new Date(startDate);
                    var endDateObj = new Date(endDate);
                    return endDateObj > startDateObj;
                }
                return true;
            }, "Ngày về phải lớn hơn ngày đi.");
        });
    </script>
@endsection
