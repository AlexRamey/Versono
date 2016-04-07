<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="assets/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

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

        <div id="wrapper">

            <?php include 'navbar.php';?>

            <div id="page-wrapper">

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Dashboard <small><?php echo $name; ?></small>
                            </h1>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-info-circle"></i>  <strong>Hello!</strong> Welcome to Versono!
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-comments fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">
                                                <?php

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
                                                $sql = $conn->prepare("SELECT SUM(numsold) FROM song WHERE email = ?");
                                                if ($sql->bind_param('s', $_SESSION['email']) === TRUE){
                                                    if ($sql->execute() === TRUE) { 
                                                        $sql->bind_result($numsold);
                                                        $sql->fetch();
                                                        echo $numsold;
                                                        $sql->close();
                                                    }
                                                }
                                                ?>
                                            </div>
                                            <div>Sales!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="assets/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="assets/js/bootstrap.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="assets/js/plugins/morris/raphael.min.js"></script>
        <script src="assets/js/plugins/morris/morris.min.js"></script>
        <script src="assets/js/plugins/morris/morris-data.js"></script>

    </body>
<!--
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
-->
    </html>
