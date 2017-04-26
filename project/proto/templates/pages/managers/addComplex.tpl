{include file='common/userHeader.tpl'}

<div class="addComplex">
    <div class="container">
        <div class="intro-add-complex text-center">
            <h2>Add Complex</h2>
            <br>
        </div>

        <hr class="divider"><br>
            <form id="addComplexForm" action="{$BASE_URL}actions/managers/addComplex.php" method="post" autocomplete="on">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> Complex Name </span>
                                <input type="text" class="form-control" name="name"/>
                            </div>
                        </div>
                        <div class="innerErrorMessage">
                            <span id="invalidName"></span>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> Location </span>
                                <input type="text" class="form-control" name="location"/>
                            </div>
                        </div>
                        <div class="innerErrorMessage">
                            <span id="invalidLocation"></span>
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

                        <div class="innerErrorMessage">
                            <span id="invalidMunicipality"></span>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> Email </span>
                                <input type="text" class="form-control" name="email"/>
                            </div>
                        </div>
                        <div class="innerErrorMessage">
                            <span id="invalidEmail"></span>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> Contact </span>
                                <input type="text" class="form-control" name="contact"/>
                            </div>
                        </div>
                        <div class="innerErrorMessage">
                            <span id="invalidContact"></span>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon primary"> Description </span>
                                <textarea class="form-control" rows="2" name="description" placeholder="Describe what services your complex provides."></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> Opening Hours </span>
                                <input type="time" name="openingHour" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> Closing Hours </span>
                                <input type="time" name="closingHour" class="form-control">
                            </div>
                        </div>
                        <div class="innerErrorMessage">
                            <span id="invalidHours"></span> <!-- closing < que openning-->
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon primary"> Open on Weekends </span>
                                <select class="form-control"  name="openOnWeekends"  title="">
                                    <option value="true">Yes</option>
                                    <option value="false">No</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> Paypal Account </span>
                                <input type="text" class="form-control" name="paypal"/>
                            </div>
                        </div>
                        <div class="innerErrorMessage">
                            <span id="invalidPaypal"></span> <!-- closing < que openning-->
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
                            <input type="submit" class="btn btn-primary gradient-blue" value="Register Complex"/>
                            <input type="submit" class="btn btn-primary gradient-blue" value="Cancel"/>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>


{include file='common/footer.tpl'}


<script>
    $(function(){
        addComplex();
    });

</script>