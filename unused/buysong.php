<?php
session_start();

$email = $_SESSION['email'];
$id = $_POST['id'];
$numsold = "";
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

$sql = $conn->prepare("INSERT INTO boughtsongs(email, id) VALUES (?,?)");
if ($sql->bind_param('ss', $email, $id) === TRUE){
	if ($sql->execute() === TRUE) { 

	}
}

$sql = $conn->prepare("SELECT numsold FROM song WHERE id = ?");
if ($sql->bind_param('s', $id) === TRUE){
	if ($sql->execute() === TRUE) { 
		$sql->bind_result($numsold);
		$sql->fetch();
		$numsold = $numsold + 1;
		$sql->close();
	}
}

$sql = $conn->prepare("UPDATE song SET numsold =? WHERE id = ?");
if ($sql->bind_param('ss', $numsold, $id) === TRUE){
	if ($sql->execute() === TRUE) { 

	}
}


$sql->close();
$conn->close();

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







header("Location: buy.php");
?>