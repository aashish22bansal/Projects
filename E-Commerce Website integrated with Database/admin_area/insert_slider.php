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
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Dashboard / Insert Slider
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-money fa-fw"></i> Insert Slider
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Slider Name: </label>
                                    <div class="col-md-6">
                                        <input type="text" name="slider_name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Slider Image: </label>
                                    <div class="col-md-6">
                                        <input type="file" name="slider_image" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input type="submit" name="submit" value="Insert Slider" class="btn btn-primary form-control">
                                    </div>
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
<?php
    if(isset($_POST['submit'])){
        $slider_name = $_POST['slider_name'];
        $slider_image = $_FILES['slider_image']['name'];
        $temp_name = $_FILES['slider_image']['tmp_name'];
        $view_slides = "select * from slider";
        $view_run_slides = mysqli_query($con,$view_slides);
        $count = mysqli_num_rows($view_run_slides);
        if($count<5){
            move_uploaded_file($temp_name,"slider_images/$slider_image");
            $insert_slide = "insert into slider(slider_name,slider_image) values('$slider_name','$slider_image')";
            $run_slide = mysqli_query($con,$insert_slide);
            echo "<script>alert('New Slider has been Inserted.')</script>";
            echo "<script>window.open('index.php?view_slider','_self')</script>";
        }
        else{
            echo "<script>alert('You have 4 Sliders already!')</script>";
        }
    }
?>
<?php } ?>