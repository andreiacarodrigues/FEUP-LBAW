{include file='common/userHeader.tpl'}

<div class="manageComplexManagers">
    <div class="container">
        <form action="{$BASE_URL}actions/managers/addManager.php" method="post" autocomplete="on">
            <div class="form-group form-inline">
                <div class="input-group emailInput">
                    <span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="managerEmail" placeholder="Enter the manager's email"
                           title="New manager's email address"/>
                </div>
                <button type="submit" class="btn btn-primary gradient-yellow">Add Manager <i class="fa fa-plus-circle"
                                                                                             aria-hidden="true"></i>
                </button>
                <input type="hidden" name="complexID" value="{$COMPLEX_ID}">
                <div class="row errorMessage">
                        <span>
                            {foreach $ERROR_MESSAGES as $error}
                                <div class="error">{$error}</div>
                            {/foreach}
                        </span>
                </div>
            </div>
        </form>
        <hr>
        <div class="row">
            {foreach $MANAGER_INFORMATION as $INFORMATION}
                <div class="col-md-3">
                    <div class="thumbnail">
                        <div class="caption">
                            <h5 class="text-center">{$INFORMATION.userName}</h5><br>
                            <ul class="list-unstyled">
                                    <li> <label><i class="fa fa-chevron-right" aria-hidden="true"></i> Email: <span> {$INFORMATION.userEmail} </span>
                                </label></li>
                                    <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Contact: <span> {$INFORMATION.userPhone} </span>
                                </label></li>
                            </ul>
                            <div class="text-center">
                                <form id="remove-manager-{$INFORMATION.managerID}" method="post"
                                      action="{$BASE_URL}actions/managers/removeManager.php">
                                    <input type="hidden" name="managerID" value="{$INFORMATION.managerID}">
                                    <input type="hidden" name="complexID" value="{$COMPLEX_ID}">
                                    <button type="submit" class="btn btn-primary gradient-red">Remove</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            {/foreach}
        </div>
    </div>
</div>
<script>
    $(function () {
        complexManagers();
    });
</script>

{include file='common/footer.tpl'}



