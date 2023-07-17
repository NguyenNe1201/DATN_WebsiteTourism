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
                <li class="active">Đăng Kí Tour</li>
                <li>Thanh Toán Tour</li>
                <li>Proceed Payment</li>
            </ul>
            <!-- fieldsets -->
            <!-- row -->
            <div class="row">
                <div class="col-md-6">
                    <div class="tr-single-box">
                        <div class="tr-single-header">
                            <h4><i class="fa fa-star-o"></i>Thông Tin Tour</h4>
                        </div>
                        <div class="tr-single-body">
                            <div class="booking-price-detail side-list no-border">
                                <h5>Tour & Điểm đến</h5>
                                <ul>
                                    <li>Tên tour<strong class="pull-right">{{ $gettour_payment->tourname }}</strong></li>
                                    <li>Điểm xuất phát<strong class="pull-right">Tp.Hồ Chí Minh</strong></li>
                                    <li>Điểm đến<strong class="pull-right">{{ $gettour_payment->cate_location->location_name}}</strong></li>
                                    <li>Thời gian<strong class="pull-right">{{ $gettour_payment->tour_date }} Ngày</strong>
                                    </li>
                                    <li>Ngày khởi hành<strong class="pull-right" id="start_date_dk"></strong></li>
                                    <li>Ngày về<strong class="pull-right" id="end_date_dk"></strong>
                                    </li>

                                    <li>Số người đăng kí<strong class="pull-right" id="number_people_dk"></strong>
                                    </li>
                                    <li>Giá<strong class="pull-right"><span
                                                style="color: #ed8b34">{{ number_format($gettour_payment->price, 0, '.', '.') }}
                                                đ</span>/1 Người</strong></li>
                                    <li>Tổng tiền<strong style="color: #ed8b34;" class="pull-right"
                                            id="total_price_display"></strong></li>
                                </ul>
                            </div>
                            <div class="booking-price-detail side-list no-border">
                                <h5>Features include</h5>
                                <div class="include-features">
                                    <span class="features-tag">Free Parking</span>
                                    <span class="features-tag">Indoor pool</span>
                                    <span class="features-tag">Security cameras</span>
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
                            <h4><i class="ti-write"></i>Thông Tin Đặt Tour</h4>
                        </div>
                        <div class="tr-single-body">
                            <form action="{{ route('PostSignUpTour') }}" method="POST" role="form" id="book-tour-form"
                                class="jquery_valiss" enctype="multipart/form-data">
                                <input type="hidden" name="customer_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="tour_id" value="{{ $gettour_payment->id }}">
                                <input type="hidden" name="status_payment" id="status_payment" value="0">
                                <input type="hidden" name="location_tour_id" value="{{ $gettour_payment->location_tour_id }}">
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
                                        <label for="Regis_date">Ngày đăng kí</label>
                                        <input type="date" name="Regis_date" id="Regis_date" class="form-control"
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
                                        <input type="date" name="end_date" id="end_date_display" class="form-control"
                                            value="{{ old('end_date') }}" readonly>
                                        <input type="hidden" id="hidden_end_date">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="num_people">Số người</label>
                                        <input id="num_people" name="num_people" type="number" class="form-control"
                                            placeholder="điền số người" value="{{ old('num_people') }}" min="1"
                                            oninput="calculateTotal()">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="total_price">Tổng tiền</label>
                                        <input type="text" id="total_price" name="total_price" class="form-control"
                                            value="{{ old('total_price') }}" placeholder="số tiền" readonly>
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="payment_method">Phương thức thanh toán</label>

                                        <select name="payment_method" class="form-control wide"
                                            onchange="redirectPage(this.value==1)" required>
                                            <option value="">-----Chọn thanh toán-----</option>
                                            <option value="0">Thanh toán tại công ty</option>
                                            <option value="1">Thanh toán online</option>
                                        </select>

                                    </div>
                                    <div class="col-sm-12">
                                        <label>Ghi chú</label>
                                        <textarea class="form-control height-70" name="note_tour" id="note_tour" spellcheck="false"></textarea>
                                    </div>
                                    <div class="col-sm-12 text-center" style="margin-top: 10px;">
                                        {{-- <a href="" style="font-weight:600;" type="button"
                                            class="btn btn-warning">CANCEL</a> --}}
                                        <button style="font-weight: 600;" name="redirect" type="submit"
                                            class="btn theme-btn btn-arrow">Book Tour</button>
                                    </div>
                                </div>
                                @csrf
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js-layout-user')
    <script type="text/javascript">
        const getPrice = () => {
            return {{ $gettour_payment->price }};
        }
        const calculateTotal = () => {
            const numPeople = document.getElementById("num_people").value;
            const pricePerPerson = getPrice();
            const totalPrice = numPeople * pricePerPerson;
            const date_start_tour = new Date(document.getElementById("start_date").value);
            const tourDuration = parseInt("{{ $gettour_payment->tour_date }}");
            // Tính ngày về dựa trên ngày khởi hành và số ngày tour
            const date_end_tour = new Date(date_start_tour);
            date_end_tour.setDate(date_start_tour.getDate() + tourDuration - 1);
            // trả giá trị lại thẻ strong và input total_price
            document.getElementById("total_price").value = totalPrice;
            document.getElementById("number_people_dk").innerHTML = numPeople.toLocaleString('vi-VN') + ' Người';
            document.getElementById("total_price_display").innerHTML = totalPrice.toLocaleString('vi-VN', {
                style: 'currency',
                currency: 'VND'
            });
            // show ngày khởi hành và ngày về lên thẻ strong
            document.getElementById("start_date_dk").innerHTML = formatDate(date_start_tour);
            document.getElementById("end_date_dk").innerHTML = formatDate(date_end_tour);
            // Gán giá trị cho input hidden end_date
            document.getElementById("hidden_end_date").value = formatDate(date_end_tour);
            // Hiển thị giá trị trong input end_date
            document.getElementById("end_date_display").value = formatDateForInput(date_end_tour);
        }
        const formatDate = (date) => {
            const month = (date.getMonth() + 1).toString().padStart(2, '0');
            const day = date.getDate().toString().padStart(2, '0');
            const year = date.getFullYear();
            return day + '/' + month + '/' + year;
        }
        const formatDateForInput = (date) => {
            const month = (date.getMonth() + 1).toString().padStart(2, '0');
            const day = date.getDate().toString().padStart(2, '0');
            const year = date.getFullYear();
            return year + '-' + month + '-' + day;
        }
        document.getElementById("num_people").addEventListener("change", calculateTotal);
        // jquery validate book tour
        $(document).ready(function() {
            $("#book-tour-form").validate({
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
                    num_people: {
                        required: true,
                        min: 1
                    },
                    start_date: {
                        required: true,
                        greaterThanOrEqualToToday: true

                    },
                    payment_method: "require"
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
                        greaterThanOrEqualToToday: "Ngày đi phải từ ngày mai trở đi."

                    },
                    num_people: {
                        required: "Vui lòng chọn số người.",
                        min: "Số người đăng kí phải lớn hơn 1."
                    },
                    payment_method: "Vui lòng chọn thanh toán."
                }
            });
            $.validator.addMethod("greaterThanOrEqualToToday", function(value, element) {
                var today = new Date();
                today.setHours(0, 0, 0, 0);
                var selectedDate = new Date(value);
                var tomorrow = new Date(today.getTime() + 24 * 60 * 60 *1000);
                return selectedDate >= tomorrow;
            }, "Ngày đi phải từ ngày mai trở đi.");
        });
    </script>
@endsection
