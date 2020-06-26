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
				<i class="fa fa-dashboard"></i> Dashboard / View Products Categories
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
					<i class="fa fa-money fa-fw"></i> View Product Categories
				</h3>
			</div>		<!---panel-heading End----->

			<div class="panel-body"><!---panel-body start----->
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>Product Category Id</th>
								<th>Product Category Title</th>
								<th>Product Category Description</th>
								<th>Delete Category Category</th>
								<th>Edit Category Id</th>
							</tr>
						</thead>

						<tbody>
<?php 
	$i=0;
	$get_p_cats="select * from product_category";
	$run_p_cats=mysqli_query($conn,$get_p_cats);

	while($row_p_cat=mysqli_fetch_array($run_p_cats)) 
	{
		$p_cat_id=$row_p_cat['p_cat_id'];
		$p_cat_title=$row_p_cat['p_cat_title'];
		$p_cat_desc=$row_p_cat['p_cat_desc'];
		$i++;

?>							<tr>
								<td>
									<?php echo $i;?>
								</td>
								<td>
									<?php echo $p_cat_title;?>
								</td>
								<td width="300">
									<?php echo $p_cat_desc;?>
								</td>
								<td>
									<a href="index.php?delete_p_cat=<?php echo $p_cat_id?>">
										<i class="fa fa-trash-o"></i> Delete
									</a>
								</td>
								<td>
									<a href="index.php?edit_p_cat=<?php echo $p_cat_id?>">
										<i class="fa fa-pencil"></i>Edit
									</a>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>


				
			</div>	<!---panel-body End----->

	</div><!--col-lg-12 end -->
</div><!--2 row End-->

<?php } ?>