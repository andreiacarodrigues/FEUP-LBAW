<?php
include('../templates/headerUnregistered.php');
?>
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">
            <div class="row">
                <div class="intro-message">
                    <h1>Login</h1>
                    <hr class="intro-divider">
                    <form id="loginForm" action="home.php" method="post" autocomplete="on">
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
                            </div>
                        </div>
                        <input type="submit" class="btn btn-md btn-info btn-primary" value="Login"/>
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php
include('../templates/footer.php');
?>