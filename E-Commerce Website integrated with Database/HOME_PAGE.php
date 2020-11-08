<?php
  session_start();
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
                    <a href="#">Shopping Cart Total Price:<?php totalPrice();?> Total Items: <?php item();?></a>
                </div><!--col-md-6 offer-->
                <div class="col-md-6">
                    <ul class="menu">
                        <li>
                            <a href="customer_registration.php">Register</a>
                        </li>
                        <li>
                            <?php
                                if(!isset($_SESSION['customer_email'])){
                                    echo "<a href='checkout.php'>My Account</a>";
                                }
                                else{
                                    echo "<a href='customer/my_account.php?my_order'>My Account</a>";
                                }
                            ?>
                        </li>
                        <li>
                            <a href="admin_area/login.php">Admin Login</a>
                        </li>
                        <li>
                            <?php
                            if (!isset($_SESSION['customer_email'])) {
                                echo "<a href='checkout.php'>Login</a>";
                            }else{
                                echo "<a href='logout.php'>Logout</a>";
                            }
                            ?>
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
                            <li class="active">
                                <a href="HOME_PAGE.php">Home</a>
                            </li>
                            <li>
                                <a href="shop.php">Shop</a>
                            </li>
                            <li>
                                <?php
                                    if (!isset($_SESSION['customer_email'])) {
                                        echo "<a href='checkout.php'>Login</a>";
                                    }else{
                                        echo "<a href='logout.php'>Logout</a>";
                                    }
                                ?>
                            </li>
                            <li>
                                <a href="about.php">About Us</a>
                            </li>
                            <li>
                                <a href="cart.php">Shopping Cart</a>
                            </li>
                            <li>
                                <a href="contactus.php">Contact Us</a>
                            </li>
                        </ul><!--nav navbar-nav navbar-left ENDS-->
                    </div><!--padding-nav ends-->
                    <a href="cart.php" class="btn btn-primary navbar-btn right">
                        <i class="fa fa-shopping-cart"></i>
                        <span><?php item();?> Items in Cart</span>
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
            <!--MAKING A SLIDER-->
            <div class="container" id="slider">
                <div class="col-md-12"><!--col-md-12 STARTS-->
                    <div class="carousel slide" id="myCarousel" data-ride="carousel"><!--carousel slide STARTS-->
                        <ol class="carousel-indicators">
                            <li data-target="myCarousel" data-slide-to="0" class="action"></li>
                            <li data-target="myCarousel" data-slide-to="1"></li>
                            <li data-target="myCarousel" data-slide-to="2"></li>
                            <li data-target="myCarousel" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner"> <!-- carousel-inner START-->
                            <?php
                                $get_slider="select * from slider LIMIT 0,1";
                                $run_slider=mysqli_query($con,$get_slider);
                                while($row=mysqli_fetch_array($run_slider))
                                {
                                    $slider_name=$row['slider_name'];
                                    $slider_image=$row['slider_image'];
                                    echo "<div class='item active'>
                                    <img src='admin_area/slider_images/$slider_image'>
                                    </div>
                                    ";
                                }
                            ?>
                            <?php
                                $get_slider="select * from slider LIMIT 1,3";
                                $run_slider=mysqli_query($con,$get_slider);
                                while($row=mysqli_fetch_array($run_slider))
                                {
                                    $slider_name=$row['slider_name'];
                                    $slider_image=$row['slider_image'];
                                    echo "<div class='item'>
                                    <img src='admin_area/slider_images/$slider_image'>
                                    </div>
                                    ";
                                }
                            ?>
                        </div><!-- carousel-inner END-->
                        <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a href="#myCarousel" class="right carousel-control" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div><!--carousel slide ENDS-->
                </div><!--col-md-12 ENDS-->
            </div><!--ENDING OF THE SLIDER DIVISION-->
        </div><!--Ending the Header-->
        <div id="advantage"> <!--Advantage start-->
            <div class="container"><!--container start-->
                <div class="same-height-row"><!--same-height-row start-->
                    <div class="col-sm-4"><!--col-sm-4 start-->
                        <div class="box same-height"><!--box same-height start-->
                            <div class="icon">
                              <i class="fa fa-heart"></i>
                            </div>
                            <h3><a href="#">BEST PRICES</a></h3>
                                <p>
                                  You can check on all other sites about the prices and then compare with us.
                                </p>
                        </div><!--box same-height end-->
                    </div><!--col-sm-4 end-->
                    <div class="col-sm-4"><!--col-sm-4 start-->
                        <div class="box same-height"><!--box same-height start-->
                            <div class="icon">
                            <i class="fa fa-heart"></i>
                            </div>
                            <h3><a href="#">100% SATISFACTION GUARANTEED FROM US</a></h3>
                                <p>
                                Free returns on everything for 3 months.
                                </p>
                        </div><!--box same-height end-->
                    </div><!--col-sm-4 end-->
                    <div class="col-sm-4"><!--col-sm-4 start-->
                        <div class="box same-height"><!--box same-height start-->
                            <div class="icon">
                            <i class="fa fa-heart"></i>
                            </div>
                            <h3><a href="#">WE LOVE OUR CUSTOMERS</a></h3>
                                <p>
                                We are known to provide best possible service ever.
                                </p>
                        </div><!--box same-height end-->
                    </div><!--col-sm-4 end-->
                </div><!--same-height-row end-->
            </div><!--container end-->
        </div><!--Advantage end-->
        <div id="hot"><!--hot start-->
            <div class="box"><!--box start-->
                <div class="container"><!--container start-->
                <div class="col-md-12"><!--col-md-12 start-->
                    <h2>LATEST THIS WEEK</h2>
                </div><!--col-md-12 end-->
                </div><!--container end-->
            </div><!--box end-->
        </div><!--hot end-->
        <div id="content" class="container">
            <div class="row">
                <?php
                    getPro();
                ?>
            </div>
        </div>
        <!--footer start-->
        <?php include("includes/footer.php") ?>
          <!--footer end-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>
</html>
