<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{
?>
<br>
<br>
<br>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Customers
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> View Customers
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-stripped">
                        <thead>
                            <tr>
                                <th>Customer ID</th>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Customer Image</th>
                                <th>Customer Country</th>
                                <th>Customer City</th>
                                <th>Customer Contact</th>
                                <th>Customer Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                                $i = 0;
                                $get_customer = "select * from customers";
                                $run_customer = mysqli_query($con,$get_customer);
                                while($row_customer = mysqli_fetch_array($run_customer)){
                                    $customer_id = $row_customer['customer_id'];
                                    $customer_name = $row_customer['customer_name'];
                                    $customer_email = $row_customer['customer_email'];
                                    $customer_image = $row_customer['customer_image'];
                                    $customer_country = $row_customer['customer_country'];
                                    $customer_city = $row_customer['customer_city'];
                                    $customer_contact = $row_customer['customer_contact'];
                                    $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $customer_name; ?></td>
                                <td><?php echo $customer_email; ?></td>
                                <td><img src="../customer/customer_images/<?php echo $customer_image; ?>" width="60" height="60"></td>
                                <td><?php echo $customer_country; ?></td>
                                <td><?php echo $customer_city; ?></td>
                                <td><?php echo $customer_contact; ?></td>
                                <td>
                                    <a href="index.php?customer_delete=<?php echo $customer_id; ?>">
                                        <i class="fa fa-trash-o"></i> Delete
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>