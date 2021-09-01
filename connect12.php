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
if(isset( $_POST['submit_1']) ) 
{
    echo "<!DOCTYPE html>
    <html>
    <head>
      <meta charset='utf-8'>
      <title>Ranged Report</title>
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
          <form class='form-detail' action='connect13.php' method='post' >
            <div class='form-left'>
              <h2><center>Report</center></h2>
              
              
                <div class='form-row'>
                <label for='f'><h5>Start Date:</h5></label>
                  <input type='date' name='fdate' id='f' required>
                </div>
                
              
              
              <div class='form-row'>
              <label for='l'><h5>End Date:</h5></label>
                <input type='date' name='ldate' id='l' required>
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
elseif(isset( $_POST['submit_3']) )
{

 echo "<!DOCTYPE html>
    <html>
    <head>
      <meta charset='utf-8'>
      <title>Slot Details</title>
      <!-- Mobile Specific Metas -->
      
      <meta name='viewport' content='width=device-width, initial-scale=1'>
      <!-- Font-->
      <link rel='stylesheet' type='text/css' href='css/montserrat-font.css'>
      <link rel='stylesheet' type='text/css' href='fonts/material-design-iconic-font/css/material-design-iconic-font.min.css'>
      <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
      <link href='vendor/datepicker/daterangepicker.css' rel='stylesheet' media='all'>
      <!-- Main Style Css -->
        <link rel='stylesheet' href='dstyle.css'/>
    </head>
    <body class='form-v10'>
      <div class='page-content'>
        <div class='form-v10-content'>
          <form class='form-detail' action='connect16.php' method='post' >
            <div class='form-left'>
              <h2><center>Slot Details</center></h2>
              
              
                <div class='form-row'>
                  <label for='f'><h5>Start Date:</h5></label>
                  <input type='date' name='fdate' required id='f'>
                </div>
                
              
              
                <div class='form-row'>
                <label for='l'><h5>End Date:</h5></label>
                <input placeholder='Last Date' name='ldate' type='date' id='l' required >
              </div>

              <div class='form-row'>
              
                <input type='text' name='slot' placeholder='Slot Number' required>
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
elseif(isset( $_POST['submit_5']) )
{
  echo "<!DOCTYPE html>
    <html>
    <head>
      <meta charset='utf-8'>
      <title>Owner Details</title>
      <!-- Mobile Specific Metas -->
      
      <meta name='viewport' content='width=device-width, initial-scale=1'>
      <!-- Font-->
      <link rel='stylesheet' type='text/css' href='css/montserrat-font.css'>
      <link rel='stylesheet' type='text/css' href='fonts/material-design-iconic-font/css/material-design-iconic-font.min.css'>
      <!-- Main Style Css -->
        <link rel='stylesheet' href='dstyle.css'/>
    </head>
    <body class='form-v10'>
      <div class='page-content'>
        <div class='form-v10-content'>
          <form class='form-detail' action='connect17.php' method='post' >
            <div class='form-left'>
              <h2><center>Owner Details</center></h2>
              
              
                <div class='form-row'>
                  <input type='text' name='vno'placeholder='Vehicle Number' required>
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
elseif(isset( $_POST['submit_6']) )
{
  echo "<!DOCTYPE html>
    <html>
    <head>
      <meta charset='utf-8'>
      <title>Driver Details</title>
      <!-- Mobile Specific Metas -->
      
      <meta name='viewport' content='width=device-width, initial-scale=1'>
      <!-- Font-->
      <link rel='stylesheet' type='text/css' href='css/montserrat-font.css'>
      <link rel='stylesheet' type='text/css' href='fonts/material-design-iconic-font/css/material-design-iconic-font.min.css'>
      <!-- Main Style Css -->
        <link rel='stylesheet' href='dstyle.css'/>
    </head>
    <body class='form-v10'>
      <div class='page-content'>
        <div class='form-v10-content'>
          <form class='form-detail' action='connect18.php' method='post' >
            <div class='form-left'>
              <h2><center>Driver Details</center></h2>
              
              
                <div class='form-row'>
                  <input type='text' name='vno'placeholder='Vehicle Number' required>
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