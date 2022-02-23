<?php
	$title = $_POST['title'];
	$content = $_POST['content'];
	$author = $_COOKIE['user_name'];

	require "config.php";
	if ($mysql->connect_error) die("Ошибка соединения".$mysql->connect_error);
    if (!$mysql->set_charset('utf8'))  echo "Ошибка установки кодировки UTF-8";
	if (mb_strlen($title) < 5 || mb_strlen($title) > 100)
	{
		echo "Не допустимая длина названия (не менее 5)";
		exit();
	}
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
	    if (!empty($_FILES['image']['tmp_name']))
	    {
	        $img = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	    }
	}
	$mysql->query("INSERT INTO `posts` (`title`, `content`, `author`, `image`) VALUES('$title', '$content', '$author', '$img')");

    $mysql->close(); // закрываем базу данных
	header('Location: /profile.php');
?>