<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bootstrap</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-icons/font/bootstrap-icons.css">
    <script src="bootstrap.bundle.min.js"></script>
</head>
<body>
<section class="container">

    <form class="bg-light p-3 needs-validation">
        <div class="row">
            <div class="col-12 col-md-6">
                <label for="validationCustom01"class="form-label">Patient Name</label>
                <input type="text" class="form-control">
                <div class="valid-feedback">
            </div>
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Patient Age</label>
                <input type="number" class="form-control">
            </div>
            <div class="col-12">
                <label class="form-label"> Patient Address</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-12">
                <label class="form-label">Phone Number</label>
                <input type="number" class="form-control">
            </div>
            <div class="form-check">
  <input class="form-check-input" type="radio" name="Fimale" id="Fimale" disabled>
  <label class="form-check-label" for="Fimale">
    
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="male" id="male" checked disabled>
  <label class="form-check-label" for="male">

  </label>
</div>
            
            <div class="col-12 col-md-4">
                <label class="form-label">Patient Type</label>
                <select class="form-select">
                    <option value="Student">Student</option>
                    <option value="Employee">Employee</option>
                    <option value="Vistor">Vistor</option>
                   
                </select>
        </div>

        <button class="btn btn-primary" style="margin-top=20px;">summit</button>

    </form>

</section>
</body>
<script>

</script>
</html>