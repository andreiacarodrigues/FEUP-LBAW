{include file='common/userHeader.tpl'}


<div class="addSpace">
    <div class="container">
        <div class="intro-add-complex text-center">
            <h2>Add Space to: Complex<span> 1 </span></h2>
            <br>
        </div>
        <hr class="divider"><br>
            <form id="addSpaceForm" action="{$BASE_URL}actions/managers/addSpace.php" method="post" autocomplete="on">
                <input type="hidden" name="complexID" value="{$complexID}">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">Name</span>
                                <input type="text" class="form-control" name="name" id="name"  placeholder=""/>
                            </div>
                        </div>
                        <div class="innerErrorMessage">
                            <span id="invalidName"></span>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon primary">Surface</span>
                                <select class="form-control" title="" name="surface">
                                    <option value="" disabled selected></option>
                                    <option>Synthetic</option>
                                    <option>Dirt</option>
                                    <option>Indoors</option>
                                    <option>Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon primary">Coverage</span>
                                <select class="form-control" title="" name="coverage">
                                    <option value="" disabled selected></option>
                                    <option>Covered</option>
                                    <option>Uncovered</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon primary">Price / hour</span>
                                <input class="form-control" type="number" name="price" min="0" max="20" step="1" value="0">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon primary">Sports</span>
                                <select class="form-control" name="sports[]" multiple>
                                    <option value="1">Badminton</option>
                                    <option value="2">Volleyball</option>
                                    <option value="3">Basketball</option>
                                    <option value="4">Baseball</option>
                                    <option value="5">Boxing</option>
                                    <option value="6">Eskrima</option>
                                    <option value="7">Football</option>
                                    <option value="8">American football</option>
                                    <option value="9">Rugby football</option>
                                    <option value="10">Golf</option>
                                    <option value="11">Gymnastics</option>
                                    <option value="12">Handball</option>
                                    <option value="13">Hockey</option>
                                    <option value="14">Tenis</option>
                                </select>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary gradient-yellow" value="Upload representative picture"/>
                        <img class="img-responsive" src="http://placehold.it/700x400" style="width:400px" alt="">
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
	
{include file='common/footer.tpl'}

<link rel="stylesheet" href="{$BASE_URL}js/bootstrap-multiselect.css" />
<script src="{$BASE_URL}js/bootstrap-multiselect.js"></script>

<script>
    $(function(){
        addSpace();
    });
</script>