<?php
	session_start();
	function check_session() {
		if ($_GET['login'] != NULL && $_GET['passwd'] != NULL && $_GET['submit'] == 'OK') {
		$_SESSION['login'] = $_GET['login'];
		$_SESSION['passwd'] = $_GET['passwd'];
		}
	}
	check_session();
?>
<html><body>
<form method="get" action="index.php">
	Username: <input type="text" name="login" value="<?=$_SESSION['login']?>">
	<br>
	Password: <input type="password" name="passwd" value="<?=$_SESSION['passwd']?>">
	<input type="submit" name="submit" value="OK">
</form>
</body></html>
