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

                {$VALUE = 1 + ($PAGE * 10)}

                {foreach $USERS as $USER}
                {strip}

            <div class="rental thumbnail">
                <div class="row">
                    <div class="container">
                        <div class="col-md-10">
                            <ul class="list-unstyled">
                                <h4>User #<span>{$VALUE}</span></h4>
                                <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Name: <span> {$USER.userName} </span></label></li>
                                <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Contact: <span> {$USER.userPhone}  </span></label></li>
                                <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Email: <span> {$USER.userEmail}  </span></label></li>
                                <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Username: <span> {$USER.userUsername}  </span></label></li>
                            </ul>

                        </div>
                        <div class="col-md-2 text-right mobileFixButtons">
                            <br>
                            {if $USER.userIsBanned == true}
                                <form action="{$BASE_URL}actions/admin/unblockUser.php" method="get" class="form-horizontal" role="form">
                                    <input type="hidden" name="user" value="{$USER.userID}">
                                    <button type="submit" class="btn btn-primary gradient-blue"><i class="glyphicon glyphicon-remove"></i> Unblock </button>
                                </form>
                            {else}
                                <form action="{$BASE_URL}actions/admin/blockUser.php" method="get" class="form-horizontal" role="form">
                                    <input type="hidden" name="user" value="{$USER.userID}">
                                    <button type="submit" class="btn btn-primary gradient-red"><i class="glyphicon glyphicon-remove"></i> Block </button>
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

                <br><br>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <ul class="pagination">
                        {while $COUNT  < count($PAGINATION)}
                            {$VALUE = $PAGINATION[$COUNT]}
                        {if $VALUE == ($PAGE + 1)}
                            <li class="active">
                                <a href="{$BASE_URL}pages/admins/adminUsers.php?page={$VALUE - 1}">{$VALUE}</a>
                            </li>
                        {else}
                            <li>
                                <a href="{$BASE_URL}pages/admins/adminUsers.php?page={$VALUE - 1}">{$VALUE}</a>
                            </li>
                        {/if}
                            {$COUNT = $COUNT + 1}

                        {/while}

                        </ul>
                    </div>
                </div>

            </div>
            </div>
        </div>




{include file='common/footer.tpl'}