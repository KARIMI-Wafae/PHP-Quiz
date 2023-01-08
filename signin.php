

<?php include "connection.php";


if(isset($_POST['submit'])) {
	$question =htmlentities(mysqli_real_escape_string($conn , $_POST['email']));
	$choice1 = htmlentities(mysqli_real_escape_string($conn , $_POST['pass']));
	$choice2 = htmlentities(mysqli_real_escape_string($conn , $_POST['pass2']));
	if ($choice1!=$choice2){echo "<script>alert(\"veuillez saisir le même mot de passe \")</script>";  }
	else{


   

	$query = "INSERT INTO users(email , password) VALUES ('$question','$choice1' ) " ;
	$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
	if (mysqli_affected_rows($conn) > 0 ) {
		
	
	echo "<script>document.getElementById('submit').addEventListner('click',function(){alert('User successfully added')}) 
		</script>";
	}
	else {
		"<script>alert('error, try again!'); </script> " ;
	}
}
}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>PHP-Kuiz</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>
		<header>
			<div class="container">
				<h1>PHP-Kuiz</h1>
				<a href="index.php" class="start" id="home">Home</a>
				
				
			</div>
		</header>

		<main>
			<div class="container">
				<h2 style="color:#0F6466;">Créer un compte...</h2>
				<form method="post" action="">

					<p>
						<label style="color:#0F6466;">Email</label>
						<input id="email" type="text" name="email" required="">
					</p>
					<p>
						<label style="color:#0F6466;">Password</label>
						<input id="password" type="password" name="pass" class="pas" required="">
					</p>
					<p>
						<label style="color:#0F6466;">Retaper le password</label>
						<input id="password1" type="password" name="pass2" class="pas" required="">
					</p>
					
					</p>
					<p>
						
						<input id="submit" type="submit" name="submit" value="Submit" style="background: #D8B08C;height:35px; width:80px ;border: 1px solid ##0F6466;
	border-radius: 4px;">
					</p>
				</form>
			</div>
		</main>

		

	</body>
</html>

<?php 

?>