<?php
	session_start();
	include("includes/db.php");
	include("functions/functions.php");
?>

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
							
							echo "Welcome " .$user_name ."";
						}
					?>
				</a>
				<a href="#">
					Shopping Card  Total Price: $ <?php totalPrice();?>,Total Item <?php item();?>
				</a>
			</div><!----offer div End-->
			<div class="col-md-6"><!----offer div start-->
				<ul class="menu">
					<li>
						<?php

						if(!isset($_SESSION['customer_email']))
							{
								echo"<a href='customer_halfreg.php'>
										Register
									</a>";
								// echo"<a href='customer_registration.php'>Register</a>";
							}
							else
							{
								echo"";
							}
						?>
						
					</li>
					<li>
						<?php
							if(!isset($_SESSION['customer_email']))
							{
								echo "<a href='checkout.php'>
										My Account
										</a>";
							}
							else
							{
								echo "<a href='customer/my_account.php?my_order'>
											My Account
										</a>";
							}
						?>
					</li>
					<li>
						<a href="cart.php">
							Goto Cart
					 	</a>
					</li>
					<li>
						<?php
							if(!isset($_SESSION['customer_email']))
							{
								echo"<a href='checkout.php'>Login</a>";
							}
							else
							{
								echo"<a href='logout.php'>Logout</a>";
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
							<a href="index.php">
								Home
							</a>							
						</li>
						<li>
							<a href="shop.php">Shop</a>
						</li>
						<li>
							<?php
								if(!isset($_SESSION['customer_email']))
								{
									echo "<a href='checkout.php'>
											My Account
											</a>";
								}
								else
								{
									echo "<a href='customer/my_account.php?my_order'>
												My Account
											</a>";
								}
							?>
						</li>
						<li>
							<a href="cart.php">Shopping Cart</a>
						</li> 
						
						<li class="active">
							<a href="contactus.php">Contact Us</a>
						</li>     
					</ul>
				</div><!----------------------------Padding nav bar end---------------------->

				<a href="cart.php" class="btn btn-primary navbar-btn navbar-collapse right">
					<i class="fa fa-shopping-cart"></i>
					<span><?php item();?> item In Cart</span>					
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
								
								<button type="submit" class="btn btn-primary" name="search" value="Search">
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
						Contact Us
					</li>
				</ul><!--------breadcrumb End--------------->
			</div><!--------col-md-12 End--------------->

			<div class="col-md-3"><!--------col-md-3 Start--------------->
				<?php
					include("includes/sidebar.php");
				?>
			</div><!--------col-md-3 End--------------->


			<div class="col-md-9"><!--------col-md-9 Start--------------->
				<div class="box"><!--------box Start--------------->
					<div class="box-header"><!--------box-header Start--------------->
						<center>
							<h2>Contact Us</h2>
							<p class="text-muted">
								If You have any question ,please feel free to contact us,our customer service center is working for you 24/7.							
							</p>
						</center>						
					</div><!--------box-header End--------------->

					<form action="contactus.php" method="post">
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" required="" class="form-control">
						</div>

						<div class="form-group">
							<label>E-mail</label>
							<input type="text" name="email" required="" class="form-control">
						</div>

						<div class="form-group">
							<label>Subject</label>
							<input type="text" name="subject" required="" class="form-control">
						</div>

						<div class="form-group">
							<label>Message</label>
							<textarea name="message" required="" class="form-control">
								
							</textarea> 
						</div>

						<div class="text-center">
							<button type="submit" name="submit" class="btn btn-primary">
								<i class="fa fa-user-md">     Send Message</i>
							</button>
						</div>





					</form>

				</div><!--------box End--------------->

			</div><!--------col-md-9 End--------------->





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

<?php
//Admin Mail
if(isset($_POST['submit']))
{
	$senderName=$_POST['name'];
	$senderEmail=$_POST['email'];
	$senderSubject=$_POST['subject'];
	$senderMessage=$_POST['message'];


	$receiverEmail="surajsojas698@gmail.com";
	mail($receiverEmail,$senderName,$senderSubject,$senderMessage,$senderEmail); 

	//Customer Mail

	$email=$_POST['email'];
	$subject="Welcome to Our Website";
	$msg="I shall get you soon,thanks for sending email";
	$from="surajsojas698@gmail.com";
	mail($email,$subject,$msg,$from);
	echo"<h2 align='center'>Your mail Sent</h2>";
}
?>