<!DOCTYPE html>
<html dir=ltr>
<head>
<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<?php 
   session_start();
   include("connect.php");
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>
<?php

include("nav.php");?>
    <title>Quantity</title>
</head>
<body>
<div class="container">
  <div class="panel panel-primary " style="background-color:blue;">
    <div class="panel-body">Quantity</div>
  </div>
<?php
include("connect.php");
if(isset($_POST['submit'])){
$IssueName=$_POST['Name'];
$Quan=$_POST['Quantit'];
$Product=$_POST['proDate'];
$Expiration=$_POST['ExpDate'];
$QuaAlert=$_POST['Quantities'];
$ExpAlert=$_POST['alert'];
$ID=$_POST['use'];
$DateTime = date('Y/m/d H:m:s');

$insertquery =  "INSERT INTO `quantity`(`IssueID`,
                                       `Quantity`,
                                 `ProductionDate`,
                                 `ExpirationDate`,
                                  `QuantityAlert`,
                                `ExpirationAlert`,
                                         `UserID`,
                                        `DateTime`)
                 VALUES ('$IssueName',
                              '$Quan',
                           '$Product',
                        '$Expiration',
                          '$QuaAlert',
                          '$ExpAlert',
                               '$ID',
                           '$DateTime')
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
<div class="container d-flex justify-content-center align-items-center"
      style="min-height: 70vh">
      <form class="border shadow p-3 rounded"
      	      method="post" 
      	      style="width:1200px;">
              <h1 class="text-center p-3">الكمية</h1>
              <select name="Name">
	<?php
	$x = "select * from items";
	$y = $connect->query($x);
	while ($z = $y->fetch_assoc())
	 {
		# code...
	
	?>
	<option value="<?php echo $z['ItemID']; ?>"><?php echo $z['ItemName']; ?></option>
	<?php
     }
	?>
</select> <br>
<br>
<input class="form-control" type="text" name="Quantit"  placeholder="Quantity"><br>
<input class="form-control" type="date" name="proDate"><br>
<input class="form-control" type="date" name="ExpDate"><br>
<input class="form-control" type="date" name="Quantities"><br>
<input class="form-control" type="date" name="alert"><br>
<br>
</select> <br>
<select name="use">
	<?php
	$x = "select * from users";
	$y = $connect->query($x);
	while ($z = $y->fetch_assoc())
	 {
		# code...
	
	?>
	<option value="<?php echo $z['id']; ?>"><?php echo $z['username']; ?></option>
	<?php
     }
	?>
</select> <br>
<br>
<input  class="btn btn-primary" type="submit" value="save" name="submit">
<table  style="margin-top:20px; width: 70px;" class="table table-striped table table-bordered"id="myTable">
<thead>
  <tr>
    <th>Quantity No</th>
    <th>Item ID</th>
    <th>Quantity</th>
    <th>Production Date</th>
    <th>Expiration Date</th>
    <th>Quantity Alert</th>
    <th>Expiration Alert </th>
    <th>UserID</th>
    <th>Date Time </th>
    <th>Update</th>
    <th>delete </th>
  </tr>
</thead>
  <?php
	$x = "select * from quantity where status = 0";
	$y = $connect->query($x);
	$counter = 0;
	while ($z = $y->fetch_assoc())
	 {
		# code...
		$counter = $counter+1;
	
	?>
	<tr>
    <td><?php echo $counter; ?></td>
      <td><?php echo $z['IssueID']; ?></td> 
      <td><?php echo $z['Quantity']; ?></td>
      <td><?php echo $z['ProductionDate']; ?></td>
      <td><?php echo $z['ExpirationDate']; ?></td>
      <td><?php echo $z['QuantityAlert']; ?></td>
      <td><?php echo $z['ExpirationAlert']; ?></td>
      <td><?php echo $z['UserID']; ?></td>
      <td><?php echo $z['DateTime']; ?></td>
      <td> <a target="_blank" href="cat_update.php?cat_ID=<?php echo $z['PatientID']; ?>">update </a>  
	  <td> <a target="_blank" href="cat_update.php?cat_ID=<?php echo $z['PatientID']; ?>&Delete=Delete"> delete</a>
       

     
  </tr>
 
	
	<?php
     }
	?>

  <?php }  else {
  header("Location: index.php"); 
}
?> 
     </table>
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
</style>
  <script src="bootstrap.bundle.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
