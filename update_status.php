<?php 
	$page_name = "Update Student Status";
	require_once('header.php');
	$q = "SELECT first_name, 
	last_name, 
	age, 
	occupation, 
	previous_experience, 
	mail, 
	course,
	phone,
	implementation,
	contribution,
	status
	FROM students WHERE student_id = $id";
	$result = mysqli_query($conn, $q);
	$row = mysqli_fetch_assoc($result);
?>
<?php 
?>
	<div class="col-xs-8 col-xs-offset-2">
		
		<div class="col-xs-10 col-xs-offset-1">
			<h2>Change User №<?php echo $id?> </h2>
		</div>		
		<form class="form-horizontal" method="post" action="update_status.php">
			<input type="hidden" name="id" value="<?php echo $id;?>">
			<div class="form-group">
				<label for="fn" class="col-xs-2 control-label">First name</label>
				<div class="col-xs-10">
					<input type="text" class="form-control" name="first_name" id="fn" value="<?php echo $row['first_name'];?>">
				</div>
			</div>
			<div class="form-group">
				<label for="ln" class="col-xs-2 control-label">Last name</label>
				<div class="col-xs-10">
					<input type="text" class="form-control" name="last_name" id="ln" value="<?php echo $row['last_name'];?>">
				</div>
			</div>
			<div class="form-group">
				<label for="status" class="col-xs-2 control-label">Status</label>
				<div class="col-xs-4">
					<select name="status" id="status" class="form-control">
						<?php 
						if (mysqli_num_rows($status_result) > 0) {
							while ($status_row = mysqli_fetch_assoc($status_result)) {
								foreach ($status_row as $value) {
									echo "<option value='$value' ";
									if ($row['status'] == $value) {
										echo "selected";
									}
									echo ">".$value."</option>";			
								}
							}
						}
						?>
					</select>
				</div>
			<div class="form-group">
			<div class="col-xs-3 col-xs-offset-1">
				<button type="submit" class="btn btn-info">Update Student's Status</button>
				</div>
			</div>
		</form>
		<hr/>
		<div class="col-xs-4 col-xs-offset-8">
			<a class='btn btn-success' href='index.php' role='button'>Back to Students</a>
		</div>

		<?php 
		if (!empty($_POST)) {
			$id = $_POST['id'];
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name']; 
			$status = $_POST['status'];
			$update_q = "UPDATE students 
			SET status = '$status'
			WHERE student_id = $id ";
			if (mysqli_query($conn, $update_q)) {
				header('Location: index.php');
			} 		
		} 
		?>