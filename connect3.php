<?php
ignore_user_abort(true);
$servername = "localhost";
$username = "root";
$password = "harshshah14";
$dbname = "vehicleparkingmanagementsystem";
$vno=$_POST['V'];
$dlno=$_POST['IDN'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
$sq3 = "SELECT * FROM DriverDetails where DLNumber = '$dlno'";
$result3=$conn->query($sq3);
$sq4 = "SELECT * FROM VehicleDetails where VehicleNumber = '$vno'";
$result4=$conn->query($sq4);
$sq10 = "SELECT * FROM SlotAllotment where VehicleNumber = '$vno' and `State` = 1";
$result10 = $conn->query($sq10);
if($result3->num_rows > 0 && $result4->num_rows > 0 && $result10->num_rows === 0){
  $sq6 = "SELECT * FROM `VehicleDetails` WHERE `VehicleNumber` = '$vno'";
  $result6 = $conn->query($sq6);
  $row2 = mysqli_fetch_array($result6);
  $type = $row2['Type'];
  $sq1= "SELECT * FROM `Slot` WHERE `Occupancy`='N' AND `Type` = '$type'";
  $result1=$conn->query($sq1);
  if($result1->num_rows > 0){
      $row = mysqli_fetch_array($result1);
      $slot = $row['Slot'];
      $sq2 = "UPDATE Slot SET `Occupancy` = 'Y' WHERE `Slot` = $slot";
      $result2=$conn->query($sq2);
      $sq5= "CALL AllotSlot('$vno','$slot','$dlno')";
      $result5 = $conn->query($sq5);
      session_start();

      $message1 = "$slot";
      $message2 = "$vno";

      $_SESSION['f'] = $message1;
      $_SESSION['s'] = $message2; 
      echo"<html lang='en' >
 
      <head>
        <meta charset='UTF-8'>
        <title>Slot Details</title>
        <link rel='stylesheet' href='cstyle.scss'>
        <link rel='stylesheet' href='https://unpkg.com/purecss@2.0.6/build/pure-min.css' integrity='sha384-Uu6IeWbM+gzNVXJcM9XV3SohHtmWE+3VGi496jvgX1jyvDTXfdK+rfZc8C1Aehk5' crossorigin='anonymous'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
      </head>
      <body>
      <!-- partial:index.partial.html -->
      <div class='slot'>
        <h1><center>Your Slot Number is $slot</center></h1>
      </div>
      <input type='hidden' id='set-time' value='1'/>
      <div id='countdown'>
        
        <div id='tiles' class='color-full'></div>
        <div class='countdown-label'>Time Remaining</div>
      </div>
      <!-- partial -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script  src='cscript.js'></script>
       
        
        <form action='connect6.php'>  
      
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
            
           <button class='button-secondary pure-button'>Free Slot</button>
           

        </div>
        </form>
        </html>
       
        
                
            
      <script>
      function myFunction() {
        setTimeout(function(){ alert('You have 5 sec to remove your Vehicle'); }, 15000);
      }
      window.onload = myFunction;
      </script>
      <script type='text/javascript'>
      window.onbeforeunload = function (e) {
        e = e || window.event;
    
        // For IE and Firefox prior to version 4
        if (e) {
            e.returnValue = 'Any string';
        }
    
        // For Safari
        return 'Any string';
    };
        
    </script>
    <script>
    window.location.hash = 'no-back-button';
    // Again because Google Chrome doesn't insert
    // the first hash into the history
    window.location.hash = 'Again-No-back-button'; 

    window.onhashchange = function(){
        window.location.hash = 'no-back-button';
    }
    </script>";
}else{
    echo "<script>
    alert('Slots are full');
    window.location.href='home.html';  
    
    </script>";
  }
}else{
  if($result10->num_rows > 0){
    echo "<script>
    alert('This vehicle is already present in a slot');
    window.location.href='home.html';  
    
    </script>";
  }else{
      if($result4->num_rows === 0){
        echo "<script>
        alert('Please register the vehicle first');
        window.location.href='home.html';  
        
        </script>";
      }
      if($result3->num_rows === 0){
        echo "<script>
        alert('Please register the driver');
        window.location.href='home.html';  
        
        </script>";
      }
  }
}

?>

