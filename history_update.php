<?php
include("nav.php");?>
<?php
include("connect.php");
$Issue = $_GET['His_ID'];

$SelectQuery = "select * from patienthistory where HistoryID = $Issue";
$SelectExecute = $connect->query($SelectQuery);

$Data  = $SelectExecute->fetch_assoc();

//var_dump($Data);

$HDescripe=$Data['Description'];

if(!empty($_GET['Delete']))
{
$DeleteQuery = "UPDATE patienthistory SET `status` = 1 where HistoryID = $Issue";
$DeleteExecute = $connect->query($DeleteQuery);

if($DeleteExecute)
{

header("Location:Patienthistory.php");

}

}//END if(!empty($_GET['empDeleteID']))





if(isset($_POST['Update']))
{

$PatPhone=$_POST['descripes'];
    


 $UpdateQuery = " UPDATE patienthistory SET `Description`='$PatPhone'
                                       
                                         WHERE
                                         HistoryID = $Issue
				 ";
$UpdateExecute = $connect->query($UpdateQuery);

if($UpdateExecute)
{
header("Location: Patienthistory.php");
}
}//END if(isset($_POST['Update']))



?>

<form method="POST">
<center>
<input name="descripes" value="<?php echo $HDescripe ;  ?>" >
<br>
<input type="submit" name="Update" value="Update">

</form>
<script src="bootstrap.bundle.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>


