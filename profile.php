<?php
	$title = "Профиль";
	require_once "contents/header.php";
?>
	<div class="profile">
		<div id="pr-block">
			<div id="pr-block-1">
			<?php
				$login = $_COOKIE['user_name'];
			    require "assemblyfiles/config.php";
			    $result = $mysql->query("SELECT * FROM users WHERE user_name = '$login'");
			    $user = $result->fetch_assoc();
			    if ($user['profile_photo'] == '') echo '<img id="user_img" src="img/user_photo.jpg" alt="">';
				else 
				{
					$show_img = base64_encode($user['profile_photo']);
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
			<h2 id="user"><?php echo $_COOKIE['user']?></h2>
			</div>
			<div id="pr-block-3">
			<h2 id="user_name"><?php echo $_COOKIE['user_name']?></h2>
			</div>
		</div>
		<div id="pr-block-4">
			<p id="bio">Bio</p>
			<p id="about_person"><?php echo $_COOKIE['about_person'] ?> </p>
		</div>
	</div>

	<h1 id="posts_title">Посты</h1>

<div id="wrapper">
	<div class="articles">
	<?php 
		$author = $_COOKIE['user_name'];
		$query = $mysql->query("SELECT * FROM `posts` WHERE `author` = '$author' ORDER BY `id` DESC");

		while ($row = $query->fetch_assoc())
		{
			$show_img = base64_encode($row['image']);
			$show_title = $row['title'];
			$show_content = $row['content'];
			$show_id = $row['id'];
	?>
			<article id="post">
				<img width="200px" src="data:image/jpeg;base64, <?php echo $show_img ?>">
				<h2><?= $show_title?></h2>
				<p><?= $show_content?></p>
				<form method="get" action="assemblyfiles/treatment_delete_post.php">
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
