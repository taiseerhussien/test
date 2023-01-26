<!DOCTYPE html>
<html dir=ltr>
<head>
<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="fontawesome/css/all.min.css">
<link rel="stylesheet" href="bootstrap-icons/font/bootstrap-icons.css">
<script src="bootstrap.bundle.min.js"></script>
    
  <title>Dental Clinical </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php 
   session_start();
   include("connect.php");
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>

<?php
    $DiagonsticID = "";
    if(!empty($_GET['Doctor_ID'])){
      $DiagonsticID = $_GET['Doctor_ID'];
    }//END if(!empty($_GET['diagonstic_ID']))
    $DoctorName = "";
    $DoctorAge = "";
    $Gender = "";
    $Adderss = "";
    $PhoneNo = "";
    $Email = "";
    $Department = "";
    $male = "";
$female = "";
    $ButtonName = "Save";
    $BtnClass = "primary";
    
if(!empty($DiagonsticID)) {
  $ButtonName = "Update";
  // echo $ButtonName = "Update";
  $BtnClass = "success";
  // echo $DiagonsticID;
    $DiagonsticQuery = "select * from doctors where DoctorID = $DiagonsticID";
    // echo $DiagonsticQuery;
    $DiagonsticExecute = $connect->query($DiagonsticQuery);
    $DiagonsticData = $DiagonsticExecute->fetch_assoc();
    // var_dump($DiagonsticData);
    $DiagonsticID = $DiagonsticData['DoctorID'];
    $DoctorName = $DiagonsticData['DoctorName'];
    $DoctorAge = $DiagonsticData['DoctorAge'];
    $Gender = $DiagonsticData['Gender'];
    $Adderss = $DiagonsticData['Adderss'];
    $PhoneNo = $DiagonsticData['PhoneNo'];
    $Email = $DiagonsticData['Email'];
    $Department = $DiagonsticData['Department'];

    if($Gender == 'male') {
      $male = "checked";
  }//END if($Gender == 'male')
  else if($Gender == 'female') {
      $female = "checked";
  }//END else if($Gender == 'female')
   }
?>
<title>Doctors</title>
</head>
<body>

<?php
include("connect.php");
if(isset($_POST['Save'])){
$DeptName=$_POST['Name'];
$DocAge=$_POST['agee'];
$Gendeer=$_POST['Genders'];
$Adders=$_POST['Addeers'];
$PhNo=$_POST['Tele'];
$Emails=$_POST['mail'];
$DepID=$_POST['Dept'];
$DateTime = date('Y/m/d H:m:s');
$UserID = $_SESSION['id'];


$insertquery = " INSERT INTO `doctors`(`DoctorName`,
 `DoctorAge`, `Gender`, `Adderss`,
 `PhoneNo`, `Email`,`Department`, `DateTime`,`UserID`)
 
         VALUES ('$DeptName','$DocAge','$Gendeer','$Adders','$PhNo','$Emails','$DepID','$DateTime','$UserID')
                                         ";
$insertExcute = $connect->query($insertquery);

}


if(isset($_POST['Update']))
{

  $DeptName=$_POST['Name'];
  $DocAge=$_POST['agee'];
  $Gendeer=$_POST['Genders'];
  $Adders=$_POST['Addeers'];
  $PhNo=$_POST['Tele'];
  $DepID=$_POST['Dept'];
  $Emails=$_POST['mail'];

 $UpdateQuery = " UPDATE doctors SET `DoctorName`='$DeptName',
 `DoctorAge`='$DocAge',
`Gender`='$Gendeer',
 `Adderss`='$Adders',
 `PhoneNo`='$PhNo',
`Email`='$Emails',
 `Department`='$DepID'
                                         WHERE
                                         DoctorID = $DiagonsticID
				 ";
$UpdateExecute = $connect->query($UpdateQuery);

if($UpdateExecute)
{
header("Location: Doctors.php");
}
}//END if(isset($_POST['Update']))




?>
<?php
include("nav.php");?>
<div class="container bg-light"><br>
<div class="panel">
  <div class="panel panel-primary " style="background-color:#0d6efd;color:white; font-size:22px; text-align:center ; width:80%;margin:0 auto; min-height:40px; border-radius:8px;border-color:#D09D05;border-width:2px;margin-bottom:10px;padding: 1px 10px 10px 10px;">
    <div class="panel-body">Doctors</div>
  </div></div>
<div class="card"  style="margin-top: 20px; min-height:0px;">
<center> 
		<style> 
input {
	<font face ="andulose" size="3%" color ="red"></font>
  width: 80%;
}
</style>

<section class="container">
<div class="alert alert-danger" id="ValidationError" style="display:none;visibility:collapse;border-radius:10px;">  </div>
<form method="post" class=" p-3 rounded" id="Form" >
<input type="hidden" name="DiagonsticID" id="DiagonsticID" value="<?php echo $DiagonsticID;?>">
      <div class="row">
            <div class="col-12 col-md-6">
                <label class="form-label" required>Name</label>
                <input type="text" name="Name" id="Name" class="form-control" value="<?php echo $DoctorName;?>">
             
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label" >Age</label>
                <input type="number" name="agee" id="Age" class="form-control" value="<?php echo $DoctorAge;?>">
            </div>
      </div>
      <div class="row">
            <div class="col-12 col-md-6" style="margin-top:25px;">
                <label class="form-label">Gender</label>
                <input type="radio" name="Genders" value="male"  id="Male" <?php echo $male; ?> >Male
                <input type="radio" name="Genders" value="female" id="Female" <?php echo $female; ?> >female   
            </div>
            
            <div class="col-12 col-md-6">
                <label class="form-label">Phone Number</label>
	              <input type="tel" name="Tele" class="form-control"  placeholder="+249" maxlength ="11" minlength ="11" value="<?php echo $PhoneNo;?>"> </div>
      </div>
      <div class="row"> 
            <div class="col-12 col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="mail" class="form-control" id="Email" value="<?php echo $Email;?>">
            </div>

            <div class="col-12 col-md-6">
               <label class="form-label">Department</label>
                <select class="form-select" name="Dept" id="Dept">
                 <option  value="-1"> -- Select  -- </option>
                  <?php
                    $x = "select * from department";
                     $y = $connect->query($x);
                      while ($z = $y->fetch_assoc())
                      {
                        # code...
                        $DoctorSelected = "";
                        if($Department == $z['DepartmentID']) {
                            $DoctorSelected = "Selected";
                        }//END if($DoctorID == $z['DoctorID'])
                  ?>
                        <option <?php echo $DoctorSelected; ?> value="<?php echo $z['DepartmentID']; ?>"><?php echo $z['DepartmentName'];?></option>
                        <?php
                        $DoctorSelected = "";
                          }
                        ?>
                 </select> <br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"> </div>
            <div class="col-md-6">
                <label class="form-label">Address</label>
                <textarea name="Addeers"class="form-control" id="Address" <?php echo $Adderss;?>></textarea>
            </div>
            <div class="col-md-3"> </div>
        </div>
          <br>
          
      
        <div class="button">
        <input type="submit" name="<?php  echo $ButtonName; ?>" value="<?php  echo $ButtonName; ?>" style="width: 150px;" class="btn btn-<?php echo $BtnClass; ?>"onclick="return Validation();">
        
        </div>
    </form>



<?php

$x1 = "select count(*) as Total from doctors where status = 0";
$y1 = $connect->query($x1);
$Counter = 0;
$z1 = $y1->fetch_assoc();
$Counter = $z1['Total'];
//var_dump($Counter);

if($Counter > 0) {
?>
</div>
<br>
<div class="card">
<div class="table-responsive">
    <table  style="margin-top:20px; width: 100%;"  class="table table-striped table table-bordered"id="myTable">
    <thead>
      <tr>
        <th>#</th>
        <th>Doctors Name </th>
        <th>Doctor Age </th>
        <th>Gender </th>
        <th>Adderss </th>
        <th>Phone</th>
        <th>Email </th>
        <th>Department </th>
        <th>Update</th>
        <!-- <th>Delete </th> -->
      </tr>
    </thead>
      <?php
      $x = "select doctors.*,department.DepartmentName,doctors.DoctorID,department.DepartmentID
        from doctors ,department
        where doctors.status = 0 
        AND
        doctors.DoctorID=department.DepartmentID
        ";
      $y = $connect->query($x);
      $counter = 0;
      while ($z = $y->fetch_assoc())
      {
        # code...
        $counter = $counter+1;
      
      ?>
      <tr>
        <td align="center"><?php echo $counter; ?></td>
          <td><?php echo $z['DoctorName']; ?></td> 
          <td><?php echo $z['DoctorAge']; ?></td> 
          <td><?php echo $z['Gender']; ?></td> 
          <td><?php echo $z['Adderss']; ?></td> 
          <td><?php echo $z['PhoneNo']; ?></td> 
          <td><?php echo $z['Email']; ?></td> 
          <td><?php echo $z['DepartmentName']; ?></td> 
          <td> <a  onclick="openForm()"  href="doctors.php?Doctor_ID= <?php echo $z['DoctorID']; ?>"><i class='fas fa-marker'></i></a>  
        <!-- <td> <a  onclick="openForm()"  href="doctors.php?Doctor_ID=<?php echo $z['DoctorID']; ?>&Delete=Delete"><i class='fas fa-trash-alt'></i></a> -->

        
      </tr>
    
      <?php
        }
      ?>

        
        </table>
</div>
        </section>
      </div>
     <?php
  }//END if($Counter > 10)
    else {
        ?>
  <div class="row" style="margin-top: 20px; min-height:10px;"> 
    <div class="col-md-12 alert-danger"> Sorry Their Is no Data </div>
  </div>
        <?php
    }//END 
        ?>
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

th,td{
  text-align:center;

}
.card{
  width:100%;
  border-radius:8px;
  border-color:#D09D05;
  border-width:2px;margin-bottom:10px;padding: 1px 10px 10px 10px;
}
label.form-label{
  /* background-color:red; */
  /* margin-left:0; */
  text-align:left;

}
.form-label{
  text-align:left;
}
</style>
  <script src="bootstrap.bundle.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    
</body>
</html>

<?php } ?>


<script>

    function Validation() {

      // alert("Montasir");
      var Gender = document.getElementsByName("Genders");
      // var Male = document.getElementsByName("Male");
      // var Female = document.getElementsByName("Female");
      //alert(Gender);
      var email = document.getElementById('Email');
      var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      if(document.forms['Form'].elements['Name'].value.length < 10 || document.forms['Form'].elements['Name'].value.length > 30 ) {
          document.getElementById('ValidationError').innerHTML = "  Please Enter Doctor Name";
          document.getElementById('ValidationError').style.visibility = 'visible';
          document.getElementById('ValidationError').style.display =  'block';
          document.forms['Form'].elements['Name'].focus();
          // alert("Montasir");
          return false;
      }//END 
      if(document.forms['Form'].elements['Age'].value < 25 || document.forms['Form'].elements['Age'].value > 80 ) {
          document.getElementById('ValidationError').innerHTML = "    Please Enter Age ";
          document.getElementById('ValidationError').style.visibility = 'visible';
          document.getElementById('ValidationError').style.display =  'block';
          document.forms['Form'].elements['Age'].focus();
          // alert("Montasir");
          return false;
      }//END Age

      if(document.querySelectorAll('[name=Genders]:checked').length == 0 ) {
          document.getElementById('ValidationError').innerHTML = "  Please Enter Gender ";
          document.getElementById('ValidationError').style.visibility = 'visible';
          document.getElementById('ValidationError').style.display =  'block';
          // alert("Montasir");
          return false;
      }//END
      // if(document.forms['Form'].elements['Email'].value.length < 10 || document.forms['Form'].elements['Email'].value.length > 30 ) {
      //     document.getElementById('ValidationError').innerHTML = "  Please Enter Email";
      //     document.getElementById('ValidationError').style.visibility = 'visible';
      //     document.getElementById('ValidationError').style.display =  'block';
      //     document.forms['Form'].elements['Email'].focus();
      //     // alert("Montasir");
      //     return false;
      // }//END Email
      // if (!filter.test(email.value)) {
      //     document.getElementById('ValidationError').innerHTML = "Please Enter Correct Email     ";
      //     document.getElementById('ValidationError').style.visibility = 'visible';
      //     document.getElementById('ValidationError').style.display =  'block';
      //     document.forms['Form'].elements['Email'].focus();
      //   return false;
      // }
      if(document.forms['Form'].elements['Dept'].value == '-1') {
          document.getElementById('ValidationError').innerHTML = "    Please Enter Department ";
          document.getElementById('ValidationError').style.visibility = 'visible';
          document.getElementById('ValidationError').style.display =  'block';
          document.forms['Form'].elements['Dept'].focus();
          // alert("Montasir");
          return false;
      }//END 

      if(document.forms['Form'].elements['Address'].value.length < 5 || document.forms['Form'].elements['Address'].value.length > 30 ) {
          document.getElementById('ValidationError').innerHTML = "  Please Enter Adderss";
          document.getElementById('ValidationError').style.visibility = 'visible';
          document.getElementById('ValidationError').style.display =  'block';
          document.forms['Form'].elements['Address'].focus();
          // alert("Montasir");
          return false;
      }//END Address

      
      

    }//END 


</script>




