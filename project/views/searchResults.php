<?php
include('../templates/headerRegistered.php');
?>

    <div id="searchResultsForm">
        <form class="form-inline" role="form">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon primary">Name</span>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon primary">Location</span>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon primary">Sport</span>
                    <select class="form-control" title="">
                        <option value="" disabled selected></option>
                        <option>Football</option>
                        <option>Basketball</option>
                        <option>Tenis</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon primary">Date</span>
                    <input type="date" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon primary">Starting Time</span>
                    <input type="time" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon primary">Duration</span>
                    <input type="time" class="form-control">
                </div>
            </div>
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
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon primary">Coverage</span>
                    <select class="form-control" title="">
                        <option value="" disabled selected></option>
                        <option>Football</option>
                        <option>Basketball</option>
                        <option>Tenis</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon primary">Dimensions</span>
                    <select class="form-control" title="">
                        <option value="" disabled selected></option>
                        <option>Football</option>
                        <option>Basketball</option>
                        <option>Tenis</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
            <input type="submit" class="btn btn-md btn-info" value="Search"/>
            </div>
        </form>
    </div>
<div class="searchResults">
    <div class="container">
        <h1 class="page-header">Search Results: <small> 2 complexes found </small></h1>
    <div class="row">
        <div class="col-md-4">
            <br>
            <a href="#">
                <img class="img-responsive" src="http://placehold.it/700x400" style="width:400px" alt="">
            </a>
        </div>
        <div class="col-md-8">
            <h4> Complex 1</h4>
            <ul class="list-group">
                <li class="list-group-item"><i class="glyphicon glyphicon-globe"></i> Here goes the location </li>
                <li class="list-group-item"> <i class="fa fa-envelope fa"></i> Here goes the email </li>
                <li class="list-group-item"> <i class="fa fa-phone"></i> Here goes the phone number </li>
                <li class="list-group-item"> Description </li>
            </ul>
            <a class="btn btn-primary btn-info" href="sportComplex.php">Check Complex<span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
    </div>
    <!-- /.row -->
    <hr>

        <div class="row">
            <div class="col-md-4">
                <br>
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x400" style="width:400px" alt="">
                </a>
            </div>
            <div class="col-md-8">
                <h4> Complex 2 </h4>
                <ul class="list-group">
                    <li class="list-group-item"><i class="glyphicon glyphicon-globe"></i> Here goes the location </li>
                    <li class="list-group-item"> <i class="fa fa-envelope fa"></i> Here goes the email </li>
                    <li class="list-group-item"> <i class="fa fa-phone"></i> Here goes the phone number </li>
                    <li class="list-group-item"> Description </li>
                </ul>
                <a class="btn btn-primary btn-info" href="sportComplex.php">Check Complex<span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>

    </div>
</div>


    <?php
include('../templates/footer.php');
?>
