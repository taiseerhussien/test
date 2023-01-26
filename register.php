<!DOCTYPE html>
<html dir=ltr>
<head>
	<meta charset="UTF-8">
<link rel="stylesheet" href="bootstrap.min.css">
<title>Dental Clinical</title>

<?php 
   session_start();
   include("connect.php");
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>
<?php
    $id = "";
    if(!empty($_GET['id'])){
      $id = $_GET['id'];
    }//END if(!empty($_GET['id']))
    $TypeUser = "";
    $TypeAdmin = "";
    $role = "";
    $username = "";
    $password = "";
    $name = "";
    $User_Type =  "";
    $ButtonName = "Save";
    $BtnClass = "primary";
    
if(!empty($id)) {
  $ButtonName = "Update";
  // echo $ButtonName = "Update";
  $BtnClass = "success";
  // echo $DiagonsticID;
    $DiagonsticQuery = "select * from users where id = $id";
    // echo $DiagonsticQuery;
    $DiagonsticExecute = $connect->query($DiagonsticQuery);
    $DiagonsticData = $DiagonsticExecute->fetch_assoc();
    // var_dump($DiagonsticData);
    $id = $DiagonsticData['id'];
    $role = $DiagonsticData['role'];
    $username = $DiagonsticData['username'];
    $password = $DiagonsticData['password'];
    $name = $DiagonsticData['name'];
    $User_Type =  $DiagonsticData['role'];
    $TypeUser = "";
    $TypeAdmin = "";
          if($User_Type == "admin") {
            $TypeAdmin = "selected";
        }//END if($Patient_Type == "admin")
        else if($User_Type == "user") {
            $TypeUser = "selected";
        }//END else if($Patient_Type == "user")
        
   

   }
?>
</head>
<body>
<?php
include("connect.php");
if(isset($_POST['Save'])){
$Rule=$_POST['status'];
$UserName=$_POST['user_name'];
$Pass=md5($_POST['pa$$w0rd']);
$FullName=$_POST['fulname'];
$insertquery =  "INSERT INTO `users`( `role`,`username`,`password`,`name`) VALUES('$Rule','$UserName','$Pass','$FullName')";
$insertExcute = $connect->query($insertquery);

}



if(isset($_POST['Update']))
{

$Rule=$_POST['status'];
$UserName=$_POST['user_name'];

if(!empty($_POST['pa$$w0rd'])) {
  $Pass=md5($_POST['pa$$w0rd']);
  // echo "2222222222222222222222222";
}//END if(!empty($_POST['pa$$w0rd']))
else {
  $Pass = $_POST['OldPassword'];
  // echo "3333333333333333333333333333";
}
$FullName=$_POST['fulname'];;


 $UpdateQuery = " UPDATE users SET `role`='$Rule',
 `username`='$UserName',
`password`='$Pass',
 `name`='$FullName'
 
  WHERE    id = $id
				 ";
$UpdateExecute = $connect->query($UpdateQuery);

if($UpdateExecute)
{
header("Location: register.php");
}
}//END if(isset($_POST['Update']))







?>

<?php
	
}
?>
<?php
include("nav.php");?>
<div class="container"><br>
<div class="alert alert-danger" id="ValidationError" style="display:none;visibility:collapse;border-radius:10px;">  </div>
<form method="post" class="bg-light p-3 rounded" id="Form" >
<div class="panel">
  <div class="panel panel-primary " style="background-color:#0d6efd;color:white; font-size:22px; text-align:center ; width:80%;margin:0 auto; min-height:40px; border-radius:8px;border-color:#D09D05;border-width:2px;margin-bottom:10px;padding: 1px 10px 10px 10px;">
    <div class="panel-body">Register</div>
  </div></div>
<center> 
		<style> 
input {
	<font face ="andulose" size="3%" color ="red"></font>
  width: 100%;
}
</style>
<div class="card">
<input type="hidden" name="id" id="id" value="<?php echo $id;?>">

<div class="row">
            <div class="col-12 col-md-6">
                <label class="form-label" required>Name</label>
<input class="form-control" type="text" name="user_name" id="user_name" placeholder=" Username" value="<?php echo $name;?>"><br>
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label" required>Password</label>
<input class="form-control" type="password" name="pa$$w0rd" id="password" placeholder="password"><br>
            </div>
            <input type="hidden" name="OldPassword" id="OldPassword" value="<?php echo $password; ?>">
            <div class="row">
            <div class="col-12 col-md-6">
                <label class="form-label" required>FullName</label>

<input class="form-control" type="text" name="fulname" id="fulname" placeholder=" Fullname" value="<?php echo $username;?>"><br>
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label" required>Select User Type</label>
<select class="form-select mb-3"
		          name="status" 
		          aria-label="Default select example"id="User" >
              <option>User_Type</option>
      <option value="User" <?php echo $TypeUser; ?>>User</option>
      <option value="Admin" <?php echo $TypeAdmin; ?>>Admin</option>
			  
		  </select>
            </div>
            <div class="button">
            <input type="submit" name="<?php  echo $ButtonName; ?>" value="<?php  echo $ButtonName; ?>" style="width: 150px;" class="btn btn-<?php echo $BtnClass; ?>"onclick="return Validation();">
</div>
</div>
</div>
</div>
<div class="card">
<table  style="margin-top:20px; width: 100%;" class="table table-striped table table-bordered"id="myTable">
<thead>

  <tr>
    <th>#</th>
    <th>username</th>
    <th>name</th>
    <th>role</th>
    <th>Update</th>
    <!-- <th>delete </th> -->
  </tr>
</thead>
  <?php
	$x = "select * from users ";
	$y = $connect->query($x);
	$counter = 0;
	while ($z = $y->fetch_assoc())
	 {
		# code...
		$counter = $counter+1;
	
	?>
	<tr>
    <td><?php echo $counter; ?></td>
      <td><?php echo $z['username']; ?></td>
      <td><?php echo $z['name']; ?></td>
      <td><?php echo $z['role']; ?></td>
      <td> <a  href="register.php?id=<?php echo $z['id']; ?>"><i class='fas fa-marker'></i></a>  
	  <!-- <td> <a  href="register.php?id=<?php echo $z['id']; ?>&Delete=Delete"><i class='fas fa-trash-alt'></i></a> -->
       

     
  </tr>
 
	
	<?php
     }
	?>

     </table>
    </div>
  </form>
  <link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="pagination/table_pagin2.css">

<link rel="stylesheet" href="pagination/table_pagin2">
  <script src="pagination/jquery-3.5.1.min.js"></script>
  <script src="pagination/table_pagin2.js"></script>
  <script src="pagination/table_pagin4.js"></script>
<script>
$('#myTable').dataTable( {

    // "language" :{
    //   "info": "MMMM _START_ to _END_ NNN _TOTAL_ KKKK",
    //  }  ,

   /*

       "oLanguage": {
      // "aaSorting": [[ 10, "desc" ]],
      // "bJQueryUI": true,
      // "sLengthMenu": [["25", "50", "100", "250", "500", "-1"], ["25", "50", "100", "250", "500", "All"]],
      "sLengthMenu": "عرض  _MENU_ سجلات",
      "sSearch": "بحث: ",
      "sZeroRecords" : "لا توجد بيانات لعرضها",
      "sInfo" : "عدد السجلات  _TOTAL_ , المعروض ( من  _START_ إلى   _END_)",
      "sInfoEmpty" : "", 
    "oPaginate":{
      'sShowing' : "عرض"  ,
      'sNext' : "التالي" ,
      'sPrevious' : 'السابق'  ,
    }
    
    },
   */

});

</script>
<style>

.card{
  width:90%;
  border-radius:8px;
  border-color:#D09D05;
  border-width:2px;
  margin-bottom:10px;
  padding: 10px 10px 10px 10px;
}
th,td{
  text-align:center;

}
</style>
  <script src="bootstrap.bundle.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<script>

    function Validation() {
      
      if(document.forms['Form'].elements['user_name'].value < 2 || document.forms['Form'].elements['user_name'].value > 80 ) {
          document.getElementById('ValidationError').innerHTML = "  Please Enter Your Name   ";
          document.getElementById('ValidationError').style.visibility = 'visible';
          document.getElementById('ValidationError').style.display =  'block';
          document.forms['Form'].elements['user_name'].focus();
          // alert("Montasir");
          return false;
      }//END user name
      
      if(  document.forms['Form'].elements['id'].value = '' && ( document.forms['Form'].elements['password'].value.length < 1 || document.forms['Form'].elements['password'].value.length > 30) ) {
          document.getElementById('ValidationError').innerHTML = "  Please Enter Your Password";
          document.getElementById('ValidationError').style.visibility = 'visible';
          document.getElementById('ValidationError').style.display =  'block';
          document.forms['Form'].elements['password'].focus();
          // alert("Montasir");
          return false;
      }//END password

      if(document.forms['Form'].elements['fulname'].value.length < 1 || document.forms['Form'].elements['fulname'].value.length > 30 ) {
          document.getElementById('ValidationError').innerHTML = "Please Enter Your Full Name  ";
          document.getElementById('ValidationError').style.visibility = 'visible';
          document.getElementById('ValidationError').style.display =  'block';
          document.forms['Form'].elements['fulname'].focus();
          // alert("Montasir");
          return false;
      }//END fulname
      
      
      if(document.forms['Form'].elements['Dept'].value == '-1') {
          document.getElementById('ValidationError').innerHTML = "  الرجاء اختيار القسم ";
          document.getElementById('ValidationError').style.visibility = 'visible';
          document.getElementById('ValidationError').style.display =  'block';
          document.forms['Form'].elements['Dept'].focus();
          // alert("Montasir");
          return false;
      }//END 


      
      

    }//END 


</script>