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

            {if count($ISSUES) == 0}
                <div class="empty text-center">
                    <h4> No issues were sent so far. </h4>
                </div>
            {else}
                {$VALUE=1 + ($PAGE * 10)}
                {foreach $ISSUES as $ISSUE}
                    {strip}
                        <div class="rental thumbnail">
                            <div class="row">
                                <div class="container">
                                    <div class="col-md-10">
                                        <ul class="list-unstyled">
                                            <h4> Issue #<span>{$VALUE}</span></h4>
                                            <h5> From: </h5>
                                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Name: <span> {$ISSUE.userName} </span></label></li>
                                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Contact: <span> {$ISSUE.userPhone}  </span></label></li>
                                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Email: <span> {$ISSUE.userEmail}  </span></label></li>
                                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Username: <span> {$ISSUE.userUsername}  </span></label></li>
                                            <br>
                                            <h5> Issue: </h5>
                                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Subject: <span> {$ISSUE.issueSubject}  </span></label></li>
                                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Category: <span>
                                                        {if $ISSUE.issueCategory == "COMPLEXISSUES"}
                                                            Complex Issues
                                                        {/if}
                                                        {if $ISSUE.issueCategory == "REFUNDS"}
                                                            Refunds
                                                        {/if}
                                                        {if $ISSUE.issueCategory == "LASTMINUTECANCELLATION"}
                                                            Last Minute Cancelation
                                                        {/if}
                                            </span></label></li>
                                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Description: <span> {$ISSUE.issueDescription}  </span></label></li>
                                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> State: <span>
                                            {if $ISSUE.issueResolved}
                                                Resolved
                                            {else}
                                                Not resolved
                                            {/if}
                                        </span></label></li>
                                        </ul>

                                    </div>
                                    <div class="col-md-2 text-right mobileFixButtons">
                                        <br>
                                        {if $ISSUE.issueResolved == false}
                                            <form class="tr equipmentForm"
                                                  action="{$BASE_URL}actions/managers/resolveIssue.php" method="post"
                                                  autocomplete="on">
                                                <input type="hidden" name="issueID" value="{$ISSUE.issueID}"/>
                                                <button type="submit" class="btn btn-primary gradient-red"><i
                                                            class="glyphicon glyphicon-remove"></i> Resolve
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
                                        {else}
                                    <li>
                                {/if}
                                <a href="{$BASE_URL}pages/admins/adminIssues.php?page={$VALUE - 1}">{$VALUE}</a>
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


{include file='common/footer.tpl'}