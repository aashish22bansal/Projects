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
            <li>
                <i class="fa fa-dashboard"></i>Dashboard / View Administrators
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i>View Administrators
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Admin ID</th>
                                <th>Admin Name</th>
                                <th>Admin Email</th>
                                <th>Admin Image</th>
                                <th>Admin Country</th>
                                <th>Admin Job</th>
                                <th>Delete Admin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 0;
                                $get_admins = "select * from admins";
                                $run_admins = mysqli_query($con,$get_admins);
                                while($row_admins = mysqli_fetch_array($run_admins)){
                                    $admin_id = $row_admins['admin_id'];
                                    $admin_name = $row_admins['admin_name'];
                                    $admin_email = $row_admins['admin_email'];
                                    $admin_image = $row_admins['admin_image'];
                                    $admin_country = $row_admins['admin_country'];
                                    $admin_job = $row_admins['admin_job'];
                                    $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $admin_name; ?></td>
                                <td><?php echo $admin_email; ?></td>
                                <td><img src="admin_images/<?php echo $admin_image; ?>" width="60" height="60"></td>
                                <td><?php echo $admin_country; ?></td>
                                <td><?php echo $admin_job; ?></td>
                                <td>
                                    <a href="index.php?user_delete=<?php echo $admin_id; ?>">
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