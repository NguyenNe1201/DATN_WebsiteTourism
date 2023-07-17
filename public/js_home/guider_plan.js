$('#guider_calender_modal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var guiderId = button.data('guiderid');
    // $('#guider_id').val(guiderId);
    $.ajax({
        type: "GET",
        url: "/get_sign_guider_data",
        data: {
            guiderid: guiderId
        },
        success: function(response) {
            var tableBody = '';
            if (response.length > 0) {
                $.each(response, function(index, item) {
                    var startDate = new Date(item.start_date);
                    var endDate = new Date(item.end_date);
                    var formattedStartDate = startDate.toLocaleDateString('vi-VN', { day: '2-digit', month: '2-digit', year: 'numeric' });
                    var formattedEndDate = endDate.toLocaleDateString('vi-VN', { day: '2-digit', month: '2-digit', year: 'numeric' });
                    tableBody += '<tr>' +
                        '<td class="text-center">' + (index + 1) + '</td>' +
                        '<td class="text-center"><b>' + formattedStartDate + ' - ' + formattedEndDate + '</b></td>' +
                        '<td class="text-center"><span class="guider-status bg-success">Đã Được Book</span></td>' +
                        '</tr>';
                });
            } else {
                tableBody =
                    '<tr><td colspan="3" class="text-center">Chưa có lịch book</td></tr>';
            }
            $('#guider_calendar_table').html('<table class="table table-striped table-hover">' +
                '<thead><tr>' +
                '<th class="text-center">STT</th>' +
                '<th class="text-center">Ngày Book</th>' +
                '<th class="text-center">Trạng Thái</th>' +
                '</tr></thead>' +
                '<tbody>' + tableBody + '</tbody></table>');
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
});