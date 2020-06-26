<!doctype>

<?php
	if(isset($_REQUEST['update']))
	{
		$c_email=$_SESSION['customer_email'];
		$old_password=$_REQUEST['old_password'];
		$new_password=$_REQUEST['new_password'];
		$c_n_password=$_REQUEST['c_n_password'];
		$select_cust="select * from customers where customer_email='$c_email' AND customer_pass='$old_password'";
		$run_q=mysqli_query($conn,$select_cust);

		$check_old_pass=mysqli_num_rows($run_q);
		if($check_old_pass==0)
		{
			echo "<script>alert('Your Current password is not valid ..Try again')</script>";
			exit();
		}

		if($new_password!=$c_n_password)
		{
			echo "<script>alert('Your new password does not match with confirm password ')</script>";

			exit();
		}

		$update_q="update customers set customer_pass='$new_password' where customer_email='$c_email'";

			if($conn->query($update_q)===TRUE)
			  {
			   
			    echo "<script>alert('Your Password Changed.')</script>";
				echo "<script>window.open('my_account.php?my_order','_self')</script>";
			  }  
			  else
			  {
			    echo "error update".$conn->error;
			}		

	}

?>



<div class="box"> 
	<center>
		<h3>Change Your Password</h3>
	</center>
	<form action="" method="post"> 
	<div class="form-group">
		<label>Enter Current Password</label>
		<input type="password" name="old_password" class="form-control">
	</div>

	<div class="form-group">
		<label>Enter New Password</label>
		<input type="password" name="new_password" class="form-control">
	</div>

	<div class="form-group">
		<label>Confirm new Password</label>
		<input type="password" name="c_n_password" class="form-control">
	</div>

	<div class="text-center">
		<button type="submit" class="btn btn-primary btn-lg" name="update">Update Now</button>
	</div>
	</form>
</div>


