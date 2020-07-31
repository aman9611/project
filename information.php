<?php
require_once('constanta.php');


$query = "SELECT * FROM test_win";

$result=mysqli_query($dbc,$query);

while($row=mysqli_fetch_array($result)) {
	echo "Имя ".$row['name']."<br/>";
	echo "Фамилия ".$row['surename']."<br/>";
	echo "Возрвст ".$row['age']."<br/>";
	echo "Дата рождения ".$row['birthday']."<br/>";
	echo "------------- <br/>";
}




?>