<?php
	$title = "Профиль";
	require_once "contents/header.php";
	require_once "contents/sections.php";
?>
	<div class="profile">
		<div id="pr-block">
			<div id="pr-block-1">
			<?php
				$name = $_COOKIE['name'];
			    require "server/connect.php";
			    $result = $mysql->query("SELECT * FROM users WHERE name = '$name'");
			    $user = $result->fetch_assoc();
			    if ($user['photo'] == '') echo '<img id="user_img" src="img/user_photo.jpg" alt="">';
				else 
				{
					$show_img = base64_encode($user['photo']);
					echo '<img id="user_img" src="data:image/jpeg;base64,';
					echo $show_img;
					echo'"alt="">';
				} 
			?>
			</div>
			<div id="change">
				<a href="edit.php"><img src="img/change_pencil.jpg"></a>
			</div>
			<div id="pr-block-2">
			<h2 id="user"><?php echo $_COOKIE['name']?></h2>
			</div>
		</div>
		<div id="pr-block-4">
			<p id="bio">Bio</p>
			<p id="bio"><?php echo $_COOKIE['bio'] ?> </p>
		</div>
	</div>

	<h1 id="posts_title">Посты</h1>

<div id="wrapper">
	<div class="articles">
	<?php 
		$author = $_COOKIE['name'];
		$query = $mysql->query("SELECT * FROM `posts` WHERE `author` =  ( select id from users where name like '$author' limit 1) ORDER BY `id` DESC");

		while ($row = $query->fetch_assoc())
		{
			$show_img = base64_encode($row['img'] ?? '');
			$show_title = $row['title'];
			$show_content = $row['content'];
			$show_id = $row['id'];
	?>
			<article id="post">
			<?php
				if ($show_img != '') {
					echo '<img src="data:image/jpeg;base64,';
					echo $show_img;
					echo '">';
				}else{
					echo '<img id="user_img" src="img/user_photo.jpg" alt="">';
				}
				?>				<h2><?= $show_title?></h2>
				<p><?= $show_content?></p>
				<form id="delete_post" method="get" action="server/delete_post.php">
					<button id="but_del_post" onclick="confirmation()" name="<?php echo $show_id?>">
						<img src="img/delete.png">
					</button>
				</form>
			</article>
	<?php
		}
		$mysql->close();
	 ?>
	</div>
</div>

<div class="clear" ><br /><br /><br /><br /></div>

<?php
	require_once "contents/footer.php";
?>
