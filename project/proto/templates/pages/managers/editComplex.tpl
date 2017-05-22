{include file='common/userHeader.tpl'}

<div class="editComplex">
    <div class="container">
        <div class="text-center">
            <h1>Edit {$COMPLEX.complexName}'s Information</h1>
            <br>
        </div>

        <hr class="divider"><br>
            <form id="addComplexForm" action="{$BASE_URL}actions/managers/editComplex.php" method="post" autocomplete="on" enctype="multipart/form-data">
                <input type="hidden" name="complexID" value="{$complexID}"/>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> Complex Name </span>
                                <input type="text" class="form-control" name="name" value="{$COMPLEX.complexName}"/>
                            </div>
                        </div>
                        <div class="innerErrorMessage">
                            <span id="invalidName"></span>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> Location </span>
                                <input type="text" class="form-control" name="location" value="{$COMPLEX.complexLocation}"/>
                            </div>
                        </div>
                        <div class="innerErrorMessage">
                            <span id="invalidLocation"></span>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> Email </span>
                                <input type="text" class="form-control" name="email" value="{$COMPLEX.complexEmail}"/>
                            </div>
                        </div>
                        <div class="innerErrorMessage">
                            <span id="invalidEmail"></span>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> Contact </span>
                                <input type="tel" class="form-control" name="contact" value="{$COMPLEX.complexPhone}"/>
                            </div>
                        </div>
                        <div class="innerErrorMessage">
                            <span id="invalidContact"></span>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon primary"> Description </span>
                                <textarea class="form-control" rows="2" name="description">{$COMPLEX.complexDescription}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> Municipality </span>
                                <select class="form-control"  name="municipality"  value="{$COMPLEX.complexMunicipality}">
                                    {html_options values=$municipalityIDs output=$municipalityNames}
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> Opening Hours </span>
                                <input type="time" class="form-control" name="openingHour" value="{$COMPLEX.complexOpeningHour}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> Closing Hours </span>
                                <input type="time" class="form-control" name="closingHour" value="{$COMPLEX.complexClosingHour}">
                            </div>
                        </div>
                        <div class="innerErrorMessage">
                            <span id="invalidHours"></span> <!-- closing < que openning-->
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon primary"> Open on Weekends </span>
                                <select class="form-control" name="openOnWeekends" value="{$COMPLEX.complexOpenOnWeekends}">
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> Paypal Account </span>
                                <input type="tel" class="form-control" name="paypal" value="{$COMPLEX.complexPaypal}"/>
                            </div>
                        </div>
                        <div class="innerErrorMessage">
                            <span id="invalidPaypal"></span>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon primary"> Active </span>
                                <select class="form-control" name="active" value="{$COMPLEX.complexActive}">
                                    <option>Yes</option>
                                    <option>No</option>
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
                                       Browse&hellip; <input type="file" name="photo" style="display: none;">
                                </span>
                                </label>
                                <input type="text" class="form-control" readonly>
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
        complexValidations();
    });
</script>