$(document).ready(function() {
    updateComment();
    showCustomization();
    hiddenCustomization();
});

function updateComment() {
    $(document).on('click', '#updateReference', function() {
        var params = {
            referenceId: $('#updatecomment-referenceid').val(),
            comment: $('#updatecomment-comment').val(),
            sort: $('#updatecomment-sort').val()
        };
        $.ajax({
            url: '/customer/assignment/update-comment-ajax',
            method: 'post',
            data: params,
            success: function(data) {
                $('#referenceView').addClass('hiddenInputs');
                $('#descriptionText').html(data.comment);
                $('#modalText').html(data.comment);
                $('#buttonCustomization').removeClass('hiddenInputs');
            }
        });
    });
}

function hiddenCustomization() {
    $(document).on('click', '#hiddenCustomization', function() {
        $('#referenceView').addClass('hiddenInputs');
        $('#buttonCustomization').removeClass('hiddenInputs');

    });
}


function showCustomization() {
    $(document).on('click', '#showCustomization', function() {
        $('#referenceView').removeClass('hiddenInputs');
        $('#buttonCustomization').addClass('hiddenInputs');
    });
}




