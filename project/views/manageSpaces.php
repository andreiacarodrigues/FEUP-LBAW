<?php
include('../templates/headerRegistered.php');
?>

<div class="manageSpaces">
    <div class="container">
        <a href="addSpace.php" class="btn btn-danger">Add Space <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <div class="thumbnail">
                    <a href="sportComplex.php">
                        <img class="img-responsive" src="http://placehold.it/700x400" style="width:100%" alt="">
                    </a>
                        <div class="caption ">
                            <h5 class="text-center">Space 1</h5><br>
                            <div class="row">
                                <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Covered: <span> Yes </span></label></li>
                                    <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Surface: <span> Syntetic grass </span></label></li>
                                    <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Dimensions: <span> Normal </span></label></li>
                                </ul>
                                </div>
                                <div class="totheright col-md-6"><br><br>
                                <a href="#" class="btn btn-warning">Edit Information  </a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <a href="sportComplex.php">
                        <img class="img-responsive" src="http://placehold.it/700x400" style="width:100%" alt="">
                    </a>
                    <div class="caption ">
                        <h5 class="text-center">Space 2</h5>
                        <div class="row">
                            <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon primary">Surface</span>
                                            <select class="form-control" title="">
                                                <option value="" disabled selected></option>
                                                <option>Football</option>
                                                <option>Basketball</option>
                                                <option>Tenis</option>
                                            </select>
                                        </div>

                                        <div class="input-group">
                                            <span class="input-group-addon primary">Coverage</span>
                                            <select class="form-control" title="">
                                                <option value="" disabled selected></option>
                                                <option>Football</option>
                                                <option>Basketball</option>
                                                <option>Tenis</option>
                                            </select>
                                        </div>

                                        <div class="input-group">
                                            <span class="input-group-addon primary">Dimensions</span>
                                            <select class="form-control" title="">
                                                <option value="" disabled selected></option>
                                                <option>Football</option>
                                                <option>Basketball</option>
                                                <option>Tenis</option>
                                            </select>
                                        </div>

                                        <div class="input-group">
                                            <span class="input-group-addon primary">Availability</span>
                                            <select class="form-control" title="">
                                                <option value="" disabled selected></option>
                                                <option>Football</option>
                                                <option>Basketball</option>
                                                <option>Tenis</option>
                                            </select>
                                        </div>
                                    </div>
                            </div>
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
