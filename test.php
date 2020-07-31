<?php

$name_1 = $_POST['name'];
$surename_1 = $_POST['surename'];
$age_1 = $_POST['age'];
$birthday_1 = $_POST['birthday'];

if (isset($_POST['submit'])) {
	
$dbc=mysqli_connect("127.0.0.1","root","","test")
or die("error with connect");

$query="INSERT INTO test_win (name,surename,age,birthday) VALUES ('$name_1','$surename_1','$age_1','$birthday_1') ";

mysqli_query($dbc,$query)
or die("error with connect 2!");
echo"Добавлен!!";
}else{
echo "Пользователь успешно добавлен!!!";
};


?>
<a href="information.php">посмотреть список</a>