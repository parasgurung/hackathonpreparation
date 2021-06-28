<?php
session_start();
	include("connection1.php");
	include("functions.php");
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$name = $_POST['name'];
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$phone_number = $_POST['phone_number'];
		$address = $_POST['address'];
		$donor_id = $_POST['donor_id'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$blood_group = $_POST['blood_group'];
		if(!empty($user_name) && !empty($password) && !is_numeric($user_name) && $age>=18 && strlen((string)$phone_number)==10 && preg_match('/.*[a-z]+.*/i', $phone_number) == 0)
		{
			//save to database
			$user_id = random_num(20);
			$query = "select * from donor_id_check where donor_id = '$donor_id' ";
			$result_i = mysqli_query($con,$query);
			$count_i = mysqli_num_rows($result_i);
			if ($count_i > 0)
			{
				$query = "select * from users where donor_id = '$donor_id'";
				$result_j = mysqli_query($con, $query);
				$count_j = mysqli_num_rows($result_j);
				if ($count_j > 0)
				{
					echo "<script>alert('There is already an account associated with this Donor Id');</script>";
				}
				else
				{
					$query = "insert into users ( name, user_id, user_name, donor_id, blood_group, age, gender ,password, phone_number, address) values ('$name','$user_id','$user_name','$donor_id','$blood_group','$age','$gender','$password','$phone_number', '$address')";
					mysqli_query($con, $query);

					header("Location: users_login.php");
					die;
				}
			}
			else
			{
				echo "<script>alert('Donor ID does not exist!');</script>";
			}

		}
		else
		{
			echo "Please enter some valid information!";
		}
		
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name = "viewport" content= "width = device-width, initial-scale = 1">
		<meta charset="utf-8">
		<title>Signup for Users</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&family=Montserrat:wght@900&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="styles.css">
	</head>
	<body>
		<nav class = "navbar navbar-expand-lg navbar-dark navbar1" style="background-color: #0A1931;">
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
			<h3>Sign Up</h3>
			<form method="post">
						<div class="form-group">
							<input id="text" type="text" class="form-control" name="name" placeholder="Name" required >
						</div>

						<div class="form-group">
							<input id="text" type="text" class="form-control" name="user_name" placeholder="Username" required>
						</div>

						<div class="form-group">
							<input  id="inputPassword2" type="password" class="form-control" name="password" placeholder="Password" required >
							<!-- <div class="form-group" style="display : inline-block; position: absolute;">
								<input type="checkbox" class="form-control" onclick="myFunction()">
							</div> -->

						</div>
						<div class="form-group">
							<input id = "text" type="text" class="form-control" name="donor_id" placeholder="Donor ID"required>
						</div>

							<!-- <input  id="text" type="text" name="blood_group" placeholder="Blood Group" required> -->
						<div class="form-group">
							<select class="form-select" name="blood_group">
								<option selected>Select Your Blood Group</option>
								<option value="A+">A+</option>
								<option value="A-">A-</option>
								<option value="B+">B+</option>
								<option value="B-">B-</option>
								<option value="AB+">AB+</option>
								<option value="AB-">AB-</option>
								<option value="O+">O+</option>
								<option value="O-">O</option>
							</select>
						</div>
						<div class="form-group">
							<input  id="text" type="number" class="form-control" name="age" min="18" max="60" placeholder="Age should be above 18" required>
						</div>
						<div class="form-group">
							<!-- <input class="form-control" id = "text" type="text" name="gender" placeholder="Gender"required> -->
							<select class="form-select" name="gender">
								<option selected>Select your gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								<option value="Other">Other</option>
							</select>	
						</div>

						<div class="form-group">
							<input id = "text" class="form-control" name="phone_number" type="text" pattern="\d" minlength="10" maxlength="10" placeholder="Phone Number"required>
						</div>		

						<div class="form-group">
							<input id = "number" type="text" name="address" placeholder="Address" class="form-control" required><br>
						</div>

				<button class = "btn btn-md btn-dark myButton" id="button" type="submit">Signup</button>
				<h5>Health Professional? SignUp here: <a class="btn btn-md btn-dark" href ="hospital_users_signup.php" type="submit" >Sign Up</a></h5>
			</form>
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
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	</body>
</html>
<!--
<table class = "myTable1">
						<tr>
								<input id="text" type="text" name="name" placeholder="Name" required >
						</tr>
						<tr>
								<td>
										<input id="text" type="text" name="user_name" placeholder="Username" required>
								</td>
								<td>
										<input  id="text" type="password" name="password" placeholder="Password" required>
								</td>
						</tr>
						<tr>
								<td>
										<input id = "text" type="text" name="phone_number" placeholder="Phone Number"required>
								</td>
								<td>
										<input id = "text" type="text" name="address" placeholder="Address" required>
								</td>
						</tr>
				</table>
-->