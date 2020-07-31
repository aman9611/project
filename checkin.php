<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
require_once('constanta.php');


if (isset($_POST['submit'])) {
	
	$login = mysqli_real_escape_string($dbc, trim($_POST['login']));
	$password1 = mysqli_real_escape_string($dbc, trim($_POST['password_1']));
	$password2 = mysqli_real_escape_string($dbc, trim($_POST['password_2']));

	if (!empty($login) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
		
      $query = "SELECT * FROM test_win WHERE login = '$login'";
      $data = mysqli_query($dbc , $query)
      or die("error here!!");

      if (mysqli_num_rows($data) == 0) {
      	$query = "INSERT INTO test_win (login , password) VALUES ('$login', '$password1')";
      	mysqli_query($dbc, $query)
      	or die("error here 2!!!");

      	echo '<p>Ваша учетная запись успешно создана. Вы можете войти в приложение и <a href="login.php">войти</a>.</p>';
      }else{
            echo "Данный логин уже занята";
      }
	}else{
		echo 'введите правильный логин и пароль';
	}
}


?>


<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<label for="login">Логин </label>
	<input type="text" name="login" id="login"><br/>
	<label for="password_1">Пароль </label>
	<input type="password" name="password_1" id="password_1"><br/>
	<label for="password_2">Повторите пароль </label>
	<input type="password" name="password_2" id="password_2">
	<input type="submit" name="submit" value="Готов">
	</form>
</body>
</html>

