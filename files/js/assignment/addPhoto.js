$(function() {
    $('#image').change(function() {
        $('newPhoto').html("<img src='/files/img/ajax-loader.gif' style='width: 50px; display: block; margin: 1em auto;'>");

        $("#form").ajaxForm({

            success: function(data) {
                $('#newReference').html(data.image);
                $('#addComment').html(data.commentForm);
            }
        }).submit();

    });
});

$(function() {
    $('#imageWall').change(function() {
        $('newPhoto').html("<img src='/files/img/ajax-loader.gif' style='width: 50px; display: block; margin: 1em auto;'>");

        $("#formWall").ajaxForm({

            success: function(data) {
                $('#newReferenceWall').html(data.imageWall);
                $('#addCommentWall').html(data.commentForm);
            }
        }).submit();

    });
});

$(function() {
    $('#imageFloor').change(function() {
        $('newPhoto').html("<img src='/files/img/ajax-loader.gif' style='width: 50px; display: block; margin: 1em auto;'>");

        $("#formFloor").ajaxForm({

            success: function(data) {
                $('#newReferenceFloor').html(data.imageFloor);
                $('#addCommentFloor').html(data.commentForm);
            }
        }).submit();

    });
});

