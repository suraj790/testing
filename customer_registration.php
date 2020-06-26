<!DOCTYPE html>
<?php
	session_start(); 
	include("includes/db.php");
	include("functions/functions.php");		
	

?>
<?php
	if(isset($_GET['id']))
	{
		$get_popup_id=$_GET['id'];
$select_mcust="select * from main_cust where mcust_id='$get_popup_id'";
		$run_mcust_id=mysqli_query($conn,$select_mcust);
		while($row=mysqli_fetch_array($run_mcust_id))
		{
			$mcust_name1=$row['mcust_name'];
			$mcust_mobile1=$row['mcust_mobile'];
			$mcust_email1=$row['mcust_email'];
		}
	}

?>

<html>
<head>
	

	<title>E Commerce Store</title>

	<link rel="stylesheet" href="styles/style.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="styles/style.css">

	<script src="https://kit.fontawesome.com/9a06944c10.js" crossorigin="anonymous"></script>


	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!--<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">-->
	


</head>
<body onload="hello()">
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
							echo "Welcome:" .$_SESSION['customer_email'] ."";
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
								echo"<a href='customer_registration.php'>Register</a>";
							}
							else
							{
								echo"";
							}
						?>
						
					</li>
					<li>
						<a href="checkout.php">
							My Account
						</a>
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
						<li>
							<a href="shop.php">Shop</a>
						</li>
						<li>
							<a href="checkout.php">My Account</a>
						</li>
						<li>
							<a href="cart.php">Shopping Cart</a>
						</li> 
						<li>
							<a href="about.php"> About Us</a>
						</li>  
						<li>
							<a href="services.php">Services</a>
						</li>  
						<li class="active">
							<a href="contact.php">Contact Us</a>
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
						Registration
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
							<h2>Full Customer Registration</h2>
						</center>						
					</div><!--------box-header End--------------->

					<form action="customer_registration.php" method="post" enctype="multipart/form-data" onsubmit="return validation()">

						<div class="form-group" style="display: none">
							<label hidden="">main registration id</label>
							<input type="text" hidden="" name="main_id"  class="form-control" value="<?php echo $get_popup_id?>" >

						</div>
						<div class="form-group">
							<label>Customer Name</label>
							<input type="text" name="c_name" id="c_name2"  class="form-control" value="<?php echo $mcust_name1?>">
							<span id="c_name3" class="text-danger font-weight-bold"></span>

						</div>

						<div class="form-group">
							<label>Gender</label>
							<div class="form-group">
<input type="radio" name="c_gen" id="c_genM" class="radio-inline" value="Male">  <label>Male</label>
<input type="radio" name="c_gen" id="c_genF" class="radio-inline" value="Female">  <label>Female</label>
<input type="radio" name="c_gen" id="c_genO" class="radio-inline" value="Other"> <label>Other</label>
							</div>
							
						</div>


						<div class="form-group">
							<label>Contact Number</label>
							<input type="text" name="c_contact" id="c_contact2" class="form-control" value="<?php echo $mcust_mobile1?>" readonly="">
							
						</div>

						<div class="form-group">
							<label>Customer E-mail</label>
							<input type="email" name="c_email" class="form-control" value="<?php echo $mcust_email1?>" readonly="">
							
						</div>

						<div class="form-group">
							<label>Images</label>
							<input type="file" name="c_image" class="form-control" id="c_image2">
							<span id="c_image3" class="text-danger font-weight-bold"></span>
						</div>

						<div class="form-group">
							<label>Customer Password</label>
							<input type="Password" name="cu_password"  class="form-control" id="cu_password2">
							<span id="cu_password3" class="text-danger font-weight-bold"></span>
						</div>

						<div class="form-group">
							<label>Customer Conform Password</label>
							<input type="Password" name="c_password"  class="form-control" id="c_password2">
							<span id="c_password3" class="text-danger font-weight-bold"></span>
						</div>

						<div class="form-group">
							<label>Address</label>
							<textarea type="text" name="c_address" class="form-control" rows="5" cols="10" id="c_address2">	</textarea>
							<span id="c_address3" class="text-danger font-weight-bold"></span>
						</div>


						<div class="form-group">
							<label>City</label>
							<input type="text" name="c_city" class="form-control" id="c_city2">	
							<span id="c_city3" class="text-danger font-weight-bold"></span>
						</div>

						<div class="form-group">
							<label>Country</label>
							<input type="text" name="c_country" class="form-control" id="c_country2"> 
							<span id="c_country3" class="text-danger font-weight-bold"></span>
						</div>
						<div class="text-center row">
							<div class="col-md-3"></div>
							<button type="submit" name="submit" class="btn btn-primary col-md-6" style="padding: 10px;font-weight: bold;font-size: 20px;">
								<i class="fa fa-user-md">     Register</i>
							</button>
							<div class="col-md-3"></div>
						</div>





					</form>

				</div><!--------box End--------------->

			</div><!--------col-md-9 End--------------->





		</div><!--------Container End--------------->
	</div><!--------Content End--------------->


<?php echo"<script>
		functions hello()
		{
			alert('hi');
		}

	</script>";
?>


<!-----------------------Footer Start-------------------------------------->
<?php
 	include("includes/footer.php");
?>

<!-----------------------Footer End--------------------------------------->

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	

	
	
</body>
</html>


<?php

if(isset($_POST['submit']))
{
	$c_name=$_POST['c_name'];
	$c_email=$_POST['c_email'];
	$c_password=$_POST['c_password'];
	$c_country=$_POST['c_country'];
	$c_city=$_POST['c_city'];
	$c_contact=$_POST['c_contact'];
	$c_address=$_POST['c_address'];
	$c_gen=$_POST['c_gen'];
	$main_cust_id=$_POST['main_id'];
	$c_ip=getUserIp();

	$c_image=$_FILES['customer_image']['name'];

	$c_tmp_image=$_FILES['customer_image']['tmp_name'];
	

	move_uploaded_file($c_tmp_image, "customer/customer_images/$c_image");


	$insert_customer="insert into customers(customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip,customer_gen,main_cust_id) values('$c_name','$c_email','$c_password','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip','$c_gen','$main_cust_id')"; 

	$run_customer=mysqli_query($conn,$insert_customer);

	$sel_cart="select * from cart where ip_add='$c_ip'";
	$run_cart=mysqli_query($conn,$sel_cart);




	$check_cart=mysqli_num_rows($run_cart);
	if($check_cart>0)
	{
		$_SESSION['customer_email']=$c_email;
		echo"<script>alert('You have been registered Successfully')</script>";
		echo"<script>window.open('checkout.php','_self')</script>";
	}
	else
	{
		$_SESSION['customer_email']=$c_email;

		echo"<script>alert('You have been registered Successfully')</script>";

		echo"<script>window.open('index.php','_self')</script>";
	}


	

}
?>

