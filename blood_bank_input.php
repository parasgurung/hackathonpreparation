<?php
include "connection.php";
$blood_banks = addslashes($_GET["blood_banks"]);
$a_positive = addslashes($_GET["a_positive"]);
$a_negative = addslashes($_GET["a_negative"]);
$b_positive = addslashes($_GET["b_positive"]);
$b_negative = addslashes($_GET["b_negative"]);
$ab_positive = addslashes($_GET["ab_positive"]);
$ab_negative = addslashes($_GET["ab_negative"]);
$o_positive = addslashes($_GET["o_positive"]);
$o_negative = addslashes($_GET["o_negative"]);
$location = addslashes($_GET["location"]);
$contact = addslashes($_GET["contact"]);

$sql = "INSERT INTO blood_bank (blood_banks, a_positive, a_negative, b_positive, b_negative, ab_positive, ab_negative, o_positive, o_negative, location, contact) VALUES('$blood_banks', '$a_positive', '$a_negative' , '$b_positive' , '$b_negative' , '$ab_positive' , '$ab_negative' , '$o_positive' , '$o_negative' , '$location' , '$contact')" ;

$result = $mysqli->query($sql);

header("Location: blood_bank_1.php");

?>
