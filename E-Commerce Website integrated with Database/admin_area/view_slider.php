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
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> Dashboard / View Slider
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-money fa-fw"></i> View Slider
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-stripped">
                                <thead>
                                    <tr>
                                        <th>Slider No.</th>
                                        <th>Slider ID</th>
                                        <th>Slider Name</th>
                                        <th>Slider Image</th>
                                        <th>Delete Slider</th>
                                        <th>Edit SLider</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 0;
                                        $get_slider = "select * from slider";
                                        $run_slider = mysqli_query($con,$get_slider);
                                        while($row_slider = mysqli_fetch_array($run_slider)){
                                            $slider_id = $row_slider['id'];
                                            $slider_name = $row_slider['slider_name'];
                                            $slider_image = $row_slider['slider_image'];
                                            $i++;
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $slider_id; ?></td>
                                        <td><?php echo $slider_name?></td>
                                        <td><img src="slider_images/<?php echo $slider_image; ?>" class="img-responsive"></td>
                                        <td>
                                            <a href="index.php?delete_slide=<?php echo $slider_id; ?>" class="pull-left">
                                                <i class="fa fa-trash-o"></i> Delete
                                            </a>
                                        </td>
                                        <td>
                                            <a href="index.php?edit_slide=<?php echo $slider_id; ?>" class="pull-right">
                                                <i class="fa fa-pencil"></i> Edit
                                            </a>
                                        </td>
                                    <?php } ?>
                                </tbody>
                            </table>
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
    </div>


<?php } ?>