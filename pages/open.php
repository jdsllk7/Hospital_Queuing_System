<?php


if(isset($_GET["open1"])){
	setcookie('room1', 'on', time() + (86400 * 30), "/");
	header("Location: room1.php?opened");
}elseif(isset($_GET["open2"])){
	setcookie('room2', 'on', time() + (86400 * 30), "/");
	header("Location: room2.php?opened");
}elseif(isset($_GET["open3"])){
	setcookie('room3', 'on', time() + (86400 * 30), "/");
	header("Location: room3.php?opened");
}


?>