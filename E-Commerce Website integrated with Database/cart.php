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
            <div class="container"><!--container STARTS-->
                <div class="navbar-header"><!--navbar-header STARTS-->
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
                </div><!-- navbar-header ENDS-->

                <div class="navbar-collapse collapse" id="navigation"><!--Collapsable Menu Start-->
                    <div class="padding-nav"><!--padding-nav starts-->
                        <ul class="nav navbar-nav navbar-left"><!--nav navbar-nav navbar-left STARTS-->
                            <li>
                                <a href="HOME_PAGE.php">Home</a>
                            </li>
                            <li>
                                <a href="shop.php">Shop</a>
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
                                <a href="about.php">About Us</a>
                            </li>
                            <li class="active">
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
            </div><!--container ENDS-->
            <div id="content">
                <div class="container"><!--container STARTS-->
                    <div class="col-md-12"><!--col-md-12-->
                        <ul class="breadcrumb">
                            <li><a href="HOME_PAGE.php">Home</a></li>
                            <li>
                                Cart
                            </li>
                        </ul>
                    </div><!--col-md-12 ENDS-->
                    <div class="col-md-9" id="cart"><!--col-md-9 STARTS-->
                        <div class="box">
                            <form action="cart.php" method="post" enctype="multipart-form-data">

                                <h1>Shopping Cart</h1>
                                <?php
                                $ip_add=getUserIP();
                                $select_cart="select * from cart where ip_add='$ip_add'";
                                $run_cart=mysqli_query($con,$select_cart);
                                $count=mysqli_num_rows($run_cart);
                                ?>
                                <p class="text-muted">Currently you have <?php echo $count  ?> item(s) in your cart</p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thread>
                                            <tr>
                                                <th colspan="2">Product</th>
                                                <th>Quantity</th>
                                                <th>Unit Price</th>
                                                <th>Size</th>
                                                <th colspan="1">Sub Total</th>
                                            </tr>
                                        </thread>
                                        <tbody>

                                            <?php 
                                            $total=0;
                                            while ($row=mysqli_fetch_array($run_cart)) {
                                                $pro_id=$row['p_id'];    
                                                $pro_size=$row['size'];
                                                $pro_qty=$row['qty'];
                                                $get_product="select * from products where product_id='$pro_id'";
                                                $run_pro=mysqli_query($con,$get_product);
            while ($row=mysqli_fetch_array($run_pro)) {
                $p_title=$row['product_title'];
                $p_img1=$row['product_img1'];
                $p_price=$row['product_price'];
                $sub_total=$row['product_price']*$pro_qty;                                    
                $total += $sub_total;
                            
                                            ?>
                                            <tr>
                                                <td><img src="admin_area/product_images/<?php echo $p_img1 ?>"></td>
                                                <td><?php echo $p_title ?></td>
                                                <td><?php echo $pro_qty ?></td>
                                                <td><?php echo $p_price ?></td>
                                                <td><?php echo $p_price ?></td>
                                                <td><?php echo $sub_total ?></td>
                                            </tr>
                                            <?php } } ?>
                                        
                                        <tfoot>
                                            <tr>
                                                <th colspan="5"></th>
                                                <th colspan="2"></th>
                                            </tr>
                                        </tfoot>
                                    </table><!--table ENDS-->
                                </div><!--table-responsive ends-->

                                <div class="box-footer"><!--box STARTS-->
                                    <div class="pull-left"><!--pull-left starts-->
                                       <h4>Total Price</h4>
                                    </div><!-- pull-left ENDS-->
                                    <div class="pull-right"><!--pull-right ENDS-->
                                        <h4>INR <?php
                                         echo $total;
                                        ?></h4>
                                    </div><!-- pull-right ENDS-->
                                </div><!--box ENDS -->
                                <div class="box-footer"><!--box STARTS-->
                                    <div class="pull-left"><!--pull-left starts-->
                                        <a href="index.php" class="btn btn-default">
                                            <i class="fa fa-chevron-left"></i> Continue Shopping
                                        </a>
                                    </div><!-- pull-left ENDS-->
                                    <div class="pull-right"><!--pull-right ENDS-->
                                        <button class="btn btn-default" type="submit" name="update" value="Update Cart">
                                            <i class="fa fa-refresh"> Update Cart</i>
                                        </button>
                                        <a href="checkout.php" class="btn btn-primary">Proceed to checkout<i class="fa fa-chevron-right"></i></a>
                                    </div><!-- pull-right ENDS-->
                                </div><!--box ENDS -->
                            </form>
                        </div><!-- box ENDS-->
                        <?php 
                         function update_cart(){
                            global $con;
                            if(isset($POST['update'])){
                                foreach ($_POST['remove'] as $remove_id) {
                                    $delete_product="delete from cart where p_id='$remove_id'";
                                    $run_del=mysqli_query($con,$delete_product);
                                    if ($run_del) {
                                        echo "<script>window.open('cart.php','_self')</script>";
                                    }
                                }
                            }
                         }

                         echo @$up_cart=update_cart();
                         
                        ?>
                        <div id="row same-height-row"><!--row same-height-row STARTS-->
                            <div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6 STARTS-->
                                <div class="box same-height headline"><!--box same-height headline STARTS-->
                                    <h3 class="text-center">You Also Like These Products</h3>
                                </div><!--box same-height headline ENDS-->
                            </div><!--col-md-3 col-sm-6 ENDS-->
                            <div class="center-responsive col-md-3"><!--center-responsive col-md-3 STARTS-->
                                <div class=" product same-height"><!--product same-height STARTS-->
                                    <a href="">
                                        <img src="admin_area/product_images/Kids shoes1.png" class="img-responsive">
                                    </a>
                                    <div class="text"><!--text STARTS-->
                                        <h3><a href="details.php">Puma Shoes</a></h3>
                                        <p class="price">INR 799</p>
                                    </div><!--text ENDS-->
                                </div><!--product same-height ENDS-->
                            </div><!--center-responsive col-md-3 ENDS-->
                            <div class="center-responsive col-md-3"><!--center-responsive col-md-3 STARTS-->
                                <div class=" product same-height"><!--product same-height STARTS-->
                                    <a href="">
                                        <img src="admin_area/product_images/Earphones1.png" class="img-responsive">
                                    </a>
                                    <div class="text"><!--text STARTS-->
                                        <h3><a href="details.php">Shenniser Pods</a></h3>
                                        <p class="price">INR 3499</p>
                                    </div><!--text ENDS-->
                                </div><!--product same-height ENDS-->
                            </div><!--center-responsive col-md-3 ENDS-->
                            <div class="center-responsive col-md-3"><!--center-responsive col-md-3 STARTS-->
                                <div class=" product same-height"><!--product same-height STARTS-->
                                    <a href="">
                                        <img src="admin_area/product_images/Airdopes1.png" class="img-responsive">
                                    </a>
                                    <div class="text"><!--text STARTS-->
                                        <h3><a href="details.php">Boat Airdopes</a></h3>
                                        <p class="price">INR 2499</p>
                                    </div><!--text ENDS-->
                                </div><!--product same-height ENDS-->
                            </div><!--center-responsive col-md-3 ENDS-->
                        </div><!--row same-height-row ENDS-->
                    </div><!--col-md-9 ENDS-->
                    <div class="col-md-3"><!--col-md-3 START-->
                      <div class="box" id="order-summary">
                        <div class="box-header">
                          <h3>Order Summary</h3>
                        </div>
                        <p class="text-muted">
                          Shipping and additional costs are calculated based on the values you have entered.
                        </p>
                        <div class="table-responsive">
                          <table class="table">
                            <tbody>
                              <tr>
                                <td>Order Subtotal</td>
                                <th>
                                  <?php echo $total  ?>
                                </th>
                              </tr>
                              <tr>
                                <td>
                                  Shipping and Handling
                                </td>
                                <td>
                                  Free
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  Tax
                                </td>
                                <td>
                                NIL
                                </td>
                              </tr>
                              <tr class="total">
                                <td>
                                  Total
                                </td>
                                <th>
                                  <?php echo $total;  ?>
                                </th>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div><!--col-md-3 ENDS-->
                </div><!--Container End-->
            </div><!--Content End-->
        </div><!--navbar navbar-default ENDS-->
        <!--footer start-->
        <?php include("includes/footer.php") ?>
        <!--footer end-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>
</html>
