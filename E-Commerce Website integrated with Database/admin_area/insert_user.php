<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{
?>
<br>
<br>
<br>
<div class="container">
    <div class="column1" style="with:21%"></div>
    <div class="column2" style="with:79%">
    <div id="page-wrapper">
    <div class="container-fluid" style="with:70%">
    <div class="container-fluid" style="with:70%">
    <div class="container-fluid" style="with:70%">
    <div class="container-fluid" style="with:70%">
    <div class="container-fluid" style="with:70%">
    <div class="container-fluid" style="with:70%">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i>Dashboard / Insert Administrator
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-money fa-fw"></i> Insert Administrator
                        </h3>
                    </div>
                    <br>
                    <div class="panel-body">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Admin Name</label>
                                <div class="col-md-6">
                                    <input type="text" name="admin_name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Admin Email</label>
                                <div class="col-md-6">
                                    <input type="text" name="admin_email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Admin Password</label>
                                <div class="col-md-6">
                                    <input type="text" name="admin_pass" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Admin Country</label>
                                <div class="col-md-6">
                                    <input type="text" name="admin_country" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Admin Job</label>
                                <div class="col-md-6">
                                    <input type="text" name="admin_job" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Admin Contact</label>
                                <div class="col-md-6">
                                    <input type="text" name="admin_contact" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Admin About</label>
                                <div class="col-md-6">
                                    <textarea type="text" name="admin_about" class="form-control">
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Admin Image</label>
                                <div class="col-md-6">
                                    <input type="file" name="admin_image" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-6">
                                    <input type="submit" name="submit" value="Submit Now" class="btn btn-primary form-control">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php
    if(isset($_POST['submit'])){
        $admin_name = $_POST['admin_name'];
        $admin_email = $_POST['admin_email'];
        $admin_pass = $_POST['admin_pass'];
        $admin_country = $_POST['admin_country'];
        $admin_job = $_POST['admin_job'];
        $admin_contact = $_POST['admin_contact'];
        $admin_about = $_POST['admin_about'];
        $admin_image = $_FILES['admin_image']['name'];
        $tmp_admin_name = $_FILES['admin_image']['tmp_name'];
        move_uploaded_file($tmp_admin_name,"admin_images/$admin_image");
        $insert_admin = "insert into admins(admin_name,admin_email,admin_pass,admin_image,admin_contact,admin_country,admin_job,admin_about) values('$admin_name','$admin_email','$admin_pass','$admin_image','$admin_contact','$admin_country','$admin_job','$admin_about')";
        $run_admin = mysqli_query($con,$insert_admin);
        if($run_admin){
            echo "<script>alert('New Admin Added.')</script>";
            echo "<script>window.open('index.php?view_users','_self')</script>";
        }
    }
?>
<?php } ?>