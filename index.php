<?php
if(isset($_POST['login'])){
session_start();
$conn = new mysqli("localhost","root","","twitter");

if($conn->connect_error){
	die("\nConnection failed : ".$conn->connect-error);
}else{
	//echo "<br>Connected Successfully";
}

$email = $_POST["usr"];
$pass = $_POST["pass"];

$sql = "SELECT * FROM user WHERE email = '".$email."' && pass = '".$pass."'";

if($result = $conn->query($sql)){
	if($result->num_rows == 1){
		while($row = $result->fetch_assoc()){
			$_SESSION["name"] = $row["name"];
			$_SESSION["id"] = $row["uid"];
			$_SESSION["email"] = $row["email"];
			$_SESSION["img"] = $row["profile"];
		}
	}
}

header("Location: home.php");
}

if(isset($_POST['register']) && !empty($_POST['name']) && !empty($_POST['pass']) && !empty($_POST['email']) && !empty($_POST['cpass'])){
	require('config.php');
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$cpass = $_POST['cpass'];
	if($pass == $cpass){
		$query = $conn->prepare("INSERT INTO user (name,email,pass) VALUES(?,?,?)");
		$query->bind_param("sss",$name,$email,$pass);
		if($query->execute()){
			//echo "<br>Query Completed<br>Registered successfully<br>";

			//header("Location: home.html");
		}else{
			//echo "\nQuery Failed";
		}
	}else{
		//echo "Password and confirm passwords are not same<br>Please try again with correct information";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Not Real Twitter</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="header">&nbsp;</div>
<div class="content">
<div class="left">
	<div class="slide">
		<img src="img/1.jpg" class="img">
		<img src="img/2.jpg" class="img">
		<img src="img/3.png" class="img">
		<img src="img/4.jpg" class="img">
	</div>
	<br>
	<div class="intro">
		<!--This is just a clone of twitter<br>Submitted by:-<br>
		Puspendra Kumar Pandey<br>
		MCA 4th semester
		Web technology project-->
	</div>
</div>
<div class="right">
	<div class="login">
		<div class="form">
			<form action="" method="post">
				<input type="text" class="center" placeholder="E-mail address" name="usr" id="usr"><br>
				<input type="password" class="center" placeholder="Password" name="pass" id="pass"><br>
				<input type="submit" class="submit center" value="Log In" name="login" id="login"><br>
			</form>

			<a href="" class="right">Forgot Password</a><br><br>
			<span id="login_error"></span>
		</div>
	</div>
	<div class="signup">
		<div class="form">
			<form action="" method="post">
				<input type="text" class="center" placeholder="Enter your name" name="name" id="name"><br>
				<input type="email" class="center" placeholder="Enter E-mail address" name="email" id="email"><br>
				<!--<input type="text" class="center" placeholder="Enter User Id"><br>-->
				<input type="password" class="center" placeholder="Enter Password" name="pass" id="pass"><br>
				<input type="password" class="center" placeholder="Confirm Password" name="cpass" id="cpass"><br>
				<input type="submit" class="submit center" value="Sign Up" name="register" id="register"><br>
			</form>
			<span id="register_error"></span>
		</div>
	</div>
</div>
</div>
<div class="footer">&nbsp;</div>
</body>
</html>
