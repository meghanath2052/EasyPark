<?php
$servername = "localhost";
$username = "root";
$password = "harshshah14";
$dbname = "vehicleparkingmanagementsystem";
$vno=$_POST['V'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



$sql="INSERT INTO VehicleDetails (VehicleNumber,Type,Company,Model,Colour,FuelType,EngineNumber,ChassisNumber) VALUES ('$vno', 'BIKE', 'HONDA', 'ACTIV', 'WHITE', 'PETROL', '1234ABC', '1245BF')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
  
?>