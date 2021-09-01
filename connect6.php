<?php
$servername = "localhost";
$username = "root";
$password = "Meghanath@2052";
$dbname = "vehicleparkingmanagementsystem";
session_start();
$slot=$_SESSION['f'];
$vno=$_SESSION['s'];
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 


$sq1 = "UPDATE Slot SET `Occupancy` = 'N' WHERE `Slot` = $slot";
$result1 = $conn->query($sq1);
$sq2 = "CALL charge('$vno')";
$result2 = $conn->query($sq2);
$sq3 = "SELECT * FROM SlotAllotment Where `VehicleNumber` = '$vno' and `State` = 1 ";
$result3 = $conn->query($sq3);
$row = mysqli_fetch_array($result3);
      $charge = $row['Charge'];
      echo"<html lang='en' >
 
      <head>
        <meta charset='UTF-8'>
        <title>Charge</title>
        <link rel='stylesheet' href='cstyle.scss'>
        <link rel='stylesheet' href='https://unpkg.com/purecss@2.0.6/build/pure-min.css' integrity='sha384-Uu6IeWbM+gzNVXJcM9XV3SohHtmWE+3VGi496jvgX1jyvDTXfdK+rfZc8C1Aehk5' crossorigin='anonymous'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
      </head>
      <body>
      <!-- partial:index.partial.html -->
      <div class='slot'>
        <h1><center>Your total charge is: &#x20b9 $charge</center></br><center> Thank you. Have a nice day.</center></h1>
        </div>
        <div style='text-align: center;padding-top: 10px;'>
                      
            <style scoped=''>
                .button-success,
                .button-error,
                .button-warning,
                .button-secondary {
                    color: white;
                    border-radius: 44px;
                    text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
                }
        
               
        
                .button-secondary {
                    background: rgb(52, 87, 241);
                    /* this is a light blue */
                    
                    font-size: 20px;
                }
            </style>
            
            <a href='home.html' class='button-secondary pure-button'>Home</a>
        </div>";
$sq4 = "UPDATE SlotAllotment SET `State` = FALSE WHERE `VehicleNumber` = '$vno' AND `State` = TRUE";
$result4 = $conn->query($sq4);


$conn->close();

?>