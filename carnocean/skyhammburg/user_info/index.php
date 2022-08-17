<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


	<meta charset="UTF-8">
	<title>Contact Query Details</title>
	
	<link rel="icon" href="logo1.PNG" type="image/x-icon">
	
	
	<!-- CSS FOR STYLING THE PAGE -->
	<style>
		body {
			counter-reset: Serial;
		}

		tr td:first-child:before {
			counter-increment: Serial;
			content: counter(Serial);
		}






		table {
			margin: 0 auto;
			font-size: large;
			border: 1px solid black;
		}

		h1 {
			text-align: center;
			color: #006600;
			font-size: xx-large;
			font-family: 'Gill Sans', 'Gill Sans MT',
				' Calibri', 'Trebuchet MS', 'sans-serif';
		}

		td {
			background-color: #E4F5D4;
			border: 1px solid black;
		}

		th,
		td {
			font-weight: bold;
			border: 1px solid black;
			padding: 10px;
			text-align: center;
		}

		td {
			font-weight: lighter;
		}
	</style>


	<link rel="stylesheet" href="style.css">



	<?php

	 
	$user = 'u844323284_root';
	$password = 'iamDev@9312';

 
	$database = 'u844323284_skyhaamburg';

 
	$servername = 'localhost';
	$mysqli = new mysqli(
		$servername,
		$user,
		$password,
		$database
		);

	// Checking for connections
	if ($mysqli->connect_error) {
		die('Connect Error (' .
			$mysqli->connect_errno . ') ' .
			$mysqli->connect_error);
	}

	// SQL query to select data from database
	$sql = "SELECT * FROM `contactquery`";
	$result = $mysqli->query($sql);
	$mysqli->close();
	?>









</head>

<body>


	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand" href="https://skyhaamburg.com/">Sky Haamburg</a>
			<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="#">Contact Query</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="refunddata.php">Refund Query</a>
					</li>

				</ul>

			</div>
		</div>
	</nav>










	<br><br>
	<section>
		<h1>Sky Haamburg Contact Query</h1>
		<!-- TABLE CONSTRUCTION -->

		<br><br>

		<table class="auto-index" style="height: auto; width: 85%; padding : 15px;">

			<tr>
				<th>Sr No.</th>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Subject</th>
				<th>Message</th>
				<th>Address</th>
			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS -->
			<?php


			// LOOP TILL END OF DATA
			while ($rows = $result->fetch_assoc()) {

			?>
				<tr>
					<!-- FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN -->
					<td></td>
					<td><?php echo $rows['name']; ?></td>
					<td><?php echo $rows['email']; ?></td>
					<td><?php echo $rows['phone']; ?></td>

					<td><?php echo $rows['subject']; ?></td>
					<td><?php echo $rows['message']; ?></td>
					<td><?php echo $rows['address']; ?></td>
				</tr>
			<?php
			}
			?>
		</table>
	</section>









	<!-- Optional JavaScript; choose one of the two! -->

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<!-- Option 2: Separate Popper and Bootstrap JS -->
	<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->




</body>

</html>