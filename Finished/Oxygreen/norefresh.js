$(document).ready(function () {
    $("#submit").click(function () {


        //alert("Came here");

        //This is used for disabling the button after entering into this form
        //$(this).attr('disabled', 'disabled');


        var name = $('#name').val();
        var email = $('#email').val();
        var address = $('#address').val();
        var number = $('#number').val();
        var subject = $('#subject').val();
        var message = $('#message').val();

        //alert(name, email, address, number, subject, message);

        if (name == '' || email == '' || address == '' || number == '' || subject == '') {
            alert("Fill All the Mandatory Fields");
        }

        else {

            $.post("sentmail.php", {

                name1: name,
                email1: email,
                number1: number,
                address1: address,
                subject1: subject,
                message1: message

            }, function (data) {

                var btn = document.getElementById("submit");
                btn.disabled = false; //Enabling Button

                alert(data);
                $('#form')[0].reset(); // To reset form fields
            });

        }



    });
});