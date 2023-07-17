$(function(e) {
    var table;
    $(document).ready(function() {
        table = $('#table_gallery').DataTable({
            "pageLength": 10,
            "lengthMenu": [
                [5, 10, 15, -1],
                [5, 10, 15, "All"]
            ],
        });
        //delete gallery = checkbox
        $("#checkbox_gallery_tour").click(function() {
            $(".checkbox_gal_id").prop('checked', $(this).prop('checked'));
        });
        $("#deleteCheckbox_gal").click(function(e) {
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
                        $("input:checkbox[name=id]:checked").each(function() {
                            allid.push($(this).val());
                        });
                        $.ajax({
                            url: "/admin/list_gallery_tour/delete-gallery-tour",
                            type: "DELETE",
                            data: {
                                _token: $("input[name=_token]").val(),
                                id: allid,
                            },
                            success: function(response) {
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
    });
    // push notify delete gallery of tour
    $('.delete-gallery').on('click', function() {
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
// ---------------------------------- Add Gallery of tour -------------------------------------------
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function() {
    $('#file_gallery').change(function() {
        var error = '';
        var files = $('#file_gallery')[0].files;
        if (files.length > 10) {
            error += '<p>Bạn chỉ chọn tối đa 10 ảnh</p>';
        } else if (files.length == '') {
            error += '<p>Không được bỏ trống</p>';
        } else if (files.size > 2000000) {
            error += '<p>File ảnh không được lớn hơn 2MB</p>';
        }
        if (error == '') {} else {
            $('#file_gallery').val('');
            $('#error_gallery').html('<span class="text-danger">' + error + '</span>');
            return false;
        }
    });
});