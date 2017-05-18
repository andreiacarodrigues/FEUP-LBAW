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
        <div class="spaceInfo">
            <span> Insert here your rental information: </span>
            <button type="button" class="btn btn-primary gradient-blue" data-toggle="modal" data-target="#guidanceModal"> <i class="fa fa-question-circle" aria-hidden="true"></i> </button>

            <!-- <button type="button" class="btn btn-primary gradient-yellow" data-toggle="modal" data-target="#guidanceModal">How do I make a rental?</button>
           <!--  <h5> Here is where you can make a rental: <br> <br>
               </h5>-->
        </div>
       <!-- <hr>-->
        <br>

        <form id="rentForm" action='{$BASE_URL}actions/managers/makeRental.php' method="post" autocomplete="on">
            <input name="spaceID" type="hidden" value="{$spaceID}">
            <input name="userID" type="hidden" value="{$userID}">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="input-group checkInput">
                            <span class="input-group-addon primary">Date</span>
                            <input name="date" type="date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="input-group checkInput">
                            <span class="input-group-addon primary">Starting Time</span>
                            <input name="startingTime" type="time" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="input-group checkInput">
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
</div>

    </div>


<!-- Modal -->
<div class="modal fade" id="guidanceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title text-center" id="myModalLabel">
                   How to make a rental?
                 </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body text-justify">
                <p>Insert in the boxes below the date, start time and duration you wish you rent this space. <br> <br>
                After the insertion you will be presented with a table with the equipment you can rent at the selected time and date.<br> <br>
                If the equipment you are looking for isn't there, it is unavailable at that particular time.<br> <br>
                At the bottom, the total cost of your rental will be updated.<br> <br>
                    When you finish your rental just click on the "Rent Items" button so you can be redirected to the paypal page and proceed with the payment.</p>
            </div>
        </div>
    </div>
</div>



{include file='common/footer.tpl'}

<script>
    $(function(){
        spacePage('{$BASE_URL}', {$spaceID});
    });
</script>

