<?php
    $login = $_COOKIE['user_name'];
    require "config.php";
    if ($mysql->connect_error)
    {
        die("Ошибка соединения".$mysql->connect_error);
    }
    if (!$mysql->set_charset('utf8')) 
    {
        echo "Ошибка установки кодировки UTF-8";
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (!empty($_FILES['profile_photo']['tmp_name'])) 
        {
            $img = addslashes(file_get_contents($_FILES['profile_photo']['tmp_name']));

            $result = $mysql->query("UPDATE users SET profile_photo='$img' WHERE user_name = '$login'");
            /*
            UPDATE tovar SET price=500 WHERE id=5
            "UPDATE Users SET name = '$username', age = '$userage' WHERE id = '$userid'"
            */
            header('Location: /profile.php');
        }else echo "Не-успешно";
    }
    else echo "Ошибка при загрузке";
    echo $_POST;

    $mysql->close(); // закрываем базу данных
?>