
<?php

include 'connect.php';

if (isset($_GET['val']) && $_GET['val'] == 'delete') {

	$sql = "DROP TABLE IF EXISTS patients";
	if (mysqli_query($conn, $sql)) {

		//CREATING PATIENTS TABLE
		$sql = "CREATE TABLE IF NOT EXISTS patients (
		id BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		username VARCHAR(200) NOT NULL
		)";
		mysqli_query($conn, $sql);
		header("Location: queue.php?reset");

	}

}
?>