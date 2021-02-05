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

$(function() {
    $('#imageFurniture').change(function() {
        $('newPhoto').html("<img src='/files/img/ajax-loader.gif' style='width: 50px; display: block; margin: 1em auto;'>");

        $("#formFurniture").ajaxForm({

            success: function(data) {
                $('#newReferenceFurniture').html(data.imageFurniture);
                $('#addCommentFurniture').html(data.commentForm);
            }
        }).submit();

    });
});

$(function() {
    $('#imageKitchen').change(function() {
        $('newPhoto').html("<img src='/files/img/ajax-loader.gif' style='width: 50px; display: block; margin: 1em auto;'>");

        $("#formKitchen").ajaxForm({

            success: function(data) {
                $('#newReferenceKitchen').html(data.imageKitchen);
                $('#addCommentKitchen').html(data.commentForm);
            }
        }).submit();

    });
});

$(function() {
    $('#imageBathroom').change(function() {
        $('newPhoto').html("<img src='/files/img/ajax-loader.gif' style='width: 50px; display: block; margin: 1em auto;'>");

        $("#formBathroom").ajaxForm({

            success: function(data) {
                $('#newReferenceBathroom').html(data.imageBathroom);
                $('#addCommentBathroom').html(data.commentForm);
            }
        }).submit();

    });
});

$(function() {
    $('#imageRooms').change(function() {
        $('newPhoto').html("<img src='/files/img/ajax-loader.gif' style='width: 50px; display: block; margin: 1em auto;'>");

        $("#formRooms").ajaxForm({

            success: function(data) {
                $('#newReferenceRooms').html(data.imageRooms);
                $('#addCommentRooms').html(data.commentForm);
            }
        }).submit();

    });
});


$(function() {
    $('#imageChild').change(function() {
        $('newPhoto').html("<img src='/files/img/ajax-loader.gif' style='width: 50px; display: block; margin: 1em auto;'>");

        $("#formChild").ajaxForm({

            success: function(data) {
                $('#newReferenceChild').html(data.imageChild);
                $('#addCommentChild').html(data.commentForm);
            }
        }).submit();

    });
});


$(function() {
    $('#imageLiving').change(function() {
        $('newPhoto').html("<img src='/files/img/ajax-loader.gif' style='width: 50px; display: block; margin: 1em auto;'>");

        $("#formLiving").ajaxForm({

            success: function(data) {
                $('#newReferenceLiving').html(data.imageLiving);
                $('#addCommentLiving').html(data.commentForm);
            }
        }).submit();

    });
});

$(function() {
    $('#imageDoor').change(function() {
        $('newPhoto').html("<img src='/files/img/ajax-loader.gif' style='width: 50px; display: block; margin: 1em auto;'>");

        $("#formDoor").ajaxForm({

            success: function(data) {
                $('#newReferenceDoor').html(data.imageDoor);
                $('#addCommentDoor').html(data.commentForm);
            }
        }).submit();

    });
});

$(function() {
    $('#imageDecor').change(function() {
        $('newPhoto').html("<img src='/files/img/ajax-loader.gif' style='width: 50px; display: block; margin: 1em auto;'>");

        $("#formDecor").ajaxForm({

            success: function(data) {
                $('#newReferenceDecor').html(data.imageDecor);
                $('#addCommentDecor').html(data.commentForm);
            }
        }).submit();

    });
});

