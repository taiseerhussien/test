<!DOCTYPE html>
<html dir=ltr>
<head>
<link rel="stylesheet" href="fontawesome/css/all.min.css">
<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<script src="bootstrap.bundle.min.js"></script>
<?php 
   session_start();
   include("connect.php");
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>

<?php
include("nav.php");?>
    <title>Departments</title>
</head>
<body>
<div class="alert alert-danger" id="ValidationError" style="display:none;visibility:collapse;border-radius:10px;">  </div>
<form method="post" class="bg-light p-3 rounded" id="Form" >
    <div class="panel-body">Departments</div>
  </div>
  <?php
include("connect.php");
if(isset($_POST['submit'])){
$ItemName=$_POST['IssueName'];
$DateTime = date('Y/m/d H:m:s');

$insertquery =  "INSERT INTO `department`( `DepartmentName`, `DateTime`)
                 VALUES ('$ItemName','$DateTime')
                                         ";
$insertExcute = $connect->query($insertquery);

}
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
    <form class="bg-light p-3 rounded" id="Form" >
<div class="card">
<form class="bg-light p-3 rounded">
    <div class="row">
        <div class="col-12 ">
            <label class="form-label" required>Name</label>
            <input type="text" name="IssueName" id="Name" class="form-control">
        
<br>
<input  class="btn btn-primary" type="submit" value="save" name="submit">

<br>
</div>
</div>
</div>

<div class="card">
<table style="margin-top:20px; width: 100%;" class="table table-striped table table-bordered"id="myTable">
<thead>
  <tr>
    <th>#</th>
    <th>Department Name </th>
    <th>Update</th>
    <th>Delete </th>
    
   

  </tr>
</thead>
  <?php
	$x = "select * from department where status=0";
	$y = $connect->query($x);
	$counter = 0;
	while ($z = $y->fetch_assoc())
	 {
		# code...
		$counter = $counter+1;
	
	?>
	<tr>
    <td><?php echo $counter; ?></td>
      <td><?php echo $z['DepartmentName']; ?></td>
      <td> <a target="_blank" href="Dept_update.php?dept_ID=<?php echo $z['DepartmentID']; ?>"><i class='fas fa-marker'></i></a>  
	  <td> <a target="_blank" href="Dept_update.php?dept_ID=<?php echo $z['DepartmentID']; ?>>&Delete=Delete"><i class='fas fa-trash-alt'></i></a>


     
  </tr>
 
	
	<?php
     }
	?>
    <?php


?>
  <?php }      else {
  header("Location: index.php"); 
}
?>

     </table>
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
      "sLengthMenu": "??????  _MENU_ ??????????",
      "sSearch": "??????: ",
      "sZeroRecords" : "???? ???????? ???????????? ????????????",
      "sInfo" : "?????? ??????????????  _TOTAL_ , ?????????????? ( ????  _START_ ??????   _END_)",
      "sInfoEmpty" : "", 
    "oPaginate":{
      'sShowing' : "??????"  ,
      'sNext' : "????????????" ,
      'sPrevious' : '????????????'  ,
    }
    
    },
   */

});
<?=$_SESSION['name']?>
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
      if(document.forms['Form'].elements['Name'].value.length < 10 || document.forms['Form'].elements['Name'].value.length > 30 ) {
          document.getElementById('ValidationError').innerHTML = "???????????? ?????????? ??????????";
          document.getElementById('ValidationError').style.visibility = 'visible';
          document.getElementById('ValidationError').style.display =  'block';
          document.forms['Form'].elements['Name'].focus();
          // alert("Montasir");
          return false;
      }//END 
       }//END 
      </script>