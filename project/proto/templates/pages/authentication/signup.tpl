{include file='common/userHeader.tpl'}

<div class="intro-header">
    <div class="container">
        <div class="row">
            <div class="intro-message">
                <h1>Sign Up</h1>
                <hr class="intro-divider">
                <form id="signupForm" class="searchForm" action="{$BASE_URL}actions/authentication/signup.php" method="post" autocomplete="on">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="name" placeholder="Enter your Name"/>
                                </div>
                            </div>
                            <div class="outerErrorMessage">
                                <span id="invalidName"></span>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="email" placeholder="Enter your Email"/>
                                </div>
                            </div>
                            <div class="outerErrorMessage">
                                <span id="invalidEmail"></span>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="username" placeholder="Enter your Username"/>
                                </div>
                            </div>
                            <div class="outerErrorMessage">
                                <span id="invalidUsername"></span>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="contact" placeholder="Enter your Phone Number"/>
                                </div>
                            </div>
                            <div class="outerErrorMessage">
                                <span id="invalidContact"></span>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"> <i class="glyphicon glyphicon-globe"></i></span>
                                    <select class="form-control"  name="municipality"  title="">
                                        <option value="" name="disabled" disabled selected></option>
                                        {html_options values=$municipalityIDs output=$municipalityNames}
                                    </select>
                                </div>
                            </div>
                            <div class="outerErrorMessage">
                                <span id="invalidMunicipality"></span>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="password"  placeholder="Enter your Password"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="confirm"  placeholder="Confirm your Password"/>
                                </div>
                            </div>
                            <div class="outerErrorMessage">
                                <span id="invalidPassword"></span>
                            </div>
                            <div class="outerErrorMessage">
                                <span id="invalidConfirmation"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row errorMessage">
                        <span>
                            {foreach $ERROR_MESSAGES as $error}
                                <div class="error">{$error}</div>
                            {/foreach}
                        </span>
                    </div>
                    <input type="submit" class="btn btn-primary btn-lg gradient-blue" value="Register"/>
                </form>
            </div>
        </div>
    </div>
</div>

{include file='common/footer.tpl'}



<script>
    $(function(){
        $('form').submit(function(){

            // Prevents from submiting

            var error = false;


            // Variables

            var name = $("input[name='name']").val();
            var email = $("input[name='email']").val();
            var username = $("input[name='username']").val();
            var contact = $("input[name='contact']").val();
            var municipality = $("select[name='municipality']").val();
            var password = $("input[name='password']").val();
            var confirm = $("input[name='confirm']").val();

            // Error Check

            if(name == "" || email == "" || username == "" || contact == "" || municipality == null || password == "" || confirm == "") {
                $('#invalidName').text("");
                $('#invalidEmail').text("");
                $('#invalidUsername').text("");
                $('#invalidContact').text("");
                $('#invalidPassword').text("");
                $('#invalidConfirmation').text("");
                $('.errorMessage').text("Required field wasn't filled.");
                return false;
            }

            $('.errorMessage').text("");

            if(!is_name(name)) {
                error = true;
                $('#invalidName').text("Invalid name.");
            }

            if(!is_email(email)){
                error = true;
                $('#invalidEmail').text("Invalid email. Should be in the form xxx@yyy.zzz.");
            }

            if(!is_username(username)) {
                error = true;
                $('#invalidUsername').text("Invalid username.");
            }

            if(!is_contact(contact)){
                error = true;
                $('#invalidContact').text("Invalid phone number. It should be 9 digits in the form xxxxxxxxx or xxx-xxx-xxx.");
            }

            if(!is_password(password)){
                error = true;
                $('#invalidPassword').text("Invalid password. Should have more than 6 characters.");
            }
            else if(password != confirm){
                error = true;
                $('#invalidConfirmation').text("Passwords do not match.");
            }

            alert(error);
            if(error)
                return false;

        });
    });
</script>