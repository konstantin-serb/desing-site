$(document).ready(function(){
    addStage();
});

function addStage() {
    $(document).on('click', '#addStage', function() {
        var params = {
            number: $('#number').val(),
            title: $('#titleName').val(),
            date: $('#addstageform-date').val(),
            length: $('#length').val(),
            projectId: $('#number').attr('data-id')
        };

        $.ajax({
            url: '/admin/stage/add-stage-ajax',
            method: 'post',
            data: params,
            success: function(data) {
                if(data.number) {
                    $('#number-error').html(data.number[0]);
                } else {$('#number-error').html('');}

                if(data.title) {
                    $('#title-error').html(data.title[0]);
                } else {$('#title-error').html('');}

                if(data.date) {
                    $('#date-error').html(data.date[0]);
                } else {$('#date-error').html('');}

                if (data.success==true) {
                    $('#successMessageStage').html(data.message);
                    $('#stagesView').html(data.value);

                } else {
                    $('#successMessageStage').html('');
                }
            }
        });
    });
}

