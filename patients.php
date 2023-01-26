<!DOCTYPE html>
<html dir=ltr>
<head>
<link rel="stylesheet" href="fontawesome/css/all.min.css">
<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<script src="bootstrap.bundle.min.js"></script>
<title> Dental Clinical</title>
<?php 
   session_start();
   include("connect.php");
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>
<?php
$TypeStudent = "";
$TypeEmployee = "";
$TypeVisitor = "";
$PatientID = "";
$BtnName = "Save";
$BtnClass = "primary";
$PatientName = ""; 
$Age =  "";
$Address = "";
$Phone =  "";
$Gender = "";
$Patient_Type =  "";
$male = "";
$female = "";
if(!empty($_GET['PatientID'])) {
    $PatientID = $_GET['PatientID'];
      $PatientQuery = "select * from patient where PatientID = $PatientID";
      $PatientExe = $connect->query($PatientQuery);
      $counter = 0;
          $PatientData = $PatientExe->fetch_assoc();
          $PatientName = $PatientData['PatientName']; 
          $Age =  $PatientData['Age'];
          $Address = $PatientData['Address'];
          $Phone =  $PatientData['Phone'];
          $Gender = $PatientData['Gender'];
          $Patient_Type =  $PatientData['Patient_Type'];
          $TypeStudent = "";
          $TypeEmployee = "";
          $TypeVisitor = "";
          
          if($Gender == 'male') {
              $male = "checked";
          }//END if($Gender == 'male')
          else if($Gender == 'female') {
              $female = "checked";
          }//END else if($Gender == 'female')
          if($Patient_Type == "Student") {
              $TypeStudent = "selected";
          }//END if($Patient_Type == "Student")
          else if($Patient_Type == "Employee") {
              $TypeEmployee = "selected";
          }//END else if($Patient_Type == "Employee")
          else if($Patient_Type == "Visitor") {
              $TypeVisitor = "selected";
          }//END else if($Patient_Type == "Visitor")
    $BtnName = "Update";
    $BtnClass = "success";
}//END if(!empty($_GET['PatientID']))

include("nav.php");?>
</head>
<body>
<div class="container-fluid bg-light"><br>
<div class="panel">
  <div class="panel panel-primary " style="background-color:#0d6efd;color:white; font-size:22px; text-align:center ; width:80%;margin:0 auto; min-height:40px; border-radius:8px;border-color:#D09D05;border-width:2px;margin-bottom:10px;padding: 1px 10px 10px 10px;">
    <div class="panel-body">Patient</div>
  </div></div>
<?php
include("connect.php");
if(isset($_POST['Save'])){
      $PatName=$_POST['Name'];
      $PatAge=$_POST['agee'];
      $PatAddress=$_POST['Add'];
      $PatPhone=$_POST['telephone'];
      $PatGender=$_POST['Genders'];
      $case=$_POST['types'];
      $DateTime = date('Y/m/d H:m:s');
      $UserID = $_SESSION['id'];
      $insertquery =  "INSERT INTO `patient`(`PatientName`, `Age`, `Address`, `Phone`, `Gender`, `Patient_Type`, `DateTime`,`UserID`)
                    VALUES ('$PatName','$PatAge','$PatAddress','$PatPhone','$PatGender','$case','$DateTime','$UserID')
                                               ";
      $insertExcute = $connect->query($insertquery);





}//END if(isset($_POST['Save']))

if(isset($_POST['Update'])) {
      $PatientID = $_POST['PatientID'];
      $PatName=$_POST['Name'];
      $PatAge=$_POST['agee'];
      $PatAddress=$_POST['Add'];
      $PatPhone=$_POST['telephone'];
      $PatGender=$_POST['Genders'];
      $case=$_POST['types'];
      $DeleteQuery = "UPDATE patient SET `PatientName` = '$PatName' , `Age` = $PatAge, `Address` = '$PatAddress',
       `Phone` = '$PatPhone' , `Gender` = '$PatGender' , `Patient_Type` = '$case'
       where PatientID = $PatientID";
      //echo $DeleteQuery;
      $DeleteExecute = $connect->query($DeleteQuery);

      if($DeleteExecute)
      {

      @header("Location:patients.php");

      }



}//END if(isset($_POST['Update']))




?>


<center> 
		<style> 

input {
	<font face ="andulose" size="3%" color ="red"></font>
  width: 100%;
}
</style>
<section class="container">
  <div class="alert alert-danger" id="ValidationError" style="display:none;visibility:collapse;border-radius:10px;">  </div>
    <form method ="post" class="p-3 rounded" id="Form" >
<div class="card">

      <input type="hidden" name="PatientID" id="PatientID" value="<?php echo $PatientID; ?>">

      <form class="bg-light p-3 rounded">
        <div class="row">
            <div class="col-12 col-md-6">
                <label class="form-label" required>Name</label>
                <input type="text" name="Name" id="Name" class="form-control" value="<?php echo $PatientName; ?>">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label" style="">Age</label>
                <input type="number" name="agee" id="Age" class="form-control" value="<?php echo $Age; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <label class="form-label">Phone Number</label>
                <input type="tel" name="telephone" class="form-control"  id="Telephone" placeholder="+249" maxlength ="11" minlength ="11" value="<?php echo $Phone;?>">
            </div>
            <div class="col-12 col-md-6">
                  <label class="form-label">Patient Type</label>
                      <br>
                  <select class="form-select" aria-label="Default select example" name="types" id="Type">
                    <option value="-1">Patient Type</option>
                    <option value="Student" <?php echo $TypeStudent; ?> >Student</option>
                    <option value="Employee" <?php echo $TypeEmployee; ?>>Employee</option>
                    <option value="Visitor" <?php echo $TypeVisitor; ?>>Visitor</option>
                  </select>
            </div>
          </div>
          <div class="row">
             <div class="col-12 col-md-6" style="margin-top:25px;">
                <label class="form-label">Gender</label>
                <input type="radio" name="Genders" value="male"  id="Male" <?php echo $male; ?> >Male
                <input type="radio" name="Genders" value="female" id="Female" <?php echo $female; ?> >female   
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">Address</label>
                <textarea name="Add" id="Address"class="form-control"><?php echo $Address; ?></textarea>
            </div>
          </div>
<br>
    <div class="row">
      <div class="col-12 col-md-4"></div>
      <div class="col-12 col-md-4">
        <div class="button">
        <button style="width: 120px; margin-top: 10px;" class="btn btn-<?php echo $BtnClass; ?>" type="submit" name="<?php echo $BtnName; ?>" onclick="return Validation();"><?php echo $BtnName; ?></button>
        </div>
      </div>
      <div class="col-12 col-md-4"></div>
    </div>
    <br>

  </form>
</div>

<?php

$x1 = "select count(*) as Total from patient where status = 0";
$y1 = $connect->query($x1);
$Counter = 0;
$z1 = $y1->fetch_assoc();
$Counter = $z1['Total'];
//var_dump($Counter);

if($Counter > 0) {
?>

<div class="card">
<div class="table-responsive">
    <table  style="margin-top:20px;" class="table table-striped table table-bordered"id="myTable">
    <thead>
      <tr>
        <th>#</th>
        <th>Patient Name</th>
        <th>Patient age</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Gender</th>
        <th>Patient Type</th>
        <th>Details</th>
        <th>Update</th>
        <!-- <th>Delete </th> -->
      

      </tr>
    </thead>
      <?php
      $x = "select * from patient where status = 0";
      $y = $connect->query($x);
      $counter = 0;
      while ($z = $y->fetch_assoc())
      {
        # code...
        $counter = $counter+1;
      
      ?>
      <tr>
        <td><?php echo $counter; ?></td>
          <td><?php echo $z['PatientName']; ?></td> 
          <td><?php echo $z['Age']; ?></td>
          <td><?php echo $z['Address']; ?></td>
          <td><?php echo $z['Phone']; ?></td>
          <td><?php echo $z['Gender']; ?></td>
          <td><?php echo $z['Patient_Type']; ?></td>
          <td> <a target="_blank" href="PatientHistory.php?Patient_ID=<?php echo $z['PatientID']; ?>">Details </a> 
          <td> <a target="_blank" href="patients.php?PatientID=<?php echo $z['PatientID']; ?>"><i class='fas fa-marker'></i></a>  
        <!-- <td> <a target="_blank" href="patients.php?PatientID=<?php echo $z['PatientID']; ?>&Delete=Delete"><i class='fas fa-trash-alt'></i></a> -->
          

        
      </tr>
    
      
      <?php
        }
      ?>
      <?php } ?>
        
        </table>
</div>
      </div>
      </div>
        <?php
  } //END if($Counter > 10)
    else {
        ?>
  <div class="row" style="margin-top: 20px; min-height:20px;"> 
    <div class="col-md-12 alert-danger"> Sorry Their Is no Data </div>
  </div>
        <?php
    }//END else
        ?>
  </form>
  <link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="pagination/table_pagin2.css">

<link rel="stylesheet" href="pagination/table_pagin2">
  <script src="pagination/jquery-3.5.1.min.js"></script>
  <script src="pagination/table_pagin2.js"></script>
  <script src="pagination/table_pagin4.js"></script>
<script>
$('#myTable').dataTable( {

    // "language" :{
    //   "info": "MMMM _START_ to _END_ NNN _TOTAL_ KKKK",
    //  }  ,

   /*

       "oLanguage": {
      // "aaSorting": [[ 10, "desc" ]],
      // "bJQueryUI": true,
      // "sLengthMenu": [["25", "50", "100", "250", "500", "-1"], ["25", "50", "100", "250", "500", "All"]],
      "sLengthMenu": "عرض  _MENU_ سجلات",
      "sSearch": "بحث: ",
      "sZeroRecords" : "لا توجد بيانات لعرضها",
      "sInfo" : "عدد السجلات  _TOTAL_ , المعروض ( من  _START_ إلى   _END_)",
      "sInfoEmpty" : "", 
    "oPaginate":{
      'sShowing' : "عرض"  ,
      'sNext' : "التالي" ,
      'sPrevious' : 'السابق'  ,
    }
    
    },
   */

});

</script>
<style>

.card{
  width:90%;
  border-radius:8px;
  border-color:#D09D05;
  border-width:2px;margin-bottom:10px;padding: 1px 10px 10px 10px;
}

label.form-label{
  /* background-color:red; */
  /* margin-left:0; */
  text-align:left;

}
.form-label{
  text-align:left;
}
</style>

  <script src="bootstrap.bundle.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    
</body>
</html>
<script>

    function Validation() {
            var Gender = document.getElementsByName("Genders");

      // alert("Montasir");
     
      if(document.forms['Form'].elements['Name'].value.length < 10 || document.forms['Form'].elements['Name'].value.length > 30 ) {
          document.getElementById('ValidationError').innerHTML = "  Please Enter Patient Name";
          document.getElementById('ValidationError').style.visibility = 'visible';
          document.getElementById('ValidationError').style.display =  'block';
          document.forms['Form'].elements['Name'].focus();
          // alert("Montasir");
          return false;
      }//END 
      if(document.forms['Form'].elements['Age'].value < 25 || document.forms['Form'].elements['Age'].value > 80 ) {
          document.getElementById('ValidationError').innerHTML = "    Please Enter Age ";
          document.getElementById('ValidationError').style.visibility = 'visible';
          document.getElementById('ValidationError').style.display =  'block';
          document.forms['Form'].elements['Age'].focus();
          // alert("Montasir");
          return false;
      }//END Age
      
      if(document.forms['Form'].elements['Telephone'].value.length < 10 || document.forms['Form'].elements['Telephone'].value.length > 15 ) {
          document.getElementById('ValidationError').innerHTML = "  Please Enter Phone Number ";
          document.getElementById('ValidationError').style.visibility = 'visible';
          document.getElementById('ValidationError').style.display =  'block';
          document.forms['Form'].elements['Telephone'].focus();
          // alert("Montasir");
          return false;
      }//END 
      if(document.forms['Form'].elements['Type'].value == '-1') {
          document.getElementById('ValidationError').innerHTML = "    Please Select Department ";
          document.getElementById('ValidationError').style.visibility = 'visible';
          document.getElementById('ValidationError').style.display =  'block';
          document.forms['Form'].elements['Type'].focus();
          // alert("Montasir");
          return false;
      }//END 
      if(document.querySelectorAll('[name=Genders]:checked').length == 0 ) {
          document.getElementById('ValidationError').innerHTML = "  Please Enter Gender ";
          document.getElementById('ValidationError').style.visibility = 'visible';
          document.getElementById('ValidationError').style.display =  'block';
          // alert("Montasir");
          return false;
      }//END

      if(document.forms['Form'].elements['Address'].value.length < 5 || document.forms['Form'].elements['Address'].value.length > 30 ) {
          document.getElementById('ValidationError').innerHTML = "  Please Enter Address";
          document.getElementById('ValidationError').style.visibility = 'visible';
          document.getElementById('ValidationError').style.display =  'block';
          document.forms['Form'].elements['Address'].focus();
          // alert("Montasir");
          return false;
      }//END Address


      
      

    }//END 


</script>