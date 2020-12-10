$(function() {
    $('#image').change(function() {
        $('newPhoto').html("<img src='/files/img/ajax-loader.gif' style='width: 50px; display: block; margin: 1em auto;'>");

        $("#form").ajaxForm({

            success: function(data) {
                $('.newPhoto').html(data.image);
            }
        }).submit();

    });
});

