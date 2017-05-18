{include file='common/userHeader.tpl'}

<div class="manageComplexes">
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
        <a href="{$BASE_URL}pages/managers/addComplex.php" class="addComplexBtn btn btn-primary gradient-red">Add Complex <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
        <hr>
        </div>
        {if count($COMPLEXES) == 0}
            <h4> You aren't manager of any sport complexes yet. <br><br> If you have your own sport complex business, you can add it to
            our website in the button above, so you can register spaces and equipment other users can rent at a specific time and date. <br><br>
            You will have the resources to manage the complex items, rentals, issues and reviews other users may leave after a rental and the
            opportunity to add other users as managers so the management can be more efficient.</h4>

        {else}


        {$ROW_COUNT = 0}

        {foreach $COMPLEXES as $COMPLEX}
            {strip}

            {if $ROW_COUNT == 0}
              <div class="row">
            {/if}

                {$ROW_COUNT = $ROW_COUNT + 1}

                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="{$BASE_URL}pages/users/sportComplex.php/?complexID={$COMPLEX.complexID}">
                            <img class="img-responsive" src="http://placehold.it/700x400" style="width:100%" alt="">
                        </a>
                        <div class="caption text-center">
                            <h5>{$COMPLEX.complexName}</h5>
                            <div class="row">
                                <div class="col-6 btn-group-vertical">
                                    <a href="{$BASE_URL}pages/users/sportComplex.php?complexID={$COMPLEX.complexID}"  class="btn btn-primary gradient-blue">View Information  </a>
                                    <a href="{$BASE_URL}pages/managers/editComplex.php?complexID={$COMPLEX.complexID}" class="btn btn-primary gradient-blue">Edit Information  </a>
                                    <a href="{$BASE_URL}pages/managers/manageRentalsManager.php?complexID={$COMPLEX.complexID}" class="btn btn-primary gradient-blue">Manage Rentals </a>
                                    <a href="{$BASE_URL}pages/managers/manageSpaces.php?complexID={$COMPLEX.complexID}" class="btn btn-primary gradient-blue">Manage Spaces  </a>
                                </div>
                                <div class="col-6 btn-group-vertical">
                                    <a href="{$BASE_URL}pages/managers/manageEquipment.php?complexID={$COMPLEX.complexID}" class="btn btn-primary gradient-blue">Manage Equipment  </a>
                                    <a href="{$BASE_URL}pages/managers/issuesManagement.php?complexID={$COMPLEX.complexID}" class="btn btn-primary gradient-blue">Issue Reports  </a>
                                    <a href="{$BASE_URL}pages/managers/complexManagers.php?complexID={$COMPLEX.complexID}" class="btn btn-primary gradient-blue">Manage Managers  </a>
                                    <a href="{$BASE_URL}pages/managers/managerStatistics.php?complexID={$COMPLEX.complexID}" class="btn btn-primary gradient-blue">Statistics  </a>
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


{include file='common/footer.tpl'}