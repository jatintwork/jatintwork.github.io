<?php  require 'dbcon.php'; ?>

<?php

    session_start();
    
    if($_SESSION['is_login']){
        
        // echo "<script>alert('You are logged in successfully');</script>";
        
        
    }
   
   
    else{
        
        
        header("Location: ../");
    }
    
    
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Infinity Marine Job Portal</title>

    <style type="text/css">
		 
         body
		{
		    counter-reset: Serial;          
		}


		tr td:first-child:before
		{
		  counter-increment: Serial;      
		  content: counter(Serial); 
		}
	</style>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">

<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

</head>
<body>


    <nav class="navbar navbar-expand-lg bg-dark"  data-bs-theme="dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Portal</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <!-- <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>  -->
                <li class="nav-item">
                  <a class="nav-link active" href="indexs.php">Message</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/payment_done/index.php">Job Form(payment Done)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/payment_not_done/index.php">Job Form(payment Not Done)</a>
                  </li>
                
              </ul>
          </div>
        </div>
      </nav>
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Applicant Message / Query
                            <a href="student-create.php" class="btn btn-primary float-end">Add Applicant</a>
                        </h4>

                        <input id='myInput' onkeyup='searchTable()' type='text' placeholder="Search Applicant">
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped" id="myTable" data-page-length="5">
                            <thead>
                                <tr>
                                    <th>Sr.</th>
                                    <th>Time<br>Stamp</th>
                                    <th>Applicant<br>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <!--<th>Address</th>-->
                                    <th>Message</th>
                                    <th width="14%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM message Order By id Desc";
                                    $query_run = mysqli_query($con, $query);


                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $student)



                                        
                                        {
                                            ?>

                                            <tr>
                                                <td> </td>
                                                 <td><?= $student['time']; ?></td>
                                                <!-- <td><?= $student['id']; ?></td> -->
                                                <td><?= $student['name']; ?></td>
                                                <td><?= $student['email']; ?></td>
                                                <td><?= $student['phone']; ?></td>
                                                <!--<td><?= $student['address']; ?></td>-->
                                                <td><?= $student['message']; ?></td>
                                                <td>
                                                    <a href="student-view.php?id=<?= $student['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <!-- <a href="student-edit.php?id=<?= $student['id']; ?>" class="btn btn-success btn-sm">Edit</a> -->
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_student" value="<?=$student['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>


function deleting_db_row() {
alert("You are Sure You Want To Delete This Applicant");
 
    
}

//this is for per data per page

$(document).ready(function(){
    $('#myTable').dataTable();
});


        function searchTable() {
            var input, filter, found, table, tr, td, i, j;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td");
                for (j = 0; j < td.length; j++) {
                    if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                        found = true;
                    }
                }
                if (found) {
                    tr[i].style.display = "";
                    found = false;
                } else {
                    tr[i].style.display = "none";
                    
                }
            }
        }
        </script>

</body>
</html>