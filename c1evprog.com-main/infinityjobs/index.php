<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="login.css">
	<title>Login Page</title>
</head>

<body>
	<form action="validate.php" method="post">
		<div class="login-box">
			<h1>Notification Panel Login</h1>

			<div class="textbox">
				<i class="fa fa-user" aria-hidden="true"></i>
				<input type="text" placeholder="Username"
						name="username" value="">
			</div>

			<div class="textbox">
				<i class="fa fa-lock" aria-hidden="true"></i>
				<input type="password" placeholder="Password"
						name="password" id="password" value="">
						
					
			</div>
				<input type="checkbox" 
           onclick="Toggle()">
    <strong>Show Password</strong>
    
    <!--<a href="" > <h6>Forgot Your Password ?</h6> </a>-->

			<input class="button" type="submit"
					name="login" value="Sign In">
		</div>
	</form>
	
	<script>
        // Change the type of input to password or text
        function Toggle() {
            var temp = document.getElementById("password");
            if (temp.type === "password") {
                temp.type = "text";
            }
            else {
                temp.type = "password";
            }
        }
    </script>
</body>

</html>
