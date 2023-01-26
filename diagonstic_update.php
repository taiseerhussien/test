
<?php
include("connect.php");
$Issue = $_GET['diagonstic_ID'];

$SelectQuery = "select * from diagonstic where DiagonsticID = $Issue";
$SelectExecute = $connect->query($SelectQuery);

$Data  = $SelectExecute->fetch_assoc();

//var_dump($Data);

$HDepatmentID = $Data['DepatmentID'];
$HDiagon = $Data['Diagonsis'];
$HPlanTretment = $Data['PlanTretment'];

if(!empty($_GET['Delete']))
{
$DeleteQuery = "UPDATE diagonstic SET `status` = 1 where DiagonsticID = $Issue";
$DeleteExecute = $connect->query($DeleteQuery);

if($DeleteExecute)
{

header("Location:diagonstic.php");

}

}//END if(!empty($_GET['empDeleteID']))

if(isset($_POST['Update']))
{

$CDiagonsis = $_POST['x'];
$CPlanTretment = $_POST['y'];

   
 $UpdateQuery = " UPDATE diagonstic SET  `Diagonsis`='$CDiagonsis',
                                        `PlanTretment`='$CPlanTretment'
                                       
                                         WHERE
                                         DiagonsticID = $Issue
				 ";
$UpdateExecute = $connect->query($UpdateQuery);

if($UpdateExecute)
{
header("Location:diagonstic.php");
}
}//END if(isset($_POST['Update']))



?>

<form method="POST">
<center>
    <br><br><br>
<input name="x" value="<?php echo $HDiagon;  ?>" >
<br>
<input name="y" value="<?php echo $HPlanTretment ;  ?>" >
<br>
<input type="submit" name="Update" value="Update">

</form>
<script src="bootstrap.bundle.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>


