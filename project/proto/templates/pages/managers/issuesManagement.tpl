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

        <a href="#" class="btn btn-primary gradient-blue" data-toggle="modal" data-target="#issueModal">Add Issue <i class="fa fa-plus-circle" aria-hidden="true"></i>  </a>

        {$VALUE=1}
        {foreach $ISSUES1 as $ISSUE}
        {strip}
        {if $VALUE <= (count($ISSUES1) + count($ISSUES2))}
        <hr>
        <div class="rental well well-sm">
            <div class="row">
                <div class="container">
                        <div class="col-md-2">
                            <h4 class="mobileFixText">Issue #<span>{$VALUE}</span></h4>
                        </div>
                                <div class="col-md-4">
                                    <ul class="list-unstyled">
                                        <p> User and Rental Information: </p>
                                        <li><label> <i class="fa fa-chevron-right" aria-hidden="true"></i>  User Name: <span> {$ISSUE.userName} </span></label></li>
                                        <li><label> <i class="fa fa-chevron-right" aria-hidden="true"></i>  User Contact: <span> {$ISSUE.userPhone} </span></label></li>
                                        <li><label> <i class="fa fa-chevron-right" aria-hidden="true"></i>  User Email: <span> {$ISSUE.userEmail} </span></label></li>

                                        <li><label> <i class="fa fa-chevron-right" aria-hidden="true"></i>  Rental Date: <span> {$ISSUE.rentalDate} </span></label></li>
                                        <li><label> <i class="fa fa-chevron-right" aria-hidden="true"></i>  Rental Start Time: <span> {$ISSUE.rentalStartTime} </span></label></li>
                                        <li><label> <i class="fa fa-chevron-right" aria-hidden="true"></i>  Rental Space: <span> {$ISSUE.spaceName} </span></label></li>
                                        <li><label> <i class="fa fa-chevron-right" aria-hidden="true"></i>  Rental State: <span> {$ISSUE.rentalState} </span></label></li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul class="list-unstyled">
                                        <p> Issue Information: </p>
                                        <li> <label> <i class="fa fa-chevron-right" aria-hidden="true"></i>Subject: <span> {$ISSUE.issueSubject} </span></label></li>
                                        <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Category: <span> {$ISSUE.issueCategory} </span></label></li>
                                        <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Description: <span>{$ISSUE.issueDescription} </span></label></li>
                                        <li> <label> <i class="fa fa-chevron-right" aria-hidden="true"></i>Resolved: <span>
                                         {if $ISSUE.issueResolved == true}
                                             Yes
                                         {else}
                                             No
                                         {/if}
                                        </span></label></li>
                                    </ul>
                                </div>
                    <div class="col-md-2 mobileFixButtons">
                        {if $ISSUE.issueResolved == false}
                            <form class="tr equipmentForm" action="{$BASE_URL}actions/managers/resolveIssue.php" method="post" autocomplete="on">
                                <input type="hidden" name="complexID" value="{$complexID}" />
                                <input type="hidden" name="issueID" value="{$ISSUE.issueID}" />
                                <button type="submit" class="btn btn-primary gradient-red"><i class="glyphicon glyphicon-remove"></i> Resolve </button>
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

        {foreach $ISSUES2 as $ISSUE}
        {strip}
        {if $VALUE <= (count($ISSUES1) + count($ISSUES2))}

            <hr>
            <div class="rental well well-sm">
            <div class="row">
            <div class="container">
            <div class="col-md-2">
                <h4 class="mobileFixText">Issue #<span>{$VALUE}</span></h4>
            </div>
            <div class="col-md-8">
                <ul class="list-unstyled">
                    <p> Issue Information: </p>
                    <li> <label> <i class="fa fa-chevron-right" aria-hidden="true"></i>Subject: <span> {$ISSUE.issueSubject} </span></label></li>
                    <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Category: <span> {$ISSUE.issueCategory} </span></label></li>
                    <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Description: <span>{$ISSUE.issueDescription} </span></label></li>
                    <li> <label> <i class="fa fa-chevron-right" aria-hidden="true"></i>Resolved: <span>
                                          {if $ISSUE.issueResolved == true}
                                             Yes
                                         {else}
                                             No
                                         {/if}
                            </span></label></li>
                </ul>
            </div>

            <div class="col-md-2 mobileFixButtons">
                {if $ISSUE.issueResolved == false}
                <form class="tr equipmentForm" action="{$BASE_URL}actions/managers/resolveIssue.php" method="post" autocomplete="on">
                    <input type="hidden" name="complexID" value="{$complexID}" />
                    <input type="hidden" name="issueID" value="{$ISSUE.issueID}" />
                    <button type="submit" class="btn btn-primary gradient-red"><i class="glyphicon glyphicon-remove"></i> Resolve </button>
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

        <!------------------------>

        <!-- Modal -->
        <div  class="modal fade" id="issueModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title text-center" id="myModalLabel">
                            New Issue
                        </h4>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form id="issueForm" action="{$BASE_URL}actions/users/newIssue.php" method="post" autocomplete="on" class="form-horizontal" role="form">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <input type="hidden" name="complexID" value="{$complexID}">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon primary">Subject</span>
                                            <input type="text" name="subject" class="form-control">
                                        </div>
                                        <input type="hidden" name="to" value="forManager"/>
                                        <div class="input-group">
                                            <span class="input-group-addon primary">Category</span>
                                            <select class="form-control" name="category" title="">
                                                <option value="" disabled selected></option>
                                                <option>COMPLEXISSUES</option>
                                                <option>REFUNDS</option>
                                                <option>LASTMINUTECANCELLATION</option>
                                            </select>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon primary">Description</span>
                                            <textarea class="form-control" rows="5" name="description"></textarea>
                                        </div>
                                    </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary gradient-blue">Submit</button>
                                        </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    </div>
</div>

	
{include file='common/footer.tpl'}

