<?php
	$title = "Друзья";
	require_once "contents/header.php";
	require_once "contents/sections.php";
 ?>

<div id="search_container">
	<form action="" method="get">
		<input autocomplete="off" type="search" id="search" placeholder="Найти..." name="user">
		<button id="searchbutton" type="submit">
        	<img src="/img/search.jpg">
    	</button>
	</form>
</div>

<?php 
	if (isset($_GET['user'])) require_once "server/search.php";
	else if (mb_substr($_SERVER['REQUEST_URI'], 12, -1) != '') // обработка для ссылок с главной страницы
	{
		$_GET['user']= mb_substr($_SERVER['REQUEST_URI'], 12, -1);
		require "server/search.php";
	}
	else '<div style="margin-bottom: 25%;" class="clear" ><br /></div>';

	require_once "contents/footer.php"
 ?>