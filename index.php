<a class='btn btn-success' href='page1_admin.php' role='button'>Back to main menu</a>
<br/>
<br/>
<?php
	$page_name = 'Students';
	require_once('header.php');
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
	$q_1 = "SELECT student_id FROM students";
	$result = mysqli_query($conn, $q);
	$result_1 = mysqli_query($conn, $q_1);
	echo "<table class='table table-bordered'>";
	if (mysqli_num_rows($result) > 0 && mysqli_num_rows($result_1) > 0 ) {
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
		echo "</tr>";
	}
}
echo "</table></dic>";
?>
	<a class='btn btn-success' href='page1_admin.php' role='button'>Back to main menu</a>
</body>