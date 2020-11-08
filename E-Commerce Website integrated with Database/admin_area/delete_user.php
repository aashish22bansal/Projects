<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{
?>
<?php
    if(isset($_GET['user_delete'])){
        $delete_id = $_GET['user_delete'];
        $delete_admin = "delete from admins where id='$delete_id'";
        $run_delete = mysqli_query($con,$delete_admin);
        if($run_delete)
        {
            echo "<script>alert('Admin has been Deleted.')</script>";
            echo "<script>window.open('index.php?view_user','_self')</script>";
        }
?>
<?php } ?>