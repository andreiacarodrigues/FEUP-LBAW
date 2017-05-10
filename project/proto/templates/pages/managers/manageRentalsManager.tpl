{include file='common/userHeader.tpl'}

<div class="userRentals">
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

        <a href="{$BASE_URL}pages/users/sportComplex.php?complexID={$complexID}" class="btn btn-primary gradient-blue">Add Rental <i class="fa fa-plus-circle" aria-hidden="true"></i>  </a>
        <hr>
        {$VALUE=1}
        {foreach $RENTALS as $RENTAL}
        {strip}
        {if $VALUE <= count($RENTALS)}
        <div class="rental well well-sm">
            <div class="row">
                <div class="container">
                    <div class="col-md-2">
                        <h4 class="mobileFixText">Rental #<span>{$VALUE}</span></h4>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-unstyled">
                            <p> User Information: </p>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  User: <span> {$RENTAL.userUsername} </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Name: <span> {$RENTAL.userName} </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  User Contact: <span> {$RENTAL.userPhone} </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  User Email: <span> {$RENTAL.userEmail} </span></label></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-unstyled">
                            <p> Reservation Information: </p>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Date: <span> {$RENTAL.rentalDate} </span></label></li>
                            <li> <label><i class="fa fa-chevron-right" aria-hidden="true"></i> Space: <span> {$RENTAL.spaceName} </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Time of Start: <span> {$RENTAL.rentalStartTime} </span></label></li>
                            <li> <label><i class="fa fa-chevron-right" aria-hidden="true"></i> Duration: <span> {$RENTAL.rentalDurationInMinutes} </span></label></li>
                            <li> <label><i class="fa fa-chevron-right" aria-hidden="true"></i> State: <span>
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

                    <div class="col-md-2 mobileFixButtons">
                        {if ($RENTAL.rentalState == "RESERVED") || ($RENTAL.rentalState == "RESERVEDBYMANAGER")}
                        <form id="cancelRentalForm" action="{$BASE_URL}actions/managers/cancelRental.php" method="post" autocomplete="on">
                            <input type="hidden" name="rentalID" value="{$RENTAL.rentalID}"/>
                            <input type="hidden" name="complexID" value="{$complexID}"/>
                            <button type="submit" class="btn btn-primary gradient-red"><i class="glyphicon glyphicon-remove"></i>Cancel</button>
                        </form>
                        {/if}
                    </div>
                </div>
            </div>
        </div>
        {/if}
            {$VALUE = $VALUE + 1}
        {/strip}
        {/foreach}
    </div>
</div>
	
{include file='common/footer.tpl'}

