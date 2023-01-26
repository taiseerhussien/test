

<?php
include("connect.php");
$Issue = $_GET['Patient_ID'];

$SelectQuery = "select * from patient where PatientID = $Issue";
$SelectExecute = $connect->query($SelectQuery);

$Data  = $SelectExecute->fetch_assoc();

//var_dump($Data);

$IssueName = $Data['PatientName'];
$CatID = $Data['Age'];
$userID = $Data['Address'];
$telephone = $Data['Phone'];
$type = $Data['Gender'];
$users = $Data['PatientID'];
$Date = $Data['DateTime'];


if(!empty($_GET['Delete']))
{
$DeleteQuery = "UPDATE patient SET `status` = 1 where PatientID = $Issue";
$DeleteExecute = $connect->query($DeleteQuery);

if($DeleteExecute)
{

header("Location:patients.php");

}

}//END if(!empty($_GET['empDeleteID']))





if(isset($_POST['Update']))
{

$IssueName = $_POST['Pat_Name'];
$Catid = $_POST['Pat_Age'];
$userid = $_POST['Pat_add'];
$phoneNumber = $_POST['Pat_phone'];
$Gen = $_POST['Pat_gen'];
$user = $_POST['Pat_Users'];
$datetime = $_POST['DateTime'];


 $UpdateQuery = " UPDATE patient SET `PatientName`='$IssueName',
                                             `Age`='$Catid',
                                         `Address`='$userid',
                                           `Phone`='$phoneNumber',
                                          `Gender`='$Gen',
                                          `PatientID`='$user',
                                        `DateTime`='$datetime'
                                         WHERE
                                         PatientID = $Issue
				 ";
$UpdateExecute = $connect->query($UpdateQuery);

if($UpdateExecute)
{
header("Location: patients.php");
}
}//END if(isset($_POST['Update']))



?>

<form method="POST">
<center>
<input name="Pat_Name" value="<?php echo $IssueName ;  ?>" >
<br>
<input name="Pat_Age" value="<?php echo $CatID ;  ?>" >
<br>
<input name="Pat_add" value="<?php echo $userID ;  ?>" >
<br>
<input name="Pat_phone" value="<?php echo $telephone ;  ?>" >
<br>
<input name="Pat_gen" value="<?php echo $type ;  ?>" >
<br>
<input name="Pat_Users" value="<?php echo $users ;  ?>" >
<br>
<input name="DateTime" value="<?php echo $Date ;  ?>" >
<br>
<input type="submit" name="Update" value="Update">

</form>
<script src="bootstrap.bundle.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>


