<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
<?php

require_once('constanta.php');

if(isset($_POST['submit'])){
foreach ($_POST['todelete'] as $delete_user){
	 $query = "DELETE FROM test_win WHERE id_user = $delete_user";
mysqli_query($dbc, $query)
	or die("dont deleted");

	echo "Пользователь удален успешно <br/>";


}}
$query = "SELECT * FROM test_win";
$result=mysqli_query($dbc,$query);
while($row=mysqli_fetch_array($result)) {
	echo '<input type = "checkbox" name="todelete[]" value="'.$row['id_user'].'" <br/>';
	echo "Имя ".$row['name']."<br/>";
	echo "Фамилия ".$row['surename']."<br/>";
	echo "Возрвст ".$row['age']."<br/>";
	echo "Дата рождения ".$row['birthday']."<br/>";
	echo "------------- <br/>";
}
?>
<input type="submit" name="submit" value="Удалить">
</form>