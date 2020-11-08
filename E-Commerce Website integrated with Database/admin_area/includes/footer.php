<html>
    <body>
        <div id="footer"><!--footer start-->
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6 start -->->
                        <h4>Pages</h4>
                        <ul>
                            <li>
                                <a href="cart.php"> Shopping Cart</a>
                            </li>
                            <li>
                                <a href="contact.php">Contact Us</a>
                            </li>
                            <li>
                                <a href="shop.php">Shop</a>
                            </li>
                            <li>
                                <a href="checkout.php">My Account</a>
                            </li>
                        </ul>
                        <hr />
                        <h4>User Section</h4>
                        <ul>
                            <li>
                                <a href="checkout.php">Login</a>
                            </li>
                            <li>
                                <a href="customer_registration.php">Register</a>
                            </li>
                        </ul>
                        <hr class="hidden-md hidden-lg hidde-sm">
                    </div><!--col-md-3 col-sm-6 end -->
                    <div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6 start-->
                        <h4>Top Product Categories</h4>
                        <ul>
                            <?php
                                $get_p_cats="select * from product_categories";
                                $run_p_cats=mysqli_query($con,$get_p_cats);
                                while($row_p_cat=mysqli_fetch_array($row_p_cats)){
                                    $p_cat_id=$row_p_cat['p_cat_id'];
                                    $p_cat_title=$row_p_cat['p_cat_title'];
                                    echo "<li><a href='shop.php?p_cat_id=$p_cat_id'>$p_cat_title</a></li>";
                                }
                            ?>
                        </ul>
                        <hr class="hidden-md hidden-lg" />
                    </div><!--col-md-3 col-sm-6 end-->
                    <div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6 start-->
                        <h4>Where to find us</h4>
                        <p >
                        <strong>Wecare.com</strong>
                        <br />Katpadi
                        <br />Vellore
                        <br />Tamil Nadu
                        <br />techtitans.vit@gmail.com
                        <br />+91 1234567890
                        </p>
                        <a href="contact.php">Go to contact us page</a>
                        <hr class="hidden-mg hiden-lg" />
                    </div><!--col-md-3 col-sm-6 end-->
                    <div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6 start-->
                        <h4>Get the news</h4>
                        <p class="text-muted">
                            Visit our site for exciting offers
                        </p>
                        <form action="" method="post">
                            <div class="input-group">
                                <input type="text" name="e-mail" class="form-control" />
                                <span class="input-group-btn"><input type="submit" class="btn btn-default"  value="visit"/></span>
                            </div>
                        </form>
                        <hr />
                        <h4>Stay in touch</h4>
                        <p class="social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-envelope"></i></a>
                        </p>
                    </div><!--col-md-3 col-sm-6 end-->
                </div>
            </div>
        </div><!--footer end-->
        <div id="copyright"><!--copyright start-->
            <div class="container">
                <div class="col-md-6">
                    <p class="pull-left">
                        &copy; 2020 Tech Titans
                    </p>
                </div>
                <div class="col-md-6">
                    <p class="pull-right">
                        Template By: <a href="www.wecare.com">WeCare.com</a>
                    </p>
                </div>
            </div>
        </div><!--copyright end-->
    </body>
</html>
