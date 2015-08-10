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
            $mail= mysqli_query($conn, "SELECT student_id, mail FROM students WHERE student_id IN($_POST[id_mail])");
            echo "SELECT student_id, mail FROM students WHERE student_id IN($_POST[id_mail]) ";
            while ($row_mail = mysqli_fetch_assoc($mail)) {
                echo "$row_mail[mail] ";
            $to = $row_mail['mail'];
            $subject = $_POST['head'];
            $message = $_POST['body'];
            $headers = 'From: code-week@example.com' . "\r\n" .
            'Please do not reply to this message' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            mail($to, $subject, $message, $headers);
            $sent_mails= mysqli_query($conn, "INSERT INTO sent_mails (id_st, mail_head, content) VALUES ('$_POST[id_mail]', '$subject', '$message') ");
            if (mysqli_query($conn, $sent_mails)){
            	echo "Success";
            } else {
            	echo "Error ". $sent_mails . "<br/>" . mysqli_error($conn);
            }
            }
        }
        mysqli_close($conn);
?>
<form name='mail2' method='post' action='send_email.php'><br/>
<input type="hidden" name="id_mail" value="<?php echo $id_mail; ?>">
    <br/>

<input type='text' name='head' placeholder='header'>
<br/>
<br/>

<textarea name='body' rows="4" cols="50" placeholder='body'></textarea><br/>
<br/>
<input class='btn btn-danger'type='submit' name="Send2" value='Send'>
</form>