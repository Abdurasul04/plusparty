<?php
	if ($_COOKIE['user'] != "") header('Location: /');
	$title = "Регистрация";
	require_once "contents/head.php";
 ?>
<body>
	<div class="clear" ><br /></div>

	<div id="form">
		<h1>Plus<i>Party</i></h1>
		<form action="/assemblyfiles/treatment_reg.php" method="post">

			<input type="text" id="email" name="email" placeholder="Электронный адрес">

			<input type="text" id="name" name="name" placeholder="Имя">

			<input autocomplete="off" type="text" id="user_name" name="user_name" placeholder="Имя пользователья (Ник)">

			<input autocomplete="off" type="text" id="password" name="password" placeholder="Пароль">

			<textarea id="about_person" name="about_person" placeholder="Напишите о себе (не обязательно)"></textarea>

			<a href="/auth.php">У вас есть аккаунт?</a>

			<button type="submit" value="Регистрация" id="send" name="send">Регистрация</button>

		</form>
	</div>