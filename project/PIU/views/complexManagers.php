<?php
include('../templates/headerRegistered.php');
?>

<div class="manageComplexes">
    <div class="container">
        <form action="#" method="post" autocomplete="on">
            <div class="form-group form-inline">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="managerEmail" placeholder="Enter the manager's email"/>
                </div>
                <a href="addManager.php" class="btn btn-primary gradient-yellow">Add Manager <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
            </div>
        </form>
        <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="thumbnail">
                        <a href="#">
                            <img class="img-responsive" src="http://placehold.it/700x400" style="width:100%" alt="">
                        </a>
                        <div class="caption">
                            <h5 class="text-center">Andreia Rodrigues</h5><br>

                            <ul class="list-unstyled">
                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Email: <span> aaa@gmail.com </span></label></li>
                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Contact: <span> 9198765432 </span></label></li>
                            </ul>

                            <div class="text-center">
                            <button type="button" class="btn btn-primary gradient-red">Remove</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="thumbnail">
                        <a href="#">
                            <img class="img-responsive" src="http://placehold.it/700x400" style="width:100%" alt="">
                        </a>
                        <div class="caption">
                            <h5 class="text-center">Eduardo Leite</h5><br>

                            <ul class="list-unstyled">
                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Email: <span> bbb@gmail.com </span></label></li>
                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Contact: <span> 911231231 </span></label></li>
                            </ul>

                            <div class="text-center">
                                <button type="button" class="btn btn-primary gradient-red">Remove</button>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="thumbnail">
                        <a href="#">
                            <img class="img-responsive" src="http://placehold.it/700x400" style="width:100%" alt="">
                        </a>
                        <div class="caption">
                            <h5 class="text-center">Francisco Queirós</h5><br>

                            <ul class="list-unstyled">
                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Email: <span> ccc@gmail.com </span></label></li>
                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Contact: <span> 914564564 </span></label></li>
                            </ul>

                            <div class="text-center">
                                <button type="button" class="btn btn-primary gradient-red">Remove</button>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="thumbnail">
                        <a href="#">
                            <img class="img-responsive" src="http://placehold.it/700x400" style="width:100%" alt="">
                        </a>
                        <div class="caption">
                            <h5 class="text-center">Ademar João</h5><br>

                            <ul class="list-unstyled">
                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Email: <span> ddd@gmail.com </span></label></li>
                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Contact: <span> 917897897 </span></label></li>
                            </ul>

                            <div class="text-center">
                                <button type="button" class="btn btn-primary gradient-red">Remove</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

    </div>
</div>


    <?php
include('../templates/footer.php');
?>
