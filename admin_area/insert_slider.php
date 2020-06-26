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
				<i class="fa fa-dashboard"></i> Dashboard /Insert Slider
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
					<i class="fa fa-money fa-fw"></i> Insert Slider
				</h3>
			</div>		<!---panel-heading End----->

			<div class="panel-body"><!---panel-body start----->
				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					<div class="form-group"><!--form-group Start-->
						<label class="col-md-3 control-label">
							Slide Name
						</label>
						<div class="col-md-6">
							<input type="text" name="slide_name" class="form-control">
						</div>
					</div><!--form-group End-->

					<div class="form-group"><!--form-group Start-->
						<label class="col-md-3 control-label">
							Slide Image
						</label>
						<div class="col-md-6">
							<input type="file" name="slide_image" class="form-control"> 
						</div>
					</div><!--form-group End-->

					<div class="form-group"><!--form-group Start-->
						<label class="col-md-3 control-label">
						</label>
						<div class="col-md-6">
							<input type="submit" name="submit" value="Submit Now" class="btn btn-primary  form-control"> 
						</div>
					</div><!--form-group End-->
					
				</form>
			</div>	<!---panel-body End----->
		</div><!----panel panel-default End------>
	</div><!--col-lg-12 End -->
	
</div><!--2 row End-->

<?php 
	if (isset($_POST['submit']))
	{
		$slide_name=$_POST['slide_name'];
		$slide_image=$_FILES['slide_image']['name'];

		$temp_name=$_FILES['slide_image']['tmp_name'];//slide_name ke jagh slide image

		$view_slides="select * from slider";

		$view_run_slides=mysqli_query($conn,$view_slides);

		$count=mysqli_num_rows($view_run_slides);


		if($count<4)
		{
			move_uploaded_file($temp_name,"slider_images/$slide_image");
			$insert_slide="insert into slider(slider_name,slider_image) values('$slide_name','$slide_image')";

			$run_slide=mysqli_query($conn,$insert_slide);

			echo "<script>alert('New Slide has been Inserted')</script>";

			echo "<script>
					window.open('index.php?view_slider','_self');
					</script>";

		}
		else
		{
			echo "<script>
					alert('You have already Insertd 4 slides')
				</script>";
		}

	}
?>


<?php } ?>
<!--image submit ka code sahi h-->