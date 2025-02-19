<?php 

	//echo out databse info to the screen
	// foreach ($data['users'] as $user) {
	// 	echo "Information: " . $user->user_name . $user->user_email;
	// 	echo "<br>";
	// }
	
	// isPassengerLoggedIn();
	require APPROOT . '/views/includes/passenger_head.php';
	require APPROOT . '/views/includes/passenger_navigation.php';
?>

<!-- <?php var_dump($_SESSION); ?>  -->
<!--  <?php echo time(); ?>  -->

<!-- form -->
	<div class="body-section">
		<div class="content-row">
		</div>
		<div class="content-row">
		</div>
		<div class="form-container">
			<div class="acc-wrapper">
				<div class="img-container">
					<img src="<?php echo URLROOT ?>/public/img/logoc.jpg">
				</div>  
				<h1 class="title" id="title4">Search Trains</h1>
					   <!--  <div class="acc-title">
					    	Search Trains
					    </div> -->
					    <form action="<?php echo URLROOT;?>/passengerReservations/search?>" method="post">
						    <div class="acc-form">

						    	<label>Source Station *</label>
						    	<div class="acc-inputfield">
						          	<input type="text" name="source" list="stationList" class="acc-input">
									<datalist id="stationList">
										<?php foreach ($data['stations'] as $station):?>
											<option value="<?php echo $station->stationName; ?>">
										<?php endforeach ?>
									</datalist>
						          	<span class="invalidFeedback">
			                            <?php echo $data['srcError'];?>
			                        </span>
						       	</div> 

						       	<label>Destination Station</label>
						       	<div class="acc-inputfield">
						          	<input type="text" name="destination" list="stationList" class="acc-input">
									<datalist id="stationList">
										<?php foreach ($data['stations'] as $station):?>
											<option value="<?php echo $station->stationName; ?>">
										<?php endforeach ?>
									</datalist>
						          	<span class="invalidFeedback">
			                            <?php echo $data['destError'];?>
			                        </span>
						       	</div>   

						       	<label>Departure Date *</label>
						       	<div class="acc-inputfield">
						          	<input type="date" name="date" min="<?php echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d", strtotime("+2 months")); ?>" class="acc-input">
						          	<span class="invalidFeedback">
			                            <?php echo $data['dateError'];?>
			                        </span>
						       	</div>  

						      	<label>Departure Time</label>
						      	<div class="acc-inputfield">
						          	<input type="time" name="time" class="acc-input">
						          	<span class="invalidFeedback">
			                            <?php echo $data['timeError'];?>
			                        </span>
						       	</div> 
						       	
						    	<div class="acc-inputfield">
						        	<input type="submit" name="search" class="acc-btn">
						      	</div>
						    </div>
						</form>
					</div>
		</div>
		<div class="content-row">
		</div>
		<div class="content-row">
		</div>

	</div>
<!-- js for toggle menu -->

<?php require APPROOT . '/views/includes/passenger_footer.php'; ?>

