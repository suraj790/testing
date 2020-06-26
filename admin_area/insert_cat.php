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
				<i class="fa fa-dashboard"></i> Dashboard /Insert Category
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
					<i class="fa fa-money fa-fw"></i> Insert Category
				</h3>
			</div>		<!---panel-heading End----->

			<div class="panel-body"><!---panel-body start----->
				<form class="form-horizontal" action="" method="post">
					<div class="form-group"><!--form-group Start-->
						<label class="col-md-3 control-label">
							Category Title
						</label>
						<div class="col-md-6">
							<input type="text" name="cat_title" class="form-control">
						</div>
					</div><!--form-group End-->

					<div class="form-group"><!--form-group Start-->
						<label class="col-md-3 control-label">
							Category Description
						</label>
						<div class="col-md-6">
							<textarea type="text" name="cat_desc" class="form-control"> 
							</textarea> 
						</div>
					</div><!--form-group End-->

					<div class="form-group"><!--form-group Start-->
						<label class="col-md-3 control-label">
						</label>
						<div class="col-md-6">
							<input type="submit" name="submit" value="Insert Category" class="btn btn-primary  form-control"> 
						</div>
					</div><!--form-group End-->

				</form>
			</div><!---panel-body End----->
		</div><!----panel panel-default End------>
	</div><!--col-lg-12 End -->
</div><!--2 row End-->

<?php
	if(isset($_POST['submit']))
	{
		$cat_title=$_POST['cat_title'];
		$cat_desc=$_POST['cat_desc'];
		
		$insert_cat="insert into categories(cat_title,cat_desc) values ('$cat_title','$cat_desc')";
		$run_cat=mysqli_query($conn,$insert_cat);

		if($run_cat)
		{
			echo "<script>
					alert('New Category has been Inserted');
				</script>";

			echo "<script>
					window.open('index.php?view_categories','_self')
				</script>";
		}

	}
?>
<?php } ?>