<?php
ignore_user_abort(true);
$servername = "localhost";
$username = "root";
$password = "harshshah14";
$dbname = "vehicleparkingmanagementsystem";

$slot1=$_POST['$slot'];
$vno1=$_POST['vno'];

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
$sq1 = "UPDATE Slot SET `Occupancy` = 'N' WHERE `Slot` = $slot1";
$result1 = $conn->query($sq1);
$sq5 = "UPDATE SlotAllotment SET `Tow` = 1 WHERE `VehicleNumber` = '$vno1' and `State` = 1";
$result5 = $conn->query($sq5);
$sq2 = "CALL charge('$vno1')";
$result2 = $conn->query($sq2);
$sq4 = "UPDATE SlotAllotment SET `State` = FALSE WHERE `VehicleNumber` = '$vno1' AND `State` = TRUE";
$result4 = $conn->query($sq4);
?>