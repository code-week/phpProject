<?php
	// Start the session
	session_start();
	//create connection
	$conn = mysqli_connect('localhost', 'vratsad', 'ProgramistB@c3', 'vratsad_code-week');
	if (!$conn) {
	die ("Connection failed: mysqli_connect_error()");
} else {
	//echo "Connected succsessfuly";
}
if (isset($_POST['submit'])) {
	$errors = array();
	$a = trim($_POST['first_name']);
	if(!isset($a) or empty($a))
	{
		$errors['first_name'] = "Моля въведете име";
	}
if (isset($_POST['submit'])) {
	$errors1 = array();
	$b = trim($_POST['last_name']);
	if(!isset($b) or empty($b))
	{
		$errors1['last_name'] = "Моля въведете фамилия";
	}
}
if (isset($_POST['submit'])) {
	$errors4 = array();
	$x = trim($_POST['age']);
	if(!isset($x) or empty($x))
	{
		$errors4['age'] = "Моля въведете възрастова група";
	}
}

if (isset($_POST['submit'])) {
	$errors5 = array();
	$y = trim($_POST['occupation']);
	if(!isset($y) or empty($y))
	{
		$errors5['occupation'] = "Моля въведете статус";
	}
}
	if (isset($_POST['submit'])) {
	$errors3 = array();
	$e = trim($_POST['level']);
	if(!isset($e) or empty($e))
	{
		$errors3['level'] = "Моля въведете опит";
	}
}
	$d = $_POST["course_name"];
	if (isset($_POST['submit'])) {
	$errors2 = array();
	$phone = trim($_POST['phone']);
	if(!isset($phone) or empty($phone))
	{
		$errors2['phone'] = "Моля въведете телефонен номер";
	}
}
	$impl = $_POST["implementation"];
	$contribut = $_POST["contribution"];
	//validation e-mail
	if (empty($_POST["mail"])) {
    $emailErr = "Моля въведете валиден e-mail!";
  } else {
    $c = $_POST["mail"];
    // check if e-mail address is well-formed
    if (!filter_var($c, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Невалиден формат на e-mail!"; 
    }
  }
    
    if(empty($errors))
    {
	    mysqli_query($conn, "SET NAMES UTF8");
		$newstudent="INSERT INTO `vratsad_code-week`.`students` (`first_name`, `last_name`, `age`, `occupation`, `previous_experience`, `mail`, `course`, `phone`, `implementation`, `contribution`) 
		VALUES ('$a', '$b', '$x', '$y', '$e', '$c', '$d', 'phone', '$impl', '$contribut')";
		$res = mysqli_query($conn, $newstudent);
		if (mysqli_affected_rows($conn) > 0) {
			header("Location: page1.php?reg=true&course=$d");
		}
	}
}else{
	$errors = array();
	$errors['first_name'] = '';
	$errors1['last_name'] = '';
	$errors2['phone'] = '';
	$errors3['level'] = '';
	$errors4['age'] = '';
	$errors5['occupation'] = '';
}
?>

<!DOCTYPE html>
<html>
<head>
	<title> Регистрация </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="style.css" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<?php
if(isset($_GET['reg'])){
	$course = $_GET['course'];
	$registered = $_GET['reg'];
	if ($registered) {
		echo "<div class='row'>";
		echo "<div class='col-xs-2 col-offset-1'>";
		echo "</div>";
		echo "<div class='col-xs-6'>";
		echo "<span style='color: orange; text-align: center;'> Благодарим, че се регистрирахте за CodeWeek-Враца 2015г. </span>";
		echo "<br/>";
		echo "<span style='color: orange; text-align: center;'>Ще получите email за потвърждение сега и седмица преди събитието email с подробности за вашия модул - $course </span>";
		echo "<span style='color: orange; text-align: center;'><a href='http://vratsad.hulk.icnhost.net/projects2-php/code-week/page1.php'> Back </a></span>";
		echo "</div>";
		echo "</div>";
	}
}
?>
<form method="post" action="page1.php" class="form-horizontal">
<div class="row">
	<div class="col-xs-2 col-offset-1"> </div>
  	<div class="col-xs-6"> <h1> CodeWeek <img src= "http://vratsad.hulk.icnhost.net/projects2-php/code-week/mouse.png" width="180" height="150" alt="picture" class="img-circle"> </h1> </div>
</div>
<div class="row">
	<div class="col-xs-2 col-offset-1"> </div> 
	<div class="col-xs-6"> <h3> Форма за регистрация за участие в безплатен курс в рамките на Code Week 2015 година </h3> </div>
</div>
<div class="row">
	<div class="col-xs-3 col-offset-1"> </div> 
	<div class="col-xs-6"> <p class='error-msg'> * Задължително поле </p> </div>
</div>
<div class="row">
    <div class="col-xs-2 col-offset-1"> </div>
    <div class="col-xs-6"><form class="form-horizontal" action="page1.php" method="post">
  		<br/>
  		<div class="form-group">
    	<label for="first_name" class="col-xs-2 control-label">Име*</label>
    	<div class="col-xs-10">
      	<input type="first_name" class="form-control" name="first_name" placeholder="Име">
      	<?php echo "<span class='error-msg'> $errors[first_name] </span>"; ?><br/>
    </div>
  </div>	
		<br/>
		<div class="form-group">
    	<label for="last_name" class="col-xs-2 control-label">Фамилия*</label>
    	<div class="col-xs-10">
      	<input type="last_name" class="form-control" name="last_name" placeholder="Фамилия">
      	<?php echo "<span class='error-msg'> $errors1[last_name] </span>"; ?><br/>
    </div>
  </div>	
		<br/>
		<div class="form-group">
    	<label for="mail" class="col-xs-2 control-label">Email*</label>
    	<div class="col-xs-10">
      	<input type="email" class="form-control" name="mail" placeholder="Email">
    </div>
  </div>
  		<br/>
  		<div class="form-group">
    	<label for="phone" class="col-xs-2 control-label">Телефон*</label>
    	<div class="col-xs-10">
      	<input type="phone" class="form-control" name="phone" placeholder="Телефон">
      	<?php echo "<span class='error-msg'> $errors2[phone] </span>"; ?><br/>
    </div>
  </div>
  		<div class="col-xs-10">
		<h4> Изберете курс, който искате да запишете </h4> 
  		<div class="form-group">
		<label for="course_name" class="col-xs-2 control-label">Курс</label>
		<div class="col-xs-10">
		<select name="course_name" id="course_name" class="form-control">
  	<?php
  	$sel_course = "SELECT course_name FROM `courses`";
	$rescourse = mysqli_query($conn, $sel_course);
  	
    if (mysqli_num_rows($rescourse) > 0) {
     
     while($row = mysqli_fetch_assoc($rescourse)) {
         foreach ($row as $key => $value) {
         	echo "<option value='$value' ";
         	if ($row['course_name'] == $value) {
         		echo "selected";
         	}
         	echo ">".$value."</option>";
         }
     }
} 
		echo ">".$value."</option>";
		
  	?>
  	</select>
</div>
		<br/>
		<br/>
		<div class="col-xs-10">
		<h4>Какъв опит имате по темата на курса?</h4> 
	<?php
	mysqli_query($conn, "SET NAMES UTF8");
  	$sel_exp = "SELECT type FROM `experiences`";
	$resexp = mysqli_query($conn, $sel_exp);
    if (mysqli_num_rows($resexp) > 0) {
    	while ($row = mysqli_fetch_assoc($resexp)) {
    		echo "<label class='radio-inline'>";
    		echo "<input type='radio' name='level' id='level1' value='$row[type]'>$row[type]";
			echo "</label>";
			echo "<br/>";
    	}
    }
  	?>
  	<?php echo "<span class='error-msg'> $errors3[level] </span>"; ?><br/>
	</div>
		<br/>
		<br/>
		<div class="col-xs-10">
		<br/>
		<h4> С какво се занимавате в момента? </h4>
		<?php
		mysqli_query($conn, "SET NAMES UTF8");
  		$sel_occ = "SELECT type_occupation FROM `occupations`";
		$resocc = mysqli_query($conn, $sel_occ);
  	
    	if (mysqli_num_rows($resocc) > 0) {
    	while ($row = mysqli_fetch_assoc($resocc)) {
    		echo "<label class='radio-inline'>";
    		echo "<input type='radio' name='occupation' id='occupation' value='$row[type_occupation]'>$row[type_occupation]";
			echo "</label>";
			echo "<br/>";
    		}
    	}
  		?>
  		<?php echo "<span class='error-msg'> $errors5[occupation] </span>"; ?><br/>
		</div>
		<br/> 
		<br/>
		<div class="col-xs-10">
		<br/>
		<h4>Възраст: </h4>
		<?php
		mysqli_query($conn, "SET NAMES UTF8");
  		$sel_age = "SELECT age_group FROM `ages`";
		$resage = mysqli_query($conn, $sel_age);
  	
    	if (mysqli_num_rows($resage) > 0) {
    	while ($row = mysqli_fetch_assoc($resage)) {
    		echo "<label class='radio-inline'>";
    		echo "<input type='radio' name='age' id='age' value='$row[age_group]'>$row[age_group]";
			echo "</label>";
			echo "<br/>";
    	}
    }
  	?>
  	<?php echo "<span class='error-msg'> $errors4[age] </span>"; ?><br/>
		</div>
		<br/> 
		<br/>
		<div class="col-xs-10">
		<br/>
		<h4>Ще използвате ли наученото на събитието в последствие и как? <br/></h4>
		<textarea class="form-control" rows="3" name="implementation" placeholder="Text input"></textarea> <br/>
		</div>
		<br/>
		<div class="col-xs-10">
		<h4>Как то би допринесло за бъдещото ви развитие?</h4>
		<textarea class="form-control" rows="3" name="contribution" placeholder="Text input"></textarea> <br/>
		<input class="btn btn-primary" type="submit" name="submit" value="Регистрация">
		</div>
</div>
</form>
</body>
</html>