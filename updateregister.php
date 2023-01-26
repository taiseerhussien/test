<div class="form-popup" id="myForm">
  <form action="users.php" class="form-container">

<?php
include("connect.php");
$Issue = $_GET['User_ID'];

$SelectQuery = "select * from users where id = $Issue";
$SelectExecute = $connect->query($SelectQuery);

$Data  = $SelectExecute->fetch_assoc();

//var_dump($Data);

$IssueRole = $Data['role'];
$Issueuser = $Data['username'];
$Issusepass = $Data['password'];
$FullName = $Data['name'];


if(!empty($_GET['Delete']))
{
$DeleteQuery = "UPDATE users  where id = $Issue";
$DeleteExecute = $connect->query($DeleteQuery);

if($DeleteExecute)
{

header("Location: register.php");

}


}//END if(!empty($_GET['empDeleteID']))





if(isset($_POST['Update']))
{

$a = $_POST['Pat_Name'];
$b = $_POST['sysage'];
$c = $_POST['sysgen'];
$d = $_POST['sysadd'];


 $UpdateQuery = " UPDATE users SET `role`='$a',
 `username`='$b',
`password`='$c',
 `name`='$d'

                                         WHERE
                                         id = $Issue
				 ";
$UpdateExecute = $connect->query($UpdateQuery);

if($UpdateExecute)
{
header("Location: register.php");
}
}//END if(isset($_POST['Update']))



?>

<form method="POST">
<center>
<input name="Pat_Name" value="<?php echo $IssueRole ;  ?>" >
<br>
<input name="sysage" value="<?php echo $Issueuser ;  ?>" >
<br>
<input name="sysgen" value="<?php echo $Issusepass ;  ?>" >
<br>
<input name="sysadd" value="<?php echo $FullName  ;  ?>" >
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
