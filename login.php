<html>
  <head>
	<title>Simple login with php</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
		<div class="kotak">			
			<div class="gambar">
				<img src="img/img_avatar.png" alt="ava" class="ava">
			</div>
			
			<center><h3>LOGIN PAGE</h3></center><br>		
			  <form  method="post">
				<label><b> Username </b></label>
				<input type="text" name="username"   class="login" placeholder="Input Username"> <br>
				<label><b> Password	</b></label>
				<input type="password" name="pass_login" class="login" placeholder="Input password"> 
				<center><input type="submit" ></center>
			</form>
		</div>
 
			
			
	
		<?php

			echo "hallo" ;
		if ($_SERVER["REQUEST_METHOD"] == "POST"){	

			echo "hello" ;
			include 'connection.php';//connection
	        	
			//Escape function to forbide sql injection
			$username = mysqli_real_escape_string ($conn,$_POST['username']);
			$pass_login = mysqli_real_escape_string ($conn,$_POST['pass_login']);

			echo "hello" ;
			//query procces
			$sql      = " select * from login_info where username='$username'";			
			$result=$conn->query($sql);
			
			$data = mysqli_fetch_array($result);
				

             
			if($data[username]==$username && $data[password]==$pass_login)
			{
				//get session
				session_start();
				$_SESSION['id_login'] = $data['id_login'];
				$_SESSION['username'] = $data['username'];
				echo "<script>alert('Wellcome $username.');document.location.href='index.php'</script>";
			}
			
			
			}
		?>



	</body>
	</html>
