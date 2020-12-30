$(document).ready(function () {
    contract();
});

function contract() {
    $(document).on('click', '#addContractContract', function () {
        var params = {
            projectId: $('#addContractContract').attr('data-id'),
            contractId: $('#addfromcontractcontractform-contractid').val(),
            contractDate: $('#addfromtemplatecontractform-datecontract').val(),
            projectStartDate: $('#addfromtemplatecontractform-datestart').val(),
            customer: $('#addfromtemplatecontractform-customer').val(),
            address: $('#addfromtemplatecontractform-address').val(),
            priceWords: $('#addfromtemplatecontractform-pricewords').val(),
            currency: $('#addfromtemplatecontractform-currency').val(),
            customerInfo: $('#addfromtemplatecontractform-customerinfo').val()
        };

        $.ajax({
            url: '/admin/project/add-contract-from-contract-ajax',
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