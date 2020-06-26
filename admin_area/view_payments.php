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
				<i class="fa fa-dashboard"></i> Dashboard / View Payments
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
					<i class="fa fa-money fa-fw"></i> View Payments
				</h3>
			</div>		<!---panel-heading End----->

			<div class="panel-body"><!---panel-body start----->
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>Payment No</th>
								<th>Invoice No</th>
								<th>Amount Paid</th>
								<th>Payment Method</th>
								<th>Reference No</th>
								<th>Payment Date</th>
								<th>Delete Payment</th>
							</tr>
						</thead>

						<tbody>
<?php 
	$i=0;
	$get_payments="select * from payments";
	$run_payments=mysqli_query($conn,$get_payments);

	while($row_payments=mysqli_fetch_array($run_payments)) 
	{
		$payment_id=$row_payments['payment_id'];
		$invoice_no=$row_payments['invoice_no'];
		$amount=$row_payments['amount'];
		$payment_mode=$row_payments['payment_mode'];
		$ref_no=$row_payments['ref_no'];
		$payment_date=$row_orders['payment_date'];
		
		$i++;
?>		
						<tr>
								<td>
									<?php echo $i;?>
								</td>
								<td bgcolor="yellow">
									<?php echo $invoice_no;?>
								</td>
								<td>
									$ <?php echo $amount;?>
								</td>
								<td>
									<?php echo $payment_mode;?>
								</td>
								
								<td>
									<?php echo $ref_no;?>
								</td>
								<td>
									<?php echo $payment_date;?>
								</td>
								<td>
									<a href="index.php?payment_delete=<?php echo $payment_id;?>">
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