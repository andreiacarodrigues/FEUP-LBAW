{include file='common/adminHeader.tpl'}

<div class="admin-statistics-header">
    <div class="admin adminRequests">
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

            {foreach $REQUESTS as $REQUEST}
                {strip}
                    <div class="row">
                        <div class="container thumbnail">
                            <div class="col-md-6">
                                <br>
                                <ul class="list-unstyled">
                                    <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Username: <span> {$REQUEST.adminUsername} </span></label></li>
                                </ul>
                            </div>
                            <div class="col-md-6 text-right mobileFixButtons">

                                <form class="form-inline" action="{$BASE_URL}actions/admin/adminRequests.php"
                                      method="post" autocomplete="on">
                                    <input type="hidden" value="{$REQUEST.adminID}" name="adminID"/>
                                    <input type="hidden" value="accept" name="todo"/>
                                    <button type="submit" class="btn btn-primary gradient-blue">Accept</button>
                                </form>

                                <form class="form-inline" action="{$BASE_URL}actions/admin/adminRequests.php"
                                      method="post" autocomplete="on">
                                    <input type="hidden" value="{$REQUEST.adminID}" name="adminID"/>
                                    <input type="hidden" value="remove" name="todo"/>
                                    <button type="submit" class="btn btn-primary gradient-red">Remove</button>
                                </form>
                            </div>

                        </div>
                    </div>
                {/strip}
            {/foreach}

        </div>
    </div>
</div>

{include file='common/footer.tpl'}