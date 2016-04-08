<!DOCTYPE HTML>
<!--
	Dopetrope by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Versono - Dashboard</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<?php
        session_start();

        if(isset($_SESSION["user"])):
            $name = $_SESSION["user"];
        else:
            $_SESSION["login_guard"] = "You must be logged in to view the Dashboard<br/>";
        header("Location: login.php");
        endif;
        ?>

		<div id="page-wrapper">
			<!-- Header -->
				<div id="header-wrapper">
					<div id="header">
						<!-- Logo -->
						<h1><a href="index.php">Versono</a></h1>
					<div>			
				</div>
			<!-- Nav -->
				<nav id="nav">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="about.php">About Us</a></li>
						<li><a href="signup.php">Sign Up</a></li>
						<li class="current"><a href="member_home.php">Dashboard</a></li>
					</ul>
				</nav>

				<br><br>
			<!-- Main -->
				<div id="main-wrapper">
					<div class="container">
                        <table style="width:100%">
                        	<tr>
                        		<td>Jill</td>
                        		<td>Smith</td> 
                        		<td>50</td>
                        	</tr>
                        	<tr>
                        		<td>Eve</td>
                        		<td>Jackson</td>
                        		<td>94</td>
                        	</tr>
                        	<tr>
                        		<td>Jill</td>
                        		<td>Smith</td> 
                        		<td>50</td>
                        	</tr>
                        	<tr>
                        		<td>Eve</td>
                        		<td>Jackson</td>
                        		<td>94</td>
                        	</tr>
                        	<tr>
                        		<td>Jill</td>
                        		<td>Smith</td> 
                        		<td>50</td>
                        	</tr>
                        	<tr>
                        		<td>Eve</td>
                        		<td>Jackson</td>
                        		<td>94</td>
                        	</tr>
                        </table>
                        <!-- A logout button -->
						<form action="login.php" method="post" id="logoutform">
                        	<input type="hidden" value="logout" name="logout">
                         	<div class="submit_btn_holder">
								<input type="submit" id="submit_btn" value="Logout">
							</div>
                        </form>
					</div>
				</div>
				<?php include 'footer.php';?>
		</div>
	</body>
</html>