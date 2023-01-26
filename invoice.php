<!DOCTYPE html>
<html>
<head>
	<!-- <title>Invoice Template Design</title> -->
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php
include("connect.php");
$Issue = $_GET['PrescriptionID'];

$SelectQuery = "select prescription.*,patient.PatientID,patient.PatientName,patient.Age,
doctors.DoctorID,doctors.DoctorName 
from prescription,patient,doctors
where prescription.Status = 0 
AND  patient.PatientID = prescription.PatientsID 
AND doctors.DoctorID = prescription.DoctorID";
$SelectExecute = $connect->query($SelectQuery);

$Data  = $SelectExecute->fetch_assoc();

//var_dump($Data);

$HDescription = $Data['Description'];
$PatientName = $Data['PatientName'];
$DoctorName = $Data['DoctorName'];
$Age = $Data['Age'];


if(!empty($_GET['Delete']))
{
$DeleteQuery = "UPDATE prescription SET `status` = 1 where PrescriptionID = $Issue";
$DeleteExecute = $connect->query($DeleteQuery);

if($DeleteExecute)
{

header("Location:prescription.php");

}

}//END if(!empty($_GET['empDeleteID']))

if(isset($_POST['Update']))
{

$TDescription=$_POST['TOTO'];
   
 $UpdateQuery = " UPDATE prescription SET `Description`='$TDescription'
                                       
                                         WHERE
                                         PrescriptionID = $Issue
				 ";
$UpdateExecute = $connect->query($UpdateQuery);

if($UpdateExecute)
{
header("Location:prescription.php");
}
}//END if(isset($_POST['Update']))



?>

<form method="POST">
<center>
<br>

</form>
<script src="bootstrap.bundle.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>







<div class="wrapper">
	<div class="invoice_wrapper">
		<div class="header">
			<div class="logo_invoice_wrap">
				<div class="logo_sec">
					<img src="N.jpg" style="width:30%;" alt="code logo">
					<div class="title_wrap">
						<p class="title bold">Dental Clinical</p>
						<p class="sub_title">Nahda College</p>
					</div>
				</div>
				<div class="invoice_sec">
					<p class="invoice bold">Prescription</p>
					
					<p class="date">
						<span class="bold">Date</span>
						<span>08/Jan/2022</span>
					</p>
				</div>
			</div>
			<div class="bill_total_wrap">
				<div class="bill_sec">
					<p>Patient Name</p> 
	          		<p class="bold name"><?php echo $PatientName ;  ?></p>

				<div class="bill_sec">
					<p>Patient Age</p> 
	          		<p class="bold name"><?php echo $Age ;  ?></p>
				</div>
			</div>
		</div>
		<div class="body">
			<div class="main_table">
				<div class="table_header">
					<div class="row">
						<div class="col col_des">DESCRIPTION</div>
						
					</div>
				</div>
				<div class="table_body">
					<div class="row">
						
						<div class="col col_des">
							<p class="bold"><?php echo $HDescription ;  ?></p>
							
						</div>
						
					</div>
				</div>
			</div>
			<div class="paymethod_grandtotal_wrap">
				<div class="paymethod_sec">
					<p class="bold">Reg.No</p>
					<p>58794526</p>
				</div>
				<div class="paymethod_sec">
					<p class="bold">Dr.Name</p>		
					<p><?php echo $DoctorName ;  ?></p>
				</div>
			</div>
		</div>
		<div class="footer">
			<p> العنوان :امتداد الدرجة الثالثةولاية الخرطوم غرب تقاطع شارع الصحافة شرق مع كنار</p>
			<div class="terms">
		        <p class="tc bold">0183403586: رقم التلفون</p>
		    </div>
		</div>
	</div>
</div>

<button id="PrintButton" onclick="print();">Print</button>
</body>
</html>
<style>
	@media print {
		#PrintButton {
			display: none;
		}
	}
</style>



<!-- 
<script>
	hidebutton(){
		alert("HHHHHHHHHHHHHHHHHHHHH");
	}
</script> -->