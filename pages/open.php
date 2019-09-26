<?php
include 'connect.php';

if(isset($_GET["open1"])){
	// setcookie('room1', 'on', time() + (86400 * 30), "/");
	mysqli_query($conn, "UPDATE rooms SET available='1' WHERE room like 'room1'");
	header("Location: room1.php?opened");

}elseif(isset($_GET["open2"])){
	// setcookie('room2', 'on', time() + (86400 * 30), "/");
	mysqli_query($conn, "UPDATE rooms SET available='1' WHERE room like 'room2'");
	header("Location: room2.php?opened");
	
}elseif(isset($_GET["open3"])){
	// setcookie('room3', 'on', time() + (86400 * 30), "/");
	mysqli_query($conn, "UPDATE rooms SET available='1' WHERE room like 'room3'");
	header("Location: room3.php?opened");
}


?>