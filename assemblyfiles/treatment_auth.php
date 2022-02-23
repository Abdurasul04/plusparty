<?php
	$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING); 
	$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
	$password = md5($password); //хешируем пароль

	require "config.php"; // Подключаемся к базам данных
	
	$result = $mysql->query("SELECT * FROM `users` WHERE `user_name` = '$login' AND `password` = '$password' "); // ищем пользователья на базе данных
	$user = $result->fetch_assoc(); // преобразуем объект на массив для удобства

	// Если пользователь найден в базе данных подключаем куки и перенаправляем на главную
	setcookie('user', $user['name'], time() + 3600 * 24 * 7, "/");
	setcookie('user_name', $user['user_name'], time() + 3600 * 24 * 7, "/");
	setcookie('about_person', $user['about_person'], time() + 3600 * 24 * 7, "/");
	$mysql->close(); // закрываем базу данных

	header('Location: /');
 ?>