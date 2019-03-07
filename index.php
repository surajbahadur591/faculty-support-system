<!DOCTYPE html>
<html>
<head>
	<title>Student Attendance Management System</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link rel="icon" type="image" href="images/customer-service.png">
	<link href="https://fonts.googleapis.com/css?family=Boogaloo|Comfortaa" rel="stylesheet">

	</title>
</head>
<body>
	<h1>Faculty Support System</h1>
	<div class="main">

		<div class="signup">
			<h2>Sign up Here</h2>
			<form action="index.php" method="POST">
		
			<input class="txt1" type="text" name="teacherid1" placeholder="Teacher Id"><br>
			<input class="txt2" type="text" name="username" placeholder="Username"><br>
			<input class="txt3" type="password" name="password" placeholder="Password"><br>
			<input class="bn" type="submit" name="btn" value="Sign up"><br>
			 <br>
			</form>
			<br>
		
		</div>
	
	<br><br>
		<div class="signin">
			<h2>Log in Here</h2>
			<form action="index.php" method="POST">
			<input class="txt1" type="text" name="teacherid2" placeholder="Teacher Id"><br>
			<input  class="txt3" type="password" name="password2" placeholder="Password"><br>
			<input  class="bn" type="submit" name="btn2" value="Log in">
			</form>
		</div>
		
	</div>
	
	
</body>
</html>
<?php 
session_start();

$con =  mysqli_connect("localhost","root","","liveproject");

if (isset($_POST['btn'])) {
	
	$teacherid1 = $_POST['teacherid1'];
	$teacherid1 = strtoupper($teacherid1);
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = mysqli_query($con, "INSERT INTO users VALUES('','$teacherid1','$username','$password')");
	echo "Sign up was successfull";
}

if(isset($_POST['btn2'])) {
	$teacherid2 = $_POST['teacherid2'];
	$teacherid2 = strtoupper($teacherid2);
	$password2 = $_POST['password2'];
	$_SESSION['varname'] = $teacherid2;

	$query = mysqli_query($con, "SELECT * FROM users WHERE teacherid = '$teacherid2' AND password ='$password2'");

	 if(mysqli_num_rows($query)==1){
	 header('Location: home.php'); 
		 }
 }

 ?>
