<!DOCTYPE html>
<html>
<head>
	<title>html1</title>
	<link rel="stylesheet" type="text/css" href="html1css.css">
	<link href="https://fonts.googleapis.com/css?family=Boogaloo|Comfortaa|Slabo+27px" rel="stylesheet">
</head>
<body>
	<div class="main">
		<div class="right">
			
				<h3>CSE-A Section</h3> 
				<?php 
			session_start();
			$teacherid2 = $_SESSION['varname'];
			echo "Teacher's Id : " .  $teacherid2; 
				?>
				<h3>
					<?php 
				$date1 = date('d-m-Y');
				echo "Date : " . $date1 . "<br>"; 
					?>
				</h3>
				<form action="html1.php" method="POST">
					
		16TP1A0501<input type="radio" value="yes" name="$p501">present</input>
		<input type="radio" value="no" name="$p501">Absent</input><br>
		16TP1A0502<input type="radio" value="yes" name="$p502">present</input>
		<input type="radio" value="no" name="$p502">Absent</input><br>
		16TP1A0503<input type="radio" value="yes" name="$p503">present</input>
		<input type="radio" value="no" name="$p503">Absent</input><br>
		16TP1A0504<input type="radio" value="yes" name="$p504">present</input>
		<input type="radio" value="no" name="$p504">Absent</input><br>
		16TP1A0505<input type="radio" value="yes" name="$p505">present</input>
		<input type="radio" value="no" name="$p505">Absent</input><br>
		16TP1A0506<input type="radio" value="yes" name="$p506">present</input>
		<input type="radio" value="no" name="$p506">Absent</input><br>
		16TP1A0507<input type="radio" value="yes" name="$p507">present</input>
		<input type="radio" value="no" name="$p507">Absent</input><br>
		16TP1A0508<input type="radio" value="yes" name="$p508">present</input>
		<input type="radio" value="no" name="$p508">Absent</input><br>
		16TP1A0509<input type="radio" value="yes" name="$p509">present</input>
		<input type="radio" value="no" name="$p509">Absent</input><br>
		16TP1A0510<input type="radio" value="yes" name="$p510">present</input>
		<input type="radio" value="no" name="$p510">Absent</input><br>
		16TP1A0511<input type="radio" value="yes" name="$p511">present</input>
		<input type="radio" value="no" name="$p511">Absent</input><br>
		16TP1A0512<input type="radio" value="yes" name="$p512">present</input>
		<input type="radio" value="no" name="$p512">Absent</input><br>
		16TP1A0513<input type="radio" value="yes" name="$p513">present</input>
		<input type="radio" value="no" name="$p513">Absent</input><br>
		16TP1A0514<input type="radio" value="yes" name="$p514">present</input>
		<input type="radio" value="no" name="$p514">Absent</input><br>
		16TP1A0515<input type="radio" value="yes" name="$p515">present</input>
		<input type="radio" value="no" name="$p515">Absent</input><br>
		16TP1A0516<input type="radio" value="yes" name="$p516">present</input>
		<input type="radio" value="no" name="$p516">Absent</input><br>
		16TP1A0517<input type="radio" value="yes" name="$p517">present</input>
		<input type="radio" value="no" name="$p517">Absent</input><br>
		16TP1A0518<input type="radio" value="yes" name="$p518">present</input>
		<input type="radio" value="no" name="$p518">Absent</input><br>
		16TP1A0519<input type="radio" value="yes" name="$p519">present</input>
		<input type="radio" value="no" name="$p519">Absent</input><br>
		16TP1A0520<input type="radio" value="yes" name="$p520">present</input>
		<input type="radio" value="no" name="$p520">Absent</input><br>
		<br>
		<input class="submitbtn" type="submit" name="btn" value="SUBMIT"><br>
		</form><br>
			
		</div>
	</div>
		
</body>
</html>

<?php
	error_reporting(0);
	// connection 
	$con =  mysqli_connect("localhost","root","","liveproject");
	// getting current date
	$date1 = date('Y-m-d');
	// dynamic variable $p501 = 501;
	$p = "p";
	
	for ($i=501; $i <= 520 ; $i++) { 
		${$p.$i} = "16TP1A0".$i;
		}
	
	
			if (isset($_POST['btn'])) {
				
				$present[501] = $_POST['$p501'];
				$present[502] = $_POST['$p502'];
				$present[503] = $_POST['$p503'];
				$present[504] = $_POST['$p504'];
				$present[505] = $_POST['$p505'];
				$present[506] = $_POST['$p506'];
				$present[507] = $_POST['$p507'];
				$present[508] = $_POST['$p508'];
				$present[509] = $_POST['$p509'];
				$present[510] = $_POST['$p510'];
				$present[511] = $_POST['$p511'];
				$present[512] = $_POST['$p512'];
				$present[513] = $_POST['$p513'];
				$present[514] = $_POST['$p514'];
				$present[515] = $_POST['$p515'];
				$present[516] = $_POST['$p516'];
				$present[517] = $_POST['$p517'];
				$present[518] = $_POST['$p518'];
				$present[519] = $_POST['$p519'];
				$present[520] = $_POST['$p520'];


					$a_check = mysqli_query($con, "SELECT * FROM attendance WHERE Date= '$date1' AND Section = 'A'");
							$a_row = mysqli_num_rows($a_check);
							if($a_row >1){

								echo "Today's attendance is already submitted<br>";

							}
							else {

								for ($i=501; $i <= 520; $i++) {	 
							$query1 = mysqli_query($con, "SELECT name1 from studentdetail WHERE hallticket1='${$p.$i}'");
							while ($res = $query1->fetch_assoc()) {
							$name = $res['name1'];

							$query = mysqli_query($con, "INSERT INTO attendance VAlUES('${$p.$i}','$name','$present[$i]','$date1','CSE','A','WT','')");
							}
							}
							echo "attendance submitted successfully";

							}

						
			}				
	?>