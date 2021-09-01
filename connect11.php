<?php
$servername = "localhost";
$username = "root";
$password = "Meghanath@2052";
$dbname = "vehicleparkingmanagementsystem";
session_start();

$vno1=$_SESSION['s'];
$idn=$_POST['idn'];
$idp=$_POST['idp'];
$nam=$_POST['nam'];
$num=$_POST['num'];
$add=$_POST['add'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sq1 = "INSERT INTO OwnerDetails (IDNumber,IDProof,Name,MobileNumber,Address) VALUES ('$idn','$idp','$nam','$num','$add')";
$result1 = $conn->query($sq1);
$sq2 = "UPDATE VehicleOwnership SET `IDNumber` = '$idn' WHERE `VehicleNumber` = '$vno1'";
$result2 = $conn->query($sq2);
echo "<script>
alert('Success');
window.location.href='home.html';  

</script>";


?>