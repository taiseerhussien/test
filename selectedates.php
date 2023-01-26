<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<title>How to Select MySQL Table between Two Dates in PHP</title>
</head>
<body>
<div class="container">
  <h2>Basic Panel</h2>
  <div class="panel panel-primary " style="background-color:blue;">
    <div class="panel-body">Doctor Reports</div>
  </div>
</div>
<div>

<div class="card">
<div class="table-responsive">
	<table class="table table-bordered" border="1">
		<thead>
        <th>#</th>
        <th>Patient Name</th>
        <th>Patient age</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Gender</th>
        <th>Patient Type</th>
        <th>Date</th>
		</thead>
		<body>
		<?php
			include('connect.php');
			//MySQLi Procedural
			//$query=mysqli_query($conn,"select * from `login`");
			//while($row=mysqli_fetch_array($query)){
			/*	?>
				<tr>
					<td><?php echo $row['logid']; ?></td>
					<td><?php echo $row['username']; ?></td>
					<td><?php echo $row['login_date']; ?></td>
				</tr>
				<?php */
			//}
 
			//MySQLi Object-oriented
			$query=$connect->query("select * from `patient` ");
            $counter = 0;
			while($row = $query->fetch_array()) {
                $counter = $counter+1;

				?>
				<tr>

                    <td><?php echo $counter; ?></td>
					<td><?php echo $row['PatientName']; ?></td>
					<td><?php echo $row['Age']; ?></td>
					<td><?php echo $row['Address']; ?></td>
					<td><?php echo $row['Phone']; ?></td>
					<td><?php echo $row['Gender']; ?></td>
					<td><?php echo $row['Patient_Type']; ?></td>
                    <td><?php echo $row['DateTime']; ?></td>

				</tr>
				<?php 
			}
		?>
		</tbody>
	</table>
        </div>
        </div>
</div><br>
<div>
	<form method="POST">
		<label>From: </label><input type="date" name="from">
		<label>To: </label><input type="date" name="to">
		<input type="submit" value="Get Data" name="submit">
	</form>
</div>

<h2>View Data</h2>
<div>
	<table class="table table-bordered"border="1">
		<thead>

        <th>#</th>
        <th>Patient Name</th>
        <th>Patient age</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Gender</th>
        <th>Patient Type</th>
		</thead>
		<tbody>
		<?php
			if (isset($_POST['submit'])){
				include('connect.php');
				$from=date('Y-m-d',strtotime($_POST['from']));
				$to=date('Y-m-d',strtotime($_POST['to']));
				//MySQLi Procedural
				//$oquery=mysqli_query($conn,"select * from `login` where login_date between '$from' and '$to'");
				//while($orow=mysqli_fetch_array($oquery)){
				/*	?>
					<tr>
						<td><?php echo $orow['logid']?></td>
						<td><?php echo $orow['username']?></td>
						<td><?php echo $orow['login_date']?></td>
					</tr>
					<?php */
				//}
 
				//MySQLi Object-oriented
                // echo $from;
                $to = date('Y-m-d', strtotime($to . ' +1 day'));
                // echo "select * from `patient` where DateTime between ('$from') and ('$to') ";
				$oquery=$connect->query("select * from `patient` where DateTime between ('$from') and ('$to') ");
                $counter = 0;
				while($orow = $oquery->fetch_array()){
                    $counter = $counter+1;
					?>
					<tr>

                    <td><?php echo $counter; ?></td>
						<td><?php echo $orow['PatientName']?></td>
                        <td><?php echo $orow['Age']?></td>
                        <td><?php echo $orow['Address']?></td>
                        <td><?php echo $orow['Phone']?></td>
						<td><?php echo $orow['Gender']?></td>
						<td><?php echo $orow['Patient_Type']?></td>
						<td><?php echo $orow['DateTime']?></td>
						
					</tr>
					<?php 
				}
			}
		?>
		</tbody>
	</table>



    <style>
        .card{
  width:80%;
  border-radius:8px;
  border-color:#D09D05;
  border-width:2px;margin-bottom:10px;padding: 1px 10px 10px 10px;
  margin:0 auto;
}
</style>