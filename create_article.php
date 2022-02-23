<?php 
	$title = "Создать статью";
	require_once "contents/header.php";
	require_once "contents/sections.php";
 ?>

 <div id="create_article_container">
 	<div id="form_create_article">
 		<form method="post" enctype="multipart/form-data" action="assemblyfiles/publish_article.php">
            <label id="inputfile" for="file"><img src="img/addimage.png"></label>
            <input id="file" type="file" name="image">
 			<input autocomplete="off" class="field" type="text" name="title" placeholder="Название">
 			<textarea name="content" class="field" placeholder="Текст поста"></textarea>
 			<button type="submit">Публиковать</button>
 		</form>
 	</div>
 </div>

 <?php 
 require_once "contents/footer.php";
  ?>