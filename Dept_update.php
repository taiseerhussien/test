
<?php
include("connect.php");
$Issue = $_GET['dept_ID'];

$SelectQuery = "select * from department where DepartmentID = $Issue";
$SelectExecute = $connect->query($SelectQuery);

$Data  = $SelectExecute->fetch_assoc();

//var_dump($Data);

$IssueName = $Data['DepartmentName'];
$Date = $Data['DateTime'];

if(!empty($_GET['Delete']))
{
$DeleteQuery = "UPDATE department SET `status` = 1 where DepartmentID = $Issue";
$DeleteExecute = $connect->query($DeleteQuery);

if($DeleteExecute)
{

header("Location:Deparments.php");

}

}//END if(!empty($_GET['empDeleteID']))





if(isset($_POST['Update']))
{

$IssueName = $_POST['Pat_Name'];
$datetime = $_POST['DateTime'];

 $UpdateQuery = " UPDATE department SET `DepartmentName`='$IssueName',
                                        `DateTime`='$datetime'
                                         WHERE
                                         DepartmentID = $Issue
				 ";
$UpdateExecute = $connect->query($UpdateQuery);

if($UpdateExecute)
{
header("Location:Deparments.php");
}
}//END if(isset($_POST['Update']))



?>

<form method="POST">
<center>
<input name="Pat_Name" value="<?php echo $IssueName ;  ?>" >
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


