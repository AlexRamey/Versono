<!DOCTYPE HTML>
<!--
	Dopetrope by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Versono - Sign Up</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/signup.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>

	<?php
			// define variables and set to empty values
			$signUpSuccessMessage = "";
			$email = $first_name = $last_name = $pswd = $conf_pswd = "";
			$emailErr = $firstNameErr = $lastNameErr = $pswdErr = "";
			$addr = $city = $state = $zip = "";
			$addrErr = $cityErr = $stateErr = $zipErr = "";

			$names = array("email", "first_name", "last_name", "pswd",
			 "street_address", "city", "state", "zip_code");
			$values = array(&$email, &$first_name, &$last_name, &$pswd,
				&$addr, &$city, &$state, &$zip);
			$errors = array(&$emailErr, &$firstNameErr, &$lastNameErr, &$pswdErr,
				&$addrErr, &$cityErr, &$stateErr, &$zipErr);

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				# First test that each required field has data!
				$arrlength = count($names);
				for($x = 0; $x < $arrlength; $x++) {
					if (empty($_POST[$names[$x]])) {
    					$errors[$x] = "This field is required.";
  					} 
  					else {
    					$values[$x] = test_input($_POST[$names[$x]]);
  					}   
				}

				$conf_pswd = $_POST["pswd_conf"];
				# Verify that password matches password confirmation
				if ($pswdErr == ""){
					if (strcmp($pswd, $conf_pswd) != 0){
						$pswdErr = "Passwords must match!";
						$pswd = "";
						$conf_pswd = "";
					}
				}

				# Verify that email matches regEx "*@*.*"
				if ($emailErr == ""){
					$email = filter_var($email, FILTER_VALIDATE_EMAIL);
					if ($email == False)
					{
						$emailErr = "Invalid email address.";
						$email = "";
					}
				}

				# If there are no errors, try to post to the DB!
				$arrlength = count($errors);
				$existsAnError = False;
				for($x = 0; $x < $arrlength; $x++) {
					if ($errors[$x] != ""){
						$existsAnError = True;
					}
				}
				if ($existsAnError == False){
					# Post Data to DB
					if (post_data($values) === TRUE){
						$signUpSuccessMessage = "Sign up Successful!";
						$arrlength = count($values);
						for($x = 0; $x < $arrlength; $x++){
							$values[$x] = "";
						}
						$conf_pswd = "";
					}
				}
			}

			function test_input($data) {
			  $data = trim($data);
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
			}

			# This function writes data to the versono_user table in the DB
			# It returns False on failure
			function post_data($values){
				$servername = "localhost";
				$username = "root";
				$password = "";
				$isSuccess = True;
				// Create connection
				$conn = new mysqli($servername, $username, $password, "versono_db");

				// Check connection
				if ($conn->connect_error) {
				    die("Connection failed: " . $conn->connect_error);
				} 
				
				$sql = $conn->prepare("INSERT INTO versono_user(email, first_name, last_name, user_password, address, city, state, zip_code) VALUES (?,?,?,?,?,?,?,?)");
				if ($sql == False){
					$isSuccess = False;
				}
				else{
					$sql->bind_param('ssssssss', $values[0], $values[1], $values[2], hash("sha256", $values[3]), $values[4], $values[5], $values[6], $values[7]);

					if ($sql->execute() === True) {
					    # success
					} else {
					    $isSuccess = False;
					}

					$sql->close();
				}

				$conn->close();
				return $isSuccess;
			}
	?>

	<body class="no-sidebar">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<div id="header">

						<!-- Logo -->
							<h1>Sign Up</h1>
							<h2><?php echo $signUpSuccessMessage;?></h2>
					</div>
				</div>

			<!-- Main -->
				<div id="main-wrapper">
					<div class="container">
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
							<div>
								Email:<br>
								<input type="email" name="email" placeholder="user@domain.com" maxlength="50" value=<?php echo $email;?>>
								<label class="notify_label"><?php echo $emailErr;?></label>
							</div>
							<div class="clear">&nbsp;</div>
							<div class="form_text_input">
  								First name:<br>
  								<input type="text" name="first_name" placeholder="First Name" maxlength="50" value=<?php echo $first_name;?>>
  								<label class="notify_label"><?php echo $firstNameErr;?></label>
  							</div>
  							<div class="form_text_input">
  								Last name:<br>
								<input type="text" name="last_name" placeholder="Last Name" maxlength="50" value=<?php echo $last_name;?>>
								<label class="notify_label"><?php echo $lastNameErr;?></label>
							</div>
							<div class="clear">&nbsp;</div>
							<div class="form_text_input">
								Password:<br>
								<input type="password" name="pswd" onkeyup="verifyMatchingPasswords()" id="pswd_input_1" maxlength="50" value=<?php echo $pswd;?>>
								<label class="notify_label"><?php echo $pswdErr;?></label>
							</div>
							<div class="form_text_input">
								Confirm Password:<br>
								<input type="password" name="pswd_conf" onkeyup="verifyMatchingPasswords()" id="pswd_input_2" maxlength="50" value=<?php echo $conf_pswd;?>>
								<label class="notify_label" text="" id="pswd_feedback">
							</div>
							<div class="clear">&nbsp;</div>
							<div class="form_text_input">
								Street Address:<br>
								<input type="text" name="street_address" maxlength="50" value=<?php echo $addr;?>>
								<label class="notify_label"><?php echo $addrErr;?></label>
							</div>
							<div class="form_text_input">
								City:<br>
								<input type="text" name="city" maxlength="50" value=<?php echo $city;?>>
								<label class="notify_label"><?php echo $cityErr;?></label>
							</div>
							<div class="clear">&nbsp;</div>
							<div class="form_text_input">
								State:<br>
								<select name="state" size="3">
									<option value="AL" <?php if($state == 'AL'){echo("selected");}?>>Alabama</option>
									<option value="AK" <?php if($state == 'AK'){echo("selected");}?>>Alaska</option>
									<option value="AZ" <?php if($state == 'AZ'){echo("selected");}?>>Arizona</option>
									<option value="AR" <?php if($state == 'AR'){echo("selected");}?>>Arkansas</option>
									<option value="CA" <?php if($state == 'CA'){echo("selected");}?>>California</option>
									<option value="CO" <?php if($state == 'CO'){echo("selected");}?>>Colorado</option>
									<option value="CT" <?php if($state == 'CT'){echo("selected");}?>>Connecticut</option>
									<option value="DE" <?php if($state == 'DE'){echo("selected");}?>>Delaware</option>
									<option value="DC" <?php if($state == 'DC'){echo("selected");}?>>District Of Columbia</option>
									<option value="FL" <?php if($state == 'FL'){echo("selected");}?>>Florida</option>
									<option value="GA" <?php if($state == 'GA'){echo("selected");}?>>Georgia</option>
									<option value="HI" <?php if($state == 'HI'){echo("selected");}?>>Hawaii</option>
									<option value="ID" <?php if($state == 'ID'){echo("selected");}?>>Idaho</option>
									<option value="IL" <?php if($state == 'IL'){echo("selected");}?>>Illinois</option>
									<option value="IN" <?php if($state == 'IN'){echo("selected");}?>>Indiana</option>
									<option value="IA" <?php if($state == 'IA'){echo("selected");}?>>Iowa</option>
									<option value="KS" <?php if($state == 'KS'){echo("selected");}?>>Kansas</option>
									<option value="KY" <?php if($state == 'KY'){echo("selected");}?>>Kentucky</option>
									<option value="LA" <?php if($state == 'LA'){echo("selected");}?>>Louisiana</option>
									<option value="ME" <?php if($state == 'ME'){echo("selected");}?>>Maine</option>
									<option value="MD" <?php if($state == 'MD'){echo("selected");}?>>Maryland</option>
									<option value="MA" <?php if($state == 'MA'){echo("selected");}?>>Massachusetts</option>
									<option value="MI" <?php if($state == 'MI'){echo("selected");}?>>Michigan</option>
									<option value="MN" <?php if($state == 'MN'){echo("selected");}?>>Minnesota</option>
									<option value="MS" <?php if($state == 'MS'){echo("selected");}?>>Mississippi</option>
									<option value="MO" <?php if($state == 'MO'){echo("selected");}?>>Missouri</option>
									<option value="MT" <?php if($state == 'MT'){echo("selected");}?>>Montana</option>
									<option value="NE" <?php if($state == 'NE'){echo("selected");}?>>Nebraska</option>
									<option value="NV" <?php if($state == 'NV'){echo("selected");}?>>Nevada</option>
									<option value="NH" <?php if($state == 'NH'){echo("selected");}?>>New Hampshire</option>
									<option value="NJ" <?php if($state == 'NJ'){echo("selected");}?>>New Jersey</option>
									<option value="NM" <?php if($state == 'NM'){echo("selected");}?>>New Mexico</option>
									<option value="NY" <?php if($state == 'NY'){echo("selected");}?>>New York</option>
									<option value="NC" <?php if($state == 'NC'){echo("selected");}?>>North Carolina</option>
									<option value="ND" <?php if($state == 'ND'){echo("selected");}?>>North Dakota</option>
									<option value="OH" <?php if($state == 'OH'){echo("selected");}?>>Ohio</option>
									<option value="OK" <?php if($state == 'OK'){echo("selected");}?>>Oklahoma</option>
									<option value="OR" <?php if($state == 'OR'){echo("selected");}?>>Oregon</option>
									<option value="PA" <?php if($state == 'PA'){echo("selected");}?>>Pennsylvania</option>
									<option value="RI" <?php if($state == 'RI'){echo("selected");}?>>Rhode Island</option>
									<option value="SC" <?php if($state == 'SC'){echo("selected");}?>>South Carolina</option>
									<option value="SD" <?php if($state == 'SD'){echo("selected");}?>>South Dakota</option>
									<option value="TN" <?php if($state == 'TN'){echo("selected");}?>>Tennessee</option>
									<option value="TX" <?php if($state == 'TX'){echo("selected");}?>>Texas</option>
									<option value="UT" <?php if($state == 'UT'){echo("selected");}?>>Utah</option>
									<option value="VT" <?php if($state == 'VT'){echo("selected");}?>>Vermont</option>
									<option value="VA" <?php if($state == 'VA'){echo("selected");}?>>Virginia</option>
									<option value="WA" <?php if($state == 'WA'){echo("selected");}?>>Washington</option>
									<option value="WV" <?php if($state == 'WV'){echo("selected");}?>>West Virginia</option>
									<option value="WI" <?php if($state == 'WI'){echo("selected");}?>>Wisconsin</option>
									<option value="WY" <?php if($state == 'WY'){echo("selected");}?>>Wyoming</option>
								</select>
								<label class="notify_label"><?php echo $stateErr;?></label>
							</div>
							<div class="form_text_input">
								Zip:<br>
								<input type="text" name="zip_code" maxlength="15">
								<label class="notify_label"><?php echo $zipErr;?></label>
							</div>
							<div class="clear">&nbsp;</div>
							<div class="submit_btn_holder">
								<input type="submit" value="Submit">
							</div>
						</form>
					</div>
				</div>

			<!-- Footer -->
				<div id="footer-wrapper">
					<section id="footer" class="container">
						<div class="row">
							<div class="12u">

								<!-- Copyright -->
									<div id="copyright">
										<ul class="links">
											<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
										</ul>
									</div>
							</div>
						</div>
					</section>
				</div>

		</div>

		<!-- Scripts -->
			<script src="assets/js/true_scripts.js"></script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/skel-viewport.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>