<?php 
	if ($_COOKIE['user'] == "") header('Location: /enter.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="google-site-verification" content="6PxL-lGgLkbbpRCAIgoYm3ZDxZ07Icgw7EeiyplvPO8" />
	<meta name="keywords" content="test, site, website">
	<meta name="description" content="Этот сайт является пробным сайтом"> <!-- Поскольку описание из метатега description может быть показано в результатах поиска, оно должно быть не только информативным, но и интересным для пользователей. В метатеге description нет никаких ограничений на размеры текста. Однако он должен быть достаточно длинным, чтобы его можно было показать на странице результатов поиска (размеры описания на странице с результатами поиска могут различаться в зависимости от типа устройства и других факторов), а также содержать информацию, которая поможет пользователю определить, насколько ему подходит ваша страница. -->
	<meta name="viewport" content="user-scalable=0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
	<script>
		function confirmation() {
			confirm("Вы уверены?");
		}
	</script>
	<title><?=$title?></title>
</head>
<body>
	<div id='page-wrap'>
	<header>
		<div id="logo">
			<a href="index.php" title="На главную"><i style="color: black;">Plus</i>Party</a>
		</div>

		<span class="right">
		<?php
			$login = $_COOKIE['user_name'];
			require "assemblyfiles/config.php";
			$result = $mysql->query("SELECT * FROM users WHERE user_name = '$login'");
			$user = $result->fetch_assoc();

			if ($user['profile_photo'] == '') echo '<a href="edit.php"><img src="img/user_photo.jpg" alt=""></a>';
			else {
				$show_img = base64_encode($user['profile_photo']);
				echo '<a href="edit.php"><img src="data:image/jpeg;base64,';
				echo $show_img;
				echo'"alt=""></a>';
			}
			$mysql->close(); 
		?>
		</span>
	</header>