<?php
include('../templates/headerRegistered.php');
?>
<div class="sportComplex">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Space 1 </h1>
        </div>
    </div>

   <!-- <div class="row">
        <div class="col-md-4">
            <img class="img-responsive" style="width:400px" src="http://placehold.it/750x500" alt="">
        </div>
        <div class="col-md-8">
            <h3>Informations:</h3>
            <ul class="list-group">
                <li class="list-group-item"> <i class="fa fa-cloud"></i> Here goes the cover </li>
                <li class="list-group-item"><i class="fa fa-tree"></i> Here goes the surface </li>
                <li class="list-group-item"> <i class="fa fa-home"></i> Here goes the dimensions </li>
            </ul>
        </div>
    </div>-->

    <div class="row">
        <div class="col-md-4">
            <img class="complexImg img-responsive" style="width:400px" src="http://placehold.it/750x500" alt="">
        </div>
        <div class="col-md-5">
            <h3>Informations:</h3>
            <ul class="list-group">
                <li class="list-group-item"> <i class="fa fa-users fa"></i> Here goes the name </li>
                <li class="list-group-item"><i class="glyphicon glyphicon-globe"></i> Here goes the location </li>
                <li class="list-group-item"> <i class="fa fa-envelope fa"></i> Here goes the email </li>
                <li class="list-group-item"> <i class="fa fa-phone"></i> Here goes the phone number </li>
                <li class="list-group-item"> <i class="fa fa-eur"></i> Here goes the price <span> per hour </span></li>
                <li class="list-group-item"> <i class="fa fa-futbol-o"></i> Here goes the sports</li>
                <li class="list-group-item"> <i class="fa fa-clock-o"></i> Here goes the opening/closing hours </li>
                <li class="list-group-item"> Description </li>
            </ul>
        </div>

        <div class="col-md-3">
            <br><br>
            <div class="row">
                <div class="ratingNum">
                <div class="text-center">
                    <h1 class="rating-num">4.0</h1>
                    <div class="rating">
                        <span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star-empty"></span>
                    </div>
                    <div>
                        <span class="glyphicon glyphicon-user"></span> 50 total
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="row rating-desc">
                        <div class="col-xs-3 col-md-3 text-right">
                            <span class="glyphicon glyphicon-star"></span>5
                        </div>
                        <div class="col-xs-8 col-md-7">
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                    <span class="sr-only">80%</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-3 col-md-3 text-right">
                            <span class="glyphicon glyphicon-star"></span>4
                        </div>
                        <div class="col-xs-8 col-md-7">
                            <div class="progress">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                    <span class="sr-only">60%</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-3 col-md-3 text-right">
                            <span class="glyphicon glyphicon-star"></span>3
                        </div>
                        <div class="col-xs-8 col-md-7">
                            <div class="progress">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20"
                                     aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                    <span class="sr-only">40%</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-3 col-md-3 text-right">
                            <span class="glyphicon glyphicon-star"></span>2
                        </div>
                        <div class="col-xs-8 col-md-7">
                            <div class="progress">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                    <span class="sr-only">20%</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-3 col-md-3 text-right">
                            <span class="glyphicon glyphicon-star"></span>1
                        </div>
                        <div class="col-xs-8 col-md-7">
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 15%">
                                    <span class="sr-only">15%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
</div>
<br>
    <div class="container">
        <hr>
        <form id="rentForm" action="home.php" method="post" autocomplete="on">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon primary">Date</span>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon primary">Starting Time</span>
                            <input type="time" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon primary">Duration</span>
                            <input type="time" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <hr>
<div class="table-responsive">
             <table class="table table-striped table-sm" >
                <thead class="thead-default">
                <tr>
                   <th><h4>Item</h4></th>
                   <th><h4>Name</h4></th>
                   <th><h4>Quantity To Rent</h4></th>
                   <th><h4>Available</h4></th>
                    <th><h4>Price / hour (€)</h4></th>
                </tr>
              </thead>
              <tbody>
              <tr>
                <td class="centered">
                   <img class="img-responsive" src="http://placehold.it/200x200" style="width:100px" alt="">
                </td>
                <td>
                    <h5> Item 1</h5>
                </td>
                <td>
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control" type="number" name="points" min="0" max="20" step="1" value="0">
                        </div>
                    </div>
                </td>
                <td>
                   <h5> 20 </h5>
                </td>
                  <td>
                      <h5> 2 </h5>
                  </td>
            </tr>
            <tr>
                <td class="centered">
                    <img class="img-responsive" src="http://placehold.it/200x200" style="width:100px" alt="">
                </td>
                <td>
                    <h5> Item 2</h5>
                </td>
                <td>
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control" type="number" name="points" min="0" max="20" step="1" value="0">
                        </div>
                    </div>
                </td>
                <td>
                    <h5> 10 </h5>
                </td>
                <td>
                    <h5> 2 </h5>
                </td>
            </tr>
            <tr>
                <td class="centered">
                    <img class="img-responsive" src="http://placehold.it/200x200" style="width:100px" alt="">
                </td>
                <td>
                    <h5> Item 2</h5>
                </td>
                <td>
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control" type="number" name="points" min="0" max="20" step="1" value="0">
                        </div>
                    </div>
                </td>
                <td>
                    <h5> 50 </h5>
                </td>
                <td>
                    <h5> 1 </h5>
                </td>
            </tr>
            </tbody>
        </table>
</div>

    <div class="text-right">
        <h4> Total(€): 36 </h4>
                <input type="submit" class="btn btn-primary gradient-blue" value="Rent Items"/>
            </div>
        </form>

    </div>
    <!-- /.row -->

    </div>


</div>


    <?php
include('../templates/footer.php');
?>
