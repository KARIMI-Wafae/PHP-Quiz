<?php session_start(); ?>
<?php include "connection.php";
if (isset($_SESSION['admin'])) {

if(isset($_POST['submit'])) {
	$question =htmlentities(mysqli_real_escape_string($conn , $_POST['question']));
	$choice1 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice1']));
	$choice2 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice2']));
	$choice3 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice3']));
	$choice4 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice4']));
	$correct_answer = mysqli_real_escape_string($conn , $_POST['answer']);


    $checkqsn = "SELECT * FROM questions";
	$runcheck = mysqli_query($conn , $checkqsn) or die(mysqli_error($conn));
	$qno = mysqli_num_rows($runcheck) + 1;

	$query = "INSERT INTO questions(qno, question , ans1, ans2, ans3, ans4, correct_answer) VALUES ('$qno' , '$question' , '$choice1' , '$choice2' , '$choice3' , '$choice4' , '$correct_answer') " ;
	$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
	if (mysqli_affected_rows($conn) > 0 ) {
		echo "<script>document.getElementById('submit').addEventListner('click',function(){alert('Question successfully added')}); </script> " ;
	}
	else {
		"<script>alert('error, try again!'); </script> " ;
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
				<a href="add.php" class="start" id="addquestion">Add Question</a>
				<a href="allquestions.php" class="start" id="all">All Questions</a>
				<a href="players.php" class="start" id="Player">Players</a>
				<a href="exit.php" class="start" id="logout">Logout</a>
			</div>
		</header>

		<main>
			<div class="container">
				<h2 style="color:#0F6466;">Add a question...</h2>
				<form method="post" action="">

					<p>
						<label style="color:#0F6466;">Question</label>
						<input id="question" type="text" name="question" required="">
					</p>
					<p>
						<label style="color:#0F6466;">Choice #1</label>
						<input id="rp1" type="text" name="choice1" required="">
					</p>
					<p>
						<label style="color:#0F6466;">Choice #2</label>
						<input id="rp2" type="text" name="choice2" required="">
					</p>
					<p>
						<label style="color:#0F6466;">Choice #3</label>
						<input id="rp3" type="text" name="choice3" required="">
					</p>
					<p>
						<label style="color:#0F6466;">Choice #4</label>
						<input id="rp4" type="text" name="choice4" required="">
					</p>
					<p>
						<label style="color:#0F6466;">Correct answer</label>
						<select id="selectA" name="answer"  style=" display: inline-block;
        height: 30px;
        width: 150px;
        outline: none;
        color: #74646e;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 1px 1px 2px #999;
        background: #eee;">
                        <option id="op1" value="a" >Choice #1 </option>
                        <option id="op2" value="b">Choice #2</option>
                        <option id="op3" value="c">Choice #3</option>
                        <option id="op4" value="d">Choice #4</option>
                    </select>
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

<?php } 
else {
	header("location: admin.php");
}
?>