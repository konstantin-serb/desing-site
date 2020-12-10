$(document).ready(function () {
    createContract();
});

function createContract() {
    $(document).on('click', '#addTempContract', function () {
        var params = {
            projectId: $('#addTempContract').attr('data-id'),
            templateId: $('#addfromtemplatecontractform-templateid').val(),
            contractDate: $('#addfromtemplatecontractform-datecontract').val(),
            projectStartDate: $('#addfromtemplatecontractform-datestart').val(),
            customer: $('#addfromtemplatecontractform-customer').val(),
            address: $('#addfromtemplatecontractform-address').val(),
            priceWords: $('#addfromtemplatecontractform-pricewords').val(),
            currency: $('#addfromtemplatecontractform-currency').val(),
            customerInfo: $('#addfromtemplatecontractform-customerinfo').val()
        };

        $.ajax({
            url: '/admin/project/add-contract-from-template-ajax',
            method: 'post',
            data: params,
            success: function (data) {
                console.log(data);
                $('#successContractMessage').html(data.result);
                $('#contractsView').html(data.code);
            }
        });
    });
}