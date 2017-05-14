<?php
session_start();
if(!isset($_SESSION["id"]) && empty($_SESSION["id"])){
	header("Location: index.php");
}else{
	$img = $_SESSION["img"];
}

if(isset($_POST["tweet"])){
	require("config.php");

	$sql = $conn->prepare("INSERT INTO tweet (uid,message) VALUES(?,?)");
	$sql->bind_param("ss",$_SESSION["id"],$_POST["ta"]);
	$sql->execute();
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>NotRealTwitter</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<!--<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
--><script type="text/javascript" src="js/angular.min.js"></script>
	<script type="text/javascript" src="js/home.js"></script>
</head>
<body ng-app="home" ng-contoller="homeClt">

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
					<a href="#" id="logout" name="logout" ng-click="logoutFun()">Log Out</a>
				</div>
			</div>
		</li>
		<li style="float: right;"><form><input type="text" placeholder="Search"></form></li>
	</ul>
	<img src="" align="center">
</div>

<!-- end navigation bar -->
<!-- container -->

<div class="container">
	<div class="content">
		<div class="container-left">
		<!--Profile upper-->
			<div class="profile_upper">
				<h3><?php echo $_SESSION["name"]; ?></h3>
			</div>
			<!--Profile middle-->
			<div class="profile_middle">
			<!--Profile middle-left-->
				<div class="profile_middle_left">
				<!--Profile middle-left-upper-->
					<div class="profile_middle_upper"></div>
					<!--Profile middle-left-lower-->
					<div class="profile_middle_lower"></div>
				</div>
				<!--Profile middle-center-->
				<div>
					<a href="#" ng-click="toggleModal()" class="btn btn-default"><img src="<?php echo $img; ?>"></a>
					
				</div>

				<!--Profile middle-right-->
				<div class="profile_middle_right">
				<!--Profile middle-right-upper-->
					<div class="profile_middle_upper"></div>
					<!--Profile middle-right-lower-->
					<div class="profile_middle_lower"></div>
				</div>
			</div>
			<!--Profile lower-->
			<div class="profile_lower">gfdg</div>
		</div>
		<div class="container-middle">
			<div class="tweet_area" ng-controller="tweet_area">
				<form action = "" method="post">
				<div class="tweet_text_area">
					<textarea id="ta" ng-model="ta" name="ta" maxlength="500"></textarea>
				</div>
				<div class="tweet_area_panel">
						<button style="float: left;">Add Photo</button>
						<button style="float: right;" id="tweet" name = "tweet">Tweet</button>
						<p style="float: right;"></p>
				</div>
			</form>
			</div>
			<div>
				<?php
					$sql = "SELECT * from tweet WHERE uid = '".$_SESSION["id"]."'";
					require("config.php");
					if($result = $conn->query($sql)){
						if($result->num_rows > 0){
							while($row = $result->fetch_assoc()){
								echo "<div>";
									echo $row["message"];
								echo "</div>";
							}
						}
					}
				?>
			</div>
			<div>

			</div>
		</div>
		<div class="container-right">
			<div>

			</div>
			<div>

			</div>
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
