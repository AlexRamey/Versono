<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sell</title>

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
                                Sell
                            </h1>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                            <h2>Upload a Song!</h2>
                            <form action="upload.php" method="post" class="form-group">
                            <div class="col-lg-2">
                                Title: <input type="text" class="form-control" name="title">
                                </div>
                                <div class ="col-lg-2">
                                Artist: <input type="text" class="form-control" name="artist">
                                </div>
                                <div class ="col-lg-2">
                                Album: <input type="text" class="form-control" name="album">
                                                                </div>
                                <div class ="col-lg-2">
                                Price: <input type="text" class="form-control" name="price">
                                                                </div>
                                <div class ="col-lg-2">
                                Song File: <input type="file"  name="song">
                                                                </div>
                                <div class ="col-lg-2">

                                <input type="submit" class="btn btn-default" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-10">
                            <h2>Your music!</h2>
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
                            $sql = $conn->prepare("SELECT title, artist, album, price FROM song WHERE email = ?");
                            if ($sql->bind_param('s', $_SESSION['email']) === TRUE){
                                if ($sql->execute() === TRUE) {
                                    $title = "";
                                    $artist = "";
                                    $sql->bind_result($title, $artist, $album, $price);
                                    echo "<table class='table table-striped'>";
                                    echo "<thead><tr><td>Title</td><td>Artist</td><td>Album</td><td>Price</td></tr></thead><tbody>";
                                    while($sql->fetch() == TRUE){
                                        echo "<tr><td>";
                                        echo $title;
                                        echo "</td><td>";
                                        echo $artist;
                                        echo "</td><td>";
                                        echo $album;
                                        echo "</td><td>";
                                        echo $price;
                                    }
                                    echo "</td></tr></tbody></table>";
                                    $sql->close();
                                    $conn->close();
                                }
                            }
                            ?>
                        </div>
                    </div>

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

    </html>
