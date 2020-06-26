<!doctype html>

<?php
	include('includes/dp.php');
	
    /*-------------------------------- HTML TO PHP TRANSFER CODE--------------------------*/
	
	$customer_email=$_SESSION['customer_email'];

	$get_customer="select * from customers where customer_email='$customer_email'";
	$run_cust=mysqli_query($conn,$get_customer);
	$row_cust=mysqli_fetch_array($run_cust);
	$customer_id=$row_cust['customer_id'];
	$customer_name=$row_cust['customer_name'];
	$customer_gen=$row_cust['customer_gen'];
	$customer_email=$row_cust['customer_email'];
	$customer_country=$row_cust['customer_country'];
	$customer_city=$row_cust['customer_city'];
	$customer_contact=$row_cust['customer_contact'];
	$customer_address=$row_cust['customer_address'];

	$customer_image=$row_cust['customer_image'];
?>
<?php
		$update_id=$customer_id;
		$c_name1=$_REQUEST['c_name'];
		$customer_gen1=$_REQUEST['c_gen'];
		$c_email1=$_REQUEST['c_email'];
		$c_country1=$_REQUEST['c_country'];
		$c_city1=$_REQUEST['c_city'];
		$c_contact1=$_REQUEST['c_number'];
		$c_address1=$_REQUEST['c_address'];


		$c_image1=$_FILES['c_image']['name'];
		$c_image_tmp1=$_FILES['c_image']['tmp_name'];

		move_uploaded_file($c_image_tmp1,"customer_images/$c_image1");
		//photo issue h



	if(isset($_REQUEST['update']))  
	{
$update_customer="update customers set customer_name='$c_name1',customer_gen='$customer_gen1',customer_email='$c_email1',customer_country='$c_country1',customer_city='$c_city1',customer_contact='$c_contact1',customer_address='$c_address1',customer_image='$c_image1' where customer_id='$update_id'";

			
			if($conn->query($update_customer)===TRUE)
			  {
			    echo "Record updated";
			    echo "<script>alert('Your details updated.')</script>";
				echo "<script>window.open('../logout.php','_self')</script>";
			  }  
			  else
			  {
			    echo "error update".$conn->error;
			  }
	}		
?>
<html>
   <head>
      <title>Codershelpline Code for display html value</title>
	      	<script type="text/javascript">
				function hello()
				{
					alert("hi");
				}
			</script>
   </head>
   <body>

<div class="box"> 
	<center>
		<h1>Edit Account</h1>
	</center>

			<form action="#" method="post" enctype="multipart/form-data" onsubmit="return validation()">

						<div class="form-group">
							<label>Customer Name</label>
							<input type="text" name="c_name" required="" class="form-control" value="<?php echo $customer_name; ?>" id="c_name2">
							<span id="" class="text-danger font-weight-bold"></span>
						</div>

						<div class="form-group">

							<label>Gender</label>
							<div class="form-group">
			<?php											
				if($customer_gen==="Male")
				{
				   $Gen1="checked";
				}	
				if($customer_gen==="Female")
				{
				   $Gen2="checked";
				}
				if($customer_gen==="Other")
				{
				   $Gen3="checked";
				}
			?>				  
<input type="radio" name="c_gen" required="" id="c_genM" class="radio-inline" value="Male" <?php echo $Gen1;?>>  <label>Male</label>
<input type="radio" name="c_gen" required="" id="c_genF" class="radio-inline" value="Female"<?php echo $Gen2;?>>  <label>Female</label>
<input type="radio" name="c_gen" required="" id="c_genO" class="radio-inline" value="Other"<?php echo $Gen3;?>> <label>Other</label>
							</div>
							
						</div>

						<div class="form-group">
							<label>Contact Number</label>
							<input type="text" name="c_number" class="form-control" value="<?php echo $customer_contact;  ?>">
							<span id="" class="text-danger font-weight-bold"></span>
						</div>

						<div class="form-group">
							<label>Customer E-mail</label>
							<input type="text" name="c_email"  class="form-control" value="<?php echo $customer_email;  ?>">
							<span id="" class="text-danger font-weight-bold"></span>
						</div>


						<div class="form-group">
							<label>Customer Images</label>
							<input type="file" name="c_image" class="form-control">
							<br>
							<img src="customer_images/<?php echo $customer_image;  ?>" class="img-responsive" height="100" width="100">
						</div>

						<div class="form-group">
							<label>Customer Password</label>
							<input type="Password" name="c_password" required="" class="form-control" id="">
							<span id="" class="text-danger font-weight-bold"></span>
						</div>


						<div class="form-group">
							<label>Address</label>
							<textarea type="text" name="c_address" required="" class="form-control" rows="5" cols="10">
								<?php echo $customer_address;  ?>
							</textarea>
							<span id="" class="text-danger font-weight-bold"></span>
						</div>


						<div class="form-group">
							<label>City</label>
							<input type="text" name="c_city" class="form-control" value="<?php echo $customer_city; ?>">
							<span id="" class="text-danger font-weight-bold"></span>							
						</div>


						<div class="form-group">
							<label>Country</label>
							<input type="text" name="c_country" id="" class="form-control" value="<?php	echo $customer_country;  ?>"> 
							<span id="" class="text-danger font-weight-bold"></span>
						</div>

						

						

						

						

						<div class="text-center row">
							<div class="col-md-3"></div>
							<button type="submit" name="update" class="btn btn-primary col-md-6"  value="update" style="padding: 10px;font-weight: bold;font-size: 20px;">
								<i class="fa fa-user-md">  Upadte now</i>
							</button>
							<div class="col-md-3"></div>
						</div>
					</form>
					
		</div>
	</body>
</html>
