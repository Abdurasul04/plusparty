<?php
	if (isset($_COOKIE['user'])) header('Location: /');
	$title = "Вход";
	require_once "contents/head.php";
 ?>
	<div class="clear" ><br /></div>
	<div id="form">
		<h1>Plus<i>Party</i></h1>
		<form action="/server/auth.php" method="post">
			<input type="text" id="login" name="login" placeholder="Логин">

			<a href="/reg.php"> У вас нету аккаунта?</a>

			<input autocomplete="off" type="text" id="password" name="password" placeholder="Пароль">

			<a href="/">Забыли пароль?</a>

			<button type="submit" id="send" name="send">Войти</button>

		</form>
	</div>