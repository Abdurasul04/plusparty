<?php
	if (isset($_COOKIE['user'])) header('Location: /');
	$title = "Регистрация";
	require_once "contents/head.php";
 ?>

	<div class="clear" ><br /></div>

	<div id="form">
		<h1>Plus<i>Party</i></h1>
		<form action="/server/reg.php" method="post">

			<input type="text" id="email" name="email" placeholder="Электронный адрес">

			<input type="text" id="name" name="name" placeholder="Имя">

			<input autocomplete="off" type="text" id="password" name="password" placeholder="Пароль">

			<textarea id="bio" name="bio" placeholder="Напишите о себе (не обязательно)"></textarea>

			<a href="/auth.php">У вас есть аккаунт?</a>

			<button type="submit" value="Регистрация" id="send" name="send">Регистрация</button>

		</form>
	</div>