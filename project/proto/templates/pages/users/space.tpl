{include file='common/userHeader.tpl'}

<div class="sportComplex">
<div class="container">
    <div class="row">
        {if $SUCCESS_MESSAGES != ""}
            {foreach $SUCCESS_MESSAGES as $message}
                <div class="alert alert-info alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{$message}</strong>
                </div>
            {/foreach}
        {/if}
        {if $ERROR_MESSAGES != ""}
            {foreach $ERROR_MESSAGES as $message}
                <div class="alert alert-danger alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{$message}</strong>
                </div>
            {/foreach}
        {/if}
    </div>
    <div class="row">
        <div class="col-md-10">
            <h1><span id="infoName"></span></h1>
        </div>
        <div class="col-md-2">
            <a href="#" class="backToComplex btn btn-primary gradient-yellow">Back To Complex</a>
        </div>
    </div>
    <div class="row">
        <hr>
    </div>

    <div class="row">
        <div class="col-md-4">
            <img class="spaceImg img-responsive" style="width:350px" src="http://placehold.it/750x500" alt="">
        </div>
        <div class="col-md-5">
            <h3>Informations:</h3>
            <ul class="list-group">
                <li class="list-group-item"><i class="glyphicon glyphicon-globe"></i> Location: <span id="infoLocation"></span> </li>
                <li class="list-group-item"> <i class="fa fa-envelope fa"></i> Email: <span id="infoEmail"></span> </li>
                <li class="list-group-item"> <i class="fa fa-phone"></i> Contact: <span id="infoContact"></span> </li>
                <li class="list-group-item"><i class="fa fa-cloud"></i> Coverage: <span id="infoCoverage"></span></li>
                <li class="list-group-item"><i class="fa fa-tree"></i> Surface: <span id="infoSurface"></span></li>
                <li class="list-group-item"> <i class="fa fa-eur"></i> Price: <span id="infoPrice"></span> <span> per hour </span></li>
                <li class="list-group-item"> <i class="fa fa-futbol-o"></i> Sports: <span id="infoSports"></span></li>
                <li class="list-group-item"> <i class="fa fa-clock-o"></i> Opening - Closing Hours: <span id="infoHours"></span> </li>
                <li class="list-group-item"> <i class="fa fa-calendar"></i> Open on Weekends? <span id="infoOpenOnWeekends"></span> </li>
            </ul>
        </div>

        <div class="col-md-3">
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
                            <input name="date" type="date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon primary">Starting Time</span>
                            <input name="startingTime" type="time" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon primary">Duration</span>
                            <input name="duration" type="time" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div id="rentalInfo">
            </div>
        </form>

    </div>
    <!-- /.row -->
</div>

    </div>





{include file='common/footer.tpl'}

<script>
    $(function(){
        var urlInfo = '{$BASE_URL}actions/users/space.php';
        var urlRedirect = '{$BASE_URL}pages/users/sportComplex.php';
        var id = {$spaceID};
        spaceInfo(urlInfo, urlRedirect, id);

        $("input[name='date']").blur(function(){
            var val1 = Date.parse($("input[name='date']").val());
            var val2 = new Date($("input[name='startingTime']").val());
            var val3 = new Date($("input[name='duration']").val());

            var todayDate = Date.parse(new Date().getDate());
            var todayTime = Date.parse(new Date().getTime());

            console.log(val2);
            console.log(val3);

           /* console.log(val1 >= todayDate);
            console.log(val2 >= todayTime);

            console.log(val3 > val2);*/

            if((val1 != "") && (val2 != "") && (val3 != "")){
                if(!$.trim($('#rentalInfo').html()).length)
                $('#rentalInfo').append(
                    "<div class='table-responsive'>"+
                    "<table class='table table-striped table-sm'>" +
                    "<thead class='thead-default'>" +
                    "<tr>" +
                    "<th><h4>Item</h4></th>" +
                    "<th><h4>Name</h4></th>" +
                    "<th><h4>Quantity To Rent</h4></th>" +
                    "<th><h4>Available</h4></th>" +
                    "<th><h4>Price / hour (€)</h4></th>" +
                    "</tr>" +
                    "</thead>" +
                    "<tbody id='equipmentList'>"+
                    " </tbody>"+
                    "</table>"+
                    "</div>"+
                    "<div class='text-right'>" +
                    "<h4> Total(€): <span id='totalRentalCost'></span> </h4>"+
                    "<input type='submit' class='btn btn-primary gradient-blue' value='Rent Items'/>" +
                    "</div>"
                );
            }
        });
    });
</script>



<!--
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
-->