<!DOCTYPE HTML>
<!--
	Dopetrope by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Versono - About</title>
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

						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li><a href="index.php">Home</a></li>
									<li class="current"><a href="about.php">About Us</a></li>
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
							<section class="banner2">
								<header>
									<!--<h2>&#9834;</h2>-->
									<h2>The Versono Way</h2>
									<p>Simpler is better</p>
								</header>
							</section>
					</div>
				</div>
				<div id="main-wrapper">
					<div class="container">
						<!-- Content -->
							<article class="box post">
								<center>
									<header>
										<h2>A New Approach to a Timeless Medium</h2>
										<p><i>The philosophy of Versono</i></p>
									</header>
								</center>
								<p>
									Since the dawn of mankind music has been intertwined with our development,
									expressing our courage, our passion, our hopes, and our fears. Music is a platform from which we tell stories, communicate news, and advance ideas. Despite such obvious significance, the question remains: 
										<b> In this day and age, why isn't there a simple way to sell music online? </b>
								</p>
								<section>
									<header>
										<center><h3>Upending the status quo</h3></center>
									</header>
									<p>
									Versono refers to the <b>"truth of sound"</b>. This phrase comes naturally out of our core beliefs. The current situation is dominated by two music-sharing giants, SoundCloud and iTunes. It is best described as a <i>spectrum</i>, one which SoundCloud occupies at one end&mdash;requiring artists to post music for free&mdash;and iTunes at the other&mdash;requiring the opposite. Paid music services similar to iTunes (e.g. Google Play) are indicative of the same problem, but to a smaller scale. Versono fills the <b>void</b> left in the middle of the spectrum.
									</p>
								</section>
								<section>
									<header>
										<center><h3>Focus on the Songwriter</h3></center>
									</header>
									<p>
									Versono provides an easy-to-access marketplace for up-and-coming musicians to sell their music. Registration is quick, and hassle-free, without any of the hurdles the bigger marketplaces such as iTunes impose. However, the simplicity we emphasize does not mean we sacrifice quality: our marketplace has an extensive set of features that allow for customers to follow an artist, rate songs, and voice opinions in addition to buying music. Versono allows for musicians to post songs for free (a la Soundcloud) in addition to posting paid music, and create promotional offers for upcoming albums and events. With an artist-side philosophy, we make it easy to set up and customize musician profile, attract fans, and share ideas with other musicians. What makes us unique is our emphasis on the artist, all the while maintaining a good customer experience. 
									<br/>
									<br/>
									<center>
									<h3><b>Sign up and start selling your work in under 5 minutes today!</b></h3>
									</p>

									<a href="signup.php" class="button big">Sign Up</a>
									</center>

						
								</section>
							</article>

					</div>
				</div>


						<!-- Intro -->

			<!-- Main
				<div id="main-wrapper">
					<div class="container">
						<div class="row">
							<div class="12u">

								<!-- Portfolio
									<section>
										<header class="major">
											<h2>My Portfolio</h2>
										</header>
										<div class="row">
											<div class="4u 12u(mobile)">
												<section class="box">
													<a href="#" class="image featured"><img src="images/pic02.jpg" alt="" /></a>
													<header>
														<h3>Ipsum feugiat et dolor</h3>
													</header>
													<p>Lorem ipsum dolor sit amet sit veroeros sed amet blandit consequat veroeros lorem blandit  adipiscing et feugiat phasellus tempus dolore ipsum lorem dolore.</p>
													<footer>
														<a href="#" class="button alt">Find out more</a>
													</footer>
												</section>
											</div>
											<div class="4u 12u(mobile)">
												<section class="box">
													<a href="#" class="image featured"><img src="images/pic03.jpg" alt="" /></a>
													<header>
														<h3>Sed etiam lorem nulla</h3>
													</header>
													<p>Lorem ipsum dolor sit amet sit veroeros sed amet blandit consequat veroeros lorem blandit  adipiscing et feugiat phasellus tempus dolore ipsum lorem dolore.</p>
													<footer>
														<a href="#" class="button alt">Find out more</a>
													</footer>
												</section>
											</div>
											<div class="4u 12u(mobile)">
												<section class="box">
													<a href="#" class="image featured"><img src="images/pic04.jpg" alt="" /></a>
													<header>
														<h3>Consequat et tempus</h3>
													</header>
													<p>Lorem ipsum dolor sit amet sit veroeros sed amet blandit consequat veroeros lorem blandit  adipiscing et feugiat phasellus tempus dolore ipsum lorem dolore.</p>
													<footer>
														<a href="#" class="button alt">Find out more</a>
													</footer>
												</section>
											</div>
										</div>
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
										</div>
									</section>

							</div>
						</div>
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
						</div>
					</div>
				</div>
			-->
			<!-- Footer -->
				<div id="footer-wrapper">
					<section id="footer" class="container">
							<div class="row">
							<div class="12u">

								<!-- Copyright -->
									<div id="copyright">
										<ul class="links">
											<li>&copy; 2016 Versono, Inc. All rights reserved.</li>
											<li>Kochubeevsky Ramey Lee</li>
											<!--<li>Design: <a href="http://html5up.net">HTML5 UP</a></li>-->
										</ul>
									</div>

							</div>
						</div>
					</section>
				</div>

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