<?php

	include 'connect.php';
	
	//INSERT NAME
	$username = $_GET['name'];

	$sql = "INSERT INTO patients (username) VALUES ('$username')";
	if (mysqli_query($conn, $sql)) {
		$last_id = mysqli_insert_id($conn);
		setcookie('patientID', $last_id, time() + (86400 * 30), "/");
		header("Location: home.php?name=".$username."");
	}


		
?>