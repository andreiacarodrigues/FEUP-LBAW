<?php
    include('../templates/headerRegistered.php');
?>
   
    <div class="intro-header">
        <div class="container">
            <div class="row">
                <div class="intro-message-home">
                    <h1>Sports R Us</h1>
                    <h3>Your favorite place to rent sports complexes!</h3>
                    <hr class="intro-divider">
                    <h4>Here you can find the space you needed to practice your favorite sport. Its just one click away!</h4>
                </div>
            </div>
            <br><br>

            <div class="row">
                <div class="col-md-6">
                    <form class="searchForm" action="searchResults.php" method="post" autocomplete="on">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
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
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary btn-lg gradient-blue" value="Search"/>
                    </form>
                </div>


                <div class="col-md-6">
                        <div class="row">
                            <div id="lastVisited">
                            <div class="col-md-8 col-md-offset-2" id="scrollable">
                                <h1> Last Visited </h1> <hr>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <a href="#">
                                            <img class="img-responsive " src="http://placehold.it/700x400" style="width:150px; float:left;" alt="">
                                        </a>
                                        <h4> Complex 1 ⭐⭐⭐⭐</h4>
                                        <a class="btn btn-primary btn-sm gradient-blue" href="sportComplex.php">Check<span class="glyphicon glyphicon-chevron-right"></span></a>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-10  col-md-offset-1">
                                        <a href="#">
                                            <img class="img-responsive " src="http://placehold.it/700x400" style="width:150px; float:left;" alt="">
                                        </a>
                                        <h4> Complex 1 ⭐⭐⭐⭐</h4>
                                        <a class="btn btn-primary btn-sm gradient-blue" href="sportComplex.php">Check<span class="glyphicon glyphicon-chevron-right"></span></a>
                                    </div>
                                </div>
                                <br><div class="row">
                                    <div class="col-md-10  col-md-offset-1">
                                        <a href="#">
                                            <img class="img-responsive " src="http://placehold.it/700x400" style="width:150px; float:left;" alt="">
                                        </a>
                                        <h4> Complex 1 ⭐⭐⭐⭐</h4>
                                        <a class="btn btn-primary btn-sm gradient-blue" href="sportComplex.php">Check<span class="glyphicon glyphicon-chevron-right"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                </div>
            </div>

        </div>

    </div>
    <div class="content-section-b">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-heading">Sugestions</h2><hr>
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <a href="#">
                                        <img class="img-responsive" src="http://placehold.it/700x400" style="width:100%" alt="">
                                    </a>
                                    <div class="caption">
                                        <h5> Complex 1 ⭐⭐⭐⭐</h5>
                                        <a class="btn btn-primary btn-sm gradient-blue" href="sportComplex.php">Check Complex<span class="glyphicon glyphicon-chevron-right"></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <a href="#">
                                        <img class="img-responsive" src="http://placehold.it/700x400" style="width:100%" alt="">
                                    </a>
                                    <div class="caption">
                                        <h5> Complex 1 ⭐⭐⭐⭐</h5>
                                        <a class="btn btn-primary btn-sm gradient-blue" href="sportComplex.php">Check Complex<span class="glyphicon glyphicon-chevron-right"></span></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <a href="#">
                                        <img class="img-responsive" src="http://placehold.it/700x400" style="width:100%" alt="">
                                    </a>
                                    <div class="caption">
                                        <h5> Complex 1 ⭐⭐⭐⭐</h5>
                                        <a class="btn btn-primary btn-sm gradient-blue" href="sportComplex.php">Check Complex<span class="glyphicon glyphicon-chevron-right"></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <a href="#">
                                        <img class="img-responsive" src="http://placehold.it/700x400" style="width:100%" alt="">
                                    </a>
                                    <div class="caption">
                                        <h5> Complex 1 ⭐⭐⭐⭐</h5>
                                        <a class="btn btn-primary btn-sm gradient-blue" href="sportComplex.php">Check Complex<span class="glyphicon glyphicon-chevron-right"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

                <!--<div class="col-md-5">
                <div class="row">
                <div class="col-md-10 col-md-offset-1 thumbnail" id="scrollable">

                    <h1> Last Visited </h1> <hr>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <a href="#">
                                <img class="img-responsive " src="http://placehold.it/700x400" style="width:150px; float:left;" alt="">
                            </a>
                        <h4> Complex 1 ⭐⭐⭐⭐</h4>
                        <a class="btn btn-primary btn-sm gradient-blue" href="sportComplex.php">Check Complex<span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-10  col-md-offset-1">
                            <a href="#">
                                <img class="img-responsive " src="http://placehold.it/700x400" style="width:150px; float:left;" alt="">
                            </a>
                            <h4> Complex 1 ⭐⭐⭐⭐</h4>
                            <a class="btn btn-primary btn-sm gradient-blue" href="sportComplex.php">Check Complex<span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                    </div>
                    <br><div class="row">
                        <div class="col-md-10  col-md-offset-1">
                            <a href="#">
                                <img class="img-responsive " src="http://placehold.it/700x400" style="width:150px; float:left;" alt="">
                            </a>
                            <h4> Complex 1 ⭐⭐⭐⭐</h4>
                            <a class="btn btn-primary btn-sm gradient-blue" href="sportComplex.php">Check Complex<span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                    </div>
                    <br>
                    </div>
                        </div>
                    </div>
        </div>-->



<?php
    include('../templates/footer.php');
?>