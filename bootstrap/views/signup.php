<?php
include('../templates/headerUnregistered.php');
?>

    <!-- Header -->
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">
            <div class="row">
            <div class="intro-message">
                <h1>Sign Up</h1>
                <hr class="intro-divider">
                    <form id="loginForm" class="" method="post" action="#">
                       <div class="form_center">
                        <div class="form-group">
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                    <input type="tel" class="form-control" name="tel" id="tel"  placeholder="Enter your Phone Number"/>
                                </div>
                            </div>
                        </div>

                           <div class="form-group">
                               <div class="cols-sm-10">
                                   <div class="input-group">
                                       <span class="input-group-addon"> <i class="glyphicon glyphicon-globe"></i></span>
                                       <input type="text" class="form-control" name="location" id="location"  placeholder="Enter your Location"/>
                                   </div>
                               </div>
                           </div>

                        <div class="form-group">
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <a href="#" target="_blank" type="button" id="button" class="btn btn-primary btn-md login-button">Register</a>
                        </div>
                       </div>
                    </form>


            </div>
            </div>
        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

<?php
include('../templates/footer.php');
?>
