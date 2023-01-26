<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php 
   session_start();
   include("connect.php");
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>
<?php
include("nav.php");?>
<body>
    <?php
$CurrentDate=date ('Y-m-d');
?>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Report</h4>
                    </div>
                    <div class="card-body">
                    
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>From Date</label>
                                        <input type="date" name="from_date" value="<?php if(isset($_POST['from_date'])){ echo $_POST['from_date']; } echo $CurrentDate; ?>" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>To Date</label>
                                        <input type="date" name="to_date" value="<?php if(isset($_POST['to_date'])){ echo $_POST['to_date']; } echo $CurrentDate; ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label></label> <br>
                                      <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php 
                            include("connect.php");
                            ?>
               <form method="POST">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-borderd">
                            <thead>
                                <tr>
                                    <!-- <th>ID</th> -->
                                    <th>Doctor Name</th>
                                    <th>Patient Name</th>
                                    <th>Date Meeting</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            
                                if(isset($_POST['from_date']) && isset($_POST['to_date']))
                                {
                                    $from_date = $_POST['from_date'];
                                    $to_date = $_POST['to_date'];

                                    $query = "SELECT meeting.*,patient.PatientID,patient.PatientName,doctors.DoctorID,doctors.DoctorName
                                                FROM meeting,patient,doctors
                                                WHERE meeting.PatientID = patient.PatientID
                                                AND
                                                meeting.DoctorID = doctors.DoctorID
                                                AND meeting.CDate BETWEEN '$from_date' AND '$to_date'
                                                ";
                                     // echo $query;
                                    $query_run = mysqli_query($connect, $query);

                                

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                                                <!-- <td><?= $row['HistoryID']; ?></td> -->
                                                <td><?= $row['DoctorName']; ?></td>
                                                <td><?= $row['PatientName']; ?></td>
                                                <td><?= $row['DateTime']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {

                                    

                                        echo "No Record Found";
                                    }
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php } ?>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</form>
</html>