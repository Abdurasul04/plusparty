<?php // выход из аккаунта
	setcookie('user', $user['name'], time() - 3600 * 24 * 7, "/");
	setcookie('user_name', $user['user_name'], time() - 3600 * 24 * 7, "/");
	setcookie('about_person', $user['about_person'], time() - 3600 * 24 * 7, "/");
	header('Location: /');
?>