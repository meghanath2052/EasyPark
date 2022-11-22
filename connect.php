<?php
$servername = "localhost";
$username = "root";
$password = "harshshah14";
$dbname = "vehicleparkingmanagementsystem";
$vno=$_POST['V'];
$ty=$_POST['T'];
$co=$_POST['C'];
$mo=$_POST['M'];
$c=$_POST['Co'];
$fu=$_POST['F'];
$eng=$_POST['E'];
$cha=$_POST['Ch'];
$IDN=$_POST['IDN'];
$IDP=$_POST['idp'];
$NAM=$_POST['nam'];
$NUM=$_POST['num'];
$ADD=$_POST['add'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sq1="SELECT * FROM VehicleDetails where VehicleNumber = '$vno'";
$result1 = $conn->query($sq1);
if($result1->num_rows > 0){
  echo "<script>
    alert('The vehicle already exists in the database');
    window.location.href='home.html';  
    
    </script>";
}else{
  $sq2="SELECT * FROM OwnerDetails where IDNumber = '$IDN'";
  $result2 = $conn->query($sq2);
  if($result2->num_rows > 0){
    echo "<script>
    alert('The owner already exists in the database');
    window.location.href='home.html';  
    
    </script>";
      
      $sql3="INSERT INTO VehicleDetails (VehicleNumber,Type,Company,Model,Colour,FuelType,EngineNumber,ChassisNumber) 
            VALUES ('$vno','$ty','$co','$mo','$c','$fu','$eng','$cha')";
      $result3 = $conn->query($sq3);
      $sql4="INSERT INTO VehicleOwnership (VehicleNumber,IDNumber) VALUES ('$vno','$IDN)";
      $result4 = $conn->query($sq4);
      
      echo "<script>
    alert('The vehicle is successfully registered');
    window.location.href='home.html';  
    
    </script>";
  }else{
    $sql5="INSERT INTO VehicleDetails (VehicleNumber,Type,Company,Model,Colour,FuelType,EngineNumber,ChassisNumber) 
              VALUES ('$vno','$ty','$co','$mo','$c','$fu','$eng','$cha')";
    $result5 = $conn->query($sql5);
    $sql6="INSERT INTO VehicleOwnership (VehicleNumber,IDNumber) VALUES ('$vno','$IDN)";
    $result6 = $conn->query($sql6);
    $sql7="INSERT INTO OwnerDetails (IDNumber,IDProof,Name,MobileNumber,Address) VALUES ('$IDN','$IDP','$NAM','$NUM','$ADD')";
    $result7 = $conn->query($sql7);
    
    echo "<script>
    alert('The Vehicle and the owner are registered successfully');
    window.location.href='home.html';  
    
    </script>";
    
}
}


  $conn->close();
  
 ?>