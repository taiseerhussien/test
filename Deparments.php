<!DOCTYPE html>
<html dir=ltr>
<head>
<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<?php 
   session_start();
   include("connect.php");
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>
    <title>Department</title>
</head>

<?php
    $DepartmentID = "";
    if(!empty($_GET['DepartmentID'])){
    $DepartmentID = $_GET['DepartmentID'];
    }//END if(!empty($_GET['DepartmentID']))
    $DepartmentName = "";
    $BtnName = "Save";
    $BtnClass = "primary";
    
if(!empty($DepartmentID)) {
  $BtnName = "Update";
  // echo $ButtonName = "Update";
  $BtnClass = "success";
  // echo $DiagonsticID;
    $DiagonsticQuery = "select * from department where DepartmentID = $DepartmentID";
    // echo $DiagonsticQuery;
    $DiagonsticExecute = $connect->query($DiagonsticQuery);
    $DiagonsticData = $DiagonsticExecute->fetch_assoc();
    // var_dump($DiagonsticData);
    $DepartmentID = $DiagonsticData['DepartmentID'];
    $DepartmentName = $DiagonsticData['DepartmentName'];

   }
?>


<body>

<?php
include("connect.php");
if(isset($_POST['Save'])){
$DeptName=$_POST['Name'];
$DateTime = date('Y/m/d H:m:s');

$insertquery =  "INSERT INTO `department`( `DepartmentName`, `DateTime`)
                 VALUES ('$DeptName','$DateTime')
                                         ";
$insertExcute = $connect->query($insertquery);

}

if(isset($_POST['Update']))
{

  $DeptName=$_POST['Name'];


 $UpdateQuery = " UPDATE department SET `DepartmentName`='$DeptName'
                                         WHERE
                                         DepartmentID = $DepartmentID
				 ";
$UpdateExecute = $connect->query($UpdateQuery);

if($UpdateExecute)
{
header("Location:Deparments.php");
}
}//END if(isset($_POST['Update']))


?>
<?php
include("nav.php");?>
<div class="container">

<form method="post" class="bg-light p-3 rounded" id="Form" >
  <div class="panel panel-primary " style="background-color:blue;">
    <div class="panel-body">Departments</div>
</div>


<center> 
		<style> 
input {
	<font face ="andulose" size="3%" color ="red"></font>
  width: 100%;
}
</style>
              
<div class="card">
  <div class="alert alert-danger" id="ValidationError" style="display:none;visibility:collapse;border-radius:10px;">  </div>
<div class="row">
            <div class="col-12 col-md-12">
            <label class="form-label" required>Department Name</label>
<input class="form-control" type="text" name="Name"  placeholder="Department Name" id="Name"  value="<?php echo $DepartmentName; ?>"><br>
</div>
<div class="col-12 col-md-12">
<br>
<input type="submit" name="<?php  echo $BtnName; ?>" value="<?php  echo $BtnName; ?>" style="width: 150px;" class="btn btn-<?php echo $BtnClass; ?>"onclick="return Validation();">
</div></div></div>
<div class="card">
<table style="margin-top:20px; width: 100%;" class="table table-striped table table-bordered"id="myTable">
<thead>
  <tr>
    <th>#</th>
    <th>Department Name </th>
    <th>Update</th>
    <!-- <th>Delete </th> -->
    
   

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
      <td> <a  href="Deparments.php?DepartmentID=<?php echo $z['DepartmentID']; ?>"><i class='fas fa-marker'></i></a>  
	  <!-- <td>  <a href="Deparments.php?DepartmentID=<?php echo $z['DepartmentID']; ?>>&Delete=Delete"><i class='fas fa-trash-alt'></i></a> -->


     
  </tr>
	
	<?php
     }
	?>
     <?php }      else {
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
<script>

    function Validation() {
      // alert("Montasir");
      if(document.forms['Form'].elements['Name'].value.length < 1 || document.forms['Form'].elements['Name'].value.length > 30 ) {
          document.getElementById('ValidationError').innerHTML = "Please Enter Department Name  ";
          document.getElementById('ValidationError').style.visibility = 'visible';
          document.getElementById('ValidationError').style.display =  'block';
          document.forms['Form'].elements['Name'].focus();
          // alert("Montasir");
          return false;
      }//END 
       }//END 
      </script>