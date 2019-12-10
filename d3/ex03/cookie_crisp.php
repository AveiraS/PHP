<?php
	switch($_GET['action']){
		case 'set':
			setcookie($_GET['name'], $_GET['value'], time() + 3600);
		return;
		case 'get':
			if (!$_COOKIE[$_GET['name']]) {
				return;
			}
		echo $_COOKIE[$_GET['name']] . "\n";
		return;
		case 'del':
			setcookie($_GET['name'], $_GET['value'], 1);
		return;
	}
?>
