<?php
	require_once "config.php";
	$del_id = $_SERVER['REQUEST_URI'];
	$del_id = mb_substr($del_id, 41, -1);
	$mysql->query("DELETE FROM `posts` WHERE `id` = '$del_id'");
	$mysql->close();
	header('Location: /profile.php');
 ?>