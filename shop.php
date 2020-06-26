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
					Shopping Card  Total Price: $ <?php totalPrice();?>,Total Items <?php item();?>
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
								//echo"<a href='customer_registration.php'>Register</a>";
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
						<li class="active">
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
						Shop
					</li>
				</ul><!--------breadcrumb End--------------->
			</div><!--------col-md-12 End--------------->

			<div class="col-md-3"><!--------col-md-3 Start--------------->
				<?php
					include("includes/sidebar.php");
				?>
			</div><!--------col-md-3 End--------------->

			<div class="col-md-9"><!--------col-md-9 Start--------------->
				<?php
					if(!isset($_GET['p_cat']))
					{
						if(!isset($_GET['cat_id']))
						{
							echo"<div class='box'>
									<h1>Shop</h1>
									<p>Please One time purchase with us</p>
								</div>";
						}
					}
				?>

				<div class="row"><!--------row Start--------------->
					<?php
						if(!isset($_GET['p_cat']))
						{
							if(!isset($_GET['cat_id']))
							{
								$per_page=6;
								if(isset($_GET['page']))
								{
									$page=$_GET['page'];
								}
								else
								{
									$page=1;
								}
								$start_from=($page-1) * $per_page;
								$get_product="select * from products order by 1 DESC LIMIT $start_from,$per_page";
								$run_pro=mysqli_query($conn,$get_product);
								while($row=mysqli_fetch_array($run_pro))
								{
									$pro_id=$row['product_id'];
									$pro_title=$row['product_title'];
									$pro_price=$row['product_price'];
									$pro_img1=$row['product_img1'];
									echo"<div class='col-md-4 col-sm-6 center-responsive'>
											<div class='products'>
												<a href='details.php?pro_id=$pro_id'>
													<img src='admin_area/product_images/$pro_img1' class='img-responsive'>
												</a>
												<div class='text'>
												<h3>
													<a href='details.php?pro_id'>$pro_title</a>
												</h3>
												<p class='price'>
													$ $pro_price
												</p>
												<p class='buttons'>
													<a href='details.php?pro_id=$pro_id' class='btn btn-default'>
														View Details
													</a>

													<a href='details.php?pro_id=$pro_id' class='btn btn-primary'>
														<i class='fa fa-shopping-cart'></i>
														Add To Cart
													</a>
												</p>
												</div>
											</div>

										</div>
									";

								}


					?>	
					

				</div><!--------row End--------------->	

				<center>
					<ul class="pagination">
						<?php
							$query="select * from products";
							$result=mysqli_query($conn,$query);
							$total_record=mysqli_num_rows($result);
							$total_pages=ceil($total_record/$per_page);
							echo"<li>
									<a href='shop.php?page=1'>
										".'First Page'."
									</a>
								</li>";
							for($i=1; $i<=$total_pages; $i++)
							{
								echo"<li>
										<a href='shop.php?page=".$i."'>
											".$i."										
										</a>
									</li>";

							};
							echo"<li>
									<a href='shop.php?page=$total_pages'>
										".'Last Page'."
									</a>
								</li>";




							}
						}
						
						?>
								
					</ul>
				</center>

				
					<?php
						getPcatPro();
						getCatPro();
					?>
				

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