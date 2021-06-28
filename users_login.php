<?php 

session_start();

    include("connection1.php");
    include("functions.php");


    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
        {

            //read from database
            $query_u = "select * from users where user_name = '$user_name' limit 1";
            $result_u = mysqli_query($con, $query_u);

            if($result_u)
            {
                if($result_u && mysqli_num_rows($result_u) > 0)
                {

                    $user_data_u = mysqli_fetch_assoc($result_u);
                    
                    if($user_data_u['password'] === $password)
                    {

                        $_SESSION['user_id'] = $user_data_u['user_id'];
                        header("Location: index2.php");
                        die;
                    }
                }
            }
            
            echo "<script>alert('Wrong username or password!');</script>";
        }else
        {
            echo "<script>alert('Please enter valid information!');</script>";
        }
    }

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Login</title>
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
			<h3>Login for Users</h3>

			<input id="text" type="text" name="user_name" placeholder="Username"><br>
			<input  id="myInput" type="password" name="password" placeholder="Password" required >
                                <div style="display : inline-block; position: absolute;">
                                    <input type="checkbox" onclick="myFunction()">
                                </div><br><br>

			<button class = "btn btn-primary btn-lg" id="button" type="submit">Login</button>
		</form><br>
        <h4>Health Professional? Login here: <a class="btn btn-md btn-dark" href ="hospital_users_login.php" type="submit" >Log In</a></h4>
	</div>
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
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>