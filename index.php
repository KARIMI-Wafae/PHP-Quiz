<?php
session_start();
include "connection.php";
?>
<?php 
if (isset($_SESSION['id'])) {
	header("location: home.php");
}
?>
<?php
if (isset($_POST['email']) && isset($_POST['email'])) {
$email = mysqli_real_escape_string($conn , $_POST['email']);
$passwor = mysqli_real_escape_string($conn , $_POST['password']);
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$checkmail = "SELECT * from users WHERE email = '$email' and password='$passwor'";
	$runcheck = mysqli_query($conn , $checkmail) or die(mysqli_error($conn));
	if (mysqli_num_rows($runcheck) > 0) {
		$played_on = date('Y-m-d H:i:s');
		$update = "UPDATE users SET played_on = '$played_on' WHERE email = '$email' and password='$passwor' ";
		$runupdate = mysqli_query($conn , $update) or die(mysqli_error($conn));
		$row = mysqli_fetch_array($runcheck);
			$id = $row['id'];
			$_SESSION['id'] = $id;
			$_SESSION['email'] = $row['email'];
		header("location: home.php");
	}
	
	else {
		$checkmail = "SELECT * from users WHERE email = '$email'";
	$runcheck = mysqli_query($conn , $checkmail) or die(mysqli_error($conn));
	if (mysqli_num_rows($runcheck) > 0) {
		echo "<script> alert('mot de passe incorrect '); </script>";
	}
	else{
		echo "<script> alert('compte introuvable'); </script>";
	
	}	
	}
	
}
else {
	echo "<script> alert('Invalid Email'); </script>";
}

}
?>
<html>
	<head>
		<title>PHP-kuiz</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>
		<header>
			<div class="container">
				<h1>PHP-kuiz</h1>
				<a href="index.php"  class="start">Home</a>
				<a href="admin.php"  id="startadmin" class="start">Admin Panel</a>

			</div>
		</header>

		<main>
		<div class="container">
				<h2 style="color:#0F6466;">Login</h2>
				<form method="POST" action="">
				<strong> <label style="color:#0F6466;" for="">Email :</label>     </strong><input id="email" type="email" name="email" required="" style="position:absolute;right:860px ;color:#0F6466; " /><br/><br/>
				<strong> <label style="color:#0F6466;" for="">Password :</label>  </strong><input  id="password" type="password" name="password" required="" style="color:#0F6466; position:absolute;right:860px ;"><br/><br/>
				<input  class="btn-submit" type="submit" name="submit" value="login" style="background: #D8B08C; width:70px ;border: 1px solid ##0F6466;
	border-radius: 4px;" >&nbsp;&nbsp;&nbsp;<br>
	<STRong>si vous avez pas un compte vous pouvez</STRong>  <a id="signin" href="signin.php" name="signin" value="Sign in" 
	style="height:10px 
	border: 1px solid #D8B08C;
	border-radius: 4px; text-decoration: underline;"> Sign in</a>


			</div>


		</main>

		<footer>
			<div class="container">
				Copyright @ PHP-kuiz
			</div>
		</footer>

	</body>
</html>