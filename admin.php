<?php

$servername = "localhost";
$username = "root";
$password = "Meghanath@2052";
$dbname = "vehicleparkingmanagementsystem";

$admin='Meghanath';
$pass='1234';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if($_POST['us']==$admin && $_POST['pa']==$pass)
{
  echo "<script>
    
    window.location.href='options.html';  
    
    </script>";
}
else{
  echo "<script>
   alert('Incorrect Login Info');
  window.location.href='admin.html';  
  
  </script>";
}



?>