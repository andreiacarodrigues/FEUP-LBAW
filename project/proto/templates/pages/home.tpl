{include file='common/userHeader.tpl'}

<div class="intro-header">
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
            <div class="intro-message-home">
                <h1>Sports R Us</h1>
                <h3>Your favorite place to rent sports complexes!</h3>
                <hr class="intro-divider">
                    <span>Here you can find the space you needed to practice your favorite sport. Its just one click away!</span>
                <button class="btn btn-primary gradient-blue" data-toggle="tooltip" data-placement="bottom" title="
                   Use the search form below to enter your selected keywords to get the perfect sports complex to rent.
                    "> <i class="fa fa-question-circle" aria-hidden="true"></i> </button>
            </div>
        </div>
        <br><br>
		{if isset($USERNAME)}
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
                                        <span class="input-group-addon"> Municipality </span>
                                        <select class="form-control"  name="municipality"  title="">
                                            <option value="" name="disabled" disabled selected></option>
                                            {html_options values=$municipalityIDs output=$municipalityNames}
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"> Sport </span>
                                        <select class="form-control" name="sport">
                                            <option value="" name="disabled" disabled selected></option>
                                            {foreach $SPORTS as $SPORT}
                                                <option value="{$SPORT.sportID}"
                                                        {foreach $INFORMATION.sports as $EQUIPMENT_SPORT}
                                                            {if $EQUIPMENT_SPORT eq $SPORT.sportID}
                                                                selected
                                                            {/if}
                                                        {/foreach}
                                                >{$SPORT.sportName}</option>
                                            {/foreach}
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
		{else}
		
        <div class="row">
            <div class="col-md-12">
                <form class="searchForm" action="{$BASE_URL}pages/users/searchResults.php" method="get" autocomplete="on">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon primary">Name</span>
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"> Municipality </span>
                                    <select class="form-control"  name="municipality"  title="">
                                        <option value="" name="disabled" disabled selected></option>
                                        {html_options values=$municipalityIDs output=$municipalityNames}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"> Sport </span>
                                    <select class="form-control" name="sport">
                                        <option value="" name="disabled" disabled selected></option>
                                        {foreach $SPORTS as $SPORT}
                                            <option value="{$SPORT.sportID}"
                                                    {foreach $INFORMATION.sports as $EQUIPMENT_SPORT}
                                                        {if $EQUIPMENT_SPORT eq $SPORT.sportID}
                                                            selected
                                                        {/if}
                                                    {/foreach}
                                            >{$SPORT.sportName}</option>
                                        {/foreach}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon primary">Date</span>
                                    <input type="date" name="date" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon primary">Starting Time</span>
                                    <input type="time" name="startingTime" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon primary">Duration</span>
                                    <input type="time" name="duration" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary btn-lg gradient-blue" value="Search"/>
                </form>
            </div>
        </div>
		{/if}
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
                                    <a class="btn btn-primary btn-sm gradient-blue" href="{$BASE_URL}pages/users/sportComplex.php">Check Complex<span class="glyphicon glyphicon-chevron-right"></span></a>
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
                                    <a class="btn btn-primary btn-sm gradient-blue" href="{$BASE_URL}pages/users/sportComplex.php">Check Complex<span class="glyphicon glyphicon-chevron-right"></span></a>
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
                                    <a class="btn btn-primary btn-sm gradient-blue" href="{$BASE_URL}pages/users/sportComplex.php">Check Complex<span class="glyphicon glyphicon-chevron-right"></span></a>
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
                                    <a class="btn btn-primary btn-sm gradient-blue" href="{$BASE_URL}pages/users/sportComplex.php">Check Complex<span class="glyphicon glyphicon-chevron-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



{include file='common/footer.tpl'}


<script>
    $('[data-toggle="tooltip"]').tooltip();
</script>