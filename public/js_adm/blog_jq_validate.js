
$(document).ready(function () {
    // add blog
    $("#add_blog_jqvali").validate({
        rules: {
            category_id: {
                required: true,
            },
            title: {
                required: true,
                minlength: 10
            },
            content:{
                required: true,
                minlength: 10,
               
            },
            img_title: "required"
        },
        messages: {
            category_id:{ required:"Vui lòng chọn danh mục.",
            },
            title: {
                required: "Vui lòng nhập tiêu đề.",
                minlength: "Tiêu đề phải trên 10 ký tự."
            },
            content:{
                required: "Vui lòng nhập nội dung.",
                minlength: "Tiêu đề phải trên 10 ký tự."
            },
            img_title: "Vui lòng chọn ảnh logo."
        },
        submitHandler: function(form) {
            // Xử lý logic khi form hợp lệ
            form.submit();
          }
    });
    // edit blog
    $("#edit_blog_jqvali").validate({
        rules: {
            category_id: "required",
            title: {
                required: true,
                minlength: 10
            },
            content:{
                required: true,
                minlength: 10
            }
        },
        messages: {
            category_id: "Vui lòng chọn danh mục.",
            title: {
                required: "Vui lòng nhập tiêu đề.",
                minlength: "Tiêu đề phải trên 10 ký tự."
            },
            content:{
                required: "Vui lòng nhập tiêu đề.",
                minlength: "Tiêu đề phải trên 10 ký tự."
            }
        
        }
    });
    // add category blog
    $("#add_cateblog_jqvali").validate({
        rules: {
            dm_blog_name: {
                required: true,
                minlength: 10
            }
        },
        messages: {
            dm_blog_name: {
                required: "Vui lòng nhập tên danh mục.",
                minlength: "Tiêu đề phải trên 10 ký tự."
            }
        }
    });
    //edit category blog
    $("#edit_cateblog_jqvali").validate({
        rules: {
            updm_blog_name: {
                required: true,
                minlength: 10
            }
        },
        messages: {
    
            updm_blog_name: {
                required: "Vui lòng nhập tên danh mục.",
                minlength: "Tiêu đề phải trên 10 ký tự."
            }
        }
    });
});
