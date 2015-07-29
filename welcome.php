<?php 
session_start();
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Panel</title>
</head>
<body>
	<h3>Hello, <?php echo $_SESSION['username'];?>!</h3>
	 <table class='table table-bordered table-striped'>
	 	<tr>
	 		<td>ID</td>
	 		<td>First name</td>
	 		<td>Last name</td>
	 		<td>Age</td>
	 		<td>ocupation</td>
	 		<td>experience</td>
	 		<td>e-mail</td>
	 		<td>course</td>
	 		<td>phone</td>
	 		<td>implementation</td>
	 	</tr>
<?php 
$conn = mysqli_connect('localhost', 'root', '', 'vratsad_code-week1');
if (!$conn) {
	die("Connection failed: mysqli_connect_error()"); 
} else {
	//echo "Connected successfully!";
}
?>
</body>
</html>