<?php
include('../templates/headerRegistered.php');
?>

<div class="editComplex">
    <div class="container">
        <div class="intro-add-complex text-center">
            <h2>Edit Complex Information</h2>
            <br>
        </div>

        <hr class="divider"><br>
            <form id="addComplexForm" action="sportComplex.php" method="post" autocomplete="on">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-info" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="name" id="name"  placeholder="Enter the sports complex name"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                                <input type="text" class="form-control" name="email" id="email"  placeholder="Enter the sports complex location"/>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-at" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="username" id="username"  placeholder="Enter the sports complex email"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                <input type="tel" class="form-control" name="tel" id="tel"  placeholder="Enter the sports complex contact"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon primary"><i class="material-icons md-18">help</i></span>
                                <textarea class="form-control" rows="2" id="comment" placeholder="Enter a brief description of the sports complex services"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                <input type="tel" class="form-control" name="tel" id="tel"  placeholder="Enter the sports complex opening and closing hours"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-credit-card" aria-hidden="true"></i></span>
                                <input type="tel" class="form-control" name="tel" id="tel"  placeholder="Enter the sports complex paypal account"/>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary gradient-yellow" value="Change representative picture"/>
                        <img class="img-responsive" src="http://placehold.it/700x400" style="width:400px" alt="">
                        <br><br>
                        <div style="text-align: center;">
                            <input type="submit" class="btn btn-primary gradient-blue" value="Submit"/>
                            <input type="submit" class="btn btn-primary gradient-blue" value="Cancel"/>
                        </div>

                        <div class="totheright deleteComplex">
                            <a href="#" class="btn btn-primary gradient-red ">Delete Complex</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>



<?php
include('../templates/footer.php');
?>
