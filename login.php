<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Admin Panel</title>
</head>
<body>
<?php 
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'vratsad_code-week1');
if (!$conn) {
	die("Connection failed: mysqli_connect_error()"); 
} else {
	//echo "Connected successfully!";
}
?>
	<h3>Code Week 2015</h3>
	<center>
		<br/>
		<br/>
		<br/>
	<form action="login.php" method="post">
		<input type="text" name="username" placeholder="username" id="usr" />
		<br/>
		<br/>
		<input type="password" name="password" placeholder="password" id="pass" />
		<br/>
		<br/>
		<input type="submit" value="Login" />
	</form>
<?php 
if (!empty($_POST)) {
	$_SESSION['username'] = $_POST['username'];
	$_SESSION['password'] = $_POST['password'];
	$username = $_SESSION['username'];
	$password_query ="SELECT password FROM admin WHERE username = '$username'";
	$password_result = mysqli_query($conn, $password_query);
	$password_row = mysqli_fetch_assoc($password_result);
	if ($password_row['password'] !== $_SESSION['password']) {
		echo "Wrong username/password!";
	} else {
		header('Location: welcome.php');
	}
}
?>
</center>
</body>
</html>