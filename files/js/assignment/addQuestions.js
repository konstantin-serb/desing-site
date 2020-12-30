$(document).ready(function() {
    addQustions();
    addCharacteristics();
    available();
});

function addQustions() {
    $(document).on('click', '#createQuestions', function () {
        var params = {
            templateId: $('#adminaddquestionsform-questiontemplateid').val(),
            projectId: $('#createQuestions').attr('data-id')
        };

        $.ajax({
            url: '/admin/question/create-questions-for-project-ajax',
            method: 'post',
            data: params,
            success: function(data) {
                $('#blockAssignment').html(data.value);
            }
        });
    });
}

function addCharacteristics() {
    $(document).on('click', '#createCharacteristics', function () {
        var params = {
            templateId: $('#adminaddcharacteristicsform-characteristictemplateid').val(),
            projectId: $('#createCharacteristics').attr('data-id')
        };

        $.ajax({
            url: '/admin/question/create-characteristics-for-project-ajax',
            method: 'post',
            data: params,
            success: function(data) {
                $('#blockAssignment').html(data.value);
            }
        });
    });
}

function available()
{
    $(document).on('click', '#clientAvailable', function() {
        var params = {
            projectId: $('#clientAvailable').attr('data-id')
        };
        $.ajax({
            url: '/admin/project/add-available-ajax',
            method: 'post',
            data: params,
            success: function(data) {
                if(data.success == true) {
                    $('#availableButton').html(data.content);
                }
            }
        });
    });
}