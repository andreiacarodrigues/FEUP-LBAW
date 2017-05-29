{include file='common/userHeader.tpl'}


<div class="addSpace">
    <div class="container">
        <div class="text-center">
            <h1>Add Space to: <span> {$complexName} </span></h1>
            <br>
        </div>
        <hr class="divider">
        <br>
        <form id="addSpaceForm" action="{$BASE_URL}actions/managers/addSpace.php" method="post" autocomplete="on"
              enctype="multipart/form-data">
            <input type="hidden" name="complexID" value="{$complexID}">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Name</span>
                            <input type="text" class="form-control" name="name" id="name" title="Name" placeholder=""/>
                        </div>
                    </div>
                    <div class="innerErrorMessage">
                        <span id="invalidName"></span>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon primary">Surface</span>
                            <select class="form-control" title="Surface type" name="surface">
                                <option value="" disabled selected>Please select a surface option</option>
                                {foreach $SURFACES as $SURFACE}
                                    <option value="{$SURFACE.unnest}"
                                    >{$SURFACE.unnest}</option>
                                {/foreach}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon primary">Coverage</span>
                            <select class="form-control" title="Space coverage" name="coverage">
                                <option value="" disabled selected>Please select a cover option</option>
                                <option>Covered</option>
                                <option>Uncovered</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon primary">Price / hour</span>
                            <input class="form-control" type="number" title="Price per hour" name="price" min="0" step="1" value="0">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon primary">Sports</span>
                            <select class="form-control " name="sports[]" title="Sports" multiple>
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
                            <span class="input-group-addon"> Select representative picture </span>
                        </div>
                        <br>

                        <div class="input-group">
                            <label class="input-group-btn">
                                <span class="btn btn-primary gradient-blue">
                                       Browse&hellip; <input type="file" name="photo" title="Space image" style="display: none;">
                                </span>
                            </label>
                            <input type="text" class="form-control" title="Selected file name" readonly>
                        </div>
                    </div>

                    <br><br>
                    <div class="row errorMessage text-center">
                        <span>
                            {foreach $ERROR_MESSAGES as $error}
                                <div class="error">{$error}</div>
                            {/foreach}
                        </span>
                    </div>
                    <div style="text-align: center;">
                        <input type="submit" class="btn btn-primary gradient-blue" value="Register Space"/>
                        <input type="submit" class="btn btn-primary gradient-blue" value="Cancel"/>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

<script src="{$BASE_URL}js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="{$BASE_URL}js/bootstrap-multiselect.css"/>

<script>
    $(function () {
        addSpace();
        imagesInput($(document));
    });
</script>

{include file='common/footer.tpl'}


