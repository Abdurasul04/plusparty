<?php
	function str_filter(string $string): string
	{
		$str = preg_replace('/x00|<[^>]*>?/', '', $string);
		return trim(str_replace(["'", '"'], ['&#39;', '&#34;'], $str));
	}

	$name = str_filter($_POST['login']); 
	$password = str_filter($_POST['password']);
	$password = md5($password); //хешируем пароль

	require_once "connect.php"; // Подключаемся к базам данных
	$result = $mysql->query("SELECT * FROM `users` WHERE `name` = '$name' AND `password` = '$password' "); // ищем пользователья на базе данных
	$user = $result->fetch_assoc(); // преобразуем объект на массив для удобства

	// Если пользователь найден в базе данных подключаем куки и перенаправляем на главную
	setcookie('id', $user['id'], time() + 3600 * 24 * 7, "/");
	setcookie('name', $user['name'], time() + 3600 * 24 * 7, "/");
	setcookie('bio', $user['bio'], time() + 3600 * 24 * 7, "/");
	$mysql->close(); // закрываем базу данных

	header('Location: /');
 ?>