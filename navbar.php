<?php

    if(isset($_SESSION["user"])):
        $name = $_SESSION["user"];
    endif;
    ?>

<!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Versono</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">

                <!--  Username here    -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $name; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><form action="login.php" method="post" name="logoutform">
                        <input type="hidden" value="logout" name="logout">
                            <a href="" onclick="document.logoutform.submit();"><i class="fa fa-fw fa-power-off"></i> Log Out</a></form>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <!-- class="active" -->
                    <li>
                        <a href="dashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="buy.php"><i class="fa fa-fw fa-bar-chart-o"></i> Buy</a>
                    </li>
                    <li>
                        <a href="sell.php"><i class="fa fa-fw fa-table"></i> Sell</a>
                    </li><!--
                    <li>
                        <a href="settings.php"><i class="fa fa-fw fa-edit"></i> Settings</a>
                    </li>-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>