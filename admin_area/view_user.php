<?php
	if(!isset($_SESSION['admin_email']))
	{
		echo "<script>window.open('login.php','_self')</script>";
	}
	else
	{

?>

<div class="row"><!--1 row start-->
	<div class="col-lg-12"><!--1 col-lg-12 start-->
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i> Dashboard / View Users
			</li>
		</ol>
	</div><!--1 col-lg-12 end-->
</div><!--1 row End-->

<div class="row"><!--1 row start-->
	<div class="col-lg-12"><!--1 col-lg-12 start-->
		<h1 style="color: red">Warning: </h1>
		<marquee>
			<label style="color: red">
				<h2>
					Not Delete All Admin ,One Admin always Required for this website.
				</h2>
			</label>
		</marquee>
	</div><!--1 col-lg-12 end-->
</div><!--1 row End-->



<div class="row"><!--2 row start-->
	<div class="col-lg-12"><!--col-lg-12 start -->
		<div class="panel panel-default"><!----panel panel-default
		 Start------>
			<div class="panel-heading"><!---panel-heading start----->
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> View Users
				</h3>
			</div>		<!---panel-heading End----->

			<div class="panel-body"><!---panel-body start----->
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>User Name</th>
								<th>User Email</th>
								<th>User Image</th>
								<th>User Country</th>
								<th>User Job</th>
								<th>User About</th>

								<th>Delete User</th>
							</tr>
						</thead>

						<tbody>
<?php 
	
	$get_admin="select * from admins";
	$run_admin=mysqli_query($conn,$get_admin);

	while($row_admin=mysqli_fetch_array($run_admin)) 
	{
		$admin_id=$row_admin['admin_id'];
		$admin_name=$row_admin['admin_name'];
		$admin_email=$row_admin['admin_email'];
		$admin_image=$row_admin['admin_image'];
		$admin_country=$row_admin['admin_country'];
		$admin_job=$row_admin['admin_job'];
		$admin_about=$row_admin['admin_about'];
?>		
						<tr>
								<td>
									<?php echo $admin_name?>
								</td>
								<td>
									<?php echo $admin_email;?>
								</td>
								<td align="center">
									<img src="admin_images/<?php echo$admin_image?>" width="80" height="60" class="img-responsive">
								</td>
								<td>
									<?php echo $admin_country;?>
								</td>
								
								<td>
									<?php echo $admin_job;?>
								</td>
								<td>
									<?php echo $admin_about;?>
								</td>
								<td>
									<a href="index.php?user_delete=<?php echo $admin_id;?>">
										<i class="fa fa-trash-o"></i>
										Delete
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