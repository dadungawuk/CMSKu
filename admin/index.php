<!DOCTYPE html>
<html>
<head>
<title>Login Admin</title>
<style>
body{background:#000;font-family:Arial;}
.loginbox{width:400px;padding:10px;margin:100px auto;background:#f3f3f3;}
form{padding:10px;border:1px solid #ebebeb;line-height:150%;}
label{float:left;display:block; width:140px;}
.login_msg{color:red;}
</style>
</head>
<body>
<div class="loginbox">
	<div class="login_msg">
		<?php
		include "../inc/config.php";
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$pass=md5($_POST['password']);
			$sqlCek = mysqli_query($konek,"SELECT * FROM user 
							WHERE username='$_POST[username]' AND password='$pass' AND aktif='Y'");
			$jml=mysqli_num_rows($sqlCek);
			$d=mysqli_fetch_array($sqlCek);
			
			if($jml > 0){
				session_start();
				$_SESSION['login']		= TRUE;
				$_SESSION['id']			= $d['id'];
				$_SESSION['username']	= $d['username'];
				$_SESSION['nama']		= $d['nama_lengkap'];
				$_SESSION['upload_gambar']		= TRUE;
				
				header('Location:dashboard.php');
			}else{
				echo "<center>Username dan Password anda salah!!!</center>";
			}
		}
		?>
	</div>
	<form method="POST" name="login">
		<label>Username</label>
		<input type="text" name="username"/><br/>
		<label>Password</label>
		<input type="password" name="password"/><br/>
		<label>&nbsp;</label>
		<input type="submit" value="Login"/><br/>
	</form>
</div>
</body>
</html>