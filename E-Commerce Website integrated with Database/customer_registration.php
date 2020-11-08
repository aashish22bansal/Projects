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
                    <a href="#">Shopping Cart Total Price: INR :<?php totalPrice();?>, Total Items: <?php item();?></a>
                </div><!--col-md-6 offer-->
                <div class="col-md-6">
                    <ul class="menu">
                        <li>
                            <a href="customer_registration.php">Register</a>
                        </li>
                        <li>
                            <a href="customer/my_account.php">My Account</a>
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
                    <a class="navbar-brand home" href="HOME_PAGE.php">
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
            <div id="content">
                <div class="container"><!--container-->
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="HOME_PAGE.php">Home</a></li>
                            <li>
                                Registration
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3"><!--col-md-3 Start-->
                        <?php
                        include("includes/sidebar.php");
                        ?>
                    </div><!--col-md-3 End-->
                    <div class="col-md-9"><!--col-md-9 start-->
                    <div class="box"><!--box start-->
                        <div class="box-header"><!--boxheader start-->
                            <center>
                                <h2>Customer Registration</h2>
                            </center>
                        </div><!--boxheader End-->
                        <form action="customer_registration.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label> Customer Name</label>
                                <input type="text" name="c_name" required="" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label> Customer E-mail</label>
                                <input type="text" name="c_email" class="form-control" required="" />
                            </div>
                            <div class="form-group">
                                <label> Customer Password</label>
                                <input type="password" name="c_password" class="form-control" required="" />
                            </div>
                            <div class="form-group">
                                <label> Country</label>
                                <input type="text" name="c_country" class="form-control" required="" />
                            </div>
                            <div class="form-group">
                                <label> City</label>
                                <input type="text" name="c_city" class="form-control" required="" />
                            </div>
                            <div class="form-group">
                                <label>Contact Number</label>
                                <input type="text" name="c_contact" class="form-control" required="" />
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="c_address" class="form-control" required="" />
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="c_image" class="form-control" required="" />
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
                            </div>
                        </form>
                    </div><!--box end-->
                </div><!--col-md-9 end-->
            </div><!--Contained End-->
        </div><!--Content End-->
        <!--footer start-->
        <?php 
            include("includes/footer.php") 
        ?>
        <!--footer end-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>
</html>


<?php
    if (isset($_POST['submit'])) {
        $c_name=$_POST['c_name'];
        $c_email=$_POST['c_email'];
        $c_password=$_POST['c_password'];
        $c_country=$_POST['c_country'];
        $c_city=$_POST['c_city'];
        $c_contact=$_POST['c_contact'];
        $c_address=$_POST['c_address'];
        $c_image=$_FILES['c_image']['name'];
        $c_tmp_image=$_FILES['c_image']['tmp_name'];
        $c_ip=getUserIP();
        move_uploaded_file($c_tmp_image,"customer/customer_images/$c_image");

        $email_check_query = "select * from customers where customer_email='$c_email'";
        $contact_check_query = "select * from customers where customer_contact='$c_contact'";
        $run_email_check_query = mysqli_query($con,$email_check_query);
        $run_contact_check_query = mysqli_query($con,$contact_check_query);

        if($obtained_details_email=mysqli_fetch_array($run_email_check_query)){
            echo "<script>alert('Customer with the same email already exists.')</script>";
            //echo "<script>$c_email = prompt('Please enter new email address','example@example.com')</script>";
            //echo "<script>$c_contact = prompt('Please enter new contact','example@example.com')</script>";
        }
        elseif($obtained_details_contact = mysqli_fetch_array($run_contact_check_query)){
            echo "<script>alert('Customer with the same email/contact already exists.')</script>";
        }
        else{
            $insert_customer="insert into customers(customer_name,customer_email,customer_password,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) values('$c_name','$c_email','$c_password','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";
            $run_customer=mysqli_query($con,$insert_customer);
            $sel_cart="select * from cart where ip_add='$c_ip' ";
            $run_cart=mysqli_query($con,$sel_cart);
            $check_cart=mysqli_num_rows($run_cart);
            if ($check_cart>0) {
                $_SESSION['customer_email']=$c_email;
                echo "<script>alert('You have been registered Successfully')</script>";
                echo "<script>window.open('checkout.php','_self')</script>";
            }else{
                $_SESSION['customer_email']=$c_email;
                echo "<script>alert('You have been registered Successfully')</script>";
                echo "<script>window.open('HOME_PAGE.php','_self')</script>";
            }
        }
    }
?>