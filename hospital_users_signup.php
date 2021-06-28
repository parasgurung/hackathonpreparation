<?php
session_start();
	include("connection1.php");
	include("functions.php");
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$name = $_POST['name'];
		$hospital_id = $_POST['hospital_id'];
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{
			//save to database
			$user_id = random_num(20);
			$query = "select * from hospital_id_check where hospital_id =  '$hospital_id' " ;
			$result = mysqli_query($con, $query);
			$count = mysqli_num_rows($result);
			if ($count > 0)
			{
				$query = "select * from hospital_users where hospital_id = '$hospital_id'";
				$result_i = mysqli_query($con, $query);
				$count_i = mysqli_num_rows($result_i);
				if ($count_i > 0)
				{
echo "<script> alert('There is already an account associated with this Hospital ID');</script>";
}
else
{
$query = "insert into hospital_users (user_id, name, user_name,password, hospital_id) values ('$user_id', '$name','$user_name','$password','$hospital_id')";
mysqli_query($con, $query);
header("Location: hospital_users_login.php");
die;
}
}
else
{
echo "<script> alert('Hospital ID Does Not Exist!');</script>";
}
}
else
{
echo "<script> alert('Please Enter Valid Information!');</script>";
}

}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta name = "viewport" content="width = device-width, initial-scale = 1">
		<meta charset="utf-8">
		<title>Project PARK</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&family=Montserrat:wght@900&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="styles.css">
	</head>
	<body>
		<nav class = "navbar navbar-expand-lg navbar-dark navbar1">
			<a class = "navbar-brand"><strong>PARK</strong></a>
			<button type="button" class = "navbar-toggler" aria-expanded = "false" aria-controls = "myNavbar" aria-label = "Toggle navigation" data-bs-target = "#myNavbar" data-bs-toggle = "collapse">
			<span class = "navbar-toggler-icon"></span>
			</button>
			<div class = "collapse navbar-collapse" id = "myNavbar">
				<ul class = "navbar-nav realNav">
					<li class = "nav-item">
						<a class = "nav-link" href = "index.html">Home</a>
					</li>
					<li class = "nav-item">
						<a class = "nav-link" href = "users.php">Blood Donors</a>
					</li>
					<li class = "nav-item">
						<a class = "nav-link" href = "blood_bank.php"> Blood Bank</a>
					</li>
					<li class = "nav-item">
						<a class = "nav-link" href = "doctor_appointment.php"> Doctor's Appointment</a>
					</li>
					<li class = "nav-item">
						<a class = "nav-link" href = "available_beds.php"> Available Beds</a>
					</li>
					<li class = "nav-item">
						<a class = "nav-link" href = "users_login.php"> Login</a>
					</li>
					<li class = "nav-item">
						<a class = "nav-link" href = "users_signup.php"> Sign Up</a>
					</li>
				</ul>
			</div>
			
		</nav>
		<div class="box">
			
			<form method="post">
				<h3>SignUp for Health-Professionals</h3>
				<input id = "text" type="text" name="name" placeholder="Name" required>
				<input id="text" type="text" name="hospital_id" placeholder="Hospital ID" required>
				<input id="text" type="text" name="user_name" placeholder="Username" required>
				<input  id="myInput" type="password" name="password" placeholder="Password" required >
				<div style="display : inline-block; position: absolute;">
					<input type="checkbox" onclick="myFunction()">
				</div><br>
				<button class = "btn btn-primary btn-lg" id="button" type="submit">Sign Up</button>
			</form>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
		<script type="text/javascript">
                function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
            </script>
	</body>
</html>
<!--	<table class = "myTable">
			<tr>
					<td>
						<input id = "text" type="text" name="name" placeholder="Name" required>
				</td>
				<td>
						<input id="text" type="text" name="hospital_id" placeholder="Hospital ID" required>
				</td>
			</tr>
			<tr>
					<td>
							<input id="text" type="text" name="user_name" placeholder="Username" required>
					</td>
					<td>
							<input id="text" type="password" name="password" placeholder="Password" required>
					</td>
	</table>  -->