<?php
	$title = "Настройки профиля";
	require_once "contents/header.php";
?>

<?php
	$login = $_COOKIE['user_name'];
	require "assemblyfiles/config.php";
	$result = $mysql->query("SELECT * FROM users WHERE user_name = '$login'");
	$user = $result->fetch_assoc();
	if ($user['profile_photo'] == '') echo '<div id="setprofile"><img id="img" src="img/user_photo.jpg" alt="">';
	else 
	{
		$show_img = base64_encode($user['profile_photo']);
		echo '<div id="setprofile">';
		echo '<img id="img" src="data:image/jpeg;base64,';
		echo $show_img;
		echo'"alt="">';
	}
	$mysql->close(); 
?>

	<form id="edit" method="post" enctype="multipart/form-data" action="/assemblyfiles/insert_profile_photo.php">
		<label for="uploadimg">Изменить фото профилья</label>
		<input id="uploadimg" type="file" name="profile_photo">
		<input id="save" type="submit" name="upload" value="Сохранить">
	</form>

	<div id="exit">
		<form action="/assemblyfiles/treatment_exit.php" method="post">
			<input onclick="confirmation()" type="submit" value="Выйти >" id="exit" name="exit">
		</form>
	</div>
</div>


<?php
	require_once "contents/footer.php";
?>