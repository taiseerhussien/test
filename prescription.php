<!DOCTYPE html>
<html dir=ltr>
<head>
<link rel="stylesheet" href="fontawesome/css/all.min.css">
<link rel="stylesheet" href="bootstrap.min.css">

<script src="bootstrap.bundle.min.js"></script>
<title>Dental Clinical</title>
<?php 
   session_start();
   include("connect.php");
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>


<?php
    $PrescriptionID = "";
    if(!empty($_GET['PrescriptionID'])){
      $PrescriptionID = $_GET['PrescriptionID'];
    }//END if(!empty($_GET['PrescriptionID']))
    $PatientsID = "";
    $Description = "";
    $DoctorID = "";
    $ButtonName = "Save";
    $BtnClass = "primary";
    
if(!empty($PrescriptionID)) {
  $ButtonName = "Update";
  // echo $ButtonName = "Update";
  $BtnClass = "success";
  // echo $PrescriptionID;
    $DiagonsticQuery = "select * from prescription where PrescriptionID = $PrescriptionID";
    // echo $DiagonsticQuery;
    $DiagonsticExecute = $connect->query($DiagonsticQuery);
    $DiagonsticData = $DiagonsticExecute->fetch_assoc();
    // var_dump($DiagonsticData);
    $PrescriptionID = $DiagonsticData['PrescriptionID'];
    $PatientsID = $DiagonsticData['PatientsID'];
    $Description = $DiagonsticData['Description'];
    $DoctorID = $DiagonsticData['DoctorID'];
  


   }
?>





















    <title>prescription</title>
</head>
<body>
<br>
 
<?php
$CurrentDate = date("Y-m-d");
include("connect.php");
if(isset($_POST['Save'])){
$PatName=$_POST['Name'];
$PatAddress=$_POST['descripe'];
$PatPhone=$_POST['doc'];
$DateTime = date('Y/m/d H:m:s');
$UserID = $_SESSION['id'];


// echo $CurrentDate = date('mm/dd/yyyy');

$insertquery =  "INSERT INTO `prescription`(`PatientsID`, `Description`, `DoctorID`, `DateTime`,`UserID`)
                 VALUES ('$PatName','$PatAddress','$PatPhone','$DateTime','$UserID')
                                         ";
$insertExcute = $connect->query($insertquery);

}
if(isset($_POST['Update']))
{

  $PatName=$_POST['Name'];
  $PatAddress=$_POST['descripe'];
  $PatPhone=$_POST['doc'];
 

 $UpdateQuery = " UPDATE prescription SET `PatientsID`='$PatName',
 `Description`='$PatAddress',
`DoctorID`='$PatPhone'

                                         WHERE
                                         PrescriptionID = $PrescriptionID
				 ";
$UpdateExecute = $connect->query($UpdateQuery);

if($UpdateExecute)
{
header("Location: prescription.php");
}
}//END if(isset($_POST['Update']))

?>

<?php

include("nav.php");?>
<br>
 <div class="panel panel-primary " style="background-color:#0d6efd;color:white; font-size:22px; text-align:center ; width:80%;margin:0 auto; min-height:40px; border-radius:8px;border-color:#D09D05;border-width:2px;margin-bottom:10px;padding: 1px 10px 10px 10px;">
    <div class="panel-body">prescription</div>
  </div>
<center> 
<div class="card">
		<style> 
input {
	<font face ="andulose" size="3%" color ="red"></font>
  width: 100%;
}
</style>

<div class="alert alert-danger" id="ValidationError" style="display:none;visibility:collapse;border-radius:10px;">  </div>
<form method="post" class="bg-light p-3 rounded" id="Form" >

<div class="row">
<div class="col-12 col-md-6">
          <label class="form-label">Patient</label>
          <select class="form-select" name="Name" id="Name">
          <option  value="-1"> -- Select  -- </option>

	<?php
	$x = "select * from patient";
	$y = $connect->query($x);
	while ($z = $y->fetch_assoc())
	 {
		# code...
    $DoctorSelected = "";
    if($PatientsID == $z['PatientID']) {
        $DoctorSelected = "Selected";
    }//END if($DoctorID == $z['DoctorID'])

	?>
	<option <?php echo $DoctorSelected; ?> value="<?php echo $z['PatientID']; ?>"><?php echo $z['PatientName']; ?></option>
	<?php
  $DoctorSelected = "";
     }
	?>
</select> <br>
<br>
    </div>
    <div class="col-12 col-md-6">
    <label class="form-label">Doctors</label>
          <select class="form-select" name="doc" id="doc">
          <option  value="-1"> -- Select  -- </option>

	<?php
	$x = "select * from doctors";
	$y = $connect->query($x);
	while ($z = $y->fetch_assoc())
	 {
		# code...
    $DoctorSelected = "";
    if($DoctorID == $z['DoctorID']) {
        $DoctorSelected = "Selected";
    }//END if($DoctorID == $z['DoctorID'])

	?>
	<option <?php echo $DoctorSelected; ?> value="<?php echo $z['DoctorID']; ?>"><?php echo $z['DoctorName']; ?></option>
	<?php
      $DoctorSelected = "";
     }
	?>
</select> <br> 

    </div>
    <br>
    <label class="form-label">Description:</label>
<textarea name="descripe" class="form-control"rows="4" id="descripe"><?php echo $Description;?></textarea><br>
<br>
          
<br>
    </div>
    <div class="button">
    <input  type="submit" name="<?php  echo $ButtonName; ?>" value="<?php  echo $ButtonName; ?>" style="width: 150px;" class="btn btn-<?php echo $BtnClass; ?>" onclick="return Validation();">
    </div>
    </div>
    </div>

<?php
$x1 = "select count(*) as Total from prescription where status = 0";
$y1 = $connect->query($x1);
$Counter = 0;
$z1 = $y1->fetch_assoc();
$Counter = $z1['Total'];
//var_dump($Counter);

if($Counter > 0) {
?>
<div class="card">
<div class="table-responsive">
<table  style="margin-top:20px; width: 100%;" class="table table-striped table table-bordered"id="myTable">
<thead>
  <tr>
    <th>#</th>
    <th>Patient Name</th>
    <th>Description</th>
    <th>Doctor Name</th>
    <th>Update</th>
    <th>Print</th>

    <!-- <th>delete </th> -->
  </tr>
</thead>
  <?php
	$x = "select prescription.*,patient.PatientID,patient.PatientName,
doctors.DoctorID,doctors.DoctorName 
from prescription,patient,doctors
where prescription.Status = 0 
AND  patient.PatientID = prescription.PatientsID 
AND doctors.DoctorID = prescription.DoctorID";
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
      <td><?php echo $z['Description']; ?></td>
      <td><?php echo $z['DoctorName']; ?></td>
      <td> <a  href="prescription.php?PrescriptionID=<?php echo $z['PrescriptionID']; ?>"><i class='fas fa-marker'></i></a>  
      <td> <a target="_blank" href="invoice.php?PrescriptionID=<?php echo $z['PrescriptionID']; ?>"><i class="fa-solid fa-print"></i> </a>  
	  <!-- <td> <a target="_blank" href="prescription.php?PrescriptionID=<?php echo $z['PrescriptionID']; ?>&Delete=Delete"><i class='fas fa-trash-alt'></i></a> -->
       

     
  </tr>
 
	
	<?php
     }
	?>

  <?php } ?>
     </table>
    
</div>
     <?php
  }//END if($Counter > 10)
    else {
        ?>
  <div class="row" style="margin-top: 20px; min-height:20px;"> 
    <div class="col-md-12 alert-danger"> Sorry Their Is no Data </div>
  </div>
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
  width:70%;
  border-radius:8px;
  border-color:#D09D05;
  border-width:2px;
  margin-bottom:10px;
  padding: 10px 10px 10px 10px;
}
</style>
  <script src="bootstrap.bundle.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<script>

    function Validation() {
     if(document.forms['Form'].elements['Name'].value == '-1') {
          document.getElementById('ValidationError').innerHTML = "    Please Enter Patient Name ";
          document.getElementById('ValidationError').style.visibility = 'visible';
          document.getElementById('ValidationError').style.display =  'block';
          document.forms['Form'].elements['Name'].focus();
          // alert("Montasir");
          return false;
      }//END 

       if(document.forms['Form'].elements['doc'].value == '-1') {
          document.getElementById('ValidationError').innerHTML = "    Please Enter Doctor Name ";
          document.getElementById('ValidationError').style.visibility = 'visible';
          document.getElementById('ValidationError').style.display =  'block';
          document.forms['Form'].elements['doc'].focus();
          // alert("Montasir");
          return false;
      }//END 
      if(document.forms['Form'].elements['descripe'].value.length < 15 || document.forms['Form'].elements['descripe'].value.length > 30 ) {
          document.getElementById('ValidationError').innerHTML = "   Please Enter Description ";
          document.getElementById('ValidationError').style.visibility = 'visible';
          document.getElementById('ValidationError').style.display =  'block';
          document.forms['Form'].elements['descripe'].focus();
          // alert("Montasir");
          return false;
      }//END Address
    }//END 
</script>

<style>
td{
  text-align: center;
}

</style>