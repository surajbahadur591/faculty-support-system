<!DOCTYPE html>
<html>
<head>
	<title>html2</title>
	<link rel="stylesheet" type="text/css" href="html2css.css">
	<link href="https://fonts.googleapis.com/css?family=Boogaloo|Comfortaa|Slabo+27px" rel="stylesheet">
</head>
<body>
	<div class="main">
		<div class="right">
				<h3>CSE-B Section</h3> 
				<?php 
			session_start();
			$teacherid2 = $_SESSION['varname'];
			echo "Teacher's Id : ".$teacherid2; ?>
				<h3>
					<?php 
				$date1 = date('d-m-Y');
				echo "Date : " . $date1 . "<br>"; 
					?>
				</h3>
				<form action="html2.php" method="POST">
					
		16TP1A0521<input type="radio" value="yes" name="$p521">present</input>
		<input type="radio" value="no" name="$p521">Absent</input><br>
		16TP1A0522<input type="radio" value="yes" name="$p522">present</input>
		<input type="radio" value="no" name="$p522">Absent</input><br>
		16TP1A0523<input type="radio" value="yes" name="$p523">present</input>
		<input type="radio" value="no" name="$p523">Absent</input><br>
		16TP1A0524<input type="radio" value="yes" name="$p524">present</input>
		<input type="radio" value="no" name="$p524">Absent</input><br>
		16TP1A0525<input type="radio" value="yes" name="$p525">present</input>
		<input type="radio" value="no" name="$p525">Absent</input><br>
		16TP1A0526<input type="radio" value="yes" name="$p526">present</input>
		<input type="radio" value="no" name="$p526">Absent</input><br>
		16TP1A0527<input type="radio" value="yes" name="$p527">present</input>
		<input type="radio" value="no" name="$p527">Absent</input><br>
		16TP1A0528<input type="radio" value="yes" name="$p528">present</input>
		<input type="radio" value="no" name="$p528">Absent</input><br>
		16TP1A0529<input type="radio" value="yes" name="$p529">present</input>
		<input type="radio" value="no" name="$p529">Absent</input><br>
		16TP1A0530<input type="radio" value="yes" name="$p530">present</input>
		<input type="radio" value="no" name="$p530">Absent</input><br>
		16TP1A0531<input type="radio" value="yes" name="$p531">present</input>
		<input type="radio" value="no" name="$p531">Absent</input><br>
		16TP1A0532<input type="radio" value="yes" name="$p532">present</input>
		<input type="radio" value="no" name="$p532">Absent</input><br>
		16TP1A0533<input type="radio" value="yes" name="$p533">present</input>
		<input type="radio" value="no" name="$p533">Absent</input><br>
		16TP1A0534<input type="radio" value="yes" name="$p534">present</input>
		<input type="radio" value="no" name="$p534">Absent</input><br>
		16TP1A0535<input type="radio" value="yes" name="$p535">present</input>
		<input type="radio" value="no" name="$p535">Absent</input><br>
		16TP1A0536<input type="radio" value="yes" name="$p536">present</input>
		<input type="radio" value="no" name="$p536">Absent</input><br>
		16TP1A0537<input type="radio" value="yes" name="$p537">present</input>
		<input type="radio" value="no" name="$p537">Absent</input><br>
		16TP1A0538<input type="radio" value="yes" name="$p538">present</input>
		<input type="radio" value="no" name="$p538">Absent</input><br>
		16TP1A0539<input type="radio" value="yes" name="$p539">present</input>
		<input type="radio" value="no" name="$p539">Absent</input><br>
		16TP1A0540<input type="radio" value="yes" name="$p540">present</input>
		<input type="radio" value="no" name="$p540">Absent</input><br>
		<br>
		<input class="submitbtn" type="submit" name="btn" value="SUBMIT"><br>
		</form><br>
			
		</div>
	</div>

</body>
</html>
<?php  
error_reporting(0);
$con =  mysqli_connect("localhost","root","","liveproject");

$p = "p";
$date1 = date('Y-m-d');
	
	for ($i=521; $i <= 540 ; $i++) { 
		${$p.$i} = "16TP1A0".$i;
		}




		if (isset($_POST['btn'])) {				
				$present[521] = $_POST['$p521'];
				$present[522] = $_POST['$p522'];
				$present[523] = $_POST['$p523'];
				$present[524] = $_POST['$p524'];
				$present[525] = $_POST['$p525'];
				$present[526] = $_POST['$p526'];
				$present[527] = $_POST['$p527'];
				$present[528] = $_POST['$p528'];
				$present[529] = $_POST['$p529'];
				$present[530] = $_POST['$p530'];
				$present[531] = $_POST['$p531'];
				$present[532] = $_POST['$p532'];
				$present[533] = $_POST['$p533'];
				$present[534] = $_POST['$p534'];
				$present[535] = $_POST['$p535'];
				$present[536] = $_POST['$p536'];
				$present[537] = $_POST['$p537'];
				$present[538] = $_POST['$p538'];
				$present[539] = $_POST['$p539'];
				$present[540] = $_POST['$p540'];

				$a_check = mysqli_query($con, "SELECT * FROM attendance WHERE Date= '$date1' AND Section = 'B'");
							$a_row = mysqli_num_rows($a_check);
							if($a_row >=1){

								echo "Today's attendance is already submitted<br>";

							}
							else {



				for ($i=521; $i <= 540; $i++) { 
							$query1 = mysqli_query($con, "SELECT name1 from studentdetail WHERE hallticket1='${$p.$i}'");
							while ($res = $query1->fetch_assoc()) {
							$name = $res['name1'];
						
												$query = mysqli_query($con, "INSERT INTO attendance VAlUES('${$p.$i}','$name','$present[$i]','$date1','CSE','B','WT','')");
							}
							}
							echo "attendance submitted successfully";
						}
						}
?>