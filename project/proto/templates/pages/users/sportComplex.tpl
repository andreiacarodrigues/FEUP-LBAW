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
        <div class="col-lg-12">
            <h1 class="page-header"><span id="infoName"></span> </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <img class="img-responsive" style="width:350px" src="http://placehold.it/750x500" alt="">
        </div>
        <div class="col-md-5">

            <h3>Informations:</h3>
            <ul class="list-group">
                <li class="list-group-item"><i class="glyphicon glyphicon-globe"></i> Location: <span id="infoLocation"></span> </li>
                <li class="list-group-item"> <i class="fa fa-envelope fa"></i> Email: <span id="infoEmail"></span> </li>
                <li class="list-group-item"> <i class="fa fa-phone"></i> Contact: <span id="infoContact"></span> </li>
                <li class="list-group-item"> <i class="fa fa-clock-o"></i> Opening - Closing Hours: <span id="infoHours"></span> </li>
                <li class="list-group-item"> <i class="fa fa-calendar"></i> Open on Weekends? <span id="infoOpenOnWeekends"></span> </li>
                <li class="list-group-item"> Description: <span id="infoDescription"></span> </li>
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
</div>
<br>
    <div class="container" id="spaces">
        <hr>
    </div>
</div>

{include file='common/footer.tpl'}

<script>
    $(function(){
        sportComplexPage('{$BASE_URL}', {$complexID});
    });
</script>