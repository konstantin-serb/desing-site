$(document).ready(function() {
    $("a").bind("click", function(){
        var i = ($(this).attr("data-id"));
        $(document).on('click', '#addAnswer-'+i, function () {
            var params = {
                answer: $('#uniqueID-'+i).val(),
                questionId: $('#addAnswer-'+i).attr('data-id')
            };

            $.ajax({
                url: '/customer/assignment/add-answer-ajax',
                method: 'post',
                data: params,
                success: function (data) {
                    if (data.success == true) {
                        $('#uniqueID-'+i).val(data.content);
                        $('#addAnswer-'+i).html(data.button);
                        $('#checkAnswer-'+i).html(data.ok);
                        $('#date-time-'+i).html(data.createUpdate);

                        if(data.checkAnswer == true) {
                            $('#oneItem-'+i).addClass('green-fill');
                        } else {
                            $('#oneItem-'+i).removeClass('green-fill');
                        }
                    }
                }
            });
        });
    });

});