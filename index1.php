<?php 
session_start();

	include("connection1.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta name = "viewport" content="width = device-width, initial-scale = 1">
        <meta charset="utf-8">
        <title>Logged In</title>
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
                    <a class = "nav-link" href = "index1.php">Home</a>
                </li>
                <li class = "nav-item">
                    <a class = "nav-link" href = "users1.php">Blood Donors</a>
                </li>
                <li class = "nav-item">
                    <a class = "nav-link" href = "blood_bank_1.php"> Blood Bank</a>
                </li>
                <li class = "nav-item">
                    <a class = "nav-link" href = "doctor_appointment_1.php"> Doctor's Appointment</a>
                </li>
                <li class = "nav-item">
                    <a class = "nav-link" href = "available_beds_1.php"> Available Beds</a>
                </li>
                <li class = "nav-item">
                    <a class = "nav-link" href="logout.php">Logout</a>
                </li>

            </ul>
        </div>
        
    </nav>
	<h1>Welcome,</h1> <?php echo "<h1>"; echo $user_data['user_name']; echo"</h1>"; ?>
    <div class="form-box">
         <table class = "table table-success table-striped">
        <tr>
            <td>
                <h3>Enter Available Beds</h3>
            </td>
            <td>
                <a class = "btn btn-outline-primary" href = "available_beds_inputs.php">Here</a>
            </td>
        </tr>
        <!--
        <tr>
            <td>
                 <h3>Input Blood Donors Information</h3>
            </td>
            <td>
                <a class = "btn btn-outline-primary" href = "blood_donor_inputs.php">Here</a>
            </td>
        </tr>
    -->
        <tr>
            <td>
                 <h3>Enter Blood Bank Information</h3>
            </td>
            <td>
                <a class = "btn btn-outline-primary" href = "blood_bank_inputs.php">Here</a>
                
            </td>
        </tr>
        <tr>
            <td>
                 <h3>Enter Doctor's Appointment Schedule</h3>
            </td>
            <td>
                <a class = "btn btn-outline-primary" href = "doctor_appointment_inputs.php">Here</a>
            </td>
        </tr>
        
    </table>
    </div>

	 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>