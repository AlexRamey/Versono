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
		<link rel="stylesheet" href="assets/css/true_style.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>

	<?php
			// define variables and set to empty values
			$signUpMessage = "";
			$email = $first_name = $last_name = $pswd = $conf_pswd = "";
			$emailErr = $firstNameErr = $lastNameErr = $pswdErr = "";
			$addr = $city = $state = $zip = $token = "";
			$addrErr = $cityErr = $stateErr = $zipErr = "";

			$names = array("email", "first_name", "last_name", "pswd",
			 "street_address", "city", "state", "zip_code", "stripeToken");
			$values = array(&$email, &$first_name, &$last_name, &$pswd,
				&$addr, &$city, &$state, &$zip, &$token);
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

			# Verify that first/last names don't contain numbers
 				if ($firstNameErr == ""){
 					if (!ctype_alpha($first_name)){
 						$firstNameErr = "Your name may only use alphabetic characters.";
 					}
 				}
 
 				if ($lastNameErr == ""){
 					if (!ctype_alpha($last_name)){
 						$lastNameErr = "Your name may only use alphabetic characters.";
 					}
 				}
 
 				# Verify that zip code contains only numbers
 				if ($zipErr == ""){
 					if (!ctype_digit($zip)){
 						$zipErr = "Your ZIP code must consist of 5 digits.";
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
					$postRetVal = post_data($values);
					if ($postRetVal[0] === TRUE){
						$signUpMessage = "Sign up Successful!";
						if (sendEmail($values[0], $values[1])):
							$signUpMessage = $signUpMessage . "<br/> Email sent.";
						else:
							$signUpMessage = $signUpMessage . "<br/> Email not sent.";
						endif;

						$arrlength = count($values);
						for($x = 0; $x < $arrlength; $x++){
							$values[$x] = "";
						}
						$conf_pswd = "";
					}
					else
					{
						if ($postRetVal[1] === 1062){
							$emailErr = "This email is already taken!";
						}
						$signUpMessage = $postRetVal[2];
					}
				}
				else{
					$signUpMessage = "Input error! Please try again.";
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
				$db_name = "versono_db";
				$isSuccess = True;
				// Create connection
				$conn = new mysqli($servername, $username, $password, $db_name);

				// Check connection
				if ($conn->connect_error) {
				    die("Connection failed: " . $conn->connect_error);
				} 
				
				$errorNum = 0;
				$errorMsg = "";
				$sql = $conn->prepare("INSERT INTO versono_user(email, first_name, last_name, user_password, address, city, state, zip_code, stripe_customer_id) VALUES (?,?,?,?,?,?,?,?,?)");
				if ($sql == False){
					$isSuccess = False;
				}
				else{
					$sql->bind_param('sssssssss', $values[0], $values[1], $values[2], hash("sha256", $values[3], False), $values[4], $values[5], $values[6], $values[7], createCustomer($values[8]));

					if ($sql->execute() === True) {
					    # success
					} else {
					    $isSuccess = False;
					    if ($sql->errno === 1062){
					    	$errorNum = 1062;
					    	$errorMsg ="Signup failed :(";
					    }
					}

					$sql->close();
				}

				$conn->close();
				return array($isSuccess, $errorNum, $errorMsg);
			}

			function createCustomer($token){
				// Set your secret key: remember to change this to your live secret key in production
				// See your keys here https://dashboard.stripe.com/account/apikeys
				require('vendor/autoload.php'); 
				\Stripe\Stripe::setApiKey("sk_test_Q10y7Sg9aUfGbRaSjP2bkekG");

				// Create the charge on Stripe's servers - this will charge the user's card
				// Create a Customer
				$customer = \Stripe\Customer::create(array(
				  "source" => $token,
				  "description" => "Example customer")
				);

				// Charge the Customer instead of the card
				\Stripe\Charge::create(array(
				  "amount" => 100, // amount in cents, again
				  "currency" => "usd",
				  "customer" => $customer->id)
				);

				return $customer->id;
			}

			function sendEmail($email_addr, $username) {
			  $mailpath = '/Applications/XAMPP/xamppfiles/PHPMailer';
			  
			  // Add the new path items to the previous PHP path
			  $path = get_include_path();
			  set_include_path($path . PATH_SEPARATOR . $mailpath);
			  require 'PHPMailerAutoload.php';

			  $mail = new PHPMailer();
			 
			  $mail->IsSMTP(); // telling the class to use SMTP
			  $mail->SMTPAuth = true; // enable SMTP authentication
			  $mail->SMTPSecure = "tls"; // sets tls authentication
			  $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server; or your email service
			  $mail->Port = 587; // set the SMTP port for GMAIL server; or your email server port
			  $mail->Username = "versono4753@gmail.com"; // email username
			  $mail->Password = "dontstrainyourself"; // email password
			  $mail->isHTML(True);

			  $subj = "Hi, $username! Thanks for signing up with Versono.";
			  $msg = "You have been <b>charged</b>";

			  // Put information into the message
			  $mail->addAddress($email_addr);
			  $mail->SetFrom("x@y.z");
			  $mail->Subject = "$subj";
			  $mail->Body = "$msg";

			  // echo 'Everything ok so far' . var_dump($mail);
			  // if(!$mail->send()) {
			  //   echo 'Message could not be sent.';
			  //   echo 'Mailer Error: ' . $mail->ErrorInfo;
			  //  } 
			  //  else { echo 'Message has been sent'; }

			  return $mail->send();

				/////
			}
	?>

	<body class="no-sidebar" onload="verifyMatchingPasswords()">
		<div id="page-wrapper">

			<!-- Header -->
			<div id="header-wrapper">
				<div id="header">

					<!-- Logo -->
						<h1>Sign Up</h1>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="index.html">Home</a></li>
								<li><a href="about.html">About Us</a></li>
								<li class="current"><a href="signup.php">Sign Up</a></li>
							</ul>
						</nav>
					<!-- Special Message Space -->
					<br>
					<br>
					<h4><?php echo $signUpMessage;?></h4>
				</div>
			</div>

			<!-- Main -->
				<div id="main-wrapper">
					<div class="container">
						<!-- <form id="signup-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> -->
						<form id="signup-form" action="" method="post">
							<div id="header">
								<h3>Personal Information</h3>
							</div>
							<div class="form_full_text_input">
								Email:<br>
								<input type="email" name="email" id="email_input" onblur="verifyEmail()" placeholder="user@domain.com" maxlength="50" value=<?php echo $email;?>>
								<label class="notify_label" text="" id="email_feedback"><?php echo $emailErr;?></label>
							</div>
							<div class="clear">&nbsp;</div>
							<div class="form_half_text_input">
  								First name:<br>
  								<input type="text" name="first_name" id="fname_input" onblur="verifyName(0)" placeholder="First Name" maxlength="50" value=<?php echo $first_name;?>>
  								<label class="notify_label" text="" id="name_feedback"><?php echo $firstNameErr;?></label>
  							</div>
  							<div class="form_half_text_input">
  								Last name:<br>
								<input type="text" name="last_name" id="lname_input" onblur="verifyName(1)" placeholder="Last Name" maxlength="50" value=<?php echo $last_name;?>>
								<label class="notify_label"><?php echo $lastNameErr;?></label>
							</div>
							<div class="clear">&nbsp;</div>
							<div class="form_half_text_input">
								Password:<br>
								<input type="password" name="pswd" onblur="verifyPassword(0)" onkeyup="verifyMatchingPasswords()" id="pswd_input_1" maxlength="50" value=<?php echo $pswd;?>>
								<label class="notify_label"><?php echo $pswdErr;?></label>
								<label class="notify_label" text="" id="pswd_empty_feedback"></label>

							</div>
							<div class="form_half_text_input">
								Confirm Password:<br>
								<input type="password" name="pswd_conf" onblur="verifyPassword(1)" onkeyup="verifyMatchingPasswords()" id="pswd_input_2" maxlength="50" value=<?php echo $conf_pswd;?>>
								<label class="notify_label" text="" id="pswd_neg_feedback"></label>
								<label class="green_label" text="" id="pswd_pos_feedback"></label>
								<label class="notify_label" text="" id="con_pswd_empty_feedback"></label>
							</div>
							<div class="clear">&nbsp;</div>
							<div class="form_half_text_input">
								Street Address:<br>
								<input type="text" name="street_address" onblur="verifyAddress()" id="addr_input" maxlength="50" value=<?php echo $addr;?>>
								<label class="notify_label"><?php echo $addrErr;?></label>
								<label class="notify_label" text="" id="addr_feedback"></label>								

							</div>
							<div class="form_half_text_input">
								City:<br>
								<input type="text" name="city" maxlength="50" onblur="verifyCity()" id="city_input" value=<?php echo $city;?>>
								<label class="notify_label"><?php echo $cityErr;?></label>
								<label class="notify_label" text="" id="city_feedback"></label>
							</div>
							<div class="clear">&nbsp;</div>
							<div class="form_half_text_input">
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
							<div class="form_half_text_input">
								Zip:<br>
								<input type="text" name="zip_code" onblur="verifyZip()" id="zip_input" maxlength="5" value=<?php echo $zip;?>>
								<label class="notify_label"><?php echo $zipErr;?></label>
								<label class="notify_label" text="" id="zip_feedback"></label>
							</div>
							<div class="clear">&nbsp;</div>
							<div id="header">
								<h3>Banking Information</h3>
								<div class="form_full_text_input">
									<label class="notify_label" id="payment_errors" text=""></label>
								</div>
								<br>
							</div>
							<div class="form_half_text_input">
								Name on Card:<br>
								<input type="text" id="card_name" data-stripe="name" onblur="verifyCardName()" placeholder="Cardholder Name" maxlength="50">
								<label class="notify_label" text="" id="card_name_feedback"></label>
							</div>
							<div class="form_half_text_input">
								Card Number:<br>
								<input type="text" id="card_number" data-stripe="number" onblur="verifyCardNumber()" placeholder="Credit/Debit Card Number" maxlength="16">
								<label class="notify_label" text="" id="card_number_feedback"></label>
							</div>
							<div class="clear">&nbsp;</div>
							<div class="form_mini_text_input">
								Expiration Month <br>
								<select data-stripe="exp-month">
									<option value="1">01</option>
									<option value="2">02</option>
									<option value="3">03</option>
									<option value="4">04</option>
									<option value="5">05</option>
									<option value="6">06</option>
									<option value="7">07</option>
									<option value="8">08</option>
									<option value="9">09</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
								</select>
							</div>
							<div class="form_mini_text_input">
								Expiration Year <br>
								<select data-stripe="exp-year">
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
									<option value="2021">2021</option>
									<option value="2022">2022</option>
									<option value="2023">2023</option>
									<option value="2024">2024</option>
									<option value="2025">2025</option>
								</select>
							</div>
							<div class="form_mini_text_input">
								CVC<br>
								<input type="text" id="cvc_number" data-stripe="cvc" onblur="verifyCVCNumber()" placeholder="CVC" maxlength="3">
								<label class="notify_label" text="" id="cvc_number_feedback"></label>
							</div>
							<div class="clear">&nbsp;</div>
							<div class="submit_btn_holder">
								<input type="submit" id="submit_btn" value="Submit">
							</div>
						</form>
					</div>
				</div>

			<?php include 'footer.php';?>

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
			<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
			<script type="text/javascript">
  				// This identifies your website in the createToken call below
  				Stripe.setPublishableKey('pk_test_0cxD7MvK3NG8WaLoBOXG13nd');
  				jQuery(function($) {
				  $('#signup-form').submit(function(event) {
				    var $form = $(this);

				    // Disable the submit button to prevent repeated clicks
				    $form.find('submit_btn').prop('disabled', true);
				    Stripe.card.createToken($form, stripeResponseHandler);

				    // Prevent the form from submitting with the default action
				    return false;
				  });
				});
  				function stripeResponseHandler(status, response) {
				  var $form = $('#signup-form');
				  if (response.error) {
				    // Show the errors on the form
				    document.getElementById("payment_errors").innerHTML = response.error.message;
				    $form.find('submit_btn').prop('disabled', false);
				  } else {
				    // response contains id and card, which contains additional card details
				    var token = response.id;
				    // Insert the token into the form so it gets submitted to the server
				    $form.append($('<input type="hidden" name="stripeToken" />').val(token));
				    // and submit
				    $form.get(0).submit();
				  }
				};
  				// ...
			</script>
			 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	</body>
</html>