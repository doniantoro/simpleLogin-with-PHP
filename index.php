<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		session_start(); //session start

		//condition if login
		if(isset($_SESSION['username'])){
	?>
	<h2>Hello <?php echo$_SESSION['username'] ?>, wanna <a href="logout.php">LogOut</a> ?</h2>
	<?php }
		else{?>
	<h4>hallo,wanna <a href="login.php">login</a> ? </h4><?php
		}
	?>

</body>
</html>