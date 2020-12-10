$(document).ready(function() {
    createCity();
    changeCity();
});

function createCity() {
    $(document).on('click', '#addCity', function() {
        var params = {
            city: $('#addprojectform-addcity').val()
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


function changeCity() {
    $(document).on('click', '#updateCity', function() {
        var params = {
            city: $('#addprojectform-city').val(),
            projectId: $('#updateCity').attr('data-id')
        };

        $.ajax({
            url: '/admin/project/change-city-ajax',
            method: 'post',
            data: params,
            success: function(data) {

                $('#cityName').html(data.city);
            }
        });
    })
}