<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{
?>
<?php 
    if(isset($_SESSION['admin_email'])){
        $edit_admin_id = $_SESSION['admin_email'];
        $edit_admin_query = "select * from admins where admin_email='$edit_admin_id'";
        $run_admin_edit = mysqli_query($con,$edit_admin_query);
        $row_admin_edit = mysqli_fetch_array($run_admin_edit);
        $admin_id = $row_admin_edit['admin_id'];
        $admin_name = $row_admin_edit['admin_name'];
        $admin_email = $row_admin_edit['admin_email'];
        $admin_pass = $row_admin_edit['admin_pass'];
        $admin_image = $row_admin_edit['admin_image'];
        $admin_country = $row_admin_edit['admin_country'];
        $admin_job = $row_admin_edit['admin_job'];
        $admin_contact = $row_admin_edit['admin_contact'];
        $admin_about = $row_admin_edit['admin_about'];
    }
?>
<br>
<br>
<br>
<br>

<div class="row">
    <div class="col-lg-12">
        <div class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Dashboard / Edit Administrator
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col=lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Edit Administrator
                </h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Admin Name </label>
                        <div class="col-md-6">
                            <input type="text" name="admin_name" class="form-control" value="<?php echo $admin_name; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Admin Email </label>
                        <div class="col-md-6">
                            <input type="text" name="admin_email" class="form-control" value="<?php echo $admin_email; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Admin Password </label>
                        <div class="col-md-6">
                            <input type="text" name="admin_pass" class="form-control" value="<?php echo $admin_pass; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Admin Image </label>
                        <div class="col-md-6">
                            <input type="file" name="admin_image" class="form-control" required><br>
                            <img src="admin_images/<?php echo $admin_image; ?>" width="70" height="70">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Admin Country </label>
                        <div class="col-md-6">
                            <input type="text" name="admin_country" class="form-control" value="<?php echo $admin_country; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Admin Job </label>
                        <div class="col-md-6">
                            <input type="text" name="admin_job" class="form-control" value="<?php echo $admin_job; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Admin Contact </label>
                        <div class="col-md-6">
                            <input type="text" name="admin_contact" class="form-control" value="<?php echo $admin_contact; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Admin About </label>
                        <div class="col-md-6">
                            <input type="text" name="admin_about" class="form-control" value="<?php echo $admin_about; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="update" value="Update Now" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    if(isset($_POST['update'])){
        $update_id = $admin_id;
        $update_admin_name = $_POST['admin_name'];
        $update_admin_email = $_POST['admin_email'];
        $update_admin_pass = $_POST['admin_pass'];
        $update_admin_image_name = $_FILES['admin_image']['name'];
        $update_admin_image_tmp_name = $_FILES['admin_image']['tmp_name'];
        $update_admin_country = $_POST['admin_country'];
        $update_admin_job = $_POST['admin_job'];
        $update_admin_contact = $_POST['admin_contact'];
        $update_admin_about = $_POST['admin_about'];
        move_uploaded_file($update_admin_image_tmp_name,"admin_images/$update_admin_image_name");
        $update_admin = "update admins set admin_name='$admin_name', admin_name='$update_admin_name', admin_email='$update_admin_email', admin_pass='$update_admin_pass', admin_image='$update_admin_image_name', admin_contact='$update_admin_contact', admin_country='$update_admin_country', admin_job='$update_admin_job', admin_about='$update_admin_about'  where admin_id='$update_id'";
        $run_admin = mysqli_query($con,$update_admin);
        if($run_admin){
            echo "<script>alert('Admin has been Updated.')</script>";
            echo "<script>window.open('index.php?view_user','_self')</script>";
        }
    }
?>
<?php } ?>