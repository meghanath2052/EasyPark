<?php
$servername = "localhost";
$username = "root";
$password = "Meghanath@2052";
$dbname = "vehicleparkingmanagementsystem";

// Create connection
mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
    $date1 = $_POST['fdate'];
    $date2 = $_POST['ldate'];
    $slot=$_POST['slot'];
    $sq1 = "CALL SlotCount('$date1','$date2', $slot);";
    $result1 = $conn->query($sq1);
    if($result1->num_rows === 0){
      echo "<script>
        alert('Error,check the values entered');
        window.location.href='options.html';  
        
        </script>";
      }
    $row = mysqli_fetch_array($result1);
    $count = $row['COUNT(*)'];
    echo"<html lang='en' >
 
    <head>
     <link rel='stylesheet' href='cstyle.scss'>
    </head>
    <body>
    <!-- partial:index.partial.html -->
    <div class='slot'>
      <h1><center>The total vehicles registered in the given slot are: $count</center></h1>
      </div>
      <link rel='stylesheet' href='https://unpkg.com/purecss@2.0.6/build/pure-min.css' integrity='sha384-Uu6IeWbM+gzNVXJcM9XV3SohHtmWE+3VGi496jvgX1jyvDTXfdK+rfZc8C1Aehk5' crossorigin='anonymous'>
        
                      
      <style scoped=''>
          .button-success,
          .button-error,
          .button-warning,
          .button-secondary {
              color: white;
              border-radius: 44px;
              text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
    margin-left: 47%;
    margin-top: 15px;
          }
  
         
  
          .button-secondary {
              background: rgb(52, 87, 241);
              /* this is a light blue */
              
              font-size: 20px;
          }
      </style>
      
      <a href='options.html' class='button-secondary pure-button'>Go Back</a>
  </div>
</body>

</html>";
?>