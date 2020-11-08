<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{
?>
<?php
    if(isset($_GET['edit_slide'])){
        $edit_id = $_GET['edit_slide'];
        $edit_slider = "select * from slider where id='$edit_id'";
        $run_slider = mysqli_query($con,$edit_slider);
        $row_slider = mysqli_fetch_array($run_slider);
        $slider_id = $row_slider['id'];
        $slider_name = $row_slider['slider_name'];
        $slider_image = $row_slider['slider_image'];
    }
?>
<br>
<br>
<br>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Edit Slider
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Edit Slider
                </h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Slider Name</label>
                        <div class="col-md-6">
                            <input type="text" name="slider_name" class="form-control" value="<?php echo $slider_name; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Slider Image</label>
                        <div class="col-md-6">
                            <input type="file" name="slider_image" class="form-control">
                            <br>
                            <img src="slider_images/<?php echo $slider_image; ?>" width="350" height="300">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="update" value="Update Category" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    if(isset($_POST['update'])){
        $slider_name = $_POST['slider_name'];
        $slider_image = $_FILES['slider_image']['name'];
        $temp_name = $_FILES['slider_image']['tmp_name'];
        move_uploaded_file($temp_name,"slider_images/$slider_image");
        $update_slider = "update slider set slider_name='$slider_name', slider_image='$slider_image' where id='$slider_id'";
        $run_slider = mysqli_query($con,$update_slider);
        if($run_slider){
            echo "<script>alert('Slider Updated Successfully')</script>";
            echo "<script>window.open('index.php?view_slider','_self')</script>";
        }
    }
?>
<?php } ?>