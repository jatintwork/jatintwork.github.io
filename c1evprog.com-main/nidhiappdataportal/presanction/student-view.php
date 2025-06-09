<?php
require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Applicant Form</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Applicant View Details 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $student_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM presanction WHERE id='$student_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>Time</label>
                                        <p class="form-control">
                                            <?=$student['time'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Name</label>
                                        <p class="form-control">
                                            <?=$student['name'];?>
                                        </p>
                                    </div>


                                    <div class="mb-3">
                                        <label>Email</label>
                                        <p class="form-control">
                                            <?=$student['email'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Phone</label>
                                        <p class="form-control">
                                            <?=$student['phone'];?>
                                        </p>
                                    </div>
                                  
                                    <div class="mb-3">
                                        <label>Aadhar Card</label>
                                        <p class="form-control">
                                            <?=$student['aadhar_number'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Pan Card</label>
                                        <p class="form-control">
                                            <?=$student['pan_number'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Address</label>
                                        <p class="form-control">
                                            <?=$student['address'];?>
                                        </p>
                                    </div>
                                   
                                  
                                    <div class="mb-3">
                                        <label>Loan Amount</label>
                                        <p class="form-control">
                                            <?=$student['loan_amount'];?>
                                        </p>
                                    </div>
                                   
                                  
                                    <div class="mb-3">
                                        <label>Nature Of Business</label>
                                        <p class="form-control">
                                            <?=$student['nature_of_business'];?>
                                        </p>
                                    </div>
                                   
                                  
                                    <div class="mb-3">
                                        <label>Nature of Employement</label>
                                        <p class="form-control">
                                            <?=$student['nature_of_employmnt'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Monthly Income</label>
                                        <p class="form-control">
                                            <?=$student['monthly_income'];?>
                                        </p>
                                    </div>
                                   
                                  


                                    <div class="mb-3">
                                        <label>Document</label>
                                        <p class="form-control">
                                         <a href="https://nidhiapp.c1evprog.com/app_database_connection/files/<?= $student['resume_name']; ?> " target="_blank"><?=$student['resume_name'];?></a>   
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Transcation Receipt</label>
                                        <p class="form-control">
                                         <a href="https://nidhiapp.c1evprog.com/app_database_connection/files/<?= $student['receipt']; ?> " target="_blank"><?=$student['receipt'];?></a>   
                                        </p>
                                    </div>

                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>