<?php
$servername = "localhost";
$username = "root";
$password = "Meghanath@2052";
$dbname = "vehicleparkingmanagementsystem";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if( $_POST['submit_1'] ) 
{

  echo "<!DOCTYPE html>
  <html>
  <head>
    <meta charset='utf-8'>
    <title>Update Ownership</title>
    <!-- Mobile Specific Metas -->
    
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- Font-->
    <link rel='stylesheet' type='text/css' href='montserrat-font.css'>
    <link rel='stylesheet' type='text/css' href='fonts/material-design-iconic-font/css/material-design-iconic-font.min.css'>
    <!-- Main Style Css -->
      <link rel='stylesheet' href='dstyle.css'/>
  </head>
  <body class='form-v10'>
    <div class='page-content'>
      <div class='form-v10-content'>
        <form class='form-detail' action='connect10.php' method='post' >
          <div class='form-left'>
            <h2><center>Old Owner Details</center></h2>
            
            
              <div class='form-row'>
                <input type='text' name='vno'  placeholder='Vehicle Number' required>
              </div>
              
            
            
            <div class='form-row'>
              <input type='text' name='idn'  placeholder='Old Owner's ID No' required>
            </div>
            
                      
            <div class='form-row-last'>
              <input type='submit' class='register' value='Check'>
            </div>
            </div>
                  </form>
              </div>
          </div>
      </body>
      </html>";
}

?>
