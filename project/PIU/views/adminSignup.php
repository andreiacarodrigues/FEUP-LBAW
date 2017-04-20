<?php
include('../templates/adminHeaderUnregistered.php');
?>

    <div class="admin-intro-header">
        <div class="container">
            <div class="row">
                <div class="intro-message">
                  <h1>Sign up</h1>
                    <hr class="intro-divider">
                    <form id="loginForm"class="searchForm" action="adminStatistics.php" method="post" autocomplete="on">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <input type="password" class="form-control" name="password" id="password"  placeholder="Confirm your Password"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary btn-lg gradient-blue" value="Register"/>
                    </form>
                </div>
                    <!--<h4 id="registerWaiting"> Your register was sent sucessfully. <br> <br>An already registered admin will check on your request to register and you will have access to the administration of the
                    website once you are accepted. </h4>-->

            </div>
        </div>
    </div>


<?php
include('../templates/footer.php');
?>