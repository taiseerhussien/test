

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sidenav</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <script src="bootstrap.bundle.min.js"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
    <div class="container-fluid">
        <a href="#" class="navbar-brand"><span class="fa-solid fa-tooth"></span> </a>
        <button class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#mySidenav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="myCollapse" class="collapse navbar-collapse" style="background-color:#0d6efd;color:dark; font-size:19px;">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a href="home.php" class="nav-link">Home</a></li>
                <?php
                if($_SESSION['role'] == "admin") {
                        ?>
                <li class="nav-item"><a href="Doctors.php" class="nav-link">Doctors</a></li>  
                <?php 

                    }
                    ?>

                     <?php
                if($_SESSION['role'] == "admin") {
                        ?>
               <li class="nav-item"><a href="Deparments.php" class="nav-link">Departments</a></li> 
               <?php 

                    }
                    ?>

         
                <li class="nav-item"><a href="patients.php" class="nav-link">Patients</a></li>
                <li class="nav-item"><a href="Diagonstic.php" class="nav-link">Diagonstic</a></li>
                <li class="nav-item"><a href="PatientHistory.php" class="nav-link">Patient History</a></li>
                <li class="nav-item"><a href="Prescription.php" class="nav-link">Prescription</a></li>
                <?php
                if($_SESSION['role'] == "admin") {
                        ?>

                <a href="Deparments.php"> 
                <?php
                    }//END if($_SESSION['role'] == "admin")
                ?> 

                <!-- <?php
                if($_SESSION['role'] == "admin") {
                        ?>
                <li class="nav-item"><a href="Items.php" class="nav-link">Items</a></li>
                 <?php 

                    }
                    ?>
                    <?php
                if($_SESSION['role'] == "admin") {
                        ?>
                <li class="nav-item"><a href="categories.php" class="nav-link">Categories</a></li>
                <?php 

                    }
                    ?>
                    <?php

                     if($_SESSION['role'] == "admin") {
                        ?>
                <li class="nav-item"><a href="Quantities.php" class="nav-link">Quantities</a></li>
                    <?php 

                    }
                    ?>
 -->                    <?php

                     if($_SESSION['role'] == "admin") {
                        ?>
                <li class="nav-item"><a href="register.php" class="nav-link">Manage Users</a></li>

                    <?php 

                                        }
                                        ?>
                <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">Reports</button>
        <ul class="dropdown-menu">
            <li><h6 class="dropdown-header">Doctors</h6></li>
            <li><a href="generalreport.php" class="dropdown-item">General Report</a></li>

            <li class="dropdown-divider"></li>
            <li><h6 class="dropdown-header">patients</h6></li>
            <li><a href="patientReports.php" class="dropdown-item">Patient Reports</a></li>

        </ul>
        
        
    </div>

</div>

</div>
</ul>

            
            <ul class="navbar-nav ms-auto">
                <li><a href="change-password.php" class="dropdown-item">Change Password</a></li>
                 <?=$_SESSION['name']?> 
            <a href="logout.php" class="btn btn-dark"><i class="fa-solid fa-right-from-bracket"></i></a>
            
            </ul>

        </div>
    </div>
</nav>
<div id="mySidenav" class="offcanvas offcanvas-start">
    <div class="offcanvas-header bg-dark">
        <h5 class="offcanvas-title text-light">Dental Clinic </h5>
    </div>
    <div class="offcanvas-body p-0">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action" data-bs-toggle="offcanvas" data-bs-target="#mySidenav">Home</a>
            <a href="#" class="list-group-item list-group-item-action" data-bs-toggle="offcanvas" data-bs-target="#mySidenav">Doctors</a>
            <a href="#" class="list-group-item list-group-item-action" data-bs-toggle="offcanvas" data-bs-target="#mySidenav">Deparments</a>
            <a href="#" class="list-group-item list-group-item-action" data-bs-toggle="offcanvas" data-bs-target="#mySidenav">registration</a>
            <a href="#" class="list-group-item list-group-item-action" data-bs-toggle="offcanvas" data-bs-target="#mySidenav">patients</a>
            <a href="#" class="list-group-item list-group-item-action" data-bs-toggle="offcanvas" data-bs-target="#mySidenav">Diagonstic</a>
            <a href="#" class="list-group-item list-group-item-action" data-bs-toggle="offcanvas" data-bs-target="#mySidenav">PatientHistory</a>
            <a href="#" class="list-group-item list-group-item-action" data-bs-toggle="offcanvas" data-bs-target="#mySidenav">Prescription</a>
            <a href="#" class="list-group-item list-group-item-action" data-bs-toggle="offcanvas" data-bs-target="#mySidenav">Items</a>
            <a href="#" class="list-group-item list-group-item-action" data-bs-toggle="offcanvas" data-bs-target="#mySidenav">categories</a>
            <a href="#" class="list-group-item list-group-item-action" data-bs-toggle="offcanvas" data-bs-target="#mySidenav">Quantities</a>

        </div>
    </div>
</div>
