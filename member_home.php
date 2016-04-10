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
                    <div id="header">
                                <header class="major">
                                    <h2>Welcome back to Versono myStudio, <?php echo $name; ?>!</h2>
                                </header>
                            </div>
                    <br/>
                    <form action="login.php" method="post" id="logoutform">

                    <div class="submit_btn_holder">
                        <a href="#" class="button alt">Manage Profile</a>
                        <a href="#" class="button alt">Account Details</a>
                        <a href="#" class="button alt">Top Sellers</a>
                        <a href="#" class="button alt">Visit myShop</a>
                        <a href="#" class="button alt">
                            <i class="icon alt fa-comment-o "></i>
                        </a>

                        <a href="#" class="button alt">
                            <i class="icon alt fa-question "></i>
                        </a>
                        <a href="#" class="button alt">
                                <i class="icon alt fa-search "></i>
                        </a>

                                
                        <!--<input type="submit" class="button alt" id="submit_btn" value="Logout">-->

                    </div>
                </form>
                    <br/>
                    <br/>
                    <div class="row">
                        <div class="4u 12u(mobile)">
                            <!-- Sidebar -->
                                <section class="box">
                                    <a href="#" class="image featured"><img src="images/koch_bike_special.jpg" alt="" /></a>
                                    <header>
                                        <h3>Bernie Franks</h3>
                                    </header>
                                    <p>Franks has been a part of the Versono community for over 10 months. Top hits include "One Time Walkin'" and "Tricontinentenal", which both eclipsed the Versono Platinum level of one million downloads!</p>
                                    <footer>
                                        <a href="#" class="button alt">Edit Bio</a>
                                    </footer>
                                </section>
                        </div>
                        <div class="8u 12u(mobile) important(mobile)">
                                <section>
                                    <table style="width:100%">
                                        <caption id="member">This Month's Best Sellers</caption>
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
                                        		<td>They Been Sleepin' on Me</td>
                                        		<td>$0.99</td> 
                                        		<td>92</td>
                                                <td>890</td>
                                                <td>June 2016</td>
                                        	</tr>
                                        	<tr>
                                        		<td>Sweet Mrs Lou Comin' Home</td>
                                                <td>$0.79</td> 
                                                <td>73</td>
                                                <td>5600</td>
                                                <td>April 2015</td>
                                        	</tr>

                                        </tbody>
                                    </table>
                                </section>
                                <section>
                                    <table style="width:100%" id="data">
                                        <caption id="member">Followership Analytics</caption>
                                        <tr>
                                            <td><img id="data" src="images/graph.jpg" style="width:95%"/></td>
                                        </tr>
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