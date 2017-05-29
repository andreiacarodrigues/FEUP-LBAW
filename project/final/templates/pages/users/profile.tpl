{include file='common/userHeader.tpl'}

<div class="profile">
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
        <h1 class="text-center">Profile Information</h1>
    </div>

    <div class="container">
        <hr class="divider">
        <br>
        <form id="editForm" action="{$BASE_URL}actions/users/editProfile.php" method="post" autocomplete="on">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"> Name </span>
                            <input type="text" title="Name" class="form-control" name="name"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"> Email </span>
                            <input type="text" title="Email address" class="form-control" name="email"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"> Username </span>
                            <input type="text" title="Username" class="form-control" name="username"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"> Contact </span>
                            <input type="tel" title="Phone number" class="form-control" name="tel"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"> Municipality </span>
                            <select class="form-control" name="municipality" title="Municipality">
                                <option value="" disabled selected>Please select a municipality</option>
                                {html_options values=$municipalityIDs output=$municipalityNames}
                            </select>
                        </div>
                    </div>
                    <br>
                    <div style="text-align: center;">
                        <input type="submit" class="btn btn-primary gradient-blue" value="Submit"/>
                    </div>
                </div>
            </div>
        </form>
        <br>
        <a id="changePassword" style="display:block;text-align:center;">Change Password</a>
    </div>

    <div class="container" id="passwordForm">

    </div>

</div>

<script>
    profilePage('{$BASE_URL}');
</script>

{include file='common/footer.tpl'}