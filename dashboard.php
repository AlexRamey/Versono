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

	if (isset($_POST["sum"])):
		$sum = $_POST["sum"];
		$sum = ltrim($sum, "$");
		if (is_numeric($sum) && $sum > 0.50 && $sum < 1000):
			$sum = $sum * 100; 
			$conn = new mysqli("localhost", "root", "", "versono_db");
			$query = "SELECT stripe_customer_id FROM versono_user WHERE email='" . $_SESSION["email"] . "'";
			$res = $conn->query($query);
			$cus_id = $res->fetch_assoc()["stripe_customer_id"];

			require('vendor/autoload.php'); 

			\Stripe\Stripe::setApiKey("sk_test_Q10y7Sg9aUfGbRaSjP2bkekG");
			\Stripe\Charge::create(array(
	  			"amount"   => $sum, // $15.00 this time
	  			"currency" => "usd",
	  			"customer" => $cus_id // Previously stored, then retrieved
	  		));
			$conn->close();
		else:
			echo "Please enter a dollar value greater than 0.50 and less than 1000. <br/>";
		endif;
	endif;
?>
	<input type="submit" value="logout" name="logout">	
	</form>
	<br/>
	<b>Enter a sum: </b>
	<form action="dashboard.php" method="POST">
		<input type="text" name="sum" >
		<input type="submit" value="Pay" >
	</form>


</body>
</html>