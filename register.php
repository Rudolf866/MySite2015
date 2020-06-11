<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>


	<?php

if(isset($_POST["register"])){


if(!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
	$full_name= htmlspecialchars($_POST['full_name']);
	$email=htmlspecialchars($_POST['email']);
	$username=htmlspecialchars($_POST['username']);
	$password=htmlspecialchars($_POST['password']);
	
	//$hash=$password=password_hash($_POST['password'],PASSWORD_DEFAULT);
	
	$query=mysqli_query($mysqli,"SELECT * FROM usertbl WHERE username ='".$username."'");
    //$query=($queri ,$mysqli);
	$numrows=mysqli_num_rows($query);
	
	if($numrows==0)
	{
	$sql="INSERT INTO usertbl
			(full_name, email, username,password )
			VALUES('$full_name','$email', '$username','$password' )";

	$result=mysqli_query($mysqli,$sql);


	if($result){
	 $message = "Пользователь успешно зарегистрирован";
	} else {
	 $message = "Не удалось вставить данные !";
	}

	} else {
	 $message = "Это имя пользователя уже существует! Пожалуйста, попробуйте другой!";
	}

} else {
	 $message = "Все поля обязательны для заполнения!";
}
}
?>


<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
	
<div class="container mregister">
			<div id="login">
	<h1>Регистрация</h1>
<form name="registerform" id="registerform" action="register.php" method="post">
	<p>
		<label for="user_login">Полное имя<br />
		<input type="text" name="full_name" id="full_name" class="input" size="32" value=""  /></label>
	</p>
	
	
	<p>
		<label for="user_pass">Email<br />
		<input type="email" name="email" id="email" class="input" value="" size="32" /></label>
	</p>
	
	<p>
		<label for="user_pass">Имя пользователя<br />
		<input type="text" name="username" id="username" class="input" value="" size="20" /></label>
	</p>
	
	<p>
		<label for="user_pass">Пароль<br />
		<input type="password" name="password" id="password" class="input" value="" size="32" /></label>
	</p>	
	

		<p class="submit">
		<input type="submit" name="register" id="register" class="button" value="Зарегистрироваться" />
	</p>
	
	<p class="regtext">Уже зарегистрированы? <a href="index.php" >Введите имя пользователя</a>!</p>
</form>
	
	</div>
	</div>
	
	
	
	<?php include("includes/footer.php"); ?>