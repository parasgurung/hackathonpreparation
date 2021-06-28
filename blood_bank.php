<!DOCTYPE html>
<html>
    <head>
        <meta name = "viewport" content="width = device-width, initial-scale = 1">
        <meta charset="utf-8">
        <title>Show Data</title>
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
    <h1>Blood Bank Information</h1>
        <?php
        include "connection.php";
        $sql = "SELECT blood_banks, a_positive, a_negative, b_positive, b_negative, ab_positive, ab_negative, o_positive, o_negative, location, contact FROM blood_bank";
        $result = $mysqli->query($sql);
        ?>
        <table class = "table myTable1">
            <?php
            if ($result->num_rows > 0)
            {
            echo "<thead>";
                echo "<tr>";
                    echo "<th scope = 'col'>Blood Bank Name </th> ";
                    echo "<th scope = 'col'>A+</th> ";
                    echo "<th scope = 'col'>A-</th> ";
                    echo "<th scope = 'col'>B+</th> ";
                    echo "<th scope = 'col'>B-</th> ";
                     echo "<th scope = 'col'>AB+</th> ";
                    echo "<th scope = 'col'>AB-</th> ";
                      echo "<th scope = 'col'>O+</th> ";
                    echo "<th scope = 'col'>O-</th> ";
                     echo "<th scope = 'col'>Location</th> ";
                    echo "<th scope = 'col'>Contact</th> ";

                echo "</tr>";
            echo  "</thead>";
            // output data of each row
            while($row = $result->fetch_assoc())
            {
            echo "<tbody>";
                echo "<tr>";
                    echo "<td> $row[blood_banks]</td> ";
                    echo "<td> $row[a_positive]</td> ";
                    echo "<td> $row[a_negative]</td> ";
                    echo "<td> $row[b_positive]</td> ";
                    echo "<td> $row[b_negative]</td> ";
                    echo "<td> $row[ab_positive]</td> ";
                    echo "<td> $row[ab_negative]</td> ";
                    echo "<td> $row[o_positive]</td> ";
                    echo "<td> $row[o_negative]</td> ";
                    echo "<td> $row[location]</td> ";
                    echo "<td> $row[contact]</td> ";
                echo "</tr>";
                echo "</tr>";
            echo "</tbody>";
            }
            }
            ?>
        </table>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    </body>
</html>