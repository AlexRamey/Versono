<html>
<head>
	<title>Test</title>
</head>
<body>
	<form action="login.php" method="POST">
<?php
	session_start();

	if(isset($_SESSION["user"])):
		$name = $_SESSION["user"];
		echo "<b>Hi, $name</b></br>";
	else:
		$_SESSION["login_guard"] = "You must be logged in to view the Dashboard<br/>";
		header("Location: login.php");
	endif;
?>
	<input type="submit" value="logout" name="logout">

</body>
</html>