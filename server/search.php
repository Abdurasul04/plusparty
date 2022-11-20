<div class="profile">
	<div id="pr-block">
		<div id="pr-block-1">
			<?php
			if ($_GET['user'] != '') 
			{
				$name = $_GET['user'];
				require "connect.php";
				$result = $mysql->query("SELECT * FROM `users` WHERE `name` = '$name'");
				$user = $result->fetch_assoc();
			}
			
		    if (empty($user['photo'])) echo '<img id="user_img" src="img/user_photo.jpg" alt="">';
			else {
				$show_img = base64_encode($user['photo']);
				echo '<img id="user_img" src="data:image/jpeg;base64,';
				echo $show_img;
				echo '" alt="">';
			}	
			?>
		</div>
		<div id="pr-block-2">
			<h2 id="user"><?php echo $user['name']?></h2>
		</div>
	</div>
	<div id="pr-block-4">
		<p id="bio">Bio</p>
		<p id="bio"><?php echo $user['bio'] ?> </p>
	</div>
</div>

<h1 id="posts_title">Посты</h1>

<div id="wrapper">
	<div class="articles">
	<?php 
		$author = $_GET['user'];
		$query = $mysql->query("SELECT * FROM `posts` WHERE `author` =  ( select id from users where name like '$author' limit 1) ORDER BY `id` DESC");

		while ($row = $query->fetch_assoc())
		{
			$show_img = base64_encode($row['img'] ?? '');
			$show_title = $row['title'];
			$show_content = $row['content'];
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
				?>
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