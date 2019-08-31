<?php
session_start();

	$_SESSION["numbering"] = 0;
	
	header("Location: pages/start.php");


?>