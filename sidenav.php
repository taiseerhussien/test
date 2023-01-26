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
        <a href="#" class="navbar-brand"><span class="fa fa-hammer"></span> </a>
        <button class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#mySidenav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="myCollapse" class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="Doctors.php" class="nav-link">Doctors</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Deparments</a></li>
                <li class="nav-item"><a href="#" class="nav-link">registration</a></li>
                <li class="nav-item"><a href="#" class="nav-link">patients</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Diagonstic</a></li>
                <li class="nav-item"><a href="#" class="nav-link">PatientHistory</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Prescription</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Items</a></li>
                <li class="nav-item"><a href="#" class="nav-link">categories</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Quantities</a></li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <p class="navbar-text">Welcome</p>
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
            <a href="/" class="list-group-item list-group-item-action" data-bs-toggle="offcanvas" data-bs-target="#mySidenav">Home</a>
            <a href="Doctors.php" class="list-group-item list-group-item-action" data-bs-toggle="offcanvas" data-bs-target="#mySidenav">Doctors</a>
            <a href="Deparments" class="list-group-item list-group-item-action" data-bs-toggle="offcanvas" data-bs-target="#mySidenav">Deparments</a>
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
<section class="container">
<div class="row">
        <div class="col">
          <a href="Doctors.php">
            <div class="card">
                    <img src="image1.jpg"  style="width:50%" class="card-img-top">
                    <div class="card-body">
                        <h4 class="card-title">Doctors</h4>
                        <p class="card-text"></p>
                        
                    </div>
                </div>
        </a>
        </div>
        <div class="col">
        <a href="Deparments.php">
            <div class="card">
                <img src="image1.jpg" style="width:50%" class="card-img-top">
                <div class="card-body">
                    <h4 class="card-title">Deparments</h4>
                    <p class="card-text"></p>
                </div>
            </div>
</a>
        </div>
        <div class="col">
        <a href="registration.php">
            <div class="card">
                <img src="image1.jpg"style="width:50%" class="card-img-top">
                <div class="card-body">
                    <h4 class="card-title">registration</h4>
                    <p class="card-text"></p>
                </div>
            </div>
            </a>
        </div>
        
    
    <div class="row">
        <div class="col">
        <a href="patients.php">
            <div class="card">
                <img src="image2.jpg" style="width:50%"class="card-img-top">
                <div class="card-body">
                    <h4 class="card-title">patients</h4>
                    <p class="card-text"> </p>
                </div>
            </div>
</a>
        </div>
        <div class="col">
        <a href="Diagonstic.php">
            <div class="card">
                <img src="image2.jpg" style="width:50%"class="card-img-top">
                <div class="card-body">
                    <h4 class="card-title">Diagonstic</h4>
                    <p class="card-text"></p>
                </div>
            </div>
</a>
        </div>
        <div class="col">
        <a href="PatientHistory.php">
            <div class="card">
                <img src="image2.jpg" style="width:50%"class="card-img-top">
                <div class="card-body">
                    <h4 class="card-title">PatientHistory</h4>
                    <p class="card-text"></p>
                </div>
            </div>
        </div>
</a>
    </div>
    <div class="row">
        <div class="col">
        <a href="Prescription.php">
            <div class="card">
                <img src="image4.jpg" style="width:50%"class="card-img-top">
                <div class="card-body">
                    <h4 class="card-title">Prescription</h4>
                    <p class="card-text"></p>
                </div>
            </div>
</a>
        </div>
        <div class="col">
        <a href="Items.php">
            <div class="card">
                <img src="image4.jpg"style="width:50%" class="card-img-top">
                <div class="card-body">
                    <h4 class="card-title">Items</h4>
                    <p class="card-text"></p>
                </div>
            </div>
</a>
        </div>
        <div class="col">
        <a href="categories.php">
            <div class="card">
                <img src="image4.jpg" style="width:50%"class="card-img-top">
                <div class="card-body">
                    <h4 class="card-title">categories</h4>
                    <p class="card-text"></p>
                </div>
            </div>
        </div>
</a>
    </div>


</section>
</body>
<script>

</script>
</html>