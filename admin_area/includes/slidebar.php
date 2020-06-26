<?php 
	if(!isset($_SESSION['admin_email']))
	{
		echo "<script>window.open('login.php','_self')</script>";
	}
	else
	{

?>
<nav class="navbar navbar-inverse navbar-fixed-top" style="background: black">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			 <span class="sr-only"> Toggle Navigation</span>
			 <span class="icon-bar"></span>
			 <span class="icon-bar"></span>
			 <span class="icon-bar"></span>
			 <span class="icon-bar"></span> 
		</button>
		<a href="index.php?dashoard" class="navbar-brand">Admin Panel</a>
	</div>
	<ul class="nav navbar-right top-nav"><!--nav navbar-right top-nav Start-->
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<i class="fa fa-user"></i>    <?php echo $admin_name;?>  <i class="fa fa-fw fa-caret-down"></i>
			</a>
			<ul class="dropdown-menu">
				<li>
					<a href="index.php?user_profile=<?php echo $admin_id?>">
						<i class="fa fa-user"></i>  Profile
					</a> 
				</li>

				<li>
					<a href="index.php?view_products">
						<i class="fa fa-fw-envelope"></i>  Products
						<span class="badge">
							<?php echo $count_pro?>
						</span>
					</a> 
				</li>

				<li>
					<a href="index.php?view_customer">
						<i class="fa fa-fw-users"></i>  Customer
						<span class="badge">
							<?php echo $count_cust?>
						</span>
					</a> 
				</li>

				<li>
					<a href="index.php?use_profile">
						<i class="fa fa-fw-gear"></i>  Product Categories
						<span class="badge">
							<?php echo $count_p_cat?>
						</span>
					</a> 
				</li>

				<li class="divider"> 
					
				</li>

				<li>
					<a href="logout.php">
						Logout <i class="fa fa-fw fa-power-off"></i>
					</a>
				</li>

			</ul>
		</li>
	</ul><!--nav navbar-right top-nav End-->

	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav sidebar-nav">
			<li>
				<a href="index.php?dashboard">					
					<i class="fa fa-fw fa-dashboard"></i> Dashboard
				</a>
			</li>
			
			<li><!--Start Here-->
				<a href="#" data-toggle="collapse" data-target="#products">
					<i class="fa fa-fw fa-table"></i> Products
					<i class="fa fa-fw fa-caret-down"></i>
				</a>			
			
				<ul id="products" class="collapse">
					<li>
						<a href="index.php?insert_product">Insert Product</a>
					</li>

					<li>
						<a href="index.php?view_product">View Product</a>
					</li>
				</ul>
			</li><!--Start End-->

			<li><!--Start Here-->
				<a href="#" data-toggle="collapse" data-target="#products_cat">
					<i class="fa fa-fw fa-table"></i> Products Categories
					<i class="fa fa-fw fa-caret-down"></i>
				</a>

				<ul id="products_cat" class="collapse" >
					<li>
						<a href="index.php?insert_product_cat">Insert Product Categories</a> 
					</li>
					<li>
						<a href="index.php?view_product_cat">View Product Categories</a>
					</li>
				</ul>
			</li><!--Start End-->

			<li><!--Start Here-->
				<a href="#" data-toggle="collapse" data-target="#category">
					<i class="fa fa-fw fa-table"></i> Categories
					<i class="fa fa-fw fa-caret-down"></i>
				</a>			
			
				<ul id="category" class="collapse">
					<li>
						<a href="index.php?insert_categories">Insert Categories</a>
					</li>
					<li>
						<a href="index.php?view_categories">
							View Categories
						</a>
					</li>
				</ul>
			</li><!--Start End-->

			<li><!--Start Here-->
				<a href="#" data-toggle="collapse" data-target="#slider">
					<i class="fa fa-fw fa-table"></i> Slider
					<i class="fa fa-fw fa-caret-down"></i>
				</a>			
			
				<ul id="slider" class="collapse" >
					<li>
						<a href="index.php?insert_slider">Insert Slider</a>
					</li>
					<li>
						<a href="index.php?view_slider">View Slider</a>
					</li>
				</ul>
			</li><!--Start End-->

			<li>
				<a href="index.php?view_customer">
					<i class="fa fa-fw fa-edit"></i> View Customer
				</a>
			</li>

			<li>
				<a href="index.php?view_order">
					<i class="fa fa-fw fa-list"></i> View Order
				</a>
			</li>

			<li>
				<a href="index.php?view_payments">
					<i class="fa fa-fw fa-pencil"></i> View Payments
				</a>
			</li>

			<li><!--Start Here-->
				<a href="#" data-toggle="collapse" data-target="#users">
					<i class="fa fa-fw fa-table"></i> Users
					<i class="fa fa-fw fa-caret-down"></i>
				</a>			
			
				<ul id="users" class="collapse" >
					<li>
						<a href="index.php?insert_user">Insert User</a>
					</li>
					<li>
						<a href="index.php?view_user">View User</a>
					</li>
					<li>
			<a href="index.php?user_profile=<?php echo $admin_id?>">
				Edit Profile
						</a>
					</li>
				</ul>
			</li><!--Start End-->
		</ul>
	</div>
	
</nav>
<?php } ?>