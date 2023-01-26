<?php  
session_start();
include("connect.php");

if (isset($_POST['username']) && isset($_POST['password'])) {

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$username = test_input($_POST['username']);
	$password = test_input($_POST['password']);
	$role = test_input($_POST['role']);

	if (empty($username)) {
		header("Location:index.php?error=User Name is Required");
	}else if (empty($password)) {
		header("Location:index.php?error=Password is Required");
	}else {

		// Hashing the password
		$password = md5($password);
        
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        echo $sql;
        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) === 1) {
        	// the user name must be unique
        	$row = mysqli_fetch_assoc($result);
        	if ($row['password'] === $password ) {
        		$_SESSION['name'] = $row['name'];
        		$_SESSION['id'] = $row['id'];
        		$_SESSION['role'] = $row['role'];
        		$_SESSION['username'] = $row['username'];
        		// if($_SESSION['role'] == 1){
	        		header("Location:home.php");
        		// }
        		// else if($_SESSION['role'] == 2) {
        		// 	header("Location:home-admin.php");
        		// }

        	}else {
        		header("Location:index.php?error=Incorect User name or password");
        	}
        }else {
        	header("Location:index.php?error=Incorect User name or password");
        }

	}
	
}else {
	header("Location:index.php");
}