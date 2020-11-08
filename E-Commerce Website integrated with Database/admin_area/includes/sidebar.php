<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}else{

?>


<nav class="navbar navbar-inverse navbar-fixed-top" style="background: black">
    <div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-coollapse">
                <span class="sr-only">
                    Toggle Navigation
                </span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php?dashboard" class="navbar-brand">Admin Panel </a>
        </div>
        <!--nav navbar-right top-nav start-->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-user"></i> <?php echo  $admin_name ?>
                </a>
            </li>
        </ul>
        <!--nav navbar-right top-nav end-->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav sidebar-nav">
                <li>
                    <a href="index.php?dashboard">
                        <i class="fa fa-fw fa-dashboard"></i> Dashboard
                    </a>
                </li>
                <li><!--Start Here-->
                    <a href="#" data-toggle="collapse" data-target="#products">
                        <i class="fa fa-fw fa-table"></i> Product
                    </a>
                    <i class="fa fa-fw fa-caret-down"></i>
                    <ul id="products" class="collapse">
                        <li>
                            <a href="index.php?insert_product"> Insert Product</a>
                        </li>
                        <li>
                            <a href="index.php?view_product"> View Product</a>
                        </li>
                    </ul>
                </li><!--End Here-->
                <li><!--Start Here-->
                    <a href="#" data-toggle="collapse" data-target="#product_cat">
                        <i class="fa fa-fw fa-table"></i> Product Categories
                    </a>
                    <i class="fa fa-fw fa-caret-down"></i>
                    <ul id="product_cat" class="collapse">
                        <li>
                            <a href="index.php?insert_product_cat">Insert Product Categories</a>
                        </li>
                        <li>
                            <a href="index.php?view_product_cat">View Product Categories</a>
                        </li>
                    </ul>
                </li><!--End Here-->
                <li><!--Start Here-->
                    <a href="#" data-toggle="collapse" data-target="#category">
                        <i class="fa fa-fw fa-table"></i> Categories
                    </a>
                    <i class="fa fa-fw fa-caret-down"></i>
                    <ul id="category" class="collapse">
                        <li>
                            <a href="index.php?insert_categories">Insert Categories</a>
                        </li>
                        <li>
                            <a href="index.php?view_categories">View Categories</a>
                        </li>
                    </ul>
                </li><!--End Here-->
                <li><!--Start Here-->
                    <a href="#" data-toggle="collapse" data-target="#slider">
                        <i class="fa fa-fw fa-table"></i> Slider
                    </a>
                    <i class="fa fa-fw fa-caret-down"></i>
                    <ul id="slider" class="collapse">
                        <li>
                            <a href="index.php?insert_slider">Insert Slider</a>
                        </li>
                        <li>
                            <a href="index.php?view_slider">View Slider</a>
                        </li>
                    </ul>
                </li><!--End Here-->
                <li>
                    <a href="index.php?view_customer">
                        <i class="fa fa-fw fa-edit"></i> View Customer
                    </a>
                </li>
                <li>
                    <a href="index.php?view_order">
                        <i class="fa fa-fw fa-list"></i> View Order
                    </a>
                </li>
                <li>
                    <a href="index.php?view_payments">
                        <i class="fa fa-fw fa-pencil"></i> View Payments
                    </a>
                </li>
                <li><!--Start Here-->
                    <a href="#" data-toggle="collapse" data-target="#users">
                        <i class="fa fa-fw fa-table"></i> Users
                    </a>
                    <i class="fa fa-fw fa-caret-down"></i>
                    <ul id="users" class="collapse">
                        <li>
                            <a href="index.php?insert_user">Insert User</a>
                        </li>
                        <li>
                            <a href="index.php?view_user">View Users</a>
                        </li>
                        <li>
                            <a href="index.php?user_profile">Edit Profile</a>
                        </li>
                    </ul>
                </li><!--End Here-->
                <li>
                    <a href="logout.php">
                        <i class="fa fa-fw fa-power-off"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<?php } ?>