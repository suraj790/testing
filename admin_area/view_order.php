<?php
	
	if(!isset($_SESSION['admin_email']))
	{
		echo "<script>window.open('login.php','_self')</script>";
	}
	else
	{

?>
<div class="row"><!--1 row start-->
	<div class="col-lg-12"><!--1 col-lg-12 start-->
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i> Dashboard / View Orders
			</li>
		</ol>
	</div><!--1 col-lg-12 end-->
</div><!--1 row End-->


<div class="row"><!--2 row start-->
	<div class="col-lg-12"><!--col-lg-12 start -->
		<div class="panel panel-default"><!----panel panel-default
		 Start------>
			<div class="panel-heading"><!---panel-heading start----->
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> View Orders
				</h3>
			</div>		<!---panel-heading End----->

			<div class="panel-body"><!---panel-body start----->
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>Order No</th>
								
								<th>Customer Email</th>
								<th>Invoice No</th>
								<th>Product Title</th>
								<th>Product Qty</th>
								<th>Product Size</th>
								<th>Order Date</th>
								<th>Total Amount</th>
								<th>Order Status</th>
								<th>Delete Order</th>

							</tr>
						</thead>

						<tbody>
<?php 
	$i=0;
	$get_orders="select * from customer_order";
	$run_orders=mysqli_query($conn,$get_orders);

	while($row_orders=mysqli_fetch_array($run_orders)) 
	{
		$order_id=$row_orders['order_id'];
		$c_id=$row_orders['customer_id'];


		$invoice_no=$row_orders['invoice_no'];
		$product_id=$row_orders['product_id'];
		$qty=$row_orders['qty'];
		$size=$row_orders['size'];
		$order_date=$row_orders['order_date'];
		$due_amount=$row_orders['due_amount'];
		$order_status=$row_orders['order_status'];
		

		$get_poducts="select * from products where product_id='$product_id'";
		$run_products=mysqli_query($conn,$get_poducts);

		$row_products=mysqli_fetch_array($run_products);

		$product_title=$row_products['product_title'];


	
	$get_customer="select * from customers where customer_id='$c_id'";

	$run_customer=mysqli_query($conn,$get_customer);

	$row_customer=mysqli_fetch_array($run_customer);

	$customer_email=$row_customer['customer_email'];

	$i++;

	



?>		
					<tr>
								<td>
									<?php echo $i;?>
								</td>
								<td>
									<?php echo $customer_email;?>
								</td>
								<td bgcolor="yellow">
									<?php echo $invoice_no;?>
								</td>
								<td>
									<?php echo $product_title;?>
								</td>
								<td>
									<?php echo $qty;?>
								</td>
								<td>
									<?php echo $size;?>
								</td>
								<td>
									<?php echo $order_date;?>
								</td>
								<td>
									$ <?php echo $due_amount;?>
								</td>
								<td>
<?php 
	if($order_status=='pending')
	{
		echo $order_status='pending';
	}
	else
	{
		echo $order_status='Complete';
	}
 ?>
								</td>
								
								<td>
									<a href="index.php?order_delete=<?php echo $order_id;?>">
										<i class="fa fa-trash-o"></i>
										Delete
									</a>
								</td>
								
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>

			</div>	<!---panel-body End----->
		</div><!----panel panel-default End------>
	</div><!--col-lg-12 End -->
</div><!--2 row End-->


<?php } ?>

