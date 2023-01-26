<!DOCTYPE html>
<html dir=ltr>
<head>
<link rel="stylesheet" href="fontawesome/css/all.min.css">
<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="style.css">

<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="bootstrap-icons/font/bootstrap-icons.css">
<script src="bootstrap.bundle.min.js"></script>
<title> Dental Clinical</title>

<?php 
   session_start();
   include("connect.php");
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>
 
<?php
    $DiagonsticID = "";
    if(!empty($_GET['diagonstic_ID'])){
      $DiagonsticID = $_GET['diagonstic_ID'];
    }//END if(!empty($_GET['diagonstic_ID']))
    $PatiantID = "";
    $DoctorsID = "";
    $Diagonsis = "";
    $PlanTretment = "";
    $ButtonName = "Save";
    $BtnClass = "primary";

if(!empty($DiagonsticID)) {
  $ButtonName = "Update";
  // echo $ButtonName = "Update";
  $BtnClass = "success";
  // echo $DiagonsticID;
    $DiagonsticQuery = "select * from diagonstic where DiagonsticID = $DiagonsticID";
    // echo $DiagonsticQuery;
    $DiagonsticExecute = $connect->query($DiagonsticQuery);
    $DiagonsticData = $DiagonsticExecute->fetch_assoc();
    // var_dump($DiagonsticData);
    $DiagonsticID = $DiagonsticData['DiagonsticID'];
    $PatiantID = $DiagonsticData['PatiantID'];
    $DoctorsID = $DiagonsticData['DoctorsID'];
    $Diagonsis = $DiagonsticData['Diagonsis'];
    $PlanTretment = $DiagonsticData['PlanTretment'];


   }
?>
    <title>Diagonstic</title>
</head>
<body>

<?php
include("connect.php");
if(isset($_POST['Save'])){
    $PatName=$_POST['Name'];
    $ID=$_POST['patId'];
    $PatAddress=$_POST['Add'];
    $PatPhone=$_POST['telephone'];
    $DateTime = date('Y/m/d H:m:s');
    $UserID = $_SESSION['id'];


    $insertquery =  "INSERT INTO `diagonstic`(`PatiantID`,`DoctorID`,`Diagonsis`,`PlanTretment`,`DateTime`,`UserID`)
                     VALUES ('$PatName','$ID','$PatAddress','$PatPhone','$DateTime','$UserID')
                                             ";
    $insertExcute = $connect->query($insertquery);

$UserID = $_SESSION['id'];
// var_dump($UserID);

    $InsertMeetquery =  "INSERT INTO `meeting`(`PatientID`, `DoctorID`, `MeetType`, `DateTime`, `UserID`, `CDate`)
                     VALUES ('$PatName','$ID',1,'$DateTime',$UserID,'$DateTime');
                                             ";
    $InsertMeetExcute = $connect->query($InsertMeetquery);




}



if(isset($_POST['Update'])) {
  // var_dump($ButtonName);
    $DiagonsticID = $_POST['DiagonsticID'];
    $PatName=$_POST['Name'];
    $ID=$_POST['patId'];
    $PatAddress=$_POST['Add'];
    $PatPhone=$_POST['telephone'];
    
   
 $UpdateQuery = " UPDATE diagonstic SET  `PatiantID`='$PatName',
                                        `DoctorID`='$ID',
                                        `Diagonsis`='$PatAddress',
                                        `PlanTretment`='$PatPhone'
                                       
                                         WHERE
                                         DiagonsticID = $DiagonsticID
         ";
$UpdateExecute = $connect->query($UpdateQuery);

if($UpdateExecute)
{
  header("Location:Diagonstic.php");
}
}//END if(isset($_POST['Update']))
?>
<?php
include("nav.php");?>
 
 <div class="container"><br>
  <div class="panel panel-primary " style="background-color:#0d6efd;color:white; font-size:22px; text-align:center ; width:80%;margin:0 auto; min-height:40px; border-radius:8px;border-color:#D09D05;border-width:2px;margin-bottom:10px;padding: 1px 10px 10px 10px;">
    <div class="panel-body">Diagonstic</div>
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
<form method="POST" class="bg-light p-3 rounded" id="Form" >
<form class="bg-light p-3 rounded">
        <input type="hidden" name="DiagonsticID" id="DiagonsticID" value="<?php echo $DiagonsticID; ?>">
        <div class="row">
            <div class="col-12 col-md-6">
                <label class="form-label" required>Diagonsis</label>
                <textarea type="text" name="Add" id="Add" class="form-control"placeholder="Diagonsis"><?php echo $Diagonsis; ?></textarea>
             
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Plan Treatments</label>
                <textarea type="number" name="telephone" id="telephone" class="form-control"placeholder="Plan Treatments" ><?php echo $PlanTretment; ?></textarea>
            </div>
      </div>
      <div class="row">
            <div class="col-12 col-md-6">
              <label class="form-label">Doctors</label>
                  <select name="patId" id="doctor" class="form-select">
                  <option  value="-1"> -- Select  -- </option>
                    <?php
                    $x = "select * from doctors";
                    $y = $connect->query($x);
                    while ($z = $y->fetch_assoc())
                    {
                            # code...
                            $DoctorSelected = "";
                        if($PatiantID == $z['DoctorID']) {
                            $DoctorSelected = "Selected";
                        }//END if($DoctorID == $z['DoctorID'])
                    ?>
                    <option <?php echo $DoctorSelected; ?> value="<?php echo $z['DoctorID']; ?>"><?php echo $z['DoctorName']; ?></option>
                    <?php
                    $DoctorSelected = "";
                      }
                    ?>
                  </select> 
      </div>
      <div class="col-12 col-md-6">
      <label class="form-label">Patients</label>
      <select name="Name" id="Name" class="form-select">
      <option  value="-1"> -- Select  -- </option>
	<?php
	$x = "select * from patient";
	$y = $connect->query($x);
	while ($z = $y->fetch_assoc())
	 {
		# code...
    $PatiantSelected = "";
    if($PatiantID == $z['PatientID']) {
        $PatiantSelected = "Selected";
    }//END if($PatiantID == $z['PatientID'])
	
	?>
	<option <?php echo $PatiantSelected; ?> value="<?php echo $z['PatientID']; ?>"><?php echo $z['PatientName']; ?></option>
	<?php
      $PatiantSelected = "";
     }
	?>
</select> <br>
    </div>
    <div class="button">
<!-- <button style="width: 150px;" type="button" class="btn btn-<?php echo $BtnClass; ?>"  type="submit" name="<?php  echo $ButtonName; ?>"><?php  echo $ButtonName; ?></button> -->

<input type="submit" name="<?php  echo $ButtonName; ?>" value="<?php  echo $ButtonName; ?>" style="width: 150px;" class="btn btn-<?php echo $BtnClass; ?>"onclick="return Validation();">
</div>
    </div>
    </div>
<?php

$x1 = "select count(*) as Total from diagonstic where status = 0";
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
    <th>PatientID</th>
    <th>DoctorID</th>
    <th>Diagonsis</th>
    <th>PlanTretment</th>
    <th>Date Time </th>
    <th>Update</th>
    <!-- <th>delete </th> -->
   

  </tr>
</thead>
  <?php
	$x = "select diagonstic.*,patient.PatientName,doctors.DoctorName,patient.PatientID,doctors.DoctorID
        from diagonstic,doctors,patient
        where diagonstic.status = 0
        AND diagonstic.PatiantID = patient.PatientID
        AND diagonstic.DoctorID = doctors.DoctorID

        ";
	//echo $x;
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
      <td><?php echo $z['Diagonsis']; ?></td>
      <td><?php echo $z['PlanTretment']; ?></td>
      <td><?php echo $z['DateTime']; ?></td>
      <td> <a href="Diagonstic.php?diagonstic_ID=<?php echo $z['DiagonsticID']; ?>"><i class='fas fa-marker'></i></a>    
	  <!-- <td> <a target="_blank" href="Diagonstic.php?diagonstic_ID=<?php echo $z['DiagonsticID']; ?>&Delete=Delete"><i class='fas fa-trash-alt'></i></a> -->
       

     
  </tr>
 
	
	<?php
     }
	?>

    
     </table>
</div>
    </div>
     <?php
  }//END if($Counter > 10)
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

<?php } else {
  header("Location: index.php"); 
}
 ?>
</script>
<style>

.card{
  width:100%;
  border-radius:8px;
  border-color:#D09D05;
  border-width:2px;margin-bottom:10px;padding: 1px 10px 10px 10px;
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
      if(document.forms['Form'].elements['Add'].value.length < 5 || document.forms['Form'].elements['Add'].value.length > 30 ) {
          document.getElementById('ValidationError').innerHTML = "  Please Enter Diaonstic Name ";
          document.getElementById('ValidationError').style.visibility = 'visible';
          document.getElementById('ValidationError').style.display =  'block';
          document.forms['Form'].elements['Add'].focus();
          // alert("Montasir");
          return false;
      }//END add name
      if(document.forms['Form'].elements['telephone'].value.length < 5 || document.forms['Form'].elements['telephone'].value.length > 30 ) {
          document.getElementById('ValidationError').innerHTML = "     Please Enter Plan Treatment";
          document.getElementById('ValidationError').style.visibility = 'visible';
          document.getElementById('ValidationError').style.display =  'block';
          document.forms['Form'].elements['telephone'].focus();
          // alert("Montasir");
          return false;
      }//END Address

 if(document.forms['Form'].elements['doctor'].value == '-1') {
          document.getElementById('ValidationError').innerHTML = " Please Select Doctor ";
          document.getElementById('ValidationError').style.visibility = 'visible';
          document.getElementById('ValidationError').style.display =  'block';
          document.forms['Form'].elements['doctor'].focus();
          // alert("Montasir");
          return false;
      }//END 
 if(document.forms['Form'].elements['Name'].value == '-1') {
          document.getElementById('ValidationError').innerHTML = "    Please Select Patient ";
          document.getElementById('ValidationError').style.visibility = 'visible';
          document.getElementById('ValidationError').style.display =  'block';
          document.forms['Form'].elements['Name'].focus();
          // alert("Montasir");
          return false;
      }//END   
      

    }//END 


</script>
