<?php
session_start();

$email = $_SESSION['email'];
$id = $_POST['id'];
$numsold = "";
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

$sql = $conn->prepare("INSERT INTO boughtsongs(email, id) VALUES (?,?)");
if ($sql->bind_param('ss', $email, $id) === TRUE){
	if ($sql->execute() === TRUE) { 

	}
}

$sql = $conn->prepare("SELECT numsold FROM song WHERE id = ?");
if ($sql->bind_param('s', $id) === TRUE){
	if ($sql->execute() === TRUE) { 
		$sql->bind_result($numsold);
		$sql->fetch();
		$numsold = $numsold + 1;
		$sql->close();
	}
}

$sql = $conn->prepare("UPDATE song SET numsold =? WHERE id = ?");
if ($sql->bind_param('ss', $numsold, $id) === TRUE){
	if ($sql->execute() === TRUE) { 

	}
}


$sql->close();
$conn->close();
header("Location: buy.php");
?>