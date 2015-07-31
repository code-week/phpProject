<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php 
//create connection
$conn = mysqli_connect('localhost', 'root', '', 'vratsad_code-week');
//check connection
if (!$conn) {
	die ("Connection failed: mysqli_connect_error()");
} 

	$status_query = "SELECT status_type FROM statuses";
	$status_result = mysqli_query($conn, $status_query);
	if (!empty($_GET['id'])) {
		$id = $_GET['id'];
		$no = $_GET['no'];
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
