<?php
	if (isset($_COOKIE['name'])) header('Location: /');
	$title = "PlusParty";
	require_once "contents/head.php";
 ?>
<div id="enter">
	<div id="header">
		<p>PlusParty</p>
	</div>
	<div id="text">
		<p>Войдите что-бы начать общаться!</p>
	</div>
	<div id="auth">
		<a href="auth.php">Войти в аккаут</a>
	</div>
	<p id="or">или</p>
	<div id="reg">
		<a href="reg.php">Создать аккаунт</a>
	</div>
</div>
<div id="fb">
<?php 
	require_once "contents/footer.php";
 ?>
</div>
