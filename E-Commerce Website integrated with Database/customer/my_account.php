<?php
    session_start();
    if(!isset($_SESSION['customer_email'])){
        echo "<script>window.open('../checkout.php','_self')</script>";
    }
    else{
        
    include("includes/db.php");
    include("functions/functions.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>WeCare Ecomm Store</title>
        <link rel="stylesheet" type="text/css" href="styles/style.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <!--font-awesome link-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>
    <body>
        <div id="top"><!--Starting the top bar-->
            <div class="container"><!--Starting of the container-->
                <div class="col-md-6 offer"><!--col-md-6 offer-->
                    <a href="#" class="btn btn-success btn-sm">
                        <?php
                        if (!isset($_SESSION['customer_email'])) {
                            echo "Welcome Guest";
                            }
                            else{
                                echo "Welcome: ".$_SESSION['customer_email']. "";
                            }
                        ?>
                    </a>
                    <a href="#">Shopping Cart Total Price: INR <?php totalPrice();?>, Total Items: <?php item();?></a>
                </div><!--col-md-6 offer-->
                <div class="col-md-6">
                    <ul class="menu">
                        <li>
                            <a href="../customer_registration.php">Register</a>
                        </li>
                        <li>
                            <a href="my_account.php">My Account</a>
                        </li>
                        <li>
                            <a href="../admin_area/index.php">Admin Login</a>
                        </li>
                        <li>
                            <a href="../login.php">Login</a>
                        </li>
                    </ul>
                </div>
            </div><!--Starting of the container-->
        </div><!--Ending the top bar-->

        <div class="navbar navbar-default" id="navbar"><!--Starting the Header = navbar navbar-default-->
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand home" href="../HOME_PAGE.php">
                        <img src="images/wecare.jpg" alt="WeCare Ecomm Store" width="180px" height="59px" class="hidden-xs"><!--will be used for all the screens of normal size-->
                        <img src="images/wecare_small.jpg" alt="WeCare Ecomm Store" width="90px" height="29px" class="visible-xs"><!--will be used only when the screen size is small-->
                    </a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle Navigation</span>
                        <i class="fa fa-align-justify"></i><!--font awesome icon-->
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only"></span>
                        <i class="fa fa-search"></i><!--font awesome icon-->
                    </button>
                </div>

                <div class="navbar-collapse collapse" id="navigation"><!--Collapsable Menu Start-->
                    <div class="padding-nav"><!--padding-nav starts-->
                        <ul class="nav navbar-nav navbar-left"><!--nav navbar-nav navbar-left STARTS-->
                            <li>
                                <a href="../HOME_PAGE.php">Home</a>
                            </li>
                            <li>
                                <a href="../shop.php">Shop</a>
                            </li>
                            <li class="active">
                                <?php
                                    if (!isset($_SESSION['customer_email'])) {
                                        echo "<a href='checkout.php'>Login</a>";
                                    }else{
                                        echo "<a href='customer/my_account.php?my_order'>My Account</a>";
                                    }
                                ?>
                            </li>
                            <li>
                                <a href="../cart.php">Shopping Cart</a>
                            </li>
                            <li>
                                <a href="../about.php">About Us</a>
                            </li>
                            <li>
                                <a href="../contactus.php">Contact Us</a>
                            </li>
                        </ul><!--nav navbar-nav navbar-left ENDS-->
                    </div><!--padding-nav ends-->
                    <a href="cart.php" class="btn btn-primary navbar-btn right">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Items in Cart</span>
                    </a>
                    <div class="navbar-collapse collapse-right"><!--navbar-collapse collapse-right STARTS-->
                        <button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
                            <span class="sr-only">Toggle Search</span>
                            <i class="fa fa-search"></i>
                        </button>
                    </div><!--navbar-collapse collapse-right ENDS-->
                    <div class="collapse clearfix" id="search"><!--collapse clearfix STARTS-->
                        <form class="navbar-form" method="get" action="result.php">
                            <div class="input-group">
                                <input type="text" name="user_query" placeholder="Search..." class="form-control" required="">
                                <span class="input-group-btn">
                                    <button type="Submit" value="Search" name="search" class="btn btn-primary">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div><!--collapse clearfix ENDS-->
                </div><!--Collapsable Menu end-->
            </div>

        <div id="content">
            <div class="container"><!--container-->
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="HOME_PAGE.php">Home</a></li>
                        <li>
                            My Account
                        </li>
                    </ul>
                </div>
                <div class="col-md-3"><!--col-md-3 Start-->
                    <?php
                    include("includes/sidebar.php");
                    ?>
                </div><!--col-md-3 End-->
                <div class="col-md-9">
                    <!--Including my_order.php page Start-->
                    <?php if(isset($_GET['my_order'])){include("my_order.php");} ?>
                    <!--Including my_order.php page End-->

                    <!--Including Payoffline.php page start-->
                    <?php
                        if(isset($_GET['pay_offline'])){
                            include("pay_offline.php");
                        }
                    ?>
                    <!--Including Payoffline.php page End-->
                    <!--Including Edit_Account.php page start-->
                    <?php
                        if(isset($_GET['edit_account'])){
                            include("edit_account.php");
                        }
                    ?>
                    <!--Including Edit_Account.php page End-->
                    <!--Including Change_password.php page Start-->
                    <?php
                        if(isset($_GET['change_password'])){
                            include("change_password.php");
                        }
                    ?>
                    <!--Including Change_password.php page End-->
                    <!--Including Delete.php page Start-->
                    <?php
                        if(isset($_GET['delete_account'])){
                            include("delete_account.php");
                        }
                    ?>
                    <!--Including Delete.php page End-->
                </div>
            </div><!--Container End-->
        </div><!--Content End-->
        <!--footer start-->
        <?php include("includes/footer.php") ?>
        <!--footer end-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      </body>
</html>
<?php 
}
?>