<?php
$a = '6';
$b = '7';
if ($b > $a) {
	$home_url = dirname($_SERVER['PHP_SELF']).'/information.php';
        header('Location: '.$home_url);
		
}


?>