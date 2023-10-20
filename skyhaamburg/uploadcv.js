$(document).ready(function () {

    $('#submit').on('click', function () {

        var file = $('#file');
        var file_length = file[0].files.length;
        var file_data = file.prop('files')[0];

        var formData = new FormData();
        formData.append('file', file_data);


        $.ajax({
            url: "uploaddb.php",
            type: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                alert(data)
            }
        });
    });
});