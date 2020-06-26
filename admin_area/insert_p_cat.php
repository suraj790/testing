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
				<i class="fa fa-dashboard"></i> Dashboard /Insert Products Category
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
				<form class="form-horizontal" action="" method="post">
					<div class="form-group"><!--form-group Start-->
						<label class="col-md-3 control-label">
							Product Category Title
						</label>
						<div class="col-md-6">
							<input type="text" name="p_cat_title" class="form-control">
						</div>
					</div><!--form-group End-->

					<div class="form-group"><!--form-group Start-->
						<label class="col-md-3 control-label">
							Product Category Description
						</label>
						<div class="col-md-6">
							<textarea type="text" name="p_cat_desc" class="form-control">
								
							</textarea>  
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
		$p_cat_title=$_POST['p_cat_title'];
		$p_cat_desc=$_POST['p_cat_desc'];

		$insert_p_cat="insert into product_category(p_cat_title,p_cat_desc)values('$p_cat_title','$p_cat_desc')";
		$run_p_cat=mysqli_query($conn,$insert_p_cat);

		if($run_p_cat)
		{
			echo "<script>alert('New Product Category has been Inserted')</script>";
			echo "<script>window.open('index.php?view_p_cats','_self')
				</script>";
		}

	}
?>
<?php } ?>