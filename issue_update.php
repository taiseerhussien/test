<?php
include("nav.php");?>
<?php
include("connect.php");
$iss = $_GET['Iss_ID'];

$SelectQuery = "select * from issues where issue_id = $iss";
$SelectExecute = $connect->query($SelectQuery);

$Data  = $SelectExecute->fetch_assoc();

//var_dump($Data);

$IssName = $Data['issue_name'];


if(!empty($_GET['Delete']))
{
$DeleteQuery = "UPDATE issues SET `status` = 1 where issue_id = $iss";
$DeleteExecute = $connect->query($DeleteQuery);

if($DeleteExecute)
{

header("Location:issues.php");

}

}//END if(!empty($_GET['empDeleteID']))





if(isset($_POST['Update']))
{

$issueName = $_POST['issuename'];


 $UpdateQuery = " UPDATE issues SET `issue_name`='$issueName'
 WHERE  issue_id = $iss
				 ";
$UpdateExecute = $connect->query($UpdateQuery);

if($UpdateExecute)
{
header("Location: issues.php");
}
}//END if(isset($_POST['Update']))



?>


<form method="POST">

<center>
<input name="issuename" value="<?php echo $IssName ;  ?>" >
<br>

<input type="submit" name="Update" value="Update">

</form>
<script src="bootstrap.bundle.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>


