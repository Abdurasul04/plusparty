<?php // выход из аккаунта
	setcookie('id', $user['id'], time() - 3600 * 24 * 7, "/");
	setcookie('name', $user['name'], time() - 3600 * 24 * 7, "/");
	setcookie('bio', $user['bio'], time() - 3600 * 24 * 7, "/");
	header('Location: /');
?>