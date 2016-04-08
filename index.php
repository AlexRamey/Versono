<!DOCTYPE HTML>
<!--
	Dopetrope by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Versono - Truth of Sound</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="homepage">
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
									<li class="current"><a href="index.php">Home</a></li>
									<!-- Dropdown
									<li>
										<a href="#">Dropdown</a>
										<ul>
											<li><a href="#">Lorem ipsum dolor</a></li>
											<li><a href="#">Magna phasellus</a></li>
											<li><a href="#">Etiam dolore nisl</a></li>
											<li>
												<a href="#">Phasellus consequat</a>
												<ul>
													<li><a href="#">Magna phasellus</a></li>
													<li><a href="#">Etiam dolore nisl</a></li>
													<li><a href="#">Veroeros feugiat</a></li>
													<li><a href="#">Nisl sed aliquam</a></li>
													<li><a href="#">Dolore adipiscing</a></li>
												</ul>
											</li>
											<li><a href="#">Veroeros feugiat</a></li>
										</ul>
									</li>
									-->
									<!-- nav bars links
									<li><a href="left-sidebar.html">Left Sidebar</a></li>
									<li><a href="right-sidebar.html">Right Sidebar</a></li>
									<li><a href="no-sidebar.html">No Sidebar</a></li>
									-->
									<li><a href="about.php">About Us</a></li>
									<li><a href="signup.php">Sign Up</a></li>
									<?php
								        session_start();

								        if(isset($_SESSION["user"])):
								        	echo '<li><a href="member_home.php">Dashboard</a></li>';
								        else:
								            echo '<li><a href="login.php">Login</a></li>';
								        endif;
								    ?>
								</ul>
							</nav>

						<!-- Banner -->
							<section class="banner1">
								<header>
									<!--<h2>&#9834;</h2>-->
									<h2>The Truth of Sound</h2>
									<p>Where the Music Speaks for Itself</p>
								</header>
							</section>

						<!-- Intro -->
							<section id="intro" class="container">
								<div class="row">
									<div class="4u 12u(mobile)">
										<section class="first">
											<i class="icon featured fa-search "></i>
											<header>
												<h2>Browse</h2>
											</header>
											<p>Find new music and artists</p>
										</section>
									</div>
									<div class="4u 12u(mobile)">
										<section class="middle">
											<i class="icon featured alt fa-usd "></i>
											<header>
												<h2>Barter</h2>
											</header>
											<p>Set up your own shop in minutes and start selling music</p>
										</section>
									</div>
									<div class="4u 12u(mobile)">
										<section class="last">
											<i class="icon featured alt2 fa-commenting-o "></i>
											<header>
												<h2>Blab</h2>
											</header>
											<p>Join the discussion &amp; connect with artists</p>
										</section>
									</div>
								</div>

							</section>
							<section id="bullets">
								<div class="row">
								<ul class="fa-ul" >
									  <li><i class="fa-li fa fa-check-square"></i>Avoid the usual headaches in registering and setting up an artist account</li>
									<br/>
									  <li><i class="fa-li fa fa-check-square"></i>Downloading music is just as simple on the consumer end, with 1-click shopping available&mdash;account not required!</li>
									<br/>
									  <li><i class="fa-li fa fa-check-square"></i><b>Versono</b> challenges the existing structure by combining the best features of the free and paid music worlds (i.e. SoundCloud and iTunes) into one streamlined product</li>
								</ul>

							</row>
							</section>
							<section id="intro" class="container">
								<footer>
									<ul class="actions">
										<li><a href="signup.php" class="button big">Get Started</a></li>
										<li><a href="about.php" class="button alt big">Learn More</a></li>
									</ul>
								</footer>
							</section>

					</div>
				</div>

			<!-- Main -->
				<div id="main-wrapper">
					<div class="container">
						<div class="row">
							<div class="12u">

								<!-- Portfolio -->
									<section>
										<header class="major">
											<h2>This Week's Featured Artists</h2>
										</header>
										<div class="row">
											<div class="4u 12u(mobile)">
												<section class="box">
													<a href="#" class="image featured"><img src="images/swift.jpg" alt="" /></a>
													<header>
														<h3>Taylor Swift</h3>
													</header>
													<p>Swift just released her new album 1989 and is really excited to share it with the Versono community. Her 1989 tour is starting next month!</p>
													<footer>
														<a href="#" class="button alt">Visit Taylor's Page</a>
													</footer>
												</section>
											</div>
											<div class="4u 12u(mobile)">
												<section class="box">
													<a href="#" class="image featured"><img src="images/church.jpg" alt="" /></a>
													<header>
														<h3>Eric Church</h3>
													</header>
													<p>Hot off the release of his fresh new album Mr. Misunderstood, the chief is beginning to publish some 'lost songs' from earlier albums. </p>
													<footer>
														<a href="#" class="button alt">Visit Church's Page</a>
													</footer>
												</section>
											</div>
											<div class="4u 12u(mobile)">
												<section class="box">
													<a href="#" class="image featured"><img src="images/buffet.jpg" alt="" /></a>
													<header>
														<h3>Jimmy Buffet</h3>
													</header>
													<p>The legend returns from Margaritaville with a few more beach songs for this summer season! Check out Jimmy's new album, Off to See the Lizard!</p>
													<footer>
														<a href="#" class="button alt">Visit Jimmy's Page</a>
													</footer>
												</section>
											</div>
										</div>
										<!--
										<div class="row">
											<div class="4u 12u(mobile)">
												<section class="box">
													<a href="#" class="image featured"><img src="images/pic05.jpg" alt="" /></a>
													<header>
														<h3>Blandit sed adipiscing</h3>
													</header>
													<p>Lorem ipsum dolor sit amet sit veroeros sed amet blandit consequat veroeros lorem blandit  adipiscing et feugiat phasellus tempus dolore ipsum lorem dolore.</p>
													<footer>
														<a href="#" class="button alt">Find out more</a>
													</footer>
												</section>
											</div>
											<div class="4u 12u(mobile)">
												<section class="box">
													<a href="#" class="image featured"><img src="images/pic06.jpg" alt="" /></a>
													<header>
														<h3>Etiam nisl consequat</h3>
													</header>
													<p>Lorem ipsum dolor sit amet sit veroeros sed amet blandit consequat veroeros lorem blandit  adipiscing et feugiat phasellus tempus dolore ipsum lorem dolore.</p>
													<footer>
														<a href="#" class="button alt">Find out more</a>
													</footer>
												</section>
											</div>
											<div class="4u 12u(mobile)">
												<section class="box">
													<a href="#" class="image featured"><img src="images/pic07.jpg" alt="" /></a>
													<header>
														<h3>Dolore nisl feugiat</h3>
													</header>
													<p>Lorem ipsum dolor sit amet sit veroeros sed amet blandit consequat veroeros lorem blandit  adipiscing et feugiat phasellus tempus dolore ipsum lorem dolore.</p>
													<footer>
														<a href="#" class="button alt">Find out more</a>
													</footer>
												</section>
											</div>
										</div> -->
									</section>

							</div>
						</div>
						<!--
						<div class="row">
							<div class="12u">

								<!-- Blog
									<section>
										<header class="major">
											<h2>The Blog</h2>
										</header>
										<div class="row">
											<div class="6u 12u(mobile)">
												<section class="box">
													<a href="#" class="image featured"><img src="images/pic08.jpg" alt="" /></a>
													<header>
														<h3>Magna tempus consequat lorem</h3>
														<p>Posted 45 minutes ago</p>
													</header>
													<p>Lorem ipsum dolor sit amet sit veroeros sed et blandit consequat sed veroeros lorem et blandit  adipiscing feugiat phasellus tempus hendrerit, tortor vitae mattis tempor, sapien sem feugiat sapien, id suscipit magna felis nec elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos lorem ipsum dolor sit amet.</p>
													<footer>
														<ul class="actions">
															<li><a href="#" class="button icon fa-file-text">Continue Reading</a></li>
															<li><a href="#" class="button alt icon fa-comment">33 comments</a></li>
														</ul>
													</footer>
												</section>
											</div>
											<div class="6u 12u(mobile)">
												<section class="box">
													<a href="#" class="image featured"><img src="images/pic09.jpg" alt="" /></a>
													<header>
														<h3>Aptent veroeros et aliquam</h3>
														<p>Posted 45 minutes ago</p>
													</header>
													<p>Lorem ipsum dolor sit amet sit veroeros sed et blandit consequat sed veroeros lorem et blandit  adipiscing feugiat phasellus tempus hendrerit, tortor vitae mattis tempor, sapien sem feugiat sapien, id suscipit magna felis nec elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos lorem ipsum dolor sit amet.</p>
													<footer>
														<ul class="actions">
															<li><a href="#" class="button icon fa-file-text">Continue Reading</a></li>
															<li><a href="#" class="button alt icon fa-comment">33 comments</a></li>
														</ul>
													</footer>
												</section>
											</div>
										</div>
									</section>

							</div>
						</div> -->
					</div>
				</div>
			
			<!-- Footer -->
				<?php include 'footer.php';?>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/skel-viewport.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>