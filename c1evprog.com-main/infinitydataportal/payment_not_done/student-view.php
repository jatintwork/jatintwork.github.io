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

    <title>Applicant Job Form</title>
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
                            $query = "SELECT * FROM payment_not_done WHERE id='$student_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                
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
                                        <label>Desired Job</label>
                                        <p class="form-control">
                                            <?=$student['desired_job'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Salary Expectation</label>
                                        <p class="form-control">
                                            <?=$student['sal_expec'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Previous Salary</label>
                                        <p class="form-control">
                                            <?=$student['prev_sal'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>job Application</label>
                                        <p class="form-control">
                                            <?=$student['job_location'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Resume File</label>
                                        <p class="form-control">
                                         <a href="https://infinityjobs.subseas7ind.com/files/<?= $student['resume_name']; ?> " target="_blank"><?=$student['resume_name'];?></a>   
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