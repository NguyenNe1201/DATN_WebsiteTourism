$(document).ready(function () {

    $('#timkiem').keyup(function () {
        $('#result').html('');
        var search = $('#timkiem').val();
        if (search != '') {
            //  $('#result').css('display','inherit');
            var expression = new RegExp(search, "i");
            $.getJSON('/json_file/tour.json', function (data) {
                $.each(data, function (key, value) {
                    if (value.tourname.search(expression) != -1 || value.cate_location.location_name.search(expression) != -1) {
                        $('#result').append('<li class="list-group-item" style="cursor:pointer;display: flex;"><img style="margin-right: 10px;"  src="' + value.img_lgtour + '" height="40" width="40">'+value.tourname+' | <span  style="display: contents;">'+value.cate_location.location_name+'</span></li>');
                    }
                    // else{
                    //      $('#result').css('display','none');
                    //  }
                });
            })
        }
    });
    $('#result').on('click','li',function(){
        var click_text = $(this).text().split('|');
        $('#timkiem').val($.trim(click_text[0]));
        $('#result').html('');
        // $('#result').css('display','none');
    });
});