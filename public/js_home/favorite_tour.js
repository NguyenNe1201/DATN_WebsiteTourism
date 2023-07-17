 document.addEventListener('DOMContentLoaded', function() {
    // Kiểm tra trạng thái yêu thích cho từng phần tử
    bookNowBtns.forEach(bookNowBtn => {
        const tourId = bookNowBtn.dataset.tourId;
        $.ajax({
            type: "GET",
            url: "/home/check-favorite-tour",
            data: {
                tour_id: tourId
            },
            success: function(response) {
                if (response.isFavorite) {
                    bookNowBtn.classList.add('favorite');
                } else {
                    bookNowBtn.classList.add('unfavorite');
                }
            }
        });
    });
});
// Khi phần tử được click
const bookNowBtns = document.querySelectorAll('.favorite-a');

bookNowBtns.forEach(bookNowBtn => {
    bookNowBtn.addEventListener('click', (event) => {
        event.preventDefault();
        const tourId = bookNowBtn.dataset.tourId; // Lấy giá trị từ thuộc tính data-tour-id của phần tử đang được click
        $.ajax({
            type: "GET",
            url: "/check_login_cus",
            success: function(data) {
                if (data.loggedIn && data.userRole == 0) {
                    $.ajax({
                        type: "POST",
                        url: "/home/favorite-tour",
                        data: {
                            tour_id: tourId
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    title: 'Thông báo',
                                    text: 'Tour đã thêm vào danh sách yêu thích!',
                                    icon: 'success',
                                    time: 4000
                                });
                                bookNowBtn.classList.remove('unfavorite');
                                bookNowBtn.classList.add('favorite');
                            } else {
                                Swal.fire({
                                    title: 'Thông báo',
                                    text: 'Tour đã bị xóa khỏi danh sách yêu thích!',
                                    icon: 'success',
                                    time: 4000
                                });
                                bookNowBtn.classList.remove('favorite');
                                bookNowBtn.classList.add('unfavorite');
                            }
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'Thông báo',
                        text: 'Bạn cần đăng nhập, để sử dụng tính năng này!',
                        icon: 'warning',
                        time: 4000
                    });
                }
            }
        });
    });
});