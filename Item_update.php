<?php
include("nav.php");?>
<?php
include("connect.php");
$Issue = $_GET['Issue_ID'];

$SelectQuery = "select * from items where ItemID = $Issue";
$SelectExecute = $connect->query($SelectQuery);

$Data  = $SelectExecute->fetch_assoc();

//var_dump($Data);

$IssueName = $Data['ItemName'];
$CatID = $Data['CategoryID'];
$userID = $Data['UserID'];
$Date = $Data['DateTime'];


if(!empty($_GET['Delete']))
{
$DeleteQuery = "UPDATE items SET `status` = 1 where ItemID = $Issue";
$DeleteExecute = $connect->query($DeleteQuery);

if($DeleteExecute)
{

header("Location:Items.php");

}

}//END if(!empty($_GET['empDeleteID']))





if(isset($_POST['Update']))
{

$IssueName = $_POST['ItemName'];
$Catid = $_POST['CategoryID'];
$userid = $_POST['UserID'];
$datetime = $_POST['DateTime'];


 $UpdateQuery = " UPDATE items SET `ItemName`='$IssueName',`CategoryID`='$Catid',`UserID`='$userid',`DateTime`='$datetime'
 WHERE  ItemID = $Issue
				 ";
$UpdateExecute = $connect->query($UpdateQuery);

if($UpdateExecute)
{
header("Location: Items.php");
}
}//END if(isset($_POST['Update']))



?>


<form method="POST">

<center>
<input name="ItemName" value="<?php echo $IssueName ;  ?>" >
<br>
<input name="CategoryID" value="<?php echo $CatID ;  ?>" >
<br>
<input name="UserID" value="<?php echo $userID ;  ?>" >
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


