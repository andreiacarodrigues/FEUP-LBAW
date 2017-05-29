<nav class="navbar navbar-default navbar-fixed-top topnav">
    <div class="container topnav">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <!--<span class="sr-only">Toggle navigation</span>-->
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand topnav" href="{$BASE_URL}pages/users/home.php"> <img alt="Website logo" src="{$BASE_URL}/res/img/logo.png"></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{$BASE_URL}pages/authentication/login.php">Log in</a>
                </li>
                <li>
                    <a href="{$BASE_URL}pages/authentication/signup.php">Sign up</a>
                </li>
            </ul>
        </div>
    </div>
</nav>