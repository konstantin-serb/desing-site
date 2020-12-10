$(document).ready(function() {
    createCurrency();
});

function createCurrency() {
    $(document).on('click', '#addCurrency', function() {
        var params = {
            currency: $('#currency').val()
        };
        $.ajax({
            url: '/admin/currency/add-ajax',
            method: 'post',
            data: {params},
            success: function(data) {
                if (data.success == true) {
                    $('#addprojectform-currency').html(data.value);
                    $('#successCurrencyMessage').html('Валюта успешно добавлена в список');
                }
            }
        });
    });
}