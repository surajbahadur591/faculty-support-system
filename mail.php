<!DOCTYPE html>
<html>
<head>
	<title>Automatic Messaging page	</title>
	<link href="https://fonts.googleapis.com/css?family=Boogaloo|Comfortaa|Merriweather|Slabo+27px" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="result.css">
</head>
<body>
	<div class="main">
		<form action="mail.php" method="POST">
	<select class="drop" name = "branch1">
		<option value="">Branch</option>
		<option value="CSE">CSE</option>
		<option value="ECE">ECE</option>
		<option value="EEE">EEE</option>
	</select>
	<select class="drop" name="section1">
		<option value="">Section</option>
		<option value="A">A</option>
		<option value="B">B</option>
	</select>
	<input class="submitbtn" type="submit" name="viewbtn" value="View details">
	<input class="submitbtn" type="submit" name="sendbtn" value="Send message">
	</form>


	<?php
	
	$con =  mysqli_connect("localhost","root","","liveproject");
	$date1 = date('d-m-Y');
	$message1 ="your son/daughter was absent for class on " . $date1; 
	
	$date2 = date('Y-m-d');
	if(isset($_POST['viewbtn'])){
		$b10 = $_POST['branch1'];
		$s10 = $_POST['section1'];

		$query10 = mysqli_query($con, "SELECT * FROM attendance WHERE Present= 'NO' AND Date = '$date2' AND Branch='$b10' AND Section = '$s10'");
		echo "Absentee Hallticket number<br> <br>";
		

		while ($res10 = $query10->fetch_assoc()) {
					$hallno10 = $res10['Hallticket'];
					$query15 = mysqli_query($con, "SELECT * FROM studentdetail WHERE hallticket1 = '$hallno10'");
					echo " Hallticket no " .$hallno10 . "<br> <br> ";

					while ($res10 = $query15->fetch_assoc()) {
					$no10 = $res10['phoneno'];

					

		}
	}
}

if(isset($_POST['sendbtn'])){
	$b10 = $_POST['branch1'];
	$s10 = $_POST['section1'];

	$query = mysqli_query($con, "SELECT * FROM attendance WHERE Present= 'NO' AND Date = '$date2' AND Branch = '$b10' And Section = '$s10'");
	echo "Message successfully sent  to <br> <br>"; 
	while ($res = $query->fetch_assoc()) {
		$hallno = $res['Hallticket'];
		$query5 = mysqli_query($con, "SELECT * FROM studentdetail WHERE hallticket1 = '$hallno'");
		echo " Hallticket no " .$hallno . "<br> ";
		while ($res1 = $query5->fetch_assoc()) {
			$no = $res1['phoneno'];

			echo " phone no ".$no . "<br>  <br>";
			// Authorisation details.
	// Authorisation details.
	// $username = "sulex@yourweb.email";
	// $hash = "92e35632d0b530df8d9dcad14197feeae738640bc46071f2d0305cf133e574e0";

	// // Config variables. Consult http://api.textlocal.in/docs for more info.
	// $test = "0";

	// // Data for text message. This is the text message data.
	// $sender = "TXTLCL"; // This is who the message appears to be from.
	// $numbers = $no; // A single number or a comma-seperated list of numbers
	// $message = $message1;
	// // 612 chars or less
	// // A single number or a comma-seperated list of numbers
	// $message = urlencode($message);
	// $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	// $ch = curl_init('http://api.textlocal.in/send/?');
	// curl_setopt($ch, CURLOPT_POST, true);
	// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// $result = curl_exec($ch); // This is the result from the API
	// curl_close($ch);
	 

		 // end of details
			
		}

	}
}
	
	
?>
		


	</div>
	


</body>
</html>
