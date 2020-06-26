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
						<li class="active">
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

			<div class="col-md-9" id="cart"><!--------col-md-9 Start--------------->
				<div class="box"><!-----box Start------>
					<form action="cart.php" method="post" enctype="multipart-form-data">
						<h1>Shopping Cart</h1>
						<?php 
							$ip_add=getUserIp();
							$select_cart="select * from cart where ip_add='$ip_add'";
							$run_cart=mysqli_query($conn,$select_cart);
							$count=mysqli_num_rows($run_cart);

						?>
						<p class="text-muted">Currently you have <?php item();?> item(s) in your cart</p>
						<div class="table-responsive"><!-----table-responsive Start---->
							<table class="table"><!------table Start----->
								<thead>
									<tr>
										<th>Product</th>
										<th>Quantity</th>
										<th>Unit Price</th>
										<th>Size</th>
										<th colspan="1">Delete</th>
										<th colspan="1">Sub Toatal</th>
									</tr>
								</thead>

								<tbody>
									<?php
										$total=0;
										while($row=mysqli_fetch_array($run_cart))
										{
											$pro_id=$row['p_id'];
											$pro_size=$row['size'];
											$pro_qty=$row['qty'];
											$get_product="select * from products where product_id='$pro_id'";

											$run_pro=mysqli_query($conn,$get_product);
											while($row=mysqli_fetch_array($run_pro))
											{
												$p_title=$row['product_title'];
												$p_img1=$row['product_img1'];
												$p_price=$row['product_price'];
												$sub_total=$row['product_price']*$pro_qty;
												$total +=$sub_total; //$total =$total+$sub_total;
									?>
									<tr>
										<td>
											<img src="admin_area/Product_images/<?php echo $p_img1?>">
											<?php echo $p_title;?>
										</td>
										<td><?php echo $pro_qty;?></td>
										<td>$ <?php echo $p_price;?></td>
										<td><?php echo $pro_size;?></td>
										<td>
											<input type="checkbox" name="remove[]" value="<?php echo $product_img1;?>">
										</td>
										<td> $ <?php echo $sub_total;?></td>
									</tr>
									<tr>
										<td>
											<img src="admin_area/Product_images/<?php echo $p_img1;?>">
											<?php echo $p_title;?>
										</td>
										<td><?php echo $pro_qty;?></td>
										<td>$ <?php echo $p_price;?></td>
										<td><?php echo $pro_size;?></td>
										<td>
											<input type="checkbox" name="remove[]" value="<?php echo $product_img1;?>">
										</td>
										<td>$ <?php echo $sub_total;?></td>
									</tr>
								</tbody>

								<tfoot>
									<tr>
										<th colspan="5">Total</th>
										<th colspan="2">$ <?php $total;?></th>
									</tr>
									<?php } } ?>
								</tfoot>
							</table><!------table End----->
						</div><!-----table-responsive End---->


						<div class="box-footer">

							<div class="pull-left"><!------pull left Start----->
								<h4>Total Price</h4>
							</div><!------pull left End----->

							<div class="pull-right"><!------pull left Start----->
								<h4>$ <?php echo $total?></h4>
							</div><!------pull left End----->

						</div>

						<div class="box-footer">

							<div class="pull-left"><!------pull left Start----->
								<a href="index.php" class="btn btn-default">
									<i class="fa fa-chevron-left"></i> Continue Shopping 
								</a>
							</div><!------pull left End----->

							<div class="pull-right"><!------pull left Start----->
								<button class="btn btn-default" type="submit" name="update" value="Update Cart">
									<i class="fa fa-refresh">Update Cart</i>
								</button>
								<a href="checkout.php" class="btn btn-primary">
									Proceed to checkout<i class="fa fa-chevron-right"></i> 
								</a>
							</div><!------pull left End----->

						</div>
					</form>

					
				</div><!-----box End------>


				<?php
					function update_cart()
					{
						global $conn;
						if(isset($_POST['update']))
						{
							foreach ($POST['remove'] as $remove_id)
							{
								$delete_product="delete from cart where p_id='remove_id'";
								$run_del=mysqli_query($conn,$delete_product);
								if($run_del)
								{	
									echo"<script>window.open('cart.php','_self')</script>";


								}
							}
						}
					}
					echo @$up_cart=update_cart();
					//yeh code v sayad kam nhi kr rha h 
				?>


				<div id="row" class="same-height-row"><!--same-height-row start---->
					<div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6 Start---->
						<div class="box same-height headline">
							<h3 class="text-center">You also Like the products</h3>
						</div>
					</div><!--col-md-3 col-sm-6 End---->

					<div class="center-responsive col-md-3"><!----center-responsive col-md-3 Start----->
						<div class="product same-height">
							<a href="">
								<img src="admin_area/product_images/shirt1.jpg" class="img-responsive">
							</a>
							<div class="text">
								<h3>
									<a href="details.php" >Mardaz Pack of 5- Multi Color V-neck T-shirts for Men</a>
								</h3>
								<p class="price"> <?php echo $total?></p>
							</div>
						</div>						
					</div><!----center-responsive col-md-3 End----->

					<div class="center-responsive col-md-3"><!----center-responsive col-md-3 Start----->
						<div class="product same-height">
							<a href="">
								<img src="admin_area/product_images/shirt1.jpg" class="img-responsive">
							</a>
							<div class="text">
								<h3>
									<a href="details.php" >Mardaz Pack of 5- Multi Color V-neck T-shirts for Men</a>
								</h3>
								<p class="price"> $ 2000</p>
							</div>
						</div>						
					</div><!----center-responsive col-md-3 End----->

					<div class="center-responsive col-md-3"><!----center-responsive col-md-3 Start----->
						<div class="product same-height">
							<a href="">
								<img src="admin_area/product_images/shirt1.jpg" class="img-responsive">
							</a>
							<div class="text">
								<h3>
									<a href="details.php" >Mardaz Pack of 5- Multi Color V-neck T-shirts for Men</a>
								</h3>
								<p class="price"> $ 2000</p>
							</div>
						</div>						
					</div><!----center-responsive col-md-3 End----->
					 
				</div><!--same-height-row End---->

			</div><!--------col-md-9 End--------------->

			<div class="col-md-3"> <!--------col-md-3 Start--------------->
				<div class="box" id="order-summary">
					<div class="box-header">
						<h3>Order Summary</h3>
					</div>
					<p class="text-muted">
						Shipping and addtional costs are calculated based on the values you have entered  
					</p>
					<div class="table-responsive">
						<table class="table">
							<tbody>
								<tr>
									<td>Order Sub Total</td>
									<th>
										$ <?php echo $total?>
									</th>
								</tr>

								<tr>
									<td>Shiping and Handling</td>
									<th>$ 0</th>
								</tr>

								<tr>
									<td>Tax</td>
									<td>$ 0</td>
								</tr>

								<tr class="total">
									<td>Total</td>
									<th>
										$ <?php echo $total?>
									</th>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div><!--------col-md-3 End--------------->

			
			 




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