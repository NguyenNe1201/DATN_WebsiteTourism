
document.addEventListener('DOMContentLoaded', function () {
    const bookNowBtns = document.querySelectorAll('.favorite-blog-a');
    bookNowBtns.forEach(bookNowBtn => {
        const blogId = bookNowBtn.dataset.blogId;
        // Kiểm tra trạng thái yêu thích cho từng phần tử
        $.ajax({
            type: "GET",
            url: "/home/check-favorite-blog",
            data: {
                blog_id: blogId
            },
            success: function (response) {
                if (response.isFavorite) {
                    bookNowBtn.classList.add('favorite');
                } else {
                    bookNowBtn.classList.add('unfavorite');
                }
            }
        });
        // Khi phần tử được click
        bookNowBtn.addEventListener('click', (event) => {
            event.preventDefault();
            const blogId = bookNowBtn.dataset.blogId;
            $.ajax({
                type: "GET",
                url: "/check_login_cus",
                success: function (data) {
                    if (data.loggedIn && data.userRole == 0) {
                        $.ajax({
                            type: "POST",
                            url: "/home/favorite_blog",
                            data: {
                                blog_id: blogId
                            },
                            success: function (response) {
                                if (response.success) {
                                    Swal.fire({
                                        title: 'Thông báo',
                                        text: 'Blog đã thêm vào danh sách yêu thích!',
                                        icon: 'success',
                                        time: 4000
                                    });
                                    bookNowBtn.classList.remove('unfavorite');
                                    bookNowBtn.classList.add('favorite');
                                } else {
                                    Swal.fire({
                                        title: 'Thông báo',
                                        text: 'Blog đã bị xóa khỏi danh sách yêu thích!',
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
                            text: 'Bạn cần đăng nhập, để dùng tính năng này!',
                            icon: 'warning',
                            time: 4000
                        });
                    }
                }
            });
        });
    });
});
