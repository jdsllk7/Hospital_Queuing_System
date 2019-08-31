<?php

	include 'connect.php';
	
	//INSERT NAME
    $id = $_GET['id'];
    $username = $_GET['name'];
    

    $sql = "DELETE FROM patients WHERE id=".$id."";

    if (mysqli_query($conn, $sql)) {
		header("Location: queue.php?name=".$username."&id=".$id."");
    }

		
?>