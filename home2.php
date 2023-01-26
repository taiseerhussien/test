<?php 
   session_start();
   include("connect.php");
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>
<!DOCTYPE html>
<html dir=ltr>
<head>
<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="bootstrap-icons/font/bootstrap-icons.css">
    <script src="bootstrap.bundle.min.js"></script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
    <div class="container-fluid">
        <a href="#" class="navbar-brand"><span class="fa-solid fa-tooth"></span> </a>
        <button class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#mySidenav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="myCollapse" class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a href="home.php" class="nav-link">Home</a></li>
                <?php
                    // echo "Teeeeeeeeeeeeeeeeesst";
                    // var_dump($_SESSION['role']);
                    if($_SESSION['role'] == "admin") {
                        ?>
                 
                <li class="nav-item"><a href="Doctors.php" class="nav-link">Doctors</a></li>
                <?php
                    }//END if($_SESSION['role'] == "admin")
                ?> 
                <?php
                    // echo "Teeeeeeeeeeeeeeeeesst";
                    // var_dump($_SESSION['role']);
                    if($_SESSION['role'] == "admin") {
                        ?>
                        <li class="nav-item"><a href="Deparments.php" class="nav-link">Deparments</a></li>
                <?php
                    }//END if($_SESSION['role'] == "admin")
                ?>    
                <li class="nav-item"><a href="patients.php" class="nav-link">Patients</a></li>
                <li class="nav-item"><a href="Diagonstic.php" class="nav-link">Diagonstic</a></li>
                <li class="nav-item"><a href="PatientHistory.php" class="nav-link">PatientHistory</a></li>
                <li class="nav-item"><a href="Prescription.php" class="nav-link">Prescription</a></li>
                <?php
                if($_SESSION['role'] == "admin") {
                        ?>
                <li class="nav-item"><a href="Items.php" class="nav-link">Items</a></li>
                <?php
                    }//END if($_SESSION['role'] == "admin")
                ?> 
                <?php
                if($_SESSION['role'] == "admin") {
                        ?>
                <li class="nav-item"><a href="categories.php" class="nav-link">Categories</a></li>
                <?php
                    }//END if($_SESSION['role'] == "admin")
                ?> 

 <?php
                if($_SESSION['role'] == "admin") {
                        ?>
                <li class="nav-item"><a href="Quantities.php" class="nav-link">Quantities</a></li>
                <?php
                    }//END if($_SESSION['role'] == "admin")
                ?> 
                <?php
                if($_SESSION['role'] == "admin") {
                        ?>
                <li class="nav-item"><a href="register.php" class="nav-link">Manage Users</a></li>
                <?php
                    }//END if($_SESSION['role'] == "admin")
                ?> 
                <div class="dropdown">
                <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">Reports</button>
        <ul class="dropdown-menu">
            <li><h6 class="dropdown-header">Doctors</h6></li>
            <li><a href="doctorreport.php" class="dropdown-item">doctorreport</a></li>
            <li><a href="#" class="dropdown-item">selectdate1</a></li>
            <li><a href="#" class="dropdown-item">selectdate1</a></li>

            <li class="dropdown-divider"></li>
            <li><h6 class="dropdown-header">patients</h6></li>
            <li><a href="patientReports.php" class="dropdown-item">patientReports</a></li>
            <li><a href="#" class="dropdown-item">patientReports</a></li>
            <li><a href="#" class="dropdown-item">patientReports</a></li>
        </ul>
        
 
    </div>
</div>
</div>
            </ul>
            <?=$_SESSION['name']?>
            <ul class="navbar-nav ms-auto">
            <a href="logout.php" class="btn btn-dark"><i class="fa-solid fa-right-from-bracket"></i></a>            </ul>
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
            <a href="Doctors.php" class="list-group-item list-group-item-action" data-bs-toggle="offcanvas" data-bs-target="#mySidenav">Doctors</a>
            <a href="Deparments.php" class="list-group-item list-group-item-action" data-bs-toggle="offcanvas" data-bs-target="#mySidenav">Deparments</a>
            <a href="patients.php" class="list-group-item list-group-item-action" data-bs-toggle="offcanvas" data-bs-target="#mySidenav">patients</a>
            <a href="Diagonstic.php" class="list-group-item list-group-item-action" data-bs-toggle="offcanvas" data-bs-target="#mySidenav">Diagonstic</a>
            <a href="PatientHistory.php" class="list-group-item list-group-item-action" data-bs-toggle="offcanvas" data-bs-target="#mySidenav">PatientHistory</a>
            <a href="Prescription.php" class="list-group-item list-group-item-action" data-bs-toggle="offcanvas" data-bs-target="#mySidenav">Prescription</a>
            <a href="Items.php" class="list-group-item list-group-item-action" data-bs-toggle="offcanvas" data-bs-target="#mySidenav">Items</a>
            <a href="categories.php" class="list-group-item list-group-item-action" data-bs-toggle="offcanvas" data-bs-target="#mySidenav">categories</a>
            <a href="Quantities.php" class="list-group-item list-group-item-action" data-bs-toggle="offcanvas" data-bs-target="#mySidenav">Quantities</a>

        </div>
    </div>
</div>
	<div class="container row mx-auto align-items-center" style="margin-top: 50px; margin-bottom: 200px;" >
		<div class="row">
			<div class="col-md-3">
                <?php
                if($_SESSION['role'] == "admin") {
                        ?>
				<a href="Doctors.php">
                <?php
                    }//END if($_SESSION['role'] == "admin")
                ?>      
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                       <b> Doctors  </b></div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa-solid fa-user-doctor"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>	
			</div>
  

            <div class="col-md-3">
                <?php
                if($_SESSION['role'] == "admin") {
                        ?>

				<a href="Deparments.php"> 
                <?php
                    }//END if($_SESSION['role'] == "admin")
                ?>    
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                       <b> Departments</b></div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                </div>
                                <div class="col-auto">
                                <i class="fa-solid fa-building"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>	
			</div>
				
			<div class="col-md-3">
				<a href="Patients.php">    
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                       <b> Patients </b></div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                </div>
                                <div class="col-auto">
                                <i class="fa-solid fa-hospital-user"></i>                               </div>
                        </div>
                    </div>
                </a>
			</div>
		</div>

			<div class="col-md-3">
				<a href="Diagonstic.php">    
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                       <b> Diagonstic </b></div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                </div>
                                <div class="col-auto">
                                <i class="fa-solid fa-stethoscope"></i>                                </div>
                            </div>
                        </div>
                    </div>
                </a>
			</div>
		</div>
       
        <div class="row" style="margin-top:10px;">
			<div class="col-md-3">
				<a href="PatientHistory.php">    
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                       <b> PatientHistory</b></div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                </div>
                                <div class="col-auto">
                                <i class="fa-solid fa-notes-medical"></i></div>
                            </div>
                        </div>
                    </div>
                </a>	
			</div>


            <div class="col-md-3">
				<a href="Prescription.php">    
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                       <b> Prescription   </b></div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                </div>
                                <div class="col-auto">
                                <i class="fa-solid fa-capsules"></i>                                </div>
                            </div>
                        </div>
                    </div>
                </a>	
			</div>
				
			<div class="col-md-3">
                 <?php
                if($_SESSION['role'] == "admin") {
                        ?>
				<a href="item.php">  
                <?php
                    }//END if($_SESSION['role'] == "admin")
                ?>   
                    <div class="card border-left-warning shadow h-70 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                      <b>  Items</b> </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                </div>
                                <div class="col-auto">
                                <i class="fa-solid fa-sitemap"></i>                                </div>
                            </div>
                        </div>
                    </div>
                </a>
			</div>

			<div class="col-md-3">
                 <?php
                if($_SESSION['role'] == "admin") {
                        ?>
				<a href="Quantities.php">   
                <?php
                    }//END if($_SESSION['role'] == "admin")
                ?>  
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                       <b>    Quantities  </b></div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                </div>
                                <div class="col-auto">
                                <i class="fa-solid fa-arrow-down-wide-short"></i>                                </div>
                            </div>
                        </div>
                    </div>
                </a>
			</div>
		</div>
    </div>



   

<style>
    .grid_3{
        float: right;
        margin-bottom: 20px;
        margin-left: 20px;
        margin-right: 20px;
        width: 500px;
        /*margin: 0 auto;*/
    }
    li {
          position: relative;
          /*margin-left: -15px;*/
          list-style: none;
    }

    .row{
    	/*background-color: red;*/
    }
    .row .col-md-4 {
    	/*background-color: red;*/
    	margin-bottom: 10px;
        /*margin-left: 1px;*/
        /*margin-right: 1px;*/
        /*width: 280px;*/
    }
    b{
        /*background-color: red;*/
        size: 100px;
        font-size: 20px;
    }
</style>
<?php
    }
?>