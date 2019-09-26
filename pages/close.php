<?php
include 'connect.php';

if(isset($_GET["close1"])){
    // setcookie('room1', '', time() - 3600, "/");
    mysqli_query($conn, "UPDATE rooms SET available='0' WHERE room like 'room1'");
    header("Location: room1.php?closed");

}elseif(isset($_GET["close2"])){
    // setcookie('room2', '', time() - 3600, "/");
    mysqli_query($conn, "UPDATE rooms SET available='0' WHERE room like 'room2'");
    header("Location: room2.php?closed");

}elseif(isset($_GET["close3"])){
    // setcookie('room3', '', time() - 3600, "/");
    mysqli_query($conn, "UPDATE rooms SET available='0' WHERE room like 'room3'");
    header("Location: room3.php?closed");

}elseif(isset($_GET["close1occupied"])){
    // setcookie('room1', 'on', time() + (86400 * 30), "/");
    mysqli_query($conn, "UPDATE rooms SET available='1' WHERE room like 'room1'");
    header("Location: room1.php?sending");

}elseif(isset($_GET["close2occupied"])){
    // setcookie('room2', 'on', time() + (86400 * 30), "/");
    mysqli_query($conn, "UPDATE rooms SET available='1' WHERE room like 'room2'");
    header("Location: room2.php?sending");

}elseif(isset($_GET["close3occupied"])){
    // setcookie('room3', 'on', time() + (86400 * 30), "/");
    mysqli_query($conn, "UPDATE rooms SET available='1' WHERE room like 'room3'");
    header("Location: room3.php?sending");

}
		
?>