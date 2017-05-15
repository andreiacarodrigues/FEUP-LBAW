{include file='common/adminHeader.tpl'}

 <div class="admin-statistics-header">
    <div class="admin adminRentals">

    <div class="container">
        <div class="row">
            {if $SUCCESS_MESSAGES != ""}
                {foreach $SUCCESS_MESSAGES as $message}
                    <div class="alert alert-info alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{$message}</strong>
                    </div>
                {/foreach}
            {/if}
            {if $ERROR_MESSAGES != ""}
                {foreach $ERROR_MESSAGES as $message}
                    <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{$message}</strong>
                    </div>
                {/foreach}
            {/if}
        </div>
        <div class="form-group">
        <div class="input-group">
            <div class="checkbox checkbox-info">
                <label>
                    <input type="checkbox" value="">
                    <span>Show only rentals with issue reports</span>
                </label>

            </div>
        </div>
        </div>
        <br>

        {$VALUE=1}
        {foreach $RENTALS as $RENTAL}
        {strip}

        <div class="rental thumbnail">
            <div class="row">
                <div class="container">
                    <div class="col-md-10">
                        <ul class="list-unstyled">
                            <h4>Rental #<span>{$VALUE}</span></h4>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  User Name: <span> {$RENTAL.userName} </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  User Contact: <span> {$RENTAL.userPhone} </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  User Email: <span> {$RENTAL.userEmail} </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Date: <span> {$RENTAL.rentalDate} </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Sports Complex: <span> {$RENTAL.complexName} </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Sports Complex Contact: <span> {$RENTAL.complexPhone} </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Sports Complex Email: <span> {$RENTAL.complexEmail} </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Space: <span> {$RENTAL.spaceName} </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Time of Start: <span> {$RENTAL.rentalStartTime} </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Duration: <span> {$RENTAL.rentalDurationInMinutes} </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Equipment: <span>  {$RENTAL.equipment} </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  State: <span>
                                                    {if $RENTAL.rentalState == "RESERVED"}
                                                        Reserved
                                                    {/if}
                                        {if $RENTAL.rentalState == "RESERVEDBYMANAGER"}
                                            Reserved By Manager
                                        {/if}
                                        {if $RENTAL.rentalState == "CANCELEDBYUSER"}
                                            Canceled By User
                                        {/if}
                                        {if $RENTAL.rentalState == "CANCELEDBYMANAGER"}
                                            Canceled By Manager
                                        {/if}
                                        {if $RENTAL.rentalState == "WAITINGUSERFEEDBACK"}
                                            Waiting For User Feedback
                                        {/if}
                                        {if $RENTAL.rentalState == "SUSPENDEDBYADMIN"}
                                            Suspended By An Administrator
                                        {/if}
                                        {if $RENTAL.rentalState == "CONCLUDED"}
                                            Concluded
                                        {/if}
                                                </span></label></li>
                        </ul>
                    </div>
                    <div class="col-md-2 text-right mobileFixButtons">
                            <br>
                        <div class="row rentalTabletBtns">
                            {if $RENTAL.issueSubject != "NO_ISSUE"}
                                <button type="button" class="btn btn-primary gradient-blue" onclick="updateIssueInfo('{$RENTAL.issueSubject}','{$RENTAL.issueDescription}', '{$RENTAL.issueCategory}')" data-toggle="modal" data-target="#issuesModal">Issue</button>
                            {/if}
                            <button type="button" class="btn btn-primary gradient-yellow">Suspend</button>
                            <button type="button" class="btn btn-primary gradient-red">Remove</button>
                            <button type="button" class="btn btn-primary gradient-blue">Conclude</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            {$VALUE = $VALUE + 1}
        {/strip}
        {/foreach}
            </div>
        </div>


</div>

        <div class="modal fade" id="issuesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title text-center" id="myModalLabel">
                            Issue
                        </h4>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <div class="rental">
                            <div class="row">
                                <div class="container">

                                        <ul class="list-unstyled">
                                            <li><label> <i class="fa fa-chevron-right" aria-hidden="true"></i>  Subject: <span id="issueSubject">  </span></label></li>
                                            <li><label> <i class="fa fa-chevron-right" aria-hidden="true"></i>  Category: <span id="issueCategory">  </span></label></li>
                                            <li><label> <i class="fa fa-chevron-right" aria-hidden="true"></i>Description: <span id="issueDescription">  </span></label></li>
                                        </ul>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{include file='common/footer.tpl'}


<script>

   function updateIssueInfo(subject,description,category)
   {
       $('#issueSubject').text(subject);
       $('#issueDescription').text(description);
       $('#issueCategory').text(category);
   }
</script>