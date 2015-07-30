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
	 		<td>Status</td>
	 	</tr>
<?php 
$conn = mysqli_connect('localhost', 'root', '', 'vratsad_code-week1');
if (!$conn) {
	die("Connection failed: mysqli_connect_error()"); 
} else {
	//echo "Connected successfully!";
}
	$q = "SELECT * from students";

	$result = mysqli_query($conn, $q);
	
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td> $row[student_id]</td>";
			echo "<td> $row[first_name]</td>";
			echo "<td>$row[last_name]</td>";
			echo "<td>$row[age]</td>";
			echo "<td>$row[occupation]</td>";
			echo "<td>$row[previous_experience]</td>";
			echo "<td>$row[mail]</td>";
			echo "<td>$row[course]</td>";
			echo "<td>$row[phone]</td>";
			echo "<td>$row[implementation]</td>";
			echo "<td>$row[status]</td>";
			echo "</tr>";
		}
	} 	
?>
</table>
</body>
</html>