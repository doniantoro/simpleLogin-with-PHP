<html>
  <head>
    <title>Login-Pilih Kampus</title>
  </head>
  <body>
		<div class="kotak">
			
			<div class="gambar">
				<img src="images/input/img_avatar.png" alt="ava" class="ava">
			</div>

			<center><h3>SILAKHAN LOGIN</h3>	</center><br>		
			  		
					<form method="post">
					<label><b> EMAIL </b></label>
					<input type="text" name="email_login" id="email_input"  class="login" placeholder="Masukan email"> <br>
					<label><b> Password	</b></label>
					<input type="password" name="pass_login" id="password_input" class="login" placeholder="Masukan Password"> 
					<input type="submit">
					</form>
					<hr>
					
                    <a href='login_google/auth.php'>
                    <div style="width:350px; background-color:white; border: 0.6px solid black;   box-shadow: 3px 3px 3px rgba(0,0,0,0.5); border-radius: 10px; "> 
                    <img style="width:45px; "src="file_upload/g.png"> 
                    <p style="color:black;font-size:20px;float:right;margin-right:40%;margin-top:3%;">Masuk</p>
                    </div></a>
                    
			</div>
 

			
			
	
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST"){	
			include 'php/koneksi.php';
	        //Escape function untuk mencegah injection
			$email_login = mysqli_real_escape_string ($conn,$_POST['email_login']);
			$pass_login = mysqli_real_escape_string ($conn,$_POST['pass_login']);
			$cek      = " select * from login where email_login='$email_login'";
			
			$result1=$conn->query($cek);
			$result2=$conn->query($cek);
			
			$user = mysqli_fetch_assoc($result2);
			
			//Enkripsi Password
			$hash= password_hash('$pass_login',PASSWORD_DEFAULT);
            if(password_verify('$pass_login',$user['pass_login'])){
			$data = mysqli_fetch_array($result1);
             }
             
			if($data>0){
			
			if ($data['kelas_login'] == 'developer') {
					session_start();
					$_SESSION['id_login'] = $data['id_login'];
					$id=$_SESSION['id_login'];
				echo "<script>alert('Selamat Datang, Developer.');document.location.href='../../'</script>";
			}
			
				}else{
					echo "<script>alert('Email/password anda salah');document.location.href='login.php'</script>";
		}
		}
		?>



	</body>
	</html>
