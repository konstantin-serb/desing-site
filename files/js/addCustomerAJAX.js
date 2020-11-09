$(document).ready(function() {
    createCustomer();
});

function createCustomer() {
    $(document).on('click', '#addCustomer', function() {
        var params = {
            surname: $('#customer-surname').val(),
            name: $('#customer-name').val(),
            lastName: $('#customer-lastName').val()
        };
        $.ajax({
            url: '/admin/client/add-ajax',
            method: 'post',
            data: {params},
            success: function(data) {
                if (data.success == true) {
                    $('#addprojectform-customer').html(data.value);
                    $('#successMessage').html('Заказчик успешно добавлен в список');
                }
            }
        });
    });
}