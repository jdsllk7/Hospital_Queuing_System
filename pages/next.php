<?php

	include 'connect.php';
	
	//INSERT NAME
    $id = $_GET['id'];
    $username = $_GET['name'];
    

    $sql = "DELETE FROM patients WHERE id=".$id."";

    if(isset($_COOKIE["room1"]) || isset($_COOKIE["room2"]) || isset($_COOKIE["room3"])){
      if (mysqli_query($conn, $sql)) {
        header("Location: queue.php?name=".$username."&id=".$id."");
      }
    }else{
      header("Location: queue.php?name=".$username."&id=".$id."");
    }

		
?>