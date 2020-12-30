$(document).ready(function() {
    addComment();
    addCommentWall();
    addCommentFloor();
    showCustomization();
    hiddenCustomization();
    hiddenReferenceWall();
    showReferenceWall();
    hiddenReferenceFloor();
    showReferenceFloor();

});

function addComment() {
    $(document).on('click', '#addReference', function() {
        var params = {
            referenceId: $('#addcomment-referenceid').val(),
            comment: $('#addcomment-comment').val()
        };
        $.ajax({
            url: '/customer/assignment/add-comment-ajax',
            method: 'post',
            data: params,
            success: function(data) {
                $('#referenceBlock').html(data.references);
                $('#referenceView').addClass('hiddenInputs');
                $('#newReference').html('');
                $('#addComment').html('');
                $('#image').val('');
            }
        });
    });
}

function addCommentWall() {
    $(document).on('click', '#addReferenceWall', function() {
        var params = {
            referenceId: $('#addwallcomment-referenceid').val(),
            comment: $('#addwallcomment-comment').val()
        };
        $.ajax({
            url: '/customer/assignment/add-comment-ajax',
            method: 'post',
            data: params,
            success: function(data) {
                $('#referenceBlockWall').html(data.referencesWall);
                $('#referenceWall').addClass('hiddenInputs');
                $('#newReferenceWall').html('');
                $('#addCommentWall').html('');
                $('#imageWall').val('');
            }
        });
    });
}

function addCommentFloor() {
    $(document).on('click', '#addReferenceFloor', function() {
        var params = {
            referenceId: $('#addfloorcomment-referenceid').val(),
            comment: $('#addfloorcomment-comment').val()
        };
        $.ajax({
            url: '/customer/assignment/add-comment-ajax',
            method: 'post',
            data: params,
            success: function(data) {
                $('#referenceBlockFloor').html(data.referencesFloor);
                $('#referenceFloor').addClass('hiddenInputs');
                $('#newReferenceFloor').html('');
                $('#addCommentFloor').html('');
                $('#imageFloor').val('');
            }
        });
    });
}

function hiddenCustomization() {
    $(document).on('click', '#hiddenCustomization', function() {
        $('#referenceView').addClass('hiddenInputs');
        $('#newReference').html('');
        $('#addComment').html('');
        $('#image').val('');
    });
}


function showCustomization() {
    $(document).on('click', '#showCustomization', function() {
        $('#referenceView').removeClass('hiddenInputs');
    });
}


function hiddenReferenceWall() {
    $(document).on('click', '#showAddWallReference', function() {
        $('#referenceWall').addClass('hiddenInputs');
        $('#newReferenceWall').html('');
        $('#addComment').html('');
        $('#image').val('');
    });
}


function showReferenceWall() {
    $(document).on('click', '#showAddWallReference', function() {
        $('#referenceWall').removeClass('hiddenInputs');
    });
}


function hiddenReferenceFloor() {
    $(document).on('click', '#showAddFloorReference', function() {
        $('#referenceFloor').addClass('hiddenInputs');
        $('#newReferenceFloor').html('');
        $('#addComment').html('');
        $('#imageFloor').val('');
    });
}


function showReferenceFloor() {
    $(document).on('click', '#showAddFloorReference', function() {
        $('#referenceFloor').removeClass('hiddenInputs');
    });
}


