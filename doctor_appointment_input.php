<?php
include "connection.php";
$hospital_name = addslashes($_GET["hospital_name"]);
$doctor = addslashes($_GET["doctor"]);
$specialty = addslashes($_GET["specialty"]);
$schedule = addslashes($_GET["schedule"]);
$location = addslashes($_GET["location"]);
$contact_number = addslashes($_GET["contact_number"]);

$sql = "INSERT INTO doctor_appointment (hospital_name,doctor,specialty,schedule,location,contact_number) VALUES('$hospital_name', '$doctor', '$specialty', '$schedule', '$location', '$contact_number')" ;

$result = $mysqli->query($sql);

header("Location: doctor_appointment_1.php");

?>
