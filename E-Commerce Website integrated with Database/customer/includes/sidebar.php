<div class="panel panel-default sidebar-menu">
    <div class="panel-heading"><!--Panel heading start-->
        <?php
            $session_customer = $_SESSION['customer_email'];
            $get_cust = "select * from customers where customer_email='$session_customer'";
            $run_customer = mysqli_query($con,$get_cust);
            $row_customers = mysqli_fetch_array($run_customer);
            $customer_image = $row_customers['customer_image'];
            $customer_name = $row_customers['customer_name'];
            if(!isset($_SESSION['customer_email'])){

            }
            else{
                echo "<center>
                        <img src='customer_images/$customer_image' class='img-responsive' />
                    </center>
                    <br />
                    <h3 align='center' class='panel-title'>Name: $customer_name</h3>
                ";
            }
        ?>
        
    </div><!--Panel heading end-->
    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked">
            <li class="<?php if(isset($_GET['my_order'])){echo "active";}?> ">
                <a href="my_account.php?my_order"><i class="fa fa-list"></i> My Order</a> <!--using get to catch the variable coming from url-->
            </li>
            <li class="<?php if(isset($_GET['pay_offline'])){echo "active";}?>">
                <a href="my_account.php?pay_offline"><i class="fa fa-bolt"></i> Pay Offline</a>
            </li>
            
            <li class="<?php if(isset($_GET['edit_account'])){echo "active";}?>">
                <a href="my_account.php?edit_account"><i class="fa fa-pencil"></i> Edit Account</a>
            </li>
            <li class="<?php if(isset($_GET['change_password'])){echo "active";}?>">
                <a href="my_account.php?change_password"><i class="fa fa-user"></i> Change Password</a>
            </li>
            <li class="<?php if(isset($_GET['delete_account'])){echo "active";}?>">
                <a href="my_account.php?delete_account"><i class="fa fa-trash-o"></i> Delete Account</a>
            </li>
        </ul>
    </div>
</div>
