<!DOCTYPE html>
<html>
<head>
	<title>Advance Feature</title>
	<link href="https://fonts.googleapis.com/css?family=Boogaloo|Comfortaa" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="advance.css">
</head>
<body>


	<div class="main">

		<h3>Details according to particular Date</h3>
	<form action="advance.php" method="POST">
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
		<input class="box789" type="text" name="date12" placeholder="YYYY-MM-DD">

		<input class="submitbtn" type="submit" name="btn1" value="Submit">
	</form><br><br>
	<h3>Attendance details of a student</h3>
	<form action="advance.php" method="POST">
		<input class="box789" type="text" name="idno" placeholder="Hallticket No"><br>
		<input class="submitbtn" type="submit" name="btn3" value="Get details">
	</form>

		<?php 
$con =  mysqli_connect("localhost","root","","liveproject");
$percentage = 0.0;


if(isset($_POST['btn3'])){
		$hno = $_POST['idno'];
		$hno = strtoupper($hno);
		$query1 = mysqli_query($con, "SELECT * from attendance WHERE Hallticket = '$hno' ORDER BY Date DESC");
		$total = mysqli_num_rows($query1);

		$query2 = mysqli_query($con, "SELECT * from attendance WHERE Hallticket = '$hno' AND Present='YES'");
		$attend = mysqli_num_rows($query2);
		$percentage = ($attend/$total)*100;
		$percentage = round($percentage, 2);



		echo "Total no of classes : " . $total . "<br>";
		echo "No of classes attended : " . $attend . "<br>";
		echo "Present % : " . $percentage . "<br>";
				echo "<table>
		<tr>
                <th style=' width: 150px; border:1px solid black; font-size:18; font-weight:bold'>Hallticket &emsp;</th> 
                <th style=' width: 150px; border:1px solid black; font-size:18; font-weight:bold' >Present &emsp;</th> 
                <th style=' width: 150px; border:1px solid black; font-size:18; font-weight:bold' >Date &emsp;</th> 
        </tr>
    	</table>";

    	while ($res = $query1->fetch_assoc()) {
		$hall = $res['Hallticket'];
		$present = $res['Present'];
		$date = $res['Date'];

		echo "<table >";
			
				echo "<tr>";
                echo "<td style=' width: 150px; border:1px solid black; font-size:18; font-weight:bold'>" . $res['Hallticket'] . "</td>";
                echo "<td style=' width: 150px;border:1px solid black; font-size:18; font-weight:bold'>" . $res['Present'] . "</td>";
                echo "<td style=' width: 150px; border:1px solid black; font-size:18; font-weight:bold'>" . $res['Date'] . "</td>";
            echo "</tr>";

		echo "</table>";

	}
		

}

if(isset($_POST['btn1'])){
	$b = $_POST['branch'];
	$s = $_POST['section'];
	$d = $_POST['date12'];

	echo " <br> Date : " .$d . "<br> <br>";
	echo $b . "  " . $s;

	echo "<table>
		<tr>
                <th style=' width: 150px; border:1px solid black; font-size:18; font-weight:bold'>Hallticket &emsp;</th> 
                <th style=' width: 150px; border:1px solid black; font-size:18; font-weight:bold' >Present &emsp;</th> 
                <th style=' width: 150px; border:1px solid black; font-size:18; font-weight:bold' >Branch &emsp;</th> 
                <th style=' width: 150px; border:1px solid black; font-size:18; font-weight:bold' >Date &emsp;</th> 
        </tr>
    	</table>";
	$query1 = mysqli_query($con, "SELECT * from attendance WHERE branch='$b' AND Section = '$s' AND Date = '$d' ORDER BY Hallticket ASC");
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

