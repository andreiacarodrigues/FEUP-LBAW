{include file='common/adminHeader.tpl'}

  <div class="admin-intro-header">
        <div class="admin adminComplexes">
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
                            {assign var="filename" value="../../res/img/thumbs_medium/complex_{$COMPLEX.complexID}.jpg"}

                            {if file_exists($filename)}
                                <img class="img-responsive" src="{$BASE_URL}res/img/thumbs_medium/complex_{$COMPLEX.complexID}.jpg" style="width:320px" alt="">
                            {else}
                                <img class="img-responsive" src="http://placehold.it/600x400" alt="">
                            {/if}
                        </a>
                        <div class="caption">
                            <h5 class="text-center">{$COMPLEX.complexName}</h5><br>

                            <ul class="list-unstyled">
                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Email: <span> {$COMPLEX.complexEmail} </span></label></li>
                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Contact: <span> {$COMPLEX.complexPhone} </span></label></li>
                            </ul>


                            {if $COMPLEX.complexInactive == true}
                                <form action="{$BASE_URL}actions/admin/unblockComplex.php" method="get" class="form-horizontal" role="form">
                                    <input type="hidden" name="complex" value="{$COMPLEX.complexID}">
                                    <button type="submit" class="btn btn-primary gradient-blue"><i class="glyphicon glyphicon-remove"></i> Unblock </button>
                                </form>
                            {else}
                                <form action="{$BASE_URL}actions/admin/blockComplex.php" method="get" class="form-horizontal" role="form">
                                    <input type="hidden" name="complex" value="{$COMPLEX.complexID}">
                                    <button type="submit" class="btn btn-primary gradient-red"><i class="glyphicon glyphicon-remove"></i> Block </button>
                                </form>
                            {/if}
                        </div>
                    </div>
                </div>


                {if $ROW_COUNT_AUX == 3}
                    </div>
                    {$ROW_COUNT == 0}
                {/if}
            {/strip}
            {/foreach}


            {$COUNT = 0}

            <br><br>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <ul class="pagination">
                        {while $COUNT  < count($PAGINATION)}
                            {$VALUE = $PAGINATION[$COUNT]}
                            {if $VALUE == ($PAGE + 1)}
                                <li class="active">
                                    {else}
                                <li>
                            {/if}
                            <a href="{$BASE_URL}pages/admins/adminComplexes.php?page={$VALUE - 1}">{$VALUE}</a>

                            </li>
                            {$COUNT = $COUNT + 1}
                        {/while}
                    </ul>
                </div>
            </div>

        </div>

        </div>
    </div>
</div>



{include file='common/footer.tpl'}