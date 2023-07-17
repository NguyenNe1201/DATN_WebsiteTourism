
$(function (e) {
    var table;
    $(document).ready(function () {
        table = $('#table_list_category_tour').DataTable({
            //edit show
            // "columnDefs": [
            //     {
            //         targets: [0, 2, 3, 5],
            //         orderable: false
            //     }
            // ],
            "pageLength": 10,
            "lengthMenu": [
                [5, 10, 15, -1],
                [5, 10, 15, "All"]
            ],
        });

    });
    //delete customer = checkbox
    $("#checkbox_cate_tour").click(function () {
        $(".checkbox_id").prop('checked', $(this).prop('checked'));
    });
    $("#deleteCheckbox_cate_tour").click(function (e) {
        e.preventDefault();
        var socheckerd = document.querySelectorAll('input[name="id"]:checked').length;
        if (socheckerd > 0) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You will not restore this data!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Deleted!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var allid = [];
                    $("input:checkbox[name=id]:checked").each(function () {
                        allid.push($(this).val());
                    });
                    $.ajax({
                        url: "/admin/list_category_tour/delete_category_tour",
                        type: "DELETE",
                        data: {
                            _token: $("input[name=_token]").val(),
                            id: allid,
                        },
                        success: function (response) {
                            location.reload();
                        }
                    })
                    window.location.href = this.getAttribute('href');

                }
            })
        } else {

            Swal.fire(
                'Unachievable!',
                'You need to select the row to delete!',
                'warning'
            )
        }

    })
    //edit category blog
    $("#edit_category_tour").click(function (e) {
        e.preventDefault();
        $('#list_cate input').remove();
        var socheckerd = document.querySelectorAll('input[name="id"]:checked').length;
        if (socheckerd == 1) {
            var id = [];
            $("input:checkbox[name=id]:checked").each(function () {
                id.push($(this).val());
                // alert(id);
                $("#edit_1_category_tour").modal('show');
                $.ajax({
                    url: "/admin/list_category_tour/edit_category_tour/" + id,
                    type: "GET",
                    success: function (response) {
                        var len = 0;
                        len = response.category_tour_get.length;
                        if (len > 0) {
                            $('#list_cate option').remove(option);
                            var option;
                            for (var i = 0; i < len; i++) {
                                option = '<input type="hidden" name="cate_tour_get" value="' + response.category_tour_get[i].id + '">'
                                    + '<input type="text" class="form-control" readonly value="' + response.category_tour_get[i].cate_tour_name + '">'
                                $('#list_cate').append(option);
                            }
                        }

                    }
                })
            });
        } else if (socheckerd > 1) {
            Swal.fire(
                'Unachievable!',
                'You can only select one row that you need to edit!',
                'warning'
            )
        } else if (socheckerd == 0) {
            $("#edit_allcategory_tour").modal('show');
            // alert('Bạn chỉ được chọn 1 hàng mà bạn cần chỉnh sửa')
        } else {
            Swal.fire(
                'Unachievable!',
                'You need to select 1 row to edit!',
                'warning'
            )
        }

    });
});