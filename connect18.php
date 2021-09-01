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
$vno=$_POST['vno'];

$sq1 = "CALL DriverDetails('$vno');";
$result1 = $conn->query($sq1);
if($result1->num_rows === 0){
	echo "<script>
		alert('Error,check the values entered');
		window.location.href='options.html';  
		
		</script>";
	}

?>
 <html>
<head>
	<meta charset="UTF-8">
	<title>Driver Details</title>
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
		<h1>Driver Details</h1>
		<!-- TABLE CONSTRUCTION -->
		<table>
			<tr>
				<th>DLNumber</th>
				<th>Name</th>
				<th>MobileNumber</th>
			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS -->
			<?php // LOOP TILL END OF DATA
			
				while($row1=$result1->fetch_assoc())
				{
			?>
			<tr>
				<!-- FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN -->
				<td><?php echo $row1['DLNumber'];?></td>
				<td><?php echo $row1['Name'];?></td>
				<td><?php echo $row1['MobileNumber'];?></td>
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