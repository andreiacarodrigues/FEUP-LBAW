{include file='common/userHeader.tpl'}

<div class="addComplex">
    <div class="container">
        <div class="text-center">
            <h1>Add Complex</h1>
            <br>
        </div>

        <hr class="divider">
        <br>
        <form id="addComplexForm" action="{$BASE_URL}actions/managers/addComplex.php" method="post" autocomplete="on"
              enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"> Complex Name </span>
                            <input type="text" class="form-control" name="name" title="Name"/>
                        </div>
                    </div>
                    <div class="innerErrorMessage">
                        <span id="invalidName"></span>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"> Location </span>
                            <input type="text" class="form-control" name="location" title="Location"/>
                        </div>
                    </div>
                    <div class="innerErrorMessage">
                        <span id="invalidLocation"></span>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"> Municipality </span>
                            <select class="form-control" name="municipality" title="Municipality">
                                <option value="" disabled selected>Please select a municipality</option>
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
                            <input type="text" class="form-control" title="Email address" name="email"/>
                        </div>
                    </div>
                    <div class="innerErrorMessage">
                        <span id="invalidEmail"></span>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"> Contact </span>
                            <input type="text" class="form-control" title="Phone number" name="contact"/>
                        </div>
                    </div>
                    <div class="innerErrorMessage">
                        <span id="invalidContact"></span>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon primary"> Description </span>
                            <textarea class="form-control" rows="2" name="description" title="Complex description" placeholder="Describe what services your complex provides."></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"> Opening Hours </span>
                            <input type="time" name="openingHour" title="Opening hour" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"> Closing Hours </span>
                            <input type="time" name="closingHour" title="Closing hour" class="form-control">
                        </div>
                    </div>
                    <div class="innerErrorMessage">
                        <span id="invalidHours"></span> <!-- closing < que openning-->
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon primary"> Open on Weekends </span>
                            <select class="form-control" name="openOnWeekends" title="Open on Weekends">
                                <option value="true">Yes</option>
                                <option value="false">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"> Paypal Account </span>
                            <input type="text" class="form-control" title="Paypal Account" name="paypal"/>
                        </div>
                    </div>
                    <div class="innerErrorMessage">
                        <span id="invalidPaypal"></span>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"> Select representative picture </span>
                        </div>
                        <br>

                        <div class="input-group">
                            <label class="input-group-btn">
                                <span class="btn btn-primary gradient-blue">
                                       Browse&hellip; <input type="file" name="photo" title="Complex image" style="display: none;">
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
                    <div class="text-center"">
                        <input type="submit" class="btn btn-primary gradient-blue" value="Register Complex"/>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

<script>
    $(function () {
        complexValidations();
        imagesInput($(document));
    });
</script>


{include file='common/footer.tpl'}


