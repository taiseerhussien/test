<!DOCTYPE html>
<html dir=ltr>
<head>
<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<?php
include("nav.php");?>
    <title>cato</title>
</head>
<body>

<?php
include("connect.php");
if(isset($_POST['submit'])){
$IssueName=$_POST['issuename'];
$CategoryID=$_POST['category'];

$insertquery =  "INSERT INTO `issues`(`issue_name`,`category_id` )
                 VALUES ('$IssueName','$CategoryID')
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
              <h1 class="text-center p-3">Issues</h1>
<input class="form-control" type="text" name="issuename"  placeholder=" issuename"><br>
<br>
<select name="category" style="width:200px;  margin-top: 40px;" class="form-select">
<?php
  $x = "select * from categories";
  $y = $connect->query($x);
  while ($z = $y->fetch_assoc())
   {
    # code...
  
  ?>
  <option value="<?php echo $z['category_id']; ?>"><?php echo $z['category_name']; ?></option>
  <?php
     }
  ?> 
    </select>
    <br>
<input  class="btn btn-danger" type="submit" value="save" name="submit">
<table  style="margin-top:20px; width: 70px;" class="table table-striped table table-bordered"id="myTable">
<thead>
  <tr>
    <th>Issue No</th>
    <th>Issue name</th>
    <th>Cateogry Id </th>
    
    <th>Update</th>
    <th>delete </th>
   

  </tr>
</thead>
  <?php
	$x = "select * from issues where status = 0";
	$y = $connect->query($x);
	$counter = 0;
	while ($z = $y->fetch_assoc())
	 {
		# code...
		$counter = $counter+1;
	
	?>
	<tr>
    <td><?php echo $counter; ?></td>
    <td><?php echo $z['issue_name']; ?></td> 
 
      <td><?php echo $z['category_id']; ?></td> 
      <td> <a target="_blank" href="issue_update.php?Iss_ID=<?php echo $z['issue_id']; ?>">update </a>  
	  <td> <a target="_blank" href="issue_update.php?Iss_ID=<?php echo $z['issue_id']; ?>&Delete=Delete"> delete</a>
       

     
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
