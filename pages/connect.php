<?php

//SERVER CREDENTIALS
$error_msg = 'Sorry could not connect to server...';
$servername = 'localhost';
$username = 'root';
$password = '';
$db = 'clinic_db';


// CREATE CONNECTION
$conn = mysqli_connect($servername, $username, $password);


// CHECK IF CONNECTION IS GOOD
if (!$conn) {
    die($error_msg);
}


// CREATE THE DATABASE
$sql = "CREATE DATABASE IF NOT EXISTS $db";
// $sql = "drop DATABASE IF EXISTS $db";
if (mysqli_query($conn, $sql)) {
    $conn = mysqli_connect($servername, $username, $password, $db);
} else {
    die($error_msg);
}


//CREATING PATIENTS TABLE
$sql = "CREATE TABLE IF NOT EXISTS patients (
    id BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(200) NOT NULL
    )";
    // $sql = "DROP TABLE IF EXISTS patients";
    mysqli_query($conn, $sql);


//CREATING ROOMS TABLE
$sql = "CREATE TABLE IF NOT EXISTS rooms (
    id BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    room VARCHAR(200) NOT NULL,
    available BOOL DEFAULT 0 NOT NULL,
    UNIQUE (room)
    )";
    // $sql = "DROP TABLE IF EXISTS rooms";
    mysqli_query($conn, $sql);

    mysqli_query($conn, "INSERT INTO rooms (room) VALUES ('room1');");
    mysqli_query($conn, "INSERT INTO rooms (room) VALUES ('room2');");
    mysqli_query($conn, "INSERT INTO rooms (room) VALUES ('room3');");

?>