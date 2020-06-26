<?php
	session_start();
	if(!isset($_SESSION['customer_email']))
	{
		echo"<script>window.open('../checkout.php','_self')</script>";
		//yeah pr garbar h
	}
	else
	{

	
	include("includes/db.php");
	include("functions/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>E Commerce Store</title>
	<script src="https://kit.fontawesome.com/9a06944c10.js" crossorigin="anonymous"></script>
	

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="styles/style.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
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
							
							echo "Welcome " .$user_name ."";
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
				<a href="../index.php" class="navbar-brand home">
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
				<!--------including my_order.php page Start--------------->
				<?php
					if(isset($_GET['my_order']))
					{
						include("my_order.php");
					}
				?>
				<!--------including my_order.php page End--------------->

				<!--------including Payoffline.php page Start--------------->
				<?php
					if(isset($_GET['pay_offline']))
					{
						include("pay_offline.php");
					}
				?>
				<!--------including Payoffline.php page End--------------->

				<!--------including edit_act.php page Start--------------->
				<?php
					if(isset($_GET['edit_act']))
					{
						include("edit_act.php");
					}
				?>
				<!--------including edit_act.php page End--------------->

				<!--------including change_password.php page Start--------------->
				<?php
					if(isset($_GET['change_pass']))
					{
						include("change_password.php");
					}
				?>
				<!--------including change_password.php page End--------------->

				<!--------including delete_ac.php page Start--------------->
				<?php
					if(isset($_GET['delete_ac']))
					{
						include("delete_ac.php");
					}
				?>
				<?php
					if(isset($_GET['logout']))
					{
						include("cust_logout.php");
					}
				?>
				<!--------including delete_ac.php page End--------------->



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