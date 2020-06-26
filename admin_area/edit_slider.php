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
<?php
	if(isset($_GET['edit_slide']))
	{
		$edit_id=$_GET['edit_slide'];

		$edit_slide="select * from slider where id='$edit_id'";

		$run_edit=mysqli_query($conn,$edit_slide);

		$row_edit=mysqli_fetch_array($run_edit);

		$slide_id=$row_edit['id'];
		$slide_name=$row_edit['slider_name'];
		$slide_image=$row_edit['slider_image'];




	}
?>
<div class="row"><!--1 row start-->
	<div class="col-lg-12"><!--col-lg-12 start -->
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i> Dashboard / Edit Slide
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
					<i class="fa fa-money fa-fw"></i> Edit Slide
				</h3>
			</div>		<!---panel-heading End----->

			<div class="panel-body"><!---panel-body start----->
				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					<div class="form-group"><!--form-group Start-->
						<label class="col-md-3 control-label">
							Slide Name
						</label>
						<div class="col-md-6">
							<input type="text" name="slide_name" class="form-control" value="<?php echo $slide_name ;?>">
						</div>
					</div><!--form-group End-->

					<div class="form-group"><!--form-group Start-->
						<label class="col-md-3 control-label">
							 Slide Image
						</label>
						<div class="col-md-6">
							<input type="file" name="slide_image" class="form-control">
							<br>
							<img src="slider_images/<?php echo $slide_image;?>" width="70" height="70" class="img-responsive">
						</div>
					</div><!--form-group End-->

					<div class="form-group"><!--form-group Start-->
						<label class="col-md-3 control-label">
						</label>
						<div class="col-md-6">
							<input type="submit" name="update" value="update Now" class="btn btn-primary  form-control"> 
						</div>
					</div><!--form-group End-->
				</form>
			</div>
	</div><!--col-lg-12 End-->
</div><!--2 row end--> 
<?php 
if(isset($_POST['update']))
{
	$slide_name=$_POST['slide_name'];
	$slide_image=$_FILES['slide_image']['name'];

	$temp_name=$_FILES['slide_image']['tmp_name'];//slide_name ke jagh slide image

	move_uploaded_file($temp_name,"slider_images/$slide_image");

	$update_slide="update slider set slider_name='$slide_name',slider_image='$slide_image' where id='$slide_id'";

	$run_slide=mysqli_query($conn,$update_slide);

	if($run_slide)
	{
		echo "<script>
				alert('One Slide has been Updated');
			</script>";

		echo "<script>
				window.open('index.php?view_slider','_self');
			</script>";	
	}
}
?>
<?php } ?>
<!--image update ka code sahi h or search image ka v-->