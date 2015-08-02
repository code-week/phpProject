<?php
	//session_start();
	//create connection
	$conn = mysqli_connect('localhost', 'root', '', 'vratsad_code-week');
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
	$x = $_POST['age'];
	$y = $_POST['occupation'];
	$e = $_POST["level"];
	//$c = $_POST["mail"];
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
			header("Location: page1.php/?reg=true&course=$d");
		}
	}
}else{
	//$b = '';
	$errors = array();
	$errors['first_name'] = '';
	$errors1['last_name'] = '';
	$errors2['phone'] = '';
}
?>

<!DOCTYPE html>
<html>
<head>
	<title> Регистрация </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="style.css"><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<?php
if(isset($_GET['reg'])){
	$course = $_GET['course'];
	$registered = $_GET['reg'];
	if ($registered) {
		echo "<p>Благодарим, че се регистрирахте за CodeWeek-Враца 2015г. Ще получите email за потвърждение сега и седмица преди събитието email с подробности за вашия модул - $course </p>";
	}
}
?>
<form method="post" action="page1.php" class="form-horizontal">
<div class="row">
	<div class="col-xs-2 col-offset-1"> </div>
  	<div class="col-xs-6"> <h1 style="color:blue"> CodeWeek <img src="mouse.jpg" width="180" height="150" alt="picture" class="img-circle"> </h1> </div>
</div>
<div class="row">
	<div class="col-xs-2 col-offset-1"> </div> 
	<div class="col-xs-6"> <h3 style="color:blue; text-align:center;"> Форма за регистрация за участие в безплатен курс в рамките на Code Week 2015 година </h3> </div>
</div>
<div class="row">
    <div class="col-xs-2 col-offset-1"> </div>
    <div class="col-xs-6"><form class="form-horizontal" action="page1.php" method="post">
  		<br/>
  		<div class="form-group">
    	<label for="first_name" class="col-xs-2 control-label">Име*</label>
    	<div class="col-xs-10">
      	<input type="first_name" class="form-control" id="first_name" placeholder="Име">
      	<?php echo "<span class='error-msg'> $errors[first_name] </span>"; ?><br/>
    </div>
  </div>	
		<br/>
		<div class="form-group">
    	<label for="last_name" class="col-xs-2 control-label">Фамилия*</label>
    	<div class="col-xs-10">
      	<input type="last_name" class="form-control" id="last_name" placeholder="Фамилия">
      	<?php echo "<span class='error-msg'> $errors1[last_name] </span>"; ?><br/>
    </div>
  </div>	
		<br/>
		<div class="form-group">
    	<label for="mail" class="col-xs-2 control-label">Email*</label>
    	<div class="col-xs-10">
      	<input type="email" class="form-control" id="mail" placeholder="Email">
    </div>
  </div>
  		<br/>
  		<div class="form-group">
    	<label for="phone" class="col-xs-2 control-label">Телефон*</label>
    	<div class="col-xs-10">
      	<input type="phone" class="form-control" id="phone" placeholder="Телефон">
      	<?php echo "<span class='error-msg'> $errors2[phone] </span>"; ?><br/>
    </div>
  </div>

  		<br/>
  		<div class="col-xs-10">
		<h4> Изберете курс, който искате да запишете </h4> 
  		<div class="dropdown">
  <button class="btn btn-primary btn-lg dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Курс
    <span class="caret"></span>
  </button>
  	<?php
  	$sel_course = "SELECT course_name FROM `courses`";
	$rescourse = mysqli_query($conn, $sel_course);
  	echo "<ul class='dropdown-menu' aria-labelledby='dropdownMenu1'>";
    if (mysqli_num_rows($rescourse) > 0) {
    	while ($row = mysqli_fetch_assoc($rescourse)) {
    		echo "<li><a href='#'>$row[course_name]</a></li>";
    	}
    }
  	echo "</ul>";
  	?>
</div>
		<br/>
		<div class="col-xs-10">
		<h4>Какъв опит имате по темата на курса?</h4> 
		<label class="radio-inline">
  	<input type="radio" name="level" id="level1" value="without experience">нямам опит
	</label>
	<label class="radio-inline">
  	<input type="radio" name="level" id="level2" value="begginer"> начинаещ
	</label>
	<label class="radio-inline">
  	<input type="radio" name="level" id="level3" value="advanced"> напреднал
	</label>
		</div>
		<br/>
		<br/>
		<div class="col-xs-10">
		<br/>
		<h4> С какво се занимавате в момента? </h4>
		<label class="radio-inline">
	<input type="radio" name="occupation" id="$resocc2" value="schoolarboy"> ученик
	</label>
	<label class="radio-inline">
  	<input type="radio" name="occupation" id="$resocc3" value="student"> студент
	</label>
	<label class="radio-inline">
  	<input type="radio" name="occupation" id="resocc1" value="unempoyed"> безработен
	</label>
	<label class="radio-inline">
	<input type="radio" name="occupation" id="resocc" value="employed"> зает
	</label>
	<label class="radio-inline">
  	<input type="radio" name="occupation" id="resocc4" value="other"> друго
	</label>
	</div>
	<br/> 
	<br/>
	<div class="col-xs-10">
	<br/>
	<h4>Възраст: </h4>
		<label class="radio-inline">
		<input type="radio" name="age" id="age1" value="13"> под 13 години
		</label>
		<label class="radio-inline">
  		<input type="radio" name="age" id="age2" value="13-19"> 13 - 19 години
		</label>
		<label class="radio-inline">
  		<input type="radio" name="age" id="age3" value="20-29"> 20 - 29 години
		</label>
		<label class="radio-inline">
		<input type="radio" name="age" id="age4" value="30-40"> 30 - 40 години
		</label>
		<label class="radio-inline">
  		<input type="radio" name="age" id="age5" value="up 40"> над 40 години
		</label>
		</div>
		<br/> 
		<br/>
		<div class="col-xs-10">
		<br/>
		h4>Ще използвате ли наученото на събитието в последствие и как? <br/></h4>
		<input type="text" name="implementation" class="form-control" placeholder="Text input">  <br/>
		</div>
		<br/>
		<div class="col-xs-10">
		<h4>Как то би допринесло за бъдещото ви развитие?</h4>
		<input type="text" name="contribution" class="form-control" placeholder="Text input"> <br/>
		<input type="submit" name="submit" value="Регистрация">
		</div>
</div>
</form>
</body>
</html>