<?php
session_start();

$title = $_POST['title'];
$artist = $_POST['artist'];
$email = $_SESSION['email'];
$album = $_POST['album'];
$price = $_POST['price'];

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "versono_db";
// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = $conn->prepare("INSERT INTO song(title, artist, email, album, price) VALUES (?,?,?,?,?)");
if ($sql->bind_param('sssss', $title, $artist, $email, $album, $price) === TRUE){
	if ($sql->execute() === TRUE) { 
			$sql->close();
			$conn->close();
			header("Location: dashboard2.php");
	}
}

?>