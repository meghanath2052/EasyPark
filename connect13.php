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
if(isset( $_POST['fdate']) ) 
{
    $date1 = $_POST['fdate'];
    $date2 = $_POST['ldate'];
    
    $sq1 = "CALL RangeReport('$date1','$date2');";
    $result1 = $conn->query($sq1);
    
    
    if($result1->num_rows === 0){
		echo "<script>
		alert('Error,check the values entered');
		window.location.href='options.html';  
		
		</script>";
		}
}
    ?>
   
<head>
	<meta charset="UTF-8">
	<title>Report between two dates</title>
	<!-- CSS FOR STYLING THE PAGE  -->
	<style>
		body{ 
			height:100vh;
    margin: auto;
	background-image: -moz-linear-gradient( 136deg, rgb(149,153,226) 0%, rgb(139,198,236) 100%);
    background-image: -webkit-linear-gradient( 136deg, rgb(149,153,226) 0%, rgb(139,198,236) 100%);
    background-image: -ms-linear-gradient( 136deg, rgb(149,153,226) 0%, rgb(139,198,236) 100%);
}
		table {
			margin: 0 auto;
			font-size: large;
			border: 1px solid black;
		}

		h1 {
			text-align: center;
			color: #FFFFFF;
			font-size: xx-large;
			font-family: 'Gill Sans', 'Gill Sans MT',
			' Calibri', 'Trebuchet MS', 'sans-serif';
		}

		td {
			background-color: rgb(149,153,226);
			border: 1px solid black;
		}

		th,
		td {
			font-weight: bold;
			border: 1px solid black;
			padding: 10px;
			text-align: center;
		}

		td {
			font-weight: lighter;
		}
	</style>
</head>

<body>
	<section>
		<h1>Report</h1>
		<!-- TABLE CONSTRUCTION -->
		<table>
			<tr>
				<th>Vehicle Number</th>
				<th>In Time</th>
				<th>Out Time</th>
				<th>Slot</th>
        <th>Charge</th>
			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS -->
			<?php // LOOP TILL END OF DATA
				while($rows=$result1->fetch_assoc())
				{
			?>
			<tr>
				<!-- FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN -->
				<td><?php echo $rows['VehicleNumber'];?></td>
				<td><?php echo $rows['InTime'];?></td>
				<td><?php echo $rows['OutTime'];?></td>
				<td><?php echo $rows['Slot'];?></td>
        <td><?php echo $rows['Charge'];?></td>
			</tr>
			<?php
				}
			?>
		</table>
	</section>
	
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

</html>
