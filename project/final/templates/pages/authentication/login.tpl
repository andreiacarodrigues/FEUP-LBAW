{include file='common/userHeader.tpl'}

<div class="intro-header">
    <div class="container">
        <div class="row">
            <div class="intro-message">
                <h1>Login</h1>
                <hr class="intro-divider">
                <form id="loginForm" class="searchForm" action="{$BASE_URL}actions/authentication/login.php"
                      method="post" autocomplete="on">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-users fa"
                                                                       aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="username" id="username"
                                           title="Username" placeholder="Enter your Username"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="password" id="password"
                                           title="Password" placeholder="Enter your Password"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row errorMessage">
                        <span>{$ERROR_MESSAGES}</span>
                    </div>
                    <div class="row">
                        <input type="submit" class="btn btn-primary btn-lg gradient-blue" value="Login"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{include file='common/footer.tpl'}