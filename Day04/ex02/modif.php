<?php

if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] && $_POST['submit'] === "OK"){
	$pass_old = hash('sha512', $_POST['oldpw']);
	$pass_new = hash('sha512', $_POST['newpw']);
	$file = "../private/passwd";
	if (!file_exists($file)) {
		echo "ERROR\n";
	    exit();
	}
	$userdata = unserialize(file_get_contents($file));
	if (!$userdata[$_POST['login']] || ($userdata[$_POST['login']]['passwd'] !== $pass_old)) {
		echo "ERROR\n";
	    exit();
	}
	$userdata[$_POST['login']] = [
		'login' => $_POST['login'],
		'passwd' => $pass_new];
	file_put_contents($file, serialize($userdata));
	echo "OK\n";
}
else
	echo "ERROR\n"
?>
