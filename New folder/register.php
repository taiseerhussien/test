<!DOCTYPE html>
<html dir=ltr>
<head>
<link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
<?php
include("connect.php");
if(isset($_POST['submit'])){
$UserName=$_POST['user_name'];
$Pass=md5($_POST['pa$$w0rd']);
$FullName=$_POST['fulname'];
$insertquery =  "INSERT INTO `users`( `username`, `password`, `name`) VALUES('$UserName','$Pass','$FullName')";
$insertExcute = $connect->query($insertquery);

}
?>


<center> 
		<style> 
input {
	<font face ="andulose" size="3%" color ="red"></font>
  width: 100%;
}
</style>
<div class="container d-flex justify-content-center align-items-center"
      style="min-height: 100vh">
      	<form class="border shadow p-3 rounded" 
      	      method="post" 
      	      style="width: 450px;">
      	      <h1 class="text-center p-3">Register</h1>
<input class="form-control" type="text" name="user_name"  placeholder=" Username"><br>
<input class="form-control" type="password" name="pa$$w0rd"  placeholder="password"><br>
<input class="form-control" type="text" name="fulname"  placeholder=" Fullname"><br>
<input  type="submit"  class="btn btn-primary" value="save" name="submit">
</form>

</body>
</html>
