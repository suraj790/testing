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
				<i class="fa fa-dashboard"></i> Dashboard /View Categories
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
					<i class="fa fa-money fa-fw"></i> View Categories
				</h3>
			</div>		<!---panel-heading End----->

			<div class="panel-body"><!---panel-body start----->
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>Category Id</th>
								<th>Category Title</th>
								<th>Category Description</th>
								<th>Delete Category </th>
								<th>Edit Category</th>
							</tr>
						</thead>

						<tbody>
<?php 
	$i=0;
	$get_cats="select * from categories";
	$run_cats=mysqli_query($conn,$get_cats);

	while($row_cat=mysqli_fetch_array($run_cats)) 
	{
		$cat_id=$row_cat['cat_id'];
		$cat_title=$row_cat['cat_title'];
		$cat_desc=$row_cat['cat_desc'];
		$i++;

?>							<tr>
								<td>
									<?php echo $i;?>
								</td>
								<td>
									<?php echo $cat_title;?>
								</td>
								<td width="300">
									<?php echo $cat_desc;?>
								</td>
								<td>
									<a href="index.php?delete_cat=<?php echo $cat_id;?>">
										<i class="fa fa-trash-o"></i> Delete
									</a>
								</td>
								<td>
									<a href="index.php?edit_cat=<?php echo $cat_id;?>">
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