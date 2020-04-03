<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Registration </title>
		<link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
		<script src="http://code.jquery.com/jquery.js"></script>
		
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	</head>
	
	
<body>
<div class="container">
	<div id="page-wrap">     
		      <h1>Enter Your Details</h1>
		               <form action="" method="POST" role="form">
		                    <div class="row">
			                 <div class="col-lg-6">
				             <div class="form-group">
					         <label for="">First Name</label>
					    <input type="text" class="form-control" name="fname" placeholder="Enter First Name">
				</div>
			</div>
                <div class="col-lg-6">
				             <div class="form-group">
					         <label for="">Last Name</label>
					    <input type="text" class="form-control" name="lname" placeholder="Enter Last Name">
				</div>
			</div>
</div>	
			<div class="row">
                <div class="col-lg-6">
				             <div class="form-group">
					         <label for="">Email</label>
					    <input type="text" class="form-control" name="email" placeholder="Enter Email Address">
				</div>
			</div>
			</div>
			<div class="row">
            <div class="col-lg-6">
			<input type="submit" class="btn btn-primary" name="submit" id="submit" value="Submit" />	
			</div>
		</div>            	
		</form>
	
	


</div>
</div>	

</body>

	<?php 
		include 'db_connnection.php';
		$conn = OpenCon();
		if (isset($_POST['submit'])){
			$fname = $_POST["fname"];
			$lname = $_POST["lname"];
			$email = $_POST["email"];   
			
			echo "<div class=\"container\" ";
			$sql = "CREATE TABLE `ca2`.`details` ( `Id` INT NOT NULL AUTO_INCREMENT , `First_Name` VARCHAR(50) NOT NULL , `Last_Name` VARCHAR(50) NOT NULL , `Email` VARCHAR(50) NOT NULL , PRIMARY KEY (`Id`)) ENGINE = InnoDB;";

			if ($conn->query($sql) === TRUE) {
				echo "Table details created successfully" ;
				echo "<br>";
			}

			$sql="insert into details (First_Name,Last_Name,Email) values ('$fname','$lname','$email')";	
			$query=mysqli_query($conn,$sql);
			if($query){
				 set_time_limit(3);
				echo 'data inserted';
				echo "<br>";
			}
			else
			{
				echo 'Not Inserted';
				echo "<br>"; 
				echo  $conn->error;
			}
		}	
		
		
		
		
$sql = "SELECT * FROM details ORDER BY First_Name DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	   echo "<table class=\"table table-hover\"> <thead> <tr> <th>Id</th> <th>First Name</th> <th>Last Name</th> <th>email</th>  </tr></thead>";
    while($row = $result->fetch_assoc()) {
       echo "<tr>";
	   echo "<td>" . $row['Id'] . "</td>";
       echo "<td>" . $row['First_Name'] . "</td>";
       echo "<td>" . $row['Last_Name'] . "</td>";
       echo "<td>" . $row['Email'] . "</td>";
	   echo "</tr>";
  }
echo "</table>";
} else {
    echo "0 results";
}

	echo "</div>";
		CloseCon($conn);
	?>
	