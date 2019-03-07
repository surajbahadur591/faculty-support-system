<!DOCTYPE html>
<html>
<head>
	<title>Result</title>
	<link href="https://fonts.googleapis.com/css?family=Boogaloo|Comfortaa|Merriweather|Slabo+27px" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="result.css">
</head>
<body>

	<div class="main">

		<form action="resultcsea.php" method="POST">
		<select class="drop" name="branch">
			<option value=""> Branch</option>
			<option value="CSE" >CSE</option>
			<option value="ECE" >ECE </option>
			<option value="EEE" >EEE</option>
		</select>
		<select class="drop" name="section">
			<option value="">Section</option>
			<option value="A" >A</option>
			<option value="B" >B</option>
			
		</select>

		<input class="submitbtn" type="submit" name="btn1" value="SUBMIT">
	</form>
	<table>
		<tr>
                <th style=' width: 150px; border:1px solid black; font-size:18; font-weight:bold'>Hallticket &emsp;</th> 
                <th style=' width: 150px; border:1px solid black; font-size:18; font-weight:bold' >Present &emsp;</th> 
                <th style=' width: 150px; border:1px solid black; font-size:18; font-weight:bold' >Branch &emsp;</th> 
                <th style=' width: 150px; border:1px solid black; font-size:18; font-weight:bold' >Date &emsp;</th> 
        </tr>
    </table>

    <?php 
$con =  mysqli_connect("localhost","root","","liveproject");

if(isset($_POST['btn1'])){
	$b = $_POST['branch'];
	$s = $_POST['section'];

	$query1 = mysqli_query($con, "SELECT * from attendance WHERE branch='$b' AND Section = '$s' ORDER BY Date DESC, Hallticket ASC");
		echo $b ." " . $s . " Attendance";
		while ($res = $query1->fetch_assoc()) {
		$hall = $res['Hallticket'];
		$present = $res['Present'];
		$branch = $res['Branch'];
		$date = $res['Date'];

		echo "<table >";
			
				echo "<tr>";
                echo "<td style=' width: 150px; border:1px solid black; font-size:18; font-weight:bold'>" . $res['Hallticket'] . "</td>";
                echo "<td style=' width: 150px;border:1px solid black; font-size:18; font-weight:bold'>" . $res['Present'] . "</td>";
                echo "<td style=' width: 150px; border:1px solid black; font-size:18; font-weight:bold'>" . $res['Branch'] . "</td>";
                echo "<td style=' width: 150px; border:1px solid black; font-size:18; font-weight:bold'>" . $res['Date'] . "</td>";
            echo "</tr>";


		echo "</table>";

	}

}
 ?>
		
	</div>
	
</body>
</html>

