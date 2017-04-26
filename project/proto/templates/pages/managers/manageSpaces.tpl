{include file='common/userHeader.tpl'}

<div class="manageSpaces">
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
        <a href="../addSpace.php/?complexID={$complexID}" class="btn btn-primary gradient-red">Add Space <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
        <hr>
        </div>
        {$ROW_COUNT = 0}

        {foreach $SPACES as $SPACE}
            {strip}

                {if $ROW_COUNT == 0}
                    <div class="row">
                {/if}

                {$ROW_COUNT = $ROW_COUNT + 1}
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <a href="{$BASE_URL}pages/users/space.php/?spaceID={$SPACE.spaceID}">
                                    <img class="img-responsive" src="http://placehold.it/700x400" style="width:100%" alt="">
                                </a>
                                <div class="caption ">
                                    <h5 class="text-center">{$SPACE.spaceName}</h5><br>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <ul class="list-unstyled">
                                                <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Covered: <span> {$SPACE.spaceIsCovered} </span></label></li>
                                                <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Surface: <span> {$SPACE.spaceSurfaceType} </span></label></li>
                                                <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Price / hour: <span> {$SPACE.spacePrice}€ </span></label></li>
                                                <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Sports: <span> {$SPACE.sports} </span></label></li>
                                                <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Available: <span> {$SPACE.spaceIsAvailable} </span></label></li>
                                            </ul>
                                        </div>
                                        <div class="mobileFixButtons col-md-5">
                                            <button type="button" class="btn btn-primary gradient-yellow" data-toggle="modal" data-target="#editSpaceModal">Edit<br>Information</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                {if $ROW_COUNT_AUX == 3}
                    </div>
                    {$ROW_COUNT == 0}
                {/if}

                {$VALUE = $VALUE + 1}
            {/strip}
        {/foreach}
    </div>

        <!-- Modal -->
        <div class="modal fade" id="editSpaceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title text-center" id="myModalLabel">
                            Edit Space 1
                        </h4>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form id="editSpaceForm" action="#" method="post" autocomplete="on" class="form-horizontal" role="form">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon primary">Surface</span>
                                            <select class="form-control" title="">
                                                <option value="" disabled selected></option>
                                                <option>Grass</option>
                                                <option>Syntetic Grass </option>
                                                <option>Dirt</option>
                                            </select>
                                        </div>

                                        <div class="input-group">
                                            <span class="input-group-addon primary">Coverage</span>
                                            <select class="form-control" title="">
                                                <option value="" disabled selected></option>
                                                <option>Covered</option>
                                                <option>Uncovered</option>
                                            </select>
                                        </div>

                                        <div class="input-group">
                                            <span class="input-group-addon primary">Dimensions</span>
                                            <select class="form-control" title="">
                                                <option value="" disabled selected></option>
                                                <option>Big</option>
                                                <option>Small</option>
                                                <option>Medium</option>
                                            </select>
                                        </div>

                                            <div class="input-group">
                                                <span class="input-group-addon primary">Price / hour</span>
                                                <input class="form-control" type="number" name="points" min="0" max="20" step="1" value="0">
                                            </div>

                                        <div class="input-group">
                                            <span class="input-group-addon primary">Availability</span>
                                            <select class="form-control" title="">
                                                <option value="" disabled selected></option>
                                                <option>Available</option>
                                                <option>Unavailable</option>
                                            </select>
                                        </div>

                                            <div class="input-group">
                                                <span class="input-group-addon primary">Sports</span>
                                                <select class="form-control" name="sports[]" multiple>
                                                    <option value="football">Football</option>
                                                    <option value="basketball">Basketball</option>
                                                    <option value="tenis">Tenis</option>
                                                </select>
                                            </div>


                                        <div class="input-group">
                                            <input type="submit" class="btn btn-primary gradient-yellow" value="Upload representative picture"/>
                                            <img class="img-responsive" src="http://placehold.it/700x400" style="width:400px" alt="">
                                        </div>
                                    </div>


                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary gradient-blue">Submit</button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>


{include file='common/footer.tpl'}


<link rel="stylesheet" href="{$BASE_URL}js/bootstrap-multiselect.css" />
<script src="{$BASE_URL}js/bootstrap-multiselect.js"></script>

<script>
    $(function(){
        manageSpaces();
    });
</script>