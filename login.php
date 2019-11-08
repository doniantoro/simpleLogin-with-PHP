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
			  <form method="post">
				<label><b> EMAIL </b></label>
				<input type="text" name="email_login" id="email_input"  class="login" placeholder="Input email"> <br>
				<label><b> Password	</b></label>
				<input type="password" name="pass_login" id="password_input" class="login" placeholder="Input password"> 
				<input type="submit">
			</form><hr>
		</div>
 
			
			
	
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST"){	
			include 'connection.php';//connection
	        	
			//Escape function to forbide sql injection
			$email_login = mysqli_real_escape_string ($conn,$_POST['email_login']);
			$pass_login = mysqli_real_escape_string ($conn,$_POST['pass_login']);
			
			//query procces
			$sql      = " select * from login where email_login='$email_login'";			
			$result1=$conn->query($sql);
			$result2=$conn->query($sql);
			
			$user = mysqli_fetch_assoc($result2);
			
			//Enkripsi Password
			$hash= password_hash('$pass_login',PASSWORD_DEFAULT);
            		if(password_verify('$pass_login',$user['pass_login'])){
				$data = mysqli_fetch_array($result1);
             		}
             
			if($data>0)
			{
				//get session
				session_start();
				$_SESSION['id_login'] = $data['id_login'];
				$id=$_SESSION['id_login'];
				echo "<script>alert('Wellcome there.');document.location.href='../../'</script>";
			}
			
				else
				{
					echo "<script>alert('Email/password is wrong');document.location.href='login.php'</script>";
				}
			}
		?>



	</body>
	</html>
