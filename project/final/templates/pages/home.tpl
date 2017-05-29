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
                <h2>Your favorite place to rent sports complexes!</h2>
                <hr class="intro-divider">
                <span>Here you can find the space you needed to practice your favorite sport. Its just one click away!</span>
                <button class="btn btn-primary gradient-blue" data-toggle="tooltip" data-placement="bottom" title="
                   Use the search form below to enter your selected keywords to get the perfect sports complex to rent.
                    "><i class="fa fa-question-circle" aria-hidden="true"></i></button>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-12">
                <form class="searchForm" action="{$BASE_URL}pages/users/searchResults.php" method="get"
                      autocomplete="on">
                    <div class="field">
                        <input type="text" id="searchPost" name="search" title="Search query">
                        <input class="btn-primary gradient-blue" type="submit" value="Search">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="content-section-b">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section-heading">Sugestions</h2>
                <hr>
                <div class="container text-center">
                    <div class="row">
                        {foreach $SUGGESTIONS as $COMPLEX}
                            {strip}
                                <div class="col-sm-3">
                                    <div class="thumbnail">
                                        {assign var="filename" value="../../res/img/originals/complex_{$COMPLEX.complexID}.jpg"}
                                        {if file_exists($filename)}
                                            <img class="img-responsive"
                                                 src="{$BASE_URL}res/img/thumbs_medium/complex_{$COMPLEX.complexID}.jpg" style="width:100%" alt="">
                                        {else}
                                            <img class="img-responsive" src="http://placehold.it/600x400" style="width:100%" alt="">
                                        {/if}
                                        <div class="caption">
                                            <h3> {$COMPLEX.complexName}
                                                {$COUNT = 0}
                                                {while $COUNT < $COMPLEX.rating}
                                                    ⭐
                                                    {$COUNT = $COUNT + 1}
                                                {/while}
                                            </h3>
                                            <a class="btn btn-primary btn-sm gradient-blue"
                                               href="{$BASE_URL}pages/users/sportComplex.php?complexID={$COMPLEX.complexID}">Check
                                                Complex<span class="glyphicon glyphicon-chevron-right"></span></a>
                                        </div>
                                    </div>
                                </div>
                            {/strip}
                        {/foreach}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('[data-toggle="tooltip"]').tooltip();
</script>

{include file='common/footer.tpl'}