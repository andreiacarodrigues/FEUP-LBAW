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
            {if $ONLYISSUES}
            <form action="{$BASE_URL}pages/admins/adminRentals.php" method="post" autocomplete="on">
                {else}
                <form action="{$BASE_URL}pages/admins/adminRentals.php?issues=1" method="post" autocomplete="on">
                    {/if}
                    <div class="form-group">
                        <div class="input-group">
                            <div class="checkbox checkbox-info">
                                <fieldset>
                                    <legend></legend>
                                    <label>
                                        {if $ONLYISSUES}
                                            <input type="checkbox" onclick="this.form.submit()" title="test" checked>
                                        {else}
                                            <input type="checkbox" onclick="this.form.submit()" title="test">
                                        {/if}
                                        <span>Show only rentals with issue reports</span>
                                    </label>
                                </fieldset>

                            </div>
                        </div>
                    </div>
                </form>
                <br>

                {if count($RENTALS) == 0}
                <div class="empty text-center">
                    <h4> No rentals were made so far. </h4>
                </div>
                {else}

                {$VALUE=1 + ($PAGE * 10)}
                {foreach $RENTALS as $RENTAL}
                    {strip}
                        <div class="rental thumbnail">
                            <div class="row">
                                <div class="container">
                                    <div class="col-md-10">
                                        <ul class="list-unstyled">
                                            <li><h4>Rental #<span>{$VALUE}</span></h4></li>
                                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> User Name:
                                                    <span> {$RENTAL.userName} </span></label></li>
                                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> User
                                                    Contact: <span> {$RENTAL.userPhone} </span></label></li>
                                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> User
                                                    Email: <span> {$RENTAL.userEmail} </span></label></li>
                                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Date:
                                                    <span> {$RENTAL.rentalDate} </span></label></li>
                                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Sports
                                                    Complex: <a
                                                            href="{$BASE_URL}pages/users/sportComplex.php?complexID={$RENTAL.complexID}"> {$RENTAL.complexName} </a></label>
                                            </li>
                                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Sports
                                                    Complex Contact: <span> {$RENTAL.complexPhone} </span></label></li>
                                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Sports
                                                    Complex Email: <span> {$RENTAL.complexEmail} </span></label></li>
                                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Space:<a
                                                            href="{$BASE_URL}pages/users/space.php?spaceID={$RENTAL.spaceID}"> {$RENTAL.spaceName} </a></label>
                                            </li>
                                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Time of
                                                    Start: <span> {$RENTAL.rentalStartTime} </span></label></li>
                                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Duration:
                                                    <span> {$RENTAL.rentalDuration} </span></label></li>
                                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Equipment:
                                                    <span>  {$RENTAL.equipment} </span></label></li>
                                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> State:
                                                    <span>
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
                                                <button type="button" class="btn btn-primary gradient-blue"
                                                        onclick="updateIssueInfo('{$RENTAL.issueSubject}','{$RENTAL.issueDescription}', '{$RENTAL.issueCategory}')"
                                                        data-toggle="modal" data-target="#issuesModal">Issue
                                                </button>
                                            {/if}

                                            {if ($RENTAL.rentalState != "CONCLUDED") && ($RENTAL.rentalState != "CANCELEDBYUSER")
                                            && ($RENTAL.rentalState != "CANCELEDBYMANAGER") && ($RENTAL.rentalState != "CANCELEDBYADMIN")}
                                                <!-- se nao estiver concluida ou cancelada -->
                                                {if $RENTAL.rentalState != "SUSPENDEDBYADMIN"}
                                                    <form class="tr equipmentForm"
                                                          action="{$BASE_URL}actions/admin/changeStateRental.php"
                                                          method="post" autocomplete="on">
                                                        <input type="hidden" value="{$RENTAL.rentalID}"
                                                               name="rentalID"/>
                                                        <input type="hidden" value="suspend" name="type"/>
                                                        <button type="submit" class="btn btn-primary gradient-yellow">
                                                            Suspend
                                                        </button> <!-- só pode concluir ou cancelar -->
                                                    </form>
                                                {/if}
                                                <form class="tr equipmentForm"
                                                      action="{$BASE_URL}actions/admin/changeStateRental.php"
                                                      method="post" autocomplete="on">
                                                    <input type="hidden" value="{$RENTAL.rentalID}" name="rentalID"/>
                                                    <input type="hidden" value="cancel" name="type"/>
                                                    <button type="submit" class="btn btn-primary gradient-red">Cancel
                                                    </button>  <!-- desaparecem opções -->
                                                </form>
                                                <form class="tr equipmentForm"
                                                      action="{$BASE_URL}actions/admin/changeStateRental.php"
                                                      method="post" autocomplete="on">
                                                    <input type="hidden" value="{$RENTAL.rentalID}" name="rentalID"/>
                                                    <input type="hidden" value="conclude" name="type"/>
                                                    <button type="submit" class="btn btn-primary gradient-blue">
                                                        Conclude
                                                    </button>  <!-- desaparecem opções -->
                                                </form>
                                            {/if}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {$VALUE = $VALUE + 1}
                    {/strip}
                {/foreach}

                {$COUNT = 0}

                <br><br>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <ul class="pagination">
                            {while $COUNT  < count($PAGINATION)}
                                {$VALUE = $PAGINATION[$COUNT]}
                                {if $VALUE == ($PAGE + 1)}
                                    <li class="active">
                                        {else}
                                    <li>
                                {/if}
                                {if $ONLYISSUES}
                                    <a href="{$BASE_URL}pages/admins/adminRentals.php?page={$VALUE - 1}&issues=1">{$VALUE}</a>
                                {else}
                                    <a href="{$BASE_URL}pages/admins/adminRentals.php?page={$VALUE - 1}">{$VALUE}</a>
                                {/if}
                                </li>
                                {$COUNT = $COUNT + 1}
                            {/while}
                        </ul>
                    </div>
                </div>
                {/if}
        </div>
    </div>


</div>

<div class="modal fade" id="issuesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelRentals"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title text-center" id="myModalLabelRentals">
                    Issue
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="rental">
                    <div class="row">
                        <div class="container">

                            <ul class="list-unstyled">
                                <li><label> <i class="fa fa-chevron-right" aria-hidden="true"></i> Subject: <span
                                                id="issueSubject">  </span></label></li>
                                <li><label> <i class="fa fa-chevron-right" aria-hidden="true"></i> Category: <span
                                                id="issueCategory">  </span></label></li>
                                <li><label> <i class="fa fa-chevron-right" aria-hidden="true"></i>Description: <span
                                                id="issueDescription">  </span></label></li>
                            </ul>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    function updateIssueInfo(subject, description, category) {
        $('#issueSubject').text(subject);
        $('#issueDescription').text(description);
        $('#issueCategory').text(category);
    }
</script>

{include file='common/footer.tpl'}


