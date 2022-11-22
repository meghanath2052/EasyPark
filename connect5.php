<?php
$servername = "localhost";
$username = "root";
$password = "harshshah14";
$dbname = "vehicleparkingmanagementsystem";
$name=$_POST['nam'];
$dln=$_POST['dln'];
$num=$_POST['num'];

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql2 = "SELECT * FROM DriverDetails WHERE IDNumber = $dln";
$result2 = $conn->query($sql2);
if(!empty($result2->num_rows)){
  echo "<script>
    alert('The driver is already registered');
    window.location.href='home.html';  
    
    </script>";
}
else{
$sq1="INSERT INTO DriverDetails (DLNumber,Name,MobileNumber) VALUES ('$dln','$name','$num')";
$result1 = $conn->query($sq1);
  if ($result1 === TRUE) {
    echo "<script>
    alert('The driver is registered successfully');
    window.location.href='home.html';  
    
    </script>";
  } else {
    echo "Error: " . $sq1 . "<br>" . $conn->error;
  }
}

  $conn->close();
  
?>