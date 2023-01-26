<!DOCTYPE html>
<html dir=ltr>
<head>
   
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
        <th>Doctor Name</th>
        <th>PatientName</th>
        <th>DateTime</th>
  </tr>
</thead>

	<?php 

	$x = "SELECT patient.PatientName,patient.DateTime,
    doctors.DoctorName
    
			    FROM patient,doctors
                where PatientID=DoctorID
				order by  DoctorName desc

	 	";
	$y = $connect->query($x);
	$counter = 0;
	while ($z = $y->fetch_assoc())
	 {
		# code...
		$counter = $counter+1;
		
	?>
    <tr>
    
    <td><?php echo $counter; ?></td>   
      <td><?php echo $z['DoctorName']; ?></td> 
      <td><?php echo $z['PatientName']; ?></td>
      <td><?php echo $z['DateTime']; ?></td>
     
     
       

     
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
