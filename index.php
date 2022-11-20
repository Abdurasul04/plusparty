<?php
	$title = "PlusParty";
	require_once "contents/header.php"; // Шапка
	require_once "contents/sections.php"; // Секция "разделы"
?>
<h1 id="newposts">Лента</h1>
<div id="wrapper">
	<div class="articles">
	<?php
		require "server/connect.php";
		$author = $_COOKIE['name'];
		$query = $mysql->query("SELECT * FROM `posts` ORDER BY `id` DESC");	
		while ($row = $query->fetch_assoc())
		{
			$show_img = base64_encode($row['img'] ?? '');
			$show_title = $row['title'];
			$show_content = $row['content'];
			$show_author = $row['author'];
	?>
			<article class="post">
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
				<form id="author_form" method="get" action="people.php">
					<button id="author" name="<?= $show_author?>">
						<p><?= $show_author ?></p>
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

</div>

<?php
require_once "contents/footer.php";
?>