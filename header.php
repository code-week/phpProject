<head>
<link rel="stylesheet" type="text/css" href="style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<?php 
//create connection
$conn = mysqli_connect('localhost', 'root', '', 'vratsad_code-week');
//check connection
if (!$conn) {
	die ("Connection failed: mysqli_connect_error()");
} 
	mysqli_query($conn, "SET NAMES UTF8");
	$status_query = "SELECT status_type FROM statuses";
	$status_result = mysqli_query($conn, $status_query);
	if (!empty($_GET['id'])) {
		$id = $_GET['id'];
	}	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="jquery-1.11.3.min.js"></script>
	<title><?php echo $page_name;?></title>
</head>
<body>
<div class="container-fluid">
  <div class="row">
