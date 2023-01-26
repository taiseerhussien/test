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
    $Diagonsis = "";
    $PlanTretment = "";
    $ButtonName = "Save";
    $BtnClass = "primary";

if(!empty($DiagonsticID)) {
  ECHO $ButtonName = "Update";
  $BtnClass = "success";
  // echo $DiagonsticID;
    $DiagonsticQuery = "select * from diagonstic where DiagonsticID = $DiagonsticID";
    // echo $DiagonsticQuery;
    $DiagonsticExecute = $connect->query($DiagonsticQuery);
    $DiagonsticData = $DiagonsticExecute->fetch_assoc();
    // var_dump($DiagonsticData);
    $DiagonsticID = $DiagonsticData['DiagonsticID'];
    $PatiantID = $DiagonsticData['PatiantID'];
    $Diagonsis = $DiagonsticData['Diagonsis'];
    $PlanTretment = $DiagonsticData['PlanTretment'];


   }
include("nav.php");?>
    <title>diagonstic</title>
</head>
<body>
 
  <div class="container"><br>
  <div class="panel panel-primary " style="background-color:#0d6efd;color:white; font-size:22px; text-align:center ; width:80%;margin:0 auto; min-height:40px; border-radius:8px;border-color:#D09D05;border-width:2px;margin-bottom:10px;padding: 1px 10px 10px 10px;">
    <div class="panel-body">Diagonstic</div>
  </div>

<?php
include("connect.php");
if(isset($_POST['Save'])){
    $PatName=$_POST['Name'];
    $PatAddress=$_POST['Add'];
    $PatPhone=$_POST['telephone'];
    $ID=$_POST['patId'];
    $DateTime = date('Y/m/d H:m:s');

    $insertquery =  "INSERT INTO `diagonstic`(`PatiantID`, `Diagonsis`, `PlanTretment`, `UserID`, `DateTime`)
                     VALUES ('$PatName','$PatAddress','$PatPhone','$ID','$DateTime')
                                             ";
    $insertExcute = $connect->query($insertquery);

}
if(isset($_POST['Update'])) {

    echo $DiagonsticID = $_POST['DiagonsticID'];
    $PatName=$_POST['Name'];
    $PatAddress=$_POST['Add'];
    $PatPhone=$_POST['telephone'];
    $ID=$_POST['patId'];
   
 echo $UpdateQuery = " UPDATE diagonstic SET  `Diagonsis`='$PatAddress',
                                        `PlanTretment`='$PatPhone'
                                       
                                         WHERE
                                         DiagonsticID = $DiagonsticID
         ";
$UpdateExecute = $connect->query($UpdateQuery);

if($UpdateExecute)
{
header("Location:diagonstic.php");
}
}//END if(isset($_POST['Update']))
?>

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
<form class="bg-light p-3 rounded">
        <input type="hidden" name="DiagonsticID" id="DiagonsticID" value="<?php echo $DiagonsticID; ?>">
        <div class="row">
            <div class="col-12 col-md-6">
                <label class="form-label" required>Diagonsis</label>
                <textarea type="text" name="Add" id="Add" class="form-control"placeholder="Diagonsis"><?php echo $Diagonsis; ?></textarea>
             
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label" style="">Plan Treatments</label>
                <textarea type="number" name="telephone" id="telephone" class="form-control"placeholder="Plan Treatments" ><?php echo $PlanTretment; ?></textarea>
            </div>
      </div>
      <div class="row">
            <div class="col-12 col-md-6">
              <label class="form-label">Doctors</label>
                  <select name="patId" id="patId" class="form-select">
                    <?php
                    $x = "select * from doctors";
                    $y = $connect->query($x);
                    while ($z = $y->fetch_assoc())
                    {
                      # code...
                    
                    ?>
                    <option value="<?php echo $z['DoctorID']; ?>"><?php echo $z['DoctorName']; ?></option>
                    <?php
                      }
                    ?>
                  </select> 
      </div>
      <div class="col-12 col-md-6">
      <label class="form-label">Patients</label>
      <select name="Name" id="Vname"class="form-select">
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
<button style="width: 150px;" type="button" class="btn btn-<?php echo $BtnClass; ?>"  type="submit" name="<?php  echo $ButtonName ?>" onclick="return Validation();"><?php  echo $ButtonName ?></button>
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
<table  style="margin-top:20px; width: 100%;" class="table table-striped table table-bordered"id="myTable">
<thead>
  <tr>
    <th>#</th>
    <th>Patient ID</th>
    <th>Diagonsis</th>
    <th>PlanTretment</th>
    <th>Date Time </th>
    <th>Update</th>
    <th>delete </th>
   

  </tr>
</thead>
  <?php
	$x = "select * from diagonstic where status = 0";
	$y = $connect->query($x);
	$counter = 0;
	while ($z = $y->fetch_assoc())
	 {
		# code...
		$counter = $counter+1;
	
	?>
	<tr>
    <td><?php echo $counter; ?></td>
      <td><?php echo $z['PatiantID']; ?></td> 
      <td><?php echo $z['Diagonsis']; ?></td>
      <td><?php echo $z['PlanTretment']; ?></td>
      <td><?php echo $z['DateTime']; ?></td>
      <td> <a target="_blank" href="Diagonstic.php?diagonstic_ID=<?php echo $z['DiagonsticID']; ?>"><i class='fas fa-marker'></i></a>    
	  <td> <a target="_blank" href="Diagonstic.php?diagonstic_ID=<?php echo $z['DiagonsticID']; ?>&Delete=Delete"><i class='fas fa-trash-alt'></i></a>
       

     
  </tr>
 
	
	<?php
     }
	?>

    
     </table>
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
  width:90%;
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
      if(document.forms['Form'].elements['Add'].value.length < 10 || document.forms['Form'].elements['Add'].value.length > 30 ) {
          document.getElementById('ValidationError').innerHTML = "الرجاء إدخال الإسم";
          document.getElementById('ValidationError').style.visibility = 'visible';
          document.getElementById('ValidationError').style.display =  'block';
          document.forms['Form'].elements['Add'].focus();
          // alert("Montasir");
          return false;
      }//END
      if(document.forms['Form'].elements['telephone'].value.length < 5 || document.forms['Form'].elements['telephone'].value.length > 30 ) {
          document.getElementById('ValidationError').innerHTML = "التلفون رقم الرجاء إدخالن";
          document.getElementById('ValidationError').style.visibility = 'visible';
          document.getElementById('ValidationError').style.display =  'block';
          document.forms['Form'].elements['telephone'].focus();
          // alert("Montasir");
          return false;
      }//END Address

//       if(document.forms['Form'].elements['patId'].value.length < 10 || document.forms['Form'].elements['patId'].value.length > 30 ) {
//     document.getElementById('ValidationError').innerHTML = " الطبيب االرجاء إدخال د";
//     document.getElementById('ValidationError').style.visibility = 'visible';
//     document.getElementById('ValidationError').style.display =  'block';
//     document.forms['Form'].elements['patId'].focus();
//     // alert("Montasir");
//     return false;
// }//END Email

      
      

    }//END 


</script>