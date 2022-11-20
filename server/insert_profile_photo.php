<?php
    $name = $_COOKIE['name'];
    require "connect.php";
    if ($mysql->connect_error) die("Ошибка соединения".$mysql->connect_error);
    if (!$mysql->set_charset('utf8'))  echo "Ошибка установки кодировки UTF-8";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (!empty($_FILES['photo']['tmp_name'])) 
        {
            $img = addslashes(file_get_contents($_FILES['photo']['tmp_name']));

            $result = $mysql->query("UPDATE users SET photo='$img' WHERE name = '$name'");

            header('Location: /profile.php');
        }else echo "Не-успешно";
    }
    else echo "Ошибка при загрузке";
    echo $_POST;

    $mysql->close(); // закрываем базу данных
?>