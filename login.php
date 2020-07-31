<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<?php
require_once('constanta.php');
session_start();

$error = "Произошло ошибка";

if (!isset($_SESSION['id_user'])) {
	if (isset($_POST['submit'])) {
	
	$user_login = mysqli_real_escape_string($dbc, trim($_POST['login']));
	$user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
if (!empty($user_login) && !empty($user_password)) {
	
	$query = "SELECT id_user,login FROM test_win WHERE login = '$user_login' AND password = '$user_password'";
	$data = mysqli_query($dbc, $query)
	or die("error here!!!");

	if (mysqli_num_rows($data) == 1) {

		$row = mysqli_fetch_array($data);
		$_SESSION['id_user'] = $row['id_user'];
		$_SESSION['login'] = $row['login'];
		setcookie('id_user', $row['id_user'], time()+(60 * 60 * 24 * 30));
		setcookie('login', $row['login'], time()+(60 * 60 *24 *30));
		$home_url = dirname($_SERVER['PHP_SELF']).'/information.php';
        header('Location: '.$home_url);
        echo "Вы вошли как ".$_SESSION['id_user'];

		
	} else {
          // Имя пользователя/пароль введены не верно, создание сообщения об ошибке
          $error_msg = 'Извините, чтобы войти, нужны правильные логин и пароль.';
        }
      }
      else {
        // Имя пользователя/пароль не введены, создание сообщения об ошибке
        $error_msg = 'Извините, чтобы войти, нужны ввести логин и пароль.';
      }
    }

?>

<?php
 if (empty($_SESSION['id_user'])) {
 	echo $error;
 ?>


	<label for="login">Логин </label>
	<input type="text" name="login" id="login" value="<?php if(!empty($user_login)) echo $user_login; ?>"><br/>
	<label for="password">Пароль </label>
	<input type="password" name="password" id="password" value="<?php if(!empty($user_password)) echo $user_password; ?>"><br/>
	<input type="submit" name="submit" value="Войти">
</form>

<?php
}else{
	echo $_SESSION['login'];
}}
?>