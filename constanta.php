<?php
 
 define('DB_IP', '127.0.0.1');
 define('DB_NAME', 'root');
 define('DB_PASSWORD', '');
 define('DB_NAME_TABE', 'test');

 $dbc = mysqli_connect(DB_IP,DB_NAME,DB_PASSWORD,DB_NAME_TABE)
 or die("error");

?>