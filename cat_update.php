<?php
include("nav.php");?>
<?php
include("connect.php");
$cato = $_GET['cat_ID'];

$SelectQuery = "select * from categories where CategoryID = $cato";
$SelectExecute = $connect->query($SelectQuery);

$Data  = $SelectExecute->fetch_assoc();

//var_dump($Data);

$CatName = $Data['CategoryName'];
$CatID = $Data['UserID'];


if(!empty($_GET['Delete']))
{
$DeleteQuery = "UPDATE categories SET `status` = 1 where CategoryID = $cato";
$DeleteExecute = $connect->query($DeleteQuery);

if($DeleteExecute)
{

header("Location:categories.php");

}

}//END if(!empty($_GET['empDeleteID']))





if(isset($_POST['Update']))
{

$CatName = $_POST['CategoryName'];
$Catid = $_POST['UserID'];


 $UpdateQuery = " UPDATE categories SET `CategoryName`='$CatName',`UserID`='$Catid'
 WHERE  CategoryID = $cato
				 ";
$UpdateExecute = $connect->query($UpdateQuery);

if($UpdateExecute)
{
header("Location: categories.php");
}
}//END if(isset($_POST['Update']))



?>


<form method="POST">

<center>
<input name="CategoryName" value="<?php echo $CatName ;  ?>" >
<br>
<input name="UserID" value="<?php echo $CatID ;  ?>" >
<input type="submit" name="Update" value="Update">

</form>
<script src="bootstrap.bundle.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>


