<?php
if ($_POST['login'] != NULL && $_POST['passwd'] != NULL && $_POST['submit'] === "OK"){
	$hash_pass = hash('sha512', $_POST['passwd']);
	$file = '../private/passwd';
	if (!file_exists('../private'))
	  mkdir('../private');
	$user = [];
	if (file_exists($file))
		$user = unserialize(file_get_contents($file));
	if (!$user[$_POST['login']]){
		$user[$_POST['login']] = [
			'login' => $_POST['login'],
			'passwd' => $hash_pass];
	}
	else{
		echo "ERROR\n";
		exit();
	}
	$data = serialize($user);
	file_put_contents($file, $data);
	echo "OK\n";
}
else
	 echo "ERROR\n";
?>
