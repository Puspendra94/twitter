<?php
if(isset($_POST['login']) && !empty($_POST['usr']) && !empty($_POST['pass'])){
	require('config.php');
	$usr = $_POST['usr'];
	$pass = $_POST['pass'];
	$query = "SELECT * FROM user where email = '".$usr."' && pass = '".$pass."'";
	if($result = $conn->query($query)){
		echo "<br>Query Completed<br>Login successfull<br>";
		if($result->num_rows > 0){
			echo "Data Found<br>";
			while($row = $result->fetch_assoc()){
				echo "name :".$row["name"]."<br>E-Mail : ".$row["email"]."<br>Password: ".$row["pass"]."<br>";
			}
			header("Location: home.html");
		}else{
			echo "Data not found";
		}
	}else{
		echo "\nQuery Failed";
	}
}


if(isset($_POST['register']) && !empty($_POST['name']) && !empty($_POST['pass']) && !empty($_POST['email']) && !empty($_POST['cpass'])){
	require('config.php');
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$cpass = $_POST['cpass'];
	$query = $conn->prepare("INSERT INTO user (name,email,pass) VALUES(?,?,?)");
	$query->bind_param("sss",$name,$email,$pass);
	if($query->execute()){
		echo "<br>Query Completed<br>Registered successfull<br>";
		header("Location: home.html");
	}else{
		echo "\nQuery Failed";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<form action="" method="post">
	<input type="text" name="usr" id="usr" placeholder="email"><br><br>
	<input type="password" name="pass" id="pass" placeholder="Password"><br><br>
	<input type="submit" name="login" id="login"><br><br>
</form>
</body>
</html>
