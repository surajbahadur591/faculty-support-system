<!DOCTYPE html>
<html>

<head>
	<title>Faculty Support System</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" type="image" href="images/customer-service.png">
	<link href="https://fonts.googleapis.com/css?family=Boogaloo" rel="stylesheet">
</head>

<body>
	<div class="contain">
		<div class="head"> <h2>Faculty Support System</h2>  </div>


		<div class="body">
			<div class="grid">
				<div class="box1">
				 <ul>
				 	<li><?php 
			session_start();
			$teacherid2 = $_SESSION['varname'];
			echo "Teacher's Id : " .  $teacherid2 ."<br> <br>"; 
				?></li>
					<li><a href="html1.php" target="jframe">CSE-A</a></li><br>
					<li><a href="html2.php" target="jframe">CSE-B</a></li><br>
					<li><a href="resultcsea.php" target="jframe"> Attendance Sheet</a></li><br>
					<li> <a href="mail.php" target="jframe"> Send Message</a></li><br>
					<li> <a href="advance.php" target="jframe">Advance Feature </a></li><br>
					<li> <a href="index.php"> Sign out</a></li>
				</ul>
									
				</div>
				<div class="box2">
					<iframe src="" name="jframe" height="600px" width="600px" frameborder = "0"></iframe>

				</div>
			</div>
		</div>
		<div class="footer">
			
		</div>

	</div>
</body>
</html>

