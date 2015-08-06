
<a class='btn btn-info' href='page1_admin.php' role='button'>Back to main menu</a>
<br/>
<br/>
<?php
session_start();
$page_name = 'Send Emails';
	require_once('header.php');
	if(!empty($_POST['send'])){
		$id_mail= "";
		foreach ($_POST['selected'] as $key => $value) {
			echo "$key - $value <br>";
			$id_mail .= "$value, ";
			}
			$id_mail= substr($id_mail, 0, -2);
	}
	if(!empty($_POST['Send2'])){
			$mail= mysqli_query($conn, "SELECT mail FROM students WHERE student_id IN($_POST[id_mail])");
			echo "SELECT mail FROM students WHERE student_id IN($_POST[id_mail]) ";
			while ($row_mail = mysqli_fetch_assoc($mail)) {
				echo "$row_mail[mail] ";
			$to = $row_mail['mail'];
			$subject = $_POST['head'];
			$message = $_POST['body'];
			$headers = 'From: code-week@example.com' . "\r\n" .
	   		'Please do not reply to this message' . "\r\n" .
	   		'X-Mailer: PHP/' . phpversion();
	    	mail($to, $subject, $message, $headers);
			}
		}
?>
<form name='mail2' method='post' action='send_email.php'><br/>
	<br/>

<input type='text' name='head' placeholder='header'>
<br/>
<br/>

<textarea name='body' rows="4" cols="50" placeholder='body'></textarea><br/>
<br/>
<input class='btn btn-danger'type='submit' name="Send2" value='Send'>
</form>
