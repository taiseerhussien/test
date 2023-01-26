<div class="form-popup" id="myForm">
  <form action="Doctors.php" class="form-container">

<?php
include("connect.php");
$Issue = $_GET['Doctor_ID'];

$SelectQuery = "select * from doctors where DoctorID = $Issue";
$SelectExecute = $connect->query($SelectQuery);

$Data  = $SelectExecute->fetch_assoc();

//var_dump($Data);

$IssueName = $Data['DoctorName'];
$Date = $Data['DateTime'];
$Doctoor = $Data['DoctorAge'];
$Gendder = $Data['Gender'];
$Addreess = $Data['Adderss'];
$PhoonNo = $Data['PhoneNo'];
$Emaiil = $Data['Email'];
$Departments = $Data['Department'];

if(!empty($_GET['Delete']))
{
$DeleteQuery = "UPDATE doctors SET `status` = 1 where DoctorID = $Issue";
$DeleteExecute = $connect->query($DeleteQuery);

if($DeleteExecute)
{

header("Location:Doctors.php");

}


}//END if(!empty($_GET['empDeleteID']))






if(isset($_POST['Update']))
{

$a = $_POST['Pat_Name'];
$b = $_POST['sysage'];
$c = $_POST['sysgen'];
$d = $_POST['sysadd'];
$e= $_POST['syspho'];
$f = $Data['toto'];
$g = $Data['deptt'];
$h = $_POST['DateTimee'];

 $UpdateQuery = " UPDATE doctors SET `DoctorName`='$a',
 `DoctorAge`='$b',
`Gender`='$c',
 `Adderss`='$d',
 `PhoneNo`='$e',
`Email`='$f',
 `Department`='$g',
                                        `DateTime`='$h'
                                         WHERE
                                         DoctorID = $Issue
				 ";
$UpdateExecute = $connect->query($UpdateQuery);

if($UpdateExecute)
{
header("Location: Doctors.php");
}
}//END if(isset($_POST['Update']))



?>

<form method="POST">
<center>
<input name="Pat_Name" value="<?php echo $IssueName ;  ?>" >
<br>
<input name="sysage" value="<?php echo $Doctoor ;  ?>" >
<br>
<input name="sysgen" value="<?php echo $Gendder ;  ?>" >
<br>
<input name="sysadd" value="<?php echo $Addreess ;  ?>" >
<br>
<input name="syspho" value="<?php echo $PhoonNo ;  ?>" >
<br>
<input name="toto" value="<?php echo $Emaiil ;  ?>" >
<br>
<input name="deptt" value="<?php echo $Departments ;  ?>" >
<br>
<input name="DateTimee" value="<?php echo $Date ;  ?>" >
<br>
<input type="submit" name="Update" value="Update">

</form>
<script src="bootstrap.bundle.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</div>
</body>

</html>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

</body>
</html>
