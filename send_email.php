<a class='btn btn-info' href='page1_admin.php' role='button'>Back to main menu</a>
<br/>
<br/>
<?php
$page_name = 'Emails';
	require_once('header.php');
	$no = 1;
	$q = "SELECT id_template,
	head,
	content
	FROM mail_templates"
?>