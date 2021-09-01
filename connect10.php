<?php
$servername = "localhost";
$username = "root";
$password = "Meghanath@2052";
$dbname = "vehicleparkingmanagementsystem";
$vno=$_POST['vno'];
$idn=$_POST['idn'];



session_start();


$message2 = "$vno";
$_SESSION['s'] = $message2;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sq1 = "SELECT * FROM VehicleOwnership Where `VehicleNumber` = '$vno'";
$result1 = $conn->query($sq1);
if($result1->num_rows > 0){
$row = mysqli_fetch_array($result1);

$IDN = $row['IDNumber'];

if($IDN == $idn){
    echo "<!DOCTYPE html>
    <html>
    <head>
      <meta charset='utf-8'>
      <title>New Owner</title>
      <!-- Mobile Specific Metas -->
      
      <meta name='viewport' content='width=device-width, initial-scale=1'>
      <!-- Font-->
      <link rel='stylesheet' type='text/css' href='montserrat-font.css'>
      <link rel='stylesheet' type='text/css' href='../fonts/material-design-iconic-font/css/material-design-iconic-font.min.css'>
      <!-- Main Style Css -->
        <link rel='stylesheet' href='dstyle.css'/>
    </head>
    <body class='form-v10'>
      <div class='page-content'>
        <div class='form-v10-content'>
          <form class='form-detail' action='connect11.php' method='post' >
            <div class='form-left'>
              <h2><center>New Owner Details</center></h2>
              
              
                <div class='form-row'>
                  <input type='text' name='idn'  placeholder='ID Number' required>
                </div>
                <div class='form-row'>
                <input type='text' name='idp'  placeholder='ID Proof' required>
                </div>
                <div class='form-row'>
                <input type='text' name='nam'  placeholder='Name' required>
                </div>
                <div class='form-row'>
                <input type='text' name='num'  placeholder='Mobile Number' required>
                </div>
                
              
              
              <div class='form-row'>
                <input type='text' name='add'  placeholder='Address' required>
              </div>
              
                        
              <div class='form-row-last'>
                <input type='submit' class='register' value='Submit'>
              </div>
              </div>
                    </form>
                </div>
            </div>
        </body>
        </html>";
    
}
else{
    echo "<script>
    alert('The ID doesnt match the one present in the database. Try Again');
    window.location.href='update.html';  
    
    </script>";
}
}
else{
  echo "<script>
    alert('The Vehicle is not present in the Database. Try Again');
    window.location.href='update.html';  
    
    </script>";
}

?>