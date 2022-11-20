<?php
	function str_filter(string $string): string
	{
		$str = preg_replace('/x00|<[^>]*>?/', '', $string);
		return trim(str_replace(["'", '"'], ['&#39;', '&#34;'], $str));
	}
	$password = str_filter($_POST['password']); 
	$name = str_filter($_POST['name']); 
	$email = str_filter($_POST['email']); 
	$bio = $_POST['bio'];

	if (mb_strlen($name) < 5 || mb_strlen($name) > 30)
	{
		echo "Не допустимая длина имени (не менее 5)";
		exit();
	}
	else if (mb_strlen($password) < 5 || mb_strlen($password) > 32)
	{
		echo "Пароль должен содержать как минимум 5 и не более 30 символов";
		exit();
	}
	else if (strpos($email, "@") != true || mb_strlen($email) < 10)
	{
		echo "Не корректная почта";
		exit();
	}
	
	$password = md5($password);
	require_once "connect.php";

	$mysql->query("INSERT INTO `users` (`name`, `password`, `bio`, `email`) VALUES('$name', '$password', '$bio', '$email')");
	
	$result = $mysql->query("SELECT * FROM `users` WHERE `name` = '$name' AND `password` = '$password' "); // ищем пользователья на базе данных
	$user = $result->fetch_assoc(); // преобразуем объект на массив для удобства

	// Если пользователь найден в базе данных подключаем куки и перенаправляем на главную
	setcookie('id', $user['id'], time() + 3600 * 24 * 7, "/");
	setcookie('name', $user['name'], time() + 3600 * 24 * 7, "/");
	setcookie('bio', $user['bio'], time() + 3600 * 24 * 7, "/");
	$mysql->close(); // закрываем базу данных
	
	header('Location: /');
?>