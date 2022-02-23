<?php
	$title = "PlusParty";
	require_once "contents/header.php"; // Шапка
	require_once "contents/sections.php"; // Секция "разделы"
?>
<h1 id="newposts">Лента</h1>
<div id="wrapper">
	<div class="articles">
	<?php
		require "assemblyfiles/config.php";
		$author = $_COOKIE['user_name'];
		$query = $mysql->query("SELECT * FROM `posts` ORDER BY `id` DESC");
		while ($row = $query->fetch_assoc())
		{
			$show_img = base64_encode($row['image']);
			$show_title = $row['title'];
			$show_content = $row['content'];
			$show_author = $row['author'];
	?>
			<article id="post">
				<img width="200px" src="data:image/jpeg;base64, <?php echo $show_img ?>">
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