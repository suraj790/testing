<?php
	session_start();
	include('includes/db.php');
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
				<i class="fa fa-dashboard"></i> Dashboard /View Slides
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
					<i class="fa fa-money fa-fw"></i> Insert Product Category
				</h3>
			</div>		<!---panel-heading End----->

			<div class="panel-body"><!---panel-body start----->
				<?php
					$get_slides="select * from slider";
					$run_slides=mysqli_query($conn,$get_slides);

					while($row_slides=mysqli_fetch_array($run_slides))
					{
						$slide_id=$row_slides['id'];
						$slide_name=$row_slides['slider_name'];
						$slide_image=$row_slides['slider_image'];

				?>
				<div class="col-lg-3 col-md-3"><!---col-lg-3 col-md-3 start----->
					<div class="panel panel-primary"><!---panel panel-primary start----->
						<div class="panel-heading">
							<h3 class="panel-title" align="center">
								<?php echo $slide_name;?>
							</h3> 
						</div>

						<div class="panel-body"><!---panel-body start----->
							<img src="slider_images/<?php echo $slide_image;?>" class="img-responsive">
						</div>

						<div class="panel-footer" style="padding-bottom: 30px">
							<center>
								<a href="index.php?delete_slide=<?php echo $slide_id;?>" class="pull-left">
									<i class="fa fa-trash-o"></i> Delete
								</a>

								<a href="index.php?edit_slide=<?php echo $slide_id?>" class="pull-right">
									<i class="fa fa-pencil"></i> Edit
								</a>
							</center>
						</div>
					</div><!---panel panel-primary End----->

				</div><!---col-lg-3 col-md-3 End----->

			<?php } ?>
			</div><!---panel-body End----->

		</div><!----panel panel-default End------>
	</div><!--col-lg-12 End -->
</div><!--2 row start-->
<?php } ?>

<!--image wala code search wala isa pages se krna h-->