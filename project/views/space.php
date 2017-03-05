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

    <div class="row">
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

             <table class="table table-striped table-responsive table-sm" >
                <thead class="thead-default">
                <tr>
                   <th><h4>Item</h4></th>
                   <th><h4>Name</h4></th>
                   <th><h4>Quantity To Rent</h4></th>
                   <th><h4>Stock</h4></th>
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
            </tr>
            </tbody>
        </table>
            <div class="text-right">
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
