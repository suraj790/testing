<?php
	session_start();
	if(!isset($_SESSION['customer_email']))
	{
		echo"<script>window.open('../checkout.php','_self')</script>";
	}
	else
	{
		include("includes/db.php");
		include("functions/functions.php");

		if(isset($_GET['order_id']))
		{
			$order_id=$_GET['order_id'];
		}
?>
{

}
<!DOCTYPE html>
<html>
<head>
	<title>E Commerce Store</title>
	<link rel="stylesheet" href="styles/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="styles/style.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
	<div id="top"><!-----Top Bar Start--------------->
		<div class="container"><!----Container Start--------------->
			<div class="col-md-6 offer"><!----offer div start-->
				<a href="#" class="btn btn-warning btn-sm">
					<?php
						if(!isset($_SESSION['customer_email']))
						{
							echo"Welcome Guest";
						}
						else
						{
							$c_email=$_SESSION['customer_email'];
							
			$select_name="select * from customers where customer_email='$c_email'";
							$run_select=mysqli_query($conn,$select_name);
							$row_select=mysqli_fetch_array($run_select);

							$user_name=$row_select['customer_name'];
							
							echo "Welecome " .$user_name ."";
						}
					?>
				</a>
				<a href="#">
					Shopping Card  Total Price: INR 100,Total Item 2
				</a>
			</div><!----offer div End-->
			<div class="col-md-6"><!----offer div start-->
				<ul class="menu">
					<li>
						<?php

						if(!isset($_SESSION['customer_email']))
							{
								echo"<a href='../customer_registration.php'>Register</a>";
							}
							else
							{
								echo"";
							}
						?>
						
					</li>
					<li>
						<a href="my_account.php">
							My Account
						</a>
					</li>
					<li>
						<a href="../cart.php">
							Goto Cart
					 	</a>
					</li>
					<li>
						<?php
							if(!isset($_SESSION['customer_email']))
							{
								echo"<a href='../checkout.php'>Login</a>";
							}
							else
							{
								echo"<a href='cust_logout.php'>Logout</a>";
							}

						?>
							
					</li>
				</ul>
			</div> <!----offer div End-->

		</div><!----Container End--------------->

	</div><!-----Top Bar End--------------->
	<div class="navbar navbar-default" id="navbar"><!---------------navbar navbar default start ---------->
		<div class="container"><!------------Container Start----------------------->
			<div class="navbar-header"><!-------navbar header start-------------------->
				<a class="navbar-brand home">
					<img src="images/logo.png" style="width: 50px;height: 50px;" class="hidden-xs">
					<img src="images/chesslogo.png" style="width: 50px;height: 50px;" class="visible-xs">
				</a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
				<span class="sr-only">Toggle Navigation</span> 
				<i class="fa fa-align-justify"></i>
				</button>

				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
					<span class="sr-only"></span>
					<i class="fa fa-search"></i>
				</button>
			</div><!-------navbar header End-------------------->

			<div class="navbar-collapse collapse" id="navigation"><!----------------------------navbar-collapse collapse start---------------------->
				<div class="padding-nav"><!----------------------------Padding nav bar start---------------------->
					<ul class="nav navbar-nav navbar-left">
						<li>
							<a href="../index.php">
								Home
							</a>							
						</li>
						<li>
							<a href="../shop.php">Shop</a>
						</li>
						<li class="active">
							<a href="my_account.php">My Account</a>
						</li>
						<li>
							<a href="../cart.php">Shopping Cart</a>
						</li> 
						<li>
							<a href="../about.php"> About Us</a>
						</li>  
						<li>
							<a href="../services.php">Services</a>
						</li>  
						<li>
							<a href="../contactus.php">Contact Us</a>
						</li>     
					</ul>
				</div><!----------------------------Padding nav bar end---------------------->

				<a href="cart.php" class="btn btn-primary navbar-btn navbar-collapse right">
					<i class="fa fa-shopping-cart"></i>
					<span>4 item In Cart</span>					
				</a>

				<div class="navbar-collapse collapse right"><!--------------navbar-collapse collapse right Start------------------>
					<button type="button" class="btn navbar-btn btn-primary" data-target="#search" data-toggle="collapse">
						<span class="sr-only">Tooggle Search</span>
						<i class="fa fa-search"></i>
						
					</button>
				</div><!--------------navbar-collapse collapse right end------------------>

				<div class="collapse clearfix" id="search">
					<form class="navbar-form" method="get" action="result.php">
						<div class="input-group">
							<input type="text" name="user-query" placeholder="Search" class="form-control" required="">
								
									<button type="submit" class="btn btn-primary" name="search"  value="Search">
										<i class="fa fa-search"></i>
									</button>
								
						</div>
					</form>
				</div>
			
			</div><!----------------------------navbar-collapse collapse End---------------------->
		</div><!------------Container end----------------------->
	</div><!------------navbar navbar default end----------------------->


	<div id="content"><!--------Content Start--------------->
		<div class="container"><!--------Container Start--------------->
			<div class="col-md-12"><!--------col-md-12 Start--------------->
				<ul class="breadcrumb"><!--------breadcrumb Start--------------->
					<li>
						<a href="home.php">Home</a>
					</li>
					<li>
						My Account
					</li>
				</ul><!--------breadcrumb End--------------->
			</div><!--------col-md-12 End--------------->

			<div class="col-md-3"><!--------col-md-3 Start--------------->
				<?php
					include("includes/sidebar.php");
				?>
			</div><!--------col-md-3 End--------------->


			<div class="col-md-9">
				<div class="box">
					<h1 align="center">Please Confirm Your Payment</h1>
					<form action="confirm.php?update_id=<?php echo $order_id?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Invoice Number</label>
							<input type="text" name="invoice_number" class="form-control" required=""> 
						</div>

						<div class="form-group">
							<label>Amount</label>
							<input type="text" name="amount" class="form-control" required=""> 
						</div>

						<div class="form-group">
							<label>Select Payment Mode</label>
							<select class="form-control" name="payment_mode">
								<option>Bank Transfer</option>
								<option>Paypal</option>
								<option>PayUMoney</option>
								<option>PayTm</option>
							</select>
						</div>

						<div class="form-group">
							<label>Transaction Number</label>
							<input type="text" name="trfr_number" class="form-control" required=""> 
						</div>


						<div class="form-group">
							<label>Payment Date</label>
							<input type="date" name="date" class="form-control" required=""> 
						</div>

						<div class="text-center">
							<button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">
								Confirm Payment 
							</button>
						</div>
					</form>

					<?php 
						if(isset($_POST['confirm_payment']))
						{
							$update_id=$_POST['update_id'];
							$invoice_number=$_POST['invoice_number'];
							$amount=$_POST['amount'];
							$payment_mode=$_POST['payment_mode'];
							$trfr_number=$_POST['trfr_number'];
							$date=$_POST['date'];

							$complete="Complete";

							$insert="insert into payments (invoice_id,amount,payment_mode,ref_no,payment_date) values ('$invoice_number','$amount','$payment_mode','$trfr_number','$date')"; 

							$run_insert=mysqli_query($conn,$insert);

							$update_q="update customer_order set order_status='$complete' where order_id='$update_id'";

							$run_insert=mysqli_query($conn,$update_q);

							$update_p="update pending_order set order_status='$complete' where order_id='$update_id'";

							$run_insert=mysqli_query($conn,$update_p);

							echo "<script>alert('Your order has been received') </script>";

							echo "<script>
									window.open('my_account.php?order','_self')
								</script>";





						}
					?>
				</div>
			</div>





		</div><!--------Container End--------------->
	</div><!--------Content End--------------->






<!-----------------------Footer Start--------------------------------------->
	<?php
		include("includes/footer.php");
	?>

<!-----------------------Footer End--------------------------------------->

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
</body>
</html>
<?php } ?>