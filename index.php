<a class='btn btn-success' href='page1_admin.php' role='button'>Back to main menu</a>
<br/>
<br/>
<script language="JavaScript">
function toggle(source) {
  checkboxes = document.getElementsByName('selected[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>
<form method="POST" action="index.php">
	<select name="filter_status" > 
		<option value= ""></option>
		<option value="approved">approved</option>
		<option value="declined">declined</option>
		<option value="rejected">rejected</option>
		<option value="pending">pending</option>
		<option value="not approved">not approved</option>
	</select>
	<select name="filter_course">
	<option value= ""></option> 
		<option value="PHP/MYSQL">PHP/MYSQL</option>
		<option value="Android">Android</option>
		<option value="java">java</option>
		<option value="Wordpress/HTML">Wordpress/HTML</option>
	</select>
	<input type="submit" name="filter">
</form>
<?php
$page_name = "Students";
require_once('header.php');
	if(!empty($_POST['send'])){
		foreach ($_POST['selected'] as $key => $value) {
			echo "$key - $value <br>";
		}
	}
	$page_name = 'Students';
	$no = 1;
	$q = "SELECT * FROM students";
	if (isset($_POST['filter'])) {
		if ($_POST['filter_status'] == null) {
		$search_term2 = mysqli_real_escape_string($conn, $_POST['filter_course']);
		$q .= " WHERE course = '$search_term2'";
	} elseif ($_POST['filter_course'] == null) {
		$search_term = mysqli_real_escape_string($conn, $_POST['filter_status']);
		$q .= " WHERE status = '$search_term'";
	} else {
		$search_term = mysqli_real_escape_string($conn, $_POST['filter_status']);
		$search_term2 = mysqli_real_escape_string($conn, $_POST['filter_course']);
		$q .= " WHERE status = '$search_term' AND course = '$search_term2'";
	}
		
	}
	$result = mysqli_query($conn, $q);
	echo "<form method='post' action='send_email.php' name='checkbox'>";
	echo "<div class='text-right'><input type='checkbox' onClick='toggle(this)' /> Select ALL</div>";
	echo "<table class='table-responsive table-striped table-bordered'>";
	
	if (mysqli_num_rows($result) > 0  ) {
		echo "<tr>
		<td>ID</td>
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
	echo "<tr>";
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<td>$row[student_id]</td>";
		echo "<td>$row[first_name]</td>";
		echo "<td>$row[last_name]</td>";
		echo "<td>$row[age]</td>";
		echo "<td>$row[occupation]</td>";
		echo "<td>$row[previous_experience]</td>";
		echo "<td>$row[mail]</td>";
		echo "<td>$row[course]</td>";
		echo "<td>$row[phone]</td>";
		echo "<td>$row[implementation]</td>";
		echo "<td>$row[contribution]</td>";
		echo "<td>$row[status]</td>";
		$id = $row['student_id'];
		echo "<td><a href='update_status.php?id=$id' class='btn btn-info' id='$id' role='button'>UPDATE</td>";
		echo "<td><input type='checkbox' value='$row[student_id]' name='selected[]'></td>";
		echo "</tr>";
	}
}
echo "</table></dic>";
?>
	<a class='btn btn-success' href='page1_admin.php' role='button'>Back to main menu</a>
	<input type="submit" class='btn btn-info' value="Send to Selected" name="send">
	
</form>

