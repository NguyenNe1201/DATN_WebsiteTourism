$(document).ready(function () {
    $('#timkiem_blog').keyup(function () {
        $('#result_li').html('');
        var search = $('#timkiem_blog').val();
        if (search != '') {
            //  $('#result').css('display','inherit');
            var expression = new RegExp(search, "i");
            $.getJSON('/json_file/blog.json', function (data) {
                $.each(data, function (key, value) {
                    if (value.title.search(expression) != -1 || value.cate_blog.dm_blog_name.search(expression) != -1) {
                        $('#result_li').append('<li class="list-group-item" style="cursor:pointer;display: flex;"><img style="margin-right: 10px;"  src="' + value.img_title + '" height="40" width="40">'+value.title+' | <span  style="display: contents;">'+value.cate_blog.dm_blog_name+'</span></li>');
                    }
                    // else{
                    //      $('#result').css('display','none');
                    //  }
                });
            })
        }
    });
    $('#result_li').on('click','li',function(){
        var click_text = $(this).text().split('|');
        $('#timkiem_blog').val($.trim(click_text[0]));
        $('#result_li').html('');
        // $('#result').css('display','none');
    });
});