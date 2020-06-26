<?php
	session_start();
	include("includes/db.php");
	include("functions/functions.php");
?>


<!DOCTYPE html>
<html>
<head>
	<title>E Commerce Store</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
					Shopping Card  Total Price: $ <?php totalPrice();?>,Total Items <?php item(); ?> 
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
	
	<div class="navbar navbar-default sticky-top" id="navbar"><!---------------navbar navbar default start ---------->
		<div class="container">
			<div class="navbar-header"><!-------navbar header start-------------------->
				<a href="#" class="navbar-brand home">
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
						<li class="active">
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
						 
						<li>
							<a href="contactus.php">Contact Us</a>
						</li>     
					</ul>
				</div><!----------------------------Padding nav bar end---------------------->

				<a href="cart.php" class="btn btn-primary navbar-btn navbar-collapse right">
					<i class="fa fa-shopping-cart"></i>
					<span><?php item();?>item In Cart</span>					
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
		</div><!------------navbar navbar default end----------------------->
	</div>


	<div class="container" id="slider"><!-------------Container Start------------------------->
		<div class="col-md-12"><!-------------col-md-12 Start------------------------->
			<div class="carousel slide" id="myCarousel" data-ride="carousel"><!-------------carousel Slide Start------------------------->
				<ol class="carousel-indicators">
					<li data-target="myCarousel" data-slide-to="0" class="action"></li>
					<li data-target="myCarousel" data-slide-to="1"></li>
					<li data-target="myCarousel" data-slide-to="2"></li>
					<li data-target="myCarousel" data-slide-to="3"></li>
				</ol>


				<div class="carousel-inner"><!-------------carousel inner Start------------------------->
						<?php
							$get_slider="select * from slider LIMIT 0,1";
							$run_slider=mysqli_query($conn,$get_slider);
							while($row=mysqli_fetch_array($run_slider))
							{
								$slider_name=$row['slider_name'];
								$slider_image=$row['slider_image'];

								echo"<div class='item active'>
									<img src='admin_area/slider_images/$slider_image'>
									</div>";								

							}
						?>

						<?php
							$get_slider="select * from slider LIMIT 1,2";
							$run_slider=mysqli_query($conn,$get_slider);
							while($row=mysqli_fetch_array($run_slider))
							{
								$slider_name=$row['slider_name'];
								$slider_image=$row['slider_image'];

								echo"<div class='item'>
										<img src='admin_area/slider_images/$slider_image'>
									</div>";
								

							}
						?>

						<?php
							$get_slider="select * from slider LIMIT 2,3";
							$run_slider=mysqli_query($conn,$get_slider);
							while($row=mysqli_fetch_array($run_slider))
							{
								$slider_name=$row['slider_name'];
								$slider_image=$row['slider_image'];

								echo"<div class='item'>
									<img src='admin_area/slider_images/$slider_image'>
									</div>";								

							}
						?>
				</div><!-------------carousel inner End------------------------->

				<a href="#myCarousel" class="left carousel-control" data-slide="prev">
					<span class="glyphicon glyphicon-chervon-left"></span>
					<span class="sr-only">Previous</span>
				</a>

				<a href="#myCarousel" class="right carousel-control" data-slide="next">
					<span class="glyphicon glyphicon-chervon-right"></span>
					<span class="sr-only">Next</span>
				</a>
			</div><!-------------carousel Slide End------------------------->
		</div><!-------------col-md-12 End------------------------->
		
	</div><!-------------Container End-------- ----------------->

	<div id="advantage"><!----------------advantage Start------------------------------------->
		<div class="container"><!----------------Container Start------------------------------------->
			<div class="same-height-row"><!--------------same-height-row Start--------------------------------------->
				<div class="col-sm-4"><!--------------col-sm-4 Start--------------------------------------->
					<div class="box same-height"><!-----------------box same-height Start------------------->
						<div class="icon">
							<i class="fa fa-heart"></i>
						</div>
						<h3>
							<a href="#">
								BEST PRICES
							</a>
						</h3>
						<p>You can check on all others sites about  the prices and compare with us.</p>
					</div><!-----------------box same-height End------------------->					
				</div><!--------------col-sm-4 End--------------------------------------->

				<div class="col-sm-4"><!--------------col-sm-4 Start--------------------------------------->
					<div class="box same-height"><!-----------------box same-height Start------------------->
						<div class="icon">
							<i class="fa fa-heart"></i>
						</div>
						<h3>
							<a href="#">
								100% SATISIFACTION GUARNTED FORM US
							</a>
						</h3>
						<p>Free Return on everything for 3 months.</p>
					</div><!-----------------box same-height End------------------->	
				</div><!--------------col-sm-4 End--------------------------------------->

				<div class="col-sm-4"><!--------------col-sm-4 Start--------------------------------------->
					<div class="box same-height"><!-----------------box same-height Start------------------->
						<div class="icon">
							<i class="fa fa-heart"></i>
						</div>
						<h3>
							<a href="#">
								We love our customers.
							</a>
						</h3>
						<p>We are known to provide best possible services.</p>
					</div><!-----------------box same-height End------------------->						
				</div><!--------------col-sm-4 End--------------------------------------->
				
			</div> <!-------------same-height-row End--------------------------------------->
		</div><!----------------Container End------------------------------------->
		
	</div><!----------------advantage End------------------------------------->

	<div id="hot"><!-----------------hot Start----------------------------->
		<div class="box">
			<div class="container">
				<div class="col-md-12">
					<h2>Latest this week</h2>
				</div>
			</div>
		</div>
	</div><!-----------------hot End----------------------------->

	<div id="content" class="container">
		<div class="row"><!--------row Start------->
			<?php
				getPro();
			?>


		</div><!--------row End------->
	</div>



<!-----------------------Footer Start--------------------------------------->
<?php
include("includes/footer.php");
?>

<!-----------------------Footer End--------------------------------------->

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
</body>
</html>
