<?php
    require APPROOT.'/views/includes/resofficer_head.php';
?>
<?php
    require APPROOT.'/views/includes/resofficer_navigation.php';
?>
        <div class="body-section" id="table">
            <div class="content-row">   
            </div>
            <div class="content-row">
                    <div class="container-table" id="scheduleDiv">
                        <h2 style="color: #13406d;">Ticket Details</h2>
                        <div class="res-table">
                            <table class="blue">
                                <thead>
                                    <tr>
                                        <th>Train ID</th>
                                        <th>Date</th>
                                        <th>Compartment No</th>
                                        <th>Seat No</th>
                                        <th>NIC</th>
                                        <th>Class</th>
                                        <th>Ticket ID</th>   
                                    </tr>
                                </thead>
                                <?php foreach ($data['trains'] as $train):?>
                                <tr>
                                    <td data-th="Train ID"><?php echo $train->trainId?></td>
                                    <td data-th="Date"><?php echo $train->JourneyDate?></td>
                                    <td data-th="Compartment No"><?php echo $train->compartmentNo?></td>
                                    <td data-th="Seat No"><?php echo $train->seatNo?></td>
                                    <td data-th="NIC"><?php echo $train->nic?></td>
                                    <td data-th="Class"><?php echo $train->classtype?></td>
                                    <td data-th="Ticket ID"><?php echo $train->ticketId?></td>
                                   </td>
                                </tr>
                                <?php endforeach;?>
                            </table>
                            <button class="back-btn" onclick="printSchedule('scheduleDiv')"><i class="fa fa-print" aria-hidden="true"></i> Print This Page </button>  
                        </div>      
                    </div>
                </div>
                
            </div>
        </div>
        <script>
            function printSchedule(el) {
                var restorePage= document.body.innerHTML;
                var schedule= document.getElementById(el).innerHTML;
                document.body.innerHTML=schedule;
                window.print();
                document.body.innerHTML=restorePage;
            }
        </script>
<?php
    require APPROOT.'/views/includes/footer.php';
?>

