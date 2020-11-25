<?php 

	require APPROOT . '/views/includes/passenger_head.php';
	require APPROOT . '/views/includes/passenger_navigation.php';
?>

<?php var_dump($_SESSION); ?> 

<!-- Further Details -->
	<div class="body-section"  id="e-ticket">
		<div class="content-row">
		</div>
		<div class="content-row">
		</div>
		<div class="conf-ticket">
			<div class="print-header">
				<img src="<?php echo URLROOT ?>/public/img/logob2.png">
				<p class="title">BOOKING SUCCESSFUL!</p>	
			</div>
			<div class="normal-header">
				<img src="<?php echo URLROOT ?>/public/img/logob2.png">
				<h1 class="title">BOOKING SUCCESSFUL!</h1>
				<div class="summary">
					<center><p>Thank you for booking with us!</p></center>
				</div>
			</div>
			<div class="summary">
				<p><b>Your Ticket ID: B9RBYQ</b></p>
				<p><b>Booking Date: 26th November 2020  23:00</b></p>
			</div>
			<div id="policy" class="summary">
				<p>We recommend that you print this page and bring it with you. You have been sent an email with a copy of the reservation details. You may also view your reservation details online at any time.</p>
				<button onclick="printContent('e-ticket')" class="print"><i class="fa fa-print" aria-hidden="true"></i> Print This Page </button>
			</div>
	
		
			<div class="summary-header">
				<h3>CUSTOMER DETAILS</h3>
			</div>
			<div class=summary>
				<table class="content-table">
					<tbody>
						<tr>
							<td><b>Customer Name:</b></td>
							<td>John Doe</td>
						</tr>
						<tr>
							<td><b>NIC:</b></td>
							<td>976709531V</td>
						</tr>
						<tr>
							<td><b>Address Number:</b></td>
							<td>40</td>
						</tr>
						<tr>
							<td><b>Street:</b></td>
							<td>Park Street</td>
						</tr>
						<tr>
							<td><b>City/Town:</b></td>
							<td>Colombo 7</td>
						</tr>
						<tr>
							<td><b>Country:</b></td>
							<td>Sri Lanka</td>
						</tr>
						<tr>
							<td><b>Phone:</b></td>
							<td>+94 777 875634</td>
						</tr>
						<tr>
							<td><b>Email:</b></td>
							<td>user1@gmail.com</td>
						</tr>
					</tbody>
				</table>
			</div>

			
			<div class="summary-header">
				<h3>YOUR JOURNEY</h3>
			</div>
			<div class=summary>
				<div class="journey">
					Colombo Fort <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Badulla
				</div>
				<div class="journey-row">
					<div class="journey-details">
						<p>Intercity Express - <b>Denuwara Menike</b></p>
						<p><i class="fa fa-calendar-o" aria-hidden="true"></i> 20th June 2020</p>
						<p><i class="fa fa-clock-o" aria-hidden="true"></i> 6.30 AM -> 15.01 AM</p>
						<p><i class="fa fa-clock-o" aria-hidden="true"></i> 8 hrs 43 mins</p>
						<p>Train to Badulla</p>
					</div>
					<div class="journey-seats">
						<p>Train ID: 1001</p>
						<p>Seat Numbers:</p>

							<ul>
								<li>Compartment 1 :  21 , 22</li>
								<li>Compartment 2 :  33 , 34</li>
							</ul> 
						
					</div>
				</div>
			</div>
	
			
			<div class="summary-header">
				<h3>BOOKING AND PAYMENT SUMMARY</h3>
			</div>
			<div class="summary">
				<table class="content-table">
					<thead>
						<tr>
							<td>Type</td>
							<td>Price</td>
							<td>Quantity</td>
							<td>Total</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>First Class</td>
							<td>Rs. 1700.00</td>
							<td>2</td>
							<td>Rs. 3400.00</td>
						</tr>
						<tr>
							<td>Second Class</td>
							<td>Rs. 1000.00</td>
							<td>2</td>
							<td>Rs. 2000.00</td>
						</tr>
						<tr class="grand-total">
							<td>Total</td>
							<td></td>
							<td></td>
							<td>Rs. 4400.00</td>
						</tr>
						<tr></tr>
						<tr class="grand-total">
							<td>Total Payment</td>
							<td></td>
							<td></td>
							<td>Rs. 4400.00</td>
						</tr>
					</tbody>
				</table>
			</div>
	
		
			<div id="cancel-policy" class="summary">
				<div class="summary-header">
					<h3>CANCELLATION POLICY</h3>
				</div>
				<p>Deposit is non-refundable and will be charged to your credit card.</p>
				<p>A passenger is entitled to a refund on the ticket price if a train journey is marked as cancelled, regardless of the reason. A full refund can be obtained by producing the email confirmation/e-ticket at the counter.</p>
			</div>
			<br>

			<div id="contact" class="summary">
				<div class="journey-row">
					<div class="journey-details">
						<h3>WE'RE HERE TO HELP!</h3>
						<p>Any further queries? Please contact us for assistance</p>
					</div>
					<div class="journey-seats">
						<ul>
							<li><i class="fa fa-phone" aria-hidden="true"></i> +940112-695-722</li>
							<li><i class="fa fa-phone" aria-hidden="true"></i> +940112-696-722</li>
							<li><i class="fa fa-at" aria-hidden="true"></i> raillanka@gmail.com</li>
						</ul>
					</div>
				</div>
			</div>
			<div id="print-contact">
				<p>Please contact us for assistance:  <i class="fa fa-phone" aria-hidden="true"></i> +940112-695-722 / <i class="fa fa-at" aria-hidden="true"></i> raillanka@gmail.com</p>
			</div>
			<br><br>	
			<button onclick="location.href='<?php echo URLROOT; ?>/passengerAccounts/displayTickets'" class="btn checkout-btn">View All Tickets</button>
		</div>
		<div class="content-row">		
		</div>
	</div>
	<!-- end of further details -->

	<div class="popup-box" id="booking-successful">
		<i class="fa fa-check" aria-hidden="true" style="color:#279427; border-color:#279427"></i>
		<h1>Booking Successful</h1>
		<label style="color:#279427">Thank you for booking with us!</label>
		<div class="btns">
			<a href="#" class="btn1">Close</a>
		</div>
	</div>

	<!-- js for printing e-ticket -->
	<script>
		function printContent(el){
			var restorepage = document.body.innerHTML;
			var printContent = document.getElementById(el).innerHTML;
			document.body.innerHTML = printContent;
			window.print();
			document.body.innerHTML = restorepage;
		}
	</script>
	<!-- end of js for printing e-ticket -->

	<!-- js for pop up alert  -->
	<script>
		$(document).ready(function(){
			setTimeout(function(){
      			$('.popup-box').css({
					"opacity":"1",
					"pointer-events":"auto"
				});
   			},500);
			$('.btn1').click(function(){
				$('.popup-box').css({
					"opacity":"0",
					"pointer-events":"none"
					// "left":"event.pageX"
					// "top":"event.pageY"
				});
			});
			$('.btn2').click(function(){
				$('.popup-box').css({
					"opacity":"0",
					"pointer-events":"none"
				});
				window.location.href='<?php echo URLROOT; ?>/pages/index';

			});
		});
	</script>
	<!-- end of js for pop up alert  -->
	
<?php require APPROOT . '/views/includes/passenger_footer.php'; ?>