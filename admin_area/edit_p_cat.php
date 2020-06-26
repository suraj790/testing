<?php
	
	if(!isset($_SESSION['admin_email']))
	{
		echo "<script>window.open('login.php','_self')</script>";
	}
	else
	{

?>
<?php
	if(isset($_GET['edit_p_cat']))
	{
		$edit_p_cat_id=$_GET['edit_p_cat'];

		$edit_p_cat_query="select * from product_category where p_cat_id='$edit_p_cat_id'";

		$run_edit=mysqli_query($conn,$edit_p_cat_query);

		$row_edit=mysqli_fetch_array($run_edit);

		$p_cat_id=$row_edit['p_cat_id'];
		$p_cat_title=$row_edit['p_cat_title'];
		$p_cat_desc=$row_edit['p_cat_desc'];
		

	}
?>
<div class="row"><!--1 row start-->
	<div class="col-lg-12"><!--1 col-lg-12 start-->
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i> Dashboard / Edit Product Category
			</li>
		</ol>
	</div><!--1 col-lg-12 end-->
</div><!--1 row End-->

<div class="row"><!--2 row start-->
	<div class="col-lg-12"><!--col-lg-12 start -->
		<div class="panel panel-default"><!----panel panel-default
		 Start------>
			<div class="panel-heading"><!---panel-heading start----->
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> Edit Product Category
				</h3>
			</div>		<!---panel-heading End----->

			<div class="panel-body"><!---panel-body start----->
				<form class="form-horizontal" action="" method="post">
					<div class="form-group"><!--form-group Start-->
						<label class="col-md-3 control-label">
							Product Category Title
						</label>
						<div class="col-md-6">
							<input type="text" name="p_cat_title1" class="form-control" value="<?php echo $p_cat_title ;?>">
						</div>
					</div><!--form-group End-->

					<div class="form-group"><!--form-group Start-->
						<label class="col-md-3 control-label">
							Product Category Description
						</label>
						<div class="col-md-6">
							<textarea type="text" name="p_cat_desc1" class="form-control">
								<?php echo $p_cat_desc;?>
							</textarea>
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
</div>

<?php
	if(isset($_POST['update']))
	{
		$p_cat_title=$_POST['p_cat_title1'];
		$p_cat_desc=$_POST['p_cat_desc1'];

		$update_p_cat="update product_category set p_cat_title='$p_cat_title',p_cat_desc='$p_cat_desc' where p_cat_id='$edit_p_cat_id'";
		

		$run_p_cat=mysqli_query($conn,$update_p_cat);
		if($run_p_cat)
		{
			echo "<script>alert('Product Category has been upadated')
				</script>";

			echo "<script>window.open('index.php?view_product_cat','_self')
				</script>";
		}

		
	}
?>


<?php } ?>