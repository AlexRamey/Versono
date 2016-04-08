<?php
        session_start();

        if(isset($_SESSION["user"])):
            $name = $_SESSION["user"];
        else:
            $_SESSION["login_guard"] = "You must be logged in to view the Dashboard<br/>";
        header("Location: login.php");
        endif;
?>
<html>
	<head>
		<title>Versono - Dashboard</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/true_style.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="left-sidebar">
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
							<li class="current"><a href="member_home.php">Dashboard</a></li>
						</ul>
					</nav>
				</div>			
			</div>
			<!-- Main -->
			<div id="main-wrapper">
				<div class="container">
                    <div class="row">
                        <div class="4u 12u(mobile)">
                            <!-- Sidebar -->
                                <section class="box">
                                    <a href="#" class="image featured"><img src="images/koch_bike.jpg" alt="" /></a>
                                    <header>
                                        <h3>John Doe</h3>
                                    </header>
                                    <p>John Doe has been a part of the Versono community for over 10 months. Top hits include "Twist and Shout" and "Mississippi Kid", which each eclipsed the Versono Platinum level of one million downloads!</p>
                                    <footer>
                                        <a href="#" class="button alt">Edit Profile</a>
                                    </footer>
                                </section>
                        </div>
                        <div class="8u 12u(mobile) important(mobile)">
                            <article class="box post">
                                <section>
                                    <table style="width:100%">
                                        <caption>This Month's Best Sellers</caption>
                                        <thead>
                                            <tr>
                                                <th>Track</th>
                                                <th>Price</th>
                                                <th>Downloads (Month)</th>
                                                <th>Downloads (Total)</th>
                                                <th>On Sale Since</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<tr>
                                        		<td>Springsteen</td>
                                        		<td>$0.99</td> 
                                        		<td>92</td>
                                                <td>893</td>
                                                <td>June 2011</td>
                                        	</tr>
                                        	<tr>
                                        		<td>Sweet Home Alabama</td>
                                                <td>$0.99</td> 
                                                <td>73</td>
                                                <td>188290</td>
                                                <td>April 1974</td>
                                        	</tr>
                                        </tbody>
                                    </table>
                                </section>
                                <!-- A logout button-->
            					<form action="login.php" method="post" id="logoutform">
                                	<input type="hidden" value="logout" name="logout"></input>
                                 	<div class="submit_btn_holder">
            							<input type="submit" id="submit_btn" value="Logout">
            						</div>
                                </form>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
			<?php include 'footer.php';?>
		</div>
	</body>
</html>