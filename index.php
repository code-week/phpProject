<a class='btn btn-success' href='page1_admin.php' role='button'>Back to main menu</a>
<br/>
<br/>
<?php
require_once('header.php');

	if(!empty($_POST['send'])){
		foreach ($_POST['selected'] as $key => $value) {
			echo "$key - $value <br>";
		}
	}

	$page_name = 'Students';
	$no = 1;
	$q = "SELECT first_name, 
	last_name, 
	age, 
	occupation, 
	previous_experience, 
	mail, course,
	phone,
	implementation,
	contribution,
	status
	FROM students";

	if (isset($_POST['filter'])) {
		$search_term = mysqli_real_escape_string($conn, $_POST['filter_status']);
		$q .= " WHERE status = '$search_term'";
	}
	echo $q;




	$q_1 = "SELECT student_id FROM students";
	$result = mysqli_query($conn, $q);
	$result_1 = mysqli_query($conn, $q_1);
	echo "<form method='post' action='send_email.php' name='checkbox'>";
	echo "<table class='table table-bordered'>";
	
	if (mysqli_num_rows($result) > 0  ) {
		echo "<tr>
		<td>No</td>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Age</td>
		<td>Occupation</td>
		<td>Experience</td>
		<td>E-mail</td>
		<td>Course</td>
		<td>Phone</td>	
		<td>Implementation</td>
		<td>Contribution</td>
		<td>Status</td>
		<td>Edit Status</td>
		<td>Select</td>
	</tr>";
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr><td>$no</td>";
		
		foreach ($row as $value) {
			echo "<td>".$value."</td>";			
		}
		$row_1 = mysqli_fetch_assoc($result_1);
		$id = $row_1['student_id'];
		echo "<td><a href='update_status.php?id=$id&no=$no' class='btn btn-info' id='$id' role='button'>UPDATE</td>";
		$no++;
		echo "<td><input type='checkbox' value='$row_1[student_id]' name='selected[]'></td>";
		echo "</tr>";
	}
}
echo "</table></dic>";
?>
	<a class='btn btn-success' href='page1_admin.php' role='button'>Back to main menu</a>
	<input type="submit" class='btn btn-info' value="Send to Selected" name="send">
	<a class='btn btn-danger' href='send_email.php' role='button'>Send E-mail to all</a><br/>
</form>

<form method="POST" action="index.php">
	<select name="filter_status" > 
		<option value="confirmed">confirmed</option>
		<option value="declined">declined</option>
		<option value="rejected">rejected</option>
		<option value="pending">pending</option>
		<option value="unconfirmed">unconfirmed</option>
	</select>
	<input type="submit" name="filter">
</form>


<?php 
$qu = "SELECT * FROM students ";

if (isset($_POST['filter2'])) {
	$search_term2 = mysqli_real_escape_string($_POST['filter_course']);
}
$qu .= "WHERE status = '[$search_term2]'";
?>
<form method="POST" action="index.php">
	<select name="filter_course"> 
		<option value="php">php</option>
		<option value="java">java</option>
	</select>
	<input type="submit" name="filter2">
</form>