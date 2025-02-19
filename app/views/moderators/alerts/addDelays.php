<?php
    require APPROOT.'/views/includes/moderator_head.php';
?>
<?php
    require APPROOT.'/views/includes/moderator_navigation.php';
?>
    <script src="<?php echo URLROOT;?>/javascript/alertValidations/delayValidation.js"></script>
<div class="marquee-area info-tag">
	<marquee>
		<i class="fa fa-exclamation-triangle" aria-hidden="true" size="3x"></i> Coronavirus(COVID-19) - For the latest updates and travel information, please visit our Coronavirus Information Center
	</marquee>
</div>
                            
    <div class="body-section">
        <div class="content-flexrow">
            <div class="container">
                <div class="text">Add Alerts <small>Delays</small></div>
                <form action="<?php echo URLROOT;?>/moderatoralerts/createDelayAlerts" method="POST">
                    <div class="form-row">
                        <div class="input-data">
                            <label for="trainid">Train Id</label>
                            <input list="trains" name="trainid" id="trainid" required >
                            <datalist id="trains">
                                <?php foreach ($data['trains'] as $train ):?> 
                                    <option value="<?php echo $train->trainId;?>"><?php echo $train->trainId.' '.$train->name?></option>
                                <?php endforeach;?>
                            </datalist>
                            <span class="invalidFeedback">
                                    <?php echo $data['trainIdError'];?>
                            </span> 
                        </div>
                        <div class="input-data">
                            <label for="delaytime">Estimated Delay Time</label>
                            <input type="number" name="delaytime" id="delaytime" step="5" placeholder="Estimated Delay in Minutes" required >
                            <span class="invalidFeedback">
                                    <?php echo $data['delayTimeError'];?>
                            </span> 
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="input-data">
                            <label for="delayDate">Cancellation Date</label>
                            <input type="date" name="delaydate" id="delaydate" required>
                            <span class="invalidFeedback">
                                <?php echo $data['delayDateError'];?>
                            </span>
                        </div>
                        <div class="input-data">
                            <label for="issueType">Issue Type</label>
                            <select name="issueType" id="issueType">
                                <option value="Unspecified" selected>Unspecified</option>
                                <option value="Environmental" >Environmental</option>
                                <option value="Technical" >Technical</option>
                                <option value="Rail Road" >Rail Road</option>
                                <option value="Other" >Other</option>
                            </select>
                            <span class="invalidFeedback">
                                <?php echo $data['issueTypeError'];?>
                            </span>
                        </div>
                    </div>
                    <!-- <div class="form-row">
                        <div class="input-data">
                            <label for="delaytime">New Date & Time</label>
                            <input type="time" id="delaytime" required >
                        </div>
                    </div> -->
                    <div class="form-row">
                        <div class="input-data textarea">
                                <label for="delaycause">Delay-Cause</label>
                                <textarea name="delaycause" id="delaycause" cols="30" rows="10" required></textarea>
                                <span class="invalidFeedback">
                                    <?php echo $data['delayCauseError'];?>
                            </span> 
                        </div>
                    </div>
                    <div class="form-row submit-btn">
                        <div class="input-data">
                            <input type="submit" class="blue-btn" value="Add Alert">
                        </div> 
                        <div class="input-data">
                            <input type="button" onclick="history.go(-1);" class="red-btn" value="Back">
                        </div>
                    </div>
                </form>
        
            </div>
        </div>    
    </div>
        

<?php
    require APPROOT.'/views/includes/footer.php';
?>