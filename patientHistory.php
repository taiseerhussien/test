<!DOCTYPE html>
<html dir=ltr>
<head>
<link rel="stylesheet" href="fontawesome/css/all.min.css">
<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<script src="bootstrap.bundle.min.js"></script>
<title>Dental Clinical</title>
<?php 
   session_start();
   include("connect.php");
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>

<?php
    $HistoryID = "";
    if(!empty($_GET['His_ID'])){
      $HistoryID = $_GET['His_ID'];
    }//END if(!empty($_GET['HistoryID']))
    $PatientsID = "";
    $Description = "";
    $ButtonName = "Save";
    $BtnClass = "primary";
    
if(!empty($HistoryID)) {
  $ButtonName = "Update";
  // echo $ButtonName = "Update";
  $BtnClass = "success";
  // echo $DiagonsticID;
    $DiagonsticQuery = "select * from patienthistory where HistoryID = $HistoryID";
    // echo $DiagonsticQuery;
    $DiagonsticExecute = $connect->query($DiagonsticQuery);
    $DiagonsticData = $DiagonsticExecute->fetch_assoc();
    // var_dump($DiagonsticData);
     $HistoryID = $DiagonsticData['HistoryID'];
     $PatientsID = $DiagonsticData['PatientsID'];
     $DoctorID = $DiagonsticData['DoctorID'];
     $Description = $DiagonsticData['Description'];
    


   }
?>





    <title>Patient History</title>
</head>
<body>

  </div>
<?php
include("connect.php");
if(isset($_POST['Save'])){
$PatAddress=$_POST['Name'];
$History=$_POST['History'];
$PatPhone=$_POST['Descripe'];
$DateTime = date('Y/m/d H:m:s');
$UserID = $_SESSION['id'];


$insertquery =  "INSERT INTO `patienthistory`(`PatientsID`,`DoctorID`, `Description`, `DateTime`,`UserID`)
                 VALUES ('$PatAddress','$History','$PatPhone','$DateTime','$UserID')
                                         ";
$insertExcute = $connect->query($insertquery);
//var_dump($UserID);
 $InsertMeetquery =  "INSERT INTO `meeting`(`PatientID`, `DoctorID`, `MeetType`, `DateTime`, `UserID`, `CDate`)
                     VALUES ('$PatAddress','$History',2,'$DateTime',$UserID,'$DateTime');
                                             ";
    $InsertMeetExcute = $connect->query($InsertMeetquery);



}



if(isset($_POST['Update']))
{

  $PatAddress=$_POST['Name'];
  $PatPhone=$_POST['Descripe'];
  

 $UpdateQuery = " UPDATE patienthistory SET `PatientsID`='$PatAddress',
 `Description`='$PatPhone'

                                         WHERE
                                         HistoryID = $HistoryID
				 ";
$UpdateExecute = $connect->query($UpdateQuery);

if($UpdateExecute)
{
header("Location: patienthistory.php");
}
}//END if(isset($_POST['Update']))




?>
<?php
include("nav.php");?>
<div class="container"><br>
  <div class="panel panel-primary " style="background-color:#0d6efd;color:white; font-size:22px; text-align:center ; width:80%;margin:0 auto; min-height:40px; border-radius:8px;border-color:#D09D05;border-width:2px;margin-bottom:10px;padding: 1px 10px 10px 10px;">
    <div class="panel-body">Patient History</div>
    </div>
    <div class="card"> 
<center>

		<style> 
input {
	<font face ="andulose" size="3%" color ="red"></font>
  width: 100%;
}
</style>





  <div class="alert alert-danger" id="ValidationError" style="display:none;visibility:collapse;border-radius:10px;">  </div>
    <form method="post" class="bg-light p-3 rounded" id="Form" >
    <input type="hidden" name="HistoryID" id="HistoryID" value="<?php echo $HistoryID;?>">

 <div class="row">
<div class="col-12 col-md-6">
<label class="form-label">Patient Name</label>
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
	<option  <?php echo $DoctorSelected; ?> value="<?php echo $z['PatientID']; ?>"><?php echo $z['PatientName']; ?></option>
	<?php
$DoctorSelected = "";
     }
	?>
</select> <br>
<br>
</div>
<div class="col-12 col-md-6">
    <label class="form-label">Doctor Name</label>
          <select class="form-select" name="History" id="Doctor">
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
<br>
<textarea name="Descripe" class="form-control" rows="4" id="Descripe" placeholder="Description" ><?php echo $Description;?></textarea><br>

<br> <br>
<div class="button">
<!-- <input type="submit" name="<?php  echo $ButtonName; ?>" value="<?php  echo $ButtonName; ?>" style="width: 150px;" class="btn btn-<?php echo $BtnClass; ?>"onclick="return Validation();"> -->
 <br>

<input  type="submit" name="<?php  echo $ButtonName; ?>" value="<?php  echo $ButtonName; ?>" style="width: 150px;" class="btn btn-<?php echo $BtnClass; ?>" onclick="return Validation();">
</div>
    </div>
    </div>
    <div class="card">
    <div class="table-responsive">
<table  style="margin-top:20px; width:100%;" class="table table-striped table table-bordered"id="myTable">
<thead>
  <tr>
    <th>#</th>
    <th>Patient Name</th>
    <th>Doctor Name</th>
    <th>Discription</th>
    <th>Date Time </th>
    <th>Update</th>
    <!-- <th>delete </th> -->
   

  </tr>
</thead>
  <?php
	$x = "select patienthistory.*,patient.PatientName,doctors.DoctorName,doctors.DoctorID,patient.PatientID
        from patienthistory,doctors,patient
        where patienthistory.Stauts = 0
        AND doctors.DoctorID = patienthistory.DoctorID
        AND patienthistory.PatientsID = patient.PatientID
        ";
	// echo $x;
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
      <td><?php echo $z['DoctorName']; ?></td>
      <td><?php echo $z['Description']; ?></td>
      <td><?php echo $z['DateTime']; ?></td>
      <td> <a  href="patienthistory.php?His_ID=<?php echo $z['HistoryID']; ?>"><i class='fas fa-marker'></i></a>  
	  <!-- <td> <a target="_blank" href="patienthistory.php?His_ID=<?php echo $z['HistoryID']; ?>&Delete=Delete"><i class='fas fa-trash-alt'></i></a> -->
       

     
  </tr>
 
	
	<?php
     }
	?>

  <?php }  else {
  header("Location: index.php"); 
}
?>
     </table>
</div>
    </div>
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
  width:100%;
  border-radius:8px;
  border-color:#D09D05;
  border-width:2px;margin-bottom:10px;padding: 1px 10px 10px 10px;
}
th,td{
  text-align:center;

}
</style>
  <script src="bootstrap.bundle.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<script>

    function Validation() {
      // alert("Montasir");
      if(document.forms['Form'].elements['Name'].value.length < 1|| document.forms['Form'].elements['Name'].value.length > 30 ) {
          document.getElementById('ValidationError').innerHTML = "  Please Select Patient Name";
          document.getElementById('ValidationError').style.visibility = 'visible';
          document.getElementById('ValidationError').style.display =  'block';
          document.forms['Form'].elements['Name'].focus();
          // alert("Montasir");
          return false;
      }//END 
      
      if(document.forms['Form'].elements['Descripe'].value.length < 5 || document.forms['Form'].elements['Descripe'].value.length > 30 ) {
          document.getElementById('ValidationError').innerHTML = "Please Write Description";
          document.getElementById('ValidationError').style.visibility = 'visible';
          document.getElementById('ValidationError').style.display =  'block';
          document.forms['Form'].elements['Descripe'].focus();
          // alert("Montasir");
          return false;
      }//END Address


    }//END 


</script>