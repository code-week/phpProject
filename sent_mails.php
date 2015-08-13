<?php
	$page_name = "Sent Emails";
	require_once ('header.php');
	$q = "SELECT students.student_id, students.first_name, students.last_name, students.mail, students.course, students.status,
	sent_mails.mail_head, sent_mails.content
	FROM students 
	INNER JOIN sent_mails ON students.student_id = sent_mails.id_st";
	$result = mysqli_query($conn, $q);
	echo "<table class='table-responsive table-striped table-bordered'>";
	if (mysqli_num_rows($result)>0) {
		echo "<tr>
		<td>ID</td>
		<td>First Name</td>
		<td>Last Name</td>
		<td>E-mail</td>
		<td>Course</td>
		<td>Mail Head</td>
		<td>Message</td>
		<td>Status</td>
	</tr>";
	}
	echo "<tr>";
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<td>$row[student_id]</td>";
		echo "<td>$row[first_name]</td>";
		echo "<td>$row[last_name]</td>";
		echo "<td>$row[mail]</td>";
		echo "<td>$row[course]</td>";
		echo "<td>$row[mail_head]</td>";
		echo "<td>$row[content]</td>";
		echo "<td>$row[status]</td>";
		echo "</tr>";
	}
	echo "</table>";
?>