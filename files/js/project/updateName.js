$(document).ready(function() {
    updateName();
    updateCustomer();
    hiddenZone();
    closeValut();
    updateMoney();
    hiddenContracts();
    closeContracts();
});

function closeValut() {
    $(document).on('click', '#closeValut', function() {
        $('#hiddenValut').addClass('hiddenInputs');
    });
}


function hiddenZone() {
    $(document).on('click', '#valutButton', function() {
        $('#hiddenValut').removeClass('hiddenInputs');
    });
}

function closeContracts() {
    $(document).on('click', '#closeContracts', function() {
        $('#hiddenContracts').addClass('hiddenInputs');
    });
}


function hiddenContracts() {
    $(document).on('click', '#contracts', function() {
        $('#hiddenContracts').removeClass('hiddenInputs');
    });
}


function updateName() {
    $(document).on('click', '#updateName', function() {
        var params = {
            ident: $('#addprojectform-projectid').val(),
            title: $('#addprojectform-nameproject').val(),
            projectId: $('#updateName').attr('data-id')
        };

        $.ajax({
            url: '/admin/project/update-name-ajax',
            method: 'post',
            data: params,
            success: function(data) {
                if (data.success == true) {
                    $('#projectId').html(data.projectId);
                    $('#title').html(data.title);
                    $('#successNameMessage').html(data.message);
                }
            }
        });
    });
}

function updateMoney()
{
    $(document).on('click', '#updateMoney', function() {
        var params = {
            projectId: $('#updateMoney').attr('data-id'),
            sum: $('#addprojectform-pricedigital').val(),
            words: $('#addprojectform-pricewords').val(),
            currency: $('#addprojectform-currency').val(),
            path1: $('#addprojectform-pricepart1').val(),
            path2: $('#addprojectform-pricepart2').val(),
            path3: $('#addprojectform-pricepart3').val(),
            path4: $('#addprojectform-pricepart4').val(),
            path5: $('#addprojectform-pricepart5').val()
        };
        $.ajax({
            url: '/admin/project/update-money-ajax',
            method: 'post',
            data: params,
            success: function(data) {
                if (data.success == true) {
                    $('#resultDigital').html(data.sum);
                    $('#resultWords').html(data.words);
                    $('.resultCurrency').html(data.currency);
                    $('#stringPrice').html(data.stringPrice);
                    $('#depositContent').html(data.deposit);
                    $('#hiddenValut').addClass('hiddenInputs');
                }
            }
        });
    });
}

function updateCustomer()
{
    $(document).on('click', '#updateCustomer', function() {
        var params = {
            date: $('#addprojectform-datestart').val(),
            length: $('#addprojectform-length').val(),
            area: $('#addprojectform-area').val(),
            customer: $('#addprojectform-customer').val(),
            projectId: $('#updateCustomer').attr('data-id')
        };
        $.ajax({
            url: '/admin/project/update-customer-ajax',
            method: 'post',
            data: params,
            success: function(data) {
                if (data.success==true) {
                    $('#customerName').html(data.customer);
                    $('#date_start').html(data.date);
                    $('#project_length').html(data.length);
                    $('#project_area').html(data.area);
                    $('#successCustomerMessage').html(data.message);
                }
            }
        });
    });
}