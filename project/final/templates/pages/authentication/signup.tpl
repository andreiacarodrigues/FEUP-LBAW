{include file='common/userHeader.tpl'}

<div class="intro-header">
    <div class="container">
        <div class="row">
            <div class="intro-message">
                <h1>Sign Up</h1>
                <hr class="intro-divider">
                <form id="signupForm" class="searchForm" action="{$BASE_URL}actions/authentication/signup.php"
                      method="post" autocomplete="on">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa"
                                                                       aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="name" title="Name"
                                           placeholder="Enter your Name"/>
                                </div>
                            </div>
                            <div class="outerErrorMessage">
                                <span id="invalidName"></span>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="email" title="Email"
                                           placeholder="Enter your Email"/>
                                </div>
                            </div>
                            <div class="outerErrorMessage">
                                <span id="invalidEmail"></span>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-users fa"
                                                                       aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="username" title="Username"
                                           placeholder="Enter your Username"/>
                                </div>
                            </div>
                            <div class="outerErrorMessage">
                                <span id="invalidUsername"></span>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"
                                                                       aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="contact" title="Phone Number"
                                           placeholder="Enter your Phone Number"/>
                                </div>
                            </div>
                            <div class="outerErrorMessage">
                                <span id="invalidContact"></span>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"> <i class="glyphicon glyphicon-globe"></i></span>
                                    <select class="form-control" name="municipality" title="Municipality">
                                        <option value="" disabled selected>Please select a municipality</option>
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
                                    <input type="password" class="form-control" name="password" title="Password"
                                           placeholder="Enter your Password"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="confirm"
                                           title="Password Confirmation" placeholder="Confirm your Password"/>
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

<script>
    $(function () {
        signUp();
    });
</script>

{include file='common/footer.tpl'}