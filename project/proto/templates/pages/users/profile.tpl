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
        <hr class="divider"><br>
            <form id="editForm" action="{$BASE_URL}actions/users/editProfile.php" method="post" autocomplete="on">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> Name </span>
                                <input type="text" class="form-control" name="name"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> Email </span>
                                <input type="text" class="form-control" name="email"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> Username </span>
                                <input type="text" class="form-control" name="username"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> Contact </span>
                                <input type="tel" class="form-control" name="tel"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> Municipality </span>
                                <select class="form-control"  name="municipality"  title="">
                                    <option value="" name="disabled" disabled selected></option>
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


{include file='common/footer.tpl'}


<script>
    $(function(){
        var urlInfo = '{$BASE_URL}actions/users/profile.php';
        $.getJSON(urlInfo ,
            function(data){
                $('input[name="name"]').attr("value", data['userName']);
                $('input[name="username"]').attr("value", data['userUsername']);
                $('input[name="tel"]').attr("value", data['userPhone']);
                $('input[name="email"]').attr("value", data['userEmail']);
                $('select[name="municipality"]').val(data['userMunicipalityID']);
               /* $('#infoLocation').text(data['location']);
                var openOnWeekends = "yes";
                if(data['openOnWeekends'] == "false")
                    openOnWeekends = "no";

                $('#infoOpenOnWeekends').text(openOnWeekends);
                $('#infoEmail').text(data['email']);
                $('#infoContact').text(data['contact']);
                $('#infoDescription').text(data['description']);
                $('#infoHours').text(data['openingHour'] + "-" + data['closingHour']);*/
            });
    });

    $('#changePassword').click(function(){
        $('#passwordForm').append(
            "<hr class='divider'>" +
            "<br>" +
            "<p class='text-center'> Your new password must have at least 6 characters/digits. </p>"+
            "<form id='newPasswordForm' action='{$BASE_URL}actions/users/editPassword.php' method='post' autocomplete='on'>" +
            "<div class='row'>" +
            "<div class='col-md-10 col-md-offset-1'>"+

            "<div class='form-group'>"+
            "<div class='input-group'>"+
            "<span class='input-group-addon'> <i class='fa fa-lock fa-lg'></i></span>"+
            "<input type='password' class='form-control' name='password' placeholder='Enter your Current Password'/>"+
            "</div>"+
            "</div>"+

            "<div class='form-group'>"+
            "<div class='input-group'>"+
            "<span class='input-group-addon'> <i class='fa fa-lock fa-lg'></i></span>"+
            "<input type='password' class='form-control' name='newPassword' placeholder='Enter your New Password'/>"+

            "</div>" +
            "</div>"+


            "<div class='form-group'>"+
            "<div class='input-group'>"+
            "<span class='input-group-addon'><i class='fa fa-lock fa-lg' aria-hidden='true'></i></span>"+
            "<input type='password' class='form-control' name='newPasswordConfirm'  placeholder='Confirm your New Password'/>"+
            "</div>"+
            "</div>"+

            "<div style='text-align: center;'>"+
            "<br>"+
            "<input type='submit' class='btn btn-primary gradient-blue' value='Change Password'/>"+
            "</div>"+
            "</div>"+
            "</form>"+
            "<br>"+"<br>"
        );

        $('#changePassword').css("visibility", "hidden");
    });

    $('[data-toggle="tooltip"]').tooltip();


</script>