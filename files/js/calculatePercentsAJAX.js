$(document).ready(function(){
    calculate();
});

function calculate() {
    $(document).on('click', '#calculate', function() {
        var params = {
            price: $('#addprojectform-pricedigital').val(),
            volume1: $('#addprojectform-pricepart1').val(),
            volume2: $('#addprojectform-pricepart2').val(),
            volume3: $('#addprojectform-pricepart3').val(),
            volume4: $('#addprojectform-pricepart4').val(),
            volume5: $('#addprojectform-pricepart5').val()
        };

        $.ajax({
            url:'/admin/project/calculate-ajax',
            method: 'post',
            data: params,
            success: function(data) {
                if (data.success == true) {
                    $('#count1').html(data.result1);
                    $('#count2').html(data.result2);
                    $('#count3').html(data.result3);
                    $('#count4').html(data.result4);
                    $('#count5').html(data.result5);

                    $('#addprojectform-pricepart1').val(data.path1);
                    $('#addprojectform-pricepart2').val(data.path2);
                    $('#addprojectform-pricepart3').val(data.path3);
                    $('#addprojectform-pricepart4').val(data.path4);
                    $('#addprojectform-pricepart5').val(data.path5);
                }
            }
        });
        console.log(params);
    });
}