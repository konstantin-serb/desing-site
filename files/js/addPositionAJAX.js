$(document).ready(function () {
    createPosition();
});

function createPosition() {
    $(document).on('click', '#addPosition', function() {
        var params = {
            position: $('#addpositionform-position').val()
        };

    $.ajax({
        url:'/admin/staff/position-ajax',
        method: 'post',
        data: {params},
        success:function (data) {
            if (data.success == true) {
                $('#signupemployeeform-position').html(data.value);
                $('#successMessage').html('<p>Должность успешно добавлена в список</p>');
            }

        }
    });

    })
}