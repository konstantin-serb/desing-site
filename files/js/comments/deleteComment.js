let buttonDelete = document.querySelectorAll('.deleteButton');
for (let i = 0; i < buttonDelete.length; i++) {
    buttonDelete[i].onclick = function (event) {
        event.preventDefault();
        let value = {
            id : buttonDelete[i].dataset.id,
            type : buttonDelete[i].dataset.type,
            projectId : buttonDelete[i].dataset.project
        };
        // console.log(value);
        $.ajax({
            url: 'delete-comment-ajax',
            method: 'post',
            data: value,
            success: function (data) {
                if(data == true) {
                    location.reload();
                    return false;
                }
            }
        });
    }
}
