$(document).ready(function() {
    createCity();
});

function createCity() {
    $(document).on('click', '#addCity', function() {
        var params = {
            city: $('#city').val()
        };
        $.ajax({
            url: '/admin/city/add-ajax',
            method: 'post',
            data: {params},
            success: function(data) {
                if (data.success == true) {
                    $('#addprojectform-city').html(data.value);
                    $('#successCityMessage').html('Город успешно добавлен в список');
                }
            }
        });
    });
}