$(document).ready(function() {
    createQuestion();
});

function createQuestion()
{
    $(document).on('click', '#addQuestion', function() {
        var params = {
            question: $('#editcharacteristicsform-question').val(),
            description: $('#editcharacteristicsform-description').val(),
            projectId: $('#addQuestion').attr('data-id')
        };
        $.ajax({
            url: '/admin/project/create-questions-ajax',
            method: 'post',
            data: params,
            success: function(data) {
                $('#divQuestions').html(data.value);
                $('#editcharacteristicsform-question').val('');
                $('#editcharacteristicsform-description').val('');
            }
        });
    })
}