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

        <a href="{$BASE_URL}pages/users/sportComplex.php?complexID={$complexID}" class="btn btn-primary gradient-blue">Add
            Rental <i class="fa fa-plus-circle" aria-hidden="true"></i> </a>
        <hr>

        {if count($RENTALS) == 0}
            <div class="emptyRentals">
                <h4> This sports complex doesn't have any rentals so far. </h4>
            </div>
        {else}
            {$VALUE=1 + ($PAGE * 10)}
            {foreach $RENTALS as $RENTAL}
                {strip}
                    <div class="rental well well-sm">
                        <div class="row">
                            <div class="container">
                                <div class="col-md-2">
                                    <h4 class="mobileFixText">Rental #<span>{$VALUE}</span></h4>
                                </div>
                                <div class="col-md-4">
                                    <ul class="list-unstyled">
                                        <p> User Information: </p>
                                        <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> User:
                                                <span> {$RENTAL.userUsername} </span></label></li>
                                        <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Name:
                                                <span> {$RENTAL.userName} </span></label></li>
                                        <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> User Contact:
                                                <span> {$RENTAL.userPhone} </span></label></li>
                                        <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> User Email:
                                                <span> {$RENTAL.userEmail} </span></label></li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul class="list-unstyled">
                                        <p> Reservation Information: </p>
                                        <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Date:
                                                <span> {$RENTAL.rentalDate} </span></label></li>
                                        <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Space: <a
                                                        href="{$BASE_URL}pages/users/space.php?spaceID={$RENTAL.spaceID}"> {$RENTAL.spaceName} </a></label>
                                        </li>
                                        <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Time of Start:
                                                <span> {$RENTAL.rentalStartTime} </span></label></li>
                                        <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Duration:
                                                <span> {$RENTAL.rentalDuration} </span></label></li>
                                        <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Equipment:
                                                <span> {$RENTAL.equipment} </span></label></li>
                                        <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> State: <span>
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
                                        <form id="cancelRentalForm"
                                              action="{$BASE_URL}actions/managers/cancelRental.php" method="post"
                                              autocomplete="on">
                                            <input type="hidden" name="rentalID" value="{$RENTAL.rentalID}"/>
                                            <input type="hidden" name="complexID" value="{$complexID}"/>
                                            <button type="submit" class="btn btn-primary gradient-red"><i
                                                        class="glyphicon glyphicon-remove"></i>Cancel
                                            </button>
                                        </form>
                                    {/if}
                                </div>
                            </div>
                        </div>
                    </div>
                    {$VALUE = $VALUE + 1}
                {/strip}
            {/foreach}

            {$COUNT = 0}
            <br>
            <br>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <ul class="pagination">
                        {while $COUNT  < count($PAGINATION)}
                            {$VALUE = $PAGINATION[$COUNT]}
                            {if $VALUE == ($PAGE + 1)}
                                <li class="active">
                                    <a href="{$BASE_URL}pages/managers/manageRentalsManager.php?complexID={$complexID}&page={$VALUE - 1}">{$VALUE}</a>
                                </li>
                            {else}
                                <li>
                                    <a href="{$BASE_URL}pages/managers/manageRentalsManager.php?complexID={$complexID}&page={$VALUE - 1}">{$VALUE}</a>
                                </li>
                            {/if}
                            {$COUNT = $COUNT + 1}

                        {/while}

                    </ul>
                </div>
            </div>
        {/if}
    </div>
</div>


{include file='common/footer.tpl'}

