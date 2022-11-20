<?php
	$title = "Настройки профиля";
	require_once "contents/header.php";
?>

<?php
	$name = $_COOKIE['name'];
	require "server/connect.php";
	$result = $mysql->query("SELECT * FROM users WHERE name = '$name'");
	$user = $result->fetch_assoc();
	if ($user['photo'] == '') echo '<div id="setprofile"><img id="img" src="img/user_photo.jpg" alt="">';
	else 
	{
		$show_img = base64_encode($user['photo']);
		echo '<div id="setprofile">';
		echo '<img id="img" src="data:image/jpeg;base64,';
		echo $show_img;
		echo'"alt="">';
	}
	$mysql->close(); 
?>

	<form id="edit" method="post" enctype="multipart/form-data" action="/server/insert_profile_photo.php">
		<label for="uploading">Изменить фото профилья</label>
		<input id="uploading" type="file" name="photo">
		<input id="save" type="submit" name="upload" value="Сохранить">
	</form>

	<div id="exit">
		<form action="/server/logOut.php" method="post">
			<input onclick="confirmation()" type="submit" value="Выйти >" id="exit" name="exit">
		</form>
	</div>
</div>

<?php
	require_once "contents/footer.php";
?>