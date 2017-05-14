<?php
session_start();
if(!isset($_SESSION["id"]) && empty($_SESSION["id"])){
	header("Location: index.php");
}else{
	/*echo "<br>";
	echo "<br>User Id : ".$_SESSION["id"];
	echo "<br>Name : ".$_SESSION["name"];
	echo "<br>E-Mail : ".$_SESSION["email"];
*/
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>NotRealTwitter</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<!-- navigation bar -->

<div class="nav-bar">
	<ul>
		<li><a href="home.php">Home</a></li>
		<li><a href="notification.php">Notification</a></li>
		<li><a href="message.php">Messages</a></li>
		<li style="float: right;"><a href="#">Tweet</a></li>
		<!--<li style="float: right;"><a href="#">Profile</a></li>-->
		<li style="float: right;">
			<div class="dropdown">
				<button class="dropbtn">Click Me</button>
				<div class="dropdown-content">
					<a href="#">View Profile</a>
					<a href="#">Change Password</a>
					<a href="#">Log Out</a>
				</div>
			</div>
		</li>
		<li style="float: right;"><a href="#">Search</a></li>
	</ul>
	<img src="" align="center">
</div>

<!-- end navigation bar -->
<!-- container -->

<div class="container">
	<div class="content">
		<div class="container-left">
			<ul>
				<li><a href="">First Message</a></li>
				<li><a href="">Second Message</a></li>
			</ul>
		</div>
		<div class="container-middle">
			<p>f ygvsyhdfgvdgfvhasdfgysdrgfasifhdsgfyadgfvadsfhvadsugvdahvbhhd
			fvgdsygvdysavhdshvi]
			hgdfgvd
			bvjfyd
			bfvhdyvgdr
			fvddfsafgsrfgs</p>

		</div>
		<div class="container-right">

		</div>
	</div>
</div>

<!-- end container -->
<!-- footer -->

<div class="footer">

</div>

<!-- end footer -->

</body>
</html>
