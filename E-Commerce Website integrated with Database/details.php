<?php
session_start();
  include("includes/db.php");
  include("functions/functions.php");
?>
<?php
    if (isset($_GET['pro_id'])) {
        $pro_id=$_GET['pro_id'];
        $get_product="select * from products where product_id='$pro_id' ";
        $run_product=mysqli_query($con,$get_product);
        $row_product=mysqli_fetch_array($run_product);
        $p_cat_id=$row_product['p_cat_id'];
        $p_title=$row_product['product_title'];
        $p_price=$row_product['product_price'];
        $p_desc=$row_product['product_desc'];
        $p_img1=$row_product['product_img1'];
        $p_img2=$row_product['product_img2'];
        $p_img3=$row_product['product_img3'];
        $get_p_cat="select * from product_categories where p_cat_id='$p_cat_id'";
        $run_p_cat=mysqli_query($con,$get_p_cat);
        $row_p_cat=mysqli_fetch_array($run_p_cat);
        $p_cat_id=$row_p_cat['p_cat_id'];
        $p_cat_title=$row_p_cat['p_cat_title'];
    }
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
                                if (!isset($_SESSION['customer_email'])) {
                                    echo "<a href='checkout.php'>Login</a>";
                                }else{
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
                            <li>
                                <a href="HOME_PAGE.php">Home</a>
                            </li>
                            <li class="active">
                                <a href="shop.php">Shop</a>
                            </li>
                            <li>
                                <?php
                                    if (!isset($_SESSION['customer_email'])) {
                                        echo "<a href='checkout.php'>Login</a>";
                                    }else{
                                        echo "<a href='customer/my_account.php?my_order'>My Account</a>";
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
        </div>
        <div id="content">
            <div class="container"><!--container-->
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="HOME_PAGE.php">Home</a></li>
                        <li>
                            Shop
                        </li>
                        <li>
                            <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title;?></a>
                        </li>
                        <li>
                            <?php echo $p_title;?>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3"><!--col-md-3 Start-->
                    <?php
                        include("includes/sidebar.php");
                    ?>
                </div><!--col-md-3 End-->
                <div class="col-md-9">
                    <div class="row" id="productmain"><!--row STARTS-->
                        <div class="col-sm-6"><!--col-sm-6 SLIDER STARTS-->
                            <div id="mainimage">
                                <div id="mycarousel" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicator">
                                        <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#mycarousel" data-slide-to="1"></li>
                                        <li data-target="#mycarousel" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner"><!--carousel-inner STARTS-->
                                        <div class="item active">
                                            <center>
                                                <img src="admin_area/product_images/<?php echo $p_img1;?>" class="img-responsive">
                                            </center>
                                        </div>
                                        <div class="item">
                                            <center>
                                                <img src="admin_area/product_images/<?php echo $p_img2;?>" class="img-responsive">
                                            </center>
                                        </div>
                                        <div class="item">
                                            <center>
                                                <img src="admin_area/product_images/<?php echo $p_img3;?>" class="img-responsive">
                                            </center>
                                        </div>
                                    </div><!--carousel-inner ENDS-->
                                    <a href="#mycarousel" class="left carousel-control" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a href="#mycarousel" class="right carousel-control" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div><!--col-sm-6 SLIDER ENDS-->
                        <div class="col-sm-6"><!--col-sm-6 STARTS-->
                            <div class="box"><!--box STARTS-->
                                <h1 class="text-center"><?php echo $p_title; ?></h1>
                                <?php
                                addcart();
                                ?>
                                <form action="details.php?add_cart=<?php echo $pro_id;?>" method="post" class="form-horizontal">
                                    <div class="form-group"><!--form-group STARTS-->
                                        <label class="col-md-5 control-label">Product Quantity</label>
                                        <div class="col-md-7"><!--col-md-7 STARTS-->
                                            <select name="product_qty" class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div><!--col-md-7 ENDS-->
                                    </div><!--form-group ENDS-->
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Product Size</label>
                                        <div class="col-md-7">
                                            <select name="product_size" class="form-control">
                                                <option>Select a size</option>
                                                <option>Small</option>
                                                <option>Medium</option>
                                                <option>Large</option>
                                                <option>Extra Large</option>
                                            </select>
                                        </div>
                                    </div>
                                    <p class="price">INR <?php echo $p_price;?></p>
                                    <p class="text-center buttons">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-shopping-cart"></i> Add to Cart
                                        </button>
                                    </p>
                                </form>
                            </div><!--box ENDS-->
                            <div class="col-xs-4">
                                <a href="#" class="thumb">
                                    <img src="admin_area/product_images/<?php echo $p_img1;?>" class="img-responsive">
                                </a>
                                <a href="#" class="thumb">
                                    <img src="admin_area/product_images/<?php echo $p_img2;?>" class="img-responsive">
                                </a>
                                <a href="#" class="thumb">
                                    <img src="admin_area/product_images/<?php echo $p_img3;?>" class="img-responsive">
                                </a>
                            </div>
                        </div><!--col-sm-6 ENDS-->
                    </div><!--row ENDS-->
                    <div class="box" id="details">
                        <h4>Product Details</h4>
                        <p><?php echo $p_desc;?></p>
                        <h4>Size</h4>
                        <ul>
                            <li>Small</li>
                            <li>Medium</li>
                            <li>Large</li>
                            <li>Extra Large</li>
                        </ul>
                    </div>
                    <div id="row same-height-row"><!--row same-height-row STARTS-->
                        <div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6 STARTS-->
                            <div class="box same-height headline"><!--box same-height headline STARTS-->
                                <h3 class="text-center">You Also Like These Products</h3>
                            </div><!--box same-height headline ENDS-->
                        </div><!--col-md-3 col-sm-6 ENDS-->
                        <?php
                        $get_product="select * from products order by 1 LIMIT 0,3";
                        $run_product=mysqli_query($con,$get_product);
                        while($row=mysqli_fetch_array( $run_product)){
                            $pro_id=$row['product_id'];
                            $product_title=$row['product_title'];
                            $product_img1=$row['product_img1'];
                            $product_price=$row['product_price'];
                            echo "
                            <div class='center-responsive col-md-3 col-sm-6'>
                                <div class='product same-height'>
                                    <a href='details.php?pro_id=$pro_id'>
                                    <img src='admin_area/product_images/$product_img1' class='img-responsive'></a>
                                    <div class='text'>
                                        <h3><a href='details.php?pro_id=$pro_id'>$product_title</a></h3>
                                        <p class='price'>$product_price</p>
                                    </div>
                                </div>
                            </div>
                            ";
                        }
                        ?>
                    </div><!--row same-height-row ENDS-->
                </div>
            </div><!--Contained End-->
        </div><!--Content End-->
        <!--footer start-->
        <?php include("includes/footer.php") ?>
        <!--footer end-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>
</html>
