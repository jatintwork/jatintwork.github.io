$(document).ready(function () {
    $("#submit").click(function () {

        var urls = window.location.href
        var urls = urls.substr(29)
        //alert(urls);





        //apply page
        if (urls == 'apply.html') {

            var name = $("#name").val();
            var email = $("#email").val();
            var exp = $("#exp").val();
            var postt = $("#postt").val();
            var phone = $("#phone").val();
            var address = $("#address").val();

            if (name == '' || email == '' || postt == '' || phone == '' || address == '' || exp == '') {
                alert("Fill all data first");
            }


            else {

                // Returns successful data submission message when the entered information is stored in database.
                $.post("database.php", {

                    urls1: urls, //this is to check where it came from
                    name1: name,
                    email1: email,
                    exp1: exp,
                    postt1: postt,
                    phone1: phone,
                    address1: address
                }, function (data) {
                    alert(data);
                    $('#form')[0].reset(); // To reset form fields
                });
            }


        }



        //refund
        else if (urls == 'refund.html') {


            var name = $("#name").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            var address = $("#address").val();
            var login = $("#login").val();
            var serial = $("#serial").val();
            var amount = $("#amount").val();
            var receiptno = $("#receiptno").val();
            var message = $("#message").val();


            if (name == '' || email == '' || subject == '' || message == '') {
                alert("Insertion Failed Some Fields are Blank....!!");
            }


            else {

               

                // Returns successful data submission message when the entered information is stored in database.
                $.post("database.php", {

                    urls1: urls, //this is to check where it came from

                    name1: name,
                    email1: email,
                    phone1: phone,
                    address1: address,
                    login1: login,
                    serial1: serial,
                    amount1: amount,
                    receiptno1: receiptno,
                    message1: message,
                }, function (data) {
                    alert(data);
                    $('#form')[0].reset(); // To reset form fields
                });
            }

        }


        //contact

        else {


            var name = $("#name").val();
            var email = $("#email").val();
            var subject = $("#subject").val();
            var message = $("#message").val();


            if (name == '' || email == '' || subject == '' || message == '') {
                alert("Insertion Failed Some Fields are Blank....!!");
            }


            else {
                alert("In contact")
                // Returns successful data submission message when the entered information is stored in database.
                $.post("database.php", {

                    urls1: urls, //this is to check where it came from
                    name1: name,
                    email1: email,
                    subject1: subject,
                    message1: message
                }, function (data) {
                    alert(data);
                    $('#form')[0].reset(); // To reset form fields
                });
            }

        }




    });
});