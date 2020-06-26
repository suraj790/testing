<?php
	
	if(!isset($_SESSION['admin_email']))
	{
		echo "<script>window.open('login.php','_self')</script>";
	}
	else
	{

?>
<?php 
	if(isset($_GET['user_delete']))
	{
		$delete_id=$_GET['user_delete'];
		$delete_user="delete from admins where admin_id='$delete_id'";

		$run_user=mysqli_query($conn,$delete_user);
		if($run_user)
		{
			echo "<script>alert('One User has been deleted')</script>";
			echo "<script>window.open('index.php?view_user','_self')
			</script>";

		}
	}
?>
<?php } ?>