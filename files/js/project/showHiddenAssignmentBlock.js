$(document).ready(function() {
    showAssignmentBlock();
    hiddenAssignmentBlock();
});


function hiddenAssignmentBlock() {
    $(document).on('click', '#showAssignmentBlock', function() {

        $('#assignmentBlock').removeClass('hiddenInputs');

    });
}


function showAssignmentBlock() {
    $(document).on('click', '.hiddenAssignmentBlock', function() {

        $('#assignmentBlock').addClass('hiddenInputs');
    });
}




