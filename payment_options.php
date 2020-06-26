<div class="box">
	<?php
		$session_email=$_SESSION['customer_email'];
		$select_customer="select * from customers where customer_email='$session_email'";
		$run_cust=mysqli_query($conn,$select_customer);
		$row_customer=mysqli_fetch_array($run_cust);
		$customer_id=$row_customer['customer_id']; //yeh pr email id ko unique krke lana h  ,or customer id ko remove krna h
	?>
	<h1 class="text-center">Payment Options</h1>
	<p class="lead text-center">
		<a href="order.php?c_ic=<?php echo $customer_id ?>">Pay Offline</a>
	</p>
	<center>
		<p class="lead">
			<a href="#">Pay with paypal
				<img src="images/images.jpg" height="270" width="500" class="img-responsive">
			</a>
		</p>
	</center>
</div>