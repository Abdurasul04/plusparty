<div class="profile">
	<div id="pr-block">
		<div id="pr-block-1">
			<?php
			if ($_GET['user'] != '') 
			{
				$login = $_GET['user'];
				require "config.php";
				$result = $mysql->query("SELECT * FROM `users` WHERE `user_name` = '$login'");
				$user = $result->fetch_assoc();
			}
			$show_img = base64_encode($user['profile_photo']);

		    if ($user['profile_photo'] == '') echo '<img id="user_img" src="img/user_photo.jpg" alt="">';	
			?>
			<img id="user_img" src="data:image/jpeg;base64, <?php echo $show_img ?>" alt="">
		</div>
		<div id="pr-block-2">
			<h2 id="user"><?php echo $user['name']?></h2>
		</div>
		<div id="pr-block-3">
			<h2 id="user_name"><?php echo $user['user_name']?></h2>
		</div>
	</div>
	<div id="pr-block-4">
		<p id="bio">Bio</p>
		<p id="about_person"><?php echo $user['about_person'] ?> </p>
	</div>
</div>

<h1 id="posts_title">Посты</h1>

<div id="wrapper">
	<div class="articles">
	<?php 
		$author = $_GET['user'];
		$query = $mysql->query("SELECT * FROM `posts` WHERE `author` = '$author' ORDER BY `id` DESC");

		while ($row = $query->fetch_assoc())
		{
			$show_img = base64_encode($row['image']);
			$show_title = $row['title'];
			$show_content = $row['content'];
	?>
			<article id="post">
				<img width="200px" src="data:image/jpeg;base64, <?php echo $show_img ?>">
				<h2><?= $show_title?></h2>
				<p><?= $show_content?></p>
			</article>
	<?php
		}
		$mysql->close();
	 ?>
	</div>
</div>

<div class="clear" ><br /><br /><br /><br /></div>