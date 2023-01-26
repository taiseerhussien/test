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
    <title>categories</title>
</head>
<body>
<div class="container">
  <div class="panel panel-primary " style="background-color:blue;">
    <div class="panel-body">Categories</div>
  </div>
<?php
include("connect.php");
if(isset($_POST['submit'])){
$CategoryName=$_POST['CatName'];
$CategoryID=$_POST['CatId'];
$DateTime = date('Y/m/d H:m:s');

$insertquery =  "INSERT INTO `categories`(`CategoryName`, `UserID`, `DateTime`)
                 VALUES ('$CategoryName','$CategoryID','$DateTime')
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
      	      style="width: 900px;">
              <h1 class="text-center p-3">Categories</h1>
<input class="form-control" type="text" name="CatName"  placeholder="category name"><br>
<select name="CatId">
	<?php
	$x = "select * from users";
	$y = $connect->query($x);
	while ($z = $y->fetch_assoc())
	 {
		# code...
	
	?>
	<option value="<?php echo $z['userID']; ?>"><?php echo $z['userID']; ?></option>
	<?php
     }
	?>
</select> <br>
<br>
<input  class="btn btn-primary" type="submit" value="save" name="submit">
<table  style="margin-top:20px; width: 70px;" class="table table-striped table table-bordered"id="myTable">
<thead>
  <tr>
    <th>Category No</th>
    <th>Cateogry Name </th>
    <th>User ID </th>
    <th>Date Time </th>
    <th>Update</th>
    <th>delete </th>
   

  </tr>
</thead>
  <?php
	$x = "select * from categories where status = 0";
	$y = $connect->query($x);
	$counter = 0;
	while ($z = $y->fetch_assoc())
	 {
		# code...
		$counter = $counter+1;
	
	?>
	<tr>
    <td><?php echo $counter; ?></td>
 
      <td><?php echo $z['CategoryName']; ?></td> 
      <td><?php echo $z['UserID']; ?></td>
      <td><?php echo $z['DateTime']; ?></td>
      <td> <a target="_blank" href="cat_update.php?cat_ID=<?php echo $z['CategoryID']; ?>">update </a>  
	  <td> <a target="_blank" href="cat_update.php?cat_ID=<?php echo $z['CategoryID']; ?>&Delete=Delete"> delete</a>
       

     
  </tr>
 
	
	<?php
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
<?php }  else {
  header("Location: index.php"); 
}
?>