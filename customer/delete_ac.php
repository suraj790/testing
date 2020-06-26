<?php
	include('includes/db.php');
?>
<?php
	$c_email=$_SESSION['customer_email'];
	
	if(isset($_REQUEST['btndelete']))
	{
		$delet_q="delete from customers where customer_email='$c_email'";
		if($conn->query($delet_q)===TRUE) 
		{
			session_destroy();
			echo "<script>alert('Your account has been deleted')</script>";
			echo "<script>window.open('../index.php','_self')</script>";
		}
			
	}
	if(isset($_REQUEST['no']))
	{
		echo "<script>alert('Good Decision')</script>";
		echo "<script>window.open('../index.php','_self')</script>";
	}
			
//are you sure add krna h

?>
<div class="box">
	<center>
		<h1>Do you really want to delete your Account</h1>
	
		<form action="" method="post">
			<input type="submit" name="btndelete" value="Yes, I Want to Delete" class="btn btn-danger">
			<input type="submit" name="no" value="No, I don't want" class="btn btn-primary">
		</form>
	</center>
</div>
