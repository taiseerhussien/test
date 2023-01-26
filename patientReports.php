<!DOCTYPE html>
<html dir=ltr>
<?php 
   session_start();
   include("connect.php");
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>


<head>
  <?php
include("nav.php");?> 
<link rel="stylesheet" href="bootstrap.min.css">

    </div>
  </header><!-- End Header -->
</head>
<body>

<?php
include("connect.php");
?>


<center> 
		<style> 
input {
	<font face ="andulose" size="3%" color ="red"></font>
  width: 100%;
}
</style>

<div class="container d-flex justify-content-center align-items-center"
      style="min-height: 50vh">
      <form class="border shadow p-3 rounded"
      	      method="post" 
      	      style="width: 1000px;">
<table class="table table-striped table table-bordered" style="width:100%" id="myTable">
<thead>
  <tr>
  	<th>#</th>
        <th>Patient Name</th>
        <th>Patient age</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Gender</th>
        <th>Patient Type</th>
        <th>Date</th>
  </tr>
</thead>

	<?php 

	$x = "SELECT patient.PatientName,
    patient.Age,
    patient.address,
    patient.Phone,
    patient.Gender,
    patient.Patient_Type,
    patient.DateTime
			    FROM patient
          where status != 1
				order by  PatientName desc

	 	";
	$y = $connect->query($x);
	$counter = 0;
	while ($z = $y->fetch_assoc())
	 {
		# code...
    $FullDateTime = $z['DateTime'];
		$DateTime = date('Y-m-d',strtotime($FullDateTime));
    $counter = $counter+1;
		
	?>
    <tr>
    
    <td><?php echo $counter; ?></td>
    <td><?php echo $z['PatientName']; ?></td>   
      <td><?php echo $z['Age']; ?></td> 
      <td><?php echo $z['address']; ?></td>    
      <td><?php echo $z['Phone']; ?></td> 
      <td><?php echo $z['Gender']; ?></td> 
      <td><?php echo $z['Patient_Type']; ?></td>
      <td><?php echo $DateTime; ?></td>   
        
      
     
     
       

     
  </tr>
 
	
	<?php
     }
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
<?php } ?>
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
