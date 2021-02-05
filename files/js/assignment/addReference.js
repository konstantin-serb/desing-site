$(document).ready(function() {
    addComment();
    addCommentWall();
    addCommentFloor();
    addCommentFurniture();
    addCommentKitchen();
    addCommentBathroom();
    addCommentRooms();
    addCommentChild();
    addCommentLiving();
    addCommentDoor();
    addCommentDecor();
    showCustomization();
    hiddenCustomization();
    hiddenReferenceWall();
    showReferenceWall();
    hiddenReferenceFloor();
    showReferenceFloor();
    hiddenReferenceFurniture();
    showReferenceFurniture();
    hiddenReferenceKitchen();
    showReferenceKitchen();
    hiddenReferenceBathroom();
    showReferenceBathroom();
    hiddenReferenceRooms();
    showReferenceRooms();
    hiddenReferenceChild();
    showReferenceChild();
    hiddenReferenceLiving();
    showReferenceLiving();
    hiddenReferenceDoor();
    showReferenceDoor();
    hiddenReferenceDecor();
    showReferenceDecor();

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

function addCommentFurniture() {
    $(document).on('click', '#addReferenceFurniture', function() {
        var params = {
            referenceId: $('#addfurniturecomment-referenceid').val(),
            comment: $('#addfurniturecomment-comment').val()
        };
        $.ajax({
            url: '/customer/assignment/add-comment-ajax',
            method: 'post',
            data: params,
            success: function(data) {
                $('#referenceBlockFurniture').html(data.referencesFurniture);
                $('#referenceFurniture').addClass('hiddenInputs');
                $('#newReferenceFurniture').html('');
                $('#addCommentFurniture').html('');
                $('#imageFurniture').val('');
            }
        });
    });
}


function addCommentKitchen() {
    $(document).on('click', '#addReferenceKitchen', function() {
        var params = {
            referenceId: $('#addkitchencomment-referenceid').val(),
            comment: $('#addkitchencomment-comment').val()
        };
        $.ajax({
            url: '/customer/assignment/add-comment-ajax',
            method: 'post',
            data: params,
            success: function(data) {
                $('#referenceBlockKitchen').html(data.referencesKitchen);
                $('#referenceKitchen').addClass('hiddenInputs');
                $('#newReferenceKitchen').html('');
                $('#addCommentKitchen').html('');
                $('#imageKitchen').val('');
            }
        });
    });
}

function addCommentBathroom() {
    $(document).on('click', '#addReferenceBathroom', function() {
        var params = {
            referenceId: $('#addbathroomcomment-referenceid').val(),
            comment: $('#addbathroomcomment-comment').val()
        };
        $.ajax({
            url: '/customer/assignment/add-comment-ajax',
            method: 'post',
            data: params,
            success: function(data) {
                $('#referenceBlockBathroom').html(data.referencesBathroom);
                $('#referenceBathroom').addClass('hiddenInputs');
                $('#newReferenceBathroom').html('');
                $('#addCommentBathroom').html('');
                $('#imageBathroom').val('');
            }
        });
    });
}

function addCommentRooms() {
    $(document).on('click', '#addReferenceRooms', function() {
        var params = {
            referenceId: $('#addroomscomment-referenceid').val(),
            comment: $('#addroomscomment-comment').val()
        };
        $.ajax({
            url: '/customer/assignment/add-comment-ajax',
            method: 'post',
            data: params,
            success: function(data) {
                $('#referenceBlockRooms').html(data.referencesRooms);
                $('#referenceRooms').addClass('hiddenInputs');
                $('#newReferenceRooms').html('');
                $('#addCommentRooms').html('');
                $('#imageRooms').val('');
            }
        });
    });
}

function addCommentChild() {
    $(document).on('click', '#addReferenceChild', function() {
        var params = {
            referenceId: $('#addchildcomment-referenceid').val(),
            comment: $('#addchildcomment-comment').val()
        };
        $.ajax({
            url: '/customer/assignment/add-comment-ajax',
            method: 'post',
            data: params,
            success: function(data) {
                $('#referenceBlockChild').html(data.referencesChild);
                $('#referenceChild').addClass('hiddenInputs');
                $('#newReferenceChild').html('');
                $('#addCommentChild').html('');
                $('#imageChild').val('');
            }
        });
    });
}

function addCommentLiving() {
    $(document).on('click', '#addReferenceLiving', function() {
        var params = {
            referenceId: $('#addlivingcomment-referenceid').val(),
            comment: $('#addlivingcomment-comment').val()
        };
        $.ajax({
            url: '/customer/assignment/add-comment-ajax',
            method: 'post',
            data: params,
            success: function(data) {
                $('#referenceBlockLiving').html(data.referencesLiving);
                $('#referenceLiving').addClass('hiddenInputs');
                $('#newReferenceLiving').html('');
                $('#addCommentLiving').html('');
                $('#imageLiving').val('');
            }
        });
    });
}

function addCommentDoor() {
    $(document).on('click', '#addReferenceDoor', function() {
        var params = {
            referenceId: $('#adddoorcomment-referenceid').val(),
            comment: $('#adddoorcomment-comment').val()
        };
        $.ajax({
            url: '/customer/assignment/add-comment-ajax',
            method: 'post',
            data: params,
            success: function(data) {
                $('#referenceBlockDoor').html(data.referencesDoor);
                $('#referenceDoor').addClass('hiddenInputs');
                $('#newReferenceDoor').html('');
                $('#addCommentDoor').html('');
                $('#imageDoor').val('');
            }
        });
    });
}

function addCommentDecor() {
    $(document).on('click', '#addReferenceDecor', function() {
        var params = {
            referenceId: $('#adddecorcomment-referenceid').val(),
            comment: $('#adddecorcomment-comment').val()
        };
        $.ajax({
            url: '/customer/assignment/add-comment-ajax',
            method: 'post',
            data: params,
            success: function(data) {
                $('#referenceBlockDecor').html(data.referencesDecor);
                $('#referenceDecor').addClass('hiddenInputs');
                $('#newReferenceDecor').html('');
                $('#addCommentDecor').html('');
                $('#imageDecor').val('');
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

function hiddenReferenceFurniture() {
    $(document).on('click', '#showAddFurnitureReference', function() {
        $('#referenceFurniture').addClass('hiddenInputs');
        $('#newReferenceFurniture').html('');
        $('#addComment').html('');
        $('#imageFurniture').val('');
    });
}


function showReferenceFurniture() {
    $(document).on('click', '#showAddFurnitureReference', function() {
        $('#referenceFurniture').removeClass('hiddenInputs');
    });
}

function hiddenReferenceKitchen() {
    $(document).on('click', '#showAddKitchenReference', function() {
        $('#referenceKitchen').addClass('hiddenInputs');
        $('#newReferenceKitchen').html('');
        $('#addComment').html('');
        $('#imageKitchen').val('');
    });
}


function showReferenceKitchen() {
    $(document).on('click', '#showAddKitchenReference', function() {
        $('#referenceKitchen').removeClass('hiddenInputs');
    });
}

function hiddenReferenceBathroom() {
    $(document).on('click', '#showAddBathroomReference', function() {
        $('#referenceBathroom').addClass('hiddenInputs');
        $('#newReferenceBathroom').html('');
        $('#addComment').html('');
        $('#imageBathroom').val('');
    });
}


function showReferenceBathroom() {
    $(document).on('click', '#showAddBathroomReference', function() {
        $('#referenceBathroom').removeClass('hiddenInputs');
    });
}

function hiddenReferenceRooms() {
    $(document).on('click', '#showAddRoomsReference', function() {
        $('#referenceRooms').addClass('hiddenInputs');
        $('#newReferenceRooms').html('');
        $('#addComment').html('');
        $('#imageRooms').val('');
    });
}


function showReferenceRooms() {
    $(document).on('click', '#showAddRoomsReference', function() {
        $('#referenceRooms').removeClass('hiddenInputs');
    });
}

function hiddenReferenceChild() {
    $(document).on('click', '#showAddChildReference', function() {
        $('#referenceChild').addClass('hiddenInputs');
        $('#newReferenceChild').html('');
        $('#addComment').html('');
        $('#imageChild').val('');
    });
}


function showReferenceChild() {
    $(document).on('click', '#showAddChildReference', function() {
        $('#referenceChild').removeClass('hiddenInputs');
    });
}

function hiddenReferenceLiving() {
    $(document).on('click', '#showAddLivingReference', function() {
        $('#referenceLiving').addClass('hiddenInputs');
        $('#newReferenceLiving').html('');
        $('#addComment').html('');
        $('#imageLiving').val('');
    });
}


function showReferenceLiving() {
    $(document).on('click', '#showAddLivingReference', function() {
        $('#referenceLiving').removeClass('hiddenInputs');
    });
}

function hiddenReferenceDoor() {
    $(document).on('click', '#showAddDoorReference', function() {
        $('#referenceDoor').addClass('hiddenInputs');
        $('#newReferenceDoor').html('');
        $('#addComment').html('');
        $('#imageDoor').val('');
    });
}


function showReferenceDoor() {
    $(document).on('click', '#showAddDoorReference', function() {
        $('#referenceDoor').removeClass('hiddenInputs');
    });
}

function hiddenReferenceDecor() {
    $(document).on('click', '#showAddDecorReference', function() {
        $('#referenceDecor').addClass('hiddenInputs');
        $('#newReferenceDecor').html('');
        $('#addComment').html('');
        $('#imageDecor').val('');
    });
}


function showReferenceDecor() {
    $(document).on('click', '#showAddDecorReference', function() {
        $('#referenceDecor').removeClass('hiddenInputs');
    });
}






