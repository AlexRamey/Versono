<?php
session_start();
$loginMessage = "";

if (isset($_SESSION["login_guard"])):
	$loginMessage = $_SESSION["login_guard"];
	unset($_SESSION["login_guard"]);
endif;

if (isset($_POST["logout"])):
	session_unset();
endif;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	# Verify input data is not empty
	if (empty($_POST["email"]) OR empty($_POST["pswd"])){
		$loginMessage = "Please enter your username and password to login!";
	} else{
		if (authenticate($_POST["email"], $_POST["pswd"]) === TRUE){
			//$loginMessage = "Well done. :)";
			header("Location: member_home.php");
		}
		else{
			$loginMessage = "Login failed: invalid username or password :(";
		}
	}
}else if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if(isset($_SESSION["user"])){
		header("Location: member_home.php");
	}
}

# return TRUE if authentication succeeds, FALSE otherwise
function authenticate($email, $pswd)
{
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

	$retVal = FALSE;
	$sql = $conn->prepare("SELECT first_name FROM versono_user WHERE email = ? AND user_password = ? LIMIT 1");
	if ($sql != FALSE){
		if ($sql->bind_param('ss', $email, hash("sha256", $pswd, False)) === TRUE){
			if ($sql->execute() === TRUE) { 
				$first_name = "";
	    		if ($sql->bind_result($first_name) === TRUE){
	    			if ($sql->fetch() === TRUE){
	    				$_SESSION["user"] = $first_name;
	    				$_SESSION["email"] = $email;
	    				$retVal = TRUE;
	    			}
	    		} 
			}
		}

		$sql->close();
	}

	$conn->close();

	return $retVal;
}

?>

<html>
	<head>
		<title>Versono - Login</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/true_style.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>

	<body class="no-sidebar">
		<div id="page-wrapper">

			<!-- Header -->
			<div id="header-wrapper">
				<div id="header">

					<!-- Logo -->
						<h1><a href="index.php">Versono</a></h1>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="index.php">Home</a></li>
								<li><a href="about.php">About Us</a></li>
								<li><a href="signup.php">Sign Up</a></li>
								<li class="current"><a href="login.php">Login</a></li>
							</ul>
						</nav>
					<!-- Special Message Space -->
					<br>
					<br>
					<h4><?php echo $loginMessage;?></h4>
				</div>
			</div>

			<!-- Main -->
			<div id="main-wrapper">
				<div class="container">
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
						<div class="form_login_text_input">
							<input type="email" name="email" placeholder="user@domain.com" maxlength="50">
							<input type="password" name="pswd" placeholder="Password" maxlength="50">
						</div>
						<br>
						<div class="submit_btn_holder">
							<input type="submit" value="Login">
						</div>
					</form>
				</div>
			</div>

			<?php include 'footer.php';?>

		</div>
	</body>
</html>