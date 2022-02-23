<?php
//FILTER_SANITIZE_STRING - фильтрация как строку
	$login = filter_var(trim($_POST['user_name']), FILTER_SANITIZE_STRING); 
	$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING); 
	$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING); 
	$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING); 
	$about = $_POST['about_person'];

	if (mb_strlen($login) < 5 || mb_strlen($login) > 32)
	{
		echo "Не допустимая длина имени пользователья (не менее 5)";
		exit();
	}
	else if (mb_strlen($name) < 3 || mb_strlen($name) > 50)
	{
		echo "Не допустимая длина имени (не менее 3)";
		exit();
	}
	else if (mb_strlen($password) < 5 || mb_strlen($password) > 32)
	{
		echo "Не допустимая длина паролья (не менее 5)";
		exit();
	}
	else if (strpos($email, "@") != true || mb_strlen($email) < 5)
	{
		echo "Не корректная почта";
		exit();
	}
	
	$password = md5($password);
	require "config.php";

	$mysql->query("INSERT INTO `users` (`name`, `user_name`, `password`, `about_person`, `email`, `profile_photo`) VALUES('$name', '$login', '$password', '$about', '$email', '')");
	
	$result = $mysql->query("SELECT * FROM `users` WHERE `user_name` = '$login' AND `password` = '$password' "); // ищем пользователья на базе данных
	$user = $result->fetch_assoc(); // преобразуем объект на массив для удобства

	// Если пользователь найден в базе данных подключаем куки и перенаправляем на главную
	setcookie('user', $user['name'], time() + 3600 * 24 * 7, "/");
	setcookie('user_name', $user['user_name'], time() + 3600 * 24 * 7, "/");
	setcookie('about_person', $user['about_person'], time() + 3600 * 24 * 7, "/");
	$mysql->close(); // закрываем базу данных
	
	header('Location: /');
?>