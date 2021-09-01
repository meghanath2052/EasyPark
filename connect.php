<?php
$servername = "localhost";
$username = "root";
$password = "Meghanath@2052";
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
if(!empty($result1->num_rows)){         //Checks whether the vehicle is there or not there
    echo "<script>
      alert('The vehicle already exists in the database');
      window.location.href='home.html';  
      
      </script>";
}else{     
    // Inserting in to Vehicle
    $sql3="INSERT INTO VehicleDetails (VehicleNumber,Type,Company,Model,Colour,FuelType,EngineNumber,ChassisNumber) 
          VALUES ('$vno','$ty','$co','$mo','$c','$fu','$eng','$cha')";
    $result3 = $conn->query($sql3);

    // Checking for the Owner
    $sq2="SELECT * FROM OwnerDetails where IDNumber = '$IDN'";
    $result2 = $conn->query($sq2);

    // Insert if owner is not there
    if(empty($result2->num_rows)){
        $sql7="INSERT INTO OwnerDetails (IDNumber,IDProof,Name,MobileNumber,Address) VALUES ('$IDN','$IDP','$NAM','$NUM','$ADD')";
        $result7 = $conn->query($sql7);
    }
    $sql4="CALL RegisterVehicle('$vno', '$IDN')";
    $result4 = $conn->query($sql4);

    echo "<script>
    alert('Registration Sucessful');
    window.location.href='home.html';  
    
    </script>";
}

$conn->close();
  
?>