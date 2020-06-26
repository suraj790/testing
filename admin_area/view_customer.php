<?php
	if(!isset($_SESSION['admin_email']))
	{
		echo "<script>window.open('login.php','_self')</script>";
	}
	else
	{

?>

<div class="row"><!--1 row start-->
	<div class="col-lg-12"><!--col-lg-12 start -->
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i> Dashboard / View Customer
			</li>
		</ol>
		
	</div><!--col-lg-12 End -->
</div><!--1 row End-->

<div class="row"><!--2 row start-->
	<div class="col-lg-12"><!--col-lg-12 start -->
		<div class="panel panel-default"><!----panel panel-default
		 Start------>
			<div class="panel-heading"><!---panel-heading start----->
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> View Customers
				</h3>
			</div>		<!---panel-heading End----->

			<div class="panel-body"><!---panel-body start----->
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>Customer No</th>
								<th>Customer Name</th>
								<th>Customer Email</th>
								<th>Customer Image</th>
								<th>Customer Country</th>
								<th>Customer City</th>
								<th>Customer Address</th>
								<th>Customer Contact Number</th>
								<th>Customer Delete</th>
								<th>Customer Edit</th>

							</tr>
						</thead>

						<tbody>
<?php 
	$i=0;
	$get_cust="select * from customers";
	$run_cust=mysqli_query($conn,$get_cust);

	while($row_cat=mysqli_fetch_array($run_cust)) 
	{
		$c_id=$row_cat['customer_id'];
		$c_name=$row_cat['customer_name'];
		$c_email=$row_cat['customer_email'];
		$c_image=$row_cat['customer_image'];
		$c_country=$row_cat['customer_country'];
		$c_city=$row_cat['customer_city'];
		$c_contact=$row_cat['customer_contact'];
		$c_address=$row_cat['customer_address'];


		$i++;

?>							<tr>
								<td>
									<?php echo $i;?>
								</td>
								<td>
									<?php echo $c_name;?>
								</td>
								<td width="300">
									<?php echo $c_email;?>
								</td>
								<td>
									<img src="../customer/customer_images/<?php echo $c_image?>" width="60" height="60" class="img-responsive">
								</td>
								<td>
									<?php echo $c_country;?>
								</td>
								<td>
									<?php echo $c_city;?>
								</td>
								<td>
									<?php echo $c_address;?>
								</td>
								<td>
									<?php echo $c_contact;?>
								</td>
								
								<td>
									<a href="index.php?customer_delete=<?php echo $c_id;?>">
										<i class="fa fa-trash-o"></i>
										Delete
									</a>
								</td>
								<td>
									<a href="index.php?customer_edit=<?php echo $c_id;?>">
										<i class="fa fa-pencil"></i>Edit
									</a>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>

			</div>	<!---panel-body End----->
		</div><!----panel panel-default End------>
	</div><!--col-lg-12 End -->
	
</div><!--2 row End-->
<?php } ?>
