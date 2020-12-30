$(document).ready(function() {
    createQuestion();
});

function createQuestion()
{
    $(document).on('click', '#addQuestion', function() {
        var params = {
            question: $('#createmainquestionform-question').val(),
            description: $('#createmainquestionform-description').val(),
            templateId: $('#addQuestion').attr('data-id')
        };
        $.ajax({
            url: '/admin/question/create-characteristic-ajax',
            method: 'post',
            data: params,
            success: function(data) {
                $('#divQuestions').html(data.value);
                $('#createmainquestionform-question').val('');
                $('#createmainquestionform-description').val('');
            }
        });
    })
}