<nav class="navbar navbar-default navbar-fixed-top topnav">
    <div class="container topnav">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <!--<span class="sr-only">Toggle navigation</span>-->
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand topnav" href="{$BASE_URL}pages/users/home.php"> <img alt="Website logo" src="{$BASE_URL}res/img/logo.png" ></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{$BASE_URL}pages/admins/adminUsers.php">Users</a>
                </li>
                <li>
                    <a href="{$BASE_URL}pages/admins/adminComplexes.php">Sports Complexes</a>
                </li>
                <li>
                    <a href="{$BASE_URL}pages/admins/adminRentals.php">Rentals</a>
                </li>
                <li>
                    <a href="{$BASE_URL}pages/admins/adminIssues.php">Issues</a>
                </li>
                <li>
                    <a href="{$BASE_URL}pages/admins/adminStatistics.php">Statistics</a>
                </li>
                <li>
                    <a href="{$BASE_URL}pages/admins/adminRequests.php">Requests</a>
                </li>
                <li>
                    <a href="{$BASE_URL}actions/admin/logout.php">Log out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>