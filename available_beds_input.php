<?php
include "connection.php";
$hospital_name= addslashes($_GET["hospital_name"]);
$beds = addslashes($_GET["beds"]);
$available_bed = addslashes($_GET["available_bed"]);
$location = addslashes($_GET["location"]);
$contact = addslashes($_GET["contact"]);

$sql = "INSERT INTO available_beds ( hospital_name, beds ,available_bed, location, contact) VALUES('$hospital_name', '$beds','$available_bed', '$location', '$contact')" ;

$result = $mysqli->query($sql);

header("Location: available_beds_1.php");

?>

