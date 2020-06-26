<?php
	session_start();
	include("includes/db.php");
	include("functions/functions.php");
?>
<?php
	if(isset($_GET['pro_id']))
	{
		$pro_id=$_GET['pro_id'];
		$get_product="select * from products where product_id='$pro_id' ";
		$run_product=mysqli_query($conn,$get_product);
		$row_product=mysqli_fetch_array($run_product);
		$p_cat_id=$row_product['p_cat_id'];
		$p_title=$row_product['product_title'];
		$p_price=$row_product['product_price'];
		$p_desc=$row_product['product_desc'];
		$p_img1=$row_product['product_img1'];
		$p_img2=$row_product['product_img2'];
		$p_img3=$row_product['product_img3'];

		$get_p_cat="select * from product_category where p_cat_id='$p_cat_id'";
		$run_p_cat=mysqli_query($conn,$get_p_cat);
		$row_p_cat=mysqli_fetch_array($run_p_cat);
		$p_cat_id=$row_p_cat['p_cat_id'];
		$p_cat_title=$row_p_cat['p_cat_title'];
		
	}

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
								echo"<a herf='logout.php'>Logout</a>";
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
					<li>
						<a href="shop.php?p_cat=<?php echo $p_cat_id;?>">
							<?php echo $p_cat_title?>
						</a>
					</li>
					<li>
						<?php echo $p_title?>
					</li>
				</ul><!--------breadcrumb End--------------->
			</div><!--------col-md-12 End--------------->

			<div class="col-md-3"><!--------col-md-3 Start--------------->
				<?php
					include("includes/sidebar.php");
				?>
			</div><!--------col-md-3 End--------------->


			<div class="col-md-9"><!--------col-md-9 Start--------------->
				<div class="row" id="productmain">
					<div class="col-sm-6"><!----col-sm-6 Start----->
						<div id="mainimage"><!----mainimage Start----->
							<div id="mycarousel" class="carousel slide" data-ride="carousel"><!---carousel slide Start------->
								<ol class="carousel-indicators">
									<li data-target="#mycarousel" data-slide-to="0" class="active"></li>
									<li data-target="#mycarousel" data-slide-to="1"></li>
									<li data-target="#mycarousel" data-slide-to="2"></li>
								</ol>
								<div class="carousel-inner"><!---carousel-inner Start------->
									<div class="item active">
										<center>
											<img src="admin_area/product_images/<?php echo $p_img1?>" class="img-responsive">
										</center>
									</div>
									<div class="item">
										<center>
											<img src="admin_area/product_images/<?php echo $p_img2?>" class="img-responsive">
										</center>
									</div>
									<div class="item">
										<center>
											<img src="admin_area/product_images/<?php echo $p_img1?>" class="img-responsive">
										</center>
									</div>
								</div><!---carousel-inner End------->

								<a href="#mycarousel" class="left carousel-control" data-slide="prev">
									<span class="glyphicon glyphicon-chervon-left"></span>
									<span class="sr-only">Previous</span>
								</a>

								<a href="#mycarousel" class="right carousel-control" data-slide="next">
									<span class="glyphicon glyphicon-chervon-right"></span>
									<span class="sr-only">Next</span>
								</a>


							</div><!---carousel slide End------->

						</div><!----mainimage End----->
					</div><!----col-sm-6 End----->


					<div class="col-sm-6"><!----col-sm-6 Start----->
						<div class="box"><!----box Start----->
							<h1 class="text-center">
								<?php echo $p_title?><!-- p_title defined nhi h-->
							</h1>
							<?php
								addCart();
							?>

							<form action="details.php?add_cart=<?php echo $pro_id?>" method="post" class="form-horizontal"> <!--------form Start --- --->
								<div class="form-group"><!----form-group Start----->
									<label class="col-md-5 control-label">Product Quantity</label>
									<div class="col-md-7"><!----col-md-7 Start----->
										<select name="product_qty" class="form-control">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
										</select>
									</div><!----col-md-7 End----->
								</div><!----form-group End----->

								<div class="form-group"><!----form-group Start----->
									<label class="col-md-5 control-label">Product Size </label>
									<div class="col-md-7"><!----col-md-7 Start----->
										<select name="product_size" class="form-control">
											<option>Select a size</option>
											<option>Extra Small</option>
											<option>Small</option>
											<option>Medium</option>
											<option>Large</option>
											<option>Extra Large</option>
										</select>
									</div><!----col-md-7 End----->
								</div><!----form-group End----->

								<p class="price"> $ <?php echo $p_price;?></p>
								<p class="text-center buttons">
									<button class="btn btn-primary" type="submit">
										<i class="fa fa-shopping-cart"></i>Add to cart
									</button>
								</p>

							</form><!--------------------form End----------------------->
						</div><!----box end----->

						<div class="col-xs-4">
							<a href="#" class="thumb">
								<img src="admin_area/product_images/<?php echo $p_img1?>" class="img-responsive">
							</a>
						</div>

						<div class="col-xs-4">
							<a href="#" class="thumb">
								<img src="admin_area/product_images/<?php echo $p_img2?>" class="img-responsive">
							</a>
						</div>

						<div class="col-xs-4">
							<a href="#" class="thumb">
								<img src="admin_area/product_images/slip.jpg" class="img-responsive">
							</a>
						</div>


					</div><!----col-sm-6 End----->
					
				</div>

				<div class=" box" id="details"><!------box Start------------------->
					<h4>Product Details</h4>
					<p>
						<?php echo $p_desc?>
					</p>
					<h4>Size</h4>
					<ul>
						<li>Extra Small</li>
						<li>Small</li>
						<li>Medium</li>
						<li>Large</li>
						<li>Extra Large</li>
					</ul>
					
				</div><!------box End------------------->

				<div id="row" class="same-height-row"><!--same-height-row start---->
					<div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6 Start---->
						<div class="box same-height headline">
							<h3 class="text-center">You also Like the products</h3>
						</div>
					</div><!--col-md-3 col-sm-6 End---->

					<?php
						$get_product="select * from products order by 1 LIMIT 0,3";
						$run_product=mysqli_query($conn,$get_product);
						while($row=mysqli_fetch_array($run_product))
						{
							$pro_id=$row['product_id'];
							$product_title=$row['product_title'];
							$product_price=$row['product_price'];
							$product_img1=$row['product_img1'];

							echo"<div class='center-responsive col-md-3 col-sm-6'>
									<div class='product same-height'>
										<a href='details.php?pro_id=$pro_id'>
											<img src='admin_area/product_images/$product_img1' class='img-responsive'>
										</a>
										<div class='text-center'>
											<h3>
												<a href='details.php?pro_id=$pro_id'>
													$product_title
												</a>
											</h3>
											<p class='price'> $product_price </p>
										</div>
									</div>

										
								</div>";
						}

					?>
					 
				</div><!--same-height-row End---->

			</div><!--------col-md-9 End--------------->

		</div><!--------Container End--------------->
	</div ><!--------Content Start--------------->

<!-----------------------Footer Start--------------------------------------->
	<?php
		include("includes/footer.php");
	?>

<!-----------------------Footer End--------------------------------------->

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
</body>
</html>
