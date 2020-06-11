<?php
session_start();
?>

<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>

<?php

if(isset($_SESSION["session_username"])){
// echo "Session is set"; / / для тестирования
header("Location: intropage.php");
}

if(isset($_POST["login"])){

if(!empty($_POST['username']) && !empty ($_POST['password'])) {
    $username=htmlspecialchars($_POST['username']);
    $password=htmlspecialchars($_POST['password']);

    $query =mysqli_query($mysqli,"SELECT * FROM usertbl WHERE username='".$username."' AND password='".$password."'");

    $numrows=mysqli_num_rows($query);
    if($numrows!=0)

    {
    while($row=mysqli_fetch_assoc($query))
    {
    $dbusername=$row['username'];
    $dbpassword=$row['password'];
    }

    if($username == $dbusername && $password == $dbpassword)

    {


    $_SESSION['session_username']=$username;

    /* Redirect browser */
    header("Location: intropage.php");
    }
    } else {

 $message =  "Неверное имя пользователя или пароль!";
    }

} else {
    $message = "Все поля обязательны для заполнения!";
}
   
}
?>



    <div class="container mlogin">
            <div id="login">
                <h1>Вход</h1> 
<form name="loginform" id="loginform" action="" method="POST">
    <p>
        <label for="user_login">Имя пользователя <br />
        <input type="text" name="username" id="username" class="input" value="" size="20" /></label>
    </p>
    <p>
        <label for="user_pass">Пароль<br />
        <input type="password" name="password" id="password" class="input" value="" size="20" /></label>
    </p>
        <p class="submit">
        <input type="submit" name="login" class="button" value="Вход" />
    </p>
        <p class="regtext">Ещё не зарегистрированы? <a href="register.php" >Регистрация</a>!</p>
</form>

    </div>

    </div>
	
	<?php include("includes/footer.php"); ?>
	
	<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
	