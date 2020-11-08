<?php
	$customer_email = $_SESSION['customer_email'];
	$get_customer 	= "select * from customers where customer_email = '$customer_email'";
	$run_customer 	= mysqli_query($con,$get_customer);
	$row_customer 	= mysqli_fetch_array($run_customer);
	$customer_id 	= $row_customer['customer_id'];
	$customer_name 	= $row_customer['customer_name'];
	$customer_email = $row_customer['customer_email'];
	$customer_country=$row_customer['customer_country'];
	$customer_city 	= $row_customer['customer_city'];
	$customer_contact=$row_customer['customer_contact'];
	$customer_address=$row_customer['customer_address'];
	$customer_image = $row_customer['customer_image'];
	$customer_ip	= $row_customer['customer_ip'];
?>
<div class="box">
	<center>
		<h1>Edit Your Account</h1>
	</center>
	<form method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label>Customer Name</label>
			<input type="text" name="c_name" value="<?php echo $customer_name; ?>" class="form-control" required="">
		</div>
		<div class="form-group">
			<label>Customer Email</label>
			<input type="text" name="c_email" value="<?php echo $customer_email; ?>" class="form-control" required="">
		</div>
		<div class="form-group">
			<label>Customer Country</label>
			<input type="text" name="c_country" value="<?php echo $customer_country; ?>" class="form-control" required="">
		</div>
		<div class="form-group">
			<label>Customer City</label>
			<input type="text" name="c_city" value="<?php echo $customer_city; ?>" class="form-control" required="">
		</div>
		<div class="form-group">
			<label>Contact Number</label>
			<input type="text" name="c_number" value="<?php echo $customer_contact; ?>" class="form-control" required="">
		</div>
		<div class="form-group">
			<label>Customer Address</label>
			<input type="text" name="c_address" value="<?php echo $customer_address; ?>" class="form-control" required="">
		</div>
		<div class="form-group">
			<label>Customer Image</label>
			<input type="file" name="c_Image" class="form-control" required>
			<img src="customer_images/<?php echo $customer_image; ?>" class="img-responsive" height="100" width="100">
		</div>
		<div class="text-center">
			<button class="btn btn-primary" name="update">
				Update Now
			</button>
		</div>
	</form>
</div>

<?php
	if(isset($_POST['update'])){
		$c_Image = "";
		$c_Image_tmp = "";
		$update_id 	= $customer_id;
		$c_name 	= $_POST['c_name'];
		$c_email 	= $_POST['c_email'];
		$c_country 	= $_POST['c_country'];
		$c_city 	= $_POST['c_city'];
		$c_contact 	= $_POST['c_number'];
		$c_address 	= $_POST['c_address'];
		$c_Image 	= $_FILES['c_Image']['name'];
		$c_Image_tmp= $_FILES['c_Image']['tmp_name'];

		move_uploaded_file($c_Image_tmp,"customer_images/$c_Image");
		$update_customer = "update customers set customer_name='$c_name', customer_email='$c_email', customer_country='$c_country', customer_city='$c_city', customer_contact='$c_contact', customer_address='$c_address', customer_image='$c_Image' where customer_id='$customer_id'";
		
		$run_customer = mysqli_query($con,$update_customer);
		if($run_customer){
			echo "<script>alert('Your details updated.')</script>";
			echo "<script>window.open('my_account.php?edit_account','_self')</script>";
		}
	}
?>