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
            <a href="{$BASE_URL}pages/managers/addSpace.php/?complexID={$complexID}"
               class="btn btn-primary gradient-red">Add Space <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
            <hr>
        </div>
        {if count($SPACES) == 0}
            <h4> You don't have any spaces registered yet. <br><br> Add your sport complex's spaces in the button above,
                so other users can rent it! </h4>
        {else}
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
                                {assign var="filename" value="../../res/img/thumbs_medium/space_{$SPACE.spaceID}.jpg"}

                                {if file_exists($filename)}
                                    <img class="img-responsive"
                                         src="{$BASE_URL}res/img/thumbs_medium/space_{$SPACE.spaceID}.jpg"
                                         style="width:100%" alt="Image of the space">
                                {else}
                                    <img class="img-responsive" src="http://placehold.it/600x400" style="width:100%"
                                         alt="Placeholder image for the space (image not given)">
                                {/if}

                            </a>
                            <div class="caption ">
                                <h5 class="text-center">{$SPACE.spaceName}</h5><br>
                                <div class="row">
                                    <div class="col-md-7">
                                        <ul class="list-unstyled">
                                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Covered:
                                                    <span> {$SPACE.spaceIsCovered} </span></label></li>
                                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Surface:
                                                    <span> {$SPACE.spaceSurfaceType} </span></label></li>
                                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Price /
                                                    hour: <span> {$SPACE.spacePrice}€ </span></label></li>
                                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Sports:
                                                    <span> {$SPACE.sports} </span></label></li>
                                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Available:
                                                    <span> {$SPACE.spaceIsAvailable} </span></label></li>
                                        </ul>
                                    </div>
                                    <div class="mobileFixButtons col-md-5">
                                        <button type="button" class="btn btn-primary gradient-yellow"
                                                onclick="updateEditSpaceInfo({$complexID}, {$SPACE.spaceID}, '{$SPACE.spaceName}', '{$SPACE.spaceIsCovered}', '{$SPACE.spaceSurfaceType}',{$SPACE.spacePrice}, '{$SPACE.spaceIsAvailable}', '{$SPACE.sports}')"
                                                data-toggle="modal" data-target="#editSpaceModal">Edit<br>Information
                                        </button>
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
        {/if}
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="editSpaceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelSpaces"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title text-center" id="myModalLabelSpaces">
                    Edit Space <span id="spaceName"></span>
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="editSpaceForm" action="{$BASE_URL}actions/managers/editSpace.php" method="post"
                      autocomplete="on" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="complexID" value="{$complexID}"/>
                    <input type="hidden" name="spaceID"/>
                    <input type="hidden" name="name"/>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Name</span>
                                    <input type="text" class="form-control" title="Name" name="name" placeholder=""/>
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon primary">Surface</span>
                                    <select class="form-control" title="Surface type" name="surface">
                                        <option value="" disabled selected>Please insert a surface type</option>
                                        <option>Synthetic</option>
                                        <option>Dirt</option>
                                        <option>Indoors</option>
                                        <option>Other</option>
                                    </select>
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon primary">Coverage</span>
                                    <select class="form-control" name="coverage" title="Space coverage">
                                        <option value="" disabled selected>Please insert a cover option</option>
                                        <option>Covered</option>
                                        <option>Uncovered</option>
                                    </select>
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon primary">Price / hour</span>
                                    <input class="form-control" type="number" title="Price per hour" name="price" min="0" step="1" value="0">
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon primary">Availability</span>
                                    <select class="form-control" name="availability" title="Is the space available?">
                                        <option value="" disabled selected>Please insert the availability</option>
                                        <option>Available</option>
                                        <option>Unavailable</option>
                                    </select>
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon primary">Sports</span>
                                    <select id="sportsSelect" class="form-control" title="Sports" name="sports[]" multiple>
                                        {foreach $SPORTS as $SPORT}
                                            <option value="{$SPORT.sportID}">{$SPORT.sportName}</option>
                                        {/foreach}
                                    </select>

                                </div>
                                <div class="input-group">
                                    <span>Hold CTRL key and click on the sports you wish to be added to your space.</span>
                                </div>


                                <div class="input-group">
                                    <span class="input-group-addon"> Select representative picture </span>
                                </div>


                                <div class="input-group">
                                    <label class="input-group-btn">
                                <span class="btn btn-primary gradient-blue">
                                       Browse <input type="file" title="Space image" name="photo" style="display: none;">
                                </span>
                                    </label>
                                    <input type="text" class="form-control" title="Selected file name" readonly>
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

<script>
    imagesInput($(document));
    function updateEditSpaceInfo(complexID, spaceID, spaceName, isCovered, surfaceType, price, isAvailable, sports) {
        $('#editSpaceForm input[name="spaceID"]').val(spaceID);
        $('#editSpaceForm input[name="complexID"]').val(complexID);

        $('#editSpaceForm input[name="name"]').val(spaceName);

        $('#spaceName').text(spaceName);

        if (isCovered == "Yes")
            $('#editSpaceForm select[name="coverage"]').val("Covered").trigger('chosen:updated');
        else
            $('#editSpaceForm select[name="coverage"]').val("Uncovered").trigger('chosen:updated');

        $('#editSpaceForm select[name="surface"]').val(surfaceType).trigger('chosen:updated');
        $('#editSpaceForm input[name="price"]').val(price);

        if (isAvailable == "Yes")
            $('#editSpaceForm select[name="availability"]').val("Available").trigger('chosen:updated');
        else
            $('#editSpaceForm select[name="availability"]').val("Unavailable").trigger('chosen:updated');


        $("#sportsSelect").val([]); // clean the previous selected options

        var partsOfStr = sports.split(', ');
        var values = [];
        for (var i = 0; i < partsOfStr.length; i++) {
            values.push($('#sportsSelect option').filter(function () {
                return $(this).html() == partsOfStr[i];
            }).val());
        }

        $("#sportsSelect").val(values);
    }
</script>

{include file='common/footer.tpl'}