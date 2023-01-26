<?php
include("nav.php");?>
<?php
include("connect.php");
$Issue = $_GET['pre_ID'];

$SelectQuery = "select * from prescription where PrescriptionID = $Issue";
$SelectExecute = $connect->query($SelectQuery);

$Data  = $SelectExecute->fetch_assoc();

//var_dump($Data);

$HDescription = $Data['Description'];



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
<input name="TOTO" value="<?php echo $HDescription ;  ?>" >
<br>
<input type="submit" name="Update" value="Update">

</form>
<script src="bootstrap.bundle.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>


